@foreach ($dataTable as $data)
<div class="modal fade" id="invcontract{{$data->invest_id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Investor Contract</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body mx-5 form-control-sm">
            <div class="mb-3 ">
                <h1 class="modal-title fs-5 mt-3" id="staticBackdropLabel">Main Contract Information</h1>
                
                <table class="table table-bordered mt-3" style="width: auto">
                    <tr>
                        <td>Contract Number</td>
                        <td>{{ $data->invest_id }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ $data->name }}</td>
                    </tr>
                    <tr>
                        <td>Contract Start Date</td>
                        <td>{{ date('d F Y', strtotime($data->invest_startdate)) }}</td>
                    </tr>
                </table> 
                
                <button type="button" class="btn btn-outline-secondary float-end btn-sm" data-bs-toggle="modal" data-bs-target="#formUpdateContract">
                    <i class="bx bx-plus icon"></i> Update Contract
                </button>   

                <h1 class="modal-title fs-5 mt-3" id="staticBackdropLabel">List Contract Updates</h1>

                <table class="table table-bordered mt-3" style="font-size: 13px">
                    <thead>
                        <tr style="text-align: center">
                            <th>No.</th>
                            <th>History No.</th>
                            <th>Contract Start Date</th>
                            <th>Amount</th>
                            <th>Profit(%)</th>
                            <th>Contract End Date</th>
                            <th>Total Payment</th>
                            <th>Payment Count</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                        <?php $record = \App\Models\Tinvestortrxhistory::where('invest_id', $data->invest_id)->get(); ?>
                        @foreach ($record as $d)
                            <tr>
                                <?php $installmentcount = \App\Models\Tinvestortrx_installment::where('history_no', $d->history_no)->count(); ?>

                                <td>{{  $loop->iteration }}</td>
                                <td><a href="investorcontract_detail/{{ $d->history_no }}">{{ $d->history_no }}</a></td>
                                <td>{{  date('d F Y', strtotime($d->invest_startdate)) }}</td>
                                <td>{{  number_format($d->amount, 0, ',') }}</td>
                                <td>{{ $d->profitpercentage }}</td>
                                <td>{{  date('d F Y', strtotime($d->invest_enddate)) }}</td>
                                <td>{{ $d->lengthofinvest }}</td>
                                <td><a href="investorcontract_installment/{{ $d->history_no }}">{{ $installmentcount }}</a></td>
                                <td>
                                    @if ($d->status == 0)
                                        Completed
                                    @elseif($d->status == 1)
                                        On Going
                                    @else
                                        Early withdrawal
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table> 
            </div>
        </div>    
        </div>
    </div>
</div>
@endforeach