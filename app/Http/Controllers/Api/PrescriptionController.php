<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiRespose;
use App\Http\Controllers\Controller;
use App\Http\Requests\prescriptionRequest;
use App\Http\Resources\PrescriptionResource;
use App\Models\Prescription;
use Illuminate\Http\Request;

class PrescriptionController extends Controller
{
    public function create(prescriptionRequest $request)
    {

        $medicaltest = $request->validated();
        $medicaltest['doctor_id'] = $request->doctor()->id;
        $medical = Prescription::create($medicaltest);
        if ($medical) {
            return ApiRespose::sendResponse(201, 'created is Successfully', new PrescriptionResource($medical));
        }
    }

    public function update(prescriptionRequest $request, $id)
    {

        $medicaltest = Prescription::find($id);
        if ($medicaltest->doctor_id != $request->doctor()->id) {

            return ApiRespose::sendResponse(403, 'You aren\'t allowed to take this action', []);
        }
        $medical = $request->validated();
        $med = $medicaltest->update($medical);
        if ($med) {
            return ApiRespose::sendResponse(201, 'Updated is Successfully', new PrescriptionResource($med));
        }
    }

    public function delete(Request $request, $id)
    {
        $medicaltest = Prescription::find($id);
        if ($medicaltest->doctor_id != $request->doctor()->id) {

            return ApiRespose::sendResponse(403, 'You aren\'t allowed to take this action', []);
        }
        $medical = $medicaltest->delete();
        if ($medical) {
            return ApiRespose::sendResponse(200, 'The Medicaltest is Deleted ', []);
        }
    }

    public function index(Request $request)
    {
        $medicaltests = Prescription::where('doctor_id', $request->doctor()->id)->get();
        if ($medicaltests) {
            return ApiRespose::sendResponse(200, 'Data is Successfully', PrescriptionResource::collection($medicaltests));
        }
        return ApiRespose::sendResponse(200, 'there is not medicaltest', []);
    }

    public function search(Request $request)
    {
        $word = $request->has('search') ? $request->input('search') : null;
        $ads = Prescription::when($word != null, function ($q) use ($word) {
            $q->where('title', 'like', '%' . $word . '%');
        })->latest()->get();
        if (count($ads) > 0) {
            return ApiRespose::sendResponse(200, 'Search completed', PrescriptionResource::collection($ads));
        }
        return ApiRespose::sendResponse(200, 'No matching data', []);
    }
}
