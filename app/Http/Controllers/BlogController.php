<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{

	public function getIndex(){
		$posts = Post::paginate(4);
		return view('blog.index', compact('posts'));
	}

    public function getSingle($slug){
    	//fetch from the DB based on slug
    	$post = Post::where('slug', '=', $slug)->first();

    	//return the view and pass in the post object

    	return view('blog.single', compact('post'));
    }
}
