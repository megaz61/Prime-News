# Prime News - Platform Berita Digital dengan AI Chatbot

<p align="center">
    <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
    <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="PHP">
    <img src="https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white" alt="MySQL">
    <img src="https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black" alt="JavaScript">
    <img src="https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white" alt="HTML5">
    <img src="https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white" alt="CSS3">
    <img src="https://img.shields.io/badge/Flowise-4285F4?style=for-the-badge&logo=openai&logoColor=white" alt="Flowise">
</p>

<p align="center">
    <img src="https://img.shields.io/badge/News-Platform-red?style=for-the-badge" alt="News">
    <img src="https://img.shields.io/badge/AI-Chatbot-blue?style=for-the-badge" alt="AI Chatbot">
</p>

## Image
<div align="center">
    <img src="https://drive.google.com/uc?export=view&id=1AzLDpKLYlvfb64MUJhNwgBrCO9Zq_3L8" alt="Tampilan Halaman Beranda" width="400"/>
    <img src="https://drive.google.com/uc?export=view&id=1bqALD-vNZo59ARLDgS45rNHX2LtJlf_9" alt="Tampilan Halaman Artikel" width="400"/>
    <img src="https://drive.google.com/uc?export=view&id=1hQQUa84CAYQJcS59w6xG0U7VM3LfkDHn" alt="Tampilan Halaman Admin" width="400"/>
    <img src="https://drive.google.com/uc?export=view&id=1ktU005M0hNwFypykdCqYW7tZwKHN47nk" alt="Tampilan Fitur AI Chatbot" width="400"/>
</div>

## 📰 Tentang Prime News

**Prime News** adalah platform berita digital modern yang dikembangkan mandiri, menawarkan pengalaman membaca yang interaktif dan informatif. Dengan memadukan teknologi web dan kecerdasan buatan, kami hadir untuk pengalaman pengguna yang unik Platform ini tidak hanya menyajikan berita terkini, tetapi juga memungkinkan pengguna untuk berinteraksi dengan konten melalui chatbot AI yang terhubung langsung dengan database, memberikan pengalaman yang lebih personal dan interaktif.

### 🎯 Visi & Misi

**Visi**: Menjadi platform berita digital yang memberikan informasi akurat dan mudah diakses dengan bantuan teknologi AI.

**Misi**: 
- Menyediakan berita terkini dan terpercaya
- Memudahkan akses informasi melalui fitur pencarian yang canggih
- Memberikan pengalaman interaktif melalui AI chatbot
- Mendukung literasi digital dan informasi di masyarakat

### ✨ Fitur Utama

#### 📰 Manajemen Berita
- **Berita Terkini**: Tampilan berita terbaru dengan layout yang menarik
- **Kategori Berita**: Organisasi berita berdasarkan kategori (Politik, Technology, Economy, dll.)
- **Artikel Lengkap**: Tampilan artikel dengan format yang mudah dibaca
- **Trending News**: Berita yang sedang populer dan banyak dibaca

#### 🔍 Pencarian Canggih
- **Pencarian Global**: Pencarian berita berdasarkan judul, konten, atau kategori
- **Filter Lanjutan**: Filter berdasarkan tanggal, kategori, dan popularitas
- 
#### 🤖 AI Chatbot (Flowise Integration)
- **Chatbot Interaktif**: Chatbot yang dapat menjawab pertanyaan seputar berita
- **Database Integration**: Terhubung langsung dengan database untuk informasi real-time
- **Konteks Awareness**: Mampu memahami konteks percakapan
- **Smart Responses**: Memberikan jawaban yang relevan dan informatif

#### 👤 Manajemen Pengguna
- **User Registration**: Sistem registrasi pengguna yang mudah
- **User Dashboard**: Panel personal User

#### 📊 Analytics & Monitoring
- **View Counter**: Penghitung jumlah pembaca artikel
- **Popular Articles**: Tracking artikel yang paling banyak dibaca
- **User Engagement**: Monitoring interaksi pengguna

### 🛠️ Teknologi yang Digunakan

**Backend:**
- **Laravel**: Framework PHP untuk backend yang robust
- **MySQL**: Database management system

**Frontend:**
- **HTML5**: Markup language untuk struktur halaman
- **CSS3**: Styling dengan modern CSS features
- **JavaScript**: Interactive functionality dan AJAX

**AI & Chatbot:**
- **Flowise**: Low-code platform untuk membangun chatbot AI
- **Database Integration**: Koneksi langsung ke database MySQL
- **Real-time Chat**: Komunikasi real-time dengan pengguna

**Tools & Services:**
- **Composer**: PHP dependency management
- **NPM**: JavaScript package management
- **Git**: Version control system
- **Apache/Nginx**: Web server

## 🚀 Instalasi

### Persyaratan Sistem

- PHP >= 8.1
- Composer
- MySQL >= 8.0
- Node.js & NPM >= 16.x
- Git
- Apache/Nginx Web Server
- Flowise (untuk chatbot functionality)

### Langkah Instalasi

#### 1. Setup Laravel Application

1. **Clone Repository**
   ```bash
   git clone https://github.com/megaz61/Prime-News.git
   cd Prime-News
   ```

2. **Install Dependencies**
   ```bash
   # Install PHP dependencies
   composer install
   
   # Install JavaScript dependencies
   npm install
   ```

