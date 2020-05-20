@extends('main')
@section('title','|view Post')
@section('content')
    
@section('extra-js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <script>
       $(document).ready(function(){
        function toggleReplyComment(id)
        {
            let element = document.getElementById('replyComment-'+ id);
            element.classList.toggle('d-none');
 
        }
       $(".d-none").hide();
            $(".respond").click(function(e){
                e.preventDefault();
            $(this).siblings(".d-none").first().slideToggle();
            });

       });
      
       
   </script>
@endsection

     <div class="panel panel-default">
            <div class="panel-heading">
                <h5>{{ $topic->title }}</h5>
            </div>
            <div class="panel-body">
                <p> {{ $topic->content }}</p>

                <div class="d-flex justify-content-between align-items-center">
                    <small>posted: {{ $topic->created_at->format('d/m/y à H:m') }}</small>
                    <span  class="label label-info" style=" position: absolute;
                    left: 1210px;">{{ $topic->user->name }}</span>
                </div>
            </div>
            <br><br>
            <div class="row">
               
                <div class="col-xs-6 col-md-2 ">
                 
                    {!! Html::linkRoute('topics.edit','Edit Topic',array($topic->id), array('class'=>'btn btn-warning btn-block  btn-sm')) !!}
                 
                </div>
               
                <div class="col-xs-6 col-md-8 ">
                </div>
                
                <div class="col-xs-6 col-md-2">
                    
                    {!! Form::open(['route' => ['topics.destroy', $topic->id], 'method'=>'DELETE']) !!}
                    {!! Form::submit('Delete Topic', ['class' => 'btn btn-danger btn-block  btn-sm']) !!}
                    {!! Form::close() !!}
                    
                </div>
                
                <br><br>
            </div> 
     </div> 
        <hr>
        <h5>  <span class="glyphicon glyphicon-comment "> </span> {{ $topic->commment()->count() }} Comment</h5>
        
                @forelse ($topic->commment as $commment )
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="">{{ $commment->content }}</div><br>
                            <div class="d-flex justify-content-between align-items-center">
                                <small>posted: {{ $commment->created_at->format('d/m/y à H:m') }}</small>
                                <span  class="label label-info" style=" position: absolute;
                                left: 1210px;">{{ $commment->user->name }}</span>
                            </div>
                            

                    </div>
                </div>
                <style>
                    
                </style>
                
                <!-- <button class="btn btn-success respond"   style="position: absolute; margin-top: -20px; "  >Répondre</button><br>-->
                @auth
                    
               
                <form action="{{ route('commments.storeReply',$commment) }}" method="POST" class=" form-group " 
                 id="replyComment-{{  $commment->id  }} " >
                 {{ csrf_token() }}
                    <br>
                    <button class="btn btn-success respond"  onclick="toggleReplyComment( {{ $commment->id }} ) 
                        " style="position: absolute; margin-top: -20px; "  >Répondre</button><br>
                    <div class="form-group d-none" style="position: absolut; margin-left: 50px; ">
                    <label for="replyComment">Ma Réponse</label>
                    <textarea name="replyComment" id="replyComment" cols="" rows="2" class="form-control "></textarea>
                    <br>
                    <div class="col-sm-3">
                            <button type="submit" class="btn btn-primary">Repondre a ce commentaire </button>
                    </div>
                        <br><br>
                    </div>  
                </form>

                @endauth
                @empty
                    
                <div class="alert alert-info">Acun commentaire pour ce topic</div>
                
                @endforelse
                      
                
                    <br><br>        

                    
     
                </div>
                    <div class="row">
                        <div id="comment-form" class="col-md-8 col-md-offset-2" id="ancre">
                            {{ Form::open(['route'=>['commments.store', $topic], 'method'=>'POST']) }}
                            <div class="row">
                                <div class="col-md-12">
                                    {{ Form::label('content',"comment:") }}
                                    {{ Form::textarea('content',null, ['class' => 'form-control', 'rows' => '5']) }}
                                    <br>
                                    {{ Form::submit('Add comment', ['class' => 'btn btn-primary btn-block']) }}
                                </div>
                            </div>

                            {{ Form::close() }}

                    
                        </div>
                    </div>
              
       

@endsection