<?php

include_once('classes/UserAccount.php');
include_once('classes/UserLevel.php');
include_once('classes/UserPerks.php');
include_once('functions.php');

session_start();
if (!isset($_SESSION['userId'])) {
    header("Location: login.php");
}

if (!isset($_GET['u'])) {
    header("Location: index.php");
}

$userAccount = new UserAccount();
$levelAccount = new UserLevel();

$userAccount->setToken($_GET['u']);
$levelAccount->setToken($_GET['u']);

$AllUserData = $userAccount->AllUserData();
$levelData = $levelAccount->userLevelData();

$perks = new UserPerks();
$perks->setId($_SESSION['userId']);

?>
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

    <div class="blur"></div>
    <div class="popup popup__bank">
        <h2>Bank</h2>
        <h4 class="error"></h4>
        <h4 class="cash__amount__popup">cash: $<?php echo number_format(htmlspecialchars($AllUserData['cash']), 0, ',', '.'); ?>
        </h4>
        <h4 class="bank__amount__popup">bank: $<?php echo number_format(htmlspecialchars($AllUserData['bank']), 0, ',', '.'); ?>
        </h4>
        <input class="input__form input__form--minimal" type="number" name="transferAmount" id="transferAmount"
            placeholder="enter amount">
        <div class="btn__container">
            <input class="btn btn--small btnBank" type="submit" value="send">
        </div>
        <label class="form__loginState bankCash">retrieve cash
            <input type="checkbox" id="check">
            <span class="checkmark"></span>
        </label>
    </div>

    <div class="popup popup__perks">
        <h2>perks</h2>
        <h4 class="error errorPerk"></h4>

        <h4 class="perk__total">
            <?php echo htmlspecialchars($AllUserData['perksUsed']); ?>/100
        </h4>
        <select name="perks" id="perkTypes">
            <option value="war">War</option>
            <option value="economics">Economics</option>
            <option value="management">Management</option>
        </select>
        <input class="input__form input__form--minimal" type="number" name="perkAmount" id="perkAmount"
            placeholder="enter amount">

        <h4 class="perkDisplay">war:</h4>
        <h4 class="costDisplay">cost: 0</h4>

        <div class="btn__container">
            <input class="btn btn--small btnPerks" type="submit" value="send">
        </div>

    </div>

    <section class="section__user">
        <form class="form form__changeAvatar" action="" method="post" enctype="multipart/form-data">
            <label for="avatar"><img class="form__avatar" src="<?php if (empty($AllUserData['avatar'])) {
    echo "images/avatarUpload.svg";
} else {
    echo "uploads/" . htmlspecialchars($AllUserData['avatar']);
} ?>" alt="upload avatar"></label>
            <input type="file" class="form-control white" name="avatar" id="avatar" accept="image/*">
            <!-- hidden btn for accepting new img -->
        </form>
        <h2 class="userName"><?php echo htmlspecialchars($AllUserData['username']); ?>
        </h2>
    </section>

    <section class="section__level">
        <h3 class="userLevel">lvl <?php echo htmlspecialchars($AllUserData['level']); ?>
        </h3>
        <div class="graph__container graph__container--black">
            <div class="graph graph--green">
                <p><?php echo get_percentage($levelData['xpNeeded'], htmlspecialchars($AllUserData['xp'])).'%' ?>
                </p>
            </div>
        </div>
    </section>

    <section class="section__money">
        <div class=cash__titles>
            <h3>cash</h3>
            <h3>bank</h3>
        </div>
        <div class="cash__amount">
            <h4 class="cash__display">$<?php echo number_format(htmlspecialchars($AllUserData['cash']), 0, ',', '.'); ?>
            </h4>
            <h4 class="bank__display">$<?php echo number_format(htmlspecialchars($AllUserData['bank']), 0, ',', '.'); ?>
            </h4>
        </div>
        <div class="btn__container">
            <input class="btn btn--small btn__bank" type="submit" value="bank">
        </div>
        <div class="storage__titles">
            <h3>storage</h3>
        </div>
        <div class="btn__container">
            <input class="btn btn--small btn__warehouse" type="submit" value="warehouse">
        </div>
    </section>

    <section class="section__perks">
        <h2>perks <?php echo htmlspecialchars($AllUserData['perksUsed']); ?>/100
        </h2>
        <div class="perks">
            <div class="perk"><img src="images/perkWars.svg" alt="war perk image">
                <h3 class="warPerkAmount">War <br> (<?php echo htmlspecialchars($AllUserData['perkWar']); ?>)
                </h3>
            </div>
            <div class="perk"><img src="images/perkEconomy.svg" alt="economy perk image">
                <h3 class="economicsPerkAmount">Economics <br> (<?php echo htmlspecialchars($AllUserData['perkEconomy']); ?>)
                </h3>
            </div>
            <div class="perk"><img src="images/perkManagement.svg" alt="Management perk image">
                <h3 class="managementPerkAmount">Management <br> (<?php echo htmlspecialchars($AllUserData['perkManagement']); ?>)
                </h3>
            </div>
        </div>
    </section>


    <?php include_once('footer.inc.php'); ?>

    <script>
        let token = '<?php echo $_GET['u']; ?>'
        let cash = '<?php echo $AllUserData['cash']; ?>'
        let bank = '<?php echo $AllUserData['bank']; ?>'
        let usedPerkPoints = parseInt(
            '<?php echo htmlspecialchars($AllUserData['perksUsed']); ?>'
        )
    </script>
    <script src="js/displayImg.js"></script>
    <script src="js/displayLevelBar.js"></script>
    <script src="js/bank.js"></script>
    <script src="js/perks.js"></script>
</body>

</html>