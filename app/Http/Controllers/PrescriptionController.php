<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\MedicalTest;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Treatment;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $prescriptions = Prescription::all();
        return view('Admin.prescription.index', compact('prescriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $treatments = Treatment::all();
        $medicalTests = MedicalTest::all();
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('Admin.prescription.create', compact('treatments', 'medicalTests', 'doctors', 'patients'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $prescription = Prescription::create([
            'notes' => $request->notes,
            'date' => $request->date,
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
        ]);
        if ($request->has('treatments')) {
            $prescription->treatments()->sync($request->treatments);
        }
        if ($request->has('MedicalTests')) {
            $prescription->MedicalTests()->sync($request->MedicalTests);
        }
        session()->flash('success', 'Added Successfully');

        return redirect()->route('prescription.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $treatments = Treatment::all();
        $medicalTests = MedicalTest::all();
        $prescription = Prescription::find($id);
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('Admin.prescription.edit', compact('prescription', 'treatments', 'medicalTests', 'doctors', 'patients'));
        return redirect()->route('prescription.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $prescription = Prescription::find($id);
        $prescription->update([
            'notes' => $request->notes,
            'date' => $request->date,
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
        ]);
        if ($request->has('treatments')) {
            $prescription->treatments()->sync($request->treatments);
        }
        if ($request->has('MedicalTests')) {
            $prescription->MedicalTests()->sync($request->MedicalTests);
        }
        session()->flash('success', 'Edited Successfully');

        return redirect()->route('prescription.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Prescription::destroy($id);
        session()->flash('success', 'Deleted Successfully');

        return redirect()->route('prescription.index');
    }
}
