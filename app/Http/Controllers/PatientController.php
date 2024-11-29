<?php

namespace App\Http\Controllers;

use App\Models\MedicalTest;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::all();
        return view('Admin.patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Patient::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'age' => $request->age,
            'status' => $request->status,
        ]);
        session()->flash('success', 'Added Successfully');

        return redirect()->route('patient.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $patient = Patient::find($id);
        return view('Admin.patients.edit', compact('patient'));

        return redirect()->route('patient.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $patient = Patient::find($id);
        $patient->update([

            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'age' => $request->age,
            'status' => $request->status
        ]);
        session()->flash('success', 'Edited Successfully');

        return redirect()->route('patient.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Patient::destroy($id);
        session()->flash('success', 'Deleted Successfully');

        return redirect()->route('patient.index');
    }
}
