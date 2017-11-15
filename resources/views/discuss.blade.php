@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
               @include('errors.errors')
                <div class="panel-heading">Create a new discussion</div>

                <div class="panel-body">
                  
                   <form action="{{ route('discussions.store') }}" method="post">
                       

                       {{ csrf_field() }}

                       <div class="form-group">
                           <label for="title">Title</label>
                           <input class="form-control" type="text" name="title">
                       </div>

                        <div class="form-group">
                            <label for="channel">Pick a Channel </label>
                            <select class="form-control" name="channel_id" id="channel_id">
                                
                                @foreach($channels as $channel)

                                    <option value="{{ $channel->id  }}">{{ $channel->title }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">Ask a Question </label>
                            <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success pull-right">Create Discussion</button>
                        </div>





                   </form>

                   
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


