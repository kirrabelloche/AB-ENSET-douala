
@extends('main')
@section('title', '| Homepage')
@section('stylesheets')
    <link rel="stylesheet"type="text/css"href="style.css">
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron">
                <h1>Welcome to My Blog</h1>
                <p class="lead">thank you so musch for visiting. this is my test website built with Laravel.please read my latest post</p>

                <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
            </div>
        </div>


    </div><!-- end of header .row-->

   

        <div class="col-md-8">
            @foreach($posts as $post)

                <div class="jumbotron jumbotron-fluid ">
                    <div class="author-info">
                        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim("Auth::user()->email"))) . "?s=50&d=mm"}}" class="author-image">
                        <div class="author-name">
                            <h4> <strong>{{$post->category->name}}</strong></h4>
                            <h6 class="author-time">published: {{date('F nS, Y - g:iA',strtotime($post->created_at))}}</h6>
                            <h3 class="">{{$post->title}}</h3> 
                        </div> 
                    </div>
                    <div class="comment-content card-text">{{substr( $post->body, 0, 300)}}{{strlen($post->body)>50 ? "...":""}}</div>
                    
                    <img class="img-fluid" alt="Responsive image"src="../../documents/{{$post->file}}"  style="height: 400px; width: 100%; clear: both; display: block; ">
                    <div class="tags">Application:
                        @foreach ($post->tags as $tag)
                            <span class="label label-default">{{$tag->name}}</span>   
                        @endforeach
                    </div>
                    <br>
                    <a href="{{url('blog/'.$post->slug)}}" class="btn btn-sm btn-primary"> Read More</a>
                    <a href="{{url('blog/'.$post->slug)}}" class="btn btn-light">  <p style="font-size = 0.5em;" class="comment-title"><span class="glyphicon glyphicon-comment "></span>{{ $post->comments()->count() }}Comments</p></a>
                    
                </div>



                @endforeach





            <hr>

        </div>


        <div class="col-md-4">
            <div class="jumbotron">
              
            </div>
            
        </div>

        <div class="col-md-4">
            <div class="jumbotron">
                <h2>Sidebar</h2>
                <p>k,dkfnkn,c kv;,d kcn,v</p>
            </div>
            
        </div>
        <div class="col-md-2">
            <div class="jumbotron">
                <h2>Sidebar</h2>
                <p>k,dkfnkn,c kv;,d kcn,v</p>
            </div>
            
        </div>
        <div class="col-md-2">
            <div class="jumbotron">
                <h2>Sidebar</h2>
                <p>k,dkfnkn,c kv;,d kcn,v</p>
            </div>
            
        </div>


    </div>
   
@endsection
@section('scripts')
{{--    <script>--}}
{{--        confirm('I loaded up some js');--}}
{{--    </script>--}}
   <script src="{{ asset('js/like.js')}}">
    var token = '{{ Session::token() }}';
    var urlLike = '{{ route ('like') }}';
      
   </script>
@endsection
