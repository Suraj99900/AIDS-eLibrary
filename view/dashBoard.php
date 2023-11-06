<?php
// include header section of template
include_once "./CDN_Header.php";
include_once "./leftBar.php";

$bIsLogin = $_SESSION['is_login'] ? $_SESSION['is_login'] : false;
if (!$bIsLogin) {
    header("Location: loginScreen.php", true, 301);
    exit;
}
?>

<!-- main Content start -->
<div class="main-content">
    <section class="dashboard section">
        <div class="container">
            <!-- Dashboard Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Dashboard</h2>
                </div>
            </div>

            <table>
                <thead>
                    <div class="row action button-operation">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <li>
                                <h4>Staff Managment</h4>
                            </li>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <li>
                                <h4>Student Managment</h4>
                            </li>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <li>
                                <h4>Book/Notes List</h4>
                            </li>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <li>
                                <h4>Book Issused</h4>
                            </li>
                        </div>
                    </div>
                    <div class="data-with-body">

                    </div>
                </thead>
            </table>

        </div>
    </section>

</div>
<!-- main Content end-->




<!-- style switcher start -->
<div class="style-switcher">
    <div class="style-switcher-toggler s-icon">
        <i class="fas fa-cog fa-spin"></i>
    </div>
    <div class="day-night s-icon">
        <i class="fas "></i>
    </div>
    <h4>Theme Color</h4>
    <div class="colors">
        <span class="color-1" onclick="setActivityStyle('color-1')"></span>
        <span class="color-2" onclick="setActivityStyle('color-2')"></span>
        <span class="color-3" onclick="setActivityStyle('color-3')"></span>
        <span class="color-4" onclick="setActivityStyle('color-4')"></span>
        <span class="color-5" onclick="setActivityStyle('color-5')"></span>
    </div>
</div>

<!-- style switcher end -->

<!-- manu toggler start -->

<div class="toggler-box">
    <div class="toggler-open icon">
        <i class="uil uil-angle-right-b"></i>
    </div>
    <div class="toggler-close icon">
        <i class="uil uil-angle-left-b"></i>
    </div>
</div>

<!-- manu toggler end -->

<!-- include footer section -->
<?php
include_once "./CDN_Footer.php";
?>