<?php

use App\Http\Controllers\Admin\AmbulanceServiceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChamberController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\FrontSliderController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\HospitalController;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SearchController;
use App\Http\Controllers\Admin\ShippingMethodController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\MembershipController;
use App\Http\Controllers\Admin\UserRoleController;
use App\Http\Controllers\Admin\WebsiteParameterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\WithdrawalController;

// Route::get('/',[AuthController::class,'index'])->name('login');

Route::get('image', function () {
    Artisan::call('storage:link');
    return back();
});

Route::get('/clear', function () {
   Artisan::call('optimize:clear');
   return back();
})->name('clear_cache');

Route::get('/run-storage-link', function () {
    try {
        // Remove the existing storage link
        File::deleteDirectory(public_path('storage'));

        // Run the artisan command
        Artisan::call('storage:link');

        return "<pre>Storage link created successfully.\n" . Artisan::output() . "</pre>";
    } catch (\Exception $e) {
        return "<pre>Error: " . $e->getMessage() . "</pre>";
    }
});


// // SSLCOMMERZ Start
// Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
// Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

// Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
// Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

// Route::post('/success', [SslCommerzPaymentController::class, 'success']);
// Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
// Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
// Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);


// Route::post('order/store', [SslCommerzPaymentController::class, 'orderStore']);
// Route::post('order/success', [SslCommerzPaymentController::class, 'orderSuccess']);
// Route::post('order/fail', [SslCommerzPaymentController::class, 'orderFail']);
// Route::post('order/cancel', [SslCommerzPaymentController::class, 'orderCancel']);

// Route::post('order/ipn', [SslCommerzPaymentController::class, 'orderIpn']);
// //SSLCOMMERZ END

Route::get('/testidcard', [FrontendController::class, 'testidcard'])->name('testidcard');



Route::middleware(['web', 'auth'])->group(function() {
    Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
    Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

    Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
    Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
   
});

Route::get('/pdf/view/{product}', function($productId) {
    $product = \App\Models\Product::findOrFail($productId);

    $user = auth()->user();
    $path = ($user && $user->membership_category_id)
        ? storage_path('app/public/product_files/' . $product->file_path)
        : storage_path('app/public/product_previews/' . $product->preview_path);

    if (!file_exists($path)) abort(404, 'PDF not found');

    return response()->file($path, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="' . basename($path) . '"'
    ]);
})->name('pdf.view');



Route::get('/language/change', [FrontendController::class, 'languageChange'])->name('welcome.changeLanguage');
Route::get('page/{slug?}',[FrontendController::class, 'page'])->name('page');
Route::get('/website/compliance',[FrontendController::class, 'websiteCompliance'])->name('websiteCompliance');
Route::get('hospital-details/{id}',[FrontendController::class,'HospitalDetails'])->name('hospital-details');

Route::get('/',[FrontendController::class, 'index'])->name('ebook.home');
Route::get('/product/{id}', [FrontendController::class, 'quickView'])->name('quickView');

Route::get('book',[FrontendController::class, 'books'])->name('books');
Route::get('generes',[FrontendController::class, 'allGeneres'])->name('generes');
Route::get('product_category/{slug}',[FrontendController::class, 'generes'])->name('slug.generes');
Route::get('authors',[FrontendController::class, 'authors'])->name('authors');
Route::get('publisher',[FrontendController::class, 'publisher'])->name('publisher');
Route::get('pricing',[FrontendController::class, 'pricing'])->name('pricing');
Route::get('blog',[FrontendController::class, 'blog'])->name('blog');
Route::get('blog/{id}',[FrontendController::class, 'singleblog'])->name('single.blog');

Route::post('/blog/{id}/like', [FrontendController::class, 'likePost'])->name('blog.like');
Route::post('/blog/{post}/comment', [FrontendController::class, 'storeComment'])->name('blog.comment.store');

Route::get('blog-details',[FrontendController::class, 'blogDetails'])->name('blog-details');
Route::get('cart',[FrontendController::class, 'cart'])->name('cart');
// Route::get('login',[FrontendController::class, 'login'])->name('login');


Route::get('agent/dashboard',[FrontendController::class, 'memberDashboard'])->name('agent.dashboard');
Route::get('patient/dashboard',[FrontendController::class, 'patientDashboard'])->name('patient.dashboard');
Route::get('doctor/dashboard',[FrontendController::class, 'doctorDashboard'])->name('doctor.dashboard');

Route::get('category/{category}/posts',[FrontendController::class,'categoryPosts'])->name('categoryPosts');

Route::get('member/payment',[FrontendController::class, 'memberPayment'])->name('member.payment');

Route::get('change/profile',[FrontendController::class, 'profile'])->name('change.profile');
Route::post('agent/old-pwd',[FrontendController::class, 'oldPassword'])->name('member.old_password');
Route::post('agent/update-pwd',[FrontendController::class, 'updatePassword'])->name('member.update_password');
Route::post('agent/update-profile',[FrontendController::class, 'updateProfile'])->name('member.update_profile');

Route::get('/file/download/{id}',[FrontendController::class,'fileDownload'])->name('files.download');

Route::get('/search',[FrontendController::class,'search'])->name('search');

Route::get('doctor/list',[FrontendController::class,'doctorList'])->name('doctorList');
Route::get('doctor/details/{id}',[FrontendController::class,'doctorDetails'])->name('doctorDetails');

Route::get('doctor/appointment',[FrontendController::class,'doctorAppointment'])->name('doctorAppointment');

Route::get('hospital/list',[FrontendController::class,'hospitalList'])->name('hospitalList');
Route::get('diagnostic',[FrontendController::class,'diagnostic'])->name('diagnostic');
Route::get('hopital/details/{id}',[FrontendController::class,'hospitalDetails'])->name('hospitalDetails');

Route::get('checkout',[FrontendController::class, 'new_checkout'])->name('new.checkout');
Route::post('cod/order/store',[FrontendController::class, 'codOrderStore'])->name('codOrderStore');
Route::post('order/store', [SslCommerzPaymentController::class, 'orderStore']);

Route::get('department/list',[FrontendController::class,'departmentList'])->name('departmentList');

Route::get('ambulance/provider/list',[FrontendController::class,'ambulanceProviderList'])->name('ambulanceProviderList');
Route::get('charity',[FrontendController::class,'charity'])->name('charity');

// Route::post('store/appointment',[FrontendController::class, 'storeAppointment'])->name('storeAppointment');

Route::get('books', [FrontendController::class, 'shasthoseba'])->name('shop.shasthoseba');
Route::get('product-categories', [FrontendController::class, 'allProductCategories'])->name('allProductCategories');
Route::get('product-category/{slug}', [FrontendController::class, 'productCategory'])->name('productCategory');

Route::get('product/details/{slug}',[FrontendController::class, 'productDetails'])->name('productDetails');


Route::post('add-to-cart',[FrontendController::class, 'addToCart'])->name('addToCart');

Route::post('add-to-cart/two',[FrontendController::class, 'addToCart2'])->name('addToCart2');

Route::post('cart/update/qty',[FrontendController::class, 'cartUpdateQty'])->name('cartUpdateQty');
Route::post('cart/remove/item/{cart}',[FrontendController::class, 'cartRemoveItem'])->name('cartRemoveItem');


Route::get('gallery',[FrontendController::class,'gallery'])->name('gallery');


