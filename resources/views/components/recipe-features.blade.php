@props([
    'flags',
    /** @var \App\Models\Recipe */
    'recipe'
])

<div {{ $attributes->class(['recipe-features']) }}>
    @foreach($flags as $columnName => $flag)
        @if($recipe->$columnName)
            <span class="badge {{ $flag['cssClass'] }}">
                        <i class="fas {{ $flag['icon'] }} me-1"></i>
                        {{ $flag['title'] }}
                    </span>
        @endif
    @endforeach

</div>
