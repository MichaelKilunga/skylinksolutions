<!--====== FOOTER PART START ======-->
<style>
    /* Premium Compact Footer Styling */
    #footer-part {
        background: linear-gradient(180deg, #0f172a 0%, #020617 100%);
        color: #cbd5e1;
        font-family: 'Inter', sans-serif;
        position: relative;
        overflow: hidden;
    }

    #footer-part::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 3px;
        background: linear-gradient(90deg, #3b82f6, #8b5cf6, #ec4899);
    }

    .footer-top {
        padding: 50px 0 20px;
    }

    .footer-about p {
        color: #94a3b8;
        line-height: 1.6;
        font-size: 14px;
        margin-top: 15px !important;
        text-align: justify;
    }

    .footer-title h6 {
        color: #ffffff;
        font-size: 16px;
        font-weight: 600;
        margin-bottom: 20px;
        position: relative;
        display: inline-block;
        padding-bottom: 8px;
    }

    .footer-title h6::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: 0;
        width: 30px;
        height: 2px;
        background-color: #3b82f6;
        border-radius: 2px;
        transition: width 0.3s ease;
    }

    .footer-link:hover .footer-title h6::after,
    .footer-address:hover .footer-title h6::after {
        width: 50px;
    }

    .footer-link ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-link ul li {
        margin-bottom: 10px;
    }

    .footer-link ul li a {
        color: #94a3b8;
        font-size: 14px;
        text-decoration: none;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
    }

    .footer-link ul li a i {
        margin-right: 8px;
        font-size: 12px;
        transition: transform 0.3s ease;
    }

    .footer-link ul li a:hover {
        color: #60a5fa;
        transform: translateX(5px);
    }

    .footer-link ul li a:hover i {
        color: #60a5fa;
    }

    .footer-address ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer-address ul li {
        display: flex;
        margin-bottom: 15px;
        align-items: flex-start;
    }

    .footer-address .icon {
        width: 32px !important;
        height: 32px !important;
        color: #60a5fa !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        margin-right: 12px !important;
        font-size: 14px !important;
        flex-shrink: 0 !important;
        transition: all 0.3s ease;
        padding: 0 !important;
    }

    .footer-address .icon i {
        margin: 0 !important;
        padding: 0 !important;
        line-height: 1 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    .footer-address ul li:hover .icon {
        color: #ffffff !important;
        transform: translateY(-2px);
    }

    .footer-address .cont p {
        color: #94a3b8;
        margin: 0;
        line-height: 1.5;
        font-size: 14px;
    }

    .footer-about .social {
        display: flex;
        gap: 12px;
        padding: 0;
        list-style: none;
        margin-top: 15px !important;
    }

    .footer-about .social li a {
        width: 36px;
        height: 36px;
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.05);
        color: #cbd5e1;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 14px;
        transition: all 0.3s ease;
    }

    .footer-about .social li a:hover {
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        border-color: transparent;
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(59, 130, 246, 0.4);
        color: #ffffff;
    }

    .footer-copyright {
        border-top: 1px solid rgba(255, 255, 255, 0.05);
        padding: 15px 0;
    }

    .copyright-content p {
        margin: 0;
        color: #64748b;
        font-size: 13px;
    }

    .copyright-content a {
        color: #94a3b8;
        text-decoration: none;
        transition: color 0.3s ease;
        font-weight: 500;
    }

    .copyright-content a:hover {
        color: #60a5fa;
    }

    .back-to-top {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, #3b82f6, #8b5cf6);
        color: #ffffff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        text-decoration: none;
        box-shadow: 0 4px 10px rgba(59, 130, 246, 0.3);
        transition: all 0.3s ease;
        z-index: 99;
        opacity: 0.9;
    }

    .back-to-top:hover {
        opacity: 1;
        transform: translateY(-3px);
        box-shadow: 0 6px 15px rgba(59, 130, 246, 0.5);
        color: #fff;
    }
</style>

<footer id="footer-part">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 mb-4 mb-lg-0">
                    <div class="footer-about">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('images/assets/logo/logo-01.png') }}" alt="SkyLink Solutions"
                                style="height: 40px; filter: brightness(10);">
                        </a>
                        <p>We're an adroit digital technology company
                            providing excellence digital experience in software development, ICT infrastructure,
                            security and surveillance.</p>
                        <ul class="social">
                            <li><a href="{{ $company_setting->facebook_url ?? '#' }}" target="_blank"><i
                                        class="fa fa-facebook-f"></i></a></li>
                            <li><a href="{{ $company_setting->twitter_url ?? '#' }}"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="{{ $company_setting->linkedin_url ?? '#' }}"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li><a href="{{ $company_setting->youtube_url ?? '#' }}" target="_blank"><i
                                        class="fa fa-youtube"></i></a></li>
                        </ul>
                    </div> <!-- footer logo -->
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 mb-4 mb-lg-0">
                    <div class="footer-link support">
                        <div class="footer-title">
                            <h6>Quick Links</h6>
                        </div>
                        <ul>
                            <li><a href="{{ url('/') }}"><i class="fa fa-angle-right"></i> Home</a></li>
                            <li><a href="{{ url('/about') }}"><i class="fa fa-angle-right"></i> About Us</a></li>
                            <li><a href="{{ url('/volunteer') }}"><i class="fa fa-angle-right"></i> Our Community</a>
                            </li>
                            <li><a href="{{ url('/contact') }}"><i class="fa fa-angle-right"></i> Contact</a></li>
                            <li><a href="{{ url('/news') }}"><i class="fa fa-angle-right"></i> News</a></li>

                        </ul>
                    </div> <!-- footer link -->
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 mb-4 mb-lg-0">
                    <div class="footer-link support">
                        <div class="footer-title">
                            <h6>Our Services</h6>
                        </div>
                        <ul>
                            <li><a href="{{ url('/software-development') }}"><i class="fa fa-angle-right"></i> Software
                                    Development</a></li>
                            <li><a href="{{ url('/networking') }}"><i class="fa fa-angle-right"></i> Networking</a>
                            </li>
                            <li><a href="{{ url('/cctv-camera') }}"><i class="fa fa-angle-right"></i> CCTV Camera</a>
                            </li>
                            <li><a href="{{ url('/electric-fencing') }}"><i class="fa fa-angle-right"></i> Electric
                                    Fencing</a></li>
                            <li><a href="{{ url('/biometry') }}"><i class="fa fa-angle-right"></i> Biometric & Access
                                    Control</a></li>
                        </ul>
                    </div> <!-- footer link -->
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="footer-address">
                        <div class="footer-title">
                            <h6>Contact Us</h6>
                        </div>
                        <ul>
                            <li>
                                <div class="icon"><i class="fa fa-home"></i></div>
                                <div class="cont">
                                    <p>{{ $company_setting->address ?? 'Post Building, Morogoro, Tanzania' }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><i class="fa fa-phone"></i></div>
                                <div class="cont">
                                    <p>{{ $company_setting->phone ?? '+255 (0) 762 725 725' }}</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><i class="fa fa-envelope-o"></i></div>
                                <div class="cont">
                                    <p>{{ $company_setting->email ?? 'info@skylinksolutions.co.tz' }}</p>
                                </div>
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
                    <div
                        class="copyright d-flex flex-column flex-sm-row justify-content-between align-items-center text-center text-sm-left">
                        <div class="copyright-content mb-2 mb-sm-0">
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
