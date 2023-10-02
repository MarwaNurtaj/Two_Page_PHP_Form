<!DOCTYPE html>
<html lang="en">
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<body>

<body class="m-4 bg-info" >
    <h1 class="text-center">Page 2: Extra Information</h1>

    <?php
    $name = $_GET["name"] ?? "";

    $location = $age = $university = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["location"])) {
            $errors[] = "Location is required";
        } else {
            $location = $_POST["location"];
        }

        if (empty($_POST["age"])) {
            $errors[] = "Age is required";
        } else {
            $age = $_POST["age"];
        }

        if (empty($_POST["university"])) {
            $errors[] = "University is required";
        } else {
            $university = $_POST["university"];
        
        }

        if (empty($_POST["name"])) {
            $errors[] = "name is required";
        } else {
            $name = $_POST["name"];
        }

        if (empty($errors)) {

            header("Location: welcome.php?name=$name");
            exit();
        }
    }
    ?>


    <form class='m-5' method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        

        <input type="text" name="name" value="<?php echo $name ?>" hidden>
        <div class="mb-3">
        <label class="form-label" for="location">Location:</label>
        <input type="text"  class="form-control"name="location" value="<?php echo $location; ?>">
        </div>
        <div class="mb-3">
        <label class="form-label" for="age">Age:</label>
        <input type="number" class="form-control" name="age" value="<?php echo $age; ?>">
        </div>
        <div class="mb-3">
        <label class="form-label" for="university">University:</label>
        <input type="text" class="form-control" name="university" value="<?php echo $university; ?>">
        </div>
        <div class="mb-3">
        <input type="submit" name="submit" value="Submit">
        </div>
    </form>

    <?php
    if (!empty($errors)) {
        echo "<h3>Errors:</h3><ul>";
        foreach ($errors as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
    ?>

</body>
</html>