//Authentication
Route::get('/login',[AuthController::class,'index'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/registration',[AuthController::class,'registration'])->name('registration');
Route::get('/health-card',[AuthController::class,'healthCard'])->name('health.registration');
Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/main-register',[AuthController::class,'mainRegister'])->name('main.register');


Route::get('/news', [
    'uses' => 'App\Http\Controllers\Frontend\FrontendController@news',
    'as' => 'news'
]);

Route::get('/news/{id}', [
    'uses' => 'App\Http\Controllers\Frontend\FrontendController@singleNews',
    'as' => 'singleNews'
]);

Route::get('/support-policy', [
    'uses' => 'App\Http\Controllers\Frontend\FrontendController@supportpolicy',
    'as'   => 'supportpolicy',
]);

Route::get('/privacy-policy', [
    'uses' => 'App\Http\Controllers\Frontend\FrontendController@privacypolicy',
    'as'   => 'privacypolicy',
]);

Route::get('/terms', [
    'uses' => 'App\Http\Controllers\Frontend\FrontendController@terms',
    'as'   => 'terms',
]);

Route::get('/help/center', [
    'uses' => 'App\Http\Controllers\Frontend\FrontendController@helpcenter',
    'as'   => 'helpcenter',
]);

Route::get('/aboutus', [
    'uses' => 'App\Http\Controllers\Frontend\FrontendController@aboutus',
    'as'   => 'aboutus',
]);

Route::get('/contactus', [
    'uses' => 'App\Http\Controllers\Frontend\FrontendController@contactus',
    'as'   => 'contactus',
]);

Route::get('/terms', function () {
    return view('frontend.home.terms');
})->name('terms');

Route::get('/return-policy', function () {
    return view('frontend.home.return_policy');
})->name('return-policy');

Route::get('/privacy-policy', function () {
    return view('frontend.home.privacy_policy');
})->name('privacy-policy');

Route::get('/about-us', function () {
    return view('frontend.home.about');
})->name('about-us');


Route::get('/get-upazilas/{district_id}', function ($district_id) {
    $upazilas = App\Models\Upazila::where('district_id', $district_id)->get();
    return response()->json($upazilas);
});


// Sitemap
Route::get('/sitemap.xml', [
    'uses' => 'App\Http\Controllers\Frontend\FrontendController@sitemap',
    'as'   => 'sitemap',
]);

Route::group(['middleware' => ['web', 'auth'], 'prefix' => 'mypanel'], function () {
    Route::get('dashboard',[AuthController::class,'dashboard'])->name('user.dashboard');
    Route::get('edit/my/information',[AuthController::class,'editMyInformation'])->name('user.editMyInformation');
    Route::get('idcard',[AuthController::class,'idcard'])->name('user.idcard');
    Route::get('idcard/pdf', [AuthController::class, 'idcardPdf'])->name('user.idcard.pdf');
    Route::post('change/my/information',[AuthController::class,'changeMyInformation'])->name('user.changeMyInformation');
    Route::post('profile-image/upload',[AuthController::class,'uploadProfileImage'])->name('user.uploadProfileImage');
    Route::get('orders/type/{type}',[AuthController::class,'orders'])->name('user.orders');
    
    Route::get('checkout',[FrontendController::class, 'checkout'])->name('checkout');
    // Route::get('new/checkout',[FrontendController::class, 'new_checkout'])->name('new.checkout');
    // Route::post('cod/order/store',[FrontendController::class, 'codOrderStore'])->name('codOrderStore');
    Route::post('delivery/location/save',[FrontendController::class, 'storeDeliveryLocation'])->name('storeDeliveryLocation');

    Route::post('reviews/store',[FrontendController::class, 'reviewsStore'])->name('reviewsStore');
    Route::get('invoice/print/{order}', [FrontendController::class, 'orderPrint'])->name('user.orderPrint');

    Route::get('chalan/print/{order}', [FrontendController::class, 'orderChalan'])->name('user.orderChalan');

    Route::get('library/favorite-books', [LibraryController::class, 'favoriteBooks'])->name('user.library.favorite_books');
    Route::get('library/read/{product}', [LibraryController::class, 'trackAndRead'])->name('user.read.book');

    Route::get('library/purchased-books', [LibraryController::class, 'purchasedBooks'])->name('user.library.purchased_books');
    Route::get('library/last-read-book', [LibraryController::class, 'lastReadBook'])->name('user.library.last_read_book');


    Route::post('/wishlist/toggle', [LibraryController::class, 'toggleFavorite'])->name('wishlist.toggle');

    // Book Upload Routes
    Route::get('library/upload', [LibraryController::class, 'createBook'])->name('user.library.create_book');
    Route::post('library/upload', [LibraryController::class, 'storeBook'])->name('user.library.store_book');

    // Invite Link Route
    Route::get('invite', [LibraryController::class, 'showInvitePage'])->name('user.invite');
    Route::get('affiliate', [LibraryController::class, 'showAffiliate'])->name('user.affiliate');
    Route::get('blogpost', [LibraryController::class, 'blogpost'])->name('user.blogpost');
    Route::get('blog/create', [LibraryController::class, 'blogCreate'])->name('user.blog.create');
    Route::post('blog/store', [LibraryController::class, 'blogStore'])->name('user.blog.store');
    Route::get('blog/edit/{id}', [LibraryController::class, 'blogEdit'])->name('user.blog.edit');
    Route::post('blog/uspdate/{id}', [LibraryController::class, 'blogUpdate'])->name('user.blog.update');
    Route::delete('blog/delete/{id}', [LibraryController::class, 'blogdelete'])->name('user.blog.delete');

    // Withdrawal Routes
    Route::get('withdrawals', [WithdrawalController::class, 'index'])->name('user.withdrawals.index');
    Route::get('withdrawals/create', [WithdrawalController::class, 'create'])->name('user.withdrawals.create');
    Route::post('withdrawals', [WithdrawalController::class, 'store'])->name('user.withdrawals.store');

});

// Route::middleware(['web'])->prefix('order')->group(function() {
//     Route::post('store', [SslCommerzPaymentController::class, 'orderStore']);
// });


Route::get('/logout',[AuthController::class,'logOut'])->name('logout');



Route::middleware(['userRole:admin','auth'])->prefix('admin')->group(function(){

    //admin
    Route::get('dashboard',[HomeController::class,'index'])->name('admin.dashboard');
    Route::get('select/tags/',[HomeController::class,'selectTagsOrAddNew'])->name('admin.tags');
    Route::get('select/authors/',[HomeController::class,'selectAuthorsOrAddNew'])->name('admin.authors');
   
    Route::get('websiteparam',[WebsiteParameterController::class,'websiteparam'])->name('websiteparam');
    Route::post('websiteparam/update/{id}',[WebsiteParameterController::class,'update'])->name('websiteparam.update');
    
    
    //role assign
    Route::get('all/users',[UserRoleController::class,'allUser'])->name('admin.all_user');
    Route::get('assign/role',[UserRoleController::class,'userRole'])->name('admin.assign-role');
    Route::post('assign/role',[UserRoleController::class,'assignRole'])->name('admin.assign-role');
    Route::get('manage/role',[UserRoleController::class,'manageRole'])->name('admin.manage-role');
    Route::get('edit/role/{id}',[UserRoleController::class,'editRole'])->name('admin.edit-role');
    Route::post('update/role/{id}',[UserRoleController::class,'updateRole'])->name('admin.update-role');
    Route::get('delete/role/{id}',[UserRoleController::class,'deleteRole'])->name('admin.delete-role');

    //user
    Route::get('users',[UserController::class,'index'])->name('admin.user');
    Route::post('/admin/user/toggle-approve', [UserController::class, 'toggleApprove'])->name('admin.user.approve.toggle');

    Route::get('user/create',[UserController::class,'create'])->name('admin.create-user');
    Route::post('user/create',[UserController::class,'store'])->name('admin.create-user');
    Route::get('user/show/{id}',[UserController::class,'show'])->name('admin.show-user');
    Route::get('user/edit/{id}',[UserController::class,'edit'])->name('admin.edit-user');
    Route::post('user/update/{id}',[UserController::class,'update'])->name('admin.update-user');
    Route::get('user/delete/{id}',[UserController::class,'delete'])->name('admin.delete-user');
    Route::post('user/change-password/{id}',[UserController::class,'changePassword'])->name('admin.user.change-password');


    //search alllllllllllllllllllllll
    Route::get('global-search-ajax/type/{type}/parameter/{parameter?}',[SearchController::class,'globalSearchAjax'])->name('admin.global-search-ajax');



    //FrontSlider
    Route::resource('sliders', FrontSliderController::class);

    Route::resource('memberships', MembershipController::class);
    //galleries
    Route::resource('galleries', GalleryController::class);
    Route::get('image-item-delete/{ImageItemDelete}', [GalleryController::class,'imageItemDelete'])->name('imageItemDelete');
    Route::get('image-item-description/update/{ImageItemUpdate}', [GalleryController::class,'itemDescriptionUpdate'])->name('itemDescriptionUpdate');

   
    Route::resource('shipping', ShippingMethodController::class);



  /*
    |--------------------------------------------------------------------------
    | Menu Routes
    |--------------------------------------------------------------------------
    */

    // View all menus
    Route::get('menus/all', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menusAll',
        'as' => 'admin.menusAll'
    ]);

    // Store a new menu
    Route::post('menu/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuStore',
        'as' => 'admin.menuStore'
    ]);

    // Edit an existing menu
    Route::get('menu/edit/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuEdit',
        'as' => 'admin.menuEdit'
    ]);

    // Update a specific menu
    Route::post('menu/update/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuUpdate',
        'as' => 'admin.menuUpdate'
    ]);

    // View a specific menu
    Route::get('menu/show/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuShow',
        'as' => 'admin.menuShow'
    ]);

    // Delete a menu
    Route::post('menu/delete/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuDelete',
        'as' => 'admin.menuDelete'
    ]);

    // Sort menus
    Route::get('menu/sort', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuSort',
        'as' => 'admin.menuSort'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Page Routes
    |--------------------------------------------------------------------------
    */

    // View all pages
    Route::get('pages/all', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pagesAll',
        'as' => 'admin.pagesAll'
    ]);

    // Store a new page
    Route::post('page/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageStore',
        'as' => 'admin.pageStore'
    ]);

    // Edit an existing page
    Route::get('page/edit/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageEdit',
        'as' => 'admin.pageEdit'
    ]);

    // Update a specific page
    Route::post('page/update/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageUpdate',
        'as' => 'admin.pageUpdate'
    ]);

    // Delete a specific page
    Route::get('page/delete/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageDelete',
        'as' => 'admin.pageDelete'
    ]);

    // Sort pages
    Route::get('page/sort', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageSort',
        'as' => 'admin.pageSort'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Page Item Routes
    |--------------------------------------------------------------------------
    */

    // Show form to create a new page item for a specific page
    Route::get('page/{page}/pageItem/create', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemCreate',
        'as' => 'admin.pageItemCreate'
    ]);

    // Store a new page item
    Route::post('pageItem/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemStore',
        'as' => 'admin.pageItemStore'
    ]);

    // Edit a specific page item
    Route::get('pageItem/edit/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemEdit',
        'as' => 'admin.pageItemEdit'
    ]);

    // Update a specific page item
    Route::post('pageItem/update/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemUpdate',
        'as' => 'admin.pageItemUpdate'
    ]);

    // Delete a specific page item
    Route::get('pageItem/delete/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemDelete',
        'as' => 'admin.pageItemDelete'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Menu/Page Search Route
    |--------------------------------------------------------------------------
    */

     // Search for menu/pages by type
    Route::get('menupage/search/type/{type}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menupageSearch',
        'as' => 'admin.menupageSearch'
    ]);




    Route::resource('categories',CategoryController::class);
    Route::post('category/active',[CategoryController::class,'categoryActive'])->name('category.active');

 
    //BlogPost
    Route::resource('news',PostController::class);
    Route::post('news/active',[PostController::class,'newsActive'])->name('news.active');
    Route::get('medias-ajax',[MediaController::class,'getMediasAjax'])->name('medias.getMediasAjax');

    //BisesoggoCategory
    Route::resource('departments',DepartmentController::class);
    Route::resource('publishers',PublisherController::class);
    Route::post('/publishers/active',[PublisherController::class,'publishersActive'])->name('publishers.active');
    Route::resource('authors',AuthorController::class);
    Route::post('/authors/active',[AuthorController::class,'authorsActive'])->name('authors.active');
    Route::post('/departments/active',[DepartmentController::class,'departmentActive'])->name('departments.active');
    Route::resource('hospitals',HospitalController::class);
    Route::get('get/division',[HospitalController::class,'getDivision'])->name('get.division');
    Route::get('get/district',[HospitalController::class,'getDistrict'])->name('get.district');
    Route::post('/hospital/active',[HospitalController::class,'hospitalActive'])->name('hospital.active');
    Route::get('hospital/allvisits/{id}',[HospitalController::class,'hospitalAllVisits'])->name('hospital.allvisits');
    Route::get('hospital/alldoctors/{id}',[HospitalController::class,'hospitalAllDoctors'])->name('hospital.alldoctors');

    // Doctor
    Route::resource('doctors',DoctorController::class);
    Route::post('/doctor/active',[DoctorController::class,'DoctorActive'])->name('doctor.active');
   

    Route::resource('chambers',ChamberController::class);
    Route::get('/doctor/{doctor}/chambers', [ChamberController::class, 'doctorChambers'])->name('doctor.chambers');

    Route::resource('ambulances',AmbulanceServiceController::class);
    Route::post('/ambulance/active',[AmbulanceServiceController::class,'ambulanceActive'])->name('ambulanceActive');
   


   
    Route::get('medias',[MediaController::class,'index'])->name('medias.index');
    Route::post('medias/store',[MediaController::class,'store'])->name('medias.store');
    Route::get('medias/destroy/{id}',[MediaController::class,'destroy'])->name('medias.destroy');

    Route::get('all/appointments',[HomeController::class,'allAppointments'])->name('allAppointments');
    Route::delete('delete/appointment/{id}',[HomeController::class,'deleteAppointment'])->name('deleteAppointment');





       // Category Routes
    Route::get('product/categories/all', [ProductController::class, 'productCategoriesAll'])->name('admin.productCategoriesAll');
    Route::get('product/category/create', [ProductController::class, 'productCategoryCreate'])->name('admin.productCategoryCreate');
    Route::post('product/category/store', [ProductController::class, 'productCategoryStore'])->name('admin.productCategoryStore');
    Route::get('product/category/edit/{category}', [ProductController::class, 'productCategoryEdit'])->name('admin.productCategoryEdit');
    Route::post('product/category/update/{category}', [ProductController::class, 'productCategoryUpdate'])->name('admin.productCategoryUpdate');
    Route::post('product/category/delete/{category}', [ProductController::class, 'productCategoryDelete'])->name('admin.productCategoryDelete');
    Route::get('category/status/{category}', [ProductController::class, 'categoryStatus'])->name('admin.categoryStatus');




   
    //  Product Routes
    Route::get('products/all', [ProductController::class, 'productsAll'])->name('admin.productsAll');
    Route::get('product/create', [ProductController::class, 'productCreate'])->name('admin.productCreate');
    Route::post('product/store', [ProductController::class, 'productStore'])->name('admin.productStore');
    Route::get('product/edit/{product}', [ProductController::class, 'productEdit'])->name('admin.productEdit');
    Route::post('product/update/{product}', [ProductController::class, 'productUpdate'])->name('admin.productUpdate');
    Route::post('product/delete/{product}', [ProductController::class, 'productDelete'])->name('admin.productDelete');
    Route::get('product/status/{product}', [ProductController::class, 'productStatus'])->name('admin.productStatus');
    Route::get('product/tags', [ProductController::class, 'productTags'])->name('admin.productTags');
    Route::get('product/search/type/{type}', [ProductController::class, 'productSearch'])->name('admin.productSearch');
    Route::get('product/add/stock/{product}', [ProductController::class, 'productAddStock'])->name('admin.productAddStock');


    Route::get('order/list', [ProductController::class, 'orderList'])->name('admin.orderList');
    Route::get('order/details/{order}', [ProductController::class, 'orderDeatils'])->name('admin.orderDeatils');
    Route::post('order/status/{order}', [ProductController::class, 'orderStatus'])->name('admin.orderStatus');
    Route::post('order/payment/{order}', [ProductController::class, 'orderPayment'])->name('admin.orderPayment');
    Route::post('order/item/delete/{orderItem}', [ProductController::class, 'orderItemDelete'])->name('admin.orderItemDelete');
    Route::post('update/qty/{item}', [ProductController::class, 'updateQty'])->name('updateQty');
    Route::get('invoice/print/{order}', [ProductController::class, 'orderPrint'])->name('admin.orderPrint');


});





Route::get('/logout',[AuthController::class,'logOut'])->name('logout');



