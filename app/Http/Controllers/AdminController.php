<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BookAppointment;
use App\Models\ClientReview;
use App\Models\Doctor;
use App\Models\MedicalTest;
use App\Models\Patient;
use App\Models\Prescription;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Specialization;
use App\Models\Treatment;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        $blog = Blog::count();
        $clientreview = ClientReview::count();
        $doctor = Doctor::count();
        $service = Service::count();
        $setting = Setting::count();
        $specialization = Specialization::count();
        return view('Admin.dashboard', compact(
            'bookappointment',
            'medicaltest',
            'patient',
            'prescription',
            'Treatments',
            'blog',
            'clientreview',
            'doctor',
            'service',
            'setting',
            'specialization'
        ));
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
