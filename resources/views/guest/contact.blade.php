@extends('layouts.master')

@section('title', 'Contact | Online Garden Store, Seeds &amp; Agricultural Products | PhoolPatte.com')

@section('content')

<div class="breadcrumb-area pt-10 pb-10 border-bottom">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--=======  breadcrumb content  =======-->

                <div class="breadcrumb-content">
                    <ul>
                        <li class="has-child"><a href="index.php">Home</a></li>
                        <li>Contact</li>
                    </ul>
                </div>

                <!--=======  End of breadcrumb content  =======-->
            </div>
        </div>
    </div>
</div>

<div class="page-section">
    <div class="google-map-container mb-45">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d359054.49602641637!2d73.04695273452354!3d19.03310136721277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1712752424583!5m2!1sen!2sin" width="1518" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1 col-md-12 mb-sm-45 order-1 order-lg-2 mb-md-45">
                <!--=======  contact page side content  =======-->

                <div class="contact-page-side-content">
                    <h3 class="contact-page-title">Contact Us</h3>
                    <p class="contact-page-message mb-30">"Your Personal Plant Care" is an innovative e-commerce platform that bridges the gap between urban living and our innate longing for nature. This project offers a diverse collection of indoor plants, fostering both the aesthetic and health-enhancing qualities they bring to living spaces. Beyond a mere marketplace, it serves as an educational hub, empowering individuals with the knowledge and guidance needed to care for their green companions. Advocating for the indispensable role of plants in every household, this project raises awareness about the transformative power of greenery, promoting a holistic approach to green living in our fast-paced urban world.
.</p>
                    <!--=======  single contact block  =======-->

                    <div class="single-contact-block">
                        <h4><i class="fa fa-fax"></i> Address</h4>
                        <p>Mumbai, Maharashtra, 410206</p>
                    </div>

                    <!--=======  End of single contact block  =======-->

                    <!--=======  single contact block  =======-->

                    <div class="single-contact-block">
                        <h4><i class="fa fa-phone"></i> Phone</h4>
                        <p>Mobile: +91 90825 32455</p>
                    </div>

                    <!--=======  End of single contact block  =======-->

                    <!--=======  single contact block  =======-->

                    <div class="single-contact-block">
                        <h4><i class="fa fa-envelope-o"></i> Email</h4>
                        <p>phoolpatte@gmail.com</p>
                        <p>support@phoolpatte.com</p>
                    </div>

                    <!--=======  End of single contact block  =======-->
                </div>

                <!--=======  End of contact page side content  =======-->

            </div>
            <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                <div class="contact-form-content">
                    <h3 class="contact-page-title">Tell Us Your Message</h3>

                    <div class="contact-form">
                        <form id="contact-form" action="{{ route('contact.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Your Name <span class="required">*</span></label>
                                <input type="text" name="name" id="customername" required>
                            </div>
                            <div class="form-group">
                                <label>Your Email <span class="required">*</span></label>
                                <input type="email" name="email" id="customerEmail" required>
                            </div>
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" name="subject" id="contactSubject">
                            </div>
                            <div class="form-group">
                                <label>Your Message</label>
                                <textarea name="message" id="contactMessage"></textarea>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" value="submit" id="submit" class="theme-button contact-button"
                                    name="submit">Send</button>
                            </div>
                        </form>
                    </div>
                    <p class="form-messege pt-10 pb-10 mt-10 mb-10">
                        @if(session('success'))
                        <div class="alert alert-success mt-5">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger mt-5">
                            {{ session('error') }}
                        </div>
                    @endif
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>



@endsection