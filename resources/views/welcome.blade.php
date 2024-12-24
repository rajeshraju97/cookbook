@extends('layouts.app')
@section('title', 'welcome')

@section('content')
@include('layouts.nav')


<style>
    .active {
        font-weight: bold;
        color: #eb4a36 !important;
        /* Change to your desired color */
    }

    .pagination {
        display: flex;
        justify-content: center;
        gap: 8px;
    }

    .pagination .page-item {
        list-style: none;
    }

    .pagination .page-link {
        padding: 10px 15px;
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        color: #333;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .pagination .page-link:hover {
        background-color: #e2e6ea;
    }

    .pagination .active .page-link {
        background-color: #007bff;
        color: white;
        border-color: #007bff;
    }
</style>

<div class="uk-container">
    <div class="uk-border-rounded-large uk-background-top-center uk-background-cover 
    uk-background-norepeat uk-light uk-inline uk-overflow-hidden uk-width-1-1"
        style="background-image: url({{asset('slider/slider2.jpg')}});">
        <div class="uk-position-cover uk-header-overlay"></div>
        <div class="uk-position-relative" data-uk-grid>
            <div class="uk-width-1-2@m uk-flex uk-flex-middle">
                <div class="uk-padding-large uk-padding-remove-right">
                    <h1 class="uk-heading-small uk-margin-remove-top">Choose from thousands of recipes</h1>

                    <a class="uk-text-secondary uk-text-600 uk-text-small hvr-forward" href="{{route('user.register')}}"
                        Register today<span class="uk-margin-small-left" data-uk-icon="arrow-right"></span></a>
                </div>
            </div>
            <div class="uk-width-expand@m">
            </div>
        </div>
    </div>
</div>


