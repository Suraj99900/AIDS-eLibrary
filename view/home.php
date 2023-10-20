<?php
// include header section of template
include_once "./CDN_Header.php"
?>

<body>

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
                <li><a href="#home" class="active"><i class="fa fa-home"></i>Home</a></li>
                <li><a href="loginScreen.php"><i class="fa-solid fa-upload"></i>Upload</a></li>
                <li><a href="#contact"><i class="fa fa-comments"></i> Contact</a></li>

                <div class="container px-4">
                    <div class="row gx-2">
                        <div class="col mb-3">
                            <a href="#contact" class="btn auth login">Login Staff</a>
                        </div>
                        <div class="col">
                            <a href="#contact" class="btn auth register">Register Staff</a>
                        </div>
                    </div>
                </div>
            </ul>

        </div>
        <!-- aside end -->

        <!-- main Content start -->
        <div class="main-content">
            <!-- home section start -->
            <section class="home section " id="home">
                <div class="container">

                    <!-- book search form  start-->
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>Search Book</h2>
                        </div>
                    </div>
                    <form>
                        <div class="mb-3">
                            <label for="searchBook" class="form-label">Search Book</label>
                            <input type="search" class="form-control custom-control" id="searchBookId" name="searchbook" placeholder="Enter Book Name, ISBN Number ">
                            <div id="seachHelp" class="form-text ml-3">Search book by name , ISBN Number</div>
                        </div>

                        <div class="flex search-btn">
                            <button type="submit" class="btn search">Search</button>
                        </div>
                    </form>

                    <!-- book search form  end-->

                    <!-- Book table By search start -->

                    <div class="searchTableResult">
                    <table id="SearchTableId" class="SearchTableBook compact hover order-column row-border">
                        <thead>
                            <tr>
                                <th>Sr.No</th>
                                <th>Book Name</th>
                                <th>ISBN</th>
                                <th>Uploaded Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>C Proramming</td>
                                <td>I-4589658420</td>
                                <td>10-10-2023</td>
                                <td><button class="btn Sownlaod" id="download_1"><i class="fa-solid fa-circle-arrow-down"></i></button></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>C++ Proramming</td>
                                <td>I-4589658420</td>
                                <td>10-10-2023</td>
                                <td><button class="btn Sownlaod" id="download_1"><i class="fa-solid fa-circle-arrow-down"></i></button></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>C++ Proramming</td>
                                <td>I-4589658420</td>
                                <td>10-10-2023</td>
                                <td><button class="btn Sownlaod" id="download_1"><i class="fa-solid fa-circle-arrow-down"></i></button></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>C++ Proramming</td>
                                <td>I-4589658420</td>
                                <td>10-10-2023</td>
                                <td><button class="btn Sownlaod" id="download_1"><i class="fa-solid fa-circle-arrow-down"></i></button></td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                    <!-- Book table By search end -->




                </div>
            </section>
            <!-- home section end -->



            <!-- FAQ section Start -->

            <section class="faq section " id="faq">
                <div class="container">
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>FAQ</h2>
                        </div>
                    </div>

                    <div class="faq_box ">
                        <div class="row">
                            <div class="faq_img padd-15">
                                <img src="../res/img/faq_1.png" alt="">
                                <div class="faq_img__inner">
                                    <img src="../res/img/faq_2.png">
                                </div>
                            </div>
                            <div class="faq_content padd-15">
                                <div class="faq_items">
                                    <div class="question">
                                        <h3>What Is a Portfolio Website?</h3>
                                        <i class="uil uil-angle-down"></i>
                                    </div>
                                    <div class="answer">
                                        <p>
                                            Simply said, your portfolio website is a portal to showcase the online
                                            portfolio we were mentioning above to the world. It's the vehicle that lets
                                            your individual work be shared on a public platform. A portfolio website is
                                            a unique way to tell your own story, give potential clients basic
                                            information on who you are, allow you to showcase your work, and gives them
                                            a way to contact you.
                                        </p>
                                    </div>
                                </div>
                                <div class="faq_items">
                                    <div class="question">
                                        <h3>Is it easy to learn HTML and CSS ?</h3>
                                        <i class="uil uil-angle-down"></i>
                                    </div>
                                    <div class="answer">
                                        <p>
                                            The foundation of HTML and CSS are not that difficult. You can start getting
                                            comfortable with HTML in a matter of hours. Basic CSS is also not that
                                            difficult, however, CSS can get complicated when trying to build advanced
                                            layouts.
                                        </p>
                                    </div>
                                </div>
                                <div class="faq_items">
                                    <div class="question">
                                        <h3>what is javascript ?</h3>
                                        <i class="uil uil-angle-down"></i>
                                    </div>
                                    <div class="answer">
                                        <p>
                                            JavaScript is a text-based programming language used both on the client-side
                                            and server-side that allows you to make web pages interactive.
                                        </p>
                                    </div>
                                </div>

                                <div class="faq_items">
                                    <div class="question">
                                        <h3>Is JavaScript easier than PHP?</h3>
                                        <i class="uil uil-angle-down"></i>
                                    </div>
                                    <div class="answer">
                                        <p>
                                            While PHP is easier to learn, it is capable of building complete websites.
                                            On the other hand, we have more complex JavaScript, but it is one of the
                                            most popular languages. For front-end development, you should definitely
                                            choose JavaScript as PHP is only for server-side development.
                                        </p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </section>

            <!-- FAQ section end -->




            <!-- Contact section start -->
            <section class="contact section  " id="contact">
                <div class="container">
                    <div class="row">
                        <div class="section-title padd-15">
                            <h2>Contact Me</h2>
                        </div>
                    </div>
                    <h3 class="contact-title padd-15">Have you any Question ?</h3>
                    <h4 class="contact-sub-title padd-15">I'M AT YOUR SERVICES</h4>
                    <div class="row">
                        <!-- contact info item start -->
                        <div class="contact-info-item padd-15">
                            <div class="icon"><i class="fa fa-phone"></i></div>
                            <h4>Call Us On</h4>
                            <p>+91 7387997294</p>
                        </div>
                        <!-- contact info item end -->

                        <!-- contact info item start -->
                        <div class="contact-info-item padd-15">
                            <div class="icon"><i class="fa fa-map-marker-alt"></i></div>
                            <h4>Address</h4>
                            <p> Rayatwari collery chnadrapur , maharashtra</p>
                        </div>
                        <!-- contact info item end -->

                        <!-- contact info item start -->
                        <div class="contact-info-item padd-15">
                            <div class="icon"><i class="fa fa-envelope"></i></div>
                            <h4>Email</h4>
                            <p>jaiswaljesus384@gmail.com</p>
                        </div>
                        <!-- contact info item end -->

                        <!-- contact info item start -->
                        <div class="contact-info-item padd-15">
                            <div class="icon"><i class="fa fa-globe-europe"></i></div>
                            <h4>Website</h4>
                            <p>www.samrtpolys.com</p>
                        </div>
                        <!-- contact info item end -->
                    </div>
                    <h3 class="contact-title padd-15">SEND ME EMAIL</h3>
                    <h4 class="contact-sub-title padd-15">I'M VERY RESPOSIVE TO MESSAGES</h4>

                    <!-- CONTACT FORM -->
                    <div class="row">
                        <div class="contact-form padd-15">
                            <div class="row">
                                <div class="form-item col-6 padd-15">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Name">
                                    </div>
                                </div>

                                <div class="form-item col-6 padd-15">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-item col-12 padd-15">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Subject">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-item col-12 padd-15">
                                    <div class="form-group">
                                        <textarea name="" class="form-control" id="" placeholder="Message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-item col-12 padd-15">
                                    <div class="form-group">
                                        <button type="submit" class="btn"> Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!-- Contact section end -->

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
    <?php include_once "./CDN_Footer.php" ?>