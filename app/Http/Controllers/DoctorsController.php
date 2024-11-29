<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{

    public function getDoctorDays(Request $request)
    {
        $doctor = Doctor::find($request->doctor_id);

        // إذا تم العثور على الطبيب، استرجع الأيام في صورة JSON
        if ($doctor) {
            $days = json_decode($doctor->days, true);
            return response()->json(['days' => $days]);
        }

        // إذا لم يتم العثور على الطبيب، إعادة استجابة فارغة
        return response()->json(['days' => []]);
    }
}
