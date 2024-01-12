<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', 'UserProfileController@index')->middleware(['auth'])->name('dashboard');

/* User Profile */
Route::resource("userinformation", UserInformationController::class);
Route::resource("userinformationupdate", UserInformationUpdateController::class);
Route::resource("useraddresses", UserAddressController::class);
Route::resource("userorders", UserOrdersController::class);
Route::post('/create', 'ProfileController@store')->name('store');
Route::get('/address/{id}', 'ProfileController@destroy')->name('address.destroy');
/* End User Profile */

require __DIR__.'/auth.php';

Route::get('/setLocale/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
});

Route::group([
    'prefix'     => 'admin',
    'middleware' => ['auth', 'role:admin,operator'],
    'namespace'  => 'Admin',
], function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });
    Route::get('/admindashboard', 'AuthController@dashboard')->name('admin.dashboard');
    Route::get('/adminlogout', 'AuthController@logout')->name('admin.logout');
    Route::get('/adminprofile', '\\App\\Http\\Controllers\\Controller@profile')->name('admin.profile');
    Route::post('/adminprofile/post', '\\App\\Http\\Controllers\\Controller@profilePost')->name('admin.profile.post');
    Route::get('/orderProduct/export', 'OrderProductController@export')->name('orderProduct.export');
    Route::get('/offerProduct/export', 'OfferProductController@export')->name('offerProduct.export');
    Route::resource("orderProduct", OrderProductController::class)->except(['store', 'create', 'update', 'edit']);
    Route::post('/orderProduct/status', 'OrderProductController@status');
    Route::post('/orderProduct/pendingswitch', 'OrderProductController@pendingswitch');
    Route::post('/update-quantity', 'OrderProductController@show')->name('update-quantity');
    Route::get('/orderView/export/{id}', 'OrderProductController@exports')->name('orderView.export');

    Route::resource("offerProduct", OfferProductController::class)->except(['store', 'create', 'update', 'edit']);
    Route::post('/offerProduct/status', 'OfferProductController@status');

});

