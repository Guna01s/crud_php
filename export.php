<?php
if (isset($_POST['from']) && isset($_POST['to'])) {
    $from_date = $_POST['from'];
    $to_date = $_POST['to'];

    $connection = mysqli_connect("localhost", "root", "", "cruddata");
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM booking WHERE date_from >= '$from_date' AND date_to <= '$to_date'";
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=booking_data.csv');
        $output = fopen('php://output', 'w');
        fputcsv($output, array('Id', 'Client Name', 'Age', 'Email', 'Phone', 'Address', 'From Date', 'To Date', 'Reason'));

        while ($row = mysqli_fetch_assoc($result)) {
            fputcsv($output, $row);
        }
        fclose($output);
        mysqli_close($connection);
        exit;
    } else {
        echo "<script>alert('No data found for the selected date range'); window.history.back();</script>";
    }
    mysqli_close($connection);
} else {
    echo "<script>alert('Invalid date range'); window.history.back();</script>";
}
?>
