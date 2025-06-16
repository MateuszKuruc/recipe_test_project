@extends('layouts.website')

@section('title', 'Homepage')

@section('full-width-content')
    @if($carouselRecipes->count())
        <div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach(range(0,$carouselRecipes->count() - 1) as $carouselRecipeIndex)

                    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="{{ $carouselRecipeIndex }}"
                            aria-label="{{ $carouselRecipeIndex }}" class="{{ $carouselRecipeIndex == 1 ? 'active' : ''}}"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach($carouselRecipes as $index => $carouselRecipe)
                    <div class="carousel-item {{ $index == 1 ? 'active' : '' }}">
                        <img class="w-100" src="img/{{ mt_rand(1,6) }}.jpeg" alt="{{ $carouselRecipe->title }}">
                        <div class="container carousel-item-content img-overlay">
                            <div class="carousel-caption {{ $loop->first ? 'text-start' : '' }} {{ $loop->last ? 'text-end' : '' }}">
                                <h1>{{ $carouselRecipe->title }}</h1>
                                <p>{{ $carouselRecipe->excerpt }}</p>
                                <a class="btn btn-outline-light px-4" href="#">Get Cooking</a>
                            </div>
                        </div>
                    </div>

                @endforeach

            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    @endif
@endsection

@section('content')
    <!-- Search form -->
    <div class="row">
        <div class="col-12">
            <form method="GET" class="form-inline mc-mb-20 mc-search-form">
                <input class="form-control mc-search-input w-100" name="query" type="text" placeholder="Search..."
                       aria-label="Search">
                <button class="mc-search-button" type="submit">
                    <i class="fas fa-search mc-search-icon" aria-hidden="true"></i>
                </button>
            </form>
        </div>
    </div>


    <div class="container px-4 py-5">
        <h2 class="pb-2 mb-2 border-bottom d-flex justify-content-between">
            LATEST RECIPES
        </h2>
        <div class="row">
            @foreach($latestRecipes as $latestRecipe)
              <x-recipe-card-sm :latestRecipe="$latestRecipe"/>
            @endforeach


        </div>
    </div>

    <div class="container px-4 py-5">
        @foreach($categories as $category)
            <h2 class="pb-2 mb-2 border-bottom d-flex justify-content-between">
                {{ $category->title }}
                <a href="#!" class="btn btn-outline-dark">Browse All</a>
            </h2>


        <div class="row">
            @foreach($category->recipes->take(4) as $recipe)
                <x-recipe-card-sm :is-featured="(bool) $recipe->featured_at" :latest-recipe="$recipe" />
            @endforeach
        </div>
        @endforeach
        <div class="row mt-5">
            <a href="#!" class="btn w-100 btn-outline-dark btn-xs px-4">View All Categories</a>
        </div>
    </div>


    <div class="container my-5">
        <div class="row p-4 pb-0 pe-lg-0 pt-lg-5 align-items-center rounded-3 border shadow-lg">
            <div class="col-lg-6 p-3 p-lg-5 pt-lg-3">
                <h1 class="display-4 fw-bold lh-1 text-body-emphasis">DID YOU MAKE THIS RECIPE?</h1>
                <p class="lead">I love hearing how you went with my recipes! Tag me on Instagram at
                    <a href="https://instagram.com/multicaret" target="_blank">@multicaret</a>.
                </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start mb-4 mb-lg-3">
                    <a href="https://instagram.com/multicaret" target="_blank"
                       class="btn btn-outline-secondary px-4">
                        <i class="fab fa-instagram"></i>
                        Instagram
                    </a>
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 p-0 overflow-hidden shadow-lg">
                <img class="rounded-lg-3" src="img/instagram-cta.avif" alt="" width="520">
            </div>
        </div>
    </div>

@endsection
