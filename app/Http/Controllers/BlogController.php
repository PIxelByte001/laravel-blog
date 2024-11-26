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

    public function publish(Request $request){
        $user = Auth() -> user();
        $post = new Blog;

        $post -> title = $request -> title;
        $post -> content = $request -> content;
        $post -> author = $user -> name;

        $post -> save();

        return redirect() -> back() -> with('message', 'Post created successfully');

    }
}
