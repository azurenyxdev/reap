<?php

namespace App\Http\Controllers;

use App\Models\Tinvestor;
use App\Http\Requests\StoreTinvestorRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateTinvestorRequest;

class TinvestorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        //return 'INV'.str_pad(Tinvestor::max('id')+1, 3, '0', STR_PAD_LEFT);
        return view('investor.profiles', [
            'title' => 'Investor List',
            'active' => 'investor-profiles',
            'dataTable' => Tinvestor::all()
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
            'name' => 'required|max:255|alpha',
            'identity_number' => 'required|numeric|unique:tinvestors',
            'phone' => 'required|numeric',
            'address' => 'required',
            'email' => 'required|email:dns|unique:tinvestors',
            'join_date' => 'required|date'
        ]);

        $validatedData['investor_id'] =  'INV'.str_pad(Tinvestor::max('id')+1, 4, '0', STR_PAD_LEFT);
        $validatedData['created_by'] =  auth()->user()->username;
        $validatedData['updated_by'] =  auth()->user()->username;
        Tinvestor::create($validatedData);

        return redirect('investor_profiles')->with('success', 'Investor successfully added!');

    }

    /**
     * Display the specified resource.
     */
    public function show(Tinvestor $tinvestor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tinvestor $tinvestor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dataTable = Tinvestor::find($id);
        $input = $request->all();
        $dataTable->fill($input)->save();

        return redirect('/investor_profiles')->with('success', 'Investor successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tinvestor $tinvestor)
    {
        //
    }
}
