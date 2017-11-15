@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
                <div class="panel-heading">Update Channel :{{ $channel->title }}</div>

                <div class="panel-body">
                       <form action="{{ route('channels.update',['channel'=>$channel->id]) }}" method="post">

                           {{ csrf_field() }}
                           {{ method_field('PATCH') }}

                           <div class="form-group">
                               <input type="text" value="{{ $channel->title }}" name="channel" class="form-control">
                           </div>
                           <div class="form-group">
                               <div class="text-right">
                                   <button type="submit" class="btn btn-success">Update Channel</button>
                               </div>
                           </div>


                       </form>
                </div>
            </div>
      
@endsection
