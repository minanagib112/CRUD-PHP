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
    //Update data
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["name"])) {

        $name = ($_POST["name"]);
        $_SESSION['name'] = $name;
    }
    if (!empty($_POST["email"])) {
        $email = ($_POST["email"]);
        $_SESSION["email"] = $email;
    }
    if (!empty($_POST["group"])) {
        $group = ($_POST["group"]);
        $_SESSION["group"] = $group;
    }
    if (!empty($_POST["class"])) {
        $class = ($_POST["class"]);
        $_SESSION["class"] = $class;
    }
    if (!empty($_POST["gender"])) {
        $gender = ($_POST["gender"]);
        $_SESSION["gender"] = $gender;
    }
    if (!empty($_POST["id"])) {
        $id = ($_POST["id"]);
        $_SESSION["id"] = $id;
    }


    $sql = "UPDATE forms SET FullName = '$name', Email = '$email', GroupNumber = '$group', Class = '$class', Gender = '$gender' WHERE id = '$id'";

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

    header("location: edit.php?id=$id");
}
