<div class="row">
    <div class="col">
        <h1>Report: {{$report->title}}</h1>
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
                </tr>
            @endforeach

        </table>
        <div class="container">
            <h1 class="mt-5">Total: ${{$total}}</h1>  
        </div>
          
    </div>
</div>