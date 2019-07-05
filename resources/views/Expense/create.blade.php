@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>New Expense</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="/reports/{{$report->id}}" class="btn btn-secondary">Back</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <form action="/reports/{{$report->id}}/expenses" method="post">
            @csrf
                <div class="form-group">
                    <label for="description">Description:</label>
                    <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" placeholder="Type a description">
                    @error('description')
                        <div class="alert alert-danger">
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Amount:</label>
                    <input type="text" name="amount" id="amount" class="form-control @error('amount') is-invalid @enderror" placeholder="Type a amount">
                    @error('amount')
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