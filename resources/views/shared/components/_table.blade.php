<div class="box box-solid m-0">
    <div class="box-body table-responsive p-0">
        <table class="table table-hover table-striped {{ !empty($class) ? $class : null }}">
            
            {{--  Head  --}}
            <thead class="{{ !empty($theadClass) ? $theadClass : null }}">
                {{ $thead }}
            </thead>
            
            {{--  Body  --}}
            <tbody>
                {{ $slot }}
            </tbody>

            {{--  Footer  --}}
            @if(isset($tfoot))
                <tfoot>
                    {{ $tfoot }}
                </tfoot>
            @endif
        </table>
    </div>
</div>