Route::middleware(['userRole:admin','auth'])->prefix('admin')->group(function(){

    //admin
    Route::get('dashboard',[HomeController::class,'index'])->name('admin.dashboard');
    Route::get('select/tags/',[HomeController::class,'selectTagsOrAddNew'])->name('admin.tags');
    Route::get('select/authors/',[HomeController::class,'selectAuthorsOrAddNew'])->name('admin.authors');
   
    Route::get('websiteparam',[WebsiteParameterController::class,'websiteparam'])->name('websiteparam');
    Route::post('websiteparam/update/{id}',[WebsiteParameterController::class,'update'])->name('websiteparam.update');
    
    
    //role assign
    Route::get('all/users',[UserRoleController::class,'allUser'])->name('admin.all_user');
    Route::get('assign/role',[UserRoleController::class,'userRole'])->name('admin.assign-role');
    Route::post('assign/role',[UserRoleController::class,'assignRole'])->name('admin.assign-role');
    Route::get('manage/role',[UserRoleController::class,'manageRole'])->name('admin.manage-role');
    Route::get('edit/role/{id}',[UserRoleController::class,'editRole'])->name('admin.edit-role');
    Route::post('update/role/{id}',[UserRoleController::class,'updateRole'])->name('admin.update-role');
    Route::get('delete/role/{id}',[UserRoleController::class,'deleteRole'])->name('admin.delete-role');

    //user
    Route::get('users',[UserController::class,'index'])->name('admin.user');
    Route::get('user/create',[UserController::class,'create'])->name('admin.create-user');
    Route::post('user/create',[UserController::class,'store'])->name('admin.create-user');
    Route::get('user/show/{id}',[UserController::class,'show'])->name('admin.show-user');
    Route::get('user/edit/{id}',[UserController::class,'edit'])->name('admin.edit-user');
    Route::post('user/update/{id}',[UserController::class,'update'])->name('admin.update-user');
    Route::get('user/delete/{id}',[UserController::class,'delete'])->name('admin.delete-user');
    Route::post('user/change-password/{id}',[UserController::class,'changePassword'])->name('admin.user.change-password');


    //search alllllllllllllllllllllll
    Route::get('global-search-ajax/type/{type}/parameter/{parameter?}',[SearchController::class,'globalSearchAjax'])->name('admin.global-search-ajax');



    //FrontSlider
    Route::resource('sliders', FrontSliderController::class);

    //galleries
    Route::resource('galleries', GalleryController::class);
    Route::get('image-item-delete/{ImageItemDelete}', [GalleryController::class,'imageItemDelete'])->name('imageItemDelete');
    Route::get('image-item-description/update/{ImageItemUpdate}', [GalleryController::class,'itemDescriptionUpdate'])->name('itemDescriptionUpdate');

   
    Route::resource('shipping', ShippingMethodController::class);



  /*
    |--------------------------------------------------------------------------
    | Menu Routes
    |--------------------------------------------------------------------------
    */

    // View all menus
    Route::get('menus/all', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menusAll',
        'as' => 'admin.menusAll'
    ]);

    // Store a new menu
    Route::post('menu/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuStore',
        'as' => 'admin.menuStore'
    ]);

    // Edit an existing menu
    Route::get('menu/edit/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuEdit',
        'as' => 'admin.menuEdit'
    ]);

    // Update a specific menu
    Route::post('menu/update/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuUpdate',
        'as' => 'admin.menuUpdate'
    ]);

    // View a specific menu
    Route::get('menu/show/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuShow',
        'as' => 'admin.menuShow'
    ]);

    // Delete a menu
    Route::post('menu/delete/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuDelete',
        'as' => 'admin.menuDelete'
    ]);

    // Sort menus
    Route::get('menu/sort', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuSort',
        'as' => 'admin.menuSort'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Page Routes
    |--------------------------------------------------------------------------
    */

    // View all pages
    Route::get('pages/all', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pagesAll',
        'as' => 'admin.pagesAll'
    ]);

    // Store a new page
    Route::post('page/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageStore',
        'as' => 'admin.pageStore'
    ]);

    // Edit an existing page
    Route::get('page/edit/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageEdit',
        'as' => 'admin.pageEdit'
    ]);

    // Update a specific page
    Route::post('page/update/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageUpdate',
        'as' => 'admin.pageUpdate'
    ]);

    // Delete a specific page
    Route::get('page/delete/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageDelete',
        'as' => 'admin.pageDelete'
    ]);

    // Sort pages
    Route::get('page/sort', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageSort',
        'as' => 'admin.pageSort'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Page Item Routes
    |--------------------------------------------------------------------------
    */

    // Show form to create a new page item for a specific page
    Route::get('page/{page}/pageItem/create', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemCreate',
        'as' => 'admin.pageItemCreate'
    ]);

    // Store a new page item
    Route::post('pageItem/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemStore',
        'as' => 'admin.pageItemStore'
    ]);

    // Edit a specific page item
    Route::get('pageItem/edit/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemEdit',
        'as' => 'admin.pageItemEdit'
    ]);

    // Update a specific page item
    Route::post('pageItem/update/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemUpdate',
        'as' => 'admin.pageItemUpdate'
    ]);

    // Delete a specific page item
    Route::get('pageItem/delete/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemDelete',
        'as' => 'admin.pageItemDelete'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Menu/Page Search Route
    |--------------------------------------------------------------------------
    */

     // Search for menu/pages by type
    Route::get('menupage/search/type/{type}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menupageSearch',
        'as' => 'admin.menupageSearch'
    ]);




    Route::resource('categories',CategoryController::class);
    Route::post('category/active',[CategoryController::class,'categoryActive'])->name('category.active');

 
    //BlogPost
    Route::resource('news',PostController::class);
    Route::post('news/active',[PostController::class,'newsActive'])->name('news.active');
    Route::get('medias-ajax',[MediaController::class,'getMediasAjax'])->name('medias.getMediasAjax');

    //BisesoggoCategory
    Route::resource('departments',DepartmentController::class);
    Route::post('/departments/active',[DepartmentController::class,'departmentActive'])->name('departments.active');
    Route::resource('hospitals',HospitalController::class);
    Route::get('get/division',[HospitalController::class,'getDivision'])->name('get.division');
    Route::get('get/district',[HospitalController::class,'getDistrict'])->name('get.district');
    Route::post('/hospital/active',[HospitalController::class,'hospitalActive'])->name('hospital.active');
    Route::get('hospital/allvisits/{id}',[HospitalController::class,'hospitalAllVisits'])->name('hospital.allvisits');
    Route::get('hospital/alldoctors/{id}',[HospitalController::class,'hospitalAllDoctors'])->name('hospital.alldoctors');

    // Doctor
    Route::resource('doctors',DoctorController::class);
    Route::post('/doctor/active',[DoctorController::class,'DoctorActive'])->name('doctor.active');
   

    Route::resource('chambers',ChamberController::class);
Route::get('/doctor/{doctor}/chambers', [ChamberController::class, 'doctorChambers'])->name('doctor.chambers');

    Route::resource('ambulances',AmbulanceServiceController::class);
    Route::post('/ambulance/active',[AmbulanceServiceController::class,'ambulanceActive'])->name('ambulanceActive');
   


   
    Route::get('medias',[MediaController::class,'index'])->name('medias.index');
    Route::post('medias/store',[MediaController::class,'store'])->name('medias.store');
    Route::get('medias/destroy/{id}',[MediaController::class,'destroy'])->name('medias.destroy');

    Route::get('all/appointments',[HomeController::class,'allAppointments'])->name('allAppointments');
    Route::delete('delete/appointment/{id}',[HomeController::class,'deleteAppointment'])->name('deleteAppointment');





       // Category Routes
    Route::get('product/categories/all', [ProductController::class, 'productCategoriesAll'])->name('admin.productCategoriesAll');
    Route::get('product/category/create', [ProductController::class, 'productCategoryCreate'])->name('admin.productCategoryCreate');
    Route::post('product/category/store', [ProductController::class, 'productCategoryStore'])->name('admin.productCategoryStore');
    Route::get('product/category/edit/{category}', [ProductController::class, 'productCategoryEdit'])->name('admin.productCategoryEdit');
    Route::post('product/category/update/{category}', [ProductController::class, 'productCategoryUpdate'])->name('admin.productCategoryUpdate');
    Route::post('product/category/delete/{category}', [ProductController::class, 'productCategoryDelete'])->name('admin.productCategoryDelete');
    Route::get('category/status/{category}', [ProductController::class, 'categoryStatus'])->name('admin.categoryStatus');




   
    //  Product Routes
    Route::get('products/all', [ProductController::class, 'productsAll'])->name('admin.productsAll');
    Route::get('product/create', [ProductController::class, 'productCreate'])->name('admin.productCreate');
    Route::post('product/store', [ProductController::class, 'productStore'])->name('admin.productStore');
    Route::get('product/edit/{product}', [ProductController::class, 'productEdit'])->name('admin.productEdit');
    Route::post('product/update/{product}', [ProductController::class, 'productUpdate'])->name('admin.productUpdate');
    Route::post('product/delete/{product}', [ProductController::class, 'productDelete'])->name('admin.productDelete');
    Route::get('product/status/{product}', [ProductController::class, 'productStatus'])->name('admin.productStatus');
    Route::get('product/tags', [ProductController::class, 'productTags'])->name('admin.productTags');
    Route::get('product/search/type/{type}', [ProductController::class, 'productSearch'])->name('admin.productSearch');
    Route::get('product/add/stock/{product}', [ProductController::class, 'productAddStock'])->name('admin.productAddStock');


    Route::get('order/list', [ProductController::class, 'orderList'])->name('admin.orderList');
    Route::get('order/details/{order}', [ProductController::class, 'orderDeatils'])->name('admin.orderDeatils');
    Route::post('order/status/{order}', [ProductController::class, 'orderStatus'])->name('admin.orderStatus');
    Route::post('order/payment/{order}', [ProductController::class, 'orderPayment'])->name('admin.orderPayment');
    Route::post('order/item/delete/{orderItem}', [ProductController::class, 'orderItemDelete'])->name('admin.orderItemDelete');
    Route::post('update/qty/{item}', [ProductController::class, 'updateQty'])->name('updateQty');
    Route::get('invoice/print/{order}', [ProductController::class, 'orderPrint'])->name('admin.orderPrint');


});
Route::get('/logout',[AuthController::class,'logOut'])->name('logout');



