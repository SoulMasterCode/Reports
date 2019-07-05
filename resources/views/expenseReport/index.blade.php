@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Reports de {{Auth::user()->name}}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
        <a href="/reports/create" class="btn btn-primary">Create a new report</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <table class="table">
                <tr>
                    <th>Titulo</th>
                    <th>Fecha de creación</th>
                    <th>Fecha de actualización</th>
                </tr>
                @foreach ($expense_reports as $report)
                    <tr>
                        <td><a href="/reports/{{$report->id}}">{{$report->title}}</a></td>
                        <td>{{$report->created_at}}</td>
                        <td>{{$report->updated_at}}</td>
                        <td><a href="/reports/{{$report->id}}/edit" class="btn btn-outline-success">Edit</a></td>
                        <td><a href="/reports/{{$report->id}}/confirm" class="btn btn-outline-danger">Delete</a></td>
                    </tr>
                @endforeach 
            </table>
        </div>
    </div>

</div>
       
@endsection
