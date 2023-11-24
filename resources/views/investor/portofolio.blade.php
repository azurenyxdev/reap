@extends('layouts.main')

@section('container')
    @if(session()->has('success'))    
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
    @endif
    
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item active">Investor Management</li>
        <li class="breadcrumb-item active" aria-current="page">Investor Profiles</li>
        </ol>
    </nav>

    <button type="button" class="btn btn-outline-secondary float-end btn-sm my-3" data-bs-toggle="modal" data-bs-target="#formAddContract">
        <i class="bx bx-plus icon"></i> New Contract
    </button>   

    <table id="dataTables" class="table table-sm">
        <thead>
            <tr>
                <th>No.</th>
                <th>Contract ID</th>
                <th>Name</th>
                <th>Total Amount</th>
                <th>Near Due Date</th>
                <th>Contract End Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataTable as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="#invcontract{{ $data->invest_id }}" data-bs-toggle="modal">{{ $data->invest_id }}</a></td>
                    <td>{{ $data->name }}</td>
                    <td>{{  number_format($data->amount, 0, ',') }}</td>
                    <td>{{ date('d F Y', strtotime($data->duedate)) }}</td>
                    <td>{{ date('d F Y', strtotime($data->invest_enddate)) }}</td>
                    <td>{{ $data->status }}</td>
                </tr>  
            @endforeach
        </tbody>
    </table>

    
    @include('investor.add_newcontract')
    
    <script>
        function formatCurrency(input) {
            // Remove non-numeric characters (except decimal point) to get the numeric value
            const numericValue = Number(input.value.replace(/[^\d.-]/g, ''));

            // Check if the numeric value is a valid number
            if (!isNaN(numericValue)) {
                // Format the numeric value with a grouping separator but no decimals or currency symbol
                const formattedValue = new Intl.NumberFormat('en-US', {
                    style: 'decimal',
                    maximumFractionDigits: 0,
                }).format(numericValue);
                
                // Set the value of the input field with ID "amount"
                document.getElementById('amount').value = input.value;

                // Set the formatted value in the input's display
                input.value = formattedValue;
            } else {
                // Clear the input value if it's not a valid number
                input.value = '';
            }
        }


        document.getElementById('lengthofinvest').addEventListener('input', updateEndDate);
        document.getElementById('invest_startdate').addEventListener('input', updateEndDate);

        function updateEndDate() {
            const lengthOfInvest = parseInt(document.getElementById('lengthofinvest').value);
            const startDate = new Date(document.getElementById('invest_startdate').value);
            
            if (!isNaN(lengthOfInvest) && startDate instanceof Date && !isNaN(startDate)) {
                const endDate = new Date(startDate);
                endDate.setDate(endDate.getDate() + (lengthOfInvest * 31)); // Subtract 1 day to get the end of the previous month
                
                const year = endDate.getFullYear();
                const month = String(endDate.getMonth() + 1).padStart(2, '0');
                const day = String(endDate.getDate()).padStart(2, '0');
                const formattedEndDate = `${year}-${month}-${day}`;
                
                document.getElementById('invest_enddate_form').value = formattedEndDate;
                document.getElementById('invest_enddate').value = formattedEndDate;
            } else {
                document.getElementById('invest_enddate_form').value = '';
                document.getElementById('invest_enddate').value = '';
            }
        }



        @if ($errors->any()) 
            $(document).ready(function() {
                $('#formAddContract').modal('show');
            });
        @endif
    </script>
@endsection

@section('listmodal')
    @include('investor.investorcontract')
@endsection



