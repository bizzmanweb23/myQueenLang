<?php

use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\MlmUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminShippingController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DeliveryChargeController;
use App\Http\Controllers\Admin\AdminMctPayController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ThanksController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminCouponController;
use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminBannerController;
use App\Http\Controllers\Admin\AdminPromotionController;
use App\Http\Controllers\Admin\AdminForcastController;
use App\Http\Controllers\Admin\AdminInventoryController;
use App\Http\Controllers\Admin\AdminInvoiceController;
use App\Http\Controllers\Admin\AdminReturnController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminBranchController;
use App\Http\Controllers\Admin\AdminAffilateMarketingController;
use App\Http\Controllers\Admin\AdminMatchingBonusController;
use App\Http\Controllers\Admin\AdminDirectSponserController;
use App\Http\Controllers\Admin\AdminLeadershipBonusController;
use App\Http\Controllers\Admin\AdminWithDrawController;
use Laravel\SerializableClosure\Serializers\Signed;
use App\Http\Controllers\MLM\MLMTreeController;
use App\Http\Controllers\MLM\MLMDirectBonus;
use App\Http\Controllers\MLM\MLMMatchingBonusController;
use App\Http\Controllers\MLM\MLMLeadershipController;
use App\Http\Controllers\MLM\MLMWithDrawController;
use App\Http\Controllers\MLM\MLMLoyalityPointsContoller;
use App\Http\Controllers\MLM\MLMPointsTransferContoller;
use App\Http\Controllers\User\UserProfileController;
use App\Http\Controllers\User\UserWalletController;
use App\Http\Controllers\User\UserPurchaseHistoryController;
use App\Http\Controllers\User\UserWishlistController;
use App\Http\Controllers\User\UserProductsController;
use App\Http\Controllers\UserWalletPayController;
use App\Http\Controllers\UpdateReferalContoller;
use Illuminate\Support\Facades\URL;
/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// for all country
use PragmaRX\Countries\Package\Countries;

Route::get('/country_list', function () {
    $countries = new Countries();
    $all = $countries->all()->pluck('name.common')->toArray();
    echo json_encode($all);
})->name('get_all_country');

Route::get('admin/login', [AdminAuthController::class, 'index'])->name('admin.login');
Route::post('admin/login', [AdminAuthController::class, 'store'])->name('admin.login.store');


