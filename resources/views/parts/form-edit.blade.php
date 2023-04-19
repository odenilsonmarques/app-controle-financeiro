@csrf<!--csrf toquem de segurnça padrao do laravel para envio de requisao-->
                            <div class="row">
                                <div class="col-sm-12">
                                    <label for="release_type" class="form-label">Tipo de Lançamento</label>
                                    <select name="release_type" id="release_type" class="form-select" autofocus  required>
                                        @foreach($selectedReleases as $selectedRelease)
                                            <option value="{{$selectedRelease}}" @if( isset($releases) && $releases -> release_type == $selectedRelease) selected @endif>{{$selectedRelease}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="person" class="form-label">Pessoa</label>
                                    <input type="text" name="person" value="{{$releases->person}}" class="form-control"  maxlength="30" placeholder="Digite o nome"> 
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="amount" class="form-label">Valor</label>
                                    <input type="text" name="amount" id="amount" value="{{number_format($releases->amount, 2, ',', '.')}}" class="form-control" onkeyup="formatCoin();" placeholder="R$" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="month" class="form-label">Mês</label>
                                    <select name="month" id="month" class="form-select" required>
                                        @foreach($selectedMonths as $selectedMonth)
                                            <option value="{{$selectedMonth}}" @if( isset($releases) && $releases -> month == $selectedMonth) selected @endif>{{$selectedMonth}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12 mt-3">
                                    <label for="description" class="form-label">Descrição</label>
                                    <textarea class="form-control" name="description" placeholder="Digite uma descrição" aria-label="With textarea" required>{{$releases->description}}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 mt-4">
                                    <button class="btn btn-danger"><a href="#">CANCELAR</a></button>
                                    <button type="submit" class="btn btn-success">SALVAR</button>
                                </div>
                            </div>