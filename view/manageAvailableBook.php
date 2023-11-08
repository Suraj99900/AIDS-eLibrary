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
    <section class="section ">
        <div class="container">
            <!-- Dashboard Section form  start-->
            <div class="row">
                <div class="section-title padd-15">
                    <h2>Dashboard</h2>
                </div>
            </div>
        </div>
        <div class="dashboard dashboard_container">
            <button id="show__sidebar-btn" class="sidebar__toggle "><i class="fa-solid fa-arrow-right"></i></button>
            <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="fa-solid fa-arrow-left"></i></button>
            <aside>
                <ul>
                    <li>
                        <a href="manageIssueBook.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i class="fa-regular fa-id-card"></i>
                            <h5>Manage Issue Book</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manageReturnBook.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i class="fa-solid fa-arrow-rotate-left"></i>
                            <h5>Manage Return Book</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manageAvailableBook.php?iActive=3" class="shadow-lg p-3 mb-5 rounded active"><i class="fa-solid fa-book-open-reader"></i>
                            <h5>Manage Available Book</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manageStaff.php?iActive=3" class="shadow-lg p-3 mb-5 rounded "><i class="fa-solid fa-user-tie"></i>
                            <h5>Manage Staff</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manageLog.php?iActive=3" class="shadow-lg p-3 mb-5 rounded"><i class="fa-solid fa-tarp"></i>
                            <h5>Manage Log</h5>
                        </a>
                    </li>
                </ul>
            </aside>

            <main>
                <h2 class="text-center"><i class="fa-solid fa-book-open-reader"></i> Manage Available Book</h2>
                <div class="row align-items-center p-3">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <label for="searchBook" class="form-label">Search Book Name/ISBN</label>
                        <input type="search" class="form-control custom-control" id="searchBookByNameISBNId" name="searchbook" placeholder="Enter Book Name/ISBN">
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-4 mt-4 search-btn" style="display: flex; justify-content: right; align-items: flex-end; ">
                        <a class="btn search" id="idSearch">Search</a>
                    </div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th>Sr.no</th>
                            <th>Book Name</th>
                            <th>ISBN No</th>
                            <th>Added Date</th>
                            <th>Added By Staff</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="manageBookById">

                    </tbody>
                </table>
                <div class="row p-2 m-2 right-flex">
                    <div id="paginationContainer" class="pagination col-md col-sm col-lg"></div>
                </div>
            </main>

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

<script src="../controller/manageAvailableBook.js"></script>