@extends('layouts.app')

@section('content')
  
         @foreach($discussions as $d)

            <div class="panel panel-default">
                 <div class="panel-heading">
                     <img src="{{ $d->user->avatar }}" alt="" width="40px" height="40px"> 
                     &nbsp; &nbsp; &nbsp;

                    <span>{{ $d->user->name }}, <br> <br> Posted:  {{ $d->created_at->toDateTimeString() }}</span>

                      @if($d->hasBestAnswer())
                         
                          <span class="btn btn-danger btn-xs pull-right">CLOSED</span>

                      @else
                        <span class="btn btn-success btn-xs pull-right">OPEN</span>


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
                     <p class="text-center"> {{ str_limit($d->content, 100) }}
                        <br>

                        <a href="{{route('discussion',['slug'=> $d->slug])}}" class="btn btn-primary pull-right">Read more..</a>
                     </p>

                 </div>

                 <div class="panel-footer">
                     <span>
                         Replies{{ $d->replies->count() }} 
                     </span>
                     <a class="btn btn-primary btn-xs pull-right" href="{{ route('channel',['slug'=>$d->channel->slug])}}">{{ $d->channel->title }}</a>
                 </div>
               
            </div>

        @endforeach  

        <div class="text-center">
            {{ $discussions->links() }}
        </div>  
    
@endsection
