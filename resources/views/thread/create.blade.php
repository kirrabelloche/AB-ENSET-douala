@extends('main') 

@section('title','| Create new Topic')
@section('extra-js')
   



@endsection


@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Create New Topic</h1>
            <hr>
        

         {!! Form::open(array('route'=>'thread.store','data-parsley-validate' =>'','enctype'=>'multipart/form-data')) !!}
                {{Form::label('subject','Surjet :')}}
                {{Form::text('subject',null,array('class'=>'form-control input-lg', 'required'=>'','maxlength' =>'255'))}}

          
                {{Form::label('type','Type de surject :'),['class'=>'form-spacing-top']}}
                {{Form::text('type',null,array('class'=>'form-control input-lg'))}}
    

            {{Form::label('thread','contenu :'),['class'=>'form-spacing-top']}}
            {{Form::textarea('thread',null,array('class'=>'form-control input-lg'))}}

            
                {{Form::submit('Create thread', array('class'=>'btn btn-success btn-lg btn-block', 'style'=>'margin-top: 20px;'))}}

               
            {!! Form::close() !!}




        </div>
    </div>
    @endsection
    @section('scripts')


</script>
@endsection
