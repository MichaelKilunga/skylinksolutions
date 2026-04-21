@extends('layouts.app')

@section('content')
<section id="page-banner" class="pt-20 pb-20 bg_cover" data-overlay="8" style="background-image: url({{ asset('images/assets/offics.jpg') }})">
        <div class="container" >
            <div class="row" >
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h3 style="color: white;">o-Services</h3>
                    </div> 
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <section id="teachers-singel" class="pt-70 pb-120 gray-bg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="teachers-left mt-50">
                        <div class="name">
                            <h6>o-Services</h6>
                        </div>
                        <div class="description">
                            <p style="text-align:justify">An online service is a service and information provided to users with the help of the Internet. The services allow the users to communicate with each other by sharing data in various forms like audio, video, documents, etc. The online services range from small to large services.<br>Our services are comprehensive in helping our valued clients to enhance connectivity, access to trade and public services through automation that drives digital transformation
                            .</p>
                        </div>
                    </div> <!-- teachers left -->
                    <div class="teachers-left mt-50">
                       <!--  <div class="name">
                            <h6>o-Services</h6>
                        </div> -->
                        <div class="description">
                            <p style="text-align:justify">
                            therefore, we draw our team from years of exposure and experience in ICT Remote support and maintenance, server management. Every project is run through a line of experts each of whom specializes in a certain area giving you the most elaborate system you would imagine. All our systems are also tested to our clients’ satisfaction.</p>
                        </div>
                    </div> <!-- teachers left -->
                </div>

                <div class="col-lg-8">
                    <div class="teachers-right mt-50">
                        <ul class="nav nav-justified" id="myTab" role="tablist">           
                            <li class="nav-item">
                                <a id="courses-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="courses" aria-selected="false">Our o-Service</a>
                            </li>
                        </ul> <!-- nav -->
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                <div class="dashboard-cont">

                                      <div class="singel-dashboard pt-40">
                                        <h5>Antivirus Installation and Updates</h5>
                                        <p> antivirus software
                                        <div class="thum">
                                        <img src="{{ asset('images/assets/download.jpeg') }}" alt="Blog" style="width: auto; height: 100px;">
                                        </div>If you don’t already have antivirus software on your computer for device protection, it should be a high priority to install some.
                                    </p>
                                    </div> <!-- singel dashboard -->

                                      <div class="singel-dashboard pt-40">
                                        <h5>Window Installation and Updates</h5>
                                        <p>What are Windows updates, and why do I need them?<br>
                                           <div class="thum">
                                        <img src="{{ asset('images/assets/windowupdates.png') }}" alt="Blog" style="width: auto; height: 100px;">
                                        </div>
                                            Windows updates are essential software patches released by Microsoft to improve your operating system's security, performance, and functionality. You need them to keep your computer safe from vulnerabilities and ensure it runs smoothly.
                                        </p>
                                    </div> <!-- singel dashboard -->

                                    <div class="singel-dashboard pt-40">
                                        <h5>Software Application Setups and Activations</h5>
                                        <p>The resources you need, when you need them.<br>
                                        <div class="thum">
                                        <img src="{{ asset('images/assets/activation.png') }}" alt="Blog" style="width: 200px; height: 100px;">
                                        </div>
                                         In the realm of digital licensing, activation software plays a pivotal role in ensuring that your software experience is genuine and secure.
                                        </p>
                                    </div> <!-- singel dashboard -->
                                 
                                    <div class="singel-dashboard pt-40">
                                        <h5>Data Backup Setups</h5>
                                        <p>How To Back Up Your Company’s Data: From Prevention to Recovery<br>
                                             <div class="thum">
                                               <img src="{{ asset('images/assets/backup.jpeg') }}" alt="Blog" style="width: 200px; height: 100px;">
                                        </div>
                                        In today's digital age, data is the lifeblood of businesses. Losing critical data can have severe consequences, including financial loss, damaged reputation, and operational disruptions
                                        </p>
                                    </div> <!-- singel dashboard -->
                                </div> <!-- dashboard cont -->
                            </div>
          </div> <!-- row -->
        </div> <!-- container -->
    </section>

  

@endsection
