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
                <h1 style="text-align: center; font-size:20px">Controle de Despesas e Receitas</h1>
                <p>Gerado em: @php echo date('d/m/Y')."<br/>";@endphp</p>

                <div class="row">
                    <div class="col-lg-12" style="border:1px solid #ccc; padding:20px; text-align:center">
                        <strong>Saldo R$ {{number_format($balance, 2, ',', '.')}}</strong>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6" style="border:1px solid #ccc; padding:20px; text-align:center; margin-top:5px">
                        Despesas -------------------------------- R$ {{number_format($sumExpenseValues, 2, ',', '.')}}<br><br>
                        Receitas -------------------------------- R$ {{number_format($sumRenevueValues, 2, ',', '.')}}
                    </div>
                </div><br>

                <table class="table"  width="100%">
                    <thead class="table">
                        <tr>
                            <th style="text-align:left">Lançamento</th>
                            <th style="text-align:left">Pessoa</th>
                            <th style="text-align:left">Valor</th>
                            <th style="text-align:left">Mês</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($datas as $data)
                            <tr style="text-align:left">
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
