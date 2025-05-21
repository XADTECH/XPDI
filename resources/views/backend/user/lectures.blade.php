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
                <a href="{{ url('/user/course') }}" class="text-decoration-none text-dark d-block mb-3 fw-semibold">
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

                    @php $lectureIndex = 1; @endphp

                    @foreach ($course->course_section as $index => $section)
                        <div class="accordion-item border-0 mb-2 shadow-sm rounded-2">
                            <h2 class="accordion-header" id="heading{{ $index }}">
                                <button
                                    class="accordion-button {{ $index === 0 ? '' : 'collapsed' }} bg-white fw-semibold py-2 px-3"
                                    type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $index }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-controls="collapse{{ $index }}">
                                    {{ $section->section_title }}
                                </button>
                            </h2>

                            <div id="collapse{{ $index }}"
                                class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                aria-labelledby="heading{{ $index }}" data-bs-parent="#lessonAccordion">
                                <div class="accordion-body px-3 pt-2 pb-3">
                                    @if ($section->lecture?->count())
                                        <ol class="ps-3 mb-0">
                                            @foreach ($section->lecture as $lecture)
                                                <li class="mb-2">
                                                    <a href="#!" class="lesson-link"
                                                        id="{{ $lectureIndex . '@' . $lecture->video_duration . '@' . $lecture->url }}">
                                                        {{ Str::ucfirst($lecture->lecture_title ?? '') }}
                                                    </a>
                                                </li>
                                                @php $lectureIndex++; @endphp
                                            @endforeach
                                        </ol>
                                    @else
                                        <p class="text-muted">No lectures in this section.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>


            </div>

            <!-- Main Content -->

            <!-- Main Content -->
            <div class="col px-0 d-flex flex-column">
                <!-- Top bar -->
                {{-- <div class="topbar">
                    <span>
                        <span id="current_unit">Unit 1 </span>/{{ $course->course_section->flatMap->lecture->count() }}
                    </span>
                    <span class="text-muted"
                        id="video_duration">{{ $firstLecture->video_duration . ' Minutes' ?? 'Unknown duration' }}</span>
                </div> --}}

                <div class="topbar">
                    <span>
                        <span id="current_unit">Unit 1</span> /
                        {{ $course->course_section->flatMap->lecture->count() }}
                    </span>
                    <span class="text-muted" id="video_duration">
                        {{ $firstLecture?->video_duration ? $firstLecture->video_duration . ' Minutes' : 'Unknown duration' }}
                    </span>
                </div>


                <!-- Video area -->
                <div class="video-wrapper my-3">
                    <h5 class="mb-3" id="lecture-title">
                        {{ Str::ucfirst($firstLecture->lecture_title ?? 'Lecture Title') }}</h5>

                    {{-- <div class="ratio ratio-16x9">
                        <iframe width="560" height="315" src="{{ $embedUrl }}" id="lecture-video"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <input type="hidden" id="lecture_link" value="{{ $embedUrl }}"> --}}

                    <div class="ratio ratio-16x9">
                        @if ($embedUrl)
                            <iframe width="560" height="315" src="{{ $embedUrl }}" id="lecture-video"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                        @else
                            <div class="d-flex align-items-center justify-content-center bg-light text-muted"
                                style="height: 315px; border: 1px solid #ccc; border-radius: 4px;">
                                <p class="mb-0">No lecture video available.</p>
                            </div>
                        @endif
                    </div>

                    <input type="hidden" id="lecture_link" value="{{ $embedUrl ?? '' }}">


                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const links = document.querySelectorAll('.lesson-link');
            const videoDurationSpan = document.getElementById('video_duration');

            links.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();

                    const id = this.id; // format: "3@15"
                    const [index, duration] = id.split('@');

                    console.log("Index:", index);
                    console.log("Duration:", duration);

                    videoDurationSpan.textContent = duration ?
                        `${duration} Minutes` :
                        'Unknown duration';
                });
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const links = document.querySelectorAll('.lesson-link');
            const video = document.getElementById("lecture-video");
            const durationSpan = document.getElementById("video_duration");
            const currentUnit = document.getElementById("current_unit");

            links.forEach(link => {
                link.addEventListener("click", function(e) {
                    e.preventDefault();

                    // ID format: "3@15@https://www.youtube.com/watch?v=xyz"
                    const parts = this.id.split('@');
                    if (parts.length < 3) return;

                    const index = parts[0];
                    const duration = parts[1];
                    const url = parts.slice(2).join('@'); // In case URL has "@" in it

                    const embedUrl = url.replace("watch?v=", "embed/");

                    video.src = embedUrl;
                    durationSpan.textContent = duration ? `${duration} Minutes` :
                        'Unknown duration';
                    currentUnit.textContent = `Unit ${index}`;

                    // Highlight active link
                    links.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                });
            });
        });
    </script>





</body>

</html>
