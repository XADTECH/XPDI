<!-- Top Contact Bar -->
@include('frontend_components.top_nav')
{{-- <link rel="stylesheet" href="{{ asset('frontend_assets/css/courses.css') }}" /> --}}
<!-- Main Navbar -->
@include('frontend_components.nav')

<link rel="stylesheet" href="{{ asset('frontend_assets/css/about.css') }}">
<!--//////////////////////////////       Hero Section //////////////////////////////////////////////// -->
<section class="hero-section d-flex align-items-center justify-content-center text-center text-white">
    <div class="overlay"></div>
    <h1 class="hero-title position-relative">About <b style="color: #37B7CB">XPDI</b>
    </h1>
</section>

<section class="who-we-are-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-12">
                <h2 class="who-we-are-title">Who We Are</h2>
                <p class="who-we-are-text">
                    XPDI is dedicated to making education accessible, practical, and free for everyone.
                    With a growing community of learners, we offer high-quality courses, expert instruction,
                    and recognized certifications — <span class="highlight-text">all at no cost</span>.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="mission-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="mission-image-container">
                    <img src="{{ asset('frontend_assets/images/about/mission.png') }}" alt="Laptop with Learning Icons"
                        class="mission-image">
                </div>
            </div>
            <div class="col-lg-6">
                <h1 class="mission-title">Our Mission</h1>
                <p class="mission-description">
                    Our mission is to empower individuals with the knowledge and skills they need to succeed — no matter
                    their background. We believe learning should be a right, not a privilege, and we're here to break
                    barriers in education.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Milestone section HTML -->
<div class="milestone-section">
    <div class="container">
        <h2 class="milestone-title">Milestones That Matter</h2>

        <div class="milestone-stats">
            <div class="milestone-item">
                <div class="milestone-number">50+</div>
                <div class="milestone-label">Expert Teachers</div>
            </div>

            <div class="divider"></div>

            <div class="milestone-item">
                <div class="milestone-number">54,252</div>
                <div class="milestone-label">Freelancers</div>
            </div>

            <div class="divider"></div>

            <div class="milestone-item">
                <div class="milestone-number">20</div>
                <div class="milestone-label">Courses</div>
            </div>
        </div>
    </div>
</div>

<section class="banner-section mb-5">
    <div class="container">
        <div class="banner-content">
            <h1 class="banner-heading">
                <span class="orange-text">Begin Your</span> <span class="teal-text">Skill-Building</span> <span
                    class="orange-text">Journey</span>
            </h1>
            <p class="banner-description">
                Unlock your potential with free access to practical, in-demand courses. Whether you're just starting out
                or looking to grow your expertise, XPDI offers the tools and support to help you succeed — anytime,
                anywhere.
            </p>
            <a href="{{ url('/register') }}" class="register-button">REGISTER NOW →</a>
        </div>
    </div>
</section>



@include('frontend_components.footer')
