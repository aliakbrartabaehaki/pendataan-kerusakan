<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Masuk - Badan Penelitian dan Pengembangan Kementerian Pertahanan RI</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHq6EO+2iVZ4zz+B9BlYYuXry/gzLCJ1x4HF2ReRUn5kqoxOBWbrYfWToM8o/lPSX/zh0x0Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <!-- Custom CSS -->
  <style>
    body {
      font-family: 'Open Sans', sans-serif;
      background-color: #1034a6;
      color: #000000;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .login-card {
      max-width: 400px;
      width: 100%;
      padding: 30px;
      border-radius: 15px;
      background-color: #ffffff;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .card-header {
      text-align: center;
      margin-bottom: 15px; /* Reduced margin */
    }

    .card-header h3 {
      color: #000000;
      font-weight: 700;
      margin-bottom: 10px;
    }

    .card-header img {
      width: 90%; /* Increased size */
      max-width: 120px; /* Set a maximum width */
      height: auto; /* Maintain aspect ratio */
      margin-bottom: 5px; /* Reduced space below the image */
      margin-top: -20px; /* Move image up */
    }

    .card-header p {
      color: #6c757d;
      font-size: 14px;
      margin: 0;
    }

    .form-control {
      margin-bottom: 15px;
      background-color: #ffffff;
      color: #000000;
      border-color: #007bff;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #0056b3;
    }

    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
      border-radius: 8px;
      height: 45px;
      font-size: 16px;
      transition: background-color 0.3s ease;
      margin-top: 10px;
    }

    .btn-primary:hover {
      background-color: #0056b3;
    }

    .back-icon {
      display: inline-block;
      margin-bottom: 20px;
    }

    .back-icon i {
      font-size: 1.5rem;
      color: #007bff;
    }
  </style>
</head>

<body>

  <!-- Bagian Form Login -->
  <div class="login-card">
    <!-- Ikon Back -->
    <!-- <a href="{{ url('/') }}" class="back-icon">
      <i class="bi bi-arrow-left"></i>
    </a> -->
    <!-- Header -->
    <div class="card-header">
      <img src="{{ asset('favicon.ico') }}" alt="logo" class="navbar-brand-img">
      <h3>Balitbang Kemhan RI</h3>
    </div>
    <!-- Form Login -->
    <div class="card-body">
      <form action="{{ url('/login') }}" method="POST">
        @csrf
        <div class="mb-3">
          <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" required>
        </div>
        <div class="mb-3">
          <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" required>
        </div>

        <div class="text-center">
          <button type="submit" class="btn btn-primary w-100">Masuk</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <link rel="icon" type="image/png" href="{{ asset('favicon.ico') }}">

</body>

</html>
