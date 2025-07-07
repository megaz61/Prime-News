@extends('layout.master')
@section('menuHome', 'active')

@section('content')

    {{-- jika news tidak kosong tampilkan code dibawah ini --}}
    {{-- Check if news data exists, if not show "KOSONG" message --}}
    @if ($highlightNews || $mostReadNews->count() > 0 || $latestNews->count() > 0 || count($newsByCategory) > 0)
        <div class="container mt-5">
            <div class="row">
                <div class="col-6">
                    {{-- <a href="{{ route('viewNews', ['id' => $highlightNews->id]) }}"> --}}
                    {{-- Highlight News --}}
                    @if ($highlightNews)
                        <div class="highlight-container">

                            {{-- <a href="{{ route('viewNews', ['id' => $highlightNews->id]) }}"> --}}
                            <div class="content-highlight" class="content-highlight"
                                onclick="window.location.href='{{ route('viewNews', ['id' => $highlightNews->id]) }}';"
                                style="cursor: pointer;">

                                <img src="{{ $highlightNews->image ? asset('storage/' . $highlightNews->image) : asset('images/police.jpg') }}"
                                    alt="{{ $highlightNews->title }}" class="images_higlight img-fluid rounded shadow">
                                <div class="highlight-box shadow">
                                    <h1 class="Title">{{ $highlightNews->title }}</h1>
                                    <p>{{ $highlightNews->created_at->format('d M Y, H:i') }} |
                                        <strong>{{ $highlightNews->created_at->diffForHumans() }}</strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Most Read Section --}}
                <div class="col-3 sidenews">
                    <div class="mostRead-section">
                        <h2 class="latest-title">Most Read</h2>
                        @foreach ($mostReadNews as $news)
                            <div class="news-item">
                                <a class="news-title h6"
                                    href="{{ route('viewNews', ['id' => $news->id]) }}">{{ $news->title }}</a>
                                {{-- <h3 class="news-title"><a href=""></a></h3> --}}
                                <div class="news-timestamp">{{ $news->created_at->format('M d, Y - H:i') }}</div>
                            </div>
                        @endforeach
                        <button class="see-all-btn">See all →</button>
                    </div>
                </div>

                {{-- Latest Section --}}
                <div class="col-3 sidenews">
                    <div class="latest-section">
                        <h2 class="latest-title">Latest</h2>
                        @foreach ($latestNews as $news)
                            <div class="news-item">
                                <a class="news-title h6 text-white"
                                    href="{{ route('viewNews', ['id' => $news->id]) }}">{{ $news->title }}</a>
                                <div class="news-timestamp">{{ $news->created_at->format('M d, Y - H:i') }}</div>
                            </div>
                        @endforeach
                        <button class="see-all-btn">See all →</button>
                    </div>
                </div>
            </div>

            {{-- Categories: Economy, Politic, Influencer, Technology --}}
            @foreach ($newsByCategory as $categoryName => $categoryNews)
                @if ($categoryNews->count() > 0)
                    <div class="row mt-5">
                        <div class="col-9">
                            <h1><strong>{{ strtoupper($categoryName) }}</strong></h1>
                        </div>
                        <div class="col-3 d-flex justify-content-end">
                            <button type="button" class="btn btn-primary mt-2">
                                <a href="{{ route('category', strtolower($categoryName)) }}"
                                    style="color: white; text-decoration: none;">More Articles</a>
                            </button>
                        </div>
                    </div>
                    <div class="row mt-3">
                        @foreach ($categoryNews as $news)
                            <div class="col-3">
                                <a href="{{ route('viewNews', ['id' => $news->id]) }}">
                                    <div class="card hover-zoom" style="width: 19rem; height: auto;">
                                        <img src="{{ $news->image ? asset('storage/' . $news->image) : asset('images/noImage.png') }}"
                                            class="card-img-top" alt="{{ $news->title }}">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ Str::limit($news->title, 80) }}</h5>
                                            <p class="card-text">{{ $news->created_at->format('d M Y, H:i') }} |
                                                <strong>{{ $news->created_at->diffForHumans() }}</strong>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                @endif
            @endforeach
        </div>
    @else
        {{-- Show empty state when no news available --}}
        <div class="container mt-5 text-center">
            <h1>KOSONG</h1>
        </div>
    @endif
@endsection
