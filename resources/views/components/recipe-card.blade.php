@props([
    /** @var App\Models\Recipe */
    'recipe',
    'flags'
])

<article {{ $attributes->class(['col-6']) }}>
    <a href="single-recipe.html" class="effect-lily mc-post-link">
        <div class="mc-post-link-inner mb-3">
            <img src="/img/{{mt_rand(1, 6)}}.jpeg" alt="Image" class="img-fluid">
        </div>
        @if((bool)$recipe->featured_at)
            <span class="position-absolute mc-new-badge">
                        <i class="fas fa-certificate"></i>
                        Featured
                    </span>
        @endif
    </a>
   <x-recipe-features :flags="$flags" :recipe="$recipe"/>
    <a href="single-recipe.html">
        <h2 class="mc-pt-20 mc-post-title">{{ $recipe->title }}</h2>
    </a>
    <p class="mc-pt-10">{{ $recipe->excerpt }}</p>
    <hr class="pb-3">
</article>
