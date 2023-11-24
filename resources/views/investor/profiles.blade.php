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

    <button type="button" class="btn btn-outline-secondary float-end btn-sm my-3" data-bs-toggle="modal" data-bs-target="#formAddInvestor">
        <i class="bx bx-plus icon"></i> Investor
    </button>   

    <table id="dataTables" class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Investor ID</th>
                <th>Name</th>
                <th>Join Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($dataTable as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="#edit_investor{{ $data->id }}" data-bs-toggle="modal">{{ $data->investor_id }}</a></td>
                    <td>{{ $data->name }}</td>
                    <td>{{ date('d F Y', strtotime($data->join_date)) }}</td>
                    <td>active</td>
                    @include('investor.edit_investor')
                </tr>  
            @endforeach
        </tbody>
    </table>
    
@include('investor.add_newinvestor')

@endsection

