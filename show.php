<?php
include "config.php";
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$sql = "SELECT id,FullName, Email, GroupNumber, Class, Gender FROM forms WHERE id = $id";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) == 0) {
    http_response_code(404);
} else {
    $user = mysqli_fetch_assoc($result);
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Show Details</title>
</head>

<body class=" p-5" style="background-color: #f5f5f5;">
    <?php if (isset($user)) { ?>
        <div class="card w-50 mx-auto mt-5 p-3 shadow-lg mb-5 bg-body rounded ">
            <div class="card-header text-center text-white bg-black p-3 mb-3">
                User Details
            </div>
            <div class="card-body text-start">
                <p class="card-text">Name: <?php echo $user['FullName']; ?></p>
                <p class="card-text">Email: <?php echo $user['Email']; ?></p>
                <p class="card-text">Gender: <?php echo $user['Class']; ?></p>
                <p class="card-text">Group: <?php echo $user['Gender']; ?></p>
                <div class="text-center">
                    <a href="index.php" class="btn btn-secondary text-white fw-bold w-25 text-center hover">Go Back</a>
                </div>
            </div>
        </div>
    <?php } else {
        echo "<p> No User Found </p>";
    } ?>
</body>

</html>