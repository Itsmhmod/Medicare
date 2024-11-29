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

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $bookappointments = BookAppointment::get();
        $medicaltests = MedicalTest::get();
        $patients = Patient::get();
        $prescriptions = Prescription::get();
        $Treatments = Treatment::get();
        $blogs = Blog::get();
        $clientreviews = ClientReview::get();
        $doctors = Doctor::get();
        $services = Service::get();
        $settings = Setting::get();
        $specializations = Specialization::get();
        return view('Home.index', compact(
            'bookappointments',
            'medicaltests',
            'patients',
            'prescriptions',
            'Treatments',
            'blogs',
            'clientreviews',
            'doctors',
            'services',
            'settings',
            'specializations'
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
