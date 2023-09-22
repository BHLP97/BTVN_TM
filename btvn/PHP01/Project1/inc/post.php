<?php

$username = $password = $type = $comments = "";

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $email = test_input($_POST["email"]);
    $type = test_input($_POST["type"]);
    $comments = test_input($_POST["comments"]);
    $errors = "";

    if (empty($_POST["name"])) {
        $errors = "Username is required";
    } else {
        $name = test_input($_POST["name"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $errors = "Only letters and white space are allowed for the name";
        }
    }

    if (empty($_POST["email"])) {
        $errors += "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors += "The email is invalid";
        }
    }

    if (empty($_POST["type"])) {
        $errors = "The type is required";
    } else {
        $type = test_input($_POST["type"]);
    }

    if (empty($_POST["comments"])) {
        $errors = "Content is required";
    } else {
        $comments = test_input($_POST["comments"]);
    }

    if(empty($errors)) {
        
    } else {
        $contentAlert = "";
        foreach($errors as $err){
            $contentAlert += $err + "<br>";
        }
        swal("Oops!", $contentAlert, "warning");
    }

}
?>

<?php if (count($errors) === 0) : ?>
    <section>
        <h2>
            Thanks <?php echo htmlspecialchars($name) ?> for your submission!
        </h2>
    </section>

<?php endif ?>