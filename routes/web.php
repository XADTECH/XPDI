
<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AdminCourseController;
use App\Http\Controllers\admin\AdminInstructorController;
use App\Http\Controllers\admin\AdminReviewController;
use App\Http\Controllers\admin\AdminUserManageController;
use App\Http\Controllers\admin\BackendOrderController;
use App\Http\Controllers\admin\BlogCategoryController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\InfoController;
use App\Http\Controllers\admin\PageSettingController;
use App\Http\Controllers\admin\PartnerController;
use App\Http\Controllers\admin\PromotionalTemplate;
use App\Http\Controllers\admin\ReportController;
use App\Http\Controllers\admin\SettingController;
use App\Http\Controllers\admin\SiteSettingController;
use App\Http\Controllers\admin\SliderController;
use App\Http\Controllers\admin\SubcategoryController;
use App\Http\Controllers\admin\SubscriberController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\CheckoutController;
use App\Http\Controllers\frontend\FrontendController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\frontend\PageController;
use App\Http\Controllers\frontend\WishlistController;
use App\Http\Controllers\instructor\CouponController;
use App\Http\Controllers\instructor\CourseController;
use App\Http\Controllers\instructor\CourseSectionController;
use App\Http\Controllers\instructor\InstructorChatController;
use App\Http\Controllers\instructor\InstructorController;
use App\Http\Controllers\instructor\InstructorOrderController;
use App\Http\Controllers\instructor\InstructorProfileController;
use App\Http\Controllers\instructor\InstructorQuestionController;
use App\Http\Controllers\instructor\InstructorReviewController;
use App\Http\Controllers\instructor\LectureController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\user\UserController;
use App\Http\Controllers\user\UserCourseController;
use App\Http\Controllers\user\UserProfileController;
use Illuminate\Support\Facades\Route;
use Chatify\Facades\ChatifyMessenger;





/*
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');  */



/*  Google Route  */

Route::get('/auth/google', [SocialController::class, 'googleLogin'])->name('auth.google');
Route::get('/auth/google-callback', [SocialController::class, 'googleAuthentication'])->name('auth.google-callback');



/* Admin Route   */


Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');



Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AdminController::class, 'destroy'])
        ->name('logout');

    /*  control Profile */

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/store', [ProfileController::class, 'store'])->name('profile.store');
    Route::get('/setting', [ProfileController::class, 'setting'])->name('setting');
    Route::post('/password/setting', [ProfileController::class, 'passwordSetting'])->name('passwordSetting');

    /*  control Category & Subcategory  */

    Route::resource('category', CategoryController::class);
    Route::resource('subcategory', SubcategoryController::class);

    /* control instructor  */
    Route::resource('instructor', AdminInstructorController::class);
    Route::post('/update-status', [AdminInstructorController::class, 'updateStatus'])->name('instructor.status');
    Route::get('/instructor-active-list', [AdminInstructorController::class, 'instructorActive'])->name('instructor.active');

    /* control Course  */

    Route::resource('course', AdminCourseController::class);
    Route::post('/course-status', [AdminCourseController::class, 'courseStatus'])->name('course.status');

    /*  order controller  */
    Route::resource('order', BackendOrderController::class);

    /*  Setting Controller */
    Route::get('/mail-setting', [SettingController::class, 'mailSetting'])->name('mailSetting');
    Route::post('/mail-settings/update', [SettingController::class, 'updateMailSettings'])->name('mail.settings.update');

    Route::get('/stripe-setting', [SettingController::class, 'stripeSetting'])->name('stripeSetting');
    Route::post('/stripe-settings/update', [SettingController::class, 'updateStripeSettings'])->name('stripe.settings.update');

    Route::get('/google-setting', [SettingController::class, 'googleSetting'])->name('googleSetting ');
    Route::post('/google-settings/update', [SettingController::class, 'updateGoogleSettings'])->name('google.settings.update');

    Route::get('pusher-setting', [SettingController::class, 'pusherSetting'])->name('pusherSetting');
    Route::post('/pusher-settings/update', [SettingController::class, 'updatePusherSettings'])->name('pusher.settings.update');

    /* Report Settings  */
    Route::resource('report', ReportController::class);

    /* Review Setting */
    Route::resource('review', AdminReviewController::class);
    Route::post('/update-review-status', [AdminReviewController::class, 'updateStatus'])->name('review.status');

    /*  User Manage  */

    Route::get('/get-user', [AdminUserManageController::class, 'getUser'])->name('manage-user');
    Route::get('/get-instructor', [AdminUserManageController::class, 'getInstructor'])->name('manage-instructor');

    /* Manage Blog Category */
    Route::resource('blog-category', BlogCategoryController::class);

    /* Manage Blog */

    Route::resource('blog', BlogController::class);

    /* Manage Slider  */

    Route::resource('slider', SliderController::class);

    /*  Manage Info */

    Route::resource('info', InfoController::class);

    /* Manage Partner  */

    Route::resource('partner', PartnerController::class);

    /*  Manage Subscriber  */

    Route::resource('subscriber', SubscriberController::class);

    /* Manage Promotion Template */

    Route::resource('promotion-template', PromotionalTemplate::class);

    /* Manage Site Seetings */
    Route::resource('site-setting', SiteSettingController::class);

    /*  Manage Page Seetings  */

    Route::resource('page-setting', PageSettingController::class);

    Route::get('/contact/view/{id}', [AdminController::class, 'contactView'])->name('contact.view');
});

