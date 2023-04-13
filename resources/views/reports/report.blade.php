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
            <div class="col-lg-12 text-center">
                <h1 style="text-align: center">Lançamentos</h1>
                <table class="table" border="1px" width="100%">
                    <thead class="table header-table">
                        <tr style="background-color:darkgray;">
                            <th>#</th>
                            <th>Lançamento</th>
                            <th>Pessoa</th>
                            <th>Valor</th>
                            <th>Mês</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach($datas as $data)
                            <tr style="text-align:left">
                                <td>{{$data->id}}</td>
                                <td>{{$data->release_type}}</td>
                                <td>{{$data->person}}</td>
                                <td>R$ {{number_format($data->amount, 2, ',', '.')}}</td>
                                <td>{{$data->month}}</td>
                            </tr>
                        @endforeach

                            <tr style="text-align: left;background-color:darkgray;">
                                <td colspan="3"></td>
                                <td>
                                   <strong>R$ {{number_format($soma, 2, ',', '.')}}</strong>
                                </td>
                                <td></td>

                            </tr>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>
</body>
</html>


