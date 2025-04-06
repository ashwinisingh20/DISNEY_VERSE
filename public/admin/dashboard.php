<?php
// Define the map between ?page=... and folder/file
$pages = [
  'dashboard' => 'admin.php',
  'quizzes' => 'pages/quizzes/index.php',
  'fun_facts' => 'poll/add_fun_fact.php',
  'polls' => 'pages/polls/index.php',
  'novels' => 'pages/novels/index.php',
  'settings' => 'pages/settings/index.php',
  'news' => 'news/news.php'
];

$page = $_GET['page'] ?? 'dashboard';
$file = $pages[$page] ?? null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
     body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(to right, #ece9e6, #ffffff);
    padding: 0px 0px 0px 0px !important;
  }
  </style>
</head>
<body>

  <!-- Top Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">

    <div class="container-fluid">
      <a class="navbar-brand" href="?page=dashboard">Admin Panel</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link <?= $page === 'dashboard' ? 'active' : '' ?>" href="?page=dashboard">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link <?= $page === 'quizzes' ? 'active' : '' ?>" href="?page=quizzes">Quizzes</a></li>
          <li class="nav-item"><a class="nav-link <?= $page === 'fun_facts' ? 'active' : '' ?>" href="?page=fun_facts">Fun Facts</a></li>
          <li class="nav-item"><a class="nav-link <?= $page === 'polls' ? 'active' : '' ?>" href="?page=polls">Polls</a></li>
          <li class="nav-item"><a class="nav-link <?= $page === 'novels' ? 'active' : '' ?>" href="?page=novels">Novels</a></li>
          <li class="nav-item"><a class="nav-link <?= $page === 'news' ? 'active' : '' ?>" href="?page=news">News</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container mt-4" style="padding-top: 70px;">

    <?php
      if ($file && file_exists($file)) {
        include $file;
      } else {
        echo "<div class='alert alert-danger'>Page not found!</div>";
      }
    ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
