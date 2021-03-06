<?php

    session_start();
    if (!isset($_SESSION['userId'])) {
        header("Location: login.php");
    }
    $email = $_SESSION["userEmail"];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politicism</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <section class="section">
        <h2 class="section__title">Current region</h2>
        <div class="section__content">
            <div class="section__div section__div--large div__region">
                <img class="coa" src="images/coa/Flanders.png" alt="Coat of arms of the current region">
                <div class="region__info">
                    <p>Flanders</p>
                    <p class="orange">Industrial</p>
                </div>
            </div>
            <div class="section__div section__div--small">
                <a href="#"><img class=unique__resource src="images/resources/clay.svg" alt="unique resource icon"></a>
            </div>
            <div class="section__div section__div--medium">
                <a href="map.php"> <img src="images/world.svg" alt="go to map button"> </a>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section__titles">
            <h2 class="section__title">België</h2>
            <h3>Government</h3>
        </div>
        <div class="section__content section__state">
            <div class="section__div section__div--large div__state">
                <img class="coa" src="uploads/coa/België.png" alt="Coat of arms of the current state">
                <div class="leader__info">
                    <p>leader:</p>
                    <p class="orange">Janneke Charles Michelle</p>
                </div>
            </div>
            <div class="section__div section__div--small government__type">
                <a href="#"><img class=government__icon src="images/governments/monarchy.svg"
                        alt="displaying governemtn type of state"></a>
            </div>
        </div>
    </section>

    <section class="section">
        <h2 class="section__title">Current War</h2>
        <div class="graph__container">
            <div class="graph">
                <p>55%</p>
            </div>
        </div>

        <div class="section__content">
            <div class="section__div section__div--large div__region div--45">
                <img class="coa coa--small" src="images/coa/Flanders.png" alt="Coat of arms of the current region">
                <div class="region__info">
                    <p>Flanders</p>
                    <p class="orange">Attacking</p>
                </div>
            </div>
            <div class="section__div">
                <h1 class="orange">VS</h1>
            </div>
            <div class="section__div section__div--large div__region div--45 div--right">
                <div class="region__info">
                    <p>Wallonia</p>
                    <p class="orange">Defending</p>
                </div>
                <img class="coa coa--small" src="images/coa/Wallonia.png" alt="Coat of arms of the current region">
            </div>
        </div>
        <div class="btn__container">
            <input class="btn btn--small" type="submit" value="fight!">
        </div>
    </section>

    <section>
        <h2 class="section__title">Work</h2>
        <div class="section__div section__div--large section__div--full">
            <img class="coa coa--small" src="images/factory.png" alt="factory logo">
            <div class="factory__info">
                <p class="name">Mickey's crazy gold rush</p>
                <p class="level">level 27</p>
                <p class="foundationDate">Founded: 05/07/2020</p>
            </div>
        </div>

        <div class="btn__container">
            <input class="btn btn--small" type="submit" value="Work! +95%">
        </div>

    </section>



    <?php include_once('footer.inc.php'); ?>
</body>

</html>