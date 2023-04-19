@if(session('messageCreate'))
    <div class="alert alert-success alert-dismissible msg fade show text-center" role="alert">
        <strong>{{session('messageCreate')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('messageEdit'))
    <div class="alert alert-success alert-dismissible msg fade show text-center" role="alert">
        <strong>{{session('messageEdit')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('messageDestroy'))
    <div class="alert alert-success alert-dismissible msg fade show text-center" role="alert">
        <strong>{{session('messageDestroy')}}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif