<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Tinvestor;
use App\Models\Tinvestortrx;
use Illuminate\Http\Request;
use App\Models\Tinvestortrxhistory;
use App\Models\Tinvestortrx_installment;
use App\Http\Requests\StoreTinvestortrxRequest;
use App\Http\Requests\UpdateTinvestortrxRequest;
use Illuminate\Support\Facades\DB;

class TinvestortrxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('investor.portofolio', [
            'title' => 'Investor Portofolio',
            'active' => 'investor-portofolio',
            'dataTable' => Tinvestortrx::join('tinvestors', 'tinvestortrxes.investor_id', '=', 'tinvestors.investor_id')
                        ->join('tinvestortrxhistories', 'tinvestortrxes.invest_id','=', 'tinvestortrxhistories.invest_id')
                        ->join(DB::raw('(select history_no, max(duedate) duedate from tinvestortrx_installments group by history_no) last_installment'), 'tinvestortrxhistories.history_no','=', 'last_installment.history_no')   
                        ->select('tinvestortrxes.invest_id', DB::raw('SUM(tinvestortrxhistories.amount) amount'), 'last_installment.duedate', 'tinvestors.name','tinvestortrxes.invest_startdate','tinvestortrxes.invest_enddate', DB::raw("CASE WHEN tinvestortrxes.status = 1 THEN 'Active' ELSE 'Inactive' END status"))
                        ->groupBy('tinvestortrxes.invest_id','last_installment.duedate', 'tinvestors.name', 'tinvestortrxes.invest_startdate','tinvestortrxes.invest_enddate', 'tinvestortrxes.status')
                        ->get(),
            'investorData' => Tinvestor::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'investor_id' => 'required',
            'amount' => 'required|numeric|min:1000000',
            'lengthofinvest' => 'required|numeric|min:1',
            'profitpercentage' => 'required|numeric|min:1|max:100',
            'invest_startdate' => 'required|date',
            'invest_enddate' => 'required|date'
        ]);

        $validatedData['invest_id'] =  'SP-INV-'.date("Ymd").str_pad(Tinvestortrx::max('id')+1, 4, '0', STR_PAD_LEFT);
        $validatedData['status'] = 1;
        $validatedData['created_by'] =  auth()->user()->username;
        $validatedData['updated_by'] =  auth()->user()->username;
        $validatedData['history_no'] = 'HIS-SP-INV-'.date("Ymd").str_pad(Tinvestortrx::max('id')+1, 4, '0', STR_PAD_LEFT);
        $validatedData['profit'] =  $validatedData['amount'] * $validatedData['profitpercentage'] / 100;
        $validatedData['total_payment'] = $validatedData['amount'] + ($validatedData['profit'] * $validatedData['lengthofinvest']);
        $validatedData['remaining_payment'] = $validatedData['total_payment'];
        $validatedData['index'] = 1;
        $validatedData['installment_amount'] = $validatedData['profit'];
        $validatedData['duedate'] = Carbon::createFromFormat('Y-m-d', $validatedData['invest_startdate'])->addDays(31)->format('Y-m-d');
        $validatedData['ispaid'] = 0;
        
        Tinvestortrx::create($validatedData);
        Tinvestortrxhistory::create($validatedData);
        Tinvestortrx_installment::create($validatedData);

        return redirect('investor_portofolio')->with('success', 'New contract successfully added!');


        //return $request->all();

        


    }

    /**
     * Display the specified resource.
     */
    public function show(Tinvestortrx $tinvestortrx)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tinvestortrx $tinvestortrx)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTinvestortrxRequest $request, Tinvestortrx $tinvestortrx)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tinvestortrx $tinvestortrx)
    {
        //
    }
}
