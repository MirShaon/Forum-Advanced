@extends('layouts.app')

@section('content')

            <div class="panel panel-default">
               @include('errors.errors')
                <div class="panel-heading">Update Reply</div>

                <div class="panel-body">
                  
                   <form action="{{ route('reply.update',['id'=>$reply->id]) }}" method="post">
                       

                       {{ csrf_field() }}

                       

                        
                        <div class="form-group">
                            <label for="content">Answer a Question </label>
                            <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ $reply->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success pull-right">update Reply</button>
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