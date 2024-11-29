<?php

namespace App\Http\Controllers;

use App\Models\Specialization;
use Illuminate\Http\Request;

class SpecializationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specializations = Specialization::all();
        return view('Admin.specializations.index', compact('specializations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.specializations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Specialization::create([

            'name' => $request->name
        ]);
        session()->flash('success', 'Added Successfully');

        return redirect()->route('specialization.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Specialization $specialization) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $specialization = Specialization::find($id);

        return view('Admin.specializations.edit', compact('specialization'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $specialization = Specialization::find($id);
        $specialization->update([
            'name' => $request->name
        ]);
        session()->flash('success', 'Edited Successfully');

        return redirect()->route('specialization.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $specialization = Specialization::find($id);
        $specialization->delete();
        session()->flash('success', 'Deleted Successfully');

        return redirect()->route('specialization.index');
    }
}
