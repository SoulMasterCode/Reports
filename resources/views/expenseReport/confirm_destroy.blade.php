@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Delete Report {{$report->id}}</h1>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <form action="/reports/{{$report->id}}" method="post">
            @csrf
            @method('Delete')
                <div class="form-group">
                    <label for="title">Deseas Eliminar el Reporte:</label>
                    <p class="alert alert-danger">{{$report->title}}</p>
                </div>
                <button type="submit" class="btn btn-primary">Si</button>
                <a href="/reports" class="btn btn-secondary">No</a>
            </form>
        </div>
    </div>

</div>
    
@endsection