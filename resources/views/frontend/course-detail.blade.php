<!-- Top Contact Bar -->
@include('frontend_components.top_nav')
<link rel="stylesheet" href="{{ asset('frontend_assets/css/course_detail.css') }}" />
<!-- Main Navbar -->
@include('frontend_components.nav')
<!-- Course Header -->
<header class="course-header">
    <div class="container">
        <div class="row course-header-content">
            <div class="col-lg-8">
                <div class="d-flex mb-2">
                    <a href="#" class="category-badge">Development</a>
                    <a href="#" class="category-badge">Web Development</a>
                </div>

                <h1 class="course-title">React Fundamentals for Beginners React Fundamentals for Beginners</h1>
                <p class="course-subtitle">Learn the basics of React and start building your first components Learn the
                    basics of React and start building your first components</p>

                <div class="instructor-info">
                    <img src="{{ asset('frontend_assets/images/instructors/nabeel-javed.jpg') }}" alt="Instructor"
                        height="100" width="100" class="instructor-photo">
                    <span>By Nabeel Javed</span>
                </div>



                <div class="course-stats">
                    <div class="stat-item">
                        <span>👤 1 student</span>
                    </div>
                    <div class="stat-item">
                        <span>⏱️ 5.6 hours</span>
                    </div>
                    <div class="stat-item">
                        <span>🎬 3 lessons</span>
                    </div>

                </div>

                <div class="action-buttons mt-3">
                    <div class="stat-item flex">
                        <span>📚 Beginner</span>

                        <span> </span>

                        <div class="star-rating">
                            ★★★★★
                        </div>
                        <span>5.0 (12 ratings)</span>

                    </div>

                </div>
                <div class="action-buttons mt-3">
                    <button class="btn btn-outline-light">
                        ❤️ Wish list
                    </button>
                    <button class="btn btn-outline-light ml-2">
                        🔄 Share
                    </button>
                </div>
            </div>

            <div class="col-lg-4 mt-lg-0 mt-lg-43.4rem mt-md-0rem course-card-wrapper">
                <div class="card course-card">
                    <div class="video-player">
                        <i class="fas fa-play-circle play-button"></i>
                    </div>
                    <div class="price-section">
                        <div class="price">Free</div>
                        <a href="#" class="cta-button">Enroll for Free</a>
                        <div class="text-center text-muted">Free lifetime access</div>
                    </div>
                    <div class="course-includes">
                        <p class="text-center mb-3">This course includes:</p>
                        <div class="include-item">
                            <span>🎥 5.6 hours of video</span>
                        </div>
                        <div class="include-item">
                            <span>📝 3 lessons</span>
                        </div>
                        <div class="include-item">
                            <span>♾️ Lifetime access on mobile and TV</span>
                        </div>
                        <div class="include-item">
                            <span>🏆 Certificate of completion</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <!-- What You'll Learn Section -->
            <section class="learn-section">
                <h3>What you will Learn?</h3>
                <ul class="learn-list">
                    <li>Learn React from the ground up and build beautiful React apps as an advanced React developer
                    </li>
                    <li>Become job-ready by learning React + modern JavaScript, plus tools like ES6+, npm, Parcel,
                        Babel</li>
                    <li>Learn React from a professional developer who has worked with React in a professional
                        setting</li>
                    <li>Build 3 beautiful, real-world projects with React, including an advanced app with multiple
                        pages</li>
                    <li>Learn all about React Hooks and modern React function components</li>
                    <li>Master advanced React concepts like state management, useReducer, Context API, and
                        performance optimization</li>
                    <li>Learn to fetch data with React Query (useQuery, useMutation, and more)</li>
                    <li>Understand the newest React Router from the ground up</li>
                    <li>Learn to use Tailwind CSS in React applications</li>
                    <li>Advanced React patterns: Compound Components, Higher-Order Components, Render Props, Context
                        API</li>
                    <li>Optional: Learn Redux, Redux Toolkit and thunks for fetching with Redux</li>
                    <li>Optional: Learn Node.js, Express, and MongoDB</li>
                </ul>
            </section>

            <!-- Requirements Section -->
            <section class="requirements-section">
                <h3>Requirements</h3>
                <ul class="requirements-list">
                    <li>JavaScript + HTML + CSS fundamentals are absolutely required</li>
                    <li>You DON'T need any React or other framework experience to take this course</li>
                    <li>You DON'T need extensive JavaScript knowledge, but basic ES6+ knowledge is helpful</li>
                    <li>Basic JavaScript knowledge is beneficial but not a must-have</li>
                    <li>No pre-knowledge required in any other tools, libraries or frameworks</li>
                </ul>
            </section>

            <!-- Course Content Section -->
            <section class="content-section">
                <h3>Course content</h3>
                <p>42 sections • 152 lectures • 25h total length</p>

                <div class="accordion content-accordion" id="courseContentAccordion">
                    <!-- Getting Started Section -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Getting Started
                                <span class="section-info">5 lectures • 42 min</span>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#courseContentAccordion">
                            <div class="accordion-body">
                                <ul class="lecture-list">
                                    <li class="lecture-item">
                                        <div class="lecture-title">
                                            <i class="far fa-play-circle lecture-icon"></i>
                                            <span>Introduction to React.js</span>
                                        </div>
                                        <span class="lecture-duration">9:57</span>
                                    </li>
                                    <li class="lecture-item">
                                        <div class="lecture-title">
                                            <i class="far fa-play-circle lecture-icon"></i>
                                            <span>Introduction to React 16</span>
                                        </div>
                                        <span class="lecture-duration">8:15</span>
                                    </li>
                                    <li class="lecture-item">
                                        <div class="lecture-title">
                                            <i class="far fa-play-circle lecture-icon"></i>
                                            <span>Introduction to React 17</span>
                                        </div>
                                        <span class="lecture-duration">8:27</span>
                                    </li>
                                    <li class="lecture-item">
                                        <div class="lecture-title">
                                            <i class="far fa-play-circle lecture-icon"></i>
                                            <span>Introduction to React 18</span>
                                        </div>
                                        <span class="lecture-duration">7:33</span>
                                    </li>
                                    <li class="lecture-item">
                                        <div class="lecture-title">
                                            <i class="far fa-play-circle lecture-icon"></i>
                                            <span>Introduction to React.js</span>
                                        </div>
                                        <span class="lecture-duration">8:14</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- JavaScript Refresher Section -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                JavaScript Refresher
                                <span class="section-info">11 lectures • 62 min</span>
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                            data-bs-parent="#courseContentAccordion">
                            <div class="accordion-body">
                                <!-- Content for JavaScript Refresher would go here -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Instructor Section -->
            <section class="instructor-section">
                <h3>Course Instructor</h3>
                <div class="instructor-profile">
                    <img src="/api/placeholder/120/120" alt="Nabeel Javed" class="instructor-avatar">
                    <div class="instructor-details">
                        <h4>Nabeel Javed</h4>
                        <p>JavaScript & React Developer</p>

                        <div class="instructor-stats">
                            <div class="instructor-stat">
                                <i class="fas fa-star"></i>
                                <span>4.8 Instructor Rating</span>
                            </div>
                            <div class="instructor-stat">
                                <i class="fas fa-award"></i>
                                <span>5,623 Reviews</span>
                            </div>
                            <div class="instructor-stat">
                                <i class="fas fa-user-friends"></i>
                                <span>172,594 Students</span>
                            </div>
                            <div class="instructor-stat">
                                <i class="fas fa-play-circle"></i>
                                <span>5 Courses</span>
                            </div>
                        </div>

                        <p class="mt-3">
                            Nabeel is an experienced developer specializing in JavaScript and React. He teaches
                            students online, simplifying complex concepts into easy-to-understand lessons. With
                            years of industry experience, he enjoys sharing his knowledge with others.
                        </p>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>

@include('frontend_components.footer')
