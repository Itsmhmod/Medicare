<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\Specialization;
use App\Http\Traits\DoctorTrait;
use App\Http\Requests\DoctorRequest;

use function GuzzleHttp\json_encode;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    use DoctorTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();
        return view('Admin.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $daysOfWeek = [
            'Sunday' => 'Sunday',
            'Monday' => 'Monday',
            'Tuesday' => 'Tuesday',
            'Wednesday' => 'Wednesday',
            'Thursday' => 'Thursday',
            'Friday' => 'Friday',
            'Saturday' => 'Saturday'
        ];
        $specializations = Specialization::all();
        return view('Admin.doctors.create', compact('specializations', 'daysOfWeek'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        Doctor::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'days' => json_encode($request->days),
            'email' => $request->email,
            'facebook' => $request->facebook,
            'X' => $request->X,
            'instagram' => $request->instagram,
            'password' => Hash::make($request->password),
            'linkedin' => $request->linkedin,
            'specialization_id' => $request->specialization_id,
            'image' => $request->file('image')->getClientOriginalName(),

        ]);
        $this->uploadFile($request, 'image', 'Doctor_attachments');
        session()->flash('success', 'Added Successfully');

        return redirect()->route('doctor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $daysOfWeek = [
            'Sunday' => 'Sunday',
            'Monday' => 'Monday',
            'Tuesday' => 'Tuesday',
            'Wednesday' => 'Wednesday',
            'Thursday' => 'Thursday',
            'Friday' => 'Friday',
            'Saturday' => 'Saturday'
        ];
        $specializations = Specialization::all();
        $doctor = Doctor::find($id);
        // $specialization = Doctor::where('specialization_id', $id);
        return view('Admin.doctors.edit', compact('specializations', 'doctor', 'daysOfWeek'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);

        $doctor->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'days' => json_encode($request->days),
            'email' => $request->email,
            'facebook' => $request->facebook,
            'X' => $request->X,
            'instagram' => $request->instagram,
            'password' => Hash::make($request->password),
            'linkedin' => $request->linkedin,
            'specialization_id' => $request->specialization_id,
        ]);

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة
            $this->deleteFile($doctor->image);

            // رفع الصورة الجديدة
            $image_new = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('Doctor_img/attachments/Doctor_attachments/'), $image_new);

            // تحديث اسم الصورة في قاعدة البيانات
            $doctor->image = $image_new;
            $doctor->save();
        }
        session()->flash('success', 'Edited Successfully');


        return redirect()->route('doctor.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $this->deleteFile($request->file_name);
        $doctor = Doctor::where('id', $request->id)->delete();
        if ($request->hasFile('image')) {
            $this->deleteFile($doctor->image);

            $image_new = $request->file('image')->getClientOriginalName();
            $doctor->icon = $doctor->icon !== $image_new ? $image_new : $doctor->icon;
        }
        session()->flash('success', 'Deleted Successfully');

        return redirect()->back();
    }
}
