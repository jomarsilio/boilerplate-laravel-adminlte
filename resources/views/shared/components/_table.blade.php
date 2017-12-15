<div class="box box-solid m-0">
    <div class="box-body table-responsive p-0">
        <table class="table table-hover table-striped {{ !empty($class) ? $class : null }}">
            <thead class="{{ !empty($theadClass) ? $theadClass : null }}">
                {{ $thead }}
            </thead>
            <tbody>
                {{ $slot }}
            </tbody>
        </table>
    </div>
</div>