/*============ Admin routes =============*/
Route::get('/admin/adminlogin', 'Admin\\AuthController@login')->name('admin.login');
Route::post('/admin/adminpostLogin', 'Admin\\AuthController@postLogin')->name('admin.postLogin');
Route::group([
    'prefix'     => 'admin',
    'middleware' => ['auth', 'role:admin'],
    'namespace'  => 'Admin',
], function () {
    Route::resource("category", CategoryController::class);
    Route::resource("subcategory", SubcategoryController::class);
    Route::resource("subsubcategory", SubsubcategoryController::class);
    Route::resource("attribute", AttributeController::class);
    Route::get('/product/export', 'ProductController@export')->name('product.export');
    Route::post('/product/import', 'ProductController@import')->name('product.import');
    Route::get('/export', 'CategoryController@export')->name('category.export');
    Route::get('/exports', 'SubCategoryController@export')->name('subcategory.export');
    Route::get('/export-brand', 'BrandController@export')->name('brand.export');
    Route::resource("product", ProductController::class);
    Route::resource("unit", UnitController::class);
    Route::resource("rate", RateController::class);
    Route::resource("setting", SettingController::class);
    Route::resource("shop", ShopController::class)->except(['store', 'create', 'update', 'edit']);
    Route::post('/shop/status', 'ShopController@status');
    Route::resource("shopProduct", shopProductController::class);
    Route::resource("banner", BannerController::class);
    Route::resource("brand", BrandController::class);
    Route::resource("userDiscount", UserDiscountController::class);
    Route::get('/listproduct', 'UserDiscountController@listproduct')->name('listproduct');
    Route::get('/discountedusers', 'UserDiscountController@discountedusers')->name('discountedusers');
    Route::get('/dontdiscountedusers', 'UserDiscountController@dontdiscountedusers')->name('dontdiscountedusers');
    Route::post('/search-products', 'UserDiscountController@productsearch')->name('search-products');
    Route::post('/productstore', 'UserDiscountController@productstore')->name('productstore');
    Route::post('/productupdate/{id}', 'UserDiscountController@productupdate')->name('productupdate');
    Route::get('/pagination/fetch_data', 'UserDiscountController@fetch_data');
    Route::get('/sessionforget', 'UserDiscountController@sessionforget')->name('sessionforget');
    Route::post('/userDiscountUpdate', 'UserDiscountController@userDiscountUpdate')->name('userDiscountUpdate');
    Route::post('/update-discount', 'UserDiscountController@updatediscount');
    Route::post('/user-discount-edit', 'UserDiscountController@update')->name('user-discount-edit');
    Route::delete('/proddelete', 'UserDiscountController@proddelete')->name('proddelete');
    Route::delete('/userdiscdelete/{id}', 'UserDiscountController@userdiscdelete')->name('userdiscdelete');
    Route::post('/search-users', 'UserDiscountController@usersearch')->name('search-users');
    Route::delete('/user-discount-delete/{id}', 'UserDiscountController@user_discount_delete')->name('user_discount_delete');
    Route::delete('/user-delete/{id}', 'UserDiscountController@destroy')->name('user-delete');
    Route::post('/save_data', 'UserDiscountController@save_data')->name('save_data');
    Route::resource("logo", LogoController::class)->except(['store', 'create']);
    Route::resource("feedBack", FeedBackController::class)->except(['store', 'create']);
    Route::resource("footerLogo", FooterLogoController::class)->except(['store', 'create']);
    Route::resource("magazineInformation", MagazineInformationController::class)->except(['store', 'create']);
    Route::resource("aboutUs", AboutUsController::class);
    Route::resource("orderUs", OrderUsController::class);
    Route::resource("guaranteeUs", GuaranteeUsController::class);
    Route::resource("deliveryUs", DeliveryUsController::class);
    Route::resource("pacet", PacetController::class);
    Route::post('/product/status', 'ProductController@status');
    Route::post('/category/status', 'CategoryController@status');
    Route::post('/subcategory/status', 'SubcategoryController@status');
    Route::post('/user/price_type', 'UserController@status');
    Route::post('/brand/status', 'BrandController@status');
    Route::post('/pacet/activation', 'PacetController@activation');
    Route::post("/sessionstore", 'PacetController@sessionstore')->name('sessionstore');
    Route::delete('/pacet-product-destroy/{id}', 'PacetController@pacetproductdestroy')->name('pacet_product_destroy');
    Route::post('/updates-productquantity', 'PacetController@updatesproductquantity')->name('updatesproductquantity');
    Route::post('/sessionstore', 'PacetController@sessionstore')->name('sessionstore');
    Route::resource("user", UserController::class);
    Route::resource("colorSetting", ColorSettingController::class)->except(['store', 'create']);
    Route::resource("map", MapController::class)->except(['store', 'create']);
    Route::resource("role", RoleController::class);
    Route::post('/download_pdf/{id}', 'OrderProductController@download_pdf')->name('download-pdf');
}); //end of admin route group
Route::get('/', 'IndexController@index')->name('index');
Route::resource("products", ProductController::class);
Route::resource("shops", ShopController::class);
Route::resource("contact", ContactController::class);
Route::resource("brands", BrandController::class);
Route::resource("userprofile", UserProfileController::class);
Route::resource("shop-data", ShopDataController::class);
Route::resource("product-detail", ProductDetailController::class);
Route::get('/product-category/{id}', 'ProductCategoryController@index')->name('product.category');
Route::resource("product-subcategory", ProductSubcategoryController::class);
Route::resource("product-subsubcategory", ProductSubsubcategoryController::class);
Route::get('/product-search', 'ProductController@search2')->name('product-search');
Route::resource("discountproduct", ProductAcsyController::class);
Route::get('/newproducts', 'NewProductController@index')->name('newproduct');
Route::get('/brandproducts', 'BrandController@index')->name('brandproduct');
Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/checkout', 'CheckoutController@index')->name('checkout');
Route::get('/offer', 'OfferController@index')->name('offer');
Route::post('/offer-store', 'OfferController@store')->name('offer-store');
Route::post('/order-store', 'CheckoutController@store')->name('order-store');
Route::post('/order-stores', 'CheckoutController@stores')->name('order-stores');
Route::get('/order-success', 'CheckoutController@order_success')->name('order-success');
Route::get('/user-order-view/{id}', 'UserOrdersController@show')->name('user-order-view');
Route::post('/order-store-load/{id}', 'UserOrdersController@update')->name('order-store-load');
Route::post('/order-edit', 'UserProfileController@store')->name('order-edit');
Route::get('/aboutUs', 'AboutUsController@index')->name('about-us');
Route::get('/sort/{filter}', function ($filter) {
    if ($filter === 'name' || $filter === 'price') {
        session(['sort' => $filter]);
    }
    return redirect()->back();
});

