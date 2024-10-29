<?php
include "koneksi.php";
include "templates/header.php";
?>

<section id="contact" class="contact section light-background" style="padding-top: 200px !important;">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Let's Connect!</h2>
        <p>I’m here to help you. Feel free to reach out for any questions or just to say hi!</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row g-4 g-lg-5">
            <div class="col-lg-5">
                <div class="info-box" data-aos="fade-up" data-aos-delay="200">
                    <h3>Contact Information</h3>
                    <p>Your thoughts and messages mean a lot to me. Here's how you can reach me:</p>
                    <div class="info-item" data-aos="fade-up" data-aos-delay="400">
                        <div class="icon-box">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div class="content">
                            <h4>Phone</h4>
                            <p>+1 123 456 7890</p>
                        </div>
                    </div>
                    <div class="info-item" data-aos="fade-up" data-aos-delay="500">
                        <div class="icon-box">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="content">
                            <h4>Email</h4>
                            <p>hello@yourname.com</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-7">
                <div class="contact-form" data-aos="fade-up" data-aos-delay="300">
                    <h3>Drop Me a Message</h3>
                    <p>I’d love to hear from you! Whether you have a question or just want to chat, feel free to send a message below:</p>
                    <?php if (isset($_GET["isSuccess"])) : ?>
                        <div class="alert alert-success" role="alert">
                            Data <strong>berhasil</strong> dikirim!
                        </div>
                    <?php endif; ?>
                    <form action="form.php" method="post" data-aos="fade-up" data-aos-delay="200">
                        <div class="row gy-4">
                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>
                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                            </div>
                            <div class="col-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Your Message" required></textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Contact Section -->

<?php include "templates/footer.php"; ?>