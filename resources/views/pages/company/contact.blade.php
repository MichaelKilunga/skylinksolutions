@extends('layouts.app')

@section('content')
<section id="page-banner" class="pt-20 pb-20 bg_cover" data-overlay="8" style="background-image: url({{ asset('images/assets/offics.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-banner-cont">
                        <h3 style="color: white;">Contact</h3>
                    </div>  <!-- page banner cont -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    <br></br>
    <section>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d32025.304492780353!2d37.70668992509314!3d-6.782833299999985!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185a59b1e6c2cced%3A0xf5a1959f238d0c1a!2sSKYLINK%20SOLUTIONS!5e1!3m2!1ssw!2stz!4v1766754537925!5m2!1ssw!2stz" style="width:100%;height:370px;border: 0;margin-top:-40px;z-index: 11;position: relative;""></iframe>
        <!--<iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d952.9839330100624!2d37.668623269555084!3d-6.827527667978492!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwNDknMzkuMSJTIDM3wrA0MCcwOS40IkU!5e1!3m2!1sen!2stz!4v1766583254472!5m2!1sen!2stz" style="width:100%;height:370px;border: 0;margin-top:-40px;z-index: 11;position: relative;""></iframe>-->
    <!--<iframe class="gmap" style="width:100%;height:370px;border: 0;margin-top:-40px;z-index: 11;position: relative;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.516741846004!2d37.66029797453953!3d-6.8284707667936635!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x185a5d26f8a6a051%3A0x3ab9216fc74bb993!2sCHIEF%20KINGALU%20MARKET%20(Soko%20kuu%20la%20Chifu%20Kingalu)!5e0!3m2!1ssw!2stz!4v1685721998750!5m2!1ssw!2stz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
  </section>
    <section id="contact-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="contact-address mt-30">
                        <ul>
                            <li>
                                   <p><span style="color: firebrick;">Seamless Communication,
                                            Communication 
                                            channel is 24/7 active 
                                            to ensure that every 
                                            query is responded on 
                                            time</span></p>
                                <div class="singel-address">
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p>Post Building, Morogoro</p>
                                    </div>
                                </div> <!-- singel address -->
                            </li>
                            <li>
                                <div class="singel-address">
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <!--<p>+255 (0) 679 925 725</p>-->
                                        <p>+255 (0) 0762 725 725</p>
                                    </div>
                                </div> <!-- singel address -->
                            </li>
                            <li>
                                <div class="singel-address">
                                    <div class="icon">
                                        <i class="fa fa-envelope-o"></i>
                                    </div>
                                    <div class="cont">
                                        <p>info@skylinksolutions.co.tz</p>
                                    
                                    </div>
                                </div> <!-- singel address -->
                            </li>
                        </ul>
                    </div> <!-- contact address -->
                </div>

<?php 
// include_once 'connection.php';

date_default_timezone_set('Africa/Nairobi');
$posted_date = date('Y-m-d').' '.date('H:i:s');

  if (isset($_POST['tuma'])) {
      // code...
     $contact_name = mysqli_real_escape_string($conn, $_POST['contact_name']);
     $subject = mysqli_real_escape_string($conn, $_POST['subject']);
     $phone = mysqli_real_escape_string($conn, $_POST['phone']);
     $text = mysqli_real_escape_string($conn, $_POST['text']);

    $contact ="INSERT INTO `contact`(`contact_name`, `subject`, `phone`, `text`) VALUES ('$contact_name','$subject','$phone','$text')";
     mysqli_query($conn, $contact);

 ?>
<script type="text/javascript">
                  Swal.fire({
                    position: 'top-center',
                    icon: 'success',
                    title: 'Ujumbe umetumwa  kikamilifu.',
                    text: 'Asante!.',
                    showConfirmButton: false,
                    timer: 2100
                        });
                  window.location='contact.php';
                </script>
                  <?php 
                      }

                    ?>
                <div class="col-lg-7">
                    <div class="contact-from mt-30">
                        <div class="section-title">
                            <h5>Contact Us</h5>
                            <!-- <h2>Keep in touch</h2> -->
                        </div> 
                        <!-- section title -->
                        <div class="main-form pt-30">
                            <form  action="" method="post" >
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <input  type="text" name="contact_name" placeholder="Your name" data-error="Name is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- singel form -->
                                    </div>

                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <input name="subject" type="text" placeholder="Subject" data-error="Subject is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- singel form --> 
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <input name="phone" type="text" placeholder="Phone" data-error="Phone is required." required="required">
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- singel form -->
                                    </div>
                                    <div class="col-md-6">
                                        <div class="singel-form form-group">
                                            <textarea name="text" placeholder="Messege" data-error="Please,leave us a message." required="required"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div> <!-- singel form -->
                                    </div>
                                    <!-- <p class="form-message"></p> -->
                                    <div class="col-md-6">
                                        <div class="singel-form">
                                            <button type="submit" name="tuma" value="submit" class="main-btn">Send</button>
                                        </div> <!-- singel form -->
                                    </div> 
                                </div> <!-- row -->
                            </form>
                        </div> <!-- main form -->
                    </div> <!--  contact from -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    



@endsection
