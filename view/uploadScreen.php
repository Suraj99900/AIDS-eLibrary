<?php
// include header section of template
include_once "./CDN_Header.php";
include_once "./leftBar.php";
?>



    <!-- main Content start -->
    <div class="main-content">




        <!-- home section start -->
        <section class="upload section " id="upload">
            <div class="container">

                <!-- upload Section form  start-->
                <div class="row">
                    <div class="section-title padd-15">
                        <h2>Upload</h2>
                    </div>
                </div>

                <h3 class="contact-title padd-15">AIDS STAFF UPLOAD SECTION</h3>
                <div class="upload-btn-section shadow p-3 mb-5 bg-body rounded flex">
                    <div class="row p-2">
                        <div class="card m-2" style="width: 18rem;">
                            <img src="../res/img/upload2.svg" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-5">Upload Books</h5>
                                <a href="uploadBook.php" class="btn btn-primary">Upload</a>
                            </div>
                        </div>
                        <div class="card m-2" style="width: 18rem;">
                            <img src="../res/img/upload1.png" class="card-img-top mt-5" alt="...">
                            <div class="card-body flot-bottom text-center">
                                <h5 class="card-title mb-5">Upload Notes</h5>
                                <a href="./uploadNotes.php" class="btn btn-primary">Upload</a>
                            </div>
                        </div>
                        <div class="card m-2" style="width: 18rem;">
                            <img src="../res/img/upload3.svg" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title mb-5">Upload Assignment</h5>
                                <a href="./uploadAssignment.php" class="btn btn-primary">Upload</a>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </section>
        <!-- home section end -->


    </div>

    <!-- main Content end-->

    </div>

<!-- main container end  -->

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