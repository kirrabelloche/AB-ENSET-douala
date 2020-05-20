@extends('main')

@section('title', '| Forum')


@section('content')

<div class="col-md-12">
    <div class="jumbotron">
        <h2>My Forum</h2>
        <p class="lead">thank you so musch for visiting. this is my test website built with Laravel.please read my latest forum</p>

        <p><a class="btn btn-primary btn-sm" href="#" role="button">myPopular Post forum </a></p>
    </div>
</div>
   
<div class="container">

     <div class="row">
         <div class="row content-heading">
             <div class="col-md-3"><h4>Categories</h4></div>
             <div class="col-md-4"></div>
             <div class="col-md-offset-6 col-md-2">
                 <a href="{{ route('thread.create') }}" class="btn btn-success">Create Thread</a>
             </div>
         </div>
     </div>

    <div class="row">

        <div class="col-md-3">
            <a href="#" class="list-group-item">
                <span class="badge">14</span>
                All Thread
            </a>
            <a href="#" class="list-group-item">
                <span class="badge">2</span>
               php
            </a>
            <a href="#" class="list-group-item">
                <span class="badge">4</span>
               python
            </a>
        </div>
  

            <div class="col-md-9">
                <div class="content-wrap well">
                    <div class="list-group">
                        @forelse($threads as $thread)
                        <a href="{{ route('thread.show',$thread->id) }}" class="list-group-item" >
                            <h4 class="list-group-item-heading">{{ $thread->subject }}</h4>
                            <p class="list-group-item-text">{{ str_limit($thread->thread,100) }}</p>
        
                        </a>
                            
                        @empty
                        <h5>No threads</h5>
                            
                        @endforelse
        
                    </div>

                </div>
            </div>
                <h2> Threads</h2>
           
   </div>
</div>
</div>
  
@endsection

    

