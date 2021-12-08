<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail(Post $post)
    {   
        return view('detail',[
            'detail' => $post
        ]);
    }
     
     public function admin()
    {   
        if(auth()->user()->role == 0 ){
            $data = Post::where('user_id', auth()->user()->id)->paginate(6);
        }else{
            $data = Post::latest()->paginate(6);
        }
        return view('admin.dashboard', compact('data'));
    }
    
     public function index()
    {
        
        $data = Post::latest()->paginate(6);
        return view('index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.index',[
            'categories' => Category::get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|unique:posts',
            'foto' => 'image|file|max:2048',
            'deskripsi' => 'required',
            'category_id' => 'required'
        ]);
        $slug = Str::slug($request->judul, '-');
        $data['slug'] = $slug;
        $name = time().'.'.$request->foto->getClientOriginalExtension();
        $data['foto'] = $name;
        request()->foto->move(public_path('/foto'), $name);
        // $data['foto'] = $request->file('foto')->store('foto');
        $data['user_id'] = auth()->user()->id;
        // dd($data);
        Post::create($data);
        return redirect ('/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Post::findOrFail($id);
        return view ('post.edit')->with([
            'edit' => $data,
            'categories' => Category::get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
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
        $rules = [
            'judul' => 'required',
            'slug' => 'required',
            'foto' => 'image|file|max:2048',
            'deskripsi' => 'required',
            'category_id' => 'required'
        ];
        $post = $request->validate($rules);
        if($request->file('foto')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $post['foto'] = $request->file('foto')->store('post-images');
        }
        $post['user_id'] = auth()->user()->id;
        Post::find($id)->update($post);
        return redirect ('/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if($post->foto){
            $storage = 'foto/'.$post->foto;
            unlink($storage);
        }
        $post->delete();
        return redirect ('/dashboard')->with('succes','Data berhasil dihapus!');
    }
}
