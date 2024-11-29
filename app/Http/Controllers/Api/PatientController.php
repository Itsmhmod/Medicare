<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiRespose;
use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Http\Resources\PatientResource;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function create(PatientRequest $request)
    {

        $patient = $request->validated();
        $patient['doctor_id'] = $request->doctor()->id;
        $patients = Patient::create($patient);
        if ($patients) {
            return ApiRespose::sendResponse(201, 'created is Successfully', new PatientResource($patients));
        }
    }

    public function update(PatientRequest $request, $id)
    {

        $patient = Patient::find($id);
        if ($patient->doctor_id != $request->doctor()->id) {

            return ApiRespose::sendResponse(403, 'You aren\'t allowed to take this action', []);
        }
        $medical = $request->validated();
        $med = $patient->update($medical);
        if ($med) {
            return ApiRespose::sendResponse(201, 'Updated is Successfully', new PatientResource($med));
        }
    }

    public function delete(Request $request, $id)
    {
        $medicaltest = Patient::find($id);
        if ($medicaltest->doctor_id != $request->doctor()->id) {

            return ApiRespose::sendResponse(403, 'You aren\'t allowed to take this action', []);
        }
        $medical = $medicaltest->delete();
        if ($medical) {
            return ApiRespose::sendResponse(200, 'The Patient is Deleted ', []);
        }
    }

    public function index(Request $request)
    {
        $medicaltests = Patient::where('doctor_id', $request->doctor()->id)->get();
        if ($medicaltests) {
            return ApiRespose::sendResponse(200, 'Data is Successfully', PatientResource::collection($medicaltests));
        }
        return ApiRespose::sendResponse(200, 'there is not medicaltest', []);
    }

    public function search(Request $request)
    {
        $word = $request->has('search') ? $request->input('search') : null;
        $ads = Patient::when($word != null, function ($q) use ($word) {
            $q->where('title', 'like', '%' . $word . '%');
        })->latest()->get();
        if (count($ads) > 0) {
            return ApiRespose::sendResponse(200, 'Search completed', PatientResource::collection($ads));
        }
        return ApiRespose::sendResponse(200, 'No matching data', []);
    }
}
