@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>New Report</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="/reports" class="btn btn-secondary">Back</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <form action="/reports" method="post">
            @csrf
                <div class="row mt-5">
                    <div class="col">
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger">
                                {{$error}}
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Type a title">
                    @error('title')
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