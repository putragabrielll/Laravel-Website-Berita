@extends('front.layouts.dashboard')

<!-- ======= Contact Section ======= -->
<div id="contact" class="contact-area">
    <div class="contact-inner area-padding">
        <div class="contact-overly"></div>
            <div class="container ">
                <div class="row">
                    <div class="mt-5 col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <h2>Contact us</h2>
                        </div>
                    </div>
                </div>
            <div class="row">
                <!-- Start contact icon column -->
                <div class="col-md-4">
                <div class="contact-icon text-center">
                    <div class="single-icon">
                    <i class="bi bi-phone"></i>
                    <p>
                        Call: +1 5589 55488 55<br>
                        <span>Monday-Friday (9am-5pm)</span>
                    </p>
                    </div>
                </div>
                </div>
                <!-- Start contact icon column -->
                <div class="col-md-4">
                <div class="contact-icon text-center">
                    <div class="single-icon">
                    <i class="bi bi-envelope"></i>
                    <p>
                        Email: info@example.com<br>
                        <span>Web: www.example.com</span>
                    </p>
                    </div>
                </div>
                </div>
                <!-- Start contact icon column -->
                <div class="col-md-4">
                <div class="contact-icon text-center">
                    <div class="single-icon">
                    <i class="bi bi-geo-alt"></i>
                    <p>
                        Location: A108 Adam Street<br>
                        <span>NY 535022, USA</span>
                    </p>
                    </div>
                </div>
                </div>
            </div>
            <div class="row">

                <!-- Start Google Map -->
                <div class="col-md-6">
                <!-- Start Map -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15844.062712061646!2d107.5714276!3d-6.888725!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x3d8e52b0bd9e040b!2sKantor%20GMAHK%20Konferens%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1628346751671!5m2!1sid!2sid" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen></iframe>
                <!-- End Map -->
                </div>
                <!-- End Google Map -->

                <!-- Start  contact -->
                <div class="col-md-6">
                    <div class="form contact-form">
                        <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="form-group mt-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="text-center"><button type="submit">Send Message</button></div>
                        </form>
                    </div>
                </div>
                <!-- End Left contact -->
            </div>

        </div>
    </div>
</div><!-- End Contact Section -->