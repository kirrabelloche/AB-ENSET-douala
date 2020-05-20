@extends('main')

@section('title', '| Edit Topic')

@section('stylesheets')
{!! Html::style('css/select2.min.css') !!}

  
@endsection
@section('content')
   <div class="row">
        {!! Form::model($topic, ['route' => ['topics.update', $topic->id], 'method'=>'PUT']) !!}
        <div class="col-md-8">
            <h1>update topic </h1>
            <hr>

         {{Form::label('title','Title :')}}
                {{Form::text('title',null,array('class'=>'form-control input-lg' , 'required'=>'','maxlength' =>'255'))}}
                <br>
           

            

            {{Form::label('content','Post Content :' )}}
            {{Form::textarea('content',null,array('class'=>'form-control input-lg','required'=>''))}}
            <br>

              
            <div class="col-sm-12">
                      
                {!! Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) !!}
             
                

            </div>

        </div>
        
        {!! form::close() !!}
    </div>
 
@stop
@section('scripts')  
    </script>
@endsection

    

