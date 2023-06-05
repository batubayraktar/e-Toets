<button type="button" style="margin: 10px;" class="btn btn-success pull-right" data-bs-toggle="modal" data-bs-target="#nieuweToetsModal">Nieuwe toets</button>

<div class="modal fade" id="nieuweToetsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark text-white">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nieuwe toets aanmaakformulier</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0);" id="nieuwe_toets_form">
        <input type="hidden" value="<?php echo $_SESSION['id']; ?>" name="user_id"/>

          <div class="mb-3">
            <label for="titel" class="col-form-label">Titel:</label>
            <input required type="text" class="form-control bg-dark text-white" id="newTitel" name="titel">
          </div>

          <div class="mb-3">
            <label for="beschrijving" class="col-form-label">Beschrijving:</label>
            <textarea required class="form-control bg-dark text-white" maxlength="255" id="newBesch" name="beschrijving"></textarea>
          </div>

          <div class="mb-3">
            <label for="wachtwoord_toets" class="col-form-label">Wachtwoord:</label>
            <input type="password" required class="form-control bg-dark text-white" id="newPass" name="wachtwoord_toets">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Annuleren</button>
            <button type="submit" name="nieuweToets" class="btn btn-success" data-bs-dismiss="modal">Toevoegen</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>