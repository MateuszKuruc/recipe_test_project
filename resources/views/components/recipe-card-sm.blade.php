@props([
    /** @var App\Models\Recipe */
    'latestRecipe',
    'isFeatured'
])

<article {{ $attributes->class(['col-12 col-md-6 col-lg-3']) }}>
    <a href="#" class="effect-lily mc-post-link">
        <div class="mc-post-link-inner">
            <img src="img/{{ mt_rand(1,6) }}.jpeg" alt="{{ $latestRecipe->title }}" class="img-fluid">
        </div>
        @if(isset($isFeatured) && $isFeatured)
        <span class="position-absolute mc-new-badge">
            <i class="fas fa-certificate">
                Featured
            </i>
        </span>
        @endif
        <h2 class="mc-pt-30 mc-post-title">{{ $latestRecipe->title }}</h2>
    </a>
    <div class="d-flex justify-content-between">
        <span class="mc-color-primary">Category title</span>
    </div>
</article>
