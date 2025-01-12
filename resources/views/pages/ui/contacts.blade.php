<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
<head>
    <title>Contacts</title>
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <link rel="icon" href="{{ url('frontend/images/favicon.icon') }}" type="image/x-icon">
    <!-- Stylesheets-->
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Roboto:100,300,300i,400,500,600,700,900%7CRaleway:500">
    <link rel="stylesheet" href="{{ url('frontend/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ url('frontend/css/style.css') }}">
    <!--[if lt IE 10]>
    <div style="background: #212121; padding: 10px 0; box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3); clear: both; text-align:center; position: relative; z-index:1;">
        <a href="http://windows.microsoft.com/en-US/internet-explorer/">
            <img src="{{ url('frontend/images/ie8-panel/warning_bar_0000_us.jpg') }}" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today.">
        </a>
    </div>
    <script src="{{ url('js/html5shiv.min.js') }}"></script>
    <![endif]-->
</head>
<body>
    <div class="preloader">
        <div class="wrapper-triangle">
            <div class="pen">
                <div class="line-triangle">
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                </div>
                <div class="line-triangle">
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                </div>
                <div class="line-triangle">
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                    <div class="triangle"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="page">
        
        <header class="section page-header">
            <!-- RD Navbar -->
            <div class="rd-navbar-wrap">
                <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar -static" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="56px" data-xl-stick-up-offset="56px" data-xxl-stick-up-offset="56px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
                    <div class="rd-navbar-inner-outer">
                        <div class="rd-navbar-inner">
                            <!-- RD Navbar Panel -->
                            <div class="rd-navbar-panel">
                                <!-- RD Navbar Toggle -->
                                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                                <!-- RD Navbar Brand -->
                                <div class="rd-navbar-brand"><a class="brand" href="home"><img class="brand-logo-dark" src="{{ url('frontend/images/logo1.png') }}" alt="" width="198" height="66"/></a></div>
                            </div>
                            <div class="rd-navbar-right rd-navbar-nav-wrap">
                                <div class="rd-navbar-aside">
                                    <ul class="rd-navbar-contacts-2">
                                        <li>
                                            <div class="unit unit-spacing-xs">
                                                <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                                                <div class="unit-body"><a class="phone" href="tel:#">+1 718-999-3939</a></div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="unit unit-spacing-xs">
                                                <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                                                <div class="unit-body"><a class="address" href="#">514 S. Magnolia St. Orlando, FL 32806</a></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="list-share-2">
                                        <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                                        <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                                        <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                                        <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                                    </ul>
                                </div>
                                <div class="rd-navbar-main">
                                    <!-- RD Navbar Nav -->
                                    <ul class="rd-navbar-nav">
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="home">Home</a></li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="restaurants">Restaurants</a></li>
                                        <li class="rd-nav-item"><a class="rd-nav-link" href="about">About us</a></li>
                                        <li class="rd-nav-item active"><a class="rd-nav-link" href="contacts">Contacts</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- Breadcrumbs -->
        <section class="bg-gray-7">
            <div class="breadcrumbs-custom box-transform-wrap context-dark">
                <div class="container">
                    <h3 class="breadcrumbs-custom-title">Contacts</h3>
                    <div class="breadcrumbs-custom-decor"></div>
                </div>
                <div class="box-transform" style="background-image: url(frontend/images/contact.png);" ></div>
            </div>
            <div class="container">
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/home">Home</a></li>
                    <li class="active">Contacts</li>
                </ul>
            </div>
        </section>
        <!-- Contacts -->
        <section class="section section-lg bg-default text-md-left">
            <div class="container">
                <div class="row row-60 justify-content-center">
                    <div class="col-lg-8">
                        <h4 class="text-spacing-25 text-transform-none">Get in Touch</h4>
                        <form class="rd-form rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="{{ route('send-email') }}" onsubmit="return validateForm()">
    @csrf
    <div class="row row-20 gutters-20">
        <div class="col-md-6">
            <div class="form-wrap">
                <input class="form-input" id="contact-your-name-5" type="text" name="name" required>
                <label class="form-label" for="contact-your-name-5">Your Name*</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-wrap">
                <input class="form-input" id="contact-email-5" type="email" name="email" required>
                <label class="form-label" for="contact-email-5">Your E-mail*</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-wrap">
                <select class="form-input" name="service" data-minimum-results-for-search="Infinity" required>
                    <option value="1">Select a Service*</option>
                    <option value="2">Technical Support</option>
                    <option value="3">Business Inquiries</option>
                    <option value="4">Other</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-wrap">
                <input class="form-input" id="contact-phone-5" type="text" name="phone" pattern="^\d+$" required>
                <label class="form-label" for="contact-phone-5">Your Phone*</label>
            </div>
        </div>
        <div class="col-12">
            <div class="form-wrap">
                <label class="form-label" for="contact-message-5">Message*</label>
                <textarea class="form-input textarea-lg" id="contact-message-5" name="message" required></textarea>
            </div>
        </div>
    </div>
    <button class="button button-secondary button-winona" type="submit">Contact us</button>
