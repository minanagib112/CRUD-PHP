<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>Home</title>
</head>

<body class="p-5" style="background-color: #f5f5f5;">
    <div>
        <h3 class="text-center text-white bg-black p-3 w-75 mx-auto shadow-lg rounded">Users Data</h3>
    </div>


    <?php
    include "config.php";

    //Select data
    $sql = "SELECT id,FullName, Email, GroupNumber, Class, Gender FROM forms";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die('Could not get data: ' . mysqli_error($conn));
    }
    while ($row = mysqli_fetch_all($result, MYSQLI_ASSOC)) {
        $students = $row;
    }
    mysqli_close($conn);
    ?>

    <table class="table table-striped table-bordered shadow-lg table-hover text-center w-75 mx-auto mt-5">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">FullName</th>
                <th scope="col">Email</th>
                <th scope="col">GroupNumber</th>
                <th scope="col">Class</th>
                <th scope="col">Gender</th>
                <th scope="col">Actions</th>

            </tr>
        </thead>
        <tbody>
            <?php
            if (isset($students)) {
                foreach ($students as $students) { ?>
                    <tr>
                        <td scope="row"><?php echo $students['id']; ?></td>
                        <td><?php echo $students['FullName']; ?></td>
                        <td><?php echo $students['Email']; ?></td>
                        <td><?php echo $students['GroupNumber']; ?></td>
                        <td><?php echo strtoupper($students['Class']); ?></td>
                        <td><?php echo ucfirst($students['Gender']); ?></td>
                        <td>
                            <a href="show.php?id=<?php echo $students['id']; ?>" class="btn btn-sm btn-primary">Show</a>
                            <a href="edit.php?id=<?php echo $students['id']; ?>" class="btn btn-sm btn-secondary">Edit</a>
                            <a href="delete.php?id=<?php echo $students['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('do you really want to delete post?')">Delete</a>
                        </td>
                    </tr>
            <?php
                }
            } ?>


        </tbody>
    </table>
    <button class="btn btn-success d-block mx-auto" onclick="location.href='form.php'">Add New User</button></button>
</body>

</html>