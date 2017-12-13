{{-- 
    How to use?

    @include("shared.form._confirm", [
        'id' => 'modalId', // REQUIRED
        'buttonTitle' => 'buttonLang',
        'title' => 'titleLang',
        'message' => 'message' // REQUIRED,
        'data-tooltip' => '',
        'formOptions' => [
            'route' => ['my.route', $param1, $param2, $param3],
            'method' => 'post',
        ],
    ])
 --}}
 
@permission(head($formOptions['route']))

    {{-- Botão. --}}
    @if (isset($buttonTitle))
        <a href="#{{ $id }}" data-toggle="modal" data-target="#{{ $id }}" class="text-dark ml-1" title="{{ trans($buttonTitle) }}">
            <i class="fa fa-trash"></i>
        </a>
    @endif

    {{-- Modal. --}}
    <div id="{{$id}}" class="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                {!! Form::open($formOptions) !!}
                    <div class="modal-header">
                        <h5 class="modal-title">{{ trans(isset($title) ? $title : 'app.default_title_confirm_destroy') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body text-left">
                        @lang($message)
                    </div>
                    <div class="modal-footer">
                        {{-- Não --}}
                        {{link_to('#!', trans('button.no'), [
                            'class' => 'btn btn-secondary',
                            'data-dismiss' => 'modal'
                        ])}}

                        {{-- Sim --}}
                        {!! Form::submit(trans('button.yes'), ['class' => 'btn btn-primary']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endpermission