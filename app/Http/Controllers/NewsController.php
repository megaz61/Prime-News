<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\news;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    // upNews
    public function store(Request $request)
    {
        // Debug: Check what data is being received
        // dd($request->all()); // Remove this after debugging

        $validateData = $request->validate([
            "title" => "required|max:255",
            'subtitle' => 'nullable|max:255',
            "category" => "required",
            "content" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg,gif,webp|max:2048"
        ]);

        try {
            $news = new news();
            $news->user_id = Auth::user()->id;
            $news->publisher = Auth::user()->fullname;
            $news->title = $request->title;

            // Map form fields to database columns
            $news->subtitle = $request->subtitle;  // This maps to 'subtitle' column
            // If you want to use subtitle2, subtitle3:
            // $news->subtitle2 = $request->subtitle;
            // $news->subtitle3 = null; // or some default value

            $news->content = $request->content;    // This maps to 'content' column
            // If you want to use content2, content3:
            // $news->content2 = $request->content;
            // $news->content3 = null; // or some default value

            $news->category = $request->category;

            // Handle file upload
            if ($request->hasFile('image')) {
                $file_gambar = $request->file("image");
                $user_id = Auth::user()->id;
                $nama_file = $user_id . '_' . $file_gambar->getClientOriginalName();

                // Create storage directory if it doesn't exist
                $storage_path = public_path('storage');
                if (!file_exists($storage_path)) {
                    mkdir($storage_path, 0755, true);
                }

                $file_gambar->move($storage_path, $nama_file);
                $news->image = $nama_file;
            }

            // Set default values for timestamp columns if they're not auto-managed
            $news->published_at = now();
            $news->published_time = now()->format('H:i:s');

            // IMPORTANT: Save the data to database
            $saved = $news->save();

            if ($saved) {
                return redirect()->back()->with('success', 'Anda berhasil Upload Berita!');
            } else {
                return back()->with('error', 'Failed to save news to database');
            }

        } catch (\Exception $e) {
            return back()->with('error', 'Upload News Fail: ' . $e->getMessage());
        }
    }

    // FUNGSI tampilin Home
    public function index()
    {
        // highlight news
        $highlightTitle = "The Fed is likely to keep rates the same but give a forecast that moves markets. What to expect";
        $highlightNews = News::where('title', $highlightTitle)->first();

        if (!$highlightNews) {
            $highlightNews = News::latest()->first();
        }

        //  Most Read dan Latest
        $mostReadNews = News::orderBy('jumlah_view', 'desc')->limit(5)->get();
        $latestNews = News::latest()->limit(5)->get();

        //  kategori dinamis dari database
        $availableCategories = News::distinct()
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->pluck('category')
            ->map(function ($cat) {
                return strtolower(trim($cat));
            })
            ->unique()
            ->toArray();

        // Kategori yang ingin ditampilkan
        $desiredCategories = ['economy', 'politic', 'technology', 'influencer'];
        $newsByCategory = [];

        foreach ($desiredCategories as $category) {
            // Cari berita dengan case insensitive dan trim whitespace
            $latestInCategory = News::whereRaw('LOWER(TRIM(category)) = ?', [strtolower($category)])
                ->latest()
                ->limit(2)
                ->get();

            if ($latestInCategory->count() > 0) {
                $randomInCategory = News::whereRaw('LOWER(TRIM(category)) = ?', [strtolower($category)])
                    ->whereNotIn('id', $latestInCategory->pluck('id'))
                    ->inRandomOrder()
                    ->limit(2)
                    ->get();

                $newsByCategory[ucfirst($category)] = $latestInCategory->merge($randomInCategory);
            }
        }

        // Technology category
        if (!isset($newsByCategory['Technology'])) {
            $techVariations = ['tech', 'teknologi', 'Technology', 'TECHNOLOGY'];

            foreach ($techVariations as $variation) {
                $techNews = News::whereRaw('LOWER(TRIM(category)) = ?', [strtolower($variation)])
                    ->latest()
                    ->limit(4)
                    ->get();

                if ($techNews->count() > 0) {
                    $newsByCategory['Technology'] = $techNews;
                    break;
                }
            }
        }

        return view('home', compact(
            'highlightNews',
            'mostReadNews',
            'latestNews',
            'newsByCategory'
        ));
    }

    // Fungsi nampilin detail Berita
    public function viewNews($id)
    {
        // Temukan berita berdasarkan ID
        $news = News::find($id);

        // Jika berita tidak ditemukan, kembalikan ke halaman sebelumnya dengan pesan error
        if (!$news) {
            return redirect()->back()->with('error', 'Berita tidak ditemukan.');
        }

        // Tambahkan jumlah view setiap kali halaman ini dibuka
        $news->increment('jumlah_view');

        // Kirim data berita ke view
        return view('viewNews', compact('news'));
    }

    // FUNGSI UPDATE BERITA
    public function updateNews($id)
    {
        $news = News::find($id);
        return view('edit', compact('news'));
    }
    public function updateNewsStore(Request $request, $id)
    {
        // Validasi - image tidak wajib saat update
        $validateData = $request->validate([
            "title" => "required|max:255",
            'subtitle' => 'nullable|max:255',
            "category" => "required",
            "content" => "required",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048" // ubah ke nullable
        ]);

        $news = News::find($id);

        if (!$news) {
            return redirect()->back()->with('error', 'Berita tidak ditemukan');
        }

        // Update data tanpa image dulu
        $news->title = $request->title;
        $news->subtitle = $request->subtitle;
        $news->content = $request->content;
        $news->category = $request->category;

        // Handle file upload jika ada gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($news->image && file_exists(public_path('storage/' . $news->image))) {
                unlink(public_path('storage/' . $news->image));
            }

            $file_gambar = $request->file("image");
            $user_id = Auth::user()->id;
            $nama_file = $user_id . '_' . time() . '_' . $file_gambar->getClientOriginalName(); // tambahkan timestamp

            // Create storage directory if it doesn't exist
            $storage_path = public_path('storage');
            if (!file_exists($storage_path)) {
                mkdir($storage_path, 0755, true);
            }

            $file_gambar->move($storage_path, $nama_file);
            $news->image = $nama_file;
        }

        // Gunakan save() bukan update()
        $news->save();

        return redirect()->back()->with('success', 'Berhasil Update Berita');
    }

    // hapus berita bedasarkan id
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect()->back()->with('success', 'Berhasil Dihapus');
    }

    // view category

    public function category($categoryName, Request $request)
    {
        // PERBAIKAN: Sesuaikan dengan nilai kategori yang ada di database
        $validCategories = ['Politic', 'Economy', 'Tech', 'Influencers'];

        // Map URL ke kategori database jika perlu
        $categoryMap = [
            'politic' => 'Politic',
            'economy' => 'Economy',
            'technology' => 'Tech',
            'tech' => 'Tech',
            'influencers' => 'Influencers'
        ];

        // Tentukan kategori yang akan digunakan untuk query
        $dbCategory = $categoryMap[strtolower($categoryName)] ?? ucfirst(strtolower($categoryName));

        if (!in_array($dbCategory, $validCategories)) {
            return redirect('/')->with('error', 'Kategori tidak ditemukan.');
        }

        // Ambil 2 berita trending
        $trendingNews = News::where('category', $dbCategory)
            ->orderBy('jumlah_view', 'desc')
            ->orderBy('created_at', 'desc')
            ->limit(2)
            ->get();

        // Jika tidak ada berita trending, ambil 2 berita terbaru dari kategori
        if ($trendingNews->count() < 2) {
            $trendingNews = News::where('category', $dbCategory)
                ->orderBy('created_at', 'desc')
                ->limit(2)
                ->get();
        }

        // Untuk AJAX request (Load More)
        if ($request->ajax()) {
            $offset = $request->get('offset', 0);

            $moreNews = News::where('category', $dbCategory)
                ->whereNotIn('id', $trendingNews->pluck('id'))
                ->orderBy('created_at', 'desc')
                ->offset($offset)
                ->limit(4)
                ->get();

            return response()->json([
                'success' => true,
                'news' => $moreNews,
                'hasMore' => $moreNews->count() == 4
            ]);
        }

        // PERBAIKAN: Ambil semua berita dari kategori untuk debugging
        $allNewsInCategory = News::where('category', $dbCategory)->get();

        // PERBAIKAN: Log tanpa menggunakan toArray() yang menyebabkan error
        \Log::info("Total berita di kategori {$categoryName}: " . $allNewsInCategory->count());
        \Log::info("Trending news count: " . $trendingNews->count());

        // Ambil 4 berita pertama untuk "More In Category"
        $moreNews = News::where('category', $dbCategory)
            ->whereNotIn('id', $trendingNews->pluck('id'))
            ->orderBy('created_at', 'desc')
            ->limit(4)
            ->get();

        \Log::info("More news count: " . $moreNews->count());

        // Jika tidak ada more news, ambil berita lain dari kategori yang sama
        if ($moreNews->count() == 0) {
            $moreNews = News::where('category', $dbCategory)
                ->orderBy('created_at', 'desc')
                ->limit(4)
                ->get();
        }

        // Hitung total berita untuk menentukan apakah ada "Load More"
        $totalMoreNews = News::where('category', $dbCategory)
            ->whereNotIn('id', $trendingNews->pluck('id'))
            ->count();

        $hasMore = $totalMoreNews > 4;

        return view('category', compact(
            'categoryName',
            'trendingNews',
            'moreNews',
            'hasMore'
        ));
    }

    // search
    public function search(Request $request)
    {
        $query = $request->get('q');
        $category = $request->get('category');
        $sort = $request->get('sort', 'relevant');
        $perPage = 10;

        if ($query) {
            $searchQuery = News::where('title', 'LIKE', "%{$query}%")
                ->orWhere('content', 'LIKE', "%{$query}%");

            // Apply category filter
            if ($category && $category !== 'ALL RESULTS') {
                $searchQuery->where('category', $category);
            }

            // Apply sorting
            switch ($sort) {
                case 'newest':
                    $searchQuery->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $searchQuery->orderBy('created_at', 'asc');
                    break;
                default: // relevant
                    $searchQuery->orderByRaw("
                    (CASE
                        WHEN title LIKE ? THEN 1
                        WHEN content LIKE ? THEN 2
                        ELSE 3
                    END), created_at DESC
                ", ["%{$query}%", "%{$query}%"]);
                    break;
            }

            $searchResults = $searchQuery->paginate($perPage);
            $totalResults = $searchResults->total();

            return view('search', compact('searchResults', 'query', 'totalResults', 'category', 'sort'));
        }

        return view('search', ['query' => $query]);
    }
    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('news.detail', compact('news'));
    }

    // atau
    public function view($id)
    {
        $news = News::findOrFail($id);
        return view('news.detail', compact('news'));
    }
}
