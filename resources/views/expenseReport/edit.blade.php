@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Editing Report {{$report->id}}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="/reports" class="btn btn-secondary">Back</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <form action="/reports/{{$report->id}}" method="post">
            @csrf
            @method('put')
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control" placeholder="{{$report->title}}">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
    
@endsection