Route::middleware(['userRole:admin','auth'])->prefix('admin')->group(function(){

    //admin
    Route::get('dashboard',[HomeController::class,'index'])->name('admin.dashboard');
    Route::get('select/tags/',[HomeController::class,'selectTagsOrAddNew'])->name('admin.tags');
    Route::get('select/authors/',[HomeController::class,'selectAuthorsOrAddNew'])->name('admin.authors');
   
    Route::get('websiteparam',[WebsiteParameterController::class,'websiteparam'])->name('websiteparam');
    Route::post('websiteparam/update/{id}',[WebsiteParameterController::class,'update'])->name('websiteparam.update');
    
    
    //role assign
    Route::get('all/users',[UserRoleController::class,'allUser'])->name('admin.all_user');
    Route::get('assign/role',[UserRoleController::class,'userRole'])->name('admin.assign-role');
    Route::post('assign/role',[UserRoleController::class,'assignRole'])->name('admin.assign-role');
    Route::get('manage/role',[UserRoleController::class,'manageRole'])->name('admin.manage-role');
    Route::get('edit/role/{id}',[UserRoleController::class,'editRole'])->name('admin.edit-role');
    Route::post('update/role/{id}',[UserRoleController::class,'updateRole'])->name('admin.update-role');
    Route::get('delete/role/{id}',[UserRoleController::class,'deleteRole'])->name('admin.delete-role');

    //user
    Route::get('users',[UserController::class,'index'])->name('admin.user');
    Route::get('user/create',[UserController::class,'create'])->name('admin.create-user');
    Route::post('user/create',[UserController::class,'store'])->name('admin.create-user');
    Route::get('user/show/{id}',[UserController::class,'show'])->name('admin.show-user');
    Route::get('user/edit/{id}',[UserController::class,'edit'])->name('admin.edit-user');
    Route::post('user/update/{id}',[UserController::class,'update'])->name('admin.update-user');
    Route::get('user/delete/{id}',[UserController::class,'delete'])->name('admin.delete-user');
    Route::post('user/change-password/{id}',[UserController::class,'changePassword'])->name('admin.user.change-password');


    //search alllllllllllllllllllllll
    Route::get('global-search-ajax/type/{type}/parameter/{parameter?}',[SearchController::class,'globalSearchAjax'])->name('admin.global-search-ajax');



    //FrontSlider
    Route::resource('sliders', FrontSliderController::class);

    //galleries
    Route::resource('galleries', GalleryController::class);
    Route::get('image-item-delete/{ImageItemDelete}', [GalleryController::class,'imageItemDelete'])->name('imageItemDelete');
    Route::get('image-item-description/update/{ImageItemUpdate}', [GalleryController::class,'itemDescriptionUpdate'])->name('itemDescriptionUpdate');

   
    Route::resource('shipping', ShippingMethodController::class);



  /*
    |--------------------------------------------------------------------------
    | Menu Routes
    |--------------------------------------------------------------------------
    */

    // View all menus
    Route::get('menus/all', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menusAll',
        'as' => 'admin.menusAll'
    ]);

    // Store a new menu
    Route::post('menu/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuStore',
        'as' => 'admin.menuStore'
    ]);

    // Edit an existing menu
    Route::get('menu/edit/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuEdit',
        'as' => 'admin.menuEdit'
    ]);

    // Update a specific menu
    Route::post('menu/update/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuUpdate',
        'as' => 'admin.menuUpdate'
    ]);

    // View a specific menu
    Route::get('menu/show/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuShow',
        'as' => 'admin.menuShow'
    ]);

    // Delete a menu
    Route::post('menu/delete/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuDelete',
        'as' => 'admin.menuDelete'
    ]);

    // Sort menus
    Route::get('menu/sort', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuSort',
        'as' => 'admin.menuSort'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Page Routes
    |--------------------------------------------------------------------------
    */

    // View all pages
    Route::get('pages/all', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pagesAll',
        'as' => 'admin.pagesAll'
    ]);

    // Store a new page
    Route::post('page/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageStore',
        'as' => 'admin.pageStore'
    ]);

    // Edit an existing page
    Route::get('page/edit/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageEdit',
        'as' => 'admin.pageEdit'
    ]);

    // Update a specific page
    Route::post('page/update/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageUpdate',
        'as' => 'admin.pageUpdate'
    ]);

    // Delete a specific page
    Route::get('page/delete/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageDelete',
        'as' => 'admin.pageDelete'
    ]);

    // Sort pages
    Route::get('page/sort', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageSort',
        'as' => 'admin.pageSort'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Page Item Routes
    |--------------------------------------------------------------------------
    */

    // Show form to create a new page item for a specific page
    Route::get('page/{page}/pageItem/create', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemCreate',
        'as' => 'admin.pageItemCreate'
    ]);

    // Store a new page item
    Route::post('pageItem/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemStore',
        'as' => 'admin.pageItemStore'
    ]);

    // Edit a specific page item
    Route::get('pageItem/edit/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemEdit',
        'as' => 'admin.pageItemEdit'
    ]);

    // Update a specific page item
    Route::post('pageItem/update/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemUpdate',
        'as' => 'admin.pageItemUpdate'
    ]);

    // Delete a specific page item
    Route::get('pageItem/delete/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemDelete',
        'as' => 'admin.pageItemDelete'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Menu/Page Search Route
    |--------------------------------------------------------------------------
    */

     // Search for menu/pages by type
    Route::get('menupage/search/type/{type}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menupageSearch',
        'as' => 'admin.menupageSearch'
    ]);




    Route::resource('categories',CategoryController::class);
    Route::post('category/active',[CategoryController::class,'categoryActive'])->name('category.active');

 
    //BlogPost
    Route::resource('news',PostController::class);
    Route::post('news/active',[PostController::class,'newsActive'])->name('news.active');
    Route::get('medias-ajax',[MediaController::class,'getMediasAjax'])->name('medias.getMediasAjax');

    //BisesoggoCategory
    Route::resource('departments',DepartmentController::class);
    Route::post('/departments/active',[DepartmentController::class,'departmentActive'])->name('departments.active');
    Route::resource('hospitals',HospitalController::class);
    Route::get('get/division',[HospitalController::class,'getDivision'])->name('get.division');
    Route::get('get/district',[HospitalController::class,'getDistrict'])->name('get.district');
    Route::post('/hospital/active',[HospitalController::class,'hospitalActive'])->name('hospital.active');
    Route::get('hospital/allvisits/{id}',[HospitalController::class,'hospitalAllVisits'])->name('hospital.allvisits');
    Route::get('hospital/alldoctors/{id}',[HospitalController::class,'hospitalAllDoctors'])->name('hospital.alldoctors');

    // Doctor
    Route::resource('doctors',DoctorController::class);
    Route::post('/doctor/active',[DoctorController::class,'DoctorActive'])->name('doctor.active');
   

    Route::resource('chambers',ChamberController::class);
Route::get('/doctor/{doctor}/chambers', [ChamberController::class, 'doctorChambers'])->name('doctor.chambers');

    Route::resource('ambulances',AmbulanceServiceController::class);
    Route::post('/ambulance/active',[AmbulanceServiceController::class,'ambulanceActive'])->name('ambulanceActive');
   


   
    Route::get('medias',[MediaController::class,'index'])->name('medias.index');
    Route::post('medias/store',[MediaController::class,'store'])->name('medias.store');
    Route::get('medias/destroy/{id}',[MediaController::class,'destroy'])->name('medias.destroy');

    Route::get('all/appointments',[HomeController::class,'allAppointments'])->name('allAppointments');
    Route::delete('delete/appointment/{id}',[HomeController::class,'deleteAppointment'])->name('deleteAppointment');





       // Category Routes
    Route::get('product/categories/all', [ProductController::class, 'productCategoriesAll'])->name('admin.productCategoriesAll');
    Route::get('product/category/create', [ProductController::class, 'productCategoryCreate'])->name('admin.productCategoryCreate');
    Route::post('product/category/store', [ProductController::class, 'productCategoryStore'])->name('admin.productCategoryStore');
    Route::get('product/category/edit/{category}', [ProductController::class, 'productCategoryEdit'])->name('admin.productCategoryEdit');
    Route::post('product/category/update/{category}', [ProductController::class, 'productCategoryUpdate'])->name('admin.productCategoryUpdate');
    Route::post('product/category/delete/{category}', [ProductController::class, 'productCategoryDelete'])->name('admin.productCategoryDelete');
    Route::get('category/status/{category}', [ProductController::class, 'categoryStatus'])->name('admin.categoryStatus');




   
    //  Product Routes
    Route::get('products/all', [ProductController::class, 'productsAll'])->name('admin.productsAll');
    Route::get('product/create', [ProductController::class, 'productCreate'])->name('admin.productCreate');
    Route::post('product/store', [ProductController::class, 'productStore'])->name('admin.productStore');
    Route::get('product/edit/{product}', [ProductController::class, 'productEdit'])->name('admin.productEdit');
    Route::post('product/update/{product}', [ProductController::class, 'productUpdate'])->name('admin.productUpdate');
    Route::post('product/delete/{product}', [ProductController::class, 'productDelete'])->name('admin.productDelete');
    Route::get('product/status/{product}', [ProductController::class, 'productStatus'])->name('admin.productStatus');
    Route::get('product/tags', [ProductController::class, 'productTags'])->name('admin.productTags');
    Route::get('product/search/type/{type}', [ProductController::class, 'productSearch'])->name('admin.productSearch');
    Route::get('product/add/stock/{product}', [ProductController::class, 'productAddStock'])->name('admin.productAddStock');


    Route::get('order/list', [ProductController::class, 'orderList'])->name('admin.orderList');
    Route::get('order/details/{order}', [ProductController::class, 'orderDeatils'])->name('admin.orderDeatils');
    Route::post('order/status/{order}', [ProductController::class, 'orderStatus'])->name('admin.orderStatus');
    Route::post('order/payment/{order}', [ProductController::class, 'orderPayment'])->name('admin.orderPayment');
    Route::post('order/item/delete/{orderItem}', [ProductController::class, 'orderItemDelete'])->name('admin.orderItemDelete');
    Route::post('update/qty/{item}', [ProductController::class, 'updateQty'])->name('updateQty');
    Route::get('invoice/print/{order}', [ProductController::class, 'orderPrint'])->name('admin.orderPrint');


});




Route::get('/logout',[AuthController::class,'logOut'])->name('logout');



Route::middleware(['userRole:admin','auth'])->prefix('admin')->group(function(){

    //admin
    Route::get('dashboard',[HomeController::class,'index'])->name('admin.dashboard');
    Route::get('select/tags/',[HomeController::class,'selectTagsOrAddNew'])->name('admin.tags');
    Route::get('select/authors/',[HomeController::class,'selectAuthorsOrAddNew'])->name('admin.authors');
   
    Route::get('websiteparam',[WebsiteParameterController::class,'websiteparam'])->name('websiteparam');
    Route::post('websiteparam/update/{id}',[WebsiteParameterController::class,'update'])->name('websiteparam.update');
    
    
    //role assign
    Route::get('all/users',[UserRoleController::class,'allUser'])->name('admin.all_user');
    Route::get('assign/role',[UserRoleController::class,'userRole'])->name('admin.assign-role');
    Route::post('assign/role',[UserRoleController::class,'assignRole'])->name('admin.assign-role');
    Route::get('manage/role',[UserRoleController::class,'manageRole'])->name('admin.manage-role');
    Route::get('edit/role/{id}',[UserRoleController::class,'editRole'])->name('admin.edit-role');
    Route::post('update/role/{id}',[UserRoleController::class,'updateRole'])->name('admin.update-role');
    Route::get('delete/role/{id}',[UserRoleController::class,'deleteRole'])->name('admin.delete-role');

    //user
    Route::get('users',[UserController::class,'index'])->name('admin.user');
    Route::get('user/create',[UserController::class,'create'])->name('admin.create-user');
    Route::post('user/create',[UserController::class,'store'])->name('admin.create-user');
    Route::get('user/show/{id}',[UserController::class,'show'])->name('admin.show-user');
    Route::get('user/edit/{id}',[UserController::class,'edit'])->name('admin.edit-user');
    Route::post('user/update/{id}',[UserController::class,'update'])->name('admin.update-user');
    Route::get('user/delete/{id}',[UserController::class,'delete'])->name('admin.delete-user');
    Route::post('user/change-password/{id}',[UserController::class,'changePassword'])->name('admin.user.change-password');


    //search alllllllllllllllllllllll
    Route::get('global-search-ajax/type/{type}/parameter/{parameter?}',[SearchController::class,'globalSearchAjax'])->name('admin.global-search-ajax');



    //FrontSlider
    Route::resource('sliders', FrontSliderController::class);

    //galleries
    Route::resource('galleries', GalleryController::class);
    Route::get('image-item-delete/{ImageItemDelete}', [GalleryController::class,'imageItemDelete'])->name('imageItemDelete');
    Route::get('image-item-description/update/{ImageItemUpdate}', [GalleryController::class,'itemDescriptionUpdate'])->name('itemDescriptionUpdate');

   
    Route::resource('shipping', ShippingMethodController::class);



  /*
    |--------------------------------------------------------------------------
    | Menu Routes
    |--------------------------------------------------------------------------
    */

    // View all menus
    Route::get('menus/all', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menusAll',
        'as' => 'admin.menusAll'
    ]);

    // Store a new menu
    Route::post('menu/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuStore',
        'as' => 'admin.menuStore'
    ]);

    // Edit an existing menu
    Route::get('menu/edit/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuEdit',
        'as' => 'admin.menuEdit'
    ]);

    // Update a specific menu
    Route::post('menu/update/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuUpdate',
        'as' => 'admin.menuUpdate'
    ]);

    // View a specific menu
    Route::get('menu/show/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuShow',
        'as' => 'admin.menuShow'
    ]);

    // Delete a menu
    Route::post('menu/delete/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuDelete',
        'as' => 'admin.menuDelete'
    ]);

    // Sort menus
    Route::get('menu/sort', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuSort',
        'as' => 'admin.menuSort'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Page Routes
    |--------------------------------------------------------------------------
    */

    // View all pages
    Route::get('pages/all', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pagesAll',
        'as' => 'admin.pagesAll'
    ]);

    // Store a new page
    Route::post('page/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageStore',
        'as' => 'admin.pageStore'
    ]);

    // Edit an existing page
    Route::get('page/edit/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageEdit',
        'as' => 'admin.pageEdit'
    ]);

    // Update a specific page
    Route::post('page/update/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageUpdate',
        'as' => 'admin.pageUpdate'
    ]);

    // Delete a specific page
    Route::get('page/delete/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageDelete',
        'as' => 'admin.pageDelete'
    ]);

    // Sort pages
    Route::get('page/sort', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageSort',
        'as' => 'admin.pageSort'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Page Item Routes
    |--------------------------------------------------------------------------
    */

    // Show form to create a new page item for a specific page
    Route::get('page/{page}/pageItem/create', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemCreate',
        'as' => 'admin.pageItemCreate'
    ]);

    // Store a new page item
    Route::post('pageItem/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemStore',
        'as' => 'admin.pageItemStore'
    ]);

    // Edit a specific page item
    Route::get('pageItem/edit/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemEdit',
        'as' => 'admin.pageItemEdit'
    ]);

    // Update a specific page item
    Route::post('pageItem/update/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemUpdate',
        'as' => 'admin.pageItemUpdate'
    ]);

    // Delete a specific page item
    Route::get('pageItem/delete/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemDelete',
        'as' => 'admin.pageItemDelete'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Menu/Page Search Route
    |--------------------------------------------------------------------------
    */

     // Search for menu/pages by type
    Route::get('menupage/search/type/{type}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menupageSearch',
        'as' => 'admin.menupageSearch'
    ]);




    Route::resource('categories',CategoryController::class);
    Route::post('category/active',[CategoryController::class,'categoryActive'])->name('category.active');

 
    //BlogPost
    Route::resource('news',PostController::class);
    Route::post('news/active',[PostController::class,'newsActive'])->name('news.active');
    Route::get('medias-ajax',[MediaController::class,'getMediasAjax'])->name('medias.getMediasAjax');

    //BisesoggoCategory
    Route::resource('departments',DepartmentController::class);
    Route::post('/departments/active',[DepartmentController::class,'departmentActive'])->name('departments.active');
    Route::resource('hospitals',HospitalController::class);
    Route::get('get/division',[HospitalController::class,'getDivision'])->name('get.division');
    Route::get('get/district',[HospitalController::class,'getDistrict'])->name('get.district');
    Route::post('/hospital/active',[HospitalController::class,'hospitalActive'])->name('hospital.active');
    Route::get('hospital/allvisits/{id}',[HospitalController::class,'hospitalAllVisits'])->name('hospital.allvisits');
    Route::get('hospital/alldoctors/{id}',[HospitalController::class,'hospitalAllDoctors'])->name('hospital.alldoctors');

    // Doctor
    Route::resource('doctors',DoctorController::class);
    Route::post('/doctor/active',[DoctorController::class,'DoctorActive'])->name('doctor.active');
   

    Route::resource('chambers',ChamberController::class);
