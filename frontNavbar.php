<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="nav_style.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar navbar-dark bg-black">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="resources/images/Aura.png" alt="" class="logo" style="height: 70px;">
      </a>

      <!-- Toggle button -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index.php" class="nav-link">HOME</a>
          </li>
          <li class="nav-item">
            <a href="allMovies.php" class="nav-link">MOVIES</a>
          </li>
        </ul>
        <div class="btn ms-auto">
          <a href="login.php">
            <button class="button button1 text-black">LOGIN</button>
          </a>
        </div>

      </div>
    </div>
  </nav>


</body>

</html>