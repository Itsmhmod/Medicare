<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ClientReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        ClientReview::create([
            'comment' => $request->comment,
            'clinic_rate' => (int)$request->clinic_rate,
            'doctor_rate' => (int)$request->doctor_rate,
            'treatment_rate' => (int)$request->treatment_rate,
            'doctor_id' => $request->doctor_id,
        ]);

        return redirect('/')->with('success', 'Review is Added Successfully');
    }
}
