@extends('layouts.website')

@section('title', 'Categories')

@section('content')
    <div class="px-4 mb-5 text-center border-bottom">
        <h1 class="display-5 fw-bold text-body-emphasis">
            <i class="fas fa-certificate text-warning"></i>
            Top Notch Recipes
            <i class="fas fa-certificate text-warning"></i>
        </h1>
        <div class="col-lg-10 mx-auto">
            <p class="lead mb-4">Take the opportunity to explore the curated selection that our highly skilled and
                experienced team has thoughtfully gathered specifically with you in mind. We've meticulously chosen
                these offerings to cater to your needs and preferences, ensuring that what you encounter is
                handpicked and tailored to suit your interests.</p>
            <div class="d-grid gap-2 d-sm-flex justify-content-sm-center mb-5">
                <button type="button" class="btn btn-warning btn-lg px-4">Browse Featured Recipes</button>
            </div>
        </div>
        <div class="overflow-hidden" style="max-height: 30vh;">
            <div class="container px-5">
                <img src="img/1.jpeg" class="img-fluid border rounded-3 shadow-lg mb-4"
                     alt="Example image" width="700" height="500" loading="lazy">
            </div>
        </div>
    </div>

    <!-- Search form -->
    <div class="row">
        <div class="col-12">
            <form method="GET" class="form-inline mc-mb-80 mc-search-form">
                <input class="form-control mc-search-input" name="query" type="text" placeholder="Search..."
                       aria-label="Search">
                <button class="mc-search-button" type="submit">
                    <i class="fas fa-search mc-search-icon" aria-hidden="true"></i>
                </button>
            </form>
        </div>
    </div>

    <div class="container px-4 pb-5">
        <h2 class="pb-2">Collections</h2>

        <div class="row mb-2">
            @forelse($categories as $category)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary-emphasis">{{ $category->recipes_count }} Recipes</strong>
                        <a href="#">
                            <h3 class="mb-0">{{ $category->title }}</h3>
                        </a>
                    </div>
                </div>
            </div>
            @empty
                <x-no-data/>
            @endforelse
        </div>
    </div>


    <div class="row mc-mb-40">
       {{ $categories->links() }}
    </div>
@endsection
