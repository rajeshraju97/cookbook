@extends('layouts.app')
@section('title', 'welcome')

@section('content')
@include('layouts.nav')


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

<div class="uk-section uk-section-default">
    <div class="uk-container">
        <div data-uk-grid>
            <div class="uk-width-1-4@m sticky-container">
                <div data-uk-sticky="offset: 100; bottom: true; media: @m;">
                    <h2>Receipes</h2>
                    <ul class="uk-nav-default uk-nav-parent-icon uk-nav-filter uk-margin-medium-top" data-uk-nav>
                        <li class="uk-parent uk-open">
                            <a href="#">Dish Type</a>
                            <ul class="uk-nav-sub">
                                <li><a href="#">Appetizers & Snacks</a></li>
                                <li><a href="#">Bread Receipes</a></li>
                                <li><a href="#">Cake Receipes</a></li>
                                <li><a href="#">Candy and Fudge</a></li>
                                <li><a href="#">Casserole Receipes</a></li>
                                <li><a href="#">Christmas Cookies</a></li>
                                <li><a href="#">Cocktail Receipes</a></li>
                                <li><a href="#">Main Dishes</a></li>
                                <li><a href="#">Pasta Receipes</a></li>
                                <li><a href="#">Pie Receipes</a></li>
                                <li><a href="#">Sandwiches</a></li>
                            </ul>
                        </li>
                        <li class="uk-parent">
                            <a href="#">Meal Type</a>
                            <ul class="uk-nav-sub">
                                <li><a href="#">Breakfast and Brunch</a></li>
                                <li><a href="#">Desserts</a></li>
                                <li><a href="#">Dinners</a></li>
                                <li><a href="#">Lunch</a></li>
                            </ul>
                        </li>
                        <li class="uk-parent">
                            <a href="#">Diet and Health</a>
                            <ul class="uk-nav-sub">
                                <li><a href="#">Diabetic</a></li>
                                <li><a href="#">Gluten Free</a></li>
                                <li><a href="#">High Fiber Recipes</a></li>
                                <li><a href="#">Low Calorie</a></li>
                            </ul>
                        </li>
                        <li class="uk-parent">
                            <a href="#">World Cuisine</a>
                            <ul class="uk-nav-sub">
                                <li><a href="#">Chinese</a></li>
                                <li><a href="#">Indian</a></li>
                                <li><a href="#">Italian</a></li>
                                <li><a href="#">Mexican</a></li>
                            </ul>
                        </li>
                        <li class="uk-parent">
                            <a href="#">Seasonal</a>
                            <ul class="uk-nav-sub">
                                <li><a href="#">Baby Shower</a></li>
                                <li><a href="#">Birthday</a></li>
                                <li><a href="#">Christmas</a></li>
                                <li><a href="#">Halloween</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="uk-width-expand@m">
                <div data-uk-grid>
                    <div class="uk-width-expand@m">
                        <form class="uk-search uk-search-default uk-width-1-1">
                            <span data-uk-search-icon></span>
                            <input class="uk-search-input uk-text-small uk-border-rounded uk-form-large" type="search"
                                placeholder="Search for recipes...">
                        </form>
                    </div>
                    <div class="uk-width-1-3@m uk-text-right@m uk-light">
                        <select class="uk-select uk-select-light uk-width-auto uk-border-pill uk-select-primary">
                            <option>Sort by: Latest</option>
                            <option>Sort by: Top Rated</option>
                            <option>Sort by: Trending</option>
                        </select>
                    </div>
                </div>
                <div class="uk-child-width-1-2 uk-child-width-1-3@s" data-uk-grid>

                    <div>
                        <div class="uk-card">
                            <div class="uk-card-media-top uk-inline uk-light">
                                <img class="uk-border-rounded-medium" src="{{asset('recipes/chickenbiryani.jpg')}}"
                                    alt="Course Title">
                                <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                                <div class="uk-position-xsmall uk-position-top-right">
                                    <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                                        data-uk-icon="heart"></a>
                                </div>
                            </div>
                            <div>
                                <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Chicken
                                    Biriyani</h3>
                                <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
                                    <div class="uk-width-auto uk-flex uk-flex-middle">
                                        <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                                        <span class="uk-margin-xsmall-left">5.0</span>
                                        <span>(73)</span>
                                    </div>
                                    <!-- <div class="uk-width-expand uk-text-right">by John Keller</div> -->
                                </div>
                            </div>
                            <a href="{{route('recipe_single_page', $id = 3)}}" class="uk-position-cover"></a>
                        </div>
                    </div>

                    <div>
                        <div class="uk-card">
                            <div class="uk-card-media-top uk-inline uk-light">
                                <img class="uk-border-rounded-medium" src="{{asset('recipes/Fry-Piece-Biryani.jpg')}}"
                                    alt="Course Title">
                                <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                                <div class="uk-position-xsmall uk-position-top-right">
                                    <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                                        data-uk-icon="heart"></a>
                                </div>
                            </div>
                            <div>
                                <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Fry Piece
                                    Biryani
                                </h3>
                                <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
                                    <div class="uk-width-auto uk-flex uk-flex-middle">
                                        <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                                        <span class="uk-margin-xsmall-left">3.0</span>
                                        <span>(94)</span>
                                    </div>
                                    <!-- <div class="uk-width-expand uk-text-right">by Danial Caleem</div> -->
                                </div>
                            </div>
                            <a href="#" class="uk-position-cover"></a>
                        </div>
                    </div>

                    <div>
                        <div class="uk-card">
                            <div class="uk-card-media-top uk-inline uk-light">
                                <img class="uk-border-rounded-medium" src="{{asset('recipes/muttonbiryani.jpg')}}"
                                    alt="Course Title">
                                <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                                <div class="uk-position-xsmall uk-position-top-right">
                                    <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                                        data-uk-icon="heart"></a>
                                </div>
                            </div>
                            <div>
                                <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Mutton
                                    Biryani</h3>
                                <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
                                    <div class="uk-width-auto uk-flex uk-flex-middle">
                                        <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                                        <span class="uk-margin-xsmall-left">4.5</span>
                                        <span>(153)</span>
                                    </div>
                                    <!-- <div class="uk-width-expand uk-text-right">by Janet Small</div> -->
                                </div>
                            </div>
                            <a href="#" class="uk-position-cover"></a>
                        </div>
                    </div>

                    <div>
                        <div class="uk-card">
                            <div class="uk-card-media-top uk-inline uk-light">

                                <img class="uk-border-rounded-medium" src="{{asset('recipes/chickencurry.jpg')}}"
                                    alt="Course Title">
                                <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                                <div class="uk-position-xsmall uk-position-top-right">
                                    <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                                        data-uk-icon="heart"></a>
                                </div>
                            </div>
                            <div>
                                <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Chicken Curry
                                </h3>
                                <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
                                    <div class="uk-width-auto uk-flex uk-flex-middle">
                                        <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                                        <span class="uk-margin-xsmall-left">5.0</span>
                                        <span>(524)</span>
                                    </div>
                                    <!-- <div class="uk-width-expand uk-text-right">by Aleaxa Dorchest</div> -->
                                </div>
                            </div>
                            <a href="{{route('recipe_single_page', $id = 1)}}" class="uk-position-cover"></a>
                        </div>
                    </div>

                    <div>
                        <div class="uk-card">
                            <div class="uk-card-media-top uk-inline uk-light">
                                <img class="uk-border-rounded-medium" src="{{asset('recipes/muttoncurry.jpg')}}"
                                    alt="Course Title">
                                <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                                <div class="uk-position-xsmall uk-position-top-right">
                                    <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                                        data-uk-icon="heart"></a>
                                </div>
                            </div>
                            <div>
                                <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Mutton Curry
                                </h3>
                                <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
                                    <div class="uk-width-auto uk-flex uk-flex-middle">
                                        <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                                        <span class="uk-margin-xsmall-left">4.6</span>
                                        <span>(404)</span>
                                    </div>
                                    <!-- <div class="uk-width-expand uk-text-right">by Ben Kaller</div> -->
                                </div>
                            </div>
                            <a href="#" class="uk-position-cover"></a>
                        </div>
                    </div>

                    <div>
                        <div class="uk-card">
                            <div class="uk-card-media-top uk-inline uk-light">
                                <img class="uk-border-rounded-medium" src="{{asset('recipes/chepalapulusu.jpg')}}"
                                    alt="Course Title">
                                <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                                <div class="uk-position-xsmall uk-position-top-right">
                                    <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                                        data-uk-icon="heart"></a>
                                </div>
                            </div>
                            <div>
                                <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Chepala
                                    Pulusu</h3>
                                <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
                                    <div class="uk-width-auto uk-flex uk-flex-middle">
                                        <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                                        <span class="uk-margin-xsmall-left">3.9</span>
                                        <span>(629)</span>
                                    </div>
                                    <!-- <div class="uk-width-expand uk-text-right">by Sam Brown</div> -->
                                </div>
                            </div>
                            <a href="#" class="uk-position-cover"></a>
                        </div>
                    </div>



                </div>
                <div class="uk-margin-large-top uk-text-small">
                    <ul class="uk-pagination uk-flex-center uk-text-500 uk-margin-remove" data-uk-margin>
                        <li><a href="#"><span data-uk-pagination-previous></span></a></li>
                        <li><a href="#">1</a></li>
                        <li class="uk-active"><span>2</span></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#"><span data-uk-pagination-next></span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

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

<div class="uk-container">
    <div class="uk-background-primary uk-border-rounded-large uk-light">
        <div class="uk-width-3-4@m uk-margin-auto uk-padding-large">
            <div class="uk-text-center">
                <h2 class="uk-h2 uk-margin-remove">Be the first to know about the latest deals, receive new trending
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

@endsection