<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Storage;

trait ServiceTrait
{
    public function uploadFile($request, $name, $folder)
    {
        $image = $request->file($name)->getClientOriginalName();
        $request->file($name)->storeAs('attachments/', $folder . '/' . $image, 'Service_attachments');
    }

    public function deleteFile($name)
    {
        $exists = Storage::disk('Service_attachments')->exists('attachments/library/' . $name);

        if ($exists) {
            Storage::disk('Service_attachments')->delete('attachments/library/' . $name);
        }
    }
}
