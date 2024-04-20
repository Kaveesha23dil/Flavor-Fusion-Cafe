<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $person = $_POST['person'];
    $reservation_date = $_POST['reservation-date'];
    $reservation_time = $_POST['reservation-time'];
    $message = $_POST['message'];

    $servername = "localhost";
    $username = "username";
    $password = "password";
    $dbname = "database_name";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO reservations (name, phone, person, reservation_date, reservation_time, message)
            VALUES ('$name', '$phone', '$person', '$reservation_date', '$reservation_time', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Reservation successfully submitted.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
