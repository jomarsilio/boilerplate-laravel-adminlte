@extends($layout)

@section('content')
<div class="error-page">
    <h2 class="headline text-yellow">403</h2>

    <div class="error-content">
        <h3><i class="fa fa-warning text-yellow mr-2"></i>Acesso negado</h3>

        <p class="text-center text-lg-left">
            Você não tem permissão para visualizar esta página.
        </p>
        <p class="text-center text-lg-left">
            <a href="{{ route('home') }}"><i class="fa fa-arrow-left mr-2"></i>Voltar para o início</a>
        </p>


    </div>
</div>
@endsection