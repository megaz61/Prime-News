@extends('layout.master')
@section('menuHome', 'active')

@section('content')
    <div class="search-page">
        <div class="container mt-5">
            <!-- Search Header -->
            <div class="search-header">
                <div class="search-input-container">
                    <form class="search-form" action="/search" method="GET">
                        <div class="search-input-wrapper">
                            <input type="text" name="q" class="search-input" value="{{ $query ?? '' }}"
                                placeholder="Search news..." autocomplete="off">
                            <button type="submit" class="search-submit-btn">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Search Results -->
            @if (isset($query) && $query)
                <div class="search-results-header">
                    <div class="results-count">
                        <h2>
                            {{ number_format($totalResults) }} SEARCH RESULTS FOR "{{ strtoupper($query) }}"
                            @if (isset($category) && $category !== 'ALL RESULTS')
                                <span class="filter-indicator">in {{ strtoupper($category) }}</span>
                            @endif
                        </h2>
                    </div>

                    <div class="filter-sort-container">
                        <div class="filter-dropdown">
                            <label>FILTER</label>
                            <select class="form-select filter-select">
                                <option value="ALL RESULTS"
                                    {{ !isset($category) || $category == 'ALL RESULTS' ? 'selected' : '' }}>ALL RESULTS
                                </option>
                                <option value="Economy" {{ isset($category) && $category == 'Economy' ? 'selected' : '' }}>
                                    Economy</option>
                                <option value="Politic" {{ isset($category) && $category == 'Politic' ? 'selected' : '' }}>
                                    Politics</option>
                                <option value="Technology"
                                    {{ isset($category) && $category == 'Technology' ? 'selected' : '' }}>Technology
                                </option>
                                <option value="Influencers"
                                    {{ isset($category) && $category == 'Influencers' ? 'selected' : '' }}>Influencers
                                </option>
                            </select>
                        </div>

                        <div class="sort-dropdown">
                            <label>SORT BY</label>
                            <select class="form-select sort-select">
                                <option value="relevant" {{ !isset($sort) || $sort == 'relevant' ? 'selected' : '' }}>
                                    RELEVANT</option>
                                <option value="newest" {{ isset($sort) && $sort == 'newest' ? 'selected' : '' }}>NEWEST
                                </option>
                                <option value="oldest" {{ isset($sort) && $sort == 'oldest' ? 'selected' : '' }}>OLDEST
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- Results List -->
                    <div class="search-results-list">
                        @if ($searchResults->count() > 0)
                            @foreach ($searchResults as $news)
                                <article class="search-result-item">
                                    <div class="result-content">
                                        <div class="result-category">
                                            <span class="category-tag">{{ strtoupper($news->category) }}</span>
                                        </div>

                                        <h3 class="result-title">
                                            <a href="{{ route('viewNews', ['id' => $news->id]) }}">{{ $news->title }}</a>
                                        </h3>

                                        <p class="result-excerpt">
                                            {{ Str::limit(strip_tags($news->content), 200) }}
                                        </p>

                                        <div class="result-meta">
                                            <span class="result-author">{{ $news->publisher }}</span>
                                            <span class="result-date">{{ $news->created_at->format('n/j/Y g:i A') }}</span>
                                        </div>
                                    </div>

                                    @if ($news->image)
                                        <div class="result-image">
                                            <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}">
                                        </div>
                                    @endif
                                </article>
                            @endforeach

                            <!-- Pagination -->
                            <div class="search-pagination">
                                {{ $searchResults->appends(request()->query())->links() }}
                            </div>
                        @else
                            <div class="no-results">
                                <h3>No results found for "{{ $query }}"</h3>
                                <p>Try different keywords or check your spelling.</p>
                            </div>
                        @endif
                    </div>
                @else
                    <!-- Empty State -->
                    <div class="search-empty-state">
                        <div class="empty-state-content">
                            <i class="fas fa-search search-icon"></i>
                            <h2>Search PrimeNews</h2>
                            <p>Enter keywords to find news articles, analysis, and market insights.</p>

                            <div class="search-suggestions">
                                <h4>Popular searches:</h4>
                                <div class="suggestion-tags">
                                    <a href="{{ route('search', ['q' => 'cryptocurrency']) }}"
                                        class="suggestion-tag">Cryptocurrency</a>
                                    <a href="{{ route('search', ['q' => 'economy']) }}" class="suggestion-tag">Economy</a>
                                    <a href="{{ route('search', ['q' => 'technology']) }}"
                                        class="suggestion-tag">Technology</a>
                                    <a href="{{ route('search', ['q' => 'politics']) }}"
                                        class="suggestion-tag">Politics</a>
                                </div>
                            </div>
                        </div>
                    </div>
            @endif
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filterSelect = document.querySelector('.filter-select');
            const sortSelect = document.querySelector('.sort-select');
            const searchForm = document.querySelector('.search-form');

            // Function to update URL with current filters
            function updateSearch() {
                const currentUrl = new URL(window.location);
                const query = currentUrl.searchParams.get('q') || '';
                const filter = filterSelect.value !== 'ALL RESULTS' ? filterSelect.value : '';
                const sort = sortSelect.value !== 'RELEVANT' ? sortSelect.value : '';

                // Build new URL
                let newUrl = '/search?q=' + encodeURIComponent(query);
                if (filter) newUrl += '&category=' + encodeURIComponent(filter);
                if (sort) newUrl += '&sort=' + encodeURIComponent(sort);

                // Redirect to new URL
                window.location.href = newUrl;
            }

            // Add event listeners
            filterSelect.addEventListener('change', updateSearch);
            sortSelect.addEventListener('change', updateSearch);

            // Set current values from URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            const currentCategory = urlParams.get('category');
            const currentSort = urlParams.get('sort');

            if (currentCategory) {
                filterSelect.value = currentCategory;
            }
            if (currentSort) {
                sortSelect.value = currentSort;
            }
        });
    </script>
@endsection
