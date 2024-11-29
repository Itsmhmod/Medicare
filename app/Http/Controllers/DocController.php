<?php

namespace App\Http\Controllers;

use App\Models\BookAppointment;
use App\Models\MedicalTest;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Treatment;
use Illuminate\Http\Request;

class DocController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookappointment = BookAppointment::count();
        $medicaltest = MedicalTest::count();
        $patient = Patient::count();
        $prescription = Prescription::count();
        $Treatments = Treatment::count();
        return view('Doctor.dashboard', compact('bookappointment', 'medicaltest', 'patient', 'prescription', 'Treatments'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
