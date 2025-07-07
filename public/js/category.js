document.addEventListener('DOMContentLoaded', function() {
    let offset = 4; // Mulai dari 4 karena sudah load 4 pertama
    const loadMoreBtn = document.querySelector('.load-more-btn');
    const newsContainer = document.querySelector('.moreNews .row');

    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', function() {
            const categoryName = window.location.pathname.split('/').pop();

            // Show loading state
            loadMoreBtn.textContent = 'Loading...';
            loadMoreBtn.disabled = true;

            // Make AJAX request
            fetch(`/category/${categoryName}?offset=${offset}`, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success && data.news.length > 0) {
                    // Add new cards to the container
                    data.news.forEach(news => {
                        const newsCard = createNewsCard(news);
                        newsContainer.appendChild(newsCard);
                    });

                    // Update offset for next load
                    offset += 4;

                    // Hide button if no more news
                    if (!data.hasMore) {
                        loadMoreBtn.style.display = 'none';
                    } else {
                        loadMoreBtn.textContent = 'Load more';
                        loadMoreBtn.disabled = false;
                    }
                } else {
                    // No more news available
                    loadMoreBtn.style.display = 'none';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                loadMoreBtn.textContent = 'Load more';
                loadMoreBtn.disabled = false;
                alert('Terjadi kesalahan saat memuat berita');
            });
        });
    }
});

function createNewsCard(news) {
    const col = document.createElement('div');
    col.className = 'col-3';

    // Format tanggal - PERBAIKAN: gunakan created_at untuk konsistensi
    const createdDate = new Date(news.created_at);
    const formattedDate = createdDate.toLocaleDateString('en-GB', {
        day: 'numeric',
        month: 'long',
        year: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });

    // Hitung waktu yang lalu
    const now = new Date();
    const diffTime = Math.abs(now - createdDate);
    const diffMinutes = Math.floor(diffTime / (1000 * 60));
    const diffHours = Math.floor(diffTime / (1000 * 60 * 60));
    const diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));

    let timeAgo;
    if (diffMinutes < 60) {
        timeAgo = `${diffMinutes} mins ago`;
    } else if (diffHours < 24) {
        timeAgo = `${diffHours} hours ago`;
    } else {
        timeAgo = `${diffDays} days ago`;
    }

    col.innerHTML = `
        <div class="card hover-zoom" style="width: 19rem; height: auto;">
            <img src="/storage/${news.image}" class="card-img-top" alt="${news.title}">
            <div class="card-body">
                <p class="text-muted">${news.category.charAt(0).toUpperCase() + news.category.slice(1)}</p>
                <h5 class="card-title">${news.title}</h5>
                <p class="card-text">${formattedDate} | <strong>${timeAgo}</strong></p>
            </div>
        </div>
    `;

    // Add click event to navigate to news detail
    col.addEventListener('click', function() {
        window.location.href = `/viewNews/${news.id}`;
    });

    return col;
}
