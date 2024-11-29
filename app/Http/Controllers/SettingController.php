<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all();
        return view('Admin.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('Admin.settings.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Setting::create([
            'phone' => $request->phone,
            'email' => $request->email,
            'location' => $request->location,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'X' => $request->X,
            'youtube' => $request->youtube,
            'pinterest' => $request->pinterest,
            'linkedin' => $request->linkedin,
            'about_Us' => $request->about_us,
        ]);
        session()->flash('success', 'Added Successfully');

        return redirect()->route('setting.index');
    }



    /**
     * Show the form for editing the specified resource.
     */
    // public function show($id) {}

    public function edit($id)
    {
        $setting = Setting::find($id);
        return view('Admin.settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $setting = setting::find($id);
        // $setting = setting::where('id', $request->id)->first();
        $setting->update([

            'phone' => $request->phone,
            'email' => $request->email,
            'location' => $request->location,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'X' => $request->X,
            'youtube' => $request->youtube,
            'pinterest' => $request->pinterest,
            'linkedin' => $request->linkedin,
            'about_Us' => $request->about_us,
        ]);
        session()->flash('success', 'Edited Successfully');

        return redirect()->route('setting.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        // $setting = Setting::destroy($id);
        $setting = Setting::where('id', $id)->delete();
        session()->flash('success', 'Deleted Successfully');

        return redirect()->route('setting.index');
    }
}
