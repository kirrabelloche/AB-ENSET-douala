@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit  <strong> {{ $user->name }} </strong></div>

                <div class="panel-body">
             {!! Form::model($roles, ['route' => ['admin.users.update', $user], 'method'=>'PATCH']) !!}
                   
                 
                    {{ csrf_field() }}
                  
                 
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="col-md-4 control-label">Name</label>

                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ?? $user->name }}" required autofocus>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div><br>
                    <br>


                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                        <div class="col-md-12">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email')?? $user->email }}" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <br>
                    <br>
                   
                    
                    @foreach ($roles as $role)
                    <div class="form-groupe form-check">
                        <input type="checkbox" name="roles[]" class="form-check-input" value="{{ $role->id }}" id="{{ $role->id }}"
                           @if ($user->roles->pluck('id')->contains($role->id))
                               checked
                           @endif
                        >
                        <label for="{{ $role->id }}" class="form-check-label">{{ $role->name }}</label>
                    </div>
                        
                    @endforeach
                    <button type="submit" class="btn btn-primary"> Edit roles</button>
 
                 </form>
         {!! form::close() !!}

                </div>
            </div>
        </div>
    </div>
</div>

@endsection