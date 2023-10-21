<?php
// include header section of template
include_once "./CDN_Header.php";
include_once "./leftBar.php";
?>



<!-- main Content start -->
<div class="main-content">
    <section class="upload-book section">

        <div class="container">

            <!-- upload book section start -->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Upload Book</h2>
                </div>
            </div>
            <!-- upload book section end -->

            <div class="shadow-lg p-5 mb-5 bg-body rounded">
                <form>
                    <div class="row align-items-center p-3">
                        <div class="col">
                            <label for="BookName" class="form-label"><i class="fa-solid fa-signature"></i> Book Name</label>
                            <input type="text" class="form-control custom-control" id="bookNameId" name="bookname" placeholder="Enter Book Name">
                        </div>
                        <div class="col">
                            <label for="BookISBN" class="form-label"><i class="fa-solid fa-hashtag"></i> ISBN</label>
                            <input type="number" class="form-control custom-control" id="bookISBNId" name="bookisbn" placeholder="Enter Book ISBN Number">

                        </div>
                        <div class="col">
                            <label for="sem" class="form-label"><i class="fa-solid fa-hashtag"></i>Semester</label>
                            <input type="number" class="form-control custom-control" id="semesterId" name="semester" placeholder="Enter Semester">
                        </div>
                    </div>
                    <div class="row align-items-center p-3">
                        <div class="col">
                            <label for="BookDescription" class="form-label"><i class="fa-solid fa-quote-left"></i> Book Description</label>
                            <textarea name="bookdescription" class="form-control" placeholder="Enter Book Description" id="bookDescriptionId" cols="30" rows="10"></textarea>
                        </div>
                        <div class="col">
                            <label for="selectBook" class="form-label"><i class="fa-solid fa-file-arrow-up"></i> Select Book </label>
                            <input type="file" class="form-control custom-control btn btn-primary" id="bookFileId" name="bookFile">
                        </div>
                    </div>

                    <div class="flex search-btn mt-5">
                        <button type="submit" class="btn search">Submit</button>
                    </div>
                </form>
            </div>
        </div>



    </section>

    <!-- book search form  end-->


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