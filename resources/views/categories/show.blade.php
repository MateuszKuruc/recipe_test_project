@extends('layouts.website')

@section('title', $category->title)

@section('content')

<div class="row">
    <div class="col-12">
        <form method="GET" class="form-inline mc-mb-80 mc-search-form">
            <input class="form-control mc-search-input" name="q" type="text" placeholder="Search..."
                   aria-label="Search" value="{{ request('q') }}">
            <button class="mc-search-button" type="submit">
                <i class="fas fa-search mc-search-icon" aria-hidden="true"></i>
            </button>
        </form>
    </div>
</div>

<h2 class="pb-2 mb-4 border-bottom d-flex justify-content-between">
    {{ $category->title }}
</h2>
<div class="row" data-masonry='{"percentPosition": true }'>

    @forelse($recipes as $recipe)
        <x-recipe-card :recipe="$recipe" :flags="$flags"/>
        @empty
            <x-no-data />
    @endforelse

        @if(request()->has('q'))
            <a class="btn btn-outline-dark" href="{{ route('categories.show', [$category]) }}">
                Clear Search
            </a>
        @endif
</div>
<div class="row mc-mb-40">
    {{ $recipes->links() }}
</div>
@endsection
