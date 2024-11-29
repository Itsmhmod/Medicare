<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiRespose;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Models\ClientReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(ReviewRequest $request)
    {
        $bookvalidate = $request->validated();
        $book = ClientReview::create($bookvalidate);
        if ($book) {
            return ApiRespose::sendResponse(201, 'The Review is Successfully ', []);
        }
    }
}
