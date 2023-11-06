<?php
include_once "../session.php";
$bIsLogin = $_SESSION['is_login'] ? $_SESSION['is_login'] : false;
$iActive = $_GET['iActive'] ? $_GET['iActive'] : '';
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
            <li><a href="home.php?iActive=1" class="<?php echo ($iActive == 1 ? "active" : "") ?>"><i class="fa fa-home"></i>Home</a></li>
            <?php
            if ($bIsLogin) {
            ?>
                <li><a href="uploadScreen.php?iActive=2" class="<?php echo ($iActive == 2 ? "active" : "") ?>"><i class="fa-solid fa-upload"></i>Upload</a></li>
                <li><a href="manageIssueBook.php?iActive=3" class="<?php echo ($iActive == 3 ? "active" : "") ?>"><i class="fa-solid fa-grip-vertical"></i>Dashboard</a></li>
            <?php } ?>
            <li><a href="studentInfo.php?iActive=4" class="<?php echo ($iActive == 4 ? "active" : "") ?>"><i class="fa-solid fa-circle-info"></i> Student Info</a></li>
            <li><a href="home.php#contact" class="<?php echo ($iActive == 5 ? "active" : "") ?>"><i class="fa fa-comments"></i> Contact</a></li>

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