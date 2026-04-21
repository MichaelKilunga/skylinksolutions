@extends('layouts.app')

@section('content')
<section id="page-banner" class="pt-10 pb-10 bg_cover" data-overlay="8" style="background-image: url({{ asset('images/assets/offics.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h2 style="font-size: 30px;">Push SMS</h2>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <section id="about-page" class="pt-70 pb-110">
        <div class="container">
            <div class="row">
                 <div class="col-lg-7">
                    <div class="about-image mt-50">
                        <img src="{{ asset('images/slider/new/pushsms.png') }}" alt="About">
                    </div>  <!-- about imag -->
                </div> 
                <div class="col-lg-5">
                    <div class="section-title mt-50">
                        <h5>Push SMS Services</h5>
                        <h2>What Are Push Messages?</h2>
                    </div> <!-- section title -->
                    <div class="about-cont">
                        <p style="text-align:justify;">Push messages are instant, automated notifications sent directly to a recipient’s 
                        mobile phone or web browser. These messages can be used for alerts, reminders, promotions, and real-time updates,
                        ensuring that your audience receives important information promptly. Unlike emails or traditional SMS, push messages 
                        are highly engaging, cost-effective, and deliverable without requiring users to open an app or check their inbox.</p>
                    </div
                    </hr>
                       <div class="about-cont">
                        <p style="text-align:justify;">In today's fast-paced world, effective communication is key to success. Our Push
                        Messaging Service ensures your business stays connected with your clients, customers, and stakeholders efficiently 
                        and affordably. Whether you're sending important notifications, promotions, or reminders, our service guarantees instant 
                        delivery with minimal cost.</p>
                    </div
                </div> <!-- about cont -->
            </div> <!-- row -->
            
            <div class="row">
           <div class="section-title">
                <!--<h5>Enhance Your Business Processes through Push Messages </h5>-->
                <h2>Enhance Your Business Processes through Push Messages</h2>
            </div>
                </div>
            <div class="about-items pt-10">
                <div class="row justify-content-center">

                    <div class="col-lg-6 col-md-6 col-sm-10">
                        <div class="about-singel-items mt-30">
                            <!-- <span>02</span> -->
                            <h5 style="color: blue;" ><i class="fa fa-users"></i> Boost Customer Engagement</h5>
                            <p style="text-align: justify;">Keep your customers informed with instant notifications about promotions, offers, and updates.</p>
                        </div> <!-- about singel -->
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-10">
                        <div class="about-singel-items mt-30">
                            <!-- <span>03</span> -->
                            <h5 style="color: blue;" ><i class="fa fa-money"></i> Increase Sales & Conversions</h5>
                            <p style="text-align: justify;">Timely messages can drive traffic to your website or physical store.</p>
                        </div> <!-- about singel -->
                    </div>
                         <div class="col-lg-6 col-md-6 col-sm-10">
                        <div class="about-singel-items mt-30">
                            <!-- <span>03</span> -->
                            <h5 style="color: blue;" ><i class="fa fa-angle-down"></i> Improve Customer Service </h5>
                            <p style="text-align: justify;">Use automated alerts to send order confirmations, appointment reminders, and service updates.</p>
                        </div> <!-- about singel -->
                    </div>
                            <div class="col-lg-6 col-md-6 col-sm-10">
                        <div class="about-singel-items mt-30">
                            <!-- <span>03</span> -->
                            <h5 style="color: blue;" ><i class="fa fa-user"></i> Enhance Internal Communication</h5>
                            <p style="text-align: justify;">Quickly notify staff and stakeholders about important company news</p>
                        </div> <!-- about singel -->
                    </div>
                              <div class="col-lg-6 col-md-12 col-sm-10">
                        <div class="about-singel-items mt-30">
                            <!-- <span>03</span> -->
                            <h5 style="color: blue;" ><i class="fa fa-envelope-o"></i> Reduce Costs</h5>
                            <p style="text-align: justify;">A cheaper and more efficient alternative to traditional marketing channels.</p>
                        </div> <!-- about singel -->
                    </div> 
                               <div class="col-lg-6 col-md-12 col-sm-10">
                        <div class="about-singel-items mt-30">
                            <!-- <span>03</span> -->
                            <h4 style="color: blue;" ></h4>
                            <p style="text-align: justify;"></p>
                        </div> <!-- about singel -->
                    </div> 
                    
                    </div>
                </div> <!-- row -->
            </div> <!-- about items -->
        </div> <!-- container -->
    </section>
    <div id="counter-part" class="bg_cover pt-10 pb-10" data-overlay="8" style="background-image: url({{ asset('images/slider/new/team.jpg') }})">
        <h2 style="color: ghostwhite;">SMS Package Rates</h2>
        <div class="container">

            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <h4 style="color: ghostwhite;">0 - 99 SMS</h4>
                        <span><span class="number">Tshs.60/SMS</span></span>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <h4 style="color: ghostwhite;">100 - 499 SMS</h4>
                        <span><span class="number">Tshs.50/SMS</span></span>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                        <h4 style="color: ghostwhite;">500 - 999 SMS</h4>
                        <span><span class="number">Tshs.40/SMS</span></span>
                    </div> <!-- singel counter -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                       <h4 style="color: ghostwhite;">1000 - 499 SMS</h4>
                        <span><span class="number">Tshs.30/SMS</span></span>
                    </div> <!-- singel counter -->
                </div>
                         <div class="col-lg-12 col-sm-6">
                    <div class="singel-counter text-center mt-40">
                       <h4 style="color: ghostwhite;">5000+ SMS</h4>
                        <span><span class="number">Tshs.20/SMS</span></span>
                    </div> <!-- singel counter -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div>
    <section id="teachers-part" class="pt-20 pb-20">
        <div class="container">
            <div class="row">
               <div class="container mt-5">

                </div>
               
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section> 
    </hr>
   


@endsection
