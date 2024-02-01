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

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Form Validation</title>
</head>

<body class="p-5" style="background-color: #f5f5f5;">

    <?php if (isset($user)) { ?>
        <h2 class="text-center text-white bg-black p-3 w-75 mx-auto shadow-lg rounded">CRUD Operation</h2>
        <form class="row g-3 flex-row shadow-lg p-3 m-5 bg-body rounded" style="max-height: 100vh;" method="POST" action="update.php">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <div class="col-md-4">
                <label class="form-label">Name: </label>
                <input type="text" class="form-control" value="<?= $user['FullName'] ?>" name="name">
                <p class="text-danger"><?php if (isset($_SESSION["nameErr"])) echo $_SESSION["nameErr"]; ?></p>
            </div>
            <div class="col-md-4">
                <label class="form-label">Email: </label>
                <div class="input-group">
                    <span class="input-group-text">@</span>
                    <input type="email" class="form-control" name="email" value="<?= $user['Email'] ?>">
                </div>
                <p class="text-danger"><?php if (isset($_SESSION["emailErr"])) echo $_SESSION["emailErr"]; ?></p>

            </div>
            <div class=" col-md-4">
                <label class="form-label">Group #</label>
                <input type="text" name="group" class="form-control" value="<?= $user['GroupNumber'] ?>">
                <p class="text-danger"><?php if (isset($_SESSION["groupErr"])) echo $_SESSION["groupErr"]; ?></p>

            </div>
            <div class="col-md-4">
                <label class="form-label">Courses: </label>
                <select class="form-select" name="class">
                    <option disabled selected>Open this select menu</option>
                    <option value="php" <?php if ($user['Class'] == "php") echo "selected"; ?>>PHP</option>
                    <option value=".net" <?php if ($user['Class'] == ".net") echo "selected"; ?>>.NET</option>
                    <option value="node.js" <?php if ($user['Class'] == "node.js") echo "selected"; ?>>Node.js</option>
                </select>
                <p class="text-danger"><?php if (isset($_SESSION["classErr"])) echo $_SESSION["classErr"]; ?></p>
            </div>
            <div class="form-check col-md-4 ">
                <label class=" form-label">Gender:</label>
                <div class="form-check d-flex gap-3">
                    <div>
                        <input class="form-check-input" type="radio" name="gender" value="Male" <?php if ($user['Gender'] == "male") echo "checked"; ?>>Male
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" value="Female" <?php if ($user['Gender'] == "female") echo "checked"; ?>>Female
                    </div>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary d-block mx-auto" name="submit" type="submit">Edit form</button>
            </div>
            </div>
        </form>
    <?php } else {
        header("Location: index.php");
    } ?>
</body>