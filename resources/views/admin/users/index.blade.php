@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Listes des utilisateurs</div>
                <div class="row">
                  <div class="col-md-12">
              
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col"># </th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user )
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ implode(' ,  ', $user->roles()->get()->pluck('name')->toArray()) }}</td>
                                <td>
                                  @can('edit-users')
                                    
                                               
                                            <a href=" {{ route('admin.users.edit',$user->id) }} " ><button class="btn btn-info btn-sm">Edit</button> </a>

                                      
                                    @endcan
                                  @can('delete-users')
                                  
                                    <form  action="{{ route('admin.users.destroy',$user->id) }}" method="DELETE"  class="bb"  
                                      style=" position: relative; ">
                                  
                                      {{ csrf_field() }}
                                        <button class="btn btn-danger btn-sm" type="submit">DELETE</button>
                                    </form>
                                 
                                   
                                    @endcan
                                     
                                </td>
                              </tr>
                                
                            @endforeach
                         
                          
                        </tbody>
                      </table>
                   

                
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection