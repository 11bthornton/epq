@extends('layouts.app') 
@section('content')
<div class="container">
    <div class="panel panel-default shadow">
        <div class="panel-heading"><h1>{{$question->body}}</h1></div>
        <div class="panel-body">
            @foreach($options as $option) 
            <h3>{{$option->body}} - {{$option->percentage}}%</h3>
            <h5>{{$option->votes}} votes</h5>
            <div style="width: {{$option->percentage}}%;" class="percentage">
                <h4></h4>
            </div>
            @endforeach
            <hr>
            <h3>Demographic Analysis</h3>
            <h5>By gender:</h5>
            <table class="table table-default">
                <thead>
                    <th scope="col">Option</th>
                    <th scope="col">Male Votes</th>
                    <th scope="col">Female Votes</th>
                    <th scope="col">Other Votes</th>
                </thead>
                <tbody>
                    @foreach($options as $option)
                    <tr>
                        <td>{{$option->body}}</td>
                        <td>{{$option->MaleVotes}}</td>
                        <td>{{$option->FemaleVotes}}</td>
                        <td>{{$option->OtherVotes}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <h5>By age</h5>
            <table class="table table-default">
                <thead>
                    <th scope="col">Option</th>
                    <th scope="col">Under 18s</th>
                    <th scope="col">18 - 30</th>
                    <th scope="col">30 - 50</th>
                    <th scope="col">50 - 65</th>
                    <th scope="col">Over 65</th>
                </thead>
                <tbody>
                    @foreach($options as $option)
                    <tr>
                        <td>{{ $option->body }}</td>
                        <td>{{ $option->range1 }}</td>
                        <td>{{ $option->range2 }}</td>
                        <td>{{ $option->range3 }}</td>
                        <td>{{ $option->range4 }}</td>
                        <td>{{ $option->range5 }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection