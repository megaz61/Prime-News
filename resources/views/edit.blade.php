@extends('layout.master')
@section('menuHome', 'active')

@section('content')
    <div class="container">
        <div class="container-form mt-5">
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

            {{-- Tampilkan error validasi --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h1 class="form-title">Edit Berita</h1>

            {{-- Tambahkan method PUT untuk update --}}
            <form method="post" action="{{ route('update', ['id' => $news->id]) }}" enctype="multipart/form-data">
                @csrf
                {{-- @method('PUT') --}}

                <!-- Title Section -->
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <div class="name-row">
                        <div class="name-col">
                            <input type="text" class="formUpNews form-control @error('title') is-invalid @enderror"
                                name="title" placeholder="" value="{{ old('title', $news->title) }}">
                            <div class="name-helper">Title</div>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="name-col">
                            <input type="text" class="formUpNews form-control @error('subtitle') is-invalid @enderror"
                                name="subtitle" placeholder="" value="{{ old('subtitle', $news->subtitle) }}">
                            <div class="name-helper">Subtitle</div>
                            @error('subtitle')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Category Section -->
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="formUpNews form-control @error('category') is-invalid @enderror" name="category"
                        required>
                        <option value="">Choose Category</option>
                        <option value="Politic" {{ old('category', $news->category) == 'Politic' ? 'selected' : '' }}>
                            Politics</option>
                        <option value="Economy" {{ old('category', $news->category) == 'Economy' ? 'selected' : '' }}>
                            Economy</option>
                        <option value="Tech" {{ old('category', $news->category) == 'Tech' ? 'selected' : '' }}>
                            Technology</option>
                        <option value="Influencer"
                            {{ old('category', $news->category) == 'Influencer' ? 'selected' : '' }}>Influencers</option>
                        <option value="Crime" {{ old('category', $news->category) == 'Crime' ? 'selected' : '' }}>Crime
                        </option>
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Upload Image Section -->
                <div class="mb-3">
                    <label class="form-label">Upload Image</label>

                    {{-- Tampilkan gambar saat ini jika ada --}}
                    @if ($news->image)
                        <div class="current-image mb-3">
                            <p><strong>Gambar saat ini:</strong></p>
                            <img src="{{ asset('storage/' . $news->image) }}" alt="Current Image"
                                style="max-width: 200px; max-height: 200px; object-fit: cover;">
                        </div>
                    @endif

                    <div class="upload-area" onclick="document.getElementById('fileInput').click();">
                        <div class="upload-icon">
                            <svg class="cloud-icon" viewBox="0 0 24 24">
                                <path
                                    d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                            </svg>
                        </div>
                        <div class="upload-text">Upload a File (Optional)</div>
                        <div class="upload-subtext">Drag and drop files here or click to browse</div>
                    </div>

                    <input type="file" id="fileInput" name="image" style="display: none;" accept="image/*">
                    @error('image')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror

                    <div class="requirements">
                        <div>
                            <p>Make sure your image is good quality.</p>
                            <p>Make sure you own the rights to use all images in your file.</p>
                            <p>Make sure your file does not contain inappropriate content.</p>
                        </div>
                    </div>
                </div>

                <!-- Content Section -->
                <div class="comments-area">
                    <label class="form-label">Content</label>
                    <textarea name="content" class="form-control comments @error('content') is-invalid @enderror" placeholder="Type here..."
                        style="min-height: 400px; resize: vertical; font-size: 20px;" required>{{ old('content', $news->content) }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn">Update Berita</button>
            </form>
        </div>
    </div>

    <script>
        // Handle file upload preview
        document.getElementById('fileInput').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const uploadArea = document.querySelector('.upload-area');
                uploadArea.innerHTML = `
                    <div class="upload-icon">
                        <svg class="cloud-icon" viewBox="0 0 24 24">
                            <path d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                        </svg>
                    </div>
                    <div class="upload-text">File Selected: ${file.name}</div>
                    <div class="upload-subtext">Click to change file</div>
                `;
            }
        });
    </script>
@endsection