Route::get('/doctor/{doctor}/chambers', [ChamberController::class, 'doctorChambers'])->name('doctor.chambers');

    Route::resource('ambulances',AmbulanceServiceController::class);
    Route::post('/ambulance/active',[AmbulanceServiceController::class,'ambulanceActive'])->name('ambulanceActive');
   


   
    Route::get('medias',[MediaController::class,'index'])->name('medias.index');
    Route::post('medias/store',[MediaController::class,'store'])->name('medias.store');
    Route::get('medias/destroy/{id}',[MediaController::class,'destroy'])->name('medias.destroy');

    Route::get('all/appointments',[HomeController::class,'allAppointments'])->name('allAppointments');
    Route::delete('delete/appointment/{id}',[HomeController::class,'deleteAppointment'])->name('deleteAppointment');





       // Category Routes
    Route::get('product/categories/all', [ProductController::class, 'productCategoriesAll'])->name('admin.productCategoriesAll');
    Route::get('product/category/create', [ProductController::class, 'productCategoryCreate'])->name('admin.productCategoryCreate');
    Route::post('product/category/store', [ProductController::class, 'productCategoryStore'])->name('admin.productCategoryStore');
    Route::get('product/category/edit/{category}', [ProductController::class, 'productCategoryEdit'])->name('admin.productCategoryEdit');
    Route::post('product/category/update/{category}', [ProductController::class, 'productCategoryUpdate'])->name('admin.productCategoryUpdate');
    Route::post('product/category/delete/{category}', [ProductController::class, 'productCategoryDelete'])->name('admin.productCategoryDelete');
    Route::get('category/status/{category}', [ProductController::class, 'categoryStatus'])->name('admin.categoryStatus');




   
    //  Product Routes
    Route::get('products/all', [ProductController::class, 'productsAll'])->name('admin.productsAll');
    Route::get('product/create', [ProductController::class, 'productCreate'])->name('admin.productCreate');
    Route::post('product/store', [ProductController::class, 'productStore'])->name('admin.productStore');
    Route::get('product/edit/{product}', [ProductController::class, 'productEdit'])->name('admin.productEdit');
    Route::post('product/update/{product}', [ProductController::class, 'productUpdate'])->name('admin.productUpdate');
    Route::post('product/delete/{product}', [ProductController::class, 'productDelete'])->name('admin.productDelete');
    Route::get('product/status/{product}', [ProductController::class, 'productStatus'])->name('admin.productStatus');
    Route::get('product/tags', [ProductController::class, 'productTags'])->name('admin.productTags');
    Route::get('product/search/type/{type}', [ProductController::class, 'productSearch'])->name('admin.productSearch');
    Route::get('product/add/stock/{product}', [ProductController::class, 'productAddStock'])->name('admin.productAddStock');


    Route::get('order/list', [ProductController::class, 'orderList'])->name('admin.orderList');
    Route::get('order/details/{order}', [ProductController::class, 'orderDeatils'])->name('admin.orderDeatils');
    Route::post('order/status/{order}', [ProductController::class, 'orderStatus'])->name('admin.orderStatus');
    Route::post('order/payment/{order}', [ProductController::class, 'orderPayment'])->name('admin.orderPayment');
    Route::post('order/item/delete/{orderItem}', [ProductController::class, 'orderItemDelete'])->name('admin.orderItemDelete');
    Route::post('update/qty/{item}', [ProductController::class, 'updateQty'])->name('updateQty');
    Route::get('invoice/print/{order}', [ProductController::class, 'orderPrint'])->name('admin.orderPrint');


});





Route::get('/logout',[AuthController::class,'logOut'])->name('logout');



Route::middleware(['userRole:admin','auth'])->prefix('admin')->group(function(){

    //admin
    Route::get('dashboard',[HomeController::class,'index'])->name('admin.dashboard');
    Route::get('select/tags/',[HomeController::class,'selectTagsOrAddNew'])->name('admin.tags');
    Route::get('select/authors/',[HomeController::class,'selectAuthorsOrAddNew'])->name('admin.authors');
   
    Route::get('websiteparam',[WebsiteParameterController::class,'websiteparam'])->name('websiteparam');
    Route::post('websiteparam/update/{id}',[WebsiteParameterController::class,'update'])->name('websiteparam.update');
    
    
    //role assign
    Route::get('all/users',[UserRoleController::class,'allUser'])->name('admin.all_user');
    Route::get('assign/role',[UserRoleController::class,'userRole'])->name('admin.assign-role');
    Route::post('assign/role',[UserRoleController::class,'assignRole'])->name('admin.assign-role');
    Route::get('manage/role',[UserRoleController::class,'manageRole'])->name('admin.manage-role');
    Route::get('edit/role/{id}',[UserRoleController::class,'editRole'])->name('admin.edit-role');
    Route::post('update/role/{id}',[UserRoleController::class,'updateRole'])->name('admin.update-role');
    Route::get('delete/role/{id}',[UserRoleController::class,'deleteRole'])->name('admin.delete-role');

    //user
    Route::get('users',[UserController::class,'index'])->name('admin.user');
    Route::get('user/create',[UserController::class,'create'])->name('admin.create-user');
    Route::post('user/create',[UserController::class,'store'])->name('admin.create-user');
    Route::get('user/show/{id}',[UserController::class,'show'])->name('admin.show-user');
    Route::get('user/edit/{id}',[UserController::class,'edit'])->name('admin.edit-user');
    Route::post('user/update/{id}',[UserController::class,'update'])->name('admin.update-user');
    Route::get('user/delete/{id}',[UserController::class,'delete'])->name('admin.delete-user');
    Route::post('user/change-password/{id}',[UserController::class,'changePassword'])->name('admin.user.change-password');


    //search alllllllllllllllllllllll
    Route::get('global-search-ajax/type/{type}/parameter/{parameter?}',[SearchController::class,'globalSearchAjax'])->name('admin.global-search-ajax');



    //FrontSlider
    Route::resource('sliders', FrontSliderController::class);

    //galleries
    Route::resource('galleries', GalleryController::class);
    Route::get('image-item-delete/{ImageItemDelete}', [GalleryController::class,'imageItemDelete'])->name('imageItemDelete');
    Route::get('image-item-description/update/{ImageItemUpdate}', [GalleryController::class,'itemDescriptionUpdate'])->name('itemDescriptionUpdate');

   
    Route::resource('shipping', ShippingMethodController::class);



  /*
    |--------------------------------------------------------------------------
    | Menu Routes
    |--------------------------------------------------------------------------
    */

    // View all menus
    Route::get('menus/all', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menusAll',
        'as' => 'admin.menusAll'
    ]);

    // Store a new menu
    Route::post('menu/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuStore',
        'as' => 'admin.menuStore'
    ]);

    // Edit an existing menu
    Route::get('menu/edit/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuEdit',
        'as' => 'admin.menuEdit'
    ]);

    // Update a specific menu
    Route::post('menu/update/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuUpdate',
        'as' => 'admin.menuUpdate'
    ]);

    // View a specific menu
    Route::get('menu/show/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuShow',
        'as' => 'admin.menuShow'
    ]);

    // Delete a menu
    Route::post('menu/delete/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuDelete',
        'as' => 'admin.menuDelete'
    ]);

    // Sort menus
    Route::get('menu/sort', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuSort',
        'as' => 'admin.menuSort'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Page Routes
    |--------------------------------------------------------------------------
    */

    // View all pages
    Route::get('pages/all', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pagesAll',
        'as' => 'admin.pagesAll'
    ]);

    // Store a new page
    Route::post('page/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageStore',
        'as' => 'admin.pageStore'
    ]);

    // Edit an existing page
    Route::get('page/edit/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageEdit',
        'as' => 'admin.pageEdit'
    ]);

    // Update a specific page
    Route::post('page/update/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageUpdate',
        'as' => 'admin.pageUpdate'
    ]);

    // Delete a specific page
    Route::get('page/delete/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageDelete',
        'as' => 'admin.pageDelete'
    ]);

    // Sort pages
    Route::get('page/sort', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageSort',
        'as' => 'admin.pageSort'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Page Item Routes
    |--------------------------------------------------------------------------
    */

    // Show form to create a new page item for a specific page
    Route::get('page/{page}/pageItem/create', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemCreate',
        'as' => 'admin.pageItemCreate'
    ]);

    // Store a new page item
    Route::post('pageItem/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemStore',
        'as' => 'admin.pageItemStore'
    ]);

    // Edit a specific page item
    Route::get('pageItem/edit/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemEdit',
        'as' => 'admin.pageItemEdit'
    ]);

    // Update a specific page item
    Route::post('pageItem/update/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemUpdate',
        'as' => 'admin.pageItemUpdate'
    ]);

    // Delete a specific page item
    Route::get('pageItem/delete/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemDelete',
        'as' => 'admin.pageItemDelete'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Menu/Page Search Route
    |--------------------------------------------------------------------------
    */

     // Search for menu/pages by type
    Route::get('menupage/search/type/{type}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menupageSearch',
        'as' => 'admin.menupageSearch'
    ]);




    Route::resource('categories',CategoryController::class);
    Route::post('category/active',[CategoryController::class,'categoryActive'])->name('category.active');

 
    //BlogPost
    Route::resource('news',PostController::class);
    Route::post('news/active',[PostController::class,'newsActive'])->name('news.active');
    Route::get('medias-ajax',[MediaController::class,'getMediasAjax'])->name('medias.getMediasAjax');

    //BisesoggoCategory
    Route::resource('departments',DepartmentController::class);
    Route::post('/departments/active',[DepartmentController::class,'departmentActive'])->name('departments.active');
    Route::resource('hospitals',HospitalController::class);
    Route::get('get/division',[HospitalController::class,'getDivision'])->name('get.division');
    Route::get('get/district',[HospitalController::class,'getDistrict'])->name('get.district');
    Route::post('/hospital/active',[HospitalController::class,'hospitalActive'])->name('hospital.active');
    Route::get('hospital/allvisits/{id}',[HospitalController::class,'hospitalAllVisits'])->name('hospital.allvisits');
    Route::get('hospital/alldoctors/{id}',[HospitalController::class,'hospitalAllDoctors'])->name('hospital.alldoctors');

    // Doctor
    Route::resource('doctors',DoctorController::class);
    Route::post('/doctor/active',[DoctorController::class,'DoctorActive'])->name('doctor.active');
   

    Route::resource('chambers',ChamberController::class);
