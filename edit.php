<?php

    $connection = mysqli_connect("localhost", "root", "");
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $db = mysqli_select_db($connection, "cruddata");
    if (!$db) {
        die("Database selection failed: " . mysqli_error($connection));
    }

    if (isset($_GET['edit'])) {
        $edit = $_GET['edit'];
        
        $sql = "SELECT * FROM booking WHERE id = '$edit'";
        $run = mysqli_query($connection, $sql);
        
        if ($run) {
            $row = mysqli_fetch_array($run);
            $uid = $row['id'];
            $uname = $row['name'];
            $uage = $row['age'];
            $uemail = $row['email'];
            $uphone = $row['phone'];
            $uaddress = $row['address'];
            $udate_from = $row['date_from'];
            $udate_to = $row['date_to'];
            $ureason = $row['reason'];
        } else {
            echo "Query failed: " . mysqli_error($connection);
        }
    } else {
        echo "No booking ID provided in the URL.";
    }
?>

<?php

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $age = $_POST['age'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $reason = $_POST['reason'];
        $from = $_POST['from'];
        $to = $_POST['to'];

        $updateSql = "UPDATE booking SET
            name = '$name',
            age = '$age',
            email = '$email',
            phone = '$phone',
            address = '$address',
            date_from = '$from',
            date_to = '$to',
            reason = '$reason'
            WHERE id = '$edit'";

        if (mysqli_query($connection, $updateSql)) {
            echo '<script> location.replace("index.php") </script>';
        } else {
            echo "Connection error in database for post method: " . $connection->error;
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid bg-primary d-flex justify-content-center align-items-center vh-100">
        <div class="row">
            <div class="card">
                <div class="card-header text-center d-flex justify-content-center">
                    <h4>Update client booking details</h4>
                </div>
                <div class="card-body">
                    <form action="edit.php?edit=<?php echo $edit; ?>" method="post">
                        <div class="d-flex flex-row gap-3 mb-2">
                            <div class="form-group">
                                <label for="name" class="h2 small">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name" value="<?php echo isset($uname) ? $uname : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="age" class="h2 small">Age</label>
                                <input type="number" class="form-control" name="age" placeholder="Enter age" value="<?php echo isset($uage) ? $uage : ''; ?>">
                            </div>
                        </div>
                        <div class="d-flex flex-row gap-3 mb-2">
                            <div class="form-group">
                                <label for="email" class="h2 small">Email</label>
                                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo isset($uemail) ? $uemail : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="h2 small">Phone</label>
                                <input type="number" class="form-control" name="phone" placeholder="Enter Phone" value="<?php echo isset($uphone) ? $uphone : ''; ?>">
                            </div>
                        </div>
                        <div class="d-flex flex-row gap-3 mb-2">
                            <div class="form-group">
                                <label for="address" class="h2 small">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Enter address" value="<?php echo isset($uaddress) ? $uaddress : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="reason" class="h2 small">Reason</label>
                                <input type="text" class="form-control" name="reason" placeholder="Enter Reason" value="<?php echo isset($ureason) ? $ureason : ''; ?>">
                            </div>
                        </div>
                        <div class="d-flex flex-row gap-5 mb-3">
                            <div class="form-group me-3">
                                <label for="from" class="h2 small">From</label>
                                <input type="date" name="from" class="form-control" value="<?php echo isset($udate_from) ? $udate_from : ''; ?>">
                            </div>
                            <div class="form-group">
                                <label for="to" class="h2 small">To</label>
                                <input type="date" name="to" class="form-control" value="<?php echo isset($udate_to) ? $udate_to : ''; ?>">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Update" />
                         <button type="button" class="btn btn-primary" id="backButton">Back</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
     <script>
        document.getElementById('backButton').addEventListener('click', function() {
            location.replace("index.php");
        });
    </script>
</body>
</html>
