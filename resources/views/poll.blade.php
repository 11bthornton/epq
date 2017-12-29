@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="panel panel-default shadow">
        <div class="panel-heading">
            <h1>{{$poll->body}}</h1></div>
        <div class="panel-body">
            <form action="/poll/vote" method="post">
               {{csrf_field()}}
               <input type="hidden" value="{{$poll->id}}" name="PollID">
                <div class="funkyradio"> 
                   @foreach($options as $option)
                    <div class="funkyradio-default">
                        <input type="radio" name="radio" id="{{$option->body}}" value="{{$option->id}}" required>
                        <label for="{{$option->body}}">
                            <h3>{{$option->body}}</h3></label>
                    </div> 
                    @endforeach 
                    <hr>
                <div class="form-group">
                    <button class="btn btn-default" type="submit">Vote</button>
                </div>
             </form>
            </div>
        </div>
    </div>
</div> 
@endsection