<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politicism - Login</title>

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