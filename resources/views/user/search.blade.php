@extends('layouts.app')
@section('title', 'Search')
@section('content')
@include('layouts.nav')
<style>
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

<div class="uk-section uk-section-default uk-padding-remove-top">
    <div class="uk-container">
        <div data-uk-grid>
            <div class="uk-width-1-2@m">
                <form class="uk-search uk-search-default uk-width-1-1" method="GET" action="{{ route('search') }}">
                    <span data-uk-search-icon></span>
                    <input class="uk-search-input uk-text-small uk-border-rounded uk-form-large" type="search"
                        name="search" placeholder="Search for recipes..." value="{{ request('search') }}">
                </form>
            </div>
            <div class="uk-width-1-2@m uk-text-right@m">
                <form method="GET" action="{{ route('search') }}">
                    <select class="uk-select uk-select-light uk-width-auto uk-border-pill uk-select-primary" name="sort"
                        onchange="this.form.submit()">
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

        <div class="uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-margin-medium-top" data-uk-grid>
            @foreach ($dishes as $dish)
                <div>
                    <div class="uk-card">
                        <div class="uk-card-media-top uk-inline uk-light">
                            <img class="uk-border-rounded-medium" src="{{ asset('dishes_images/' . $dish->dish_image)}}"
                                alt="{{ $dish->dish_name }}">
                            <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                            <div class="uk-position-xsmall uk-position-top-right">
                                <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                                    data-uk-icon="heart"></a>
                            </div>
                        </div>
                        <div>
                            <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">{{$dish->dish_name}}
                            </h3>
                            <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
                                <div class="uk-width-auto uk-flex uk-flex-middle">
                                    <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                                    <span>{{ $dish->rating }}</span>
                                    <span>({{ $dish->reviews_count }})</span>
                                </div>

                            </div>
                        </div>
                        <a href="{{route('recipe_single_page', $id = $dish->id)}}" class="uk-position-cover"></a>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="uk-margin-large-top uk-text-small">


            {{ $dishes->links() }}
        </div>
    </div>
</div>
@endsection