Route::get('/doctor/{doctor}/chambers', [ChamberController::class, 'doctorChambers'])->name('doctor.chambers');

    Route::resource('ambulances',AmbulanceServiceController::class);
    Route::post('/ambulance/active',[AmbulanceServiceController::class,'ambulanceActive'])->name('ambulanceActive');
   


   
    Route::get('medias',[MediaController::class,'index'])->name('medias.index');
    Route::post('medias/store',[MediaController::class,'store'])->name('medias.store');
    Route::get('medias/destroy/{id}',[MediaController::class,'destroy'])->name('medias.destroy');

    Route::get('all/appointments',[HomeController::class,'allAppointments'])->name('allAppointments');
    Route::delete('delete/appointment/{id}',[HomeController::class,'deleteAppointment'])->name('deleteAppointment');





       // Category Routes
    Route::get('product/categories/all', [ProductController::class, 'productCategoriesAll'])->name('admin.productCategoriesAll');
    Route::get('product/category/create', [ProductController::class, 'productCategoryCreate'])->name('admin.productCategoryCreate');
    Route::post('product/category/store', [ProductController::class, 'productCategoryStore'])->name('admin.productCategoryStore');
    Route::get('product/category/edit/{category}', [ProductController::class, 'productCategoryEdit'])->name('admin.productCategoryEdit');
    Route::post('product/category/update/{category}', [ProductController::class, 'productCategoryUpdate'])->name('admin.productCategoryUpdate');
    Route::post('product/category/delete/{category}', [ProductController::class, 'productCategoryDelete'])->name('admin.productCategoryDelete');
    Route::get('category/status/{category}', [ProductController::class, 'categoryStatus'])->name('admin.categoryStatus');




   
    //  Product Routes
    Route::get('products/all', [ProductController::class, 'productsAll'])->name('admin.productsAll');
    Route::get('product/create', [ProductController::class, 'productCreate'])->name('admin.productCreate');
    Route::post('product/store', [ProductController::class, 'productStore'])->name('admin.productStore');
    Route::get('product/edit/{product}', [ProductController::class, 'productEdit'])->name('admin.productEdit');
    Route::post('product/update/{product}', [ProductController::class, 'productUpdate'])->name('admin.productUpdate');
    Route::post('product/delete/{product}', [ProductController::class, 'productDelete'])->name('admin.productDelete');
    Route::get('product/status/{product}', [ProductController::class, 'productStatus'])->name('admin.productStatus');
    Route::get('product/tags', [ProductController::class, 'productTags'])->name('admin.productTags');
    Route::get('product/search/type/{type}', [ProductController::class, 'productSearch'])->name('admin.productSearch');
    Route::get('product/add/stock/{product}', [ProductController::class, 'productAddStock'])->name('admin.productAddStock');


    Route::get('order/list', [ProductController::class, 'orderList'])->name('admin.orderList');
    Route::get('order/details/{order}', [ProductController::class, 'orderDeatils'])->name('admin.orderDeatils');
    Route::post('order/status/{order}', [ProductController::class, 'orderStatus'])->name('admin.orderStatus');
    Route::post('order/payment/{order}', [ProductController::class, 'orderPayment'])->name('admin.orderPayment');
    Route::post('order/item/delete/{orderItem}', [ProductController::class, 'orderItemDelete'])->name('admin.orderItemDelete');
    Route::post('update/qty/{item}', [ProductController::class, 'updateQty'])->name('updateQty');
    Route::get('invoice/print/{order}', [ProductController::class, 'orderPrint'])->name('admin.orderPrint');


});




Route::get('/logout',[AuthController::class,'logOut'])->name('logout');



Route::middleware(['userRole:admin','auth'])->prefix('admin')->group(function(){

    //admin
    Route::get('dashboard',[HomeController::class,'index'])->name('admin.dashboard');
    Route::get('select/tags/',[HomeController::class,'selectTagsOrAddNew'])->name('admin.tags');
    Route::get('select/authors/',[HomeController::class,'selectAuthorsOrAddNew'])->name('admin.authors');
   
    Route::get('websiteparam',[WebsiteParameterController::class,'websiteparam'])->name('websiteparam');
    Route::post('websiteparam/update/{id}',[WebsiteParameterController::class,'update'])->name('websiteparam.update');
    
    
    //role assign
    Route::get('all/users',[UserRoleController::class,'allUser'])->name('admin.all_user');
    Route::get('assign/role',[UserRoleController::class,'userRole'])->name('admin.assign-role');
    Route::post('assign/role',[UserRoleController::class,'assignRole'])->name('admin.assign-role');
    Route::get('manage/role',[UserRoleController::class,'manageRole'])->name('admin.manage-role');
    Route::get('edit/role/{id}',[UserRoleController::class,'editRole'])->name('admin.edit-role');
    Route::post('update/role/{id}',[UserRoleController::class,'updateRole'])->name('admin.update-role');
    Route::get('delete/role/{id}',[UserRoleController::class,'deleteRole'])->name('admin.delete-role');

    //user
    Route::get('users',[UserController::class,'index'])->name('admin.user');
    Route::get('user/create',[UserController::class,'create'])->name('admin.create-user');
    Route::post('user/create',[UserController::class,'store'])->name('admin.create-user');
    Route::get('user/show/{id}',[UserController::class,'show'])->name('admin.show-user');
    Route::get('user/edit/{id}',[UserController::class,'edit'])->name('admin.edit-user');
    Route::post('user/update/{id}',[UserController::class,'update'])->name('admin.update-user');
    Route::get('user/delete/{id}',[UserController::class,'delete'])->name('admin.delete-user');
    Route::post('user/change-password/{id}',[UserController::class,'changePassword'])->name('admin.user.change-password');


    //search alllllllllllllllllllllll
    Route::get('global-search-ajax/type/{type}/parameter/{parameter?}',[SearchController::class,'globalSearchAjax'])->name('admin.global-search-ajax');



    //FrontSlider
    Route::resource('sliders', FrontSliderController::class);

    //galleries
    Route::resource('galleries', GalleryController::class);
    Route::get('image-item-delete/{ImageItemDelete}', [GalleryController::class,'imageItemDelete'])->name('imageItemDelete');
    Route::get('image-item-description/update/{ImageItemUpdate}', [GalleryController::class,'itemDescriptionUpdate'])->name('itemDescriptionUpdate');

   
    Route::resource('shipping', ShippingMethodController::class);



  /*
    |--------------------------------------------------------------------------
    | Menu Routes
    |--------------------------------------------------------------------------
    */

    // View all menus
    Route::get('menus/all', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menusAll',
        'as' => 'admin.menusAll'
    ]);

    // Store a new menu
    Route::post('menu/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuStore',
        'as' => 'admin.menuStore'
    ]);

    // Edit an existing menu
    Route::get('menu/edit/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuEdit',
        'as' => 'admin.menuEdit'
    ]);

    // Update a specific menu
    Route::post('menu/update/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuUpdate',
        'as' => 'admin.menuUpdate'
    ]);

    // View a specific menu
    Route::get('menu/show/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuShow',
        'as' => 'admin.menuShow'
    ]);

    // Delete a menu
    Route::post('menu/delete/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuDelete',
        'as' => 'admin.menuDelete'
    ]);

    // Sort menus
    Route::get('menu/sort', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuSort',
        'as' => 'admin.menuSort'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Page Routes
    |--------------------------------------------------------------------------
    */

    // View all pages
    Route::get('pages/all', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pagesAll',
        'as' => 'admin.pagesAll'
    ]);

    // Store a new page
    Route::post('page/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageStore',
        'as' => 'admin.pageStore'
    ]);

    // Edit an existing page
    Route::get('page/edit/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageEdit',
        'as' => 'admin.pageEdit'
    ]);

    // Update a specific page
    Route::post('page/update/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageUpdate',
        'as' => 'admin.pageUpdate'
    ]);

    // Delete a specific page
    Route::get('page/delete/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageDelete',
        'as' => 'admin.pageDelete'
    ]);

    // Sort pages
    Route::get('page/sort', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageSort',
        'as' => 'admin.pageSort'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Page Item Routes
    |--------------------------------------------------------------------------
    */

    // Show form to create a new page item for a specific page
    Route::get('page/{page}/pageItem/create', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemCreate',
        'as' => 'admin.pageItemCreate'
    ]);

    // Store a new page item
    Route::post('pageItem/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemStore',
        'as' => 'admin.pageItemStore'
    ]);

    // Edit a specific page item
    Route::get('pageItem/edit/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemEdit',
        'as' => 'admin.pageItemEdit'
    ]);

    // Update a specific page item
    Route::post('pageItem/update/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemUpdate',
        'as' => 'admin.pageItemUpdate'
    ]);

    // Delete a specific page item
    Route::get('pageItem/delete/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemDelete',
        'as' => 'admin.pageItemDelete'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Menu/Page Search Route
    |--------------------------------------------------------------------------
    */

     // Search for menu/pages by type
    Route::get('menupage/search/type/{type}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menupageSearch',
        'as' => 'admin.menupageSearch'
    ]);




    Route::resource('categories',CategoryController::class);
    Route::post('category/active',[CategoryController::class,'categoryActive'])->name('category.active');

 
    //BlogPost
    Route::resource('news',PostController::class);
    Route::post('news/active',[PostController::class,'newsActive'])->name('news.active');
    Route::get('medias-ajax',[MediaController::class,'getMediasAjax'])->name('medias.getMediasAjax');

    //BisesoggoCategory
    Route::resource('departments',DepartmentController::class);
    Route::post('/departments/active',[DepartmentController::class,'departmentActive'])->name('departments.active');
    Route::resource('hospitals',HospitalController::class);
    Route::get('get/division',[HospitalController::class,'getDivision'])->name('get.division');
    Route::get('get/district',[HospitalController::class,'getDistrict'])->name('get.district');
    Route::post('/hospital/active',[HospitalController::class,'hospitalActive'])->name('hospital.active');
    Route::get('hospital/allvisits/{id}',[HospitalController::class,'hospitalAllVisits'])->name('hospital.allvisits');
    Route::get('hospital/alldoctors/{id}',[HospitalController::class,'hospitalAllDoctors'])->name('hospital.alldoctors');

    // Doctor
    Route::resource('doctors',DoctorController::class);
    Route::post('/doctor/active',[DoctorController::class,'DoctorActive'])->name('doctor.active');
   

    Route::resource('chambers',ChamberController::class);
