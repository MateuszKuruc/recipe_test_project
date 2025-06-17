<header class="mc-header" id="mc-header">
    <div class="mc-header-wrapper">
        <button class="navbar-toggler" type="button" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="mc-site-header">
            <a href="index.html" class="mb-3 mx-auto site-logo">
                <img src="/img/logo.png" alt="Logo" width="70px">
            </a>
            <h1 class="text-center site-title">Lara<span class="fw-light">Recipes</span></h1>
        </div>
        <nav class="mc-nav" id="mc-nav">
            <ul>
                @foreach($navLinks as $link)
                    <li class="mc-nav-item {{ $link['cssClasses'] }}"><a href="{{route($link['routeName']) }}" class="mc-nav-link">
                            <i class="fas {{ $link['icon'] }}"></i>
                        {{ $link['title'] }}
                        </a></li>
                @endforeach
            </ul>
        </nav>
        <div class="mc-mb-65">
            <a href="https://x.com/mkwsra" class="mc-social-link">
                <i class="fab fa-x-twitter mc-social-icon"></i>
            </a>
            <a href="https://linkedin.com/in/mkwsra" class="mc-social-link">
                <i class="fab fa-linkedin-in mc-social-icon"></i>
            </a>
            <a rel="nofollow" href="https://fb.com/mkwsra" class="mc-social-link">
                <i class="fab fa-facebook-f mc-social-icon"></i>
            </a>
            <a href="https://instagram.com/multicaret" class="mc-social-link">
                <i class="fab fa-instagram mc-social-icon"></i>
            </a>
        </div>
        <p class="pr-5 text-white">
            Lara Recipes a demo of a Laravel tutorial created by
            <a href="https://mkwsra.com" class="text-dark">Mo Kawsara</a>
            using the Xtra Blog html5 theme as a
            foundation, this theme got tweaked for the purposes of this tutorial.
        </p>
        <p class="mc-mb-80 text-white">If you liked this tutorial, consider helping me out by sharing this video series
            with others and perhaps by
            liking my <a href="https://www.youtube.com/@multi-caret" target="_blank" class="text-dark">YouTube
                videos</a></p>
    </div>
</header>
