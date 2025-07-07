@extends('layout.master')
@section('menuHome', 'active')

@section('content')
    {{-- @if (session('success'))
        <script>
            Swal.fire({
                title: "{{ session('success') }}",
                icon: "success",
                draggable: true
            });
        </script>
    @endif --}}

    <div class="container mt-5">
        <div class="row">
            <div class="col-6">
                {{-- Kontainer untuk gambar dan teks --}}
                <div class="highlight-container">
                    <img src="{{ asset('images/police.jpg') }}" alt="Police Image"
                        class="images_higlight img-fluid rounded shadow">
                    {{-- Kotak teks --}}
                    <div class="highlight-box shadow">
                        <h1 class="Title">Mastermind Behind French Crypto Kidnapping Cases Arrested in Morocco</h1>
                        <p>4 June 2025, 15:43 GMT+0000 | <strong>6 mins ago</strong></p>
                    </div>
                </div>
            </div>
            {{-- sidenews 7 berita --}}
            <div class="col-3 sidenews">
                <div class="mostRead-section">
                    <h2 class="latest-title">Most Read</h2>
                    <div class="news-item">
                        <h3 class="news-title">Dogecoin (DOGE) Price Rapidly Falls as Death Cross Threatens 20% Collapse
                        </h3>
                        <div class="news-timestamp">Jun 18, 2025 - 15:48</div>
                    </div>

                    <div class="news-item">
                        <h3 class="news-title">1.63 Billion Shiba Inu Stun Biggest Crypto Exchange Despite Epic Sell-off
                        </h3>
                        <div class="news-timestamp">Jun 18, 2025 - 15:39</div>
                    </div>

                    <div class="news-item">
                        <h3 class="news-title">Ethereum Pectra Upgrade Arrives on Layer-2 Arbitrum</h3>
                        <div class="news-timestamp">Jun 18, 2025 - 15:34</div>
                    </div>

                    <div class="news-item">
                        <h3 class="news-title">Coinbase CEO Ends Speculation as USDC Stablecoin Coming to US...</h3>
                        <div class="news-timestamp">Jun 18, 2025 - 15:09</div>
                    </div>

                    <div class="news-item">
                        <h3 class="news-title">Top Bitcoin Trader Closes All Long Positions After Massive Losses</h3>
                        <div class="news-timestamp">Jun 18, 2025 - 14:53</div>
                    </div>

                    <div class="news-item">
                        <h3 class="news-title">Dogecoin on Verge of Flipping Tron, But There's a Twist</h3>
                        <div class="news-timestamp">Jun 18, 2025 - 14:34</div>
                    </div>

                    <button class="see-all-btn">See all →</button>
                </div>
            </div>
            <div class="col-3 sidenews">
                <div class="latest-section">
                    <h2 class="latest-title">Latest</h2>

                    <div class="news-item">
                        <h3 class="news-title">Dogecoin (DOGE) Price Rapidly Falls as Death Cross Threatens 20% Collapse
                        </h3>
                        <div class="news-timestamp">Jun 18, 2025 - 15:48</div>
                    </div>

                    <div class="news-item">
                        <h3 class="news-title">1.63 Billion Shiba Inu Stun Biggest Crypto Exchange Despite Epic Sell-off
                        </h3>
                        <div class="news-timestamp">Jun 18, 2025 - 15:39</div>
                    </div>

                    <div class="news-item">
                        <h3 class="news-title">Ethereum Pectra Upgrade Arrives on Layer-2 Arbitrum</h3>
                        <div class="news-timestamp">Jun 18, 2025 - 15:34</div>
                    </div>

                    <div class="news-item">
                        <h3 class="news-title">Coinbase CEO Ends Speculation as USDC Stablecoin Coming to US...</h3>
                        <div class="news-timestamp">Jun 18, 2025 - 15:09</div>
                    </div>

                    <div class="news-item">
                        <h3 class="news-title">Top Bitcoin Trader Closes All Long Positions After Massive Losses</h3>
                        <div class="news-timestamp">Jun 18, 2025 - 14:53</div>
                    </div>

                    <div class="news-item">
                        <h3 class="news-title">Dogecoin on Verge of Flipping Tron, But There's a Twist</h3>
                        <div class="news-timestamp">Jun 18, 2025 - 14:34</div>
                    </div>

                    <button class="see-all-btn">See all →</button>
                </div>
            </div>
        </div>
        {{-- News Cards --}}
        <div class="row mt-5">
            <div class="col-9">
                {{-- bisa influencer news/financial news/dll --}}
                <h1><strong>NEWS</strong></h1>
            </div>
            <div class="col-3 d-flex justify-content-end">
                <button type="button" class="btn btn-primary mt-2">More Articles</button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-3">
                <div class="card hover-zoom" style="width: 19rem; height: auto;">
                    <img src="{{ asset('images/shiba.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="text-muted">Markets</p>
                        <h5 class="card-title">Meme Coins Take Over: Bitcoin and Ethereum Meet Dogecoin’s Latest Challenger
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
                        <h5 class="card-title">Meme Coins Take Over: Bitcoin and Ethereum Meet Dogecoin’s Latest Challenger
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
                        <h5 class="card-title">Meme Coins Take Over: Bitcoin and Ethereum Meet Dogecoin’s Latest Challenger
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
                        <h5 class="card-title">Meme Coins Take Over: Bitcoin and Ethereum Meet Dogecoin’s Latest Challenger
                        </h5>
                        <p class="card-text">4 June 2025, 15:43 | <strong>6 mins ago</strong></p>
                    </div>
                </div>
            </div>
        </div>
        {{-- Analisys Cards --}}
        <div class="row mt-5">
            <div class="col-9">
                <h1><strong>Analysis</strong></h1>
            </div>
            <div class="col-3 d-flex justify-content-end">
                <button type="button" class="btn btn-primary mt-2">More Articles</button>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-3">
                <div class="card hover-zoom" style="width: 19rem; height: auto;">
                    <img src="{{ asset('images/shiba.png') }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <p class="text-muted">Markets</p>
                        <h5 class="card-title">Meme Coins Take Over: Bitcoin and Ethereum Meet Dogecoin’s Latest Challenger
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
                        <h5 class="card-title">Meme Coins Take Over: Bitcoin and Ethereum Meet Dogecoin’s Latest Challenger
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
                        <h5 class="card-title">Meme Coins Take Over: Bitcoin and Ethereum Meet Dogecoin’s Latest Challenger
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
                        <h5 class="card-title">Meme Coins Take Over: Bitcoin and Ethereum Meet Dogecoin’s Latest Challenger
                        </h5>
                        <p class="card-text">4 June 2025, 15:43 | <strong>6 mins ago</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