</form>

<script>
    function validateForm() {
        var name = document.getElementById('contact-your-name-5').value;
        var email = document.getElementById('contact-email-5').value;
        var phone = document.getElementById('contact-phone-5').value;
        var message = document.getElementById('contact-message-5').value;

        if (!name || !email || !phone || !message) {
            alert("Please fill in all fields.");
            return false;
        }

        // Check for valid email format
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!emailPattern.test(email)) {
            alert("Please enter a valid email address.");
            return false;
        }

        // Ensure phone number is only numbers
        var phonePattern = /^\d+$/;
        if (!phonePattern.test(phone)) {
            alert("Phone number must contain only numbers.");
            return false;
        }

        return true;
    }
</script>

                    </div>
                    <div class="col-lg-4">
                        <div class="aside-contacts">
                            <div class="row row-30">
                                <div class="col-sm-6 col-lg-12 aside-contacts-item">
                                    <p class="aside-contacts-title">Get social</p>
                                    <ul class="list-inline contacts-social-list list-inline-sm">
                                        <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                                        <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                                        <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                                        <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 col-lg-12 aside-contacts-item">
                                    <p class="aside-contacts-title">Phone</p>
                                    <div class="unit unit-spacing-xs justify-content-center justify-content-md-start">
                                        <div class="unit-left"><span class="icon mdi mdi-phone"></span></div>
                                        <div class="unit-body"><a class="phone" href="tel:#">1-800-1234-567</a></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-12 aside-contacts-item">
                                    <p class="aside-contacts-title">E-mail</p>
                                    <div class="unit unit-spacing-xs justify-content-center justify-content-md-start">
                                        <div class="unit-left"><span class="icon mdi mdi-email-outline"></span></div>
                                        <div class="unit-body"><a class="mail" href="mailto:#">contact.rcln@gmail.com</a></div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-12 aside-contacts-item">
                                    <p class="aside-contacts-title">Address</p>
                                    <div class="unit unit-spacing-xs justify-content-center justify-content-md-start">
                                        <div class="unit-left"><span class="icon mdi mdi-map-marker"></span></div>
                                        <div class="unit-body"><a class="address" href="#">6036 Richmond hwy., <br class="d-md-none">Alexandria, VA, 2230</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Page Footer -->
        <footer class="section footer-modern context-dark footer-modern-2">
            <div class="footer-modern-line-2">
                <div class="container">
                    <div class="row row-30 align-items-center">
                        <div class="col-sm-6 col-md-7 col-lg-4 col-xl-4">
                            <div class="row row-30 align-items-center text-lg-center">
                                <div class="col-md-7 col-xl-6"><a class="brand" href="home"><img src="{{ url('frontend/images/logo22.png') }}" alt="" width="198" height="66"/></a></div>
                                <div class="col-md-5 col-xl-6">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-8 col-xl-8 oh-desktop">
                            <div class="group-xmd group-sm-justify">
                                <div class="footer-modern-contacts wow slideInUp">
                                    <div class="unit unit-spacing-sm align-items-center">
                                        <div class="unit-left"><span class="icon icon-24 mdi mdi-phone"></span></div>
                                        <div class="unit-body"><a class="phone" href="tel:#">+1 718-999-3939</a></div>
                                    </div>
                                </div>
                                <div class="footer-modern-contacts wow slideInDown">
                                    <div class="unit unit-spacing-sm align-items-center">
                                        <div class="unit-left"><span class="icon mdi mdi-email"></span></div>
                                        <div class="unit-body"><a class="mail" href="mailto:#">contact.rcln@gmail.com</a></div>
                                    </div>
                                </div>
                                <div class="wow slideInRight">
                                    <ul class="list-inline footer-social-list footer-social-list-2 footer-social-list-3">
                                        <li><a class="icon mdi mdi-facebook" href="#"></a></li>
                                        <li><a class="icon mdi mdi-twitter" href="#"></a></li>
                                        <li><a class="icon mdi mdi-instagram" href="#"></a></li>
                                        <li><a class="icon mdi mdi-google-plus" href="#"></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-modern-line-3">
                <div class="container">
                    <div class="row row-10 justify-content-between">
                        <div class="col-md-6"><span>Rida, Carl, Lynn, Noura</span></div>
                        <div class="col-md-auto">
                            <!-- Rights-->
                            <p class="rights"><span>&copy;&nbsp;</span><span>2025</span><span></span><span>.&nbsp;</span><span>All Rights Reserved.</span><span> Design&nbsp;by&nbsp;RCLN Group</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <!-- Global Mailform Output -->
    <div class="snackbars" id="form-output-global"></div>
    <!-- Javascript -->
    <script src="{{ url('frontend/js/core.min.js') }}"></script>
    <script src="{{ url('frontend/js/script.js') }}"></script>
</body>
</html>