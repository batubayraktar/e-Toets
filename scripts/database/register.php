<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['fullname'])) {
        $fullname = htmlentities($_POST['fullname']);
        $username = htmlentities($_POST['username']);
        $password = sha1(htmlentities($_POST['password']));

        require "inc/config.inc.php";
        $queryName = "SELECT `username` FROM `Users` WHERE `username` = '$username'";
        $result2 = mysqli_query($mysqli, $queryName);

        if($result2){
            if(mysqli_num_rows($result2) == 0){ // Check if username already exists
                $query = "INSERT INTO `Users`(`id`, `naam`, `username`, `wachtwoord`) VALUES (null, '$fullname', '$username', '$password')";
                $result = mysqli_query($mysqli, $query);

                if ($result) {
                    echo "true";
                    mysqli_close($mysqli);
                } else {
                    mysqli_close($mysqli);
                    echo "false";
                }
            }else{
                echo "false";
            }
        }else{
            echo "false";
        }
    } else {
        echo "false";
    }
?>
