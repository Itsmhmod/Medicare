<?php

namespace App\Helpers;

class ApiRespose
{
    static function sendResponse($status = 200, $message = null, $data = null)

    {
        $array =
            [
                'status' => $status,
                'message' => $message,
                'data' => $data

            ];
        return response()->json($array, $status);
    }
}