/*   Instructor Route  */

Route::get('/instructor/login', [InstructorController::class, 'login'])->name('instructor.login');
Route::get('/instructor/register', [InstructorController::class, 'register'])->name('instructor.register');
Route::post('/instructor/register', [InstructorController::class, 'store'])->name('instructor.register.store');

Route::middleware(['auth', 'verified', 'role:instructor'])->prefix('instructor')->name('instructor.')->group(function () {
    Route::get('/dashboard', [InstructorController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [InstructorController::class, 'destroy'])
        ->name('logout');

    Route::get('/profile', [InstructorProfileController::class, 'index'])->name('profile');
    Route::post('/profile/store', [InstructorProfileController::class, 'store'])->name('profile.store');
    Route::get('/setting', [InstructorProfileController::class, 'setting'])->name('setting');
    Route::post('/password/setting', [InstructorProfileController::class, 'passwordSetting'])->name('passwordSetting');

    Route::resource('course', CourseController::class);
    Route::get('/get-subcategories/{categoryId}', [CategoryController::class, 'getSubcategories']);

    Route::resource('course-section', CourseSectionController::class);
    Route::resource('lecture', LectureController::class);

    // Route::get('/course-section/{id}', [CourseSectionController::class, 'index'])->name('course-section');

    Route::resource('coupon', CouponController::class);

    /*  order  */
    Route::resource('order', InstructorOrderController::class);
    Route::get('/invoice/{id}', [InstructorOrderController::class, 'invoice'])->name('order.invoice');

    /*  Question */
    Route::resource('question', InstructorQuestionController::class);

    /* Review Setting */
    Route::resource('review', InstructorReviewController::class);
    Route::post('/update-review-status', [InstructorReviewController::class, 'updateStatus'])->name('review.status');

    /* Managed Chat */

    Route::get('/chat', [InstructorChatController::class, 'index'])->name('chat.index');
    Route::post('/user/messages', [InstructorChatController::class, 'userMessage']);
    Route::post('/send-message', [InstructorChatController::class, 'sendMessage']);
});

Route::middleware(['auth', 'verified', 'role:user'])->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [UserController::class, 'destroy'])
        ->name('logout');

    Route::get('/profile', [UserProfileController::class, 'index'])->name('profile');
    Route::post('/profile/store', [UserProfileController::class, 'store'])->name('profile.store');
    Route::get('/setting', [UserProfileController::class, 'setting'])->name('setting');
    Route::post('/password/setting', [UserProfileController::class, 'passwordSetting'])->name('passwordSetting');

    /* Wishlist controller */

    Route::get('wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
    Route::get('/wishlist-data', [WishlistController::class, 'getWishlist']);
    Route::delete('/wishlist/{id}', [WishlistController::class, 'destroy'])->name('wishlist.destroy');

    /* Course Controller  */

    Route::resource('course', UserCourseController::class);

    /* purpose Chatify */


    /* Chating Section */

    Route::get('/user-message', [ChatController::class, 'userMessage'])->name('message');
    Route::post('/instructor/messages', [ChatController::class, 'getInstructorMessages']);

    Route::post('/instructor/messages/delete', [ChatController::class, 'deleteMessages'])->name('messages.delete');

    Route::post('/send-message', [ChatController::class, 'sendMessage']);

    Route::get('/purchase-history', [UserController::class, 'purchaseHistory'])->name('purchaseHistory');

    // Route::get('/send-pusher', [ChatController::class, 'sendPusher']);


});

