<div class="col-sm-5 cad-release">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <img src="{{asset('assets/img/financeEdit.svg')}}" width="300px" height="300px" alt="edita lançamento">
</div>
