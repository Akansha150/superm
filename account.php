<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
require 'backend/connection.php';
session_start();
if (!isset($_SESSION['logged_in'])) {
    header('location: /index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Super Market an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Registered ::
        w3layouts</title>
    <!-- for-mobile-apps -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design"/>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
        <style>
    .newsletter {
        background: #3c43a4;
        padding: 3em 0;
    }

    .w3agile_newsletter_left h3 {
        font-size: 2em;
        color: #fff;
    }

    .w3agile_newsletter_left p {
        color: #bfbfbf;
        line-height: 1.8em;
        margin-top: .5em;
        font-weight: 100;
    }

    .w3agile_newsletter_right {
        margin-top: 0.8em;
    }

    .w3agile_newsletter_right input[type="email"] {
        outline: none;
        padding: 10px;
        color: #212121;
        font-size: 14px;
        width: 70%;
        background: #fff;
        border: none;
        float: left;
    }

    .w3agile_newsletter_right input[type="submit"] {
        outline: none;
        padding: 9px 0;
        width: 15%;
        background: url(../images/img-sp.png) no-repeat 26px -65px #ff5063;
        border: none;
        -webkit-transition: .5s all;
        -moz-transition: .5s all;
        transition: .5s all;
    }

    .w3agile_newsletter_right input[type="submit"]:hover {
        background-color: #212121;
    }
</style>
    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
    <!-- font-awesome icons -->
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- //font-awesome icons -->
    <!-- js -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script>
        function get_details() {
            var zip = jQuery('#zip').val();
            jQuery.ajax({
                url: 'get.php',
                type: 'post',
                data: 'zip=' + zip,
                success: function (data) {
                    if (data == 'no') {
                        jQuery('#msg').html('Wrong Zipcode');
                        jQuery('#update').prop('disabled', true);
//                        jQuery('#city').val('');
//                        jQuery('#state').val('');
//                        jQuery('#country').val('');

                    } else {
                        jQuery('#msg').html('');
                        var getData = jQuery.parseJSON(data);
                        console.log(getData);
//                        console.log(getData.state);
                        jQuery('#city').val(getData.city);
                        jQuery('#state').val(getData.state);
                        jQuery('#country').val(getData.country);
                        jQuery('#update').prop('disabled', false);

                    }
                }
            });

        }

    </script>

    <!-- //js -->
    <link
        href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic'
        rel='stylesheet' type='text/css'>
    <link
        href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic'
        rel='stylesheet' type='text/css'>
    <!-- start-smoth-scrolling -->
    <script type="text/javascript" src="js/move-top.js"></script>
    <script type="text/javascript" src="js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
            });
        });
        $(document).ready(function () {
            $('#messageBox').delay(4000).fadeOut(function () {
                window.location.href = 'http://supermarket.com/account.php';
            });

        });
        $(document).ready(function () {
            $('#messageBox1').delay(4000).fadeOut(function () {
                window.location.href = 'http://supermarket.com/account.php';
            });

        });

    </script>
    <style>
        #messageBox ,#messageBox1{
            width: 30%;
            position: fixed;
            right: 10px;
            top: 60px;
            padding: 5px;
            background-color: lawngreen;
            border-radius: 5px;
            color: black;
            text-align: center;
            z-index: 5;
        }
    </style>


    <!-- start-smoth-scrolling -->
</head>

<body>

<?php
//pop up
$message = $_GET['message'];
$account = $_GET['account'];

if (isset($message)) { ?>
    <div id="messageBox"><?php echo $message; ?></div>

    <?php
}
?>
<?php

if (isset($account)) { ?>
    <div id="messageBox1"><?php echo $account; ?></div>

    <?php
} ?>
<!-- header -->
<div class="agileits_header">
    <div class="container">
    <div class="w3l_offers">
				<?php
            
				if (isset($_SESSION['logged_in'])){?>
				<a style="color:whitesmoke;background-color: darkorange">Hello <?php echo $_SESSION['name']?> !! Welcome to SuperMarket</a>
				<?php } ?>
				<p>SALE UP TO 70% OFF. USE CODE "SALE70%" . <a href="products.php">SHOP NOW</a></p>
			</div>
        <div class="agile-login">
            <ul>
                
                <li>
                    <?php
                    session_start();
                    if (isset($_SESSION['logged_in'])) {


                        echo '<form action="backend/logout.php" method="post" class="last">';
                        echo "	<fieldset>";
                        echo '	<input type="submit" name="submit" value="Logout" class="button" />';
                        echo '</fieldset>';
                        echo '</form>';
                    }
                    ?>
                </li>
                <li><a href="contact.php">Help</a></li>
                <li><a href="index.php">Home</a></li>


            </ul>
        </div>
        <div class="product_list_header">
            <form action="#" method="post" class="last">
                <input type="hidden" name="cmd" value="_cart">
                <input type="hidden" name="display" value="1">
                <button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down"
                                                                                    aria-hidden="true"></i></button>
            </form>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

