<form action="home.php" method="post">
	<button type="submit" class="btn btn-danger mt-3" name="toets_stoppen" type="button">Toets annuleren</button>
</form>
<main class="text-dark">
    <div class="container">
        <div class="main-body">
            <div class="row">

				<div class="col-lg-12 mt-3">
					<div class="card">
						<div class="card-body z-n1">
							<!-- <h2>Toets bewerk pagina</h2> -->
							<h2><?php echo $toets_data[0]->naam;?></h2>
							<p><?php echo $toets_data[0]->beschrijving;?></p>
							<?php 
							if($toets_vragen == null){
								?>
									<p>Deze toets heeft geen vragen!</p>
								<?php
							}?>
						</div>
					</div>
				</div>

				<form action="javascript:void(0);" id="inlever_toets">

					<input type="hidden" name="toets_id_maken" value="<?php echo $_SESSION['toets_id_maken'];?>">
					<input type="hidden" name="inlever_toets_user_id" value="<?php echo $_SESSION['id'];?>">

					<input type="hidden" name="inlever_toets_aantal_vragen" value="<?php echo count($toets_vragen);?>">

					<?php
					
						if(count($toets_vragen) > 0){
							foreach ($toets_vragen as $key => $value) {
								if ($value['vraag'] != "" || $value['antwoord'] != "") {
									$varianten = json_decode($value['varianten'], true);
									shuffle($varianten); // Shuffle the array

									?>
										<div class="col-lg-12 mt-3">
											<div class="card">
												<div class="card-body">
													<h4>Vraag <?php echo $key + 1 . ": " . $value['vraag']; ?></h4>
													<?php
													for ($i = 0; $i <= 3; $i++) {
														$send_data = array($value['toetsvraag_id'], $varianten[$i]);
														$send_data = implode(",", $send_data);
														?>
															<p>
																<input type="radio" id="<?php echo $value['toetsvraag_id'] . "_id_" . $i; ?>" value="<?php echo $send_data;?>" name="<?php echo "vraag_" . $key + 1;?>" required>
																<label for="<?php echo $value['toetsvraag_id'] . "_id_" . $i; ?>"><?php echo $varianten[$i]; ?></label>
															</p>
														<?php
													}
													?>
												</div>
											</div>
										</div>
									<?php
								}
							}
							
							?>
								<div class="d-grid gap-2 d-md-flex justify-content-end" style="margin: 10px 0px;" >
									<button type="submit" class="btn btn-success" name="toets_inlever_btn" type="button">Inleveren</button>
								</div>
							<?php
						}else{
							?>
								<div class="col-lg-12 mt-3">
									<div class="card">
										<div class="card-body z-n1">
											<h2>Deze toets heeft geen vragen</h2>
										</div>
									</div>
								</div>
							<?php
						}

					?>
				</form>

			</div>
		</div>
    </div>  
</main