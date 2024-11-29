<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Models\Blog;
use Illuminate\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function create(Request $request) : View{
        return view('blog.post');
    }

    public function index(Request $request) {
        $blogs = Blog::orderBy('created_at', 'desc') -> paginate(10);    

        return view('blog.index', ['blogs'=>$blogs]);
    }

    public function publish(Request $request){
        $user = Auth() -> user();
        $post = new Blog;
        $image = $request -> image;

        if ($image){
            $file = time().'.'.$image->getClientOriginalExtension();
            $request -> image -> move('media/posts',$file);
        } else {
            $file = '';
        }

        $post -> title = $request -> title;
        $post -> content = $request -> content;
        $post -> author = $user -> name;
        $post -> user_id = $user -> id;
        $post -> image = $file;

        $post -> save();

        return redirect() -> back() -> with('message', 'Post created successfully');

    }

    public function read($pk){
        $post = Blog::find($pk);

        return view('blog.read', ['blog'=>$post]);
    }
}
