<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Politicism - Profile</title>

    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>

<section class="section__user">
    <form class="form form__changeAvatar" action="" method="post" enctype="multipart/form-data">
        <label for="avatar"><img class="form__avatar" src="images/avatarUpload.svg" alt="upload avatar"></label>
        <input type="file" class="form-control white" name="avatar" id="avatar" accept="image/*">
        <!-- hidden btn for accepting new img -->
    </form>
    <h2 class="userName">User name from naming</h2>
</section>

<section class="section__level">
    <h3 class="userLevel">lvl 12</h3>
        <div class="graph__container graph__container--black">
            <div class="graph graph--green">
                <p>55%</p>
            </div>
        </div>
</section>

<section class="section__money">
    <div class=cash__titles><h3>cash</h3>
    <h3>bank</h3></div>
    <div class="cash__amount"><h4>$95.000.000.000</h4>
    <h4>$905.000.000.000</h4></div>
    <div class="btn__container">
            <input class="btn btn--small" type="submit" value="bank">
        </div>
    <div class="storage__titles"><h3>storage</h3></div>
    <div class="btn__container">
            <input class="btn btn--small" type="submit" value="warehouse">
        </div>
</section>

<section class="section__perks">
    <h2>perks 0/100</h2>
    <div class="perks">
        <div class="perk"><img src="images/perkWars.svg" alt="war perk image"><h3>war <br> (0)</h3></div>
        <div class="perk"><img src="images/perkEconomy.svg" alt="economy perk image"><h3>economics <br> (0)</h3></div>
        <div class="perk"><img src="images/perkPolitics.svg" alt="politics perk image"><h3>politics <br> (0)</h3></div>
    </div>
</section>


    <?php include_once('footer.inc.php'); ?>

    <script src="js/displayImg.js"></script>
</body>

</html>