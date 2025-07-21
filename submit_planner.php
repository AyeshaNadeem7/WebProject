<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $destination = $_POST["destination"];
    $hotel = $_POST["hotel"];
    $meal = $_POST["meal"];
    $start_date = $_POST["start_date"];
    $end_date = $_POST["end_date"];
    $persons = $_POST["persons"];
    $duration_days = $_POST["duration_days"];
    $meal_plan = $_POST["meal_plan"];
    $transport = $_POST["transport"];

    $stmt = $conn->prepare("INSERT INTO trip_plans (destination, hotel, meal_type, start_date, end_date, persons, duration_days, meal_plan, transport_option)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssiss", $destination, $hotel, $meal, $start_date, $end_date, $persons, $duration_days, $meal_plan, $transport);
    $stmt->execute();
    $stmt->close();
    $conn->close();

    echo "Trip plan submitted!";
}
?>
