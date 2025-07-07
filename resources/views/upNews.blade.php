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
            <h1 class="form-title">Submit a News</h1>
            <p class="form-subtitle">Submit your News</p>

            <form method="post" action="/upNews" enctype="multipart/form-data">
                @csrf
                <!-- Name Section -->
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <div class="name-row">
                        <div class="name-col">
                            <input type="text" class="formUpNews form-control" name="title" placeholder="">
                            <div class="name-helper">Title</div>
                        </div>
                        <div class="name-col">
                            <input type="text" class="formUpNews form-control" name="subtitle" placeholder="">
                            <div class="name-helper">Subtitle</div>
                        </div>
                    </div>
                </div>

                <!-- Gender Section (New) -->
                <div class="mb-3">
                    <label class="form-label">Category</label>
                    <select class="formUpNews form-control" name="category">
                        <option value="">Choose Category</option>
                        <option value="Politic">Politics</option>
                        <option value="Economy">Economy</option>
                        <option value="Tech">Technology</option>
                        {{-- <option value="Influencer">Influencers</option> --}}
                    </select>
                </div>

                <!-- Upload Video Section -->
                <div class="mb-3">
                    <label class="form-label">Upload Image</label>
                    <div class="upload-area" onclick="document.getElementById('fileInput').click();">
                        <div class="upload-icon">
                            <svg class="cloud-icon" viewBox="0 0 24 24">
                                <path
                                    d="M14,2H6A2,2 0 0,0 4,4V20A2,2 0 0,0 6,22H18A2,2 0 0,0 20,20V8L14,2M18,20H6V4H13V9H18V20Z" />
                            </svg>
                        </div>
                        <div class="upload-text">Upload a File</div>
                        <div class="upload-subtext">Drag and drop files here</div>
                    </div>
                    <!-- Tambahkan name="image" agar bisa diakses di controller -->
                    <input type="file" id="fileInput" name="image" style="display: none;" accept="image/*">

                    <div class="requirements">
                        <div>
                            <p>Make sure your image is good quality.</p>
                            <p>Make sure you own the rights to use all images in your file.</p>
                            <p>Make sure your file does not contain inappropriate content.</p>
                        </div>
                    </div>
                </div>

                <!-- Agreement Section -->
                {{-- <div class="checkbox-container">
                    <label class="form-label">Do You Agree to the Terms Above?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="agreeYes" name="agreement" value="yes">
                        <label class="form-check-label" for="agreeYes">Yes, I do</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="agreeNo" name="agreement" value="no">
                        <label class="form-check-label" for="agreeNo">No, I don't</label>
                    </div>
                </div> --}}

                <!-- Comments Section -->
                <div class="comments-area">
                    <label class="form-label">Content</label>
                    <textarea name="content" class="form-control comments" placeholder="Type here..."
                        style="min-height: 400px; resize: vertical; font-size: 20px;" required></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn">Submit</button>
            </form>

            <!-- Add Page Link -->
        </div>
    </div>
    {{-- <script>
        // Handle checkbox behavior (only one can be selected)
        const checkboxes = document.querySelectorAll('input[name="agreement"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    checkboxes.forEach(cb => {
                        if (cb !== this) cb.checked = false;
                    });
                }
            });
        });

        // Handle file upload
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
    </script> --}}
    <script>
        // Handle checkbox behavior (only one can be selected)
        const checkboxes = document.querySelectorAll('input[name="agreement"]');
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    checkboxes.forEach(cb => {
                        if (cb !== this) cb.checked = false;
                    });
                }
            });
        });

        // Handle file upload
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

                // Create FormData object to send file to backend
                const formData = new FormData();
                formData.append('image', file); // Append the file to the formData object

                // Send the file via AJAX to the controller
                fetch('/upload-image', { // Ganti dengan URL route Laravel kamu
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content') // Pastikan token CSRF ada
                        },
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            console.log('Image uploaded successfully!');
                        } else {
                            console.error('Upload failed:', data.error);
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        });
    </script>

@endsection
