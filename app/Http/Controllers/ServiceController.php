<?php

namespace App\Http\Controllers;

use App\Http\Traits\ServiceTrait;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    use ServiceTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::all();
        return view('Admin.service.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'icon' => $request->file('icon')->getClientOriginalName()
        ]);
        $this->uploadFile($request, 'icon', 'Service_attachments');
        session()->flash('success', 'Added Successfully');

        return redirect()->route('service.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $service = Service::find($id);
        return view('Admin.service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $service = Service::find($id);

        $service->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        if ($request->hasFile('icon')) {
            // حذف الصورة القديمة
            $this->deleteFile($service->icon);

            // رفع الصورة الجديدة
            $image_new = $request->file('icon')->getClientOriginalName();
            $request->file('icon')->move(public_path('Service_img/attachments/Service_attachments/'), $image_new);

            // تحديث اسم الصورة في قاعدة البيانات
            $service->icon = $image_new;
            $service->save();
        }
        session()->flash('success', 'Edited Successfully');


        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $this->deleteFile($request->file_name);
        $service = Service::where('id', $request->id)->delete();
        if ($request->hasFile('icon')) {
            $this->deleteFile($service->icon);

            $image_new = $request->file('icon')->getClientOriginalName();
            $service->icon = $service->icon !== $image_new ? $image_new : $service->icon;
        }
        session()->flash('success', 'Deleted Successfully');

        return redirect()->back();
    }
}
