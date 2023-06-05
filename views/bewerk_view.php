<main class="text-dark">
    <div class="container">
        <div class="main-body">
            <div class="row">
				<div class="col-lg-12 mt-3">
					<div class="card">
						<div class="card-body z-n1">
							<!-- <h2>Toets bewerk pagina</h2> -->
							<h2>Toets gegevens</h2>
							
							<div class="d-md-flex justify-content-md-end">
								<form action="javascript:void(0);" id="delete_toets_form">
									<input type="hidden" name="toets_hidden_id" value="<?php echo $toets_data[0]->toets_id?>">
									<button type="submit" class="btn btn-danger" name="toets_btn_verwijder" type="button">Toets verwijderen</button>
								</form>
							</div>

							<div>
								<p>Toets is aangemaakt op: <?php echo $toets_data[0]->aanmaakTijd;?></p>
							</div>

							<div class="d-flex flex-column flex-xl-row justify-content-around">
								<form action="javascript:void(0);" class="update_toets_form">
									<p>Toets titel:</p>

									<div class="input-group" style="width: 300px;">
										<input type="hidden" name="update_toets_id" value="<?php echo $toets_data[0]->toets_id;?>">
										<input type="text" class="form-control" name="update_naam" value="<?php echo $toets_data[0]->naam;?>">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-primary " type="button">Update</button>
										</span>
									</div>
								</form><br>

								<form action="javascript:void(0);" class="update_toets_form">
									<p>Toets beschrijving:</p>

									<div class="input-group" style="width: 300px;">
										<input type="hidden" name="update_toets_id" value="<?php echo $toets_data[0]->toets_id;?>">
										<input type="text" class="form-control" name="update_beschrijving" value="<?php echo $toets_data[0]->beschrijving;?>">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-primary" type="button">Update</button>
										</span>
									</div>
								</form><br>

								<form action="javascript:void(0);" class="update_toets_form">
									<p>Toets wachtwoord:</p>

									<div class="input-group" style="width: 300px;">
										<input type="hidden" name="update_toets_id" value="<?php echo $toets_data[0]->toets_id;?>">
										<input type="password" class="form-control" name="update_wachtoord">
										<span class="input-group-btn">
											<button type="submit" class="btn btn-primary " type="button">Reset</button>
										</span>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-12 mt-3">
					<div class="card">
						<div class="card-body z-n1">
							<form action="javascript:void(0);" id="add_question_toets_form">
								<h3>Toets vraag toevoegen</h3>
								
								<!-- toets_id -->
								<input type="hidden" name="add_vraag_toets_id" value="<?php echo $toets_data[0]->toets_id;?>">

								<!-- vraag -->
								<div>
									<p>Toets vraag:</p>
									<input type="text" required class="form-control" name="new_vraag" placeholder="Wat is 1 + 1?">
								</div><br>
								

								<!-- antwoord -->
								<div>
									<p>Juiste antwoord:</p>
									<input type="text" required class="form-control" name="new_antwoord" placeholder="2">
								</div><br>

								<!-- varianten -->
								<p>Verkeerde varianten:</p>
								<div class="d-flex flex-column flex-xl-row justify-content-around">
									
									<input type="text" required class="form-control" name="new_vraag_var1" placeholder="4">
									<input type="text" required class="form-control" name="new_vraag_var2" placeholder="6">
									<input type="text" required class="form-control" name="new_vraag_var3" placeholder="1">
								</div>

								<!-- submit -->
								<div class="d-md-flex justify-content-md-end">
									<button type="submit" style="margin: 10px;" class="btn btn-success " >Nieuwe vraag toevoegen</button>
								</div>
								
							</form>

							<hr>
						</div>

					</div>
				</div>

				<div class="col-lg-12 mt-3">
					<div class="card">
						<!-- Alle vragen -->
						<div class="card-body z-n1">
							<h3>Alle toets vragen</h3>
							<?php
							if (!is_null($toets_vragen)) {
                            if(count($toets_vragen) > 0){
								foreach($toets_vragen as $key => $value){
									// var_dump($eenVraag);
									// echo "<br/>";echo "<br/>";
									$varianten = isset($value['varianten']) ? json_decode($value['varianten']) : array();
									?>
										<h3><b>Vraag <?php echo $key+1 ?></b></h3>

										<form action="javascript:void(0);" class="delete_question_form d-grid gap-2 d-md-flex justify-content-end">
											<input type="hidden" name="verwijder_vraag_id" value="<?php echo $value['toetsvraag_id'] ?>">
											<button type="submit" class="btn btn-danger" name="toets_vraag_verwijder_btn" type="button">Vraag <?php echo $key+1 ?> verwijderen</button>
										</form>

										<form action="javascript:void(0);" class="update_question_toets_form">
								
											<!-- toets_id -->
											<input type="hidden" name="update_vraag_id" value="<?php echo $value['toetsvraag_id']?>">

											<!-- vraag -->
											<div>
												<p>Toets vraag:</p>
												<input type="text" required class="form-control" value="<?php echo $value['vraag']?>" name="update_vraag">
											</div><br>

											<!-- antwoord -->
											<div>
												<p>Juiste antwoord:</p>
												<input type="text" required class="form-control" name="update_antwoord" value="<?php echo $value['antwoord']?>">
											</div><br>

											<!-- varianten -->
											<p>Verkeerde varianten:</p>
											<div class="d-flex flex-column flex-xl-row justify-content-around">
												<input type="text" required class="form-control" name="update_vraag_var1" value="<?php echo $varianten[0]?>">
												<input type="text" required class="form-control" name="update_vraag_var2" value="<?php echo $varianten[1]?>">
												<input type="text" required class="form-control" name="update_vraag_var3" value="<?php echo $varianten[2]?>">
											</div>

											<!-- submit -->
											<div class="d-grid gap-2 d-md-flex justify-content-end" style="margin: 10px 0px;" >

												<button type="submit" class="btn btn-success" name="toets_vraag_update_bnt" type="button">Vraag <?php echo $key+1 ?> updaten</button>

											</div>

										</form><br>
										<hr>
									<?php
								}
                            }
						}else{
								?>
									<div>Er zijn geen vragen toegevoegd.</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>

			</div>
		</div>
    </div>  
</main
