<div class="lecture-viewer-container">

    <div class="lecture-video-item">
        <video controls crossorigin playsinline id="player">
            <!-- Video files -->
            <source id="video-source-1" src="{{ $course->video }}" type="video/mp4" />

            <!-- Caption files -->
            <track kind="captions" label="English" srclang="en" id="video-source-2"
                src="" default />
            <track kind="captions" label="Français" srclang="fr" id="video-source-3"
                src="" />

            <!-- Fallback for browsers that don't support the <video> element -->
            <a id="video-source-4" href="" download>Download</a>
        </video>
    </div>



    <div class="lecture-viewer-text-wrap">
        <div class="lecture-viewer-text-content custom-scrollbar-styled">
            <div class="lecture-viewer-text-body">
                <h2 class="fs-24 font-weight-semi-bold pb-4">Download your Footage for your Quick
                    Start</h2>
                <div class="lecture-viewer-content-detail">
                    <ul class="generic-list-item pb-4">
                        <li>Hi</li>
                        <li>Welcome to Motion Graphics in After Effects. </li>
                        <li>In the next lectures you will start creating your first animation and
                            animate imported footage.</li>
                        <li>But I must explain to you how all this mistaken idea of denouncing
                            pleasure and praising pain was born and I will give you a complete
                            account of the system, and expound the actual teachings of the great
                            explorer of the truth, the master-builder of human happiness. No one
                            rejects, dislikes,</li>
                        <li>At vero eos et accusamus et iusto odio dignissimos ducimus qui
                            blanditiis praesentium voluptatum deleniti atque corrupti quos dolores
                            et quas molestias excepturi sint occaecati cupiditate non provident,
                            similique sunt in culpa qui officia deserunt mollitia animi, id est
                            laborum et dolorum fuga. </li>
                        <li>Occaecati cupiditate non provident, similique sunt in culpa qui officia
                            deserunt mollitia animi, id est laborum et dolorum fuga. </li>
                        <li>Et harum quidem rerum facilis est et expedita distinctio. Nam libero
                            tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo
                            minus id quod maxime placeat facere possimus,</li>
                        <li>On the other hand, we denounce with righteous indignation and dislike
                            men who are so beguiled and demoralized by the charms of pleasure of the
                            moment, so blinded by desire, that they cannot foresee the pain and
                            trouble that are bound to ensue; and equal blame belongs to those who
                            fail in their duty through weakness of will, which is the same as saying
                            through shrinking from toil and pain. These cases are perfectly simple
                            and easy to distinguish. </li>
                        <li><strong class="font-weight-semi-bold">Download your footage Now, Click
                                on the Link Below.</strong></li>
                    </ul>
                    <div class="btn-box">
                        <h3 class="fs-18 font-weight-semi-bold pb-3">Resources for this lecture
                        </h3>
                        <a href="#" class="btn theme-btn theme-btn-transparent"><i
                                class="la la-file-zip-o mr-1"></i>Quick-start.zip</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- end lecture-viewer-container -->
