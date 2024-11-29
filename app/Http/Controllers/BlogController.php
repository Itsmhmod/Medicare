<?php

namespace App\Http\Controllers;

use App\Http\Traits\AttachFilesTrait;
use App\Http\Traits\BlogTrait;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    use BlogTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('Admin.Blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.Blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Blog::create([
            'name' => $request->name,
            'subject' => $request->subject,
            'date' => $request->date,
            'publisher' => $request->publisher,
            'image' => $request->file('image')->getClientOriginalName()
        ]);
        $this->uploadFile($request, 'image', 'Blog_attachments');

        session()->flash('success', 'ِAdded Successfully');

        return redirect()->route('blog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        return view('Admin.Blogs.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        $blog->update([
            'name' => $request->name,
            'subject' => $request->subject,
            'date' => $request->date,
            'publisher' => $request->publisher,
        ]);

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة
            $this->deleteFile($blog->image);

            // رفع الصورة الجديدة
            $image_new = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('Blog_img/attachments/Blog_attachments/'), $image_new);

            // تحديث اسم الصورة في قاعدة البيانات
            $blog->image = $image_new;
            $blog->save();
        }

        session()->flash('success', 'Edited Successfully');
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $this->deleteFile($request->file_name);
        $blog = Blog::where('id', $request->id)->delete();
        if ($request->hasFile('image')) {
            $this->deleteFile($blog->image);

            $image_new = $request->file('image')->getClientOriginalName();
            $blog->image = $blog->image !== $image_new ? $image_new : $blog->image;
        }
        session()->flash('success', 'Deleted Successfully');
        return redirect()->back();
    }
}
