<?php
include_once "../session.php";
$bIsLogin = $_SESSION['is_login'] ? $_SESSION['is_login'] : false;
?>

<!-- main container start -->

<div class="main-container">
    <!-- aside start  -->
    <div class="aside">
        <div class="logo">
            <a href="#" style="font-size: 14px;"><span>E</span>-library</a>
        </div>

        <div class="nav-toggler">
            <span></span>
        </div>

        <ul class="nav">
            <li><a href="home.php"><i class="fa fa-home"></i>Home</a></li>
            <?php
            if ($bIsLogin) {
            ?>
                <li><a href="uploadScreen.php"><i class="fa-solid fa-upload"></i>Upload</a></li>
            <?php } ?>
            <li><a href="home.php#contact"><i class="fa fa-comments"></i> Contact</a></li>

            <div class="container px-4">
                <div class="row gx-2">
                    <?php
                    if ($bIsLogin) {
                    ?>
                        <a href="logOut.php" class="btn auth">Log Out</a>
                    <?php } else { ?>
                        <div class="col mb-3">
                            <a href="loginScreen.php" class="btn auth login">Login Staff</a>
                        </div>
                        <div class="col">
                            <a href="registrationForm.php" class="btn auth register">Register Staff</a>
                        </div>
                    <?php  } ?>
                </div>
            </div>
        </ul>

    </div>
    <!-- aside end -->