<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    body {
      background-color: #f5f5f5;
    }
    .card {
      margin-bottom: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .card:hover {
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
    }
    .footer {
      background-color: #333;
      color: #fff;
      padding: 10px;
      text-align: center;
      position: fixed;
      bottom: 0;
      left: 0;
      width: 100%;
      z-index: 1000;
    }
    .logo-bulat {
      position: fixed;
      top: 20px;
      right: 20px;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: #333;
      color: #fff;
      text-align: center;
      line-height: 40px;
      cursor: pointer;
      z-index: 1000;
    }
    .logo-bulat:hover {
      background-color: #555;
    }
    .logout-menu {
      position: fixed;
      top: 60px;
      right: 20px;
      background-color: #333;
      color: #fff;
      padding: 10px;
      border-radius: 10px;
      display: none;
      z-index: 1000;
    }
    .logout-menu.show {
      display: block;
    }
    .header {
      background-color: #007bff;
      color: #fff;
      padding: 20px;
      text-align: center;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      z-index: 900;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .header h1 {
      font-size: 24px;
      font-weight: bold;
    }
    .header .logo {
      margin-right: 20px;
      flex-basis: 60px; /* kurangi ukuran logo menjadi 60px */
      background-color: #fff; /* tambahkan properti ini untuk membuat logo memiliki latar belakang yang kontras */
      padding: 10px; /* tambahkan properti ini untuk membuat logo memiliki padding */
      border-radius: 10px; /* tambahkan properti ini untuk membuat logo lebih bulat */
      overflow: hidden; /* tambahkan properti ini untuk membuat gambar logo terlihat jelas full */
    }

    .header .logo .logo-image {
      width: 100%; /* membuat gambar logo terlihat jelas full */
      height: 100%; /* membuat gambar logo terlihat jelas full */
      object-fit: cover; /* membuat gambar logo terlihat jelas full */
    }
    .welcome {
      flex: 1;
      text-align: center;
    }
    .card-container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
      margin-top: 60px;
      padding-bottom: 50px;
    }
    .card {
      width: 60%;
      height: 200px;
      padding: 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .card h5 {
      font-size: 18px;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .card p {
      font-size: 14px;
    }
    .status-menu {
    position: fixed;
    top: 60px;
    right: 20px;
    background-color: #333;
    color: #fff;
    padding: 10px;
    border-radius: 10px;
    display: none;
    z-index: 1000;
}

.status-menu.show {
  display: block;
}
  </style>
</head>
<body>
 <!-- Logo Bulat -->
<div class="logo-bulat" id="logo-bulat">
  <i class="fas fa-user"></i>
</div>

<!-- Status Menu -->
<div class=" status-menu" id="status-menu">
  <p>Status Anda: <span id="status">Aktif</span></p>
  <button class="btn btn-primary" id="logout">Logout</button>
</div>

<!-- Logout Menu -->
<div class="logout-menu" id="logout-menu">
  <p>Anda yakin ingin logout?</p>
  <button class="btn btn-primary">Logout</button>
  <button class="btn btn-secondary" id="cancel-logout">Cancel</button>
</div>
<!-- Header -->
<div class="header">
  <div class="logo">
    <img src="logo.png" alt="Logo" class="logo-image">
  </div>
  <h1 class="welcome">Welcome</h1>
</div>
  <!-- Main Content -->
  <div class="card-container">
    <div class="card">
      <h5>Card 1</h5>
      <p>Some information about Card 1.</p>
      <button class="btn btn-primary" id="view-more-button">View More</button>
    </div>
    <div class="card">
      <h5>Card 2</h5>
      <p>Some information about Card 2.</p>
      <button class="btn btn-primary">View More</button>
    </div>
  </div>

  <!-- Footer -->
  <footer class="footer">
    <p>&copy; 2023 Dashboard</p>
  </footer>

  <script>
 const logoBulat = document.getElementById('logo-bulat');
const statusMenu = document.getElementById('status-menu');
const logoutMenu = document.getElementById('logout-menu');
const cancelLogout = document.getElementById('cancel-logout');
const logoutButton = document.getElementById('logout');

logoBulat.addEventListener('click', () => {
  statusMenu.classList.toggle('show');
});

logoutButton.addEventListener('click', () => {
    if (confirm("Apakah Anda yakin ingin logout?")) {
    statusMenu.classList.remove('show');
    logoutMenu.classList.add('show');
    setTimeout(function() {
      window.location.href = 'tes.php';
    }, 1000);
  }
  statusMenu.classList.remove('show');
  logoutMenu.classList.add('show');
  window.location.href = 'tes.php';
});

cancelLogout.addEventListener('click', () => {
  logoutMenu.classList.remove('show');
});

const viewMoreButton = document.getElementById('view-more-button');
viewMoreButton.addEventListener('click', () => {
  window.location.href = '/monitoring/proyek.php';
});

  </script>
</body>
</html>