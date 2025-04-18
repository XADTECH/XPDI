<div class="tab-pane fade" id="withdraw" role="tabpanel" aria-labelledby="withdraw-tab">
    <div class="setting-body">
        <h3 class="fs-17 font-weight-semi-bold pb-4">Select a Withdraw Method</h3>
        <form method="post" class="row mb-40px">
            <div class="col-lg-2 responsive-column-half">
                <div class="custom-control custom-radio mb-3 pl-0">
                    <input type="radio" class="custom-control-input" id="bankTransfer" name="radio-stacked"
                        required>
                    <label class="custom-control-label custom--control-label custom--control-label-boxed"
                        for="bankTransfer">
                        <span class="font-weight-semi-bold text-black d-block">Bank Transfer</span>
                        <span class="d-block fs-14 lh-18">Min withdraw $50.00</span>
                    </label>
                </div>
            </div><!-- end col-lg-2 -->
            <div class="col-lg-2 responsive-column-half">
                <div class="custom-control custom-radio mb-3 pl-0">
                    <input type="radio" class="custom-control-input" id="eCheck" name="radio-stacked"
                        required>
                    <label class="custom-control-label custom--control-label custom--control-label-boxed"
                        for="eCheck">
                        <span class="font-weight-semi-bold text-black d-block">E-Check</span>
                        <span class="d-block fs-14 lh-18">Min withdraw $50.00</span>
                    </label>
                </div>
            </div><!-- end col-lg-2 -->
            <div class="col-lg-2 responsive-column-half">
                <div class="custom-control custom-radio mb-3 pl-0">
                    <input type="radio" class="custom-control-input" id="payoneer" name="radio-stacked"
                        required>
                    <label class="custom-control-label custom--control-label custom--control-label-boxed"
                        for="payoneer">
                        <span class="font-weight-semi-bold text-black d-block">Payoneer</span>
                        <span class="d-block fs-14 lh-18">Min withdraw $50.00</span>
                    </label>
                </div>
            </div><!-- end col-lg-2 -->
            <div class="col-lg-2 responsive-column-half">
                <div class="custom-control custom-radio mb-3 pl-0">
                    <input type="radio" class="custom-control-input" id="PayPal" name="radio-stacked"
                        required>
                    <label class="custom-control-label custom--control-label custom--control-label-boxed"
                        for="PayPal">
                        <span class="font-weight-semi-bold text-black d-block">PayPal</span>
                        <span class="d-block fs-14 lh-18">Min withdraw $50.00</span>
                    </label>
                </div>
            </div><!-- end col-lg-2 -->
            <div class="col-lg-2 responsive-column-half">
                <div class="custom-control custom-radio mb-3 pl-0">
                    <input type="radio" class="custom-control-input" id="skrill" name="radio-stacked"
                        required>
                    <label class="custom-control-label custom--control-label custom--control-label-boxed"
                        for="skrill">
                        <span class="font-weight-semi-bold text-black d-block">Skrill</span>
                        <span class="d-block fs-14 lh-18">Min withdraw $50.00</span>
                    </label>
                </div>
            </div><!-- end col-lg-2 -->
            <div class="col-lg-2 responsive-column-half">
                <div class="custom-control custom-radio mb-3 pl-0">
                    <input type="radio" class="custom-control-input" id="stripe" name="radio-stacked"
                        required>
                    <label class="custom-control-label custom--control-label custom--control-label-boxed"
                        for="stripe">
                        <span class="font-weight-semi-bold text-black d-block">Stripe</span>
                        <span class="d-block fs-14 lh-18">Min withdraw $50.00</span>
                    </label>
                </div>
            </div><!-- end col-lg-2 -->
        </form>
        <form method="post" class="row">
            <h3 class="fs-17 font-weight-semi-bold pb-4 col-lg-12">Account info</h3>
            <div class="input-box col-lg-4">
                <label class="label-text">Account Name</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="text" value="Alex Smith">
                    <span class="la la-user input-icon"></span>
                </div>
            </div><!-- end input-box -->
            <div class="input-box col-lg-4">
                <label class="label-text">Account Number</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="text"
                        value="3275476222500">
                    <span class="la la-pencil input-icon"></span>
                </div>
            </div><!-- end input-box -->
            <div class="input-box col-lg-4">
                <label class="label-text">Bank Name</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="text"
                        value="South State Bank">
                    <span class="la la-bank input-icon"></span>
                </div>
            </div><!-- end input-box -->
            <div class="input-box col-lg-6">
                <label class="label-text">IBAN</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="text" value="3030">
                    <span class="la la-pencil input-icon"></span>
                </div>
            </div><!-- end input-box -->
            <div class="input-box col-lg-6">
                <label class="label-text">BIC/SWIFT</label>
                <div class="form-group">
                    <input class="form-control form--control" type="text" name="text" value="CDDHDBBL">
                    <span class="la la-pencil input-icon"></span>
                </div>
            </div><!-- end input-box -->
            <div class="input-box col-lg-12 py-2">
                <button class="btn theme-btn">Save withdraw account</button>
            </div><!-- end input-box -->
        </form>
    </div><!-- end setting-body -->
</div><!-- end tab-pane -->
