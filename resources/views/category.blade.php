@extends('layout.master')

@section('content')
    <div class="category">
        <div class="container mb-5">
            <div class="title-category">
                <h1 class="text-center">{{ strtoupper($categoryName) }}</h1>
            </div>

            @if ($trendingNews->count() > 0)
                <div class="highlight">
                    <h1>Trending Now</h1>
                    <div class="row">
                        @foreach ($trendingNews as $index => $trending)
                            <div class="{{ $index == 0 ? 'col-8' : 'col-4' }}">
                                <div class="highlight-container"
                                    onclick="window.location.href='{{ route('viewNews', ['id' => $trending->id]) }}';"
                                    style="cursor: pointer;">
                                    <img src="{{ asset('storage/' . $trending->image) }}" alt="{{ $trending->title }}"
                                        class="images_higlight img-fluid rounded shadow">
                                    <div class="highlight-box shadow">
                                        <h1 class="Title">{{ $trending->title }}</h1>
                                        <p>{{ $trending->published_at->format('d M Y, H:i') }} |
                                            <strong>{{ $trending->published_at->diffForHumans() }}</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- moreNews - DIPERBAIKAN --}}
            <div class="moreNews mt-5 mb-5">
                <h1>More In {{ ucfirst($categoryName) }}</h1>

                <div class="row mt-3">
                    @if ($moreNews && $moreNews->count() > 0)
                        @foreach ($moreNews as $news)
                            <div class="col-3">
                                <div class="card hover-zoom" style="width: 19rem; height: auto;"
                                    onclick="window.location.href='/viewNews/{{ $news->id }}'">
                                    <img src="{{ asset('storage/' . $news->image) }}" class="card-img-top"
                                        alt="{{ $news->title }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $news->title }}</h5>
                                        <p class="card-text">
                                            {{ \Carbon\Carbon::parse($news->created_at)->format('d M Y, H:i') }} |
                                            <strong>{{ \Carbon\Carbon::parse($news->created_at)->diffForHumans() }}</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12">
                            <p class="text-center">Belum ada berita lain di kategori {{ $categoryName }}</p>
                        </div>
                    @endif
                </div>

                @if ($hasMore)
                    <div class="text-center mt-3">
                        <button class="btn btn-primary load-more-btn">Load more</button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Include JavaScript for Load More --}}
    <script src="{{ asset('js/category.js') }}"></script>
@endsection
