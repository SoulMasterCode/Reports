@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Send Report {{$report->title}}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="/reports" class="btn btn-secondary">Back</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <form action="/reports/{{$report->id}}/sendMail" method="post">
            @csrf
                <div class="form-group mt-4">
                    <label for="email">Mail:</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Type a email" value="{{old('email')}}">
                    @error('email')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
    
@endsection