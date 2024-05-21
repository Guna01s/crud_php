<?php

    $connection = mysqli_connect("localhost", "root", "");
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }

    $db = mysqli_select_db($connection, "cruddata");
        if (!$db) {
            die("Database selection failed: " . mysqli_error($connection));
        }

    if (isset($_GET['del'])) {
        $del = $_GET['del'];
        
        $sql = "DELETE FROM booking WHERE id = '$del'";
        $run = mysqli_query($connection, $sql);
        
        if ($run) {
            echo '<script> location.replace("index.php") </script>';
            exit; 
        } else {
            echo "Delete Query failed: " . mysqli_error($connection);
        }
    } else {
        echo "No Deleting ID provided in the URL.";
    }
?>
