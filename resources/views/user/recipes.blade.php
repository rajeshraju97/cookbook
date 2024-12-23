@extends('layouts.app')
@section('title', 'Recipe')
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

<!-- recipes section -->

<!-- Blade Template (resources/views/recipes.blade.php) -->
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
                                            <a href="{{ route('recipes.type', ['type_id' => $type->id]) }}"
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
                            action="{{ route('recipes.type') }}">
                            <span data-uk-search-icon></span>
                            <input class="uk-search-input uk-text-small uk-border-rounded uk-form-large" type="search"
                                name="search" placeholder="Search for recipes..." value="{{ request('search') }}">
                        </form>
                    </div>
                    <!-- Sort Dropdown -->
                    <div class="uk-width-1-3@m uk-text-right@m uk-light">
                        <form method="GET" action="{{ route('recipes.type') }}">
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





@endsection