Route::get('/doctor/{doctor}/chambers', [ChamberController::class, 'doctorChambers'])->name('doctor.chambers');

    Route::resource('ambulances',AmbulanceServiceController::class);
    Route::post('/ambulance/active',[AmbulanceServiceController::class,'ambulanceActive'])->name('ambulanceActive');
   


   
    Route::get('medias',[MediaController::class,'index'])->name('medias.index');
    Route::post('medias/store',[MediaController::class,'store'])->name('medias.store');
    Route::get('medias/destroy/{id}',[MediaController::class,'destroy'])->name('medias.destroy');

    Route::get('all/appointments',[HomeController::class,'allAppointments'])->name('allAppointments');
    Route::delete('delete/appointment/{id}',[HomeController::class,'deleteAppointment'])->name('deleteAppointment');





       // Category Routes
    Route::get('product/categories/all', [ProductController::class, 'productCategoriesAll'])->name('admin.productCategoriesAll');
    Route::get('product/category/create', [ProductController::class, 'productCategoryCreate'])->name('admin.productCategoryCreate');
    Route::post('product/category/store', [ProductController::class, 'productCategoryStore'])->name('admin.productCategoryStore');
    Route::get('product/category/edit/{category}', [ProductController::class, 'productCategoryEdit'])->name('admin.productCategoryEdit');
    Route::post('product/category/update/{category}', [ProductController::class, 'productCategoryUpdate'])->name('admin.productCategoryUpdate');
    Route::post('product/category/delete/{category}', [ProductController::class, 'productCategoryDelete'])->name('admin.productCategoryDelete');
    Route::get('category/status/{category}', [ProductController::class, 'categoryStatus'])->name('admin.categoryStatus');




   
    //  Product Routes
    Route::get('products/all', [ProductController::class, 'productsAll'])->name('admin.productsAll');
    Route::get('product/create', [ProductController::class, 'productCreate'])->name('admin.productCreate');
    Route::post('product/store', [ProductController::class, 'productStore'])->name('admin.productStore');
    Route::get('product/edit/{product}', [ProductController::class, 'productEdit'])->name('admin.productEdit');
    Route::post('product/update/{product}', [ProductController::class, 'productUpdate'])->name('admin.productUpdate');
    Route::post('product/delete/{product}', [ProductController::class, 'productDelete'])->name('admin.productDelete');
    Route::get('product/status/{product}', [ProductController::class, 'productStatus'])->name('admin.productStatus');
    Route::get('product/tags', [ProductController::class, 'productTags'])->name('admin.productTags');
    Route::get('product/search/type/{type}', [ProductController::class, 'productSearch'])->name('admin.productSearch');
    Route::get('product/add/stock/{product}', [ProductController::class, 'productAddStock'])->name('admin.productAddStock');


    Route::get('order/list', [ProductController::class, 'orderList'])->name('admin.orderList');
    Route::get('order/details/{order}', [ProductController::class, 'orderDeatils'])->name('admin.orderDeatils');
    Route::post('order/status/{order}', [ProductController::class, 'orderStatus'])->name('admin.orderStatus');
    Route::post('order/payment/{order}', [ProductController::class, 'orderPayment'])->name('admin.orderPayment');
    Route::post('order/item/delete/{orderItem}', [ProductController::class, 'orderItemDelete'])->name('admin.orderItemDelete');
    Route::post('update/qty/{item}', [ProductController::class, 'updateQty'])->name('updateQty');
    Route::get('invoice/print/{order}', [ProductController::class, 'orderPrint'])->name('admin.orderPrint');


});




Route::get('/logout',[AuthController::class,'logOut'])->name('logout');



Route::middleware(['userRole:admin','auth'])->prefix('admin')->group(function(){

    //admin
    Route::get('dashboard',[HomeController::class,'index'])->name('admin.dashboard');
    Route::get('select/tags/',[HomeController::class,'selectTagsOrAddNew'])->name('admin.tags');
    Route::get('select/authors/',[HomeController::class,'selectAuthorsOrAddNew'])->name('admin.authors');
   
    Route::get('websiteparam',[WebsiteParameterController::class,'websiteparam'])->name('websiteparam');
    Route::post('websiteparam/update/{id}',[WebsiteParameterController::class,'update'])->name('websiteparam.update');
    
    
    //role assign
    Route::get('all/users',[UserRoleController::class,'allUser'])->name('admin.all_user');
    Route::get('assign/role',[UserRoleController::class,'userRole'])->name('admin.assign-role');
    Route::post('assign/role',[UserRoleController::class,'assignRole'])->name('admin.assign-role');
    Route::get('manage/role',[UserRoleController::class,'manageRole'])->name('admin.manage-role');
    Route::get('edit/role/{id}',[UserRoleController::class,'editRole'])->name('admin.edit-role');
    Route::post('update/role/{id}',[UserRoleController::class,'updateRole'])->name('admin.update-role');
    Route::get('delete/role/{id}',[UserRoleController::class,'deleteRole'])->name('admin.delete-role');

    //user
    Route::get('users',[UserController::class,'index'])->name('admin.user');
    Route::get('user/create',[UserController::class,'create'])->name('admin.create-user');
    Route::post('user/create',[UserController::class,'store'])->name('admin.create-user');
    Route::get('user/show/{id}',[UserController::class,'show'])->name('admin.show-user');
    Route::get('user/edit/{id}',[UserController::class,'edit'])->name('admin.edit-user');
    Route::post('user/update/{id}',[UserController::class,'update'])->name('admin.update-user');
    Route::get('user/delete/{id}',[UserController::class,'delete'])->name('admin.delete-user');
    Route::post('user/change-password/{id}',[UserController::class,'changePassword'])->name('admin.user.change-password');


    //search alllllllllllllllllllllll
    Route::get('global-search-ajax/type/{type}/parameter/{parameter?}',[SearchController::class,'globalSearchAjax'])->name('admin.global-search-ajax');



    //FrontSlider
    Route::resource('sliders', FrontSliderController::class);

    //galleries
    Route::resource('galleries', GalleryController::class);
    Route::get('image-item-delete/{ImageItemDelete}', [GalleryController::class,'imageItemDelete'])->name('imageItemDelete');
    Route::get('image-item-description/update/{ImageItemUpdate}', [GalleryController::class,'itemDescriptionUpdate'])->name('itemDescriptionUpdate');

   
    Route::resource('shipping', ShippingMethodController::class);



  /*
    |--------------------------------------------------------------------------
    | Menu Routes
    |--------------------------------------------------------------------------
    */

    // View all menus
    Route::get('menus/all', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menusAll',
        'as' => 'admin.menusAll'
    ]);

    // Store a new menu
    Route::post('menu/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuStore',
        'as' => 'admin.menuStore'
    ]);

    // Edit an existing menu
    Route::get('menu/edit/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuEdit',
        'as' => 'admin.menuEdit'
    ]);

    // Update a specific menu
    Route::post('menu/update/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuUpdate',
        'as' => 'admin.menuUpdate'
    ]);

    // View a specific menu
    Route::get('menu/show/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuShow',
        'as' => 'admin.menuShow'
    ]);

    // Delete a menu
    Route::post('menu/delete/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuDelete',
        'as' => 'admin.menuDelete'
    ]);

    // Sort menus
    Route::get('menu/sort', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuSort',
        'as' => 'admin.menuSort'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Page Routes
    |--------------------------------------------------------------------------
    */

    // View all pages
    Route::get('pages/all', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pagesAll',
        'as' => 'admin.pagesAll'
    ]);

    // Store a new page
    Route::post('page/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageStore',
        'as' => 'admin.pageStore'
    ]);

    // Edit an existing page
    Route::get('page/edit/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageEdit',
        'as' => 'admin.pageEdit'
    ]);

    // Update a specific page
    Route::post('page/update/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageUpdate',
        'as' => 'admin.pageUpdate'
    ]);

    // Delete a specific page
    Route::get('page/delete/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageDelete',
        'as' => 'admin.pageDelete'
    ]);

    // Sort pages
    Route::get('page/sort', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageSort',
        'as' => 'admin.pageSort'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Page Item Routes
    |--------------------------------------------------------------------------
    */

    // Show form to create a new page item for a specific page
    Route::get('page/{page}/pageItem/create', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemCreate',
        'as' => 'admin.pageItemCreate'
    ]);

    // Store a new page item
    Route::post('pageItem/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemStore',
        'as' => 'admin.pageItemStore'
    ]);

    // Edit a specific page item
    Route::get('pageItem/edit/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemEdit',
        'as' => 'admin.pageItemEdit'
    ]);

    // Update a specific page item
    Route::post('pageItem/update/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemUpdate',
        'as' => 'admin.pageItemUpdate'
    ]);

    // Delete a specific page item
    Route::get('pageItem/delete/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemDelete',
        'as' => 'admin.pageItemDelete'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Menu/Page Search Route
    |--------------------------------------------------------------------------
    */

     // Search for menu/pages by type
    Route::get('menupage/search/type/{type}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menupageSearch',
        'as' => 'admin.menupageSearch'
    ]);




    Route::resource('categories',CategoryController::class);
    Route::post('category/active',[CategoryController::class,'categoryActive'])->name('category.active');

 
    //BlogPost
    Route::resource('news',PostController::class);
    Route::post('news/active',[PostController::class,'newsActive'])->name('news.active');
    Route::get('medias-ajax',[MediaController::class,'getMediasAjax'])->name('medias.getMediasAjax');

    //BisesoggoCategory
    Route::resource('departments',DepartmentController::class);
    Route::post('/departments/active',[DepartmentController::class,'departmentActive'])->name('departments.active');
    Route::resource('hospitals',HospitalController::class);
    Route::get('get/division',[HospitalController::class,'getDivision'])->name('get.division');
    Route::get('get/district',[HospitalController::class,'getDistrict'])->name('get.district');
    Route::post('/hospital/active',[HospitalController::class,'hospitalActive'])->name('hospital.active');
    Route::get('hospital/allvisits/{id}',[HospitalController::class,'hospitalAllVisits'])->name('hospital.allvisits');
    Route::get('hospital/alldoctors/{id}',[HospitalController::class,'hospitalAllDoctors'])->name('hospital.alldoctors');

    // Doctor
    Route::resource('doctors',DoctorController::class);
    Route::post('/doctor/active',[DoctorController::class,'DoctorActive'])->name('doctor.active');
   

    Route::resource('chambers',ChamberController::class);
Route::get('/doctor/{doctor}/chambers', [ChamberController::class, 'doctorChambers'])->name('doctor.chambers');

    Route::resource('ambulances',AmbulanceServiceController::class);
    Route::post('/ambulance/active',[AmbulanceServiceController::class,'ambulanceActive'])->name('ambulanceActive');
   


   
    Route::get('medias',[MediaController::class,'index'])->name('medias.index');
    Route::post('medias/store',[MediaController::class,'store'])->name('medias.store');
    Route::get('medias/destroy/{id}',[MediaController::class,'destroy'])->name('medias.destroy');

    Route::get('all/appointments',[HomeController::class,'allAppointments'])->name('allAppointments');
    Route::delete('delete/appointment/{id}',[HomeController::class,'deleteAppointment'])->name('deleteAppointment');





       // Category Routes
    Route::get('product/categories/all', [ProductController::class, 'productCategoriesAll'])->name('admin.productCategoriesAll');
    Route::get('product/category/create', [ProductController::class, 'productCategoryCreate'])->name('admin.productCategoryCreate');
    Route::post('product/category/store', [ProductController::class, 'productCategoryStore'])->name('admin.productCategoryStore');
    Route::get('product/category/edit/{category}', [ProductController::class, 'productCategoryEdit'])->name('admin.productCategoryEdit');
    Route::post('product/category/update/{category}', [ProductController::class, 'productCategoryUpdate'])->name('admin.productCategoryUpdate');
    Route::post('product/category/delete/{category}', [ProductController::class, 'productCategoryDelete'])->name('admin.productCategoryDelete');
    Route::get('category/status/{category}', [ProductController::class, 'categoryStatus'])->name('admin.categoryStatus');




   
    //  Product Routes
    Route::get('products/all', [ProductController::class, 'productsAll'])->name('admin.productsAll');
    Route::get('product/create', [ProductController::class, 'productCreate'])->name('admin.productCreate');
    Route::post('product/store', [ProductController::class, 'productStore'])->name('admin.productStore');
    Route::get('product/edit/{product}', [ProductController::class, 'productEdit'])->name('admin.productEdit');
    Route::post('product/update/{product}', [ProductController::class, 'productUpdate'])->name('admin.productUpdate');
    Route::post('product/delete/{product}', [ProductController::class, 'productDelete'])->name('admin.productDelete');
    Route::get('product/status/{product}', [ProductController::class, 'productStatus'])->name('admin.productStatus');
    Route::get('product/tags', [ProductController::class, 'productTags'])->name('admin.productTags');
    Route::get('product/search/type/{type}', [ProductController::class, 'productSearch'])->name('admin.productSearch');
    Route::get('product/add/stock/{product}', [ProductController::class, 'productAddStock'])->name('admin.productAddStock');


    Route::get('order/list', [ProductController::class, 'orderList'])->name('admin.orderList');
    Route::get('order/details/{order}', [ProductController::class, 'orderDeatils'])->name('admin.orderDeatils');
    Route::post('order/status/{order}', [ProductController::class, 'orderStatus'])->name('admin.orderStatus');
    Route::post('order/payment/{order}', [ProductController::class, 'orderPayment'])->name('admin.orderPayment');
    Route::post('order/item/delete/{orderItem}', [ProductController::class, 'orderItemDelete'])->name('admin.orderItemDelete');
    Route::post('update/qty/{item}', [ProductController::class, 'updateQty'])->name('updateQty');
    Route::get('invoice/print/{order}', [ProductController::class, 'orderPrint'])->name('admin.orderPrint');


});




