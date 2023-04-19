<div class="row">
    <div class="col-sm-12 mb-3">
        <label for="release_type" class="form-label">Tipo de Lançamento</label>
        <select name="release_type" id="release_type" class="form-select" autofocus required>
            <option value="">---- Selecione ----</option>
            <option value="Despesa" {{old('release_type') == 'Despesa' ? ' selected':''}}>Despesa</option>
            <option value="Receita" {{old('release_type') == 'Receita' ? ' selected': ''}}>Receita</option>
        </select>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 mb-3">
        <label for="person" class="form-label">Pessoa</label>
        <input type="text" name="person" id="person" value="{{old('person')}}" class="form-control"  maxlength="30" placeholder="Digite o nome" required> 
    </div>
</div>

<div class="row">
    <div class="col-sm-12 mb-3">
        <label for="amount" class="form-label">Valor</label>
        <input type="text" name="amount" id="amount" value="{{old('amount')}}" class="form-control" onkeyup="formatCoin();"  placeholder="R$" required>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 mb-3">
        <label for="mes" class="form-label">Mês</label>
        <select name="month" id="month" class="form-select">
            <option value="">---- Selecione ----</option>
            @foreach($months as $month)
                <option value="{{$month}}" {{old('month') == $month ? ' selected':''}} required>{{$month}}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 mb-5">
        <label for="description" class="form-label">Descrição</label>
        <textarea class="form-control" name="description" placeholder="Digite uma descrição" aria-label="With textarea" required>{{old('description')}}</textarea>
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <button class="btn btn-danger"><a href="#">CANCELAR</a></button>
        <button type="submit" class="btn btn-success">CADASTRAR</button>
    </div>
</div>