<?php

namespace App\Http\Controllers;

use App\Post;
use Session;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function getIndex2(){
        $posts = post::orderBy('id','desc')->paginate(3);

        return view('blog.index')->withPosts($posts);

    }
//    public function getIndes(){
//        $posts = post::paginate(10);
//        return view('blog.index')->withPost($posts);
//
//
//    }
    public function getSingle($slug){
        //on cherche dan la bd le slug
        $post = post::where('slug', '=',$slug)->first();
        //on retourne la vue en passant l'objet du post
        return view('blog.single')->withPost($post);

    }
}
