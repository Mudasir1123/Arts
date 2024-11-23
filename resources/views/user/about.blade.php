@extends('user.layout')


@section('content')

  <!-- Breadcrumb Section Begin -->
  <section class="breadcrumb-section set-bg" data-setbg="img/about.jpg" style="width: 100%; height: 430px;">
</section>
<!-- Breadcrumb Section End -->

<section class="about-us-area mt-5">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-12 col-lg-5">
                <div class="section-heading">
                    <h2>ABOUT US</h2>
                    <p>Your trusted partner in arts and crafts creations.</p>
                </div>
                <p>At Arts & Crafts, we believe in the arts products. We provide high-quality materials and tutorials to help individuals explore their artistic potential, whether it's through painting, knitting, pottery, or other creative endeavors.</p>

                <!-- Progress Bar Content Area -->
                <div class="alazea-progress-bar mb-50">
                    <div class="single_progress_bar">
                        <p>DIY Projects</p>
                        <div id="bar1" class="barfiller">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="75"></span>
                        </div>
                    </div>

                    <div class="single_progress_bar">
                        <p>Painting & Drawing</p>
                        <div id="bar2" class="barfiller">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="65"></span>
                        </div>
                    </div>

                    <div class="single_progress_bar">
                        <p>Crafting Workshops</p>
                        <div id="bar3" class="barfiller">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                                <span class="fill" data-percentage="90"></span>
                            </div>
                    </div>

                    <div class="single_progress_bar">
                        <p>Upcycled Crafts</p>
                        <div id="bar4" class="barfiller">
                            <div class="tipWrap">
                                <span class="tip"></span>
                            </div>
                            <span class="fill" data-percentage="80"></span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="alazea-benefits-area">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <div class="single-benefits-area">
                                <img src="uploads/categories/1731137721.jpg" alt="Description of Image" width="90" height="auto">
                                <h5>High-Quality Materials</h5>
                                <p>We provide premium crafting materials to ensure your projects turn out beautifully.</p>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="single-benefits-area">
                                <img src="uploads/categories/1731166360.jpg" alt="Description of Image" width="100" height="auto">
                                <h5>Expert Crafting Advice</h5>
                                <p>Our team of experts is always available to offer tips, tutorials, and advice for your crafts.</p>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="single-benefits-area">
                                <img src="uploads/categories/1731211231.jpg" alt="Description of Image" width="90" height="auto">
                                <h5>Creative Freedom</h5>
                                <p>We encourage all creators to explore their own unique artistic expression, with endless possibilities.</p>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6">
                            <div class="single-benefits-area">
                                <img src="uploads/categories/1731395730.jpg" alt="Description of Image" width="90" height="auto">
                                <h5>Sustainably Sourced</h5>
                                <p>We prioritize eco-friendly materials that promote sustainable crafting practices.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="border-line"></div>
            </div>
        </div>
    </div>
</section>

<section class="our-services-area bg-gray section-padding-100-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>OUR SERVICES</h2>
                    <p>Explore our range of crafting services to inspire your next masterpiece.</p>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <!-- Services Content Column -->
            <div class="col-12 col-lg-6">
                <div class="alazea-service-area mb-100">
                    <div class="single-service-area d-flex align-items-center">
                        <div class="service-icon mr-30">
                            <!-- Optionally add an icon here -->
                        </div>
                        <div class="service-content">
                            <h5>Craft Workshops</h5>
                            <p>We offer hands-on workshops to help you develop your skills in various crafts, from knitting to pottery.</p>
                        </div>
                    </div>
                    <div class="single-service-area d-flex align-items-center">
                        <div class="service-icon mr-30">
                            <!-- Optionally add an icon here -->
                        </div>
                        <div class="service-content">
                            <h5>Personalized Crafting Supplies</h5>
                            <p>Get personalized crafting kits, including all the materials and tools you need to complete your projects.</p>
                        </div>
                    </div>
                    <div class="single-service-area d-flex align-items-center">
                        <div class="service-icon mr-30">
                        </div>
                        <div class="service-content">
                            <h5>Crafting Consultations</h5>
                            <p>Our experts are available for one-on-one consultations to guide you through your creative process.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Image Column -->
            <div class="col-12 col-lg-6">
                <div class="alazea-image-area mb-100">
                    <!-- Replace with your desired image -->
                    <img src="uploads/categories/side.jpg" alt="Description of Image" width="100%" height="400">
                </div>
            </div>
        </div>
    </div>
</section>


@endsection