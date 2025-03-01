<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $phone = htmlspecialchars($_POST["phone"]);
    $job_type = htmlspecialchars($_POST["job_type"]);
    $description = htmlspecialchars($_POST["description"]);

    // Format data for CSV
    $data = [$name, $email, $phone, $job_type, $description, date("Y-m-d H:i:s")];

    // Save data to CSV file
    $file = fopen("submissions.csv", "a"); // Open file in append mode
    fputcsv($file, $data);
    fclose($file);

    // Redirect to a thank-you page
    header("Location: thank_you.html");
    exit();
} else {
    // Redirect if accessed directly
    header("Location: index.html");
    exit();
}
?>