3. **Database Configuration**
   
   Edit file `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=prime_news
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

4. **Database Setup**
   ```bash
   # Create database
   mysql -u root -p -e "CREATE DATABASE prime_news;"
   
   # Run migrations
   php artisan migrate
   
   # Seed database with sample data
   php artisan db:seed
   ```

5. **Storage Setup**
   ```bash
   # Create storage symlink
   php artisan storage:link
   
   # Set permissions (Linux/Mac)
   chmod -R 775 storage bootstrap/cache
   ```

6. **Build Assets**
   ```bash
   # Build assets for production
   npm run build
   
   # Or for development
   npm run dev
   ```

#### 2. Setup Flowise AI Chatbot

##### 2.1 Install Flowise

Untuk instalasi Flowise, silakan ikuti panduan lengkap di dokumentasi resmi:
📖 **[Flowise Installation Guide](https://docs.flowiseai.com/getting-started)**

Setelah instalasi berhasil, akses Flowise dashboard di `http://localhost:3000`

##### 2.2 Import Workflow dari Repository

1. **Import Workflow ke Flowise**
   - Buka Flowise dashboard di `http://localhost:3000`
   - Klik tombol **"Import"** atau **"Load"**
   - Pilih file workflow dari folder `flowise/` di repository
   - Klik **"Import"** untuk memuat workflow

##### 2.3 Konfigurasi Workflow

Sesuaikan konfigurasi dengan database Anda untuk code yang sudah ada di workflow:
- **Database Connection**: Update credentials database MySQL
- **AI Model**: Masukkan API key provider AI yang akan digunakan
- **Prompts & Functions**: Sesuaikan prompts dan JavaScript functions sesuai kebutuhan

##### 2.4 Test & Deploy Workflow

- Test workflow di Flowise dashboard
- Pastikan chatbot dapat terhubung dengan database
- Copy API endpoint setelah workflow berjalan dengan baik

##### 2.5 Export & Replace Code

1. **Export Code dari Flowise**
   - Di Flowise dashboard, klik **"Export"** atau **"Embed"**
   - Pilih **"Embed Code"** dan copy kode yang dihasilkan

2. **Replace Code di Laravel**
   - Buka file `resources/views/layouts/master.blade.php`
   - Cari section `{{-- chatbot Flowise --}}`
   - Replace dengan kode yang sudah di-export dari Flowise

#### 3. Run Application

```bash
# Start Laravel development server
php artisan serve
```

Akses aplikasi di `http://localhost:8000`

### 📋 Penggunaan

#### Untuk Pengguna

1. **Membaca Berita**
   - Kunjungi homepage untuk melihat berita terkini
   - Pilih kategori yang diinginkan
   - Klik artikel untuk membaca selengkapnya

2. **Mencari Berita**
   - Gunakan search bar di header
   - Masukkan kata kunci yang dicari
   - Gunakan filter untuk hasil yang lebih spesifik

3. **Menggunakan Chatbot**
   - Klik icon chatbot di pojok kanan bawah
   - Ketik pertanyaan seputar berita
   - Dapatkan jawaban yang relevan dari AI

4. **Manajemen Akun**
   - Register/login untuk fitur personal
   - Lihat riwayat bacaan

#### Untuk Admin

1. **Dashboard Admin**
   - Kelola artikel dan berita
   - Monitor statistik website
   - Manage user accounts

2. **Content Management**
   - Create, edit, delete articles
   - Manage categories
   - Upload media files

3. **Chatbot Management**
   - Monitor chatbot conversations di Flowise dashboard
   - Update chatbot responses dan prompts
   - Analyze user interactions

### 📁 Struktur Proyek

```
Prime-News/
├── app/
│   ├── Http/Controllers/
│   │   ├── NewsController.php      # News management
│   │   └── UserController.php      # User management
│   ├── Models/
│   │   ├── News.php                # News model
│   │   ├── User.php                # User model
├── database/
│   ├── migrations/
│   │   ├── create_users.php
│   │   ├── create_news_table.php
│   │   └── create_sessions_table.php
│   └── seeders/
│       ├── NewsSeeder.php
│       └── CategorySeeder.php
├── flowise/
│   ├── chat from db sql Chatflow (1).json               # Flowise workflow export
├── public/
│   ├── css/
│   │   ├── dashboard.css           # Admin dashboard styles
│   │   ├── footer.css              # Footer styles
│   │   ├── layoutMaster.css        # Master layout styles
│   │   ├── login.css               # Login page styles
│   │   ├── search.css              # Search functionality styles
│   │   ├── upNews.css              # Upload news styles
│   │   └── view.css                # Article view styles
│   ├── js/
│   │   ├── category.js             # Category management
│   │   └── login.js                # Login functionality
│   └── images/                     # Static images
├── resources/
│   └── views/
│       ├── layout/
│       │   ├── master.blade.php    # Master layout with chatbot
│       ├── backup.blade.php    # Backup layout
│       ├── category.blade.php  # Category layout
│       ├── dashboard.blade.php # Admin dashboard layout
│       ├── edit.blade.php      # Edit layout
│       ├── home.blade.php      # Home layout
│       ├── search.blade.php    # Search layout
│       ├── upNews.blade.php    # Upload news layout
│       └── viewNews.blade.php  # View news layout
└── routes/
    ├── web.php                     # Web routes
    └── api.php                     # API routes
```

## 📞 Kontak

Untuk pertanyaan, saran, atau kolaborasi:

- **Email**: egawijaya355@gmail.com
- **GitHub**: [@megaz61](https://github.com/megaz61)
- **LinkedIn**: [Mikel Ega Wijaya](https://www.linkedin.com/in/mikel-ega-wijaya/)