Route::group([   'middleware' => 'Language'], function () {
	
	Route::get('/privacyPolicy',[FrontendController::class, 'privacyPolicy'])->name('privacyPolicy');
	Route::get('/change-language/{lang}',[FrontendController::class, 'changeLang']);
	Route::get('/about', [FrontendController::class, 'about']);
	Route::get('/products', [FrontendController::class, 'products'])->name('shop');
   // Route::get('/product/{id}', [FrontendController::class, 'productdetails'])->name('Product-Details');
	Route::get('/contact', [FrontendController::class, 'contact']);
	Route::get('/product/{id}', [MlmUserController::class, 'productdetails'])->name('Product-Details');
	Auth::routes();
	Route::prefix('mlm-user')->middleware('auth')->group(function () {

    Route::get('dashboard', [MlmUserController::class, 'index'])->name('Mlm-Dashboard');
    // User Details
    Route::get('/user-details', [MlmUserController::class, 'userDetailsView'])->name('User-Details');
    Route::post('/user-details-store', [MlmUserController::class, 'userDetailsStore'])->name('Store-User-Details');
    Route::post('/ranking', [MlmUserController::class, 'storeranking']);

    Route::get('/membership', [MlmUserController::class, 'membershipview'])->name('MemberShip-Selection');
    //Route::get('/product/{id}', [MlmUserController::class, 'productdetails'])->name('Product-Details');

    // Referal
    Route::get('/referal', [MlmUserController::class, 'sendmailview'])->name('Referal');
    Route::post('/share-referal', [MlmUserController::class, 'mailsend'])->name('Share-Referal');

    Route::post('/check-point',[MlmUserController::class,'checkPoint']);

    Route::get('/get_placement', [MlmUserController::class, 'get_placement'])->name('get_placement');
    Route::get('/get_placement_id', [MlmUserController::class, 'get_placement_id'])->name('get_placement_id');
});
Route::get('/placement', [MlmUserController::class, 'placement']);
Route::post('/placement', [MlmUserController::class, 'placementDetailsStore'])->name('Store-placement-Details')->middleware('auth');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->name('users.')->group(function () {

    Route::post('update_cart', [CartController::class, 'update_cart'])->name('update.cart')->middleware('signed');
    Route::post('delete_from_cart', [CartController::class, 'delete_from_cart'])->name('delete.cart')->middleware('signed');
    Route::resource('carts', CartController::class)->names([
        'store'     => 'cart.store',
        'create'    => 'cart.create',
        'index'     => 'cart.index'
    ])->middleware('signed');

    Route::post('/validate_form', [OrderController::class, 'validate_form'])->name('order.validate_form')->middleware('signed');
    Route::resource('order', OrderController::class)->names([
        'store' => 'order.store'
    ])->middleware('signed');

    Route::resource('delivery_charge', DeliveryChargeController::class)->names([
        'store' => 'delivery_charge.store'
    ])->middleware('signed');

    Route::resource('payment_option', PaymentController::class)->names([
        'store' => 'payment_option.store'
    ])->middleware('signed');

    Route::resource('coupon', CouponController::class)->names([
        'store' => 'coupon.store'
    ])->middleware('signed');

    Route::get('/redirect_thanks', [ThanksController::class, 'index'])->name('thank.index');
    Route::resource('thanks', ThanksController::class)->names([
        'show' => 'thank.show',
    ])->middleware('signed');


    Route::resource('address', AddressController::class)->names([
        'create' => 'address.create'
    ])->middleware('signed');
	
	 Route::get('/show_completed', [UserProfileController::class, 'show_completed'])->name('show_completed')->middleware('signed');
    Route::get('show_collect', [UserProfileController::class, 'show_collect'])->name('show_collect')->middleware('signed');
    Route::get('show_rate', [UserProfileController::class, 'show_rate'])->name('show_rate')->middleware('signed');

    Route::get('payment_history', [UserProfileController::class, 'payment_history'])->name('payment_history');
    Route::get('show_to_receive', [UserProfileController::class, 'show_to_receive'])->name('show_to_receive')->middleware('signed');
    Route::get('/show_pending_payment', [UserProfileController::class, 'show_pending_payment'])->name('show_pending_payment')->middleware('signed');
    Route::get('/show_to_ship', [UserProfileController::class, 'show_to_ship'])->name('show_to_ship')->middleware('signed');
    Route::get('/show_royalty', [UserWalletController::class, 'show_royalty_page'])->name('show_royalty')->middleware('signed');
    Route::any('/redeem_wallet_bonus', [UserWalletController::class, 'redeem_wallet_bonus'])->name('redeem_wallet_bonus');
    Route::any('/get_wallet_bonus', [UserWalletController::class, 'get_wallet_bonus'])->name('get_wallet_bonus');
    Route::any('/get_full_wallet_amount', [UserWalletController::class, 'get_full_wallet_amount'])->name('get_full_wallet_amount');
    Route::post('get_pv_history', [UserProfileController::class, 'get_pv_point_history'])->name('profile.get_pv_point_history')->middleware('signed');
    Route::resource('user_profile', UserProfileController::class)->names([
        'index' => 'profile.index',
        'store' => 'profile.store'
    ])->middleware('signed');


    Route::get('show_wallet_page', [UserWalletController::class, 'show_wallet_page'])->name('show_wallet_page')->middleware('signed');
    Route::post('get_qr_code_for_wallet', [UserWalletController::class, 'get_qr_code_for_wallet'])->name('get_qr_code_for_wallet')->middleware('signed');
    Route::post('store_wallet_payment', [UserWalletController::class, 'store_wallet_payment'])->name('store_wallet_payment')->middleware('signed');
    Route::get('get_all_payment', [UserWalletController::class, 'get_all_payment'])->name('get_all_payment')->middleware('signed');
    
    Route::any('credit_wallet_pay',[UserWalletPayController::class,'credit_wallet_pay'])->name('credit_wallet_pay');
	Route::any('credit_wallet_final_payment',[UserWalletPayController::class,'credit_wallet_final_payment'])->name('credit_wallet_final_payment');
	
	Route::get('purchase_history', [UserPurchaseHistoryController::class, 'index'])->name('purchase_history.index');
    Route::resource('shoW_purchase_history', UserPurchaseHistoryController::class)->names([
        'show' => 'purchase_history.show'
    ])->middleware('signed');
	
	Route::resource('invoice', AdminInvoiceController::class)->names([
    'show' => 'invoice.show'
]);

   Route::get('/product-details/{id}', [UserProductsController::class, 'show'])->name('product_details.show')->middleware(['signed', 'LangSwitch']);
Route::get('/product_details', [UserProductsController::class, 'index'])->name('product_details.index');
Route::post('get_product_details', [UserProductsController::class, 'create'])->name('product_details.create')->middleware(['signed', 'LangSwitch']);
Route::get('/show_product_rating', [UserProductsController::class, 'show_product_rating'])->name('product_details.show_product_rating');

Route::resource('whishlist', UserWishlistController::class)->names([
        'index'   => 'wishlist.index',
        'store'   => 'wishlist.store',
        'create'  => 'wishlist.create'
    ])->middleware('signed');

});
Route::middleware(['auth'])->name('MLM.')->prefix('MLM')->group(function () {

 Route::resource('tree', MLMTreeController::class)->names([
        'index' => 'tree.index',
        'create' => 'tree.create'
    ])->middleware('signed');
	
 Route::resource('direct-bonus', MLMDirectBonus::class)->names([
        'index' => 'direct_bonus.index',
        'create' => 'direct_bonus.create'
    ]);
	
  Route::resource('matching-bonus', MLMMatchingBonusController::class)->names([
        'index' => 'matching_bonus.index',
        'create' => 'matching_bonus.create',
    ]);

    Route::resource('leadership-bonus-details', MLMLeadershipController::class)->names([
        'index' => 'leadership_bonus_details.index',
        'create' => 'leadership_bonus_details.create',
    ]);
	
	Route::any('/deducated_bonus', [MLMWithDrawController::class, 'deducated_bonus'])->name('deducated_bonus');

    Route::any('/get_bonus_details', [MLMWithDrawController::class, 'get_bonus_details'])->name('get_bonus_details');

    Route::resource('withdrawform', MLMWithDrawController::class)->names([
        'index'  => 'withdrawform.index',
        'create' => 'withdrawform.create'
    ]);
	
	Route::resource('loyalitypoints_withdraw', MLMLoyalityPointsContoller::class)->names([
        'index'  => 'loyalitypoints_withdraw.index',
        'create' => 'loyalitypoints_withdraw.create'
    ]);
    
    Route::any('/transfer_funds_history', [MLMPointsTransferContoller::class, 'transfer_funds_history'])->name('transfer_funds_history');
    Route::any('/store_transfer_funds', [MLMPointsTransferContoller::class, 'store_transfer_funds'])->name('store_transfer_funds');
	Route::resource('transfer_points', MLMPointsTransferContoller::class)->names([
        'index'  => 'transfer_points.index',
        'store' => 'transfer_points.store'
    ]);

    // End Loyality Points withdraw

    //start Loyality Points withdraw
    Route::any('/redeem_loyality_bonus', [MLMLoyalityPointsContoller::class, 'redeem_loyality_bonus'])->name('redeem_loyality_bonus');
    Route::any('/redeem_full_loyality_bonus', [MLMLoyalityPointsContoller::class, 'redeem_full_loyality_bonus'])->name('redeem_full_loyality_bonus');
    Route::any('/get_loyalitypoint_history', [MLMLoyalityPointsContoller::class, 'get_loyalitypoint_history'])->name('get_loyalitypoint_history');
    Route::resource('loyalitypoints_withdraw', MLMLoyalityPointsContoller::class)->names([
        'index'  => 'loyalitypoints_withdraw.index',
        'create' => 'loyalitypoints_withdraw.create',
        'store' => 'loyalitypoints_withdraw.store'
    ]);
 
 });
 
 Route::any('/updateReferal', [UpdateReferalContoller::class, 'updateReferal'])->name('updateReferal');
    Route::prefix('admin')->name('admin.')->middleware('auth:admin')->group(function () {
    Route::resource('/Dashboard', AdminController::class)->names([
        'index' => 'dashboard.index'
    ]);
	
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');
});
	Route::get('/',[FrontendController::class, 'index'])->name('index');
 
     Route::prefix('admin')->group(function () {
            
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::get('/shipping-charge', [AdminShippingController::class, 'ShippingView'])->name('Shippng-Charge');
    Route::post('/shipping-charge', [AdminShippingController::class, 'ShippingStore'])->name('Store-Shipping');
    Route::post('/update-shipping/{id}', [AdminShippingController::class, 'UpdateShipping'])->name('Update-Shipping');
    Route::get('/delete/{id}', [AdminShippingController::class, 'destroy'])->name('Delete-Shipping');


    // Users
    Route::get('/users', [AdminUserController::class, 'index'])->name('Users');
    Route::any('edit_users', [AdminUserController::class, 'edit_users'])->name('edit_users');
	Route::any('save_users_details', [AdminUserController::class, 'save_users_details'])->name('save_users_details');


     // order details
    Route::get('/download_invoice/{id}', [AdminOrderController::class, 'downloadInvoic'])->name('download.order.invoice');
   // Route::get('/order_details', [AdminOrderController::class, 'index'])->name('View-order_details');
    //Route::get('/order_details/{id}',[AdminOrderController::class,'show_order_details'])->name('show_order_details');
    Route::post('delete_order', [AdminOrderController::class, 'delete_Order'])->name('delete_order')->middleware('signed');
    Route::resource('ad_all_orders', AdminOrderController::class)->names([
        'index'     => 'orders.index',
        'create'    => 'orders.create',
        'store'     => 'orders.change_status'
    ])->middleware('signed');
    Route::resource('order', 'OrderController')->middleware('auth');
    // end order details

    // Route::get('/orderDetails', [AdminOrderController::class, 'index'])->name('view-orderDetails');
    Route::get('/orderDetails/{id}',[AdminOrderController::class,'show_order_details'])->name('show_order_details');
    

    // order details
   // Route::get('/orders', [AdminOrderController::class, 'index'])->name('ad_all_orders');
    
    //Route::get('/download_invoice/{id}', [AdminOrderController::class, 'downloadInvoice'])->name('download.order.invoice');
    //Route::resource('order', 'OrderController')->middleware('auth');

  //Route::get('/ad_order_detils/{id}', [AdminOrderController::class, 'show_order_details'])->name('show_order_details');
    //Route::post('delete_order', [AdminOrderController::class, 'delete_Order'])->name('delete_order');
    
    //Route::resource('ad_all_orders', AdminOrderController::class)->names([
      //  'store'     => 'orders.store',
        //'create'    => 'orders.create',
        //'index'     => 'orders.index'
    //])->middleware('signed');


    Route::post('/validate_form', [AdminOrderController::class, 'validate_form'])->name('order.validate_form')->middleware('signed');
    Route::resource('order', AdminOrderController::class)->names([
        'store' => 'order.store'
    ])->middleware('signed');

    // end order details

    

    // coupon 
    Route::get('/coupon', [AdminCouponController::class, 'index'])->name('View-Coupon');
    Route::post('/create-coupon', [AdminCouponController::class, 'store'])->name('Create-Coupon');
    Route::get('/delete-coupon/{id}', [AdminCouponController::class, 'delete'])->name('Coupon-Delete');

    // Banner
    Route::get('/banner', [AdminBannerController::class, 'index'])->name('View-Banner');
    Route::post('/store-banner', [AdminBannerController::class, 'store'])->name('Store-Banner');
    Route::get('/delete-banner/{id}', [AdminBannerController::class, 'destroy'])->name('Delete-Banner');

    // Promotion
    Route::get('/promotion', [AdminPromotionController::class, 'index'])->name('View-Promotion');
    Route::post('/store-promotion', [AdminPromotionController::class, 'store'])->name('Store-Promotion');
    Route::get('/delete-promotion/{id}', [AdminPromotionController::class, 'destroy'])->name('Delete-Promotion');
    
    // invoice
    Route::resource('invoice', AdminInvoiceController::class)->names([
        'show' => 'invoice.show'
    ]);
    // end invoice


    // payment
    Route::get('payment_details/{id}', [AdminPaymentController::class, 'show'])->name('payment.show_details');
    Route::resource('payment', AdminPaymentController::class)->names([
        'index' => 'payment.index',
        'create' => 'payment.create',
        'store' => 'payment.store.approve'
    ])->middleware('signed');
    // end payment

    
    Route::get('mct_pay_show/{id}', [AdminMctPayController::class, 'show'])->name('mct.show');
    Route::resource('mct_pay', AdminMctPayController::class)->names([
        'create' => 'mct.create',
        'store' => 'mct.store'
    ])->middleware('signed');
    
    //  Logout
    Route::get('/logout', function () {
        Auth::logout();
        Session::flush();
        return redirect('admin');
    });
	
	Route::post('/delete_warehouse', [AdminInventoryController::class, 'delete_ware_house'])->name('ware_house.delete');
    Route::post('/addWarehouse', [AdminInventoryController::class, 'addWarehouse'])->name('addWarehouse');
    Route::get('/showWareHouse', [AdminInventoryController::class, 'showWareHouse'])->name('showWareHouse');
    Route::post('/addRack', [AdminInventoryController::class, 'addRack'])->name('addRack');
    Route::get('/warehouse_with_rack', [AdminInventoryController::class, 'showRack'])->name('showRack');
    Route::get('/getAllWarehouseDetails', [AdminInventoryController::class, 'getAllWarehouseDetails'])->name('getAllWarehouseDetails');
    Route::get('/showeditinventory', [AdminInventoryController::class, 'showeditinventoryData'])->name('showeditinventoryData');
    Route::post('/updateInventory', [AdminInventoryController::class, 'updateInventory'])->name('updateInventory');
    Route::post('/inventory/delete', [AdminInventoryController::class, 'deleteInventory'])->name('inventory.delete');
    Route::resource('inventory', AdminInventoryController::class)->names([
        'index'     => 'inventory.index',
        'store'     => 'inventory.store',
        'create'    => 'inventory.create',
    ]);


    Route::get('/getReturnData', [AdminReturnController::class, 'showReturnDataById'])->name('return.showData');
    Route::post('/updateRetutn', [AdminReturnController::class, 'updateReturn'])->name('return.updateReturn');
    Route::post('/deleteRetutn', [AdminReturnController::class, 'deleteReturn'])->name('retutn.delete');
    Route::resource('product/return', AdminReturnController::class)->names([
        'index' => 'return.index',
        'store' => 'return.store',
        'create' => 'return.create'
    ]);


    Route::resource('forcast', AdminForcastController::class)->names([
        'index' => 'forcast.index'
    ]);


    Route::get('category/showEditData', [AdminCategoryController::class, 'showEditData'])->name('category.showEditData');
    Route::post('categoty/update', [AdminCategoryController::class, 'updateCategory'])->name('category.updateCategory');
    Route::post('/deleteCategory', [AdminCategoryController::class, 'deleteCategory'])->name('category.deleteCategory');
    Route::resource('category', AdminCategoryController::class)->names([
        'index' => 'category.index',
        'store' => 'category.store'
    ]);

    Route::post('/get_edit_data', [AdminProductController::class, 'get_edit_data'])->name('product.get_edit_data')->middleware('signed');
    Route::post('/deleteProduct', [AdminProductController::class, 'deleteProduct'])->name('product.deleteProduct');
    Route::get('ad_categoryList', [AdminProductController::class, 'categoryList'])->name('product.categoryList');
    Route::resource('/adminproduct', AdminProductController::class)->names([
        'index'  => 'product.index',
        'create' => 'product.create',
        'edit'   => 'product.edit',
        'store'  => 'product.store',
        'update' => 'products.update'
    ]);

    Route::get('/showEditData', [AdminBranchController::class, 'showEditData'])->name('branch.showEditData');
    Route::post('updateBranch', [AdminBranchController::class, 'updateBranch'])->name('branch.updateBranch');
    Route::post('deleteBranch', [AdminBranchController::class, 'deleteBranch'])->name('branch.delete');
    Route::resource('branch', AdminBranchController::class)->names([
        'index' => 'branch.index',
        'store' => 'branch.store'
    ]);
	
	Route::get('category/showEditData', [AdminCategoryController::class, 'showEditData'])->name('category.showEditData');
    Route::post('categoty/update', [AdminCategoryController::class, 'updateCategory'])->name('category.updateCategory');
    Route::post('/deleteCategory', [AdminCategoryController::class, 'deleteCategory'])->name('category.deleteCategory');
    Route::resource('category', AdminCategoryController::class)->names([
        'index' => 'category.index',
        'store' => 'category.store'
    ]);
	
	Route::any('/get_direct_sponser', [AdminOrderController::class, 'get_direct_sponser']);
	Route::any('/commission-bonus', [AdminOrderController::class, 'commissionbonus']);
	
	Route::resource('getmatchingbonusdetails', AdminMatchingBonusController::class)->names([
        'index'  => 'getmatchingbonusdetails.index',
        'create'  => 'getmatchingbonusdetails.create'
    ]);
    Route::resource('getdirectsponserdetails', AdminDirectSponserController::class)->names([
        'index'  => 'getdirectsponserdetails.index',
        'create'  => 'getdirectsponserdetails.create'
    ]);

    Route::any('/get_affilate_details', [AdminAffilateMarketingController::class, 'get_affilate_details'])->name('get_affilate_details');
    Route::any('/view_affilate_details', [AdminAffilateMarketingController::class, 'view_affilate_details'])->name('view_affilate_details');
    Route::any('/edit_affilate_details', [AdminAffilateMarketingController::class, 'edit_affilate_details'])->name('edit_affilate_details');
    Route::resource('affilatemarketing', AdminAffilateMarketingController::class)->names([
        'index'  => 'affilatemarketing.index',
        'create' => 'affilatemarketing.create',
    ]);
    Route::resource('getleadershipbonusdetails', AdminLeadershipBonusController::class)->names([
        'index'  => 'getleadershipbonusdetails.index',
        'create'  => 'getleadershipbonusdetails.create'
    ]);

    // end affilate marketing

    //start withdraw bonus
    //Route::get('/approvewithdraw', [AdminOrderController::class, 'approvewithdraw']);
    Route::get('/approvewithdraw', [AdminWithDrawController::class, 'approvewithdraw'])->name('approvewithdraw');
    Route::get('/view_user_details', [AdminWithDrawController::class, 'view_user_details'])->name('view_user_details');
    Route::resource('withdrawbonus', AdminWithDrawController::class)->names([
        'index'  => 'withdrawbonus.index',
        'create' => 'withdrawbonus.create'
    ]);
    // end withdraw bonus

    Route::resource('getleadershipbonusdetails', AdminLeadershipBonusController::class)->names([
        'index'  => 'getleadershipbonusdetails.index',
        'create'  => 'getleadershipbonusdetails.create'
    ]);

    // end affilate marketing

    //start withdraw bonus
    //Route::get('/approvewithdraw', [AdminOrderController::class, 'approvewithdraw']);
    Route::get('/approvewithdraw', [AdminWithDrawController::class, 'approvewithdraw'])->name('approvewithdraw');
    Route::resource('withdrawbonus', AdminWithDrawController::class)->names([
        'index'  => 'withdrawbonus.index',
        'create' => 'withdrawbonus.create'
    ]);
    // end withdraw bonus

	Route::resource('getleadershipbonusdetails', AdminLeadershipBonusController::class)->names([
	'index'  => 'getleadershipbonusdetails.index',
	'create'  => 'getleadershipbonusdetails.create'
	 ]);
	
	// end affilate marketing
	
	//start withdraw bonus
	//Route::get('/approvewithdraw', [AdminOrderController::class, 'approvewithdraw']);
	Route::get('/approvewithdraw', [AdminWithDrawController::class, 'approvewithdraw'])->name('approvewithdraw');
	Route::resource('withdrawbonus', AdminWithDrawController::class)->names([
        'index'  => 'withdrawbonus.index',
        'create' => 'withdrawbonus.create'
    ]);	
	// end withdraw bonus
	});
});

// Placement


// Route::get('/get_placement', [MlmUserController::class, 'get_placement'])->name('get_placement');
// Route::get('/get_placement_id', [MlmUserController::class, 'get_placement_id'])->name('get_placement_id');


//Auth::routes();



//Route::get('/product/{id}', [MlmUserController::class, 'productdetails'])->name('Product-Details');






 // invoice
 
// end invoice



// all admin part here

    //Route::get('admin', AdminController@ index);


Route::get('/d', function () {
    return view('demo');
});
