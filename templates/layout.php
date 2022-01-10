<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/style.css">
    <title>Wypożyczalnia samochodów</title>
    <meta name="description" content="Strona wykonana na potrzeby projektu. Strona jest imitacją wypożyczalnii samochodów">
    <meta name="robots" content="none" />
</head>
<body>
    <nav>
        <div class="container">
            <a href="index.php"><img class="nav__logo" src="images/logo.svg" alt="logo"></a>
            <ul id="navList" class="nav__list">
                <li><a href="index.php#about_as">O NAS</a></li>
                <li><a href="index.php#cars">SAMOCHODY</a></li>
                <li><a href="index.php#rent">WYNAJEM</a></li>
                <li><a href="index.php#contact">KONTAKT</a></li>
            </ul>
            <?php 
                if(empty($_SESSION['user'])){
                    echo " 
                        <ul class='nav_list'>
                        <li><a href='index.php?action=login'>zaloguj się</a></li>
                        <li><a href='index.php?action=register'>zarejestruj się</a></li>
                        </ul>
                    ";
                } else {
                    echo "
                        <a href='index.php?action=logout' id='logout' name='logout'>wyloguj</a>
                        <a href='index.php?action=settings' id='settings' name='settings'>konto</a>
                    ";
                }
            ?>
            
            <button id="menu" class="nav__burger_menu"></button>
        </div>
    </nav>
    <?php include_once("templates/$page.php"); ?>
    <footer>
        <div class="container">
            <div class="footer_nav">
                <ul>
                    <li><a href="index.php#about_as">o nas</a></li>
                    <li><a href="index.php#cars">samochody</a></li>
                    <li><a href="index.php#rent">wynajem</a></li>
                    <li><a href="index.php#contact">kontakt</a></li>
                    <li><a href="index.php#career">kariera</a></li>
                    <li><a href="index.php#privacy_policy">polityka prywatności</a></li>
                    <li><a href="index.php#complaints">reklamacje</a></li>
                </ul>
            </div>
            <img src="images/logo.svg" alt="logo">
        </div>
    </footer>
    <script src="scripts/script.js"></script>
</body>
</html>