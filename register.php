<?php

include_once(__DIR__ . "/classes/UserAccount.php");
include_once(__DIR__ . "/functions.php");

if (!empty($_POST)) {
    try {
        $user = new UserAccount();

        $user->setEmail($_POST['email']); //sets email
        $user->setUsername($_POST['username']); //sets username
        $user->setPassword($_POST['password']); //sets password

        if ($_POST['password'] != $_POST['confirmpassword']) { //checks is password and confirm password match
            $error = "Passwords are not matching!";
        }

        if ($user->availableEmail($user->getEmail())) { //check if email is not being used already
            if ($user->validEmail()) { //checks is email is valid
                // valid email
            } else {
                $error = "The email you entered is not valid!";
            }
        } else {
            $error = "Email is already in use!";
        }

        if (!empty($_FILES['avatar']['name'])) { // upload profile picture
            try {
                $image = $_FILES['avatar']['name'];
                uploadImage($image);
            } catch (Exception $e) {
                $image = "noImg.png";
                $error = $e->getMessage();
            }
        } //no else, field not required

        if (!isset($error)) {
            try {
                $user->setAvatar($image);
                $user->setLastLogin(date("Y-m-d"));
                $user->setIp($_SERVER['REMOTE_ADDR']);
                $user->createAccount(); //save user to database
                session_start();
                $_SESSION["userEmail"] = $_POST['email'];
                $tokens = $user->tokenFromSession($_SESSION['userEmail']);
                $_SESSION["userId"] = $tokens['id'];
                $_SESSION["userToken"] = $tokens['token'];
                header("Location: index.php");
            } catch (\Throwable $th) {
                $error = $th->getMessage();
            }
        }
    } catch (\Throwable $th) {
        $error = $th->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politicism - Register</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="container--duo">
        <section class="logo__section">
            <img class="wordLogo__img" src="images/wordLogo.svg" alt="Politicism word logo">
            <div class="logo__box logo__box--none">
                <img class="iconLogo__img" src="images/iconLogo.svg" alt="Politicism icon logo">
            </div>
        </section>

        <section class="form__section">
            <form class="form form--login" action="" method="post" enctype="multipart/form-data">

                <?php if (isset($error)) : ?>
                <div class="form__error">
                    <p>
                        <?php echo $error; ?>
                    </p>
                </div>
                <?php endif; ?>

                <label for="avatar"><img class="form__avatar" src="images/avatarUpload.svg" alt="upload avatar"></label>
                <input type="file" class="form-control white" name="avatar" id="avatar" accept="image/*">

                <input class="input__form" type="text" id="email" name="email" placeholder="Email">

                <input class="input__form" type="text" id="username" name="username" placeholder="Username">

                <input class="input__form" type="password" id="password" name="password" placeholder="Password">

                <input class="input__form" type="password" id="confirmpassword" name="confirmpassword"
                    placeholder="Confirm password">

                <input class="btn" type="submit" value="Register!">
            </form>
            <div class="page__switchers">
                <h2 class="switch__pages">Already have an account?</h2>
                <h2 class="switch__pages orange"><a class="a__pages" href="login.php">Login here</a></h2>
            </div>
        </section>
    </div>
</body>

</html>