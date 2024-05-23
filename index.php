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
                    
                        <form action="export.php" method="post" id="download-form" class="d-flex flex-row align-items-center justify-content-center gap-3">
                            <input type="date" name="from" class="form-control" required>
                            <input type="date" name="to" class="form-control" required>
                            <button type="submit" class="btn btn-success">Download</button>
                        </form>
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
                                    $connection = mysqli_connect("localhost", "root", "", "cruddata");
                                    if (!$connection) {
                                        die("Connection failed: " . mysqli_connect_error());
                                    }

                                    $sql = "SELECT * FROM booking";
                                    $result = mysqli_query($connection, $sql);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<tr>
                                            <td>{$row['id']}</td>
                                            <td>{$row['name']}</td>
                                            <td>{$row['age']}</td>
                                            <td>{$row['email']}</td>
                                            <td>{$row['phone']}</td>
                                            <td>{$row['address']}</td>
                                            <td>{$row['date_from']}</td>
                                            <td>{$row['date_to']}</td>
                                            <td>{$row['reason']}</td>
                                            <td>
                                                <a href='edit.php?edit={$row['id']}' class='btn bg-info border-0 rounded h-29'>U</a>
                                                <a href='delete.php?del={$row['id']}' onclick=\"return confirm('Are you sure you want to delete this record?');\" class='btn bg-danger border-0 rounded h-29'>D</a>
                                            </td>
                                        </tr>";
                                    }

                                    mysqli_close($connection);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('download-form').addEventListener('submit', function(event) {
        var fromDate = document.querySelector('input[name="from"]').value;
        var toDate = document.querySelector('input[name="to"]').value;

        if (!fromDate || !toDate) {
            alert('Please select both dates.');
            event.preventDefault();
        }
    });
    </script>
</body>
</html>
