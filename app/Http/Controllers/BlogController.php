<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Notice;
use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(15);
        $menus = Menu::all();
        $categories = Category::all();


        return view('blogs.index', compact('blogs', 'categories', 'menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog) {

        $blogs = Blog::all();
        $user_name = $blog->user->name;
        $menus = Menu::all();
        $categories = Category::all();
        return view('blogs.show', compact('blog', 'blogs', 'user_name', 'menus', 'categories'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        //
    }

    // トップ画面のブログ表示
    public function top()
    {
        $blogs = Blog::paginate(3);
        $notices = Notice::paginate(3);
        $menus = Menu::all();
        $categories = Category::all();
        // $blogs = Blog::all();
        return view('index', compact('blogs', 'notices', 'menus', 'categories'));
    }
}
