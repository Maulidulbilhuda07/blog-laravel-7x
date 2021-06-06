<?php

namespace App\Http\Controllers;

use App\Category;
use App\Posts;
use App\Tags;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Posts $posts ){
        $tags = Tags::all();
        $category_widget=Category::all();
        $data=$posts->orderBy('created_at','desc')->take(6)->get();
       return view('dashboard',compact('data', 'category_widget','tags'));
    }
    public function BlogIsi($slug)
    {
        $tags = Tags::all();
        $category_widget = Category::all();
        $data=Posts::where('slug',$slug)->get();
    return view('blog.blogisi',compact('data','category_widget', 'tags'));
    }
    public function ListBlog(Posts $posts)
    {
        $tags = Tags::all();
        $category_widget = Category::all();
        $data = $posts::latest()->paginate(5);
        return view('blog.listblog', compact('data', 'category_widget','tags'));
    }
    public function ListCategory(Category $Category)
    {
        $tags = Tags::all();
        $category_widget=Category::all();
        $data=$Category->posts()->paginate(5);
        return view('blog.listblog', compact('data', 'category_widget','tags'));
    }
    public function Cari(Request $request)
    {
        $tags = Tags::all();
        $category_widget = Category::all();
        $data = Posts::where('judul', $request->cari)->orWhere('judul', 'like', '%' .$request ->cari . '%')->paginate(5);
        return view('blog.listblog', compact('data', 'category_widget', 'tags'));
    }
}
