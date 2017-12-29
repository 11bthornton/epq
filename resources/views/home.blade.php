@extends('layouts.app') 
@section('content')

<div class="container">
       <div class="jumbotron feature shadow">
    <h1>Welcome to PollNation</h1>
    <h3><i>Providing answers to life's more important questions</i></h3>
    <a class="btn btn-button" href="/poll/create"><h5>Create your own poll now</h5></a>
</div>
    <div class="row">
        <div class="col-md-4">
        <div class="iconbox shadow">
          <div class="iconbox-icon">
            <span class="glyphicon glyphicon-ok"></span>
          </div>
          <div class="featureinfo">
            <h4 class="text-center">Free</h4>
            <p>
              PollNation believes that information should be free. Therefore we will always offer
              our services for no cost. Happy Polling!
            </p>
            <hr>
        
          </div>
        </div>
        </div>
        <div class="col-md-4">
           <div class="iconbox shadow">
          <div class="iconbox-icon">
            <span class="glyphicon glyphicon-flash"></span>
          </div>
          <div class="featureinfo">
            <h4 class="text-center">Intuitive</h4>
            <p>
              PollNation believes that information should be free. Therefore we will always offer
              our services for no cost. Happy Polling!
            </p>
            <hr>
           
          </div>
        </div>
        </div>
        <div class="col-md-4">
           <div class="iconbox shadow">
          <div class="iconbox-icon">
            <span class="glyphicon glyphicon-heart-empty"></span>
          </div>
          <div class="featureinfo">
            <h4 class="text-center">Brilliant</h4>
            <p>
             PollNation believes that information should be free. Therefore we will always offer
              our services for no cost. Happy Polling!
            </p>
            <hr>
            
          </div>
        </div>
        </div>
    </div>
    @foreach($polls as $poll)
    <div class="panel shadow">
        <div class="poll panel-heading">
        <h2><a href="/poll/{{$poll->key}}" class="link">{{$poll->body}}</a></h2>
        </div>
        <div class="panel-body">
            <h4>Created at {{$poll->created_at}}</h4>
        </div>
    </div>
    @endforeach

</div>
@endsection
