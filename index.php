<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .table-container {
            max-height: 300px;
            overflow-y: auto;
            display: block;
        }
        thead th {
            position: sticky;
            top: 0;
            background: white;
            z-index: 1;
        }
        .text-light {
        text-decoration: none; 
        color: inherit; 
        }
    </style>
</head>
<body>
    <div class="container-fluid bg-primary d-flex justify-content-center align-items-center vh-100">
        <div class="row">
            <div class="card">
                <div class="card-header text-center d-flex justify-content-between">
                    <button class="btn btn-primary"><a href="add.php" class="text-light">Book</a></button>
                    <h4>ITC GRAND CHOLA</h4>
                    <div class="d-flex flex-row align-items-center justify-content-center gap-3">
                        <input type="date" name="from" class="form-control ">
                        <input type="date" name="to" class="form-control">
                        <button class="btn btn-success">Download</button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="col text-center">Id</th>
                                    <th class="col text-center">Client Name</th>
                                    <th class="col text-center">Age</th>
                                    <th class="col text-center">Email</th>
                                    <th class="col text-center">Phone</th>
                                    <th class="col text-center">Address</th>
                                    <th class="col text-center">From Date</th>
                                    <th class="col text-center">To Date</th>
                                    <th class="col text-center">Reason</th>
                                    <th class="col text-center">Activity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $connection = mysqli_connect("localhost", "root", "");
                                    $db = mysqli_select_db($connection, "cruddata");

                                    $sql = 'SELECT * FROM booking';
                                    $run = mysqli_query($connection, $sql);

                                    $id = 1;  // Added the missing semicolon

                                    while ($row = mysqli_fetch_array($run)) {
                                        $uid = $row['id'];
                                        $uname = $row['name'];
                                        $uage = $row['age'];
                                        $uemail = $row['email'];
                                        $uphone = $row['phone'];
                                        $uaddress = $row['address'];
                                        $udate_from = $row['date_from'];
                                        $udate_to = $row['date_to'];
                                        $ureason = $row['reason'];
                                ?>
                                <tr>
                                    <td><?php echo $uid; ?></td>
                                    <td><?php echo $uname; ?></td>
                                    <td><?php echo $uage; ?></td>
                                    <td><?php echo $uemail; ?></td>
                                    <td><?php echo $uphone; ?></td>
                                    <td><?php echo $uaddress; ?></td>
                                    <td><?php echo $udate_from; ?></td>
                                    <td><?php echo $udate_to; ?></td>
                                    <td><?php echo $ureason; ?></td>
                                    <td>
                                        <a href="edit.php?edit=<?php echo $uid; ?>" class="btn bg-info border-0 rounded h-29">U</a>
                                        <a href="delete.php?del=<?php echo $uid; ?>" onclick="return confirm('Are you sure you want to delete this record?');" class="btn bg-danger border-0 rounded h-29">D</a>
                                    </td>
                                </tr>
                                <?php
                                    $id++;
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
