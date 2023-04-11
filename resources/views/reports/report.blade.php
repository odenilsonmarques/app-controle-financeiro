<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Relatório</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center">Lançamentos</h1>
                <table class="table">
                    <thead class="table header-table">
                        <tr>
                            <th>#</th>
                            <th>Lançamento</th>
                            <th>Pessoa</th>
                            <th>Valor</th>
                            <th>Mês</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr>
                                <td>{{$data->id}}</td>
                                <td>{{$data->release_type}}</td>
                                <td>{{$data->person}}</td>
                                <td>R$ {{number_format($data->amount, 2, ',', '.')}}</td>
                                <td>{{$data->month}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>


