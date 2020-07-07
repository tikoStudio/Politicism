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
            <div class="logo__box">
                <img class="iconLogo__img" src="images/iconLogo.svg" alt="Politicism icon logo">
            </div>
        </section>

        <section class="form__section">
            <form class="form form--login" action="" method="post">
                <h2 class="form__heading" form-title>Welcome Politician!<br>Login</h2>

                <?php if (isset($error)) : ?>
                <div class="form__error">
                    <p>
                        <?php echo $error; ?>
                    </p>
                </div>
                <?php endif; ?>

                <input class="input__form" type="text" id="email" name="email" placeholder="Email">

                <input class="input__form" type="password" id="password" name="password" placeholder="Password">

                <input class="btn" type="submit" value="Login!">

                <label class="form__loginState">Keep me logged in!
                    <input type="checkbox">
                    <span class="checkmark"></span>
                </label>
            </form>
            <div class="page__switchers">
                <h2 class="switch__pages">No account yet?</h2>
                <h2 class="switch__pages orange"><a class="a__pages" href="register.php">Register here</a></h2>
            </div>
        </section>
    </div>
</body>

</html>