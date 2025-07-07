@extends('layout.master')
@section('menuHome', 'active')

@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    @endpush

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "error",
                title: "{{ session('error') }}"
            });
        </script>
    @endif

    <div class="dashboard-container">
        <!-- Dashboard Header -->
        <div class="dashboard-header">
            <div class="header-content">
                <h1 class="dashboard-title">My Articles Dashboard</h1>
                <p class="dashboard-subtitle">Manage and track your published articles</p>
            </div>
            <div class="header-actions">
                <a href="/upNews" class="btn-upload">
                    <i class="bi bi-plus-circle"></i>
                    <span>Upload News</span>
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="stats-container">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-file-text"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ count($news) }}</h3>
                    <p>Total Articles</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-eye"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $news->sum('jumlah_view') }}</h3>
                    <p>Total Views</p>
                </div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="bi bi-graph-up"></i>
                </div>
                <div class="stat-content">
                    <h3>{{ $news->count() > 0 ? round($news->sum('jumlah_view') / $news->count()) : 0 }}</h3>
                    <p>Avg. Views</p>
                </div>
            </div>
        </div>

        <!-- Articles Table -->
        <div class="table-container">
            <div class="table-header">
                <h2>Your Articles</h2>
                <div class="table-actions">
                    <div class="search-box">
                        <i class="bi bi-search"></i>
                        <input type="text" placeholder="Search articles..." id="searchInput">
                    </div>
                </div>
            </div>

            @if ($news->count() > 0)
                <div class="custom-table">
                    <div class="table-header-row">
                        <div class="table-cell header-cell">
                            <span>Article</span>
                        </div>
                        <div class="table-cell header-cell">
                            <span>Category</span>
                        </div>
                        <div class="table-cell header-cell">
                            <span>Views</span>
                        </div>
                        <div class="table-cell header-cell">
                            <span>Actions</span>
                        </div>
                    </div>

                    @foreach ($news as $index => $item)
                        <div class="table-row" data-title="{{ strtolower($item->title) }}"
                            data-category="{{ strtolower($item->category) }}">
                            <div class="table-cell article-cell">
                                <div class="article-info">
                                    <h4 class="article-title">
                                        <a href="{{ route('viewNews', ['id' => $item->id]) }}">
                                            {{ $item->title }}
                                        </a>
                                    </h4>
                                    <p class="article-meta">
                                        <i class="bi bi-calendar3"></i>
                                        {{ $item->created_at ? $item->created_at->format('M d, Y') : 'N/A' }}
                                    </p>
                                </div>
                            </div>
                            <div class="table-cell category-cell">
                                <span class="category-badge category-{{ strtolower($item->category) }}">
                                    {{ $item->category }}
                                </span>
                            </div>
                            <div class="table-cell views-cell">
                                <div class="views-info">
                                    <span class="views-count">{{ number_format($item->jumlah_view) }}</span>
                                    <span class="views-label">views</span>
                                </div>
                            </div>
                            <div class="table-cell actions-cell">
                                <div class="action-buttons">
                                    <a href="{{ route('editNews', ['id' => $item->id]) }}" class="btn-action btn-edit"
                                        title="Edit">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <button class="btn-action btn-delete" data-id="{{ $item->id }}" title="Delete">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="empty-state">
                    <div class="empty-icon">
                        <i class="bi bi-file-text"></i>
                    </div>
                    <h3>No Articles Yet</h3>
                    <p>Start by uploading your first article</p>
                    <a href="/upNews" class="btn-upload">
                        <i class="bi bi-plus-circle"></i>
                        <span>Upload First Article</span>
                    </a>
                </div>
            @endif
        </div>
    </div>

    <script>
        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('.table-row');

            rows.forEach(row => {
                const title = row.getAttribute('data-title');
                const category = row.getAttribute('data-category');

                if (title.includes(searchTerm) || category.includes(searchTerm)) {
                    row.style.display = 'grid';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        // Delete confirmation
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function(e) {
                e.preventDefault();
                const newsId = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this action!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#ef4444',
                    cancelButtonColor: '#6b7280',
                    confirmButtonText: 'Yes, delete it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = `/hapus/${newsId}`;
                    }
                });
            });
        });
    </script>

@endsection
