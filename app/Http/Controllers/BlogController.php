<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (!auth()->user()->hasPermissionTo('blog_view')) {
            abort(403, 'Unauthorized');
        }
        $blogs = Blog::all();
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!auth()->user()->hasPermissionTo('blog_create')) {
            abort(403, 'Unauthorized');
        }
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {

        if (!auth()->user()->hasPermissionTo('blog_create')) {
            abort(403, 'Unauthorized');
        }

        Blog::create($request->all());
        return redirect()->route('blogs.index');
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
    public function edit(Blog $blog)
    {
        if (!auth()->user()->hasPermissionTo('blog_update')) {
            abort(403, 'Unauthorized');
        }
        return view('blogs.edit',compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {

        if (!auth()->user()->hasPermissionTo('blog_update')) {
            abort(403, 'Unauthorized');
        }
        $blog->update($request->all());
        return redirect()->route('blogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {


        if (auth()->user()->hasPermissionTo('blog_delete')) {
            abort(403, 'Unauthorized');
        }
        

        $blog->delete();
        return redirect()->route('blogs.index');
        
    }
}