Route::get('/logout',[AuthController::class,'logOut'])->name('logout');



Route::middleware(['userRole:admin','auth'])->prefix('admin')->group(function(){

    //admin
    Route::get('dashboard',[HomeController::class,'index'])->name('admin.dashboard');
    Route::get('select/tags/',[HomeController::class,'selectTagsOrAddNew'])->name('admin.tags');
    Route::get('select/authors/',[HomeController::class,'selectAuthorsOrAddNew'])->name('admin.authors');
   
    Route::get('websiteparam',[WebsiteParameterController::class,'websiteparam'])->name('websiteparam');
    Route::post('websiteparam/update/{id}',[WebsiteParameterController::class,'update'])->name('websiteparam.update');
    
    
    //role assign
    Route::get('all/users',[UserRoleController::class,'allUser'])->name('admin.all_user');
    Route::get('assign/role',[UserRoleController::class,'userRole'])->name('admin.assign-role');
    Route::post('assign/role',[UserRoleController::class,'assignRole'])->name('admin.assign-role');
    Route::get('manage/role',[UserRoleController::class,'manageRole'])->name('admin.manage-role');
    Route::get('edit/role/{id}',[UserRoleController::class,'editRole'])->name('admin.edit-role');
    Route::post('update/role/{id}',[UserRoleController::class,'updateRole'])->name('admin.update-role');
    Route::get('delete/role/{id}',[UserRoleController::class,'deleteRole'])->name('admin.delete-role');

    //user
    Route::get('users',[UserController::class,'index'])->name('admin.user');
    Route::get('user/create',[UserController::class,'create'])->name('admin.create-user');
    Route::post('user/create',[UserController::class,'store'])->name('admin.create-user');
    Route::get('user/show/{id}',[UserController::class,'show'])->name('admin.show-user');
    Route::get('user/edit/{id}',[UserController::class,'edit'])->name('admin.edit-user');
    Route::post('user/update/{id}',[UserController::class,'update'])->name('admin.update-user');
    Route::get('user/delete/{id}',[UserController::class,'delete'])->name('admin.delete-user');
    Route::post('user/change-password/{id}',[UserController::class,'changePassword'])->name('admin.user.change-password');


    //search alllllllllllllllllllllll
    Route::get('global-search-ajax/type/{type}/parameter/{parameter?}',[SearchController::class,'globalSearchAjax'])->name('admin.global-search-ajax');



    //FrontSlider
    Route::resource('sliders', FrontSliderController::class);

    //galleries
    Route::resource('galleries', GalleryController::class);
    Route::get('image-item-delete/{ImageItemDelete}', [GalleryController::class,'imageItemDelete'])->name('imageItemDelete');
    Route::get('image-item-description/update/{ImageItemUpdate}', [GalleryController::class,'itemDescriptionUpdate'])->name('itemDescriptionUpdate');

   
    Route::resource('shipping', ShippingMethodController::class);



  /*
    |--------------------------------------------------------------------------
    | Menu Routes
    |--------------------------------------------------------------------------
    */

    // View all menus
    Route::get('menus/all', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menusAll',
        'as' => 'admin.menusAll'
    ]);

    // Store a new menu
    Route::post('menu/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuStore',
        'as' => 'admin.menuStore'
    ]);

    // Edit an existing menu
    Route::get('menu/edit/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuEdit',
        'as' => 'admin.menuEdit'
    ]);

    // Update a specific menu
    Route::post('menu/update/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuUpdate',
        'as' => 'admin.menuUpdate'
    ]);

    // View a specific menu
    Route::get('menu/show/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuShow',
        'as' => 'admin.menuShow'
    ]);

    // Delete a menu
    Route::post('menu/delete/menu/{menu}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuDelete',
        'as' => 'admin.menuDelete'
    ]);

    // Sort menus
    Route::get('menu/sort', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menuSort',
        'as' => 'admin.menuSort'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Page Routes
    |--------------------------------------------------------------------------
    */

    // View all pages
    Route::get('pages/all', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pagesAll',
        'as' => 'admin.pagesAll'
    ]);

    // Store a new page
    Route::post('page/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageStore',
        'as' => 'admin.pageStore'
    ]);

    // Edit an existing page
    Route::get('page/edit/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageEdit',
        'as' => 'admin.pageEdit'
    ]);

    // Update a specific page
    Route::post('page/update/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageUpdate',
        'as' => 'admin.pageUpdate'
    ]);

    // Delete a specific page
    Route::get('page/delete/page/{page}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageDelete',
        'as' => 'admin.pageDelete'
    ]);

    // Sort pages
    Route::get('page/sort', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageSort',
        'as' => 'admin.pageSort'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Page Item Routes
    |--------------------------------------------------------------------------
    */

    // Show form to create a new page item for a specific page
    Route::get('page/{page}/pageItem/create', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemCreate',
        'as' => 'admin.pageItemCreate'
    ]);

    // Store a new page item
    Route::post('pageItem/store', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemStore',
        'as' => 'admin.pageItemStore'
    ]);

    // Edit a specific page item
    Route::get('pageItem/edit/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemEdit',
        'as' => 'admin.pageItemEdit'
    ]);

    // Update a specific page item
    Route::post('pageItem/update/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemUpdate',
        'as' => 'admin.pageItemUpdate'
    ]);

    // Delete a specific page item
    Route::get('pageItem/delete/pageItem/{pageItem}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@pageItemDelete',
        'as' => 'admin.pageItemDelete'
    ]);

    /*
    |--------------------------------------------------------------------------
    | Menu/Page Search Route
    |--------------------------------------------------------------------------
    */

     // Search for menu/pages by type
    Route::get('menupage/search/type/{type}', [
        'uses' => 'App\Http\Controllers\Admin\MenuPageController@menupageSearch',
        'as' => 'admin.menupageSearch'
    ]);




    Route::resource('categories',CategoryController::class);
    Route::post('category/active',[CategoryController::class,'categoryActive'])->name('category.active');

 
    //BlogPost
    Route::resource('news',PostController::class);
    Route::post('news/active',[PostController::class,'newsActive'])->name('news.active');
    Route::get('medias-ajax',[MediaController::class,'getMediasAjax'])->name('medias.getMediasAjax');

    //BisesoggoCategory
    Route::resource('departments',DepartmentController::class);
    Route::post('/departments/active',[DepartmentController::class,'departmentActive'])->name('departments.active');
    Route::resource('hospitals',HospitalController::class);
    Route::get('get/division',[HospitalController::class,'getDivision'])->name('get.division');
    Route::get('get/district',[HospitalController::class,'getDistrict'])->name('get.district');
    Route::post('/hospital/active',[HospitalController::class,'hospitalActive'])->name('hospital.active');
    Route::get('hospital/allvisits/{id}',[HospitalController::class,'hospitalAllVisits'])->name('hospital.allvisits');
    Route::get('hospital/alldoctors/{id}',[HospitalController::class,'hospitalAllDoctors'])->name('hospital.alldoctors');

    // Doctor
    Route::resource('doctors',DoctorController::class);
    Route::post('/doctor/active',[DoctorController::class,'DoctorActive'])->name('doctor.active');
   

    Route::resource('chambers',ChamberController::class);
Route::get('/doctor/{doctor}/chambers', [ChamberController::class, 'doctorChambers'])->name('doctor.chambers');

    Route::resource('ambulances',AmbulanceServiceController::class);
    Route::post('/ambulance/active',[AmbulanceServiceController::class,'ambulanceActive'])->name('ambulanceActive');
   


   
    Route::get('medias',[MediaController::class,'index'])->name('medias.index');
    Route::post('medias/store',[MediaController::class,'store'])->name('medias.store');
    Route::get('medias/destroy/{id}',[MediaController::class,'destroy'])->name('medias.destroy');

    Route::get('all/appointments',[HomeController::class,'allAppointments'])->name('allAppointments');
    Route::delete('delete/appointment/{id}',[HomeController::class,'deleteAppointment'])->name('deleteAppointment');





       // Category Routes
    Route::get('product/categories/all', [ProductController::class, 'productCategoriesAll'])->name('admin.productCategoriesAll');
    Route::get('product/category/create', [ProductController::class, 'productCategoryCreate'])->name('admin.productCategoryCreate');
    Route::post('product/category/store', [ProductController::class, 'productCategoryStore'])->name('admin.productCategoryStore');
    Route::get('product/category/edit/{category}', [ProductController::class, 'productCategoryEdit'])->name('admin.productCategoryEdit');
    Route::post('product/category/update/{category}', [ProductController::class, 'productCategoryUpdate'])->name('admin.productCategoryUpdate');
    Route::post('product/category/delete/{category}', [ProductController::class, 'productCategoryDelete'])->name('admin.productCategoryDelete');
    Route::get('category/status/{category}', [ProductController::class, 'categoryStatus'])->name('admin.categoryStatus');




   
    //  Product Routes
    Route::get('products/all', [ProductController::class, 'productsAll'])->name('admin.productsAll');
    Route::get('product/create', [ProductController::class, 'productCreate'])->name('admin.productCreate');
    Route::post('product/store', [ProductController::class, 'productStore'])->name('admin.productStore');
    Route::get('product/edit/{product}', [ProductController::class, 'productEdit'])->name('admin.productEdit');
    Route::post('product/update/{product}', [ProductController::class, 'productUpdate'])->name('admin.productUpdate');
    Route::post('product/delete/{product}', [ProductController::class, 'productDelete'])->name('admin.productDelete');
    Route::get('product/status/{product}', [ProductController::class, 'productStatus'])->name('admin.productStatus');
    Route::get('product/tags', [ProductController::class, 'productTags'])->name('admin.productTags');
    Route::get('product/search/type/{type}', [ProductController::class, 'productSearch'])->name('admin.productSearch');
    Route::get('product/add/stock/{product}', [ProductController::class, 'productAddStock'])->name('admin.productAddStock');


    Route::get('order/list', [ProductController::class, 'orderList'])->name('admin.orderList');
    Route::get('order/details/{order}', [ProductController::class, 'orderDeatils'])->name('admin.orderDeatils');
    Route::post('order/status/{order}', [ProductController::class, 'orderStatus'])->name('admin.orderStatus');
    Route::post('order/payment/{order}', [ProductController::class, 'orderPayment'])->name('admin.orderPayment');
    Route::post('order/item/delete/{orderItem}', [ProductController::class, 'orderItemDelete'])->name('admin.orderItemDelete');
    Route::post('update/qty/{item}', [ProductController::class, 'updateQty'])->name('updateQty');
    Route::get('invoice/print/{order}', [ProductController::class, 'orderPrint'])->name('admin.orderPrint');


});