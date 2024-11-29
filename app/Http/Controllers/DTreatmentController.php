<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DTreatmentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $treatments = Treatment::all();
        return view('Doctor.Treatments.index', compact('treatments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Doctor.Treatments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Treatment::create([
            'name' => $request->name,
        ]);
        session()->flash('success', 'Added Successfully');

        return redirect()->route('treatmentD.index');
    }

    /**
     * Display the specified resource.
     */
    public function show() {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $treatment = Treatment::find($id);

        return view('Doctor.Treatments.edit', compact('treatment'));

        return redirect()->route('treatmentD.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $treatment = Treatment::find($id);
        $treatment->update([
            'name' => $request->name,
        ]);
        session()->flash('success', 'Edited Successfully');

        return redirect()->route('treatmentD.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Treatment::destroy($id);
        session()->flash('success', 'Deleted Successfully');

        return redirect()->route('treatmentD.index');
    }
}
