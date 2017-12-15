@if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show fixed" role="alert">

        <button type="button" class="close p-0" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        
        <i class="icon fa fa-warning"></i> Você esqueceu de preencher corretamente algum campo do formulário. Verifique os campos informados e tente novamente.
        <br>

        {{--  <ul class="d-none d-sm-block">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>  --}}

    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show fixed" role="alert">

        <button type="button" class="close p-0" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        <i class="icon fa fa-ban"></i> {!! session('error') !!}

    </div>
@endif

@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show fixed" role="alert">
        
        <button type="button" class="close p-0" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        <i class="icon fa fa-check"></i>{!! session('success') !!}
        
    </div>
@endif