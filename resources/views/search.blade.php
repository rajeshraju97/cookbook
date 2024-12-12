@extends('layouts.app')
@section('title', 'Search')
@section('content')
@include('layouts.nav')

<div class="uk-section uk-section-default uk-padding-remove-top">
    <div class="uk-container">
        <div data-uk-grid>
            <div class="uk-width-1-2@m">
                <form class="uk-search uk-search-default uk-width-1-1 uk-margin-small-bottom">
                    <span data-uk-search-icon></span>
                    <input class="uk-search-input uk-text-small uk-border-rounded uk-form-large" type="search"
                        placeholder="Search for recipes...">
                </form>
            </div>
            <div class="uk-width-1-2@m uk-text-right@m">
                <select class="uk-select uk-select-light uk-width-auto uk-border-pill uk-select-muted">
                    <option>Sort by: Latest</option>
                    <option>Sort by: Top Rated</option>
                    <option>Sort by: Trending</option>
                </select>
            </div>
        </div>

        <div class="uk-child-width-1-2 uk-child-width-1-3@s uk-child-width-1-4@m uk-margin-medium-top" data-uk-grid>
            <div>
                <div class="uk-card">
                    <div class="uk-card-media-top uk-inline uk-light">
                        <img class="uk-border-rounded-medium" src="https://via.placeholder.com/300x160"
                            alt="Course Title">
                        <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                        <div class="uk-position-xsmall uk-position-top-right">
                            <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                                data-uk-icon="heart"></a>
                        </div>
                    </div>
                    <div>
                        <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Chef John's Turkey
                            Sloppy Joes</h3>
                        <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
                            <div class="uk-width-auto uk-flex uk-flex-middle">
                                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                                <span class="uk-margin-xsmall-left">5.0</span>
                                <span>(73)</span>
                            </div>
                            <!-- <div class="uk-width-expand uk-text-right">by John Keller</div> -->
                        </div>
                    </div>
                    <a href="#" class="uk-position-cover"></a>
                </div>
            </div>
            <div>
                <div class="uk-card">
                    <div class="uk-card-media-top uk-inline uk-light">
                        <img class="uk-border-rounded-medium" src="https://via.placeholder.com/300x160"
                            alt="Course Title">
                        <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                        <div class="uk-position-xsmall uk-position-top-right">
                            <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                                data-uk-icon="heart"></a>
                        </div>
                    </div>
                    <div>
                        <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Brown Sugar Meatloaf
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
                        <img class="uk-border-rounded-medium" src="https://via.placeholder.com/300x160"
                            alt="Course Title">
                        <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                        <div class="uk-position-xsmall uk-position-top-right">
                            <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                                data-uk-icon="heart"></a>
                        </div>
                    </div>
                    <div>
                        <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Awesome Slow Cooker
                            Pot Roast</h3>
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
                        <img class="uk-border-rounded-medium" src="https://via.placeholder.com/300x160"
                            alt="Course Title">
                        <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                        <div class="uk-position-xsmall uk-position-top-right">
                            <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                                data-uk-icon="heart"></a>
                        </div>
                    </div>
                    <div>
                        <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Broiled Tilapia
                            Parmesan</h3>
                        <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
                            <div class="uk-width-auto uk-flex uk-flex-middle">
                                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                                <span class="uk-margin-xsmall-left">5.0</span>
                                <span>(524)</span>
                            </div>
                            <!-- <div class="uk-width-expand uk-text-right">by Aleaxa Dorchest</div> -->
                        </div>
                    </div>
                    <a href="#" class="uk-position-cover"></a>
                </div>
            </div>
            <div>
                <div class="uk-card">
                    <div class="uk-card-media-top uk-inline uk-light">
                        <img class="uk-border-rounded-medium" src="https://via.placeholder.com/300x160"
                            alt="Course Title">
                        <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                        <div class="uk-position-xsmall uk-position-top-right">
                            <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                                data-uk-icon="heart"></a>
                        </div>
                    </div>
                    <div>
                        <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Baked Teriyaki
                            Chicken</h3>
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
                        <img class="uk-border-rounded-medium" src="https://via.placeholder.com/300x160"
                            alt="Course Title">
                        <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                        <div class="uk-position-xsmall uk-position-top-right">
                            <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                                data-uk-icon="heart"></a>
                        </div>
                    </div>
                    <div>
                        <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Zesty Slow Cooker
                            Chicken</h3>
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
            <div>
                <div class="uk-card">
                    <div class="uk-card-media-top uk-inline uk-light">
                        <img class="uk-border-rounded-medium" src="https://via.placeholder.com/300x160"
                            alt="Course Title">
                        <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                        <div class="uk-position-xsmall uk-position-top-right">
                            <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                                data-uk-icon="heart"></a>
                        </div>
                    </div>
                    <div>
                        <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Rosemary Ranch
                            Chicken Kabobs</h3>
                        <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
                            <div class="uk-width-auto uk-flex uk-flex-middle">
                                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                                <span class="uk-margin-xsmall-left">3.6</span>
                                <span>(149)</span>
                            </div>
                            <!-- <div class="uk-width-expand uk-text-right">by Theresa Samuel</div> -->
                        </div>
                    </div>
                    <a href="#" class="uk-position-cover"></a>
                </div>
            </div>
            <div>
                <div class="uk-card">
                    <div class="uk-card-media-top uk-inline uk-light">
                        <img class="uk-border-rounded-medium" src="https://via.placeholder.com/300x160"
                            alt="Course Title">
                        <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                        <div class="uk-position-xsmall uk-position-top-right">
                            <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                                data-uk-icon="heart"></a>
                        </div>
                    </div>
                    <div>
                        <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Slow Cooker Pulled
                            Pork</h3>
                        <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
                            <div class="uk-width-auto uk-flex uk-flex-middle">
                                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                                <span class="uk-margin-xsmall-left">2.9</span>
                                <span>(309)</span>
                            </div>
                            <!-- <div class="uk-width-expand uk-text-right">by Adam Brown</div> -->
                        </div>
                    </div>
                    <a href="#" class="uk-position-cover"></a>
                </div>
            </div>

            <div>
                <div class="uk-card">
                    <div class="uk-card-media-top uk-inline uk-light">
                        <img class="uk-border-rounded-medium" src="https://via.placeholder.com/300x160"
                            alt="Course Title">
                        <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                        <div class="uk-position-xsmall uk-position-top-right">
                            <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                                data-uk-icon="heart"></a>
                        </div>
                    </div>
                    <div>
                        <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Greek Lemon Chicken
                            and Potatoes</h3>
                        <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
                            <div class="uk-width-auto uk-flex uk-flex-middle">
                                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                                <span class="uk-margin-xsmall-left">3.6</span>
                                <span>(124)</span>
                            </div>
                            <!-- <div class="uk-width-expand uk-text-right">by Thomas Haller</div> -->
                        </div>
                    </div>
                    <a href="#" class="uk-position-cover"></a>
                </div>
            </div>
            <div>
                <div class="uk-card">
                    <div class="uk-card-media-top uk-inline uk-light">
                        <img class="uk-border-rounded-medium" src="https://via.placeholder.com/300x160"
                            alt="Course Title">
                        <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                        <div class="uk-position-xsmall uk-position-top-right">
                            <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                                data-uk-icon="heart"></a>
                        </div>
                    </div>
                    <div>
                        <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Turkey Posole Dinner
                        </h3>
                        <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
                            <div class="uk-width-auto uk-flex uk-flex-middle">
                                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                                <span class="uk-margin-xsmall-left">4.0</span>
                                <span>(84)</span>
                            </div>
                            <!-- <div class="uk-width-expand uk-text-right">by Thomas Haller</div> -->
                        </div>
                    </div>
                    <a href="#" class="uk-position-cover"></a>
                </div>
            </div>
            <div>
                <div class="uk-card">
                    <div class="uk-card-media-top uk-inline uk-light">
                        <img class="uk-border-rounded-medium" src="https://via.placeholder.com/300x160"
                            alt="Course Title">
                        <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                        <div class="uk-position-xsmall uk-position-top-right">
                            <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                                data-uk-icon="heart"></a>
                        </div>
                    </div>
                    <div>
                        <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Baked Macaroni and
                            Cheese</h3>
                        <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
                            <div class="uk-width-auto uk-flex uk-flex-middle">
                                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                                <span class="uk-margin-xsmall-left">2.9</span>
                                <span>(311)</span>
                            </div>
                            <!-- <div class="uk-width-expand uk-text-right">by Thomas Haller</div> -->
                        </div>
                    </div>
                    <a href="#" class="uk-position-cover"></a>
                </div>
            </div>
            <div>
                <div class="uk-card">
                    <div class="uk-card-media-top uk-inline uk-light">
                        <img class="uk-border-rounded-medium" src="https://via.placeholder.com/300x160"
                            alt="Course Title">
                        <div class="uk-position-cover uk-card-overlay uk-border-rounded-medium"></div>
                        <div class="uk-position-xsmall uk-position-top-right">
                            <a href="#" class="uk-icon-button uk-like uk-position-z-index uk-position-relative"
                                data-uk-icon="heart"></a>
                        </div>
                    </div>
                    <div>
                        <h3 class="uk-card-title uk-text-500 uk-margin-small-bottom uk-margin-top">Deb's General Tso's
                            Chicken</h3>
                        <div class="uk-text-xsmall uk-text-muted" data-uk-grid>
                            <div class="uk-width-auto uk-flex uk-flex-middle">
                                <span class="uk-rating-filled" data-uk-icon="icon: star; ratio: 0.7"></span>
                                <span class="uk-margin-xsmall-left">4.4</span>
                                <span>(68)</span>
                            </div>
                            <!-- <div class="uk-width-expand uk-text-right">by Thomas Haller</div> -->
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
                <li class="uk-disabled"><span>...</span></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
                <li class="uk-active"><span>7</span></li>
                <li><a href="#">8</a></li>
                <li><a href="#"><span data-uk-pagination-next></span></a></li>
            </ul>
        </div>
    </div>
</div>
@endsection