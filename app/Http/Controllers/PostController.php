<?php

namespace App\Http\Controllers;

use App\Posts;
use Stringable;
use App\Category;
use App\Tags;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post=Posts::paginate(10);
        return view('admin.post.index', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::all();
        $tags = Tags::all();
        return view('admin.post.create',compact('category','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul'=>'required',
            'category_id' => 'required',
            'content' => 'required',
            'gambar' => 'required',
        ]);
        $gambar=$request->gambar;
        $new_gambar=time().$gambar->getClientOriginalName();
        $post=Posts::create([
             'judul'=>$request->judul,
            'category_id' =>$request->category_id,
            'content' =>$request->content,
            'gambar' => $new_gambar,
            'slug'=>Str::slug($request->judul),
            'users_id'=>Auth::id(),
        ]);
        $post->tags()->attach($request->tags);
        $gambar->move('uploads/posts/' ,$new_gambar);
        return Redirect()->route('post.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags=Tags::all();
        $category = Category::all();
        $post=Posts::findorfail($id);
        return view('admin.post.edit', compact('post','tags','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'category_id' => 'required',
            'content' => 'required',
        ]);
        $post=Posts::findorfail($id);
if ($request->has('gambar')) {
            $gambar = $request->gambar;
            $new_gambar = time() . $gambar->getClientOriginalName();
            $gambar->move('uploads/posts/', $new_gambar);
            $post_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'gambar' => $new_gambar,
                'slug' => Str::slug($request->judul),
            ];
}else{
            $post_data = [
                'judul' => $request->judul,
                'category_id' => $request->category_id,
                'content' => $request->content,
                'slug' => Str::slug($request->judul),
            ];
}
        $post->tags()->sync($request->tags);
        $post->update($post_data);
        return Redirect()->route('post.index')->with('update', 'Data Berhasil Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Posts::findorfail($id);
        $post->delete();
        return Redirect()->route('post.index')->with('delete', 'Data Berhasil Dihapus Ketrash Post');
    }
    public function ShowDelete()
    {
    $post = Posts::onlyTrashed()->paginate(10);
    return view('admin.post.showdelete', compact('post'));
    }
    public function restore($id)
    {
    $post=Posts::withTrashed()->where('id',$id)->first();
    $post->restore();
    return redirect()->route('post.ShowDelete')->with('success', 'Data Berhasil Di Restore Ke post');
    }
    public function kill($id)
    {
        $post = Posts::withTrashed()->where('id', $id)->first();
        $post->tags()->detach();
        $post->forceDelete();
        return redirect()->route('post.ShowDelete')->with('delete', 'Data Berhasil Di  Dihapus Permanen');
    }
}
