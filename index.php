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
//setting default values
$nameErr = '';
$name = '';
$gender = "";
$email = "";
$group = "";
$class = "";
$courses = [];
// checking for required field with retaining previous values 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameErr = "Name is required";
    } else {
        $name = ($_POST["name"]);
    }
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
if (!empty($_POST["courses"])) {
    $courses = ($_POST["courses"]);
}
if (!empty($_POST["gender"])) {
    $gender = ($_POST["gender"]);
}
?>

<body class="p-5" style="background-color: #f5f5f5;">
    <h2>Form Validation</h2>
    <form class="row g-3 flex-column" style="max-height: 100vh;" method="POST" action="crud.php">
        <div class="col-md-4">
            <label class="form-label">Name: </label>
            <input type="text" class="form-control" value="<?php echo $name; ?>" name="name">
            <span style="color:red" class="error">* <?php echo $nameErr; ?></span>
        </div>
        <div class="col-md-4">
            <label class="form-label">Email: </label>
            <div class="input-group">
                <span class="input-group-text">@</span>
                <input type="email" class="form-control" value="<?php echo $email; ?>" name="email">
            </div>
        </div>
        <div class="col-md-4">
            <label class="form-label">Group #</label>
            <input type="text" name="group" value="<?php echo $group; ?>" class="form-control">
        </div>
        <div class="col-md-4">
            <label class="form-label">Class details: </label>
            <textarea class="form-control" rows="2" name="class"><?php if (isset($_POST['class'])) echo $_POST['class']; ?></textarea>
        </div>
        <label class="form-label">Gender:</label>
        <div class="form-check col-md-2 d-flex gap-5">
            <div>
                <input class="form-check-input" type="radio" name="gender" value="Male" <?php if ($gender == "Male") echo "checked"; ?>>Male
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="Female" <?php if ($gender == "Female") echo "checked"; ?>>Female
            </div>
        </div>
        <div class="col-md-4">
            <label class="form-label">Select Courses: </label>
            <select class="form-select" multiple name="courses[]" value="<?php echo $courses; ?>" multiple>
                <option selected disabled>Choose...</option>
                <option value="html" <?php if (in_array("html", $courses)) echo "selected"; ?>>HTML</option>
                <option value="css" <?php if (in_array("css", $courses)) echo "selected"; ?>>CSS</option>
                <option value="javascript" <?php if (in_array("javascript", $courses)) echo "selected"; ?>>JavaScript</option>
                <option value="bootstrap" <?php if (in_array("bootsrtap", $courses)) echo "selected"; ?>>Bootstrap</option>
                <option value="php" <?php if (in_array("php", $courses)) echo "selected"; ?>>PHP</option>
                <option value="laravel" <?php if (in_array("laravel", $courses)) echo "selected"; ?>>Laravel</option>
            </select>
        </div>
        <div class="col-4">
            <div class="form-check">
                <input class="form-check-input" type="checkbox">
                <label class="form-check-label">
                    Agree to terms and conditions
                </label>
            </div>

        </div>
        <div class="col-12">
            <button class="btn btn-primary" name="submit" type="submit">Submit form</button>
        </div>
    </form>
</body>
<hr>

</html>

<?php
// php code for form validation
if (isset($_POST['submit']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['group']) && !empty($_POST['class']) && !empty($_POST['gender']) && !empty($_POST['courses'])) {
    echo "<h2>Your Input:</h2>";
    echo "Hello " . $_POST['name'];
    echo "<br/>";
    echo "Your email address is " . $_POST['email'];
    echo "<br/>";
    echo "Your group number is " . $_POST['group'];
    echo "<br/>";
    echo "Your class details are " . $_POST['class'];
    echo "<br/>";
    echo "Your gender is " . $gender;
    echo "<br/>";
    if (!empty($_POST['courses'])) {
        $myCourses = $_POST['courses'];
        $container = "";
        foreach ($myCourses as $course) {
            $container .= $course . ", ";
        }
        echo "Your courses are " . $container;
    } else {
        echo "No course selected";
    }
    echo "<br/>";
} ?>