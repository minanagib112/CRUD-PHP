<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Form Validation</title>
</head>
<?php
session_start();
if (!isset($_SESSION['name'])) {
    $_SESSION['name'] = "";
}
if (!isset($_SESSION['email'])) {
    $_SESSION['email'] = "";
}
if (!isset($_SESSION['group'])) {
    $_SESSION['group'] = "";
}
if (!isset($_SESSION['class'])) {
    $_SESSION['class'] = "";
}
if (!isset($_SESSION['gender'])) {
    $_SESSION['gender'] = "";
}

?>

<body class="p-5" style="background-color: #f5f5f5;">
    <h2 class="text-center text-white bg-black p-3 w-75 mx-auto shadow-lg rounded">CRUD Operation</h2>
    <form class="row g-3 flex-row shadow-lg p-3 m-5 bg-body rounded" style="max-height: 100vh;" method="POST" action="insert.php">
        <div class="col-md-4">
            <label class="form-label">Name: </label>
            <input type="text" class="form-control" name="name">
            <p class="text-danger"><?php if (isset($_SESSION["nameErr"])) echo $_SESSION["nameErr"]; ?></p>
        </div>
        <div class="col-md-4">
            <label class="form-label">Email: </label>
            <div class="input-group">
                <span class="input-group-text">@</span>
                <input type="email" class="form-control" name="email">
            </div>
            <p class="text-danger"><?php if (isset($_SESSION["emailErr"])) echo $_SESSION["emailErr"]; ?></p>


        </div>
        <div class=" col-md-4">
            <label class="form-label">Group #</label>
            <input type="text" name="group" class="form-control">
            <p class="text-danger"><?php if (isset($_SESSION["groupErr"])) echo $_SESSION["groupErr"]; ?></p>

        </div>
        <div class="col-md-4">
            <label class="form-label">Courses: </label>
            <select class="form-select" name="class">
                <option disabled selected>Open this select menu</option>
                <option value="php">PHP</option>
                <option value=".net">.NET</option>
                <option value="node.js">Node.js</option>
            </select>
            <p class="text-danger"><?php if (isset($_SESSION["classErr"])) echo $_SESSION["classErr"]; ?></p>
        </div>
        <div class="form-check col-md-4 ">
            <label class=" form-label">Gender:</label>
            <div class="form-check d-flex gap-3">
                <div>
                    <input class="form-check-input" type="radio" name="gender" value="Male">Male
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gender" value="Female">Female
                </div>
            </div>
        </div>
        <div class="col-12">
            <button class="btn btn-primary d-block mx-auto" name="submit" type="submit">Submit form</button>
        </div>
        </div>
    </form>
</body>

</html>

<?php
session_destroy();
?>