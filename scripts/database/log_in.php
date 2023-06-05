<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);

        require "inc/config.inc.php";

        $query = "SELECT `id`, `naam`, `username` FROM `Users` WHERE `username` = '$username' AND `wachtwoord` = '$password';";
        $result = mysqli_query($mysqli, $query);

        if ($result !== false && mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);

            session_start();
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['naam'];

            mysqli_close($mysqli);
            
            echo "true";

        } else {
            // Handle query execution error or no rows returned
            if ($result === false) {
                echo "Error executing query: " . mysqli_error($mysqli);
            } else {
                echo $query;
                echo "false1";
            }

            mysqli_close($mysqli);
        }

    } else {
        echo "false2";
    }
?>
