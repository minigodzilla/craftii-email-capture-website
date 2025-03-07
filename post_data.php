<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $config = $_POST['config'];

    // CSV format data
    $csvData = "$email,$config\n";

    // Path to the text file for appending data
    $file = 'form_data.csv';

    // Append data to the file
    if (file_put_contents($file, $csvData, FILE_APPEND | LOCK_EX) !== false) {
        $response = 'Thank you for your feedback! Stand by to receive your craft...';
    } else {
        $response = 'Error saving form data. Please try again later.';
    }
} else {
    $response = 'Error: Invalid request.';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ancestors' Gate - Contact</title>
    <link rel="stylesheet" href="style.css" />
    <meta http-equiv="refresh" content="5;url=https://craftii.net/craft/?c=<?php echo $config ?>" />
</head>

<body>
   <div><?php echo $response ?></div>
</body>

</html>
