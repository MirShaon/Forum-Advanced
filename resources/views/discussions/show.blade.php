@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                 <div class="panel-heading">
                     <img src="{{ $d->user->avatar }}" alt="" width="40px" height="40px"> 
                     &nbsp; &nbsp; &nbsp;
                    <span>{{ $d->user->name }}  ({{ $d->user->points }})</span>


                    @if($d->hasBestAnswer())
                         
                          <span class="btn btn-danger btn-xs pull-right">CLOSED</span>

                      @else
                        <span class="btn btn-success btn-xs pull-right">OPEN</span>


                      @endif


                      @if(Auth::id()== $d->user->id)

                        @if(!$d->hasBestAnswer())
                            <a href="{{ route('discussion.edit',['slug'=>$d->slug]) }}" class="btn btn-info btn-xs pull-right" style="margin-right: 8px;" >Edit</a>
                        @endif
                      
                      @endif


                    @if($d->is_being_watched_by_auth_user())
                    <a href="{{ route('discussion.unwatch',['id'=>$d->id]) }}" class="btn btn-danger btn-xs pull-right" style="margin-right: 8px;" >Unwatch</a>
                    @else

                    <a href="{{ route('discussion.watch',['id'=>$d->id]) }}" class="btn btn-primary btn-xs pull-right" style="margin-right: 8px;">Watch</a>
                    @endif


                     
                 </div>
                 <div class="panel-body">
                      
                        <div class="panel-heading">
                             <h4 class="text-center">

                                 <a href="{{route('discussion',['slug'=> $d->slug])}}">
                                {{$d->title}}
                                 </a>

                             </h4>
                            

                        </div>
                        <hr>
                      <p class="text-center">
                     	

                          {!!  Markdown::convertToHtml($d->content) !!}
                        
                        <br>

                      </p>
                      <hr>
                      @if($best_answer)

                        <div class="text-center" style="padding: 40px;">
                            <h2 class="text-center">Best Answer</h2>
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                     <img src="{{ $best_answer->user->avatar }}" alt="" width="40px" height="40px"> 
                                     &nbsp; &nbsp; &nbsp;
                                    <span>{{ $best_answer->user->name }} ({{ $best_answer->user->points }}) <br></span>
                                </div>
                                <div class="panel-body">
                                    {!!  Markdown::convertToHtml($best_answer->content) !!}
                                    
                                </div>
                            </div>
                        </div>
                     @endif


                 </div>

                 <div class="panel-footer">
                     

                     <span>
                         Replies{{ $d->replies->count() }} 
                     </span>
                     <a class="btn btn-primary btn-xs pull-right" href="{{ route('channel',['slug'=>$d->channel->slug])}}">{{ $d->channel->title }}</a>
                 </div>
               
            </div>


            @foreach($d->replies as $r)

                <div class="panel panel-default">
                 <div class="panel-heading">
                     <img src="{{ $r->user->avatar }}" alt="" width="40px" height="40px"> 
                     &nbsp; &nbsp; &nbsp;
                    <span>{{ $r->user->name }},({{ $r->user->points }}) <br> Posted:  {{ $r->created_at->toDateTimeString() }} </span>


                    @if(!$best_answer)

                       @if(Auth::id() == $r->user->id)

                            <a href="{{ route('discussion.best.answer',['id'=>$r->id]) }}" class="btn btn-xs btn-primary pull-right" style="margin-left: 8px;">Mark as a best answer</a>

                        @endif




                        
                    @endif


                        @if(  Auth::id() == $r->user->id )

                            @if(!$r->best_answer)
                           
                             <a href="{{ route('reply.edit',['id'=>$r->id]) }}" class="btn btn-xs btn-info pull-right">Edit</a>

                            @endif

                        @endif

                     
                 </div>
                 <div class="panel-body">
                   
                     <p class="text-center">
                     	{!!  Markdown::convertToHtml($r->content) !!}
                        <br>

                     </p>

                 </div>

                 <div class="panel-footer">
                     @if($r->is_liked_by_auth_user())

                       <a href="{{ route('reply.unlike',['id'=>$r->id])  }}" class="btn btn-danger">

                       Unlike | <span class="badge">{{ $r->likes->count() }}</span>

                      </a>

                     @else

                       <a href="{{ route('reply.like',['id'=>$r->id])  }}" class="btn btn-primary">Like | <span class="badge">{{ $r->likes->count() }}</span></a>

                     @endif
                 </div>
               
            </div>



             

            @endforeach

     <div class="panel panel-default">
     	<div class="panel-body">
     		@if(Auth::check())
     		<form action="{{ route('discussion.reply',['id'=>$d->id])}}" method="post">
     			{{ csrf_field() }}
     			<div class="form-group">
     				<label for="content">Leave a reply</label>
     				<textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
     			</div>

     			<div class="form-group">
     				<button type="submit" class="btn btn-primary pull-right">Leave A Reply</button>
     				
     			</div>



     		</form>

     		@else
                    <div class="text-center">
                    	Sign in to leave a Comment
                    </div>

     		@endif
     	</div>
     </div>


    
@endsection


@section('styles')

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">

@endsection


@section('scripts')

<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>


<script>
  
  $(document).ready(function() {
  $('#content').summernote();
});

</script>
@endsection
