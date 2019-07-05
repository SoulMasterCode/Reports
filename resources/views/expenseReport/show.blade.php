@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Report: {{$report->title}}</h1>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <a href="/reports" class="btn btn-secondary">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col mt-3 mb-3">
        <a href="/reports/{{$report->id}}/expenses/create" class="btn btn-primary">Add Expense</a>
        <a href="/reports/{{$report->id}}/confirmMail" class="btn btn-info">Send Email</a>
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <table class="table">
                <tr>
                    <th>Descripción</th>
                    <th>Fecha de creación</th>
                    <th>Fecha de actualización</th>
                    <th>Monto</th>
                </tr>
                @foreach ($report->expense as $expense)
                    <tr>
                        <td>{{$expense->description}}</td>
                        <td>{{$expense->created_at}}</td>
                        <td>{{$expense->updated_at}}</td>
                        <td>${{$expense->amount}}</td>
                        <td><a href="/reports/{{$report->id}}/expenses/{{$expense->id}}/edit" class="btn btn-outline-success">Edit</a></td>
                        <td><a href="/reports/{{$expense->id}}/expenses/{{$expense->id}}/confirm" class="btn btn-outline-danger">Delete</a></td>
                    </tr>
                @endforeach

            </table>
            <div class="container" style="text-align: center">
                <h1 class="mt-5">Total: ${{$total}}</h1>  
            </div>
              
        </div>
    </div>

</div>
    
@endsection