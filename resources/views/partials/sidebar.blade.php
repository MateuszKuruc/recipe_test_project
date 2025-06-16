<aside class="col-lg-4 mc-aside-col">
    <div class="mc-post-sidebar">
        <!-- Search form -->
        <div class="row mc-row">
            <div class="col-12">
                <form method="GET" class="form-inline mc-mb-40 mc-search-form">
                    <input class="form-control mc-search-input" name="query" type="text"
                           placeholder="Search..."
                           aria-label="Search">
                    <button class="mc-search-button" type="submit">
                        <i class="fas fa-search mc-search-icon" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
        </div>
        <hr class="mb-3 mc-hr-primary">
        <h2 class="mb-4 mc-post-title">Categories</h2>
        <ul class="mc-mb-75 pl-5 mc-category-list">
            @forelse($categories as $category)
                <li>
                    <a href="#" class="mc-color-primary">
                        {{ $category->title }}
                        <span class="mc-color-dark">(21 {{ $category->recipes_count }})</span>
                    </a>
                </li>
                @empty
            @endforelse

        </ul>
        <hr class="mb-3 mc-hr-primary">
        <h2 class="mb-4 mc-post-title">Related Recipes</h2>

        @forelse($relatedRecipes as $recipe)
            <a href="#" class="d-block mc-mb-40">
                <figure>
                    <img src="/img/{{mt_rand(1, 6)}}.jpeg" alt="{{ $recipe->title }}" class="mb-3 img-fluid rounded-3 shadow-lg">
                    <figcaption class="mc-color-primary">{{ $recipe->title }}</figcaption>
                </figure>
            </a>
            @empty
        @endforelse
    </div>
</aside>
