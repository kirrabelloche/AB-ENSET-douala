@extends('main')
@section('title', '|Bog')
@section('content')

    
    <div class="col-md-12">
        <div class="jumbotron">
            <h2>My Blog</h2>
            <p class="lead">thank you so musch for visiting. this is my test website built with Laravel.please read my latest post</p>

            <p><a class="btn btn-primary btn-sm" href="#" role="button">myPopular Post</a></p>
        </div>
    </div>

  @foreach($posts as $post)
      <div class="row">
          <div class="col-md-10 col-md-offset-2 ">
            <div class="jumbotron jumbotron-fluid ">

                <div class="author-info">
                    <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim("Auth::user()->email"))) . "?s=50&d=mm"}}" class="author-image">
                    <div class="author-name">
                        <h4> <strong>{{$post->category->name}}</strong></h4>
                        <p class="author-time">published: {{date('F nS, Y - g:iA',strtotime($post->created_at))}}</p>
                        <h4 class="">{{$post->title}}</h4>
                       
                    </div>
                    <div class="comment-content">{{substr( $post->body, 0, 300)}}{{strlen($post->body)>50 ? "...":""}}</div>
                </div>
                
                
                
              
              
               <div> <p></p></div>
              <img class="img-fluid" src="../../documents/{{$post->file}}"  style="height: 400px; width: 100%; clear: both; display: block; ">
             
              <br>
              <a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary"> Read More</a>
              
            </div>
          </div>
      </div>
      <hr>
    @endforeach
    <div class="row">
        <div  class="text-center">

            {!! $posts->links(); !!}
        </div>
    </div>


    @endsection