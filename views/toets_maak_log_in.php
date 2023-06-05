<div class="navbarAlert"></div>  

<div class="container-fluid d-flex justify-content-center align-items-center w-50" style="height:100vh; overflow:hidden;">

  <form action="javascript:void(0);" id="toets_login_check">

    <div class="mb-3">
    <input type="hidden" name="toets_id" class="form-control bg-dark text-white" value="<?php echo $_SESSION['toets_id_maken'];?>">
      <input type="password" name="password_toets" class="form-control bg-dark text-white" placeholder="Toets wachtwoord">
    </div>
            
    <div class="modal-footer">
      <button type="submit" class="btn btn-light">Maken</button>
    </div>
            
  </form>

</div>