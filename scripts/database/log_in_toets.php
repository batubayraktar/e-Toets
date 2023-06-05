<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    if (isset($_POST['password_toets']) && !is_null($_POST['password_toets']) && isset($_POST['toets_id']) && !is_null($_POST['toets_id'])) {
        $password_toets = sha1(htmlentities($_POST['password_toets']));
        $uniq_id_timestamp = htmlentities($_POST['toets_id']);

        require "inc/config.inc.php";

        $query = "SELECT `toets_id`, `timestamp` FROM `Toets` WHERE `wachtwoord` = '$password_toets' AND `toets_id` = $uniq_id_timestamp";

        $result = mysqli_query($mysqli, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);

            session_start();
            $_SESSION['toets_password'] = $row['toets_id'];

            mysqli_close($mysqli);
            
            echo "true";

        } else {
            mysqli_close($mysqli);

            echo "false";
        }

    } else {
        echo "false";
    }
?>
