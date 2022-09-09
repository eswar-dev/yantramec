<?php
require_once "components/database.php";

?>
<nav class="nav-mobile">
    <a href="<?php echo $base_url; ?>/index.php"
        class="nav__link <?= (basename($_SERVER['PHP_SELF'])=="index.php")?"nav__link--active":""; ?> ">
        <i class="material-icons nav__icon">store</i>
        <span class="nav__text">HOME</span>
    </a>
    <a href="<?php echo $base_url; ?>/search.php"
        class="nav__link <?= (basename($_SERVER['PHP_SELF'])=="search.php")?"nav__link--active":""; ?>">
        <i class="material-icons nav__icon">campaign</i>
        <span class="nav__text">EVENTS</span>
    </a>
    <a href="<?php echo $base_url; ?>/favourites.php"
        class="nav__link <?= (basename($_SERVER['PHP_SELF'])=="favourites.php")?"nav__link--active":""; ?>">
        <i class="material-icons nav__icon">article</i>
        <span class="nav__text">REGISTRATIONS</span>
    </a>


    <a href="<?php echo $base_url; ?>/<?php if(!$auth){echo 'login-page';}else{echo 'profile';} ?>"
        class="nav__link <?= (basename($_SERVER['PHP_SELF'])=="profile.php")?"nav__link--active":""; ?>">
        <i class="material-icons nav__icon">person</i>
        <?php if(!$auth){echo ' <span class="nav__text">LOGIN</span>';}else{echo ' <span class="nav__text">PROFILE</span>';} ?>

    </a>
</nav>