/*  All Frontend Route */
Route::get('/', [FrontendController::class, 'index']);

/*  Courses Live search  */
Route::get('/search-courses', [FrontendController::class, 'search'])->name('courses.search');

/* All Courses */
Route::get('/all-courses', [FrontendController::class, 'allCourses'])->name('allCourse');
/*  ajax url  */
Route::get('/course/all', [FrontendController::class, 'courseAll']);

/* ajax pagination */

Route::get('/courses', [FrontendController::class, 'courses']);

Route::get('/all-course/filter', [FrontendController::class, 'courseFilter']);

/*  user subscribe  */
Route::post('/user-subscribe', [FrontendController::class, 'userSubscribe'])->name('frontend.subscribe');

/*  frontend course route  */

Route::get('/course-details/{slug}', [FrontendController::class, 'view'])->name('course-details');
Route::get('/category/{slug}', [FrontendController::class, 'courseCategory'])->name('course-category');

Route::get('/course/{category}/{subcategory}', [FrontendController::class, 'courseSubcategory'])->name('course-subcategory');

Route::get('/category-course/filter', [FrontendController::class, 'categoryCourseFilter']);


Route::get('/all-category', [FrontendController::class, 'allCategory'])->name('all-category');

Route::get('/all-courses/grid-view', [FrontendController::class, 'allCourseGrid'])->name('allCourseGrid');
Route::get('/all-courses/list-view', [FrontendController::class, 'allCourseList'])->name('allCourseList');

/*  Instructor details page  */

Route::get('/instructor/{name}/{id}', [FrontendController::class, 'instructor'])->name('instructor');

/* wishlist controller  */

Route::get('/wishlist/all', [WishlistController::class, 'allWishlist']);

Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist']);

/* Cart Controller */
Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/all', [CartController::class, 'cartAll']);
Route::get('/fetch/cart', [CartController::class, 'fetchCart']);
Route::post('/remove/cart', [CartController::class, 'removeCart']);

/* Coupon Apply    */
Route::post('/apply-coupon', [CouponController::class, 'applyCoupon']);

/*  Checkout */
Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');

/* Blog Details  */
Route::get('/blog-details/{slug}', [BlogController::class, 'blogDetails'])->name('blogDetails');
Route::get('/blog/category/{slug}', [BlogController::class, 'category'])->name('blogCategory');
Route::get('/blogs', [BlogController::class, 'allBlog'])->name('allBlog');

/*  Blog Tag Filter */

Route::get('/blog-tag/{tag}', [BlogController::class, 'blogTag'])->name('blogTag');

/* all Page Route  */

Route::get('/about-us', [PageController::class, 'aboutUs'])->name('aboutUs');
Route::get('/contact-us', [PageController::class, 'contactUs'])->name('contactUs');

Route::post('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/faq', [PageController::class, 'faq'])->name('faq');



Route::middleware('auth')->group(function () {

    /* Order  */
    Route::post('/order', [OrderController::class, 'order'])->name('order');
    Route::get('/payment-success', [OrderController::class, 'success'])->name('success');
    Route::get('/payment-cancel', [OrderController::class, 'cancel'])->name('cancel');
    Route::resource('rating', RatingController::class);
});


/*

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});  */

require __DIR__ . '/auth.php';