<!-- recipes section -->
<div class="uk-section uk-section-default">
    <div class="uk-container">
        <h1 class="uk-text-center">All Recipes</h1>
        <div data-uk-grid>
            <!-- Left Panel: Accordion for Dish Types -->
            <div class="uk-width-1-4@m sticky-container">
                <div data-uk-sticky="offset: 100; bottom: true; media: @m;">
                    <h2>Categories</h2>
                    <ul class="uk-nav-default uk-nav-parent-icon" data-uk-nav>
                        @foreach($categories as $category_name => $types)
                            <li class="uk-parent {{ $loop->first ? 'uk-open' : '' }}">
                                <a href="#" class="uk-text-500">{{ $category_name }}</a>
                                <ul class="uk-nav-sub">
                                    @foreach($types as $type)
                                        <li>
                                            <a href="{{ route('recipes.type.welcome', ['type_id' => $type->id]) }}"
                                                class="{{ $selectedTypeId == $type->id ? 'active' : '' }}">
                                                {{ $type->type_name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>

            <!-- Right Panel: List of Dishes -->
            <div class="uk-width-expand@m">
                <div data-uk-grid>
                    <!-- Search Bar -->
                    <div class="uk-width-expand@m">
                        <form class="uk-search uk-search-default uk-width-1-1" method="GET"
                            action="{{ route('recipes.type.welcome') }}">
                            <span data-uk-search-icon></span>
                            <input class="uk-search-input uk-text-small uk-border-rounded uk-form-large" type="search"
                                name="search" placeholder="Search for recipes..." value="{{ request('search') }}">
                        </form>
                    </div>
                    <!-- Sort Dropdown -->
                    <div class="uk-width-1-3@m uk-text-right@m uk-light">
                        <form method="GET" action="{{ route('recipes.type.welcome') }}">
                            <select class="uk-select uk-select-light uk-width-auto uk-border-pill uk-select-primary"
                                name="sort" onchange="this.form.submit()">
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Sort by: Latest
                                </option>
                                <option value="top_rated" {{ request('sort') == 'top_rated' ? 'selected' : '' }}>Sort by:
                                    Top Rated</option>
                                <option value="trending" {{ request('sort') == 'trending' ? 'selected' : '' }}>Sort by:
                                    Trending</option>
                            </select>
                        </form>
                    </div>
                </div>
                <!-- Display Dishes -->
                <div id="dish-results">
                    <div class="uk-child-width-1-2 uk-child-width-1-3@s mt-3" data-uk-grid>
                        @forelse ($dishes as $dish)
                            <div>
                                <div class="uk-card">
                                    <div class="uk-card-media-top uk-inline uk-light">
                                        <img class="uk-border-rounded-medium"
                                            src="{{ asset('dishes_images/' . $dish->dish_image)}}"
                                            alt="{{ $dish->dish_name }}">
                                        <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                                    </div>
                                    <div>
                                        <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom">{{ $dish->dish_name }}
                                        </h3>
                                        <div class="uk-text-xsmall uk-text-muted">
                                            <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                                            <span>{{ $dish->rating }}</span>
                                            <span>({{ $dish->reviews_count }})</span>
                                        </div>
                                    </div>
                                    <a href="{{route('recipe_single_page', $id = $dish->id)}}"
                                        class="uk-position-cover"></a>
                                </div>
                            </div>
                        @empty
                            <p>No dishes found for this type.</p>
                        @endforelse
                    </div>

                    <!-- Pagination -->
                    <div class="uk-margin">

                        {{ $dishes->links() }}

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- video section -->
<div class="uk-section uk-section-default">
    <div class="uk-container">
        <div data-uk-grid>
            <div class="uk-width-expand">
                <h2>Videos</h2>
            </div>
            <div class="uk-width-1-3 uk-text-right uk-light">
                <select class="uk-select uk-select-light uk-width-auto uk-border-pill uk-select-primary">
                    <option>Featured</option>
                    <option>Top Rated</option>
                    <option>Trending</option>
                </select>
            </div>
        </div>
        <div class="uk-child-width-1-2 uk-child-width-1-4@s" data-uk-grid>
            <div>
                <div class="uk-card uk-card-video">
                    <div class="uk-inline uk-light">
                        <img class="uk-border-rounded-large" src="https://via.placeholder.com/300x400"
                            alt="Course Title">
                        <div class="uk-position-cover uk-card-overlay uk-border-rounded-large"></div>
                        <div class="uk-position-center">
                            <span data-uk-icon="icon: play-circle; ratio: 3.4"></span>
                        </div>
                        <div class="uk-position-small uk-position-bottom-left">
                            <h5 class="uk-margin-small-bottom">Business Presentation Course</h5>
                            <div class="uk-text-xsmall">by Thomas Haller</div>
                        </div>
                    </div>
                    <a href="#" class="uk-position-cover"></a>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-video">
                    <div class="uk-inline uk-light">
                        <img class="uk-border-rounded-large" src="https://via.placeholder.com/300x400"
                            alt="Course Title">
                        <div class="uk-position-cover uk-card-overlay uk-border-rounded-large"></div>
                        <div class="uk-position-center">
                            <span data-uk-icon="icon: play-circle; ratio: 3.4"></span>
                        </div>
                        <div class="uk-position-small uk-position-bottom-left">
                            <h5 class="uk-margin-small-bottom">Business Presentation Course</h5>
                            <div class="uk-text-xsmall">by Thomas Haller</div>
                        </div>
                    </div>
                    <a href="#" class="uk-position-cover"></a>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-video">
                    <div class="uk-inline uk-light">
                        <img class="uk-border-rounded-large" src="https://via.placeholder.com/300x400"
                            alt="Course Title">
                        <div class="uk-position-cover uk-card-overlay uk-border-rounded-large"></div>
                        <div class="uk-position-center">
                            <span data-uk-icon="icon: play-circle; ratio: 3.4"></span>
                        </div>
                        <div class="uk-position-small uk-position-bottom-left">
                            <h5 class="uk-margin-small-bottom">Business Presentation Course</h5>
                            <div class="uk-text-xsmall">by Thomas Haller</div>
                        </div>
                    </div>
                    <a href="#" class="uk-position-cover"></a>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-video">
                    <div class="uk-inline uk-light">
                        <img class="uk-border-rounded-large" src="https://via.placeholder.com/300x400"
                            alt="Course Title">
                        <div class="uk-position-cover uk-card-overlay uk-border-rounded-large"></div>
                        <div class="uk-position-center">
                            <span data-uk-icon="icon: play-circle; ratio: 3.4"></span>
                        </div>
                        <div class="uk-position-small uk-position-bottom-left">
                            <h5 class="uk-margin-small-bottom">Business Presentation Course</h5>
                            <div class="uk-text-xsmall">by Thomas Haller</div>
                        </div>
                    </div>
                    <a href="#" class="uk-position-cover"></a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- newsletter section -->
<div class="uk-container">
    <div class="uk-background-primary uk-border-rounded-large uk-light">
        <div class="uk-width-3-4@m uk-margin-auto uk-padding-large">
            <div class="uk-text-center">
                <h2 class="uk-h2 uk-margin-remove">Be the first to know about the latest deals, receive new
                    trending
                    recipes &amp; more!</h2>
            </div>
            <div class="uk-margin-medium-top">
                <div data-uk-scrollspy="cls: uk-animation-slide-bottom; repeat: true">
                    <form>
                        <div class="uk-grid-small" data-uk-grid>
                            <div class="uk-width-1-1 uk-width-expand@s uk-first-column">
                                <input type="email" placeholder="Email Address"
                                    class="uk-input uk-form-large uk-width-1-1 uk-border-pill">
                            </div>
                            <div class="uk-width-1-1 uk-width-auto@s">
                                <input type="submit" value="Subscribe"
                                    class="uk-button uk-button-large uk-button-warning">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    document.addEventListener('DOMContentLoaded', () => {
        const dishLinks = document.querySelectorAll('.dish-type-link');
        const dishResults = document.getElementById('dish-results');

        dishLinks.forEach(link => {
            link.addEventListener('click', event => {
                event.preventDefault();

                const typeId = event.target.dataset.typeId;

                // Remove 'active' class from all links
                dishLinks.forEach(l => l.classList.remove('active'));

                // Add 'active' class to clicked link
                event.target.classList.add('active');

                // Fetch dishes dynamically
                fetch(`/get-dishes/${typeId}`)
                    .then(response => response.json())
                    .then(data => {
                        dishResults.innerHTML = data.html;
                        const pagination = document.createElement('div');
                        pagination.innerHTML = data.pagination;
                        dishResults.appendChild(pagination);
                    })
                    .catch(error => console.error('Error:', error));
            });
        });
    });

</script>
@endsection