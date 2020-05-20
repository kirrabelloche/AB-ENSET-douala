@extends('layouts.admin')
@section('title', '|All posts')
@section('content')



<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> All Posts</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href=" {{ url('/home') }} ">Dashboard</a></li>
            <li class="breadcrumb-item active">All Posts v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

    <div class="row">
        <div class="col-md-10">
            <h1>All Posts</h1>
        </div>
        <div class="col-md-2">
            <a href="{{route('posts.create')}}" class="btn btn-lg btn-block btn-primary btn-h1-spacing"> Create New Post</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table">
              <thead class="text-center">
                  <th>Number</th>
                  <th>Title</th>
                  <th>slug</th>
                  <th>Body</th>
                  <th>File</th>
                   
                  <th>Created At</th>

                  <th>Action</th>

              </thead>

                <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <th>{{$post->id}}</th>
                            <td>{{$post->title}}</td>
                            <td><a href="{{url($post->slug)}}">{{url($post->slug)}}</a></td>
                            <td>{{substr(strip_tags($post->body), 0, 30)}}{{strlen(strip_tags($post->body))> 50 ? "...":""}}</td>
                            <td><img src="../../documents/{{$post->file}}"  style="height: 40px; width: 40px; clear: both; display: block; "></td>

                            <td>{{ date('j M ,Y / H:ia',strtotime($post->created_at))}}</td>
                            <td><a href="{{route('posts.show',$post->id)}}" class="btn btn-info btn-sm">view</a>
                                <a href="{{route('posts.edit',$post->id)}}" class="btn btn-info btn-sm ">Edit</a></td>
                        </tr>
                    @endforeach

                 </tbody>

            </table>
            <div class="text-center ">
            
                {!! $posts->links(); !!}
            </div>
        </div>
    </div>
@stop

