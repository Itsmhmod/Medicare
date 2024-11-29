<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BookAppointment;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function store(Request $request)
    {
        // return $request;
        BookAppointment::create([

            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'date' => $request->date,
            'days' => $request->days,
            'visita_no' => $request->visita_no,
            'doctor_id' => $request->doctor_id,

        ]);
        // session()->flash('success', 'Appointment is Booked Successfully');

        return redirect('/')->with('success', 'Appointment is Booked Successfully');
    }
}
