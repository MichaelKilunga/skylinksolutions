<!--====== FOOTER PART START ======-->
<footer id="footer-part">
    <div class="footer-top pt-40 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="footer-logo mt-30">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('images/assets/logo/logo-01.png') }}" alt="SkyLink Solutions" style="height: 50px; filter: brightness(10);">
                        </a>
                        <p class="mt-20" style="text-align: justify;">We're an adroit digital technology company providing excellence digital experience in software development, ICT infrastructure, security and surveillance.</p>
                        <ul class="social mt-20">
                            <li><a href="https://www.facebook.com/skylinksolutions" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div> <!-- footer logo -->
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="footer-link mt-30">
                        <div class="footer-title">
                            <h4>Quick Links</h4>
                        </div>
                        <ul>
                            <li><a href="{{ url('/') }}"><i class="fa fa-angle-right"></i> Home</a></li>
                            <li><a href="{{ url('/about') }}"><i class="fa fa-angle-right"></i> About Us</a></li>
                            <li><a href="{{ url('/project') }}"><i class="fa fa-angle-right"></i> Our Projects</a></li>
                            <li><a href="{{ url('/contact') }}"><i class="fa fa-angle-right"></i> Contact</a></li>
                        </ul>
                    </div> <!-- footer link -->
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="footer-link mt-30">
                        <div class="footer-title">
                            <h4>Our Services</h4>
                        </div>
                        <ul>
                            <li><a href="{{ url('/software-development') }}"><i class="fa fa-angle-right"></i> Software Development</a></li>
                            <li><a href="{{ url('/networking') }}"><i class="fa fa-angle-right"></i> Networking</a></li>
                            <li><a href="{{ url('/cctv-camera') }}"><i class="fa fa-angle-right"></i> CCTV Camera</a></li>
                            <li><a href="{{ url('/electric-fencing') }}"><i class="fa fa-angle-right"></i> Electric Fencing</a></li>
                            <li><a href="{{ url('/biometry') }}"><i class="fa fa-angle-right"></i> Biometry / Access Control</a></li>
                            <li><a href="{{ url('/ict-cleaning') }}"><i class="fa fa-angle-right"></i> ICT Cleaning</a></li>
                        </ul>
                    </div> <!-- footer link -->
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="footer-contact mt-30">
                        <div class="footer-title">
                            <h4>Contact Us</h4>
                        </div>
                        <ul>
                            <li>
                                <div class="icon"><i class="fa fa-home"></i></div>
                                <div class="cont"><p>Post Building, Morogoro, Tanzania</p></div>
                            </li>
                            <li>
                                <div class="icon"><i class="fa fa-phone"></i></div>
                                <div class="cont"><p>+255 (0) 762 725 725</p></div>
                            </li>
                            <li>
                                <div class="icon"><i class="fa fa-envelope-o"></i></div>
                                <div class="cont"><p>info@skylinksolutions.co.tz</p></div>
                            </li>
                        </ul>
                    </div> <!-- footer contact -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- footer top -->

    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="copyright d-sm-flex justify-content-between">
                        <div class="copyright-content">
                            <p>&copy; {{ date('Y') }} SkyLink Solutions. All rights reserved.</p>
                        </div> <!-- copyright content -->
                        <div class="copyright-content">
                            <p>Designed by <a href="#">SkyLink Solutions</a></p>
                        </div>
                    </div> <!-- copyright -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- footer copyright -->
</footer>
<!--====== FOOTER PART END ======-->

<!--====== Scroll To Top ======-->
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