Route::get('/setlocale/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('language');

Route::get('/pacets/{id}', 'PacetController@show')->name('pacets');
Route::post('/update-productquantity', 'PacetController@updateproductquantity')->name('productquantity');
Route::get('/pacet-products', 'PacetController@search')->name('pacet-products');
Route::get('/pacet-products?pacet={pacet_slug}', 'PacetController@search')->name('products.pacet');
Route::get('/pacet-products?pacetProducts={id}', 'PacetController@search')->name('pacetProducts');

Route::post('/pacetproducts','PacetController@store')->name('store.pacetproducts');

Route::get('/tasks-fetchdata', 'PacetController@fetchdata')->name('tasks.fetchdata');

Route::get('/switch-status', 'PacetController@switch')->name('switchStatus');
Route::post('/search-pacetproducts', 'PacetController@productpacetsearch')->name('search-pacetproducts');
/* Searchfilter */
Route::get('/filter-products', 'ProductController@search')->name('filter-products');
Route::get('/products', 'ProductController@index')->name('products');
Route::get('/filter-products?brand={brand_slug}', 'ProductController@search')->name('products.brand');

Route::get('/filter-products/{category_slug}', 'ProductController@search')->name('products.category');
Route::get('/filter-products?subcategory={subcategory_slug}', 'ProductController@search')->name('products.subcategory');
Route::get('/filter-products?subsubcategory={subsubcategory_slug}', 'ProductController@search')->name('products.subsubcategory');
Route::get('/filter-products?attribute={attribute_id}', 'ProductController@search')->name('products.attribute');
Route::get('/filter-products?attributeValues={attributeValue_id}', 'ProductController@search')->name('products.attributeValues');
/* End search Filter */
Route::post('/activation', 'PacetController@statusCheck');
Route::post('/update-status', 'PacetController@updateStatus');
Route::get('add/to/cart/{id}','CartController@AddCart')->name('addcart');


Route::post('/add-to-cart', 'CartController@addProduct');

Route::delete('/cartdestroy/{id}', 'CartController@destroy');
Route::delete('/cartdelete', 'CartController@delete')->name('cartdelete');
Route::post('/update-cart', 'CartController@updatecart');
Route::patch('/update-cartsession', 'CartController@updatecartsession')->name('update.cartsession');

Route::get('/config', function() {
    Artisan::call('config:cache');
});
Route::get('/optimize', function() {
    Artisan::call('optimize');
});

Route::get('/order-success', 'OrderSuccessController@index')->name('order-success');
Route::get('/order-successes', 'OrderSuccessController@order_successes')->name('order-successes');

Route::post('/download-pdf-guest', 'OrderSuccessController@download_pdf_guest')->name('download-pdf-guest');
Route::post('/download-pdf-registered', 'OrderSuccessController@download_pdf_registered')->name('download-pdf-registered');

