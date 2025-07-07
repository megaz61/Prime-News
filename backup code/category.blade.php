@extends('layout.master')
@section('menuHome', 'active')

@section('content')
    <div class="category">
        <div class="container mb-5">
            <div class="title-category">
                <h1 class="text-center">ECONOMY</h1>
            </div>
            <div class="highlight">
                <h1>Trending Now</h1>
                <div class="row">
                    <div class="col-8">
                        <div class="highlight-container">
                            <img src="{{ asset('images/powel.webp') }}" alt="Powel Image"
                                class="images_higlight img-fluid rounded shadow">
                            <div class="highlight-box shadow">
                                <h1 class="Title">The Fed is likely to keep rates the same but give a forecast that moves
                                    markets. What to expect</h1>
                                <p>20 June 2025, 10:17 GMT+0000 | <strong>6 mins ago</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="highlight-container">
                            <img src="{{ asset('images/powel.webp') }}" alt="Powel Image"
                                class="images_higlight img-fluid rounded shadow">
                            <div class="highlight-box shadow">
                                <h1 class="Title">The Fed is likely to keep rates the same but give a forecast that moves
                                    markets. What to expect</h1>
                                <p>20 June 2025, 10:17 GMT+0000 | <strong>6 mins ago</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- moreNews --}}
            <div class="moreNews mt-5 mb-5">
                <h1>More In Economy</h1>
                <div class="row mt-3">
                    <div class="col-3">
                        <div class="card hover-zoom" style="width: 19rem; height: auto;">
                            <img src="{{ asset('images/shiba.png') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="text-muted">Markets</p>
                                <h5 class="card-title">Meme Coins Take Over: Bitcoin and Ethereum Meet Dogecoin’s Latest
                                    Challenger
                                </h5>
                                <p class="card-text">4 June 2025, 15:43 | <strong>6 mins ago</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card hover-zoom" style="width: 19rem; height: auto;">
                            <img src="{{ asset('images/shiba.png') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="text-muted">Markets</p>
                                <h5 class="card-title">Meme Coins Take Over: Bitcoin and Ethereum Meet Dogecoin’s Latest
                                    Challenger
                                </h5>
                                <p class="card-text">4 June 2025, 15:43 | <strong>6 mins ago</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card hover-zoom" style="width: 19rem; height: auto;">
                            <img src="{{ asset('images/shiba.png') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="text-muted">Markets</p>
                                <h5 class="card-title">Meme Coins Take Over: Bitcoin and Ethereum Meet Dogecoin’s Latest
                                    Challenger
                                </h5>
                                <p class="card-text">4 June 2025, 15:43 | <strong>6 mins ago</strong></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="card hover-zoom" style="width: 19rem; height: auto;">
                            <img src="{{ asset('images/shiba.png') }}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <p class="text-muted">Markets</p>
                                <h5 class="card-title">Meme Coins Take Over: Bitcoin and Ethereum Meet Dogecoin’s Latest
                                    Challenger
                                </h5>
                                <p class="card-text">4 June 2025, 15:43 | <strong>6 mins ago</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="load-more-btn">Load more</button>
            </div>
        @endsection
