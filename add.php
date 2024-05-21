
<?php 

    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"cruddata");

    if (isset($_POST['submit']))
    {
         $name = $_POST['name'];
         $age = $_POST['age'];
         $email = $_POST['email'];
         $phone = $_POST['phone'];
         $address = $_POST['address'];
         $reason = $_POST['reason'];
         $from = $_POST['from'];
         $to = $_POST['to'];

         $sql = "insert into booking(name,age,email,phone,address,date_from,date_to,reason)values('$name','$age','$email','$phone','$address','$from','$to','$reason')";

        if (mysqli_query($connection,$sql)) {
            echo '<script> location.replace("index.php") </script>';
        }else{
            echo "connection error in database for post method".$connection->error;
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
        <div class="container-fluid bg-primary d-flex justify-content-center align-items-center vh-100 ">
            <div class = 'row'>
                <div class="card">
                <div class="card-header text-center d-flex justify-content-between">
                    <h4>ITC GRAND CHOLA</h4>
                </div>
                <div class="card-body">
                    <form action="add.php" method="post">
                        <div class="d-flex flex-row gap-3 mb-2">
                            <div class="form-group">
                                <label for="name" class="h2 small">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="age" class="h2 small">Age</label>
                                <input type="number" class="form-control" name="age" placeholder="Enter age">
                            </div>
                        </div>
                        <div class="d-flex flex-row gap-3 mb-2">
                            <div class="form-group">
                                <label for="email" class="h2 small">Email</label>
                                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="h2 small">Phone</label>
                                <input type="number" class="form-control" name="phone" placeholder="Enter Phone">
                            </div>
                        </div>
                        <div class="d-flex flex-row gap-3 mb-2">
                            <div class="form-group">
                                <label for="address" class="h2 small">Address</label>
                                <input type="text" class="form-control" name="address" placeholder="Enter address">
                            </div>
                            <div class="form-group">
                                <label for="reason" class="h2 small">Reason</label>
                                <input type="text" class="form-control" name="reason" placeholder="Enter Reason">
                            </div>
                        </div>
                        <div class="d-flex flex-row gap-5 mb-3">
                            <div class="form-group me-3">
                                <label for="from" class="h2 small">From</label>
                                <input type="date" name="from" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="to" class="h2 small">To</label>
                                <input type="date" name="to" class="form-control">
                            </div>
                        </div>
                        <input type="submit" class="btn btn-primary" name="submit" value="Book" />
                    </form>
                </div>
                </div>
            </div>
        </div>
    </body>
</html>
