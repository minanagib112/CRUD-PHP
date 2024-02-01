<?php
session_start();
include "config.php";
//validation
$nameErr = $emailErr = $groupErr = $classErr = $genderErr = "";
if (empty($_POST["name"])) {
    $nameErr = "Name is required";
}
if (empty($_POST["email"])) {
    $emailErr = "Email is required";
}
if (empty($_POST["group"])) {
    $groupErr = "Group is required";
}
if (empty($_POST["class"])) {
    $classErr = "Class is required";
}
if (empty($nameErr) && empty($emailErr) && empty($groupErr) && empty($classErr)) {
    //Insert data
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

    $sql = "INSERT INTO forms (FullName, Email, GroupNumber, Class, Gender) 
        VALUES ('$name', '$email', '$group', '$class', '$gender')";

    $retval = mysqli_query($conn, $sql);

    if ($retval) {
        header("location: index.php");
    } else {
        die('Could not insert data: ' . mysqli_error($conn));
    }
} else {
    $_SESSION["nameErr"] = $nameErr;
    $_SESSION["emailErr"] = $emailErr;
    $_SESSION["groupErr"] = $groupErr;
    $_SESSION["classErr"] = $classErr;

    header("location: form.php");
}
