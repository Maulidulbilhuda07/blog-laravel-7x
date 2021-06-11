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
        $trending = $posts->orderBy('read', 'desc')->take(1)->first();
        $random_posts = $posts::all()->random(1);
        $data=$posts->orderBy('created_at','desc')->take(6)->get();
        $populer_posts = $posts->orderBy('read', 'desc')->take(5)->get();
       return view('dashboard',compact('data', 'category_widget','tags','trending','random_posts','populer_posts'));
    }
    public function BlogIsi($slug)
    {
        $tags = Tags::all();
        $category_widget = Category::all();
        $data=Posts::where('slug',$slug)->get();
        $posts_update= Posts::where('slug', $slug)->first();
        $populer_posts = Posts::orderBy('read', 'desc')->take(5)->get();
       $read=$posts_update->read + 1;
       $id=$posts_update->id;
       $data_updte=[
           'read'=>$posts_update->read +1,
       ];
        Posts::whereId($id)->update($data_updte);
    return view('blog.blogisi',compact('data','category_widget', 'tags', 'populer_posts'));
    }
    public function ListBlog(Posts $posts)
    {
        $tags = Tags::all();
        $category_widget = Category::all();
        $data = $posts::latest()->paginate(5);
        $populer_posts = Posts::orderBy('read', 'desc')->take(5)->get();
        return view('blog.listblog', compact('data', 'category_widget','tags', 'populer_posts'));
    }
    public function ListCategory(Category $Category)
    {
        $tags = Tags::all();
        $category_widget=Category::all();
        $data=$Category->posts()->paginate(5);
        $populer_posts = Posts::orderBy('read', 'desc')->take(5)->get();
        return view('blog.listblog', compact('data', 'category_widget','tags', 'populer_posts'));
    }
    public function Cari(Request $request)
    {
        $tags = Tags::all();
        $category_widget = Category::all();
        $populer_posts = Posts::orderBy('read', 'desc')->take(5)->get();
        $data = Posts::where('judul', $request->cari)->orWhere('judul', 'like', '%' .$request ->cari . '%')->paginate(5);
        return view('blog.listblog', compact('data', 'category_widget', 'tags','populer_posts'));
    }
}
