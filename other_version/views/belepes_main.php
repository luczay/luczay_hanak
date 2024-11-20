
<!doctype html>
<html lang="en">
  <head>
    <title>Belépés</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo SITE_ROOT?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo SITE_ROOT?>css/signin.css" rel="stylesheet">
  </head>

    <h2><br><?= (isset($viewData['uzenet']) ? $viewData['uzenet'] : "") ?><br></h2>
    <form class="form-signin"  action="<?= SITE_ROOT ?>beleptet" method="post">
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>

      <label for="login">Felhasználó:</label><input type="text" class="form-control" name="login" id="login" required pattern="[a-zA-Z][\-\.a-zA-Z0-9_]{3}[\-\.a-zA-Z0-9_]+"><br>
      <label for="password">Jelszó:</label><input type="password" class="form-control" name="password" id="password" required pattern="[\-\.a-zA-Z0-9_]{4}[\-\.a-zA-Z0-9_]+"><br>
      <input type="submit" value="Küldés">
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
</html>
