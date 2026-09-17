<?php

use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Dashboard\NominationController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\SiteMapController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|CategoriesFx
*/
Route::get('/', function () {
    return view('frontEnd.profx');
})->name('profx');
Route::get('/nomination', function () {
    return view('frontEnd.nomination');
})->name('nomination');

Route::get('/previewsevent', function () {
    return view('frontEnd.previewsevent');
})->name('previewsevent');

Route::get('/gallery', function () {
    return view('frontEnd.Gallery');
})->name('Gallery');

Route::get('/award', function () {
    return view('frontEnd.award');
})->name('award');

Route::get('/media', function () {
    return view('frontEnd.media');
})->name('media');

Route::get('/event', function () {
    return view('frontEnd.Event');
})->name('Event');
Route::get('/financial', function () {
    return view('frontEnd.financial');
})->name('financial');
Route::get('/Categories', function () {
    return view('frontEnd.CategoriesFx');
})->name('CategoriesFx');
Route::get('/categoriesaward', function () {
    return view('frontEnd.categoriesAwards');
})->name('categoriesAwards');
Route::get('/educationalAcademy', function () {
    return view('frontEnd.educationalAcademy');
})->name('educationalAcademy');
Route::get('/fintech', function () {
    return view('frontEnd.fintech');
})->name('fintech');

Route::get('/influencer', function () {
    return view('frontEnd.Influencer');
})->name('Influencer');

Route::get('/winner', function () {
    return redirect()->route('nomination');
})->name('winner');



// Language Route
Route::post('/lang', [LanguageController::class, 'index'])->middleware('LanguageSwitcher')->name('lang');
// For Language direct URL link
Route::get('/lang/{lang}', [LanguageController::class, 'change'])->middleware('LanguageSwitcher')->name('langChange');
Route::get('/locale/{lang}', [LanguageController::class, 'locale'])->middleware('LanguageSwitcher')->name('localeChange');
// .. End of Language Route

// Not Found
Route::get('/{lang?}/404', [HomeController::class, 'page_404'])->name('NotFound');


// RSS Feed Routes
if (config('smartend.rss_status')) {
    Route::feeds();
}

// Social Auth
Route::get('/oauth/{driver}', [SocialAuthController::class, 'redirectToProvider'])->name('social.oauth');
Route::get('/oauth/{driver}/callback', [SocialAuthController::class, 'handleProviderCallback'])->name('social.callback');

Route::Group(['prefix' => config('smartend.backend_path')], function () {
    Auth::routes();
});

// Add your custom routes here


// Start of Frontend Routes
// - site map
Route::get('/sitemap.xml', [SiteMapController::class, 'siteMap'])->name('siteMap');
Route::get('/{lang}/sitemap', [SiteMapController::class, 'siteMap'])->name('siteMapByLang');

// - Public form submit
Route::post('/form-submit', [HomeController::class, 'form_submit'])->name('formSubmit');

// - Newsletter form submit
Route::post('/subscribe', [HomeController::class, 'subscribe_submit'])->name('subscribeSubmit');

// - Comment form submit
Route::post('/comment', [HomeController::class, 'comment_submit'])->name('commentSubmit');

// - Order form submit
Route::post('/order', [HomeController::class, 'order_submit'])->name('orderSubmit');


// - Contact page form submit
Route::post('/contact-submit', [HomeController::class, 'contact_submit'])->name('contactPageSubmit');
Route::post('/', [HomeController::class, 'contact_submited'])->name('contactPageSubmited');

// - Nominations
Route::get('nominations', [NominationController::class,'index'])->name('nominations.index');

Route::post('nominations/store', [NominationController::class,'store'])->name('nominations.store');




// - Tags
Route::get('/tag/{tag_slug?}', [HomeController::class, 'tag'])->name('tag');

// - All Other slugs
Route::get('/{part1?}/{part2?}/{part3?}/{part4?}/{part5?}/{part6?}', [HomeController::class, 'seo'])->name("frontendRoute");
// End of Frontend Route
