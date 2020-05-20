@extends('main')
@section('title', "| Edit Tag")
@section('content')
 
{{ Form::model( $tag, ['route'=>['tags.update', $tag->id], 'method'=>"PUT"]) }}
   
    {{ Form::label('title', "Title:") }}
    {{Form::text('title',null,array('class'=>'form-control','required'=>'', 'minlength'=>'3', 'maxlength'=>'255'))}}
    <br>
    {{ Form::submit('Save Change', ['class'=> 'btn btn-success']) }}

{{ Form::close() }}
@endsection