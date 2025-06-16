@extends('layouts.website')

@section('title', $recipe->title)

@section('content')
    <div class="px-4 mb-5 text-center border-bottom">
        <div class="col-lg-6 mx-auto">
        </div>
        <div class="overflow-hidden" style="max-height: 45vh;">
            <div class="container px-5">
                @if($recipe->featured_at)
                    <span class="position-absolute mc-new-badge">
                        <i class="fas fa-certificate"></i>
                        Featured Recipe
                    </span>
                @endif
                <img src="/img/1.jpeg" class="img-fluid border rounded-3 shadow-lg mb-4"
                     alt="Example image" width="900" height="500" loading="lazy">
            </div>
        </div>
    </div>

    <div class="row mc-row">
        <div class="col-lg-8 mc-post-col">
            <div class="mc-post-full">

                <div class="d-flex justify-content-between mb-4">
                    <div>
                        <i class="fas fa-book-open-reader"></i>&nbsp;
                        {{ $recipe->view_count }} views
                    </div>
                    <div>
                        Published in
                        <a href="#!">{{ $recipe->category->title }}</a>
                    </div>
                </div>

                <div class="mb-4">
                    <h2 class="display-5 fw-bold text-body-emphasis mc-color-primary mc2-post-title mt-4">
                        {{ $recipe->title }}
                    </h2>

                    <div class="recipe-features mb-3">
                    <x-recipe-features :flags="$flags" :recipe="$recipe" />

                    </div>

                    <p>{{ $recipe->excerpt }}</p>
                    <div class="card card-body pb-0 align-items-center rounded-3 border my-4 sha2dow">
                        <div class="container">
                            <div class="row align-items-md-center">
                                <div class="col d-flex flex-column">
                                    <p class="mb-0 text-dark">
                                        <i class="fas fa-utensils fa-xs"></i>
                                        Servings
                                    </p>
                                    <p class="text-body-secondary">{{ $recipe->servings }} ppl</p>
                                </div>
                                <div class="col d-flex flex-column">
                                    <p class="mb-0 text-dark">
                                        <i class="fas fa-hourglass-half fa-xs"></i>
                                        Prepare Time
                                    </p>
                                    <p class="text-body-secondary">{{ $recipe->prepare_time_formatted }}</p>
                                </div>
                                <div class="col d-flex flex-column">
                                    <p class="mb-0 text-dark">
                                        <i class="fas fa-clock fa-xs"></i>
                                        Cooking Time
                                    </p>
                                    <p class="text-body-secondary">{{ $recipe->cooking_time_formatted }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="btn-group w-100 mb-4">
                        <a href="#instructions" class="btn btn-outline-dark">Instructions</a>
                        <a href="#description" class="btn btn-outline-dark">Recipe</a>
                        @if($recipe->youtube_url)
                        <a href="#video" class="btn btn-outline-dark">Video</a>
                        @else
                        <span class="btn btn-outline-dark bg-dark-subtle text-muted" data-bs-toggle="tooltip"
                              data-bs-title="Not Available">
                                <i>Video</i>
                            </span>
                        @endif
                        <a href="#notes" class="btn btn-outline-dark">Notes</a>
                    </div>

                    <h3 class="border-bottom mt-4" id="instructions">
                        Instructions
                    </h3>
                    <p>{{ $recipe->instructions }}</p>
                    <p>
                        Duis pretium efficitur nunc. Mauris vehicula nibh nisi. Curabitur gravida neque
                        dignissim, aliquet nulla sed, condimentum nulla. Pellentesque id venenatis
                        quam, id cursus velit. Fusce semper tortor ac metus iaculis varius. Praesent
                        aliquam ex vel lectus ornare tristique. Nunc et eros quis enim feugiat tincidunt
                        et vitae dui.
                    </p>

                    <h3 class="border-bottom mt-4" id="description">
                        Recipe
                    </h3>
                    <p>{{ $recipe->description }}</p>

                    @if($recipe->youtube_url)
                    <h3 class="border-bottom mt-4" id="video">
                        Video
                    </h3>
                    <iframe width="100%" height="400"
                            src="https://www.youtube.com/embed/{{Str::after($recipe->youtube_url, '?v=')}}"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            allowfullscreen></iframe>
                    @endif
                    <h3 class="border-bottom mt-4" id="notes">
                        Notes
                    </h3>
                    <p>{{ $recipe->notes }}</p>

                    <div class="d-flex justify-content-start mt-5 mb-4">
                        <span class="badge rounded-pill me-2 text-bg-light">Tag 1</span>
                        <span class="badge rounded-pill me-2 text-bg-light">Tag 2</span>
                        <span class="badge rounded-pill me-2 text-bg-light">Tag 3</span>
                    </div>
                </div>

                <div class="my-5">
                    <h2 class="pb-2 border-bottom">Hand-Picked Recipes</h2>

                    <div class="row">

                        @forelse($featuredRecipes as $recipe)
                            <div class="col-4">
                                <a href="#!">
                                    <div class="card card-cover h-100 overflow-hidden text-bg-dark rounded-3 shadow-lg img-overlay"
                                         style="background-image: url('/img/{{mt_rand(1,6) }}.jpeg');background-size: cover;">
                                        <div class="d-flex flex-column z-1 h-100 p-5 pb-3 text-white">
                                            <h3 class="pt-5 mt-5 mb-4 lh-1 fw-bold">{{ $recipe->title }}</h3>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @empty
                            <x-no-data />
                        @endforelse

                    </div>
                </div>
            </div>


        </div>
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
                    <li>
                        <a href="#" class="mc-color-primary">
                            Cheesecakes
                            <span class="mc-color-dark">(21 recipes)</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="mc-color-primary">
                            Cupcakes & Muffins
                            <span class="mc-color-dark">(22 recipes)</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="mc-color-primary">
                            Cookies
                            <span class="mc-color-dark">(51 recipes)</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="mc-color-primary">
                            Puddings & Cosy Desserts
                            <span class="mc-color-dark">(52 recipes)</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="mc-color-primary">
                            Bite Size
                            <span class="mc-color-dark">(23 recipes)</span>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="mc-color-primary">
                            Pies
                            <span class="mc-color-dark">(26 recipes)</span>
                        </a>
                    </li>
                </ul>
                <hr class="mb-3 mc-hr-primary">
                <h2 class="mb-4 mc-post-title">Related Recipes</h2>
                <a href="#" class="d-block mc-mb-40">
                    <figure>
                        <img src="/img/2.jpeg" alt="Image" class="mb-3 img-fluid rounded-3 shadow-lg">
                        <figcaption class="mc-color-primary">Duis mollis diam nec ex viverra scelerisque a sit
                        </figcaption>
                    </figure>
                </a>
                <a href="#" class="d-block mc-mb-40">
                    <figure>
                        <img src="/img/6.jpeg" alt="Image" class="mb-3 img-fluid rounded-3 shadow-lg">
                        <figcaption class="mc-color-primary">Integer quis lectus eget justo ullamcorper
                            ullamcorper
                        </figcaption>
                    </figure>
                </a>
                <a href="#" class="d-block mc-mb-40">
                    <figure>
                        <img src="/img/4.jpeg" alt="Image" class="mb-3 img-fluid rounded-3 shadow-lg">
                        <figcaption class="mc-color-primary">Nam lobortis nunc sed faucibus commodo</figcaption>
                    </figure>
                </a>
            </div>
        </aside>
    </div>
@endsection
