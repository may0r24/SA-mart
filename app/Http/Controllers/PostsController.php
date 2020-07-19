<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Posts;
use App\About;

class PostsController extends Controller
{
    public function index(){

        $posts = Posts::orderBy('id', 'desc')->get();
        $abouts = About::all();

        return view('welcome', ['posts' => $posts])->with(['abouts'=>$abouts]);;
    }

    public function store(Request $request){
        $errors = [];

        $post = new Posts();
        $post->title = request('title');
        $post->content = trim(request('content'));
        $hasImage = $request->hasFile('image');

        if($post->title == null || $post->title == ''){
            $errors['title'] = 'Post title is required';
        }
        if($post->content == null || $post->content == ''){
            $errors['content'] = 'Post content is required';
        }
        if(!$hasImage){
            $errors['postimage'] = 'Post image is required';
        }

        if(!empty($errors)){
            return redirect('/home')->with('errors', $errors)->with('post', $post);
        }
        $current_timestamp = Carbon::now()->timestamp; 
        $image = $request->image->getClientOriginalName();
        $image = $current_timestamp . '_' .$image;
        $request->image->storeAs('post_images', $image, 'public');
        $post->image = $image;

        $post->save();

        return redirect('/home')->with('message', 'Post Created!');
    }

    public function destroy($id){

        $post = Posts::findOrFail($id);
        $image = $post->image;
        if($image){
            Storage::delete('/public/post_images/'.$image);
        }
        
        $post->delete();
        
        return redirect('home')->with('delete-post-message', 'Post Deleted!');
    }
}
