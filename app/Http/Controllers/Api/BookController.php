<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiRespose;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\BookAppointment;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        // $books = BookAppointment::where('doctor_id',$request->doctor()->id)->get();
        $books = BookAppointment::all();

        if ($books) {
            return ApiRespose::sendResponse(200, 'The Appointment is booked Successfully ', BookResource::collection($books));
        }
    }
    public function store(BookRequest $request)
    {
        $bookvalidate = $request->validated();
        $book = BookAppointment::create($bookvalidate);
        if ($book) {
            return ApiRespose::sendResponse(201, 'The Appointment is booked Successfully ', []);
        }
    }
    public function delete($id)
    {
        $book = BookAppointment::find($id);
        if (!$book) {
            return ApiRespose::sendResponse(204, 'The Appointment is not Found ', []);
        }
        $books = $book->delete();
        if ($books) {
            return ApiRespose::sendResponse(200, 'The Appointment is Deleted ', []);
        }
    }

    public function search(Request $request)
    {
        $word = $request->has('search') ? $request->input('search') : null;
        $ads = BookAppointment::when($word != null, function ($q) use ($word) {
            $q->where('title', 'like', '%' . $word . '%');
        })->latest()->get();
        if (count($ads) > 0) {
            return ApiRespose::sendResponse(200, 'Search completed', BookResource::collection($ads));
        }
        return ApiRespose::sendResponse(200, 'No matching data', []);
    }
}
