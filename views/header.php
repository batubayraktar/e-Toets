<?php

  if(isset($_SESSION['toets_id_maak']) && isset($_SESSION['toets_maken_wachtwoord'])){
    header("Location: toetsMaken.php");
  }

  //uitloggen
  if(isset($_POST['loguit'])){
    session_start();
    session_destroy();
    header("Location: index.php?message=U bent succesvol uitgelogd.");
  }

  error_reporting(E_ALL);
  ini_set("display_errors", 1);
?>

<nav class="navbar bg-dark" style="marging-bottom: 10px;">
  <div class="container-fluid">
    <a href="home.php" class="navbar-brand text-white">Welkom</a>
    <?php if(isset($_SESSION['username']))
      {
        ?>
        <form method="post" class="form-inline inline-end">
          <button class="mr-sm-2 btn btn-danger" type="submit" name="loguit">Afmelden</button>
        <?php
      }else{
        ?>
          <div class="d-flex flex gap-2">
            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#logInModal">Login</button>
            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#logInModal_reg">Registreren</button>            
          </div>

        <?php
      }
      ?></form><?php
    ?>
  </div>

  <div class="modal fade" id="logInModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark text-white">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Inlog formulier</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="navbarAlert"></div>
          <form action="javascript:void(0);" id="log_in_form">
            <span id="message" style="color: red;"></span>
            <div class="mb-3">
              <label for="username" class="col-form-label">Inlognaam:</label>
              <input minlength="5" maxlength="255" required type="text" name="username" class="form-control bg-dark text-white" id="username">
            </div>

            <div class="mb-3">
              <label for="password" class="col-form-label">Wachtwoord:</label>
              <input minlength="5" maxlength="255" required type="password" name="password" class="form-control bg-dark text-white" id="password">
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sluiten</button>
              <button type="submit" class="btn btn-light">Inloggen</button>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>





  <div class="modal fade" id="logInModal_reg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark text-white">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Registratie formulier</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <div class="navbarAlertReg"></div>
          <form action="javascript:void(0);" id="reg_form">
            <span id="message" style="color: red;"></span>

            <div class="mb-3">
              <label for="fullname" class="col-form-label">Voledige naam:</label>
              <input minlength="5" maxlength="255" required type="text" name="fullname" class="form-control bg-dark text-white" id="fullname">
            </div>

            <div class="mb-3">
              <label for="username" class="col-form-label">Inlognaam:</label>
              <input minlength="5" maxlength="255" required type="text" name="username" class="form-control bg-dark text-white" minlen id="username">
            </div>

            <div class="mb-3">
              <label for="password" class="col-form-label">Wachtwoord:</label>
              <input minlength="5" maxlength="255" required type="password" name="password" class="form-control bg-dark text-white" id="password">
            </div>
            
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Sluiten</button>
              <button type="submit" class="btn btn-light">Registreren</button>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
  
</nav>
