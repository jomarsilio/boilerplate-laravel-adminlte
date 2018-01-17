{{-- 
    How to use?
    
    @include("shared._pagination", [
        'collection' => $collection, // REQUIRED
        'perPage' => 'number',
    ])
--}}
@if ($collection->total())
    <div class="box-footer py-3">
        @if ($collection->total() > (!empty($perPage) ? $perPage : config('constant.pagination.perPage')))
            {{ $collection->links('vendor.pagination.bootstrap-4') }}
        @endif
        
        <div class="text-center text-muted small">Total: {{ $collection->total() }}</div>
    </div>
@endif