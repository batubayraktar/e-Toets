<?php include "modal_toets_delen.php"; ?>
<main class="text-dark">
    <div class="container">
        <div class="main-body">
            <div class="row">

                <div class="col-lg-4 mt-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <?php if (isset($_SESSION['profilePicture'])) : ?>
                                    <img src="media/profile/<?php echo $_SESSION['profilePicture']; ?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="150">
                                <?php else: ?>
                                    <img src="media/profile/profile.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="150">
                                <?php endif; ?>
                                <div class="mt-3">
                                    <h4><?php echo $_SESSION['name']; ?></h4>
                                    <!-- <button class="btn btn-primary">Profiel bewerken</button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 mt-3">
                    <div class="card ">
                        <div class="card-body">
                            <h2>Toetsen overzicht</h2>
                            <?php if (!is_null($toets_data)): ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Titel</th>
                                            <th scope="col">Beschrijving</th>
                                            <th scope="col">Aangemaakt op</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($toets_data as $toets): ?>
                                            <tr>
                                                <td><?php echo $toets->naam; ?></td>
                                                <td><?php echo $toets->beschrijving; ?></td>
                                                <td><?php echo $toets->aanmaakTijd; ?></td>
                                               
                                                <td class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                    <form action="bewerkToets.php" method="post">
                                                        <input type="hidden" name="bewerk_toets_id" value="<?php echo $toets->toets_id;?>">
                                                        <button type="submit" name="btnBewerk" class="toetsBtn btn btn-success">Bewerken</button>
                                                    </form>
                                                            
                                                    <button type="button" name="btnDelen" class="btnDelen toetsBtn btn btn-primary" data-tinyurl="<?php echo $toets->tinyUrl; ?>" data-bs-toggle="modal" data-bs-target="#toetsDelen">Delen</button>
                                                        
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <div>Er zijn geen toetsen gevonden</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    
                </div>

                <div class="col-lg-8 mt-3">
                    <div class="card ">
                        <div class="card-body">
                            <h2>Gemaakte toetsen</h2>
                            <?php if (!is_null($toets_data_gemaakt)): ?>
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Titel</th>
                                            <th scope="col">Beschrijving</th>
                                            <th scope="col">Aangemaakt op</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($toets_data_gemaakt as $toets): ?>
                                            <tr>
                                                <td><?php echo $toets->naam; ?></td>
                                                <td><?php echo $toets->beschrijving; ?></td>
                                                <td><?php echo $toets->aanmaakTijd; ?></td>
                                               
                                                <td class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                    <a href="<?php echo $toets->tinyUrl; ?>" class="btn btn-primary" data-tinyurl="<?php echo $toets->tinyUrl; ?>">Inzien</a>
                                                     
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <div>Er zijn geen gemaakte toetsen gevonden</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

           </div>

        </div>
    </div>  
</main>
<script>
    function makeAlert(){ 
        document.getElementById("msg").innerHTML = "Copy";
    };

    $(".btnDelen").click(function(){
        let url_text = $(this).data('tinyurl');

        $("#text_to_copy").val(url_text);

    })

    $("#msg").click(function(){
        let text = document.getElementById("text_to_copy");
        text.select();
        navigator.clipboard.writeText(text.value);
        setInterval(makeAlert, 3000);

        document.getElementById("msg").innerHTML = "Gekopieerd";
    });
</script>