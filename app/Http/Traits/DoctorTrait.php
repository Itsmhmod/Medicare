<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait DoctorTrait
{
    // $name =name of input in form
    // $folder =>اسم الملف ال هيكون داخل ملف attachments
    public function uploadFile($request, $name, $folder)
    {
        $image = $request->file($name)->getClientOriginalName();
        $request->file($name)->storeAs('attachments/', $folder . '/' . $image, 'Doctor_attachments');
    }

    public function deleteFile($name)
    {
        $exists = Storage::disk('Doctor_attachments')->exists('attachments/library/' . $name);

        if ($exists) {
            Storage::disk('Doctor_attachments')->delete('attachments/library/' . $name);
        }
    }
}
