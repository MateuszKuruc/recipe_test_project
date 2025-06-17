<footer class="mc-main pt-5 mt-5 border-top">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-5">
        <div class="col">
            <a href="#!"
               class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none site-logo">
                <div class="mc-site-header">
                    <img src="/img/logo.png" alt="Logo" width="70px">
                    <h3 class="text-center site-title">
                        Lara<span class="fw-light">Recipes</span>
                    </h3>
                </div>
            </a>
            <p class="text-body-secondary">
                Laravel Tutorial by <a href="https://x.com/mkwsra" target="_blank">
                    Mo Kawsara
                </a>
            </p>
        </div>

        <div class="col mb-3">

        </div>

        <div class="col mb-3">
            <h5>Categories</h5>
            <ul class="nav flex-column">
                @foreach($categories as $category)
                    <li class="nav-item mb-2">
                        <a href="#" class="nav-link p-0 text-body-secondary">
                            {{ Str::limit($category->title, 20 )}} <small>({{ $category->recipes_count }} recipes)</small>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col mb-3">
            <h5>Featured Recipes</h5>
            <ul class="nav flex-column">
                @foreach($featuredRecipes as $recipe)
                    <li class="nav-item mb-2">
                        <a href="{{route('recipes.show', $recipe)}}" class="nav-link p-0 text-body-secondary">
                            {{ Str::limit($recipe->title, 20 )}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="col mb-3">
            <h5>Useful Links</h5>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Search
                        Categories</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Search
                        Recipes</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Most Viewed
                        Recipe</a></li>
                <li class="nav-item mb-2"><a href="faq.html" class="nav-link p-0 text-body-secondary">FAQs</a>
                </li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">About</a></li>
            </ul>
        </div>
    </div>
    <ul class="nav justify-content-center border-bottom border-top mt-2">
        <li class="nav-item"><a href="terms.html" class="nav-link px-2 text-body-secondary">Terms &
                Conditions</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Privacy Policy</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Photo Usage Policy</a></li>
    </ul>
    <div class="row">
        <div class="col-md-6 col-12 mc-color-gray">
            Developed with 🤩️ by <a rel="nofollow" target="_parent" href="#!" class="mc-external-link">Put Your
                Name
                Here Dear Laravel Developer</a>
        </div>
        <div class="col-md-6 col-12 mc-copyright">
            <p class="text-body-secondary">© 2023 Multicaret, Inc</p>
        </div>
    </div>
</footer>