<div class="logo_products">
    <div class="container">
        <div class="w3ls_logo_products_left1">
            <ul class="phone_email">
                <li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : (+0123) 234 567</li>

            </ul>
        </div>
        <div class="w3ls_logo_products_left">
            <h1><a href="index.php">super Market</a></h1>
        </div>
        <div class="w3l_search">
            <!--			//search Button-->
            <?php
            if(isset($_GET['keyword']))
            {
                $keyword=$_GET['keyword'];

            }
            else{
                $keyword='';
            }
            ?>
            <form action="search.php?keyword>" method="get">
                <input type="search" name="keyword" minlength="3" maxlength="30" placeholder="Search for a Product..." required="" id="search" value="<?php echo $keyword?>">
                <button type="submit" class="btn btn-default search" aria-label="Left Align" id="searchbtn">
                    <i class="fa fa-search" aria-hidden="true"> </i>
                </button>
                <div class="clearfix"></div>

                <div class="col-md-5" id="titu" style="position: fixed;z-index: 5;width: 21%;margin-top: -1px;margin-left: -16px;">
                    <div class="list-group" id="show-list">

                        <!-- Here autocomplete list will be display -->

                    </div>
                </div>
            </form>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
<!-- //header -->
<!-- navigation -->
<!-- navigation -->
<div class="navigation-agileits">
    <div class="container">
        <nav class="navbar navbar-default">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header nav_2">
                <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php" class="act">Home</a></li>
                    <!-- Mega Menu -->
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Groceries<b class="caret"></b></a>
                        <ul class="dropdown-menu multi-column columns-3">
                            <div class="row">
                                <div class="multi-gd-img">
                                    <ul class="multi-column-dropdown">
                                        <h6>All Groceries</h6>
                                        <li><a href="groceries.php">Dals & Pulses</a></li>
                                        <li><a href="groceries.php">Almonds</a></li>
                                        <li><a href="groceries.php">Cashews</a></li>
                                        <li><a href="groceries.php">Dry Fruit</a></li>
                                        <li><a href="groceries.php"> Mukhwas </a></li>
                                        <li><a href="groceries.php">Rice & Rice Products</a></li>
                                    </ul>
                                </div>

                            </div>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Household<b class="caret"></b></a>
                        <ul class="dropdown-menu multi-column columns-3">
                            <div class="row">
                                <div class="multi-gd-img">
                                    <ul class="multi-column-dropdown">
                                        <h6>All Household</h6>
                                        <li><a href="household.php">Cookware</a></li>
                                        <li><a href="household.php">Dust Pans</a></li>
                                        <li><a href="household.php">Scrubbers</a></li>
                                        <li><a href="household.php">Dust Cloth</a></li>
                                        <li><a href="household.php"> Mops </a></li>
                                        <li><a href="household.php">Kitchenware</a></li>
                                    </ul>
                                </div>


                            </div>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Personal Care<b class="caret"></b></a>
                        <ul class="dropdown-menu multi-column columns-3">
                            <div class="row">
                                <div class="multi-gd-img">
                                    <ul class="multi-column-dropdown">
                                        <h6>Baby Care</h6>
                                        <li><a href="personalcare.php">Baby Soap</a></li>
                                        <li><a href="personalcare.php">Baby Care Accessories</a></li>
                                        <li><a href="personalcare.php">Baby Oil & Shampoos</a></li>
                                        <li><a href="personalcare.php">Baby Creams & Lotion</a></li>
                                        <li><a href="personalcare.php"> Baby Powder</a></li>
                                        <li><a href="personalcare.php">Diapers & Wipes</a></li>
                                    </ul>
                                </div>

                            </div>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Packaged Foods<b class="caret"></b></a>
                        <ul class="dropdown-menu multi-column columns-3">
                            <div class="row">
                                <div class="multi-gd-img">
                                    <ul class="multi-column-dropdown">
                                        <h6>All Accessories</h6>
                                        <li><a href="packagedfoods.php">Baby Food</a></li>
                                        <li><a href="packagedfoods.php">Dessert Items</a></li>
                                        <li><a href="packagedfoods.php">Biscuits</a></li>
                                        <li><a href="packagedfoods.php">Breakfast Cereals</a></li>
                                        <li><a href="packagedfoods.php"> Canned Food </a></li>
                                        <li><a href="packagedfoods.php">Chocolates & Sweets</a></li>
                                    </ul>
                                </div>


                            </div>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Beverages<b class="caret"></b></a>
                        <ul class="dropdown-menu multi-column columns-3">
                            <div class="row">
                                <div class="multi-gd-img">
                                    <ul class="multi-column-dropdown">
                                        <h6>Tea & Coeffe</h6>
                                        <li><a href="beverages.php">Green Tea</a></li>
                                        <li><a href="beverages.php">Ground Coffee</a></li>
                                        <li><a href="beverages.php">Herbal Tea</a></li>
                                        <li><a href="beverages.php">Instant Coffee</a></li>
                                        <li><a href="beverages.php"> Tea </a></li>
                                        <li><a href="beverages.php">Tea Bags</a></li>
                                    </ul>
                                </div>

                            </div>
                        </ul>
                    </li>
                    <li><a href="gourmet.php">Gourmet</a></li>
                    <li><a href="offers.php">Offers</a></li>
                    <li><a href="contact.php">Contact</a></li>

                </ul>
            </div>
        </nav>
    </div>
