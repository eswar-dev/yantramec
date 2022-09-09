<nav class="navbar navbar-toggleable-sm bg-inverse navbar-inverse fixed-top shadow-sm  bg-white"
    style="background-color:#ffffff !important;border-bottom: 1px red dotted;">
    <div class="p-2 bd-highlight logo-box"><a href="<?php echo $base_url; ?>/index.php"
            style="text-decoration:none;"><img src="assets/images/FILE011.png" width="50" height="50" alt="logo"><img
                src="assets/images/logo3.gif" width="250" height="50" alt="logo"></a></div>
    <div class="p-2 bd-highlight col-md-6 search-box">

    </div>
    <?php
    if (!$auth) {
        echo '<div class="p-2 login-btn bd-highlight"><a href="login-page" class="btn btn-outline-secondary addcart-btn text-center  btn-block ">SignIn</a></div>';
    } else {
        echo '<div class="p-2  login-btn bd-highlight"><a href="profile" class="btn btn-outline-secondary addcart-btn text-center  btn-block">' . $_SESSION['name'] . '</a></div>';
    }
    ?>
</nav>