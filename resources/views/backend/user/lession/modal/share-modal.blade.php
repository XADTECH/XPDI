<div class="modal fade modal-container" id="shareModal" tabindex="-1" role="dialog"
     aria-labelledby="shareModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header border-bottom-gray">
                <h5 class="modal-title fs-19 font-weight-semi-bold" id="shareModalTitle">Share this course</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-times"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="copy-to-clipboard">
                    <span class="success-message">Copied!</span>
                    <div class="input-group">
                        <input type="text" id="shareModalInput"
                               class="form-control form--control copy-input pl-3"
                               readonly>
                        <div class="input-group-append">
                            <button class="btn theme-btn theme-btn-sm copy-btn shadow-none" onclick="copyToClipboard()">
                                <i class="la la-copy mr-1"></i> Copy
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-center border-top-gray">
                <ul class="social-icons social-icons-styled">
                    <li><a href="https://www.facebook.com/" class="facebook-bg"><i class="la la-facebook"></i></a></li>
                    <li><a href="https://www.twitter.com/" class="twitter-bg"><i class="la la-twitter"></i></a></li>
                    <li><a href="https://www.instagram.com/" class="instagram-bg"><i class="la la-instagram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
