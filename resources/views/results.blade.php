@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="panel panel-default shadow">
        <div class="panel-heading"><h1>{{$question->body}}</h1></div>
        <div class="panel-body">
           <div class="row">
           <div class="col-md-4">
            <table class="table table-bordered">
                @foreach($options as $option)
                <tr>
                    <td>
                        <h3>{{$option->body}}</h3>
                        <h3>{{$option->votes}} votes.</h3>
                    </td>
                </tr>
                @endforeach
            </table>
               </div>
               <div class="col-md-8">
               </div>
            </div>
            <hr>
            <h3>Demographic Analysis:</h3>
        </div>
    </div>
</div>
@endsection