</div>


            <!-- //navigation -->
            <!-- breadcrumbs -->

            <!-- //breadcrumbs -->
            <!-- register -->


            <div class="register">
                <div class="container">
                    <h2>My Account</h2>
                    <div class="login-form-grids" style="width: 90%">
                        <h5>profile information</h5>
                        <form action="backend/mydata.php" method="post" enctype="multipart/form-data" id="form"><br>
                            <?php


                            if (isset($_SESSION['logged_in'])) {
                                session_start();
                                $id = $_SESSION['id'];
                                $sql = "SELECT * FROM users WHERE UserID='$id' ";
                                $result = mysqli_query($conn, $sql);
                                $result_fetch = mysqli_fetch_assoc($result);



                            }
                            ?>


                            <label>FirstName</label>
                            <input type="text" name="first" placeholder="First Name..." required=" "
                                   value="<?php echo $result_fetch['UserFirstName']; ?>" disabled="true"> <br>
                            <label>LastName</label>
                            <input type="text" name="last" placeholder="Last Name..." disabled="true" required=" "
                                   value="<?php echo $result_fetch['UserLastName']; ?>"><br>
                            <label>Phone</label>
                            <input type="text" name="phone" id="phone" placeholder="Contact Info" disabled="true"
                                   disabled="true" required=" " value="<?php echo $result_fetch['UserPhone']; ?>"><br>
                            <label>Email</label>
                            <input type="email" id="email" name="email" placeholder="Email Address" disabled="true"
                                   required=" " disabled="true" value="<?php echo $result_fetch['UserEmail']; ?>"><br>
                            <label>Fax</label>
                            <input type="text" name="fax" placeholder="Fax" required=" "
                                   value="<?php echo $result_fetch['UserFax']; ?>"><br>
                            <label>Address</label>
                            <input type="text" name="add1" placeholder="Address" required=" "
                                   value="<?php echo $result_fetch['UserAddress']; ?>"><br>
                            <label>Address2</label>
                            <input type="text" name="add2" placeholder="Address2" required=" "
                                   value="<?php echo $result_fetch['UserAddress2']; ?>"><br>
                            <label>ZipCode</label>
                            <input type="text" name="zip" id="zip" placeholder="Zip Code" required=" "
                                   value="<?php echo $result_fetch['UserZip']; ?>">
                            <label id="msg"></label>
                            <br><input type="button" class="btn" value="Get Details" onclick="get_details()"><br>
                            <br><label>City</label>
                            <input type="text" name="city" id="city" placeholder="City" required=" "
                                     value="<?php echo $result_fetch['UserCity']; ?>"><br>
                            <label>State</label>
                            <input type="text" name="state" id="state" placeholder="State" required=" "
                                   value="<?php echo $result_fetch['UserState']; ?>"><br>
                            <label>Country</label>
                            <input type='text' name="country" id="country" placeholder="Country" required=" "
                                    value="<?php echo $result_fetch['UserCountry']; ?>"><br>
                            <input type="submit" name="update" value="Update" id="update">
                            <input type="submit" name="delete" value="Delete Additional Data" id="update"><br>

                        </form>
                    </div>
                    <div class="register-home">
                        <a href="index.php">Home</a>
                    </div>
                </div>
            </div>
</div>

            <!-- //register -->


            <div class="newsletter">
    <div class="container">
        <div class="col-md-6 w3agile_newsletter_left">
            <h3>Newsletter</h3>
            <p>Excepteur sint occaecat cupidatat non proident, sunt.</p>
        </div>
        <div class="col-md-6 w3agile_newsletter_right">
            <form action="newsletter.php" method="post">

                <input type="email" name="Email" placeholder="Email" id="enews"  oninput="checkUsername()
                " required="">
               
                <input type="submit" value="Subscribe" id="snews" />
                
            </form>
            <label id="cnews"></label>
        </div>
        <div class="clearfix"> </div>
    </div>
</div>
    </div>
    </div>

            <div class="footer">
                <div class="container">
                    <div class="w3_footer_grids">
                        <div class="col-md-3 w3_footer_grid">
                            <h3>Contact</h3>

                            <ul class="address">
                                <li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>1234k Avenue, 4th block, <span>New York City.</span></li>
                                <li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:info@example.com">info@example.com</a></li>
                                <li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>+1234 567 567</li>
                            </ul>
                        </div>
                        <div class="col-md-3 w3_footer_grid">
                            <h3>Information</h3>
                            <ul class="info">
                                <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="about.php">About Us</a></li>
                                <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="contact.php">Contact Us</a></li>
                                <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="short-codes.php">Short Codes</a></li>
                                <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="faq.php">FAQ's</a></li>
                                <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="products.php">Special Products</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 w3_footer_grid">
                            <h3>Category</h3>
                            <ul class="info">
                                <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="groceries.php">Groceries</a></li>
                                <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="household.php">Household</a></li>
                                <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="personalcare.php">Personal Care</a></li>
                                <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="packagedfoods.php">Packaged Foods</a></li>
                                <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="beverages.php">Beverages</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3 w3_footer_grid">
                            <h3>Profile</h3>
                            <ul class="info">
                                <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="products.php">Store</a></li>
                                <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="checkout.php">My Cart</a></li>
                                <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="login.php">Login</a></li>
                                <li><i class="fa fa-arrow-right" aria-hidden="true"></i><a href="registered.php">Create Account</a></li>
                            </ul>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>

                <div class="footer-copy">

                    <div class="container">
                        <p>© 2017 Super Market. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
                    </div>
                </div>

            </div>
            <div class="footer-botm">
                <div class="container">
                    <div class="w3layouts-foot">
                        <ul>
                            <li><a href="#" class="w3_agile_facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="agile_twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="w3_agile_dribble"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
                            <li><a href="#" class="w3_agile_vimeo"><i class="fa fa-vimeo" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                    <div class="payment-w3ls">
                        <img src="images/card.png" alt=" " class="img-responsive">
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>

            <!-- //footer -->
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- top-header and slider -->
    <!-- here stars scrolling icon -->
    <script type="text/javascript">
        $(document).ready(function () {
            /*
             var defaults = {
             containerID: 'toTop', // fading element id
             containerHoverID: 'toTopHover', // fading element hover id
             scrollSpeed: 1200,
             easingType: 'linear'
             };
             */

            $().UItoTop({easingType: 'easeOutQuart'});

        });
    </script>
    <!-- //here ends scrolling icon -->
    <script src="js/minicart.min.js"></script>
    <script>
        // Mini Cart
        paypal.minicart.render({
            action: '#'
        });

        if (~window.location.search.indexOf('reset=true')) {
            paypal.minicart.reset();
        }
    </script>
    <!-- main slider-banner -->
    <script src="js/skdslider.min.js"></script>
    <link href="css/skdslider.css" rel="stylesheet">
    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('#demo1').skdslider({
                'delay': 5000,
                'animationSpeed': 2000,
                'showNextPrev': true,
                'showPlayButton': true,
                'autoSlide': true,
                'animationType': 'fading'
            });


            jQuery('#responsive').change(function () {
                $('#responsive_wrapper').width(jQuery(this).val());
            });

        });
        $(document).ready(function () {
            // Send Search Text to the server
            $("#search").keyup(function () {
                let searchText = $(this).val();
                if (searchText != "" && searchText.length > 2) {
                    $.ajax({
                        url: "action.php",
                        method: "post",
                        data: {
                            query: searchText,
                        },
                        success: function (response) {
                            $("#show-list").html(response);
                        },
                    });
                } else {
                    $("#show-list").html("");
                }
            });
            // Set searched text in input field on click of search button
            $(document).on("click", "a", function () {
                $("#search").val($(this).text());
                $("#show-list").html("");
            });
        });

        function checkUsername() {

            jQuery.ajax({
                url: "backend/checkmail.php",
                data:'Email='+$("#enews").val(),
                type: "POST",
                success:function(data){
                    $("#cnews").html(data);
                },
                error:function (){

                }
            });
        }


    </script>


        </body >
        </html >
        
        
