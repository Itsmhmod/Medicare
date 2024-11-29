<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicalTestRequest;
use App\Models\MedicalTest;
use App\Models\Prescription;
use Illuminate\Http\Request;

class MedicalTestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $medicalTests = MedicalTest::all();
        return view('Admin.medicalTests.index', compact('medicalTests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.medicalTests.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        MedicalTest::create([
            'name' => $request->name,
        ]);
        session()->flash('success', 'Added Successfully');

        return redirect()->route('medicalTests.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalTest $medicalTest) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $medicalTest = MedicalTest::find($id);

        return view('Admin.medicalTests.edit', compact('medicalTest'));

        return redirect()->route('medicalTests.index');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $medicalTest = MedicalTest::find($id);
        $medicalTest->update([
            'name' => $request->name,
        ]);
        session()->flash('success', 'Edited Successfully');

        return redirect()->route('medicalTests.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        MedicalTest::destroy($id);
        session()->flash('success', 'Deleted Successfully');

        return redirect()->route('medicalTests.index');
    }
}
