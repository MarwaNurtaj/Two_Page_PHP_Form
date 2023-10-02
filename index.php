<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>
<!-- Please complete this task *using PHP* and share it with me: Create a simple two page form with a final success page.
 Page 1: name, phone number & email
 Page 2: location, age and university
 A final success page with a thank you message by dynamically fetching the person's name, "Thank you for filling the 
form {name}."Ensure validation exists on the form.  -->

<body class="m-4 bg-info" >
    <h1 class="text-center">Page 1: Personal Information</h1>
    <?php
    $name = $phone = $email = "";
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $errors[] = "Name is required";
        } else {
            $name = $_POST["name"];
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $errors[] = "Only letters and white space allowed in name";
            }
        }

        if (empty($_POST["phone"])) {
            $errors[] = "Phone number is required";
        } else {
            $phone = $_POST["phone"];
        }

        if (empty($_POST["email"])) {
            $errors[] = "Email is required";
        } else {
            $email = $_POST["email"];
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "Invalid email format";
            }
        }

        if (empty($errors)) {
            header("Location: form_2.php?name=$name");
            exit();
        }
    }

    ?>
    <form class='m-5' method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" name="name" placeholder="Enter your Name" value="<?php echo $name; ?>">
        </div>
        <div class="mb-3">
        <label for="phone" class="form-label">Phone Number:</label>
        <input type="tel" class="form-control" name="phone" placeholder="Enter your number" value="<?php echo $phone; ?>">
        </div>
        <div class="mb-3">
        <label for="email" class="form-label">Email:</label>
        <input type="email" class="form-control" name="email" placeholder="name@example.com" value="<?php echo $email; ?>">
        </div>
        <div class="mb-3">
        <input type="submit" name="submit" value="Next">
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