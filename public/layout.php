<!DOCTYPE HTML>
<html>
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    </head>
    <body>

    <div class="container">
  <header class="blog-header lh-1 py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <a class="link-secondary" href="#"><img src=""/></a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <?php if(isset($_SESSION["user"])): ?>
            <a class="btn btn-sm btn-outline-secondary" href="index.php?page=logout">Logout</a>
        <?php else: ?>
            <a class="btn btn-sm btn-outline-secondary" href="index.php?page=login">Login</a>
        <?php endif; ?>
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      <a class="p-2 link-secondary" href="index.php">Ubersicht</a>
      <?php if(isset($_SESSION["user"])): ?>
        <a class="p-2 link-secondary" href="index.php?page=createArticle">Neuer Eintrag</a>
      <?php endif; ?>
      <a class="p-2 link-secondary" href="#">Impressum</a>
    </nav>
  </div>
</div>

<main class="container">
    <?php include("views/".$view);?>  
</main>

       
    </body>
</html>