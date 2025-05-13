<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Xad | Lectures</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet" />
    <style>
        body {
            background-color: #f2f0ec;
            font-family: "Inter", sans-serif;
        }

        .progress-track {
            height: 8px;
            background-color: #e0e0e0;
            border-radius: 5px;
            overflow: hidden;
        }

        .progress-bar-custom {
            height: 100%;
            width: 20%;
            background-color: #0295b9;
        }

        .lesson-link {
            text-decoration: none;
            color: #333;
        }

        .lesson-link.active {
            color: #0295b9;
            font-weight: 600;
        }

        .lesson-link.completed::after {
            content: "✔";
            color: green;
            margin-left: 8px;
            font-size: 14px;
        }

        .topbar {
            height: 70px;
            background-color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1.5rem;
            border-bottom: 1px solid #e0e0e0;
            flex-wrap: wrap;
        }

        .video-wrapper {
            background-color: #F2F0EC;
            padding: 1.5rem;
            border-radius: 6px;
        }

        @media (max-width: 767.98px) {
            .sidebar {
                max-height: 60vh;
                overflow-y: auto;
                border-bottom: 1px solid #e0e0e0;
                margin-bottom: 1rem;
            }

            .topbar {
                flex-direction: column;
                align-items: flex-start;
                gap: 0.5rem;
                height: auto;
                padding: 1rem;
            }

            .video-wrapper {
                padding: 1rem;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid px-0">
        <div class="row g-0 flex-md-nowrap">
            <!-- Sidebar (Mobile stacked, Desktop left-aligned) -->
            <div class="col-12 col-md-4 col-lg-3 bg-white p-3 sidebar">
                <!-- Back -->
                <a href="{{ url('/user/wishlist') }}" class="text-decoration-none text-dark d-block mb-3 fw-semibold">
                    <i class="bi bi-arrow-left me-2"></i> Back
                </a>

                <!-- Progress Bar -->
                <div class="d-flex align-items-center mb-4">
                    <div class="flex-grow-1 progress-track me-2">
                        <div class="progress-bar-custom"></div>
                    </div>
                    <span class="text-muted small">20%</span>
                </div>

                <!-- Accordion -->
                <div class="accordion" id="lessonAccordion">
                    <!-- Section 1 -->
                    <div class="accordion-item border-0 mb-2 shadow-sm rounded-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button bg-white fw-semibold py-2 px-3" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true">
                                Getting Started
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show">
                            <div class="accordion-body px-3 pt-2 pb-3">
                                <ol class="ps-3 mb-0">
                                    <li class="mb-2">
                                        <a href="#" class="lesson-link completed">Basics of English Language</a>
                                    </li>
                                    <li class="mb-2">
                                        <a href="#" class="lesson-link active">Learn Noun</a>
                                    </li>
                                    <li class="mb-2">
                                        <a href="#" class="lesson-link">Learn Sentences</a>
                                    </li>
                                    <li><a href="#" class="lesson-link">Learn writing</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- Section 2 -->
                    <div class="accordion-item border-0 mb-2 shadow-sm rounded-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed bg-white fw-semibold py-2 px-3" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                                Getting Started
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse">
                            <div class="accordion-body px-3 pt-2 pb-3">
                                <ol class="ps-3 mb-0">
                                    <li class="mb-2"><a href="#" class="lesson-link">Basics of English
                                            Language</a></li>
                                    <li class="mb-2"><a href="#" class="lesson-link">Learn Noun</a></li>
                                    <li class="mb-2"><a href="#" class="lesson-link">Learn Sentences</a></li>
                                    <li><a href="#" class="lesson-link">Learn writing</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- Section 3 -->
                    <div class="accordion-item border-0 shadow-sm rounded-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed bg-white fw-semibold py-2 px-3" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseThree">
                                Getting Started
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse">
                            <div class="accordion-body px-3 pt-2 pb-3">
                                <ol class="ps-3 mb-0">
                                    <li class="mb-2"><a href="#" class="lesson-link">Basics of English
                                            Language</a></li>
                                    <li class="mb-2"><a href="#" class="lesson-link">Learn Noun</a></li>
                                    <li class="mb-2"><a href="#" class="lesson-link">Learn Sentences</a></li>
                                    <li><a href="#" class="lesson-link">Learn writing</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col px-0 d-flex flex-column">
                <!-- Top bar -->
                <div class="topbar">
                    <span>Unit 2/4</span>
                    <span class="text-muted">20 minutes</span>
                </div>

                <!-- Video area -->
                <div class="video-wrapper my-3">
                    <h5 class="mb-3">Learn Noun</h5>
                    <div class="ratio ratio-16x9">
                        <iframe width="90%" height="100"
                            src="https://www.youtube.com/embed/pE9vg4mZZ20?si=FRHekvivETIrKPkZ"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
