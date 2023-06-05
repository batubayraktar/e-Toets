<main class="text-dark">
    <div class="container">
        <div class="main-body">
            <div class="row">

				<div class="col-lg-12 mt-3">
					<div class="card">
						<div class="card-body z-n1">
							<h2>Uw resultaat is: <?php echo $resultaat["aantal_goed"] . " van " . $resultaat["aantal_goed"] + $resultaat["aantal_slecht"] . " vragen goed.";?></h2>
						</div>
					</div>
				</div>

				<form action="home.php" method="post">
					<button type="submit" class="btn btn-danger mt-3" name="toets_stoppen" type="button">Naar home</button>
				</form>
				
			</div>
		</div>
    </div>  
</main

