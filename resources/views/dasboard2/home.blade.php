@extends('partial2.teamplate')
@section('content')

<main class="main users chart-page" id="skip-target">
  <div class="container">
    <h2 class="main-title">Selamat Datang {{ auth()->user()->name }} di Beranda Karyawan</h2>
    <div class="row stat-cards">
      
      <!-- Card Barang Perbaikan -->
      <div class="col-md-6 col-xl-3">
        <a href="{{ route('perbaikan.indexx') }}" class="text-decoration-none">
          <article class="stat-cards-item">
            <div class="stat-cards-icon primary">
              <i data-feather="tool" aria-hidden="true"></i> <!-- Ikon untuk Barang Perbaikan -->
            </div>
            <div class="stat-cards-info">
              <p class="text-sm mb-0 text-uppercase font-weight-bold">Barang Perbaikan</p>
              <h5 class="font-weight-bolder">{{ \App\Perbaikan::count() }}</h5>
            </div>
          </article>
        </a>    
      </div>

      <!-- Kartu Jam Digital, Tanggal, dan Cuaca -->
      <div class="col-sm-6 col-md-3">
      <article class="stat-cards-item">
          <div class="card-body text-center">
            <div class="numbers">
              <p class="text-sm mb-0 text-uppercase font-weight-bold text-primary">Waktu Indonesia Barat</p>
              <h4 id="time" class="font-weight-bolder my-2" style="font-size: 24px; color: #343a40;"></h4>
              <p id="date" class="font-weight-light mb-1" style="font-size: 14px; color: #6c757d;"></p>
              <p id="weather" class="font-weight-light mb-0" style="font-size: 14px; color: #6c757d;"></p>
            </div>
          </div>
          </article>
        </div>
      </div>


            </div>
       

    </div>
  </div>
</main>

<script>
  function updateTime() {
    const now = new Date();
    const time = now.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit', second: '2-digit' });
    const date = now.toLocaleDateString('id-ID', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
    document.getElementById('time').textContent = time;
    document.getElementById('date').textContent = date;
  }

  updateTime();
  setInterval(updateTime, 1000); // Update time every second
  updateWeather(); // Fetch weather once when the page loads
</script>

@endsection
