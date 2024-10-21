<aside class="sidebar">
    <style>
        /* Atur ukuran favicon agar sesuai */
        .navbar-brand-img {
            max-width: 40px; /* Ukuran maksimal favicon */
            height: auto; /* Menjaga proporsi gambar */
            object-fit: contain; /* Menyesuaikan gambar dengan ruang yang tersedia */
        }

        /* Styling untuk logo-wrapper */
        .logo-wrapper {
            display: flex;
            align-items: center; /* Menyelaraskan gambar dan teks di tengah */
        }

        /* Styling untuk teks logo */
        .logo-text {
            margin-left: 10px; /* Jarak antara gambar dan teks */
        }
    </style>
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="/" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <img src="{{ asset('favicon.ico') }}" alt="logo" class="navbar-brand-img">
                <div class="logo-text">
                    <span class="logo-subtitle">Balitbang</span>
                    <span class="logo-title">Kemhan</span>
                </div>
            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <li>
                    <a class="active" href="/beranda">
                        <span class="icon home" aria-hidden="true"></span>Beranda
                    </a>
                </li>
                <!-- Tambahkan item menu lainnya di sini -->
            </ul>
            <span class="system-menu__title">Melaporkan kerusakan</span>
            <ul class="sidebar-body-menu">
                <li>
                    <a href="/barang">
                        <span class="fas fa-box" aria-hidden="true"></span> Barang
                    </a>
                </li>
                <!-- Tambahkan item menu lainnya di sini -->
            </ul>
        </div>
    </div>
    <div class="sidebar-footer">
        <!-- Uncomment dan sesuaikan jika diperlukan
        <a href="##" class="sidebar-user">
            <span class="sidebar-user-img">
                <picture>
                    <source srcset="./img/avatar/avatar-illustrated-01.webp" type="image/webp">
                    <img src="./img/avatar/avatar-illustrated-01.png" alt="User name">
                </picture>
            </span>
            <div class="sidebar-user-info">
                <span class="sidebar-user__title">Nafisa Sh.</span>
                <span class="sidebar-user__subtitle">Support manager</span>
            </div>
        </a>
        -->
    </div>
</aside>
        