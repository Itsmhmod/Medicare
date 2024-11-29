<?php

namespace App\Http\Controllers;

use App\Models\BookAppointment;
use Illuminate\Http\Request;

class BookAppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookAppointments = BookAppointment::all();
        return view('Admin.BookAppointment.index', compact('bookAppointments'));
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
    //     // return $request;
    //     BookAppointment::create([

    //         'name' => $request->name,
    //         'phone' => $request->phone,
    //         'email' => $request->email,
    //         'date' => $request->date,
    //         'days' => $request->days,
    //         'visita_no' => $request->visita_no,
    //         'doctor_id' => $request->doctor_id,

    //     ]);
    //     session()->flash('success', 'Appointment is Booked Successfully');

    //     return redirect('/');
    // }


    public function destroy($id)
    {
        BookAppointment::destroy($id);

        session()->flash('success', 'Deleted Successfully');

        return redirect()->route('bookAppointment.index');
    }
}
