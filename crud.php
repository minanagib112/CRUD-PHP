<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>CRUD</title>
</head>

<body class="p-5">
    <div>
        <button class="btn btn-danger mb-5" onclick="location.href='index.php'">Add new user</button></button>
    </div>
</body>

</html>
<?php
include "config.php";
// Create database
$checkDatabaseQuery = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'crud'";
$checkResult = mysqli_query($conn, $checkDatabaseQuery);
$databaseExists = mysqli_num_rows($checkResult) > 0;

if (!$databaseExists) {
    $sql = "CREATE DATABASE crud";
    $retval = mysqli_query($conn, $sql);
    if ($retval) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . mysqli_error($conn);
    }
}
// Select db
mysqli_select_db($conn, $dbname);

// create table
if (mysqli_num_rows(mysqli_query($conn, "SHOW TABLES LIKE 'form'")) == 0) {
    $table = "CREATE TABLE form (
    id INT NOT NULL AUTO_INCREMENT,
    FullName VARCHAR(255) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    GroupNumber INT NOT NULL,
    Class VARCHAR(255) NOT NULL,
    Gender VARCHAR(255) NOT NULL,
    Courses VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
  );    
";
    $retval = mysqli_query($conn, $table);
    if (!$retval) {
        die('Could not create table: ' . mysqli_error($conn));
    } else {
        echo "Table created successfully";
    }
}
//Insert data
$name = '';
$gender = "";
$email = "";
$group = "";
$class = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["name"])) {

    $name = ($_POST["name"]);
}
if (!empty($_POST["email"])) {
    $email = ($_POST["email"]);
}
if (!empty($_POST["group"])) {
    $group = ($_POST["group"]);
}
if (!empty($_POST["class"])) {
    $class = ($_POST["class"]);
}
if (!empty($_POST["gender"])) {
    $gender = ($_POST["gender"]);
}

$sql = "INSERT INTO form (FullName, Email, GroupNumber, Class, Gender) 
        VALUES ('$name', '$email', '$group', '$class', '$gender')";

$retval = mysqli_query($conn, $sql);

if (!$retval) {
    die('Could not insert data: ' . mysqli_error($conn));
}

//Select data
$sql = "SELECT id,FullName, Email, GroupNumber, Class, Gender FROM form";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die('Could not get data: ' . mysqli_error($conn));
}
while ($row = mysqli_fetch_assoc($result)) {
    $students[] = $row;
}
mysqli_close($conn);
?>

<table class="table table-striped table-bordered text-center">
    <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">FullName</th>
            <th scope="col">Email</th>
            <th scope="col">GroupNumber</th>
            <th scope="col">Class</th>
            <th scope="col">Gender</th>
        </tr>
    </thead>
    <tbody>
        <?php
        for ($i = 0; $i < count($students); $i++) { ?>
            <tr>
                <td scope="row"><?php echo $students[$i]['id']; ?></td>
                <td><?php echo $students[$i]['FullName']; ?></td>
                <td><?php echo $students[$i]['Email']; ?></td>
                <td><?php echo $students[$i]['GroupNumber']; ?></td>
                <td><?php echo $students[$i]['Class']; ?></td>
                <td><?php echo $students[$i]['Gender']; ?></td>
            </tr>
        <?php
        } ?>

    </tbody>
</table>