<?php

namespace App\Http\Controllers;

use App\Models\ClientReview;
use Illuminate\Http\Request;

class ClientReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientReviews = ClientReview::all();
        return view('Admin.ClientReviews.index', compact('clientReviews'));
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
    // public function store(Request $request)
    // {
    //     ClientReview::create([
    //         'comment' => $request->comment,
    //         'clinic_rate' => (int)$request->clinic_rate,
    //         'doctor_rate' => (int)$request->doctor_rate,
    //         'treatment_rate' => (int)$request->treatment_rate,
    //         'doctor_id' => $request->doctor_id,
    //     ]);
    //     session()->flash('success', 'ِReview is Added Successfully');

    //     return redirect('/');
    // }

    /**
     * Display the specified resource.
     */
    public function show(ClientReview $clientReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClientReview $clientReview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClientReview $clientReview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        ClientReview::destroy($id);
        session()->flash('success', 'Deleted Successfully');

        return redirect()->route('clientReview.index');
    }
}
