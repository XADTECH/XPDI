<div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
    <div class="setting-body">
        <h3 class="fs-17 font-weight-semi-bold pb-4">My Account</h3>
        <form method="post" class="mb-40px">
            <div class="custom-control-wrap d-flex flex-wrap align-items-center">
                <div class="custom-control custom-radio pl-0 flex-shrink-0 mr-3 mb-2">
                    <input type="radio" class="custom-control-input" id="deactivateAccount"
                        name="radio-stacked" required>
                    <label class="custom-control-label custom--control-label custom--control-label-boxed"
                        for="deactivateAccount">
                        <span class="font-weight-semi-bold text-black">Deactivate Account</span>
                    </label>
                </div>
                <button class="btn theme-btn mb-2">Deactivate</button>
            </div><!-- end custom-control-wrap -->
        </form>
        <div class="section-block"></div>
        <div class="danger-zone pt-40px">
            <h4 class="fs-17 font-weight-semi-bold text-danger">Delete Account Permanently</h4>
            <p class="pt-1 pb-4"><span class="text-warning">Warning: </span>Once you delete your
                account, there is no going back. Please be certain.</p>
            <button class="btn theme-btn" data-toggle="modal" data-target="#deleteModal">Delete
                my account</button>
        </div>
    </div><!-- end setting-body -->
</div><!-- end tab-pane -->
