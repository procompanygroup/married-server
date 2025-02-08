<?php


use App\Http\Controllers\Web\ChatController;
use App\Http\Controllers\Web\ClientPackageController;
use App\Http\Controllers\Web\ClientReportController;
use App\Http\Controllers\Web\NotificationController;
use App\Http\Controllers\Web\OptionGroupController;
use App\Http\Controllers\Web\OptionValueController;
use App\Http\Controllers\Web\OrderController;
use App\Http\Controllers\Web\ReportOptionController;
use App\Http\Controllers\Web\VisitorController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\LanguageController;

use App\Http\Controllers\Web\MediaStoreController;
use App\Http\Controllers\Web\SettingController;
use App\Http\Controllers\Web\LocationController;
use App\Http\Controllers\Web\PostController;
use App\Http\Controllers\Web\CategoryController;
use App\Http\Controllers\Web\LangPostController;
use App\Http\Controllers\Web\MediaPostController;
//use App\Http\Controllers\Web\MailController;
use App\Http\Controllers\Web\ClientController;
//use  App\Http\Controllers\Web\ClientAuthController;

use App\Http\Controllers\Web\SocialController;
use App\Http\Controllers\Auth\SocialiteController;

use App\Http\Controllers\Web\TranslateController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Web\PasswordController;
use App\Http\Controllers\Web\ClientPasswordResetController;
use App\Http\Controllers\Web\PropertyController;
use App\Http\Controllers\Web\PropertyDepController;
use App\Http\Controllers\Web\CountryController;

//site
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Web\SearchController;

use App\Http\Controllers\Web\CodeController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Web\FavoriteController;
use App\Http\Controllers\Web\ClientSettingController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Web\PrivateImageController;
use App\Http\Controllers\Web\PackageController;

use App\Http\Controllers\Web\PaymentController;

//use Illuminate\Support\Facades\Facade\Artisan;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);


Route::get('/error500', [HomeController::class, 'error500'])->name('error500');
Route::get('/', [HomeController::class, 'index'])->name('site.home');

Route::get('/clear', function () {
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('optimize');
    return 'ok';
});

Route::get('/storagelink', function () {
    $exitCode = Artisan::call('storage:link');
    return 'ok';
});

Route::get('/cashclear', function () {
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:clear');
    return 'ok';
});

Route::middleware(['auth:web', 'verified'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    // Route::any('/search', [QuestionController::class, 'search']);

    Route::middleware('role.admin:admin')->group(function () {
        Route::resource('user', UserController::class, ['except' => ['update']]);
        Route::prefix('user')->group(function () {
            Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
            Route::get('/editprofile/{id}', [UserController::class, 'editprofile'])->name('user.editprofile');
            Route::post('/updateprofile/{id}', [UserController::class, 'updateprofile'])->name('user.updateprofile');

        });
        ////////////////social///////////////////////

        // Route::resource('social', SocialController::class, ['except' => ['update']]);
        // Route::prefix('social')->group(function () {
        //     Route::post('/update/{id}', [SocialController::class, 'update'])->name('social.update');

        // });
        /////////////////////////////////////////
        Route::resource('language', LanguageController::class, ['except' => ['update']]);
        Route::prefix('language')->group(function () {
            Route::post('/update/{id}', [LanguageController::class, 'update'])->name('language.update');

        });
        Route::prefix('mediastore')->group(function () {
            Route::get('/getbyid/{id}', [MediaStoreController::class, 'getbyid']);
            Route::delete('/destroyimage/{id}', [MediaStoreController::class, 'destroyimage']);

            //category post
            Route::get('/getcatgallery/{id}', [MediaStoreController::class, 'getcatgallery']);
            Route::get('/getcatvideo/{id}', [MediaStoreController::class, 'getcatvideo']);
            Route::get('/getpostgallery/{id}', [MediaStoreController::class, 'getpostgallery']);
            Route::get('/getpostvideo/{id}', [MediaStoreController::class, 'getpostvideo']);
            Route::get('/getcatpdf/{id}', [MediaStoreController::class, 'getcatpdf']);
        });

        Route::prefix('setting')->group(function () {

            Route::post('/updatetitle', [SettingController::class, 'updatetitle']);
            Route::post('/updatefav', [SettingController::class, 'updatefav']);
            Route::post('/updatelogo', [SettingController::class, 'updatelogo']);
            // Route::post('/updatewhats', [SettingController::class, 'updatewhats']);
            Route::post('/updatelocation', [SettingController::class, 'updatelocation']);
            Route::post('/updatecontactemail', [SettingController::class, 'updatecontactemail']);

            Route::get('/translate', [TranslateController::class, 'translate']);
            ///////////////////////// saraha
            Route::get('/general', [SettingController::class, 'index']);
            //////////////siteinfo
            Route::get('/siteinfo', [SettingController::class, 'getbasic']);
            //  Route::get('/editinfo', [SettingController::class, 'editinfo']);
            Route::post('/updateinfo/{id}', [SettingController::class, 'updateinfo']);
            //////////////header
            Route::get('/head', [SettingController::class, 'getheadinfo']);
            Route::get('/createhead', [SettingController::class, 'createhead']);
            Route::post('/storehead', [SettingController::class, 'storehead']);

            Route::post('/updatehead/{id}', [SettingController::class, 'updatehead']);
            Route::delete('/delhead/{id}', [SettingController::class, 'destroy']);
            //////////////footer
            Route::get('/footer', [SettingController::class, 'footerinfo']);
            Route::get('/createfooter', [SettingController::class, 'createfooter']);
            Route::post('/storefooter', [SettingController::class, 'storefooter']);
            Route::post('/updatefooter/{id}', [SettingController::class, 'updatefooter']);
            Route::delete('/delfooter/{id}', [SettingController::class, 'delfooter']);
            //question
            //
            // Route::get('/question', [SettingController::class, 'quessetting']);
            // Route::post('/question/{id}', [SettingController::class, 'quesupdate']);
        });
        Route::resource('reportoption', ReportOptionController::class, ['except' => ['update']]);
        Route::prefix('reportoption')->group(function () {
            Route::post('/update/{id}', [ReportOptionController::class, 'update'])->name('reportoption.update');


        });
        //questions
        //category
        // Route::resource('categoryques', CategoryQuesController::class, ['except' => ['update']]);
        // Route::prefix('categoryques')->group(function () {
        //     Route::post('/update/{id}', [CategoryQuesController::class, 'update'])->name('categoryques.update');
        //     Route::get('/sort/{loc}', [LocationController::class, 'sortpage']);
        // });

        //Level
        // Route::resource('level', LevelController::class, ['except' => ['update']]);
        // Route::prefix('level')->group(function () {
        //     Route::post('/update/{id}', [LevelController::class, 'update'])->name('level.update');

        // });
        //questions route
        // Route::resource('question', QuestionController::class, ['except' => ['update']]);
        // Route::prefix('question')->group(function () {
        //     Route::post('/update/{id}', [QuestionController::class, 'update'])->name('question.update');
        //     Route::any('/search', [QuestionController::class, 'search']);
        //     Route::get('result/{id}', [QuestionController::class, 'results']);
        // });
        // Route::prefix('answer')->group(function () {
        //     Route::post('/destroy/{id}', [AnswerController::class,'destroyans']);

        // });
        //footer
        Route::prefix('post')->group(function () {
            Route::post('/update/{id}', [PostController::class, 'update'])->name('post.update');
            Route::post('/updatefooter/{id}', [PostController::class, 'updatefooter'])->name('post.updatefooter');
            Route::get('/showbycatid/{id}', [PostController::class, 'showbycatid']);
            Route::get('/createbycatid/{id}', [PostController::class, 'createwithcatid']);
            Route::post('/storepost', [PostController::class, 'storepost']);
            Route::post('/updatepost/{id}', [PostController::class, 'updatepost']);
            Route::delete('/destroy/{id}', [PostController::class, 'destroy']);
            Route::get('/editpost/{id}', [PostController::class, 'editpost']);
            Route::post('/upload', [PostController::class, 'uploadLargeFiles'])->name('post.upload');
            ;

        });
        Route::prefix('langpost')->group(function () {
            Route::post('/update/{id}', [LangPostController::class, 'update'])->name('langpost.update');
            Route::post('/updatecategory/{id}', [LangPostController::class, 'updatelangcategory'])->name('langcategory.update');
            Route::post('/updatepropdep/{id}', [LangPostController::class, 'updatepropdep'])->name('langpost.updatepropdep');
            Route::post('/updateprop/{id}', [LangPostController::class, 'updateprop'])->name('langpost.updateprop');
            Route::post('/updateoption/{id}', [LangPostController::class, 'updateoption'])->name('langpost.updateoption');

        });

        //category menu
        Route::prefix('category')->group(function () {

            Route::post('/updatemenu/{id}', [CategoryController::class, 'updatemenu'])->name('category.updatemenu');

        });
        Route::prefix('page')->group(function () {
            Route::get('/', [CategoryController::class, 'index']);
            //////////////header
            Route::get('/create', [CategoryController::class, 'create']);
            Route::post('/store', [CategoryController::class, 'store']);
            Route::get('/edit/{id}', [CategoryController::class, 'edit']);

            Route::post('/update/{id}', [CategoryController::class, 'update']);
            Route::delete('/delete/{id}', [CategoryController::class, 'destroy']);
            //sort
            Route::get('/sort', [LocationController::class, 'showtable']);
            Route::get('/sort/{loc}', [LocationController::class, 'sortpage']);
            Route::get('/fillcombo/{loc}', [LocationController::class, 'getpagesforcombo']);
            Route::get('/fillsort/{loc}', [LocationController::class, 'fillsortpages']);
            Route::post('/updatesort/{loc}', [LocationController::class, 'updatepagesort']);

        });

        Route::prefix('mediapost')->group(function () {
            Route::post('/store/{id}', [MediaPostController::class, 'storeimages'])->name('mediapost.store');
            Route::post('/update/{id}', [MediaPostController::class, 'update'])->name('mediapost.update');
            Route::post('/storevideo/{id}', [MediaPostController::class, 'storevideo'])->name('mediapost.storevideo');
            Route::post('/updatevideo/{id}', [MediaPostController::class, 'updatevideo'])->name('mediapost.updatevideo');
        });

    });


    //question admin
    Route::prefix('translate')->group(function () {
        // Route::post('/update/{id}', [TranslateController::class, 'update'])->name('post.update');    
        Route::get('/showbycatid/{id}', [TranslateController::class, 'showbycatid']);
        Route::get('/create', [TranslateController::class, 'createwithcatid']);
        Route::post('/store', [TranslateController::class, 'storepost']);
        Route::post('/update/{id}', [TranslateController::class, 'updatepost']);
        Route::delete('/destroy/{id}', [TranslateController::class, 'destroy']);
        Route::get('/edit/{id}', [TranslateController::class, 'editpost']);
        // Route::post('/upload', [TranslateController::class, 'uploadLargeFiles'])->name('post.upload');;

    });

    Route::prefix('client')->group(function () {
        // Route::post('/update/{id}', [TranslateController::class, 'update'])->name('post.update');    
        Route::get('/', [ClientController::class, 'index']);
        Route::get('/show/{id}', [ClientController::class, 'show']);
        Route::get('/pull/{id}', [ClientController::class, 'pullops']);
        Route::get('/allpull', [ClientController::class, 'allpullops']);
        Route::post('/updatespecial', [ClientController::class, 'updatespecial']);
        Route::delete('/delete/{id}', [ClientController::class, 'destroybyadmin']);

        // Route::post('/upload', [TranslateController::class, 'uploadLargeFiles'])->name('post.upload');;

    });

    //married
    Route::prefix('property')->group(function () {
        // Route::post('/update/{id}', [TranslateController::class, 'update'])->name('post.update');    
        Route::get('/', [PropertyController::class, 'index']);
        Route::get('/create', [PropertyController::class, 'create']);
        Route::post('/store', [PropertyController::class, 'store']);
        Route::post('/update/{id}', [PropertyController::class, 'update']);
        Route::delete('/destroy/{id}', [PropertyController::class, 'destroy']);
        Route::get('/edit/{id}', [PropertyController::class, 'edit']);

    });
    Route::resource('propdep', PropertyDepController::class, ['except' => ['update']]);
    Route::prefix('propdep')->group(function () {
        Route::post('/update/{id}', [PropertyDepController::class, 'update']);
    });

    Route::resource('option', OptionValueController::class, ['except' => ['update']]);
    Route::prefix('option')->group(function () {
        Route::post('/update/{id}', [OptionValueController::class, 'update']);
    });
    Route::prefix('ai')->group(function () {
        Route::get('property', [OptionGroupController::class, 'property_show']);
        Route::get('option/{id}', [OptionGroupController::class, 'option_show']);
        Route::get('optionrange/{id}', [OptionGroupController::class, 'option_range']);
        Route::post('saverange', [OptionGroupController::class, 'save_range']);
    });
    //package
    Route::resource('package', PackageController::class, ['except' => ['update']]);
    Route::prefix('package')->group(function () {
        Route::post('/update/{id}', [PackageController::class, 'update']);
    });
    Route::prefix('order')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('order.index');
        Route::get('{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
        Route::post('update/{id}', [OrderController::class, 'update'])->name('order.update');
        Route::delete('delete/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
    });
    Route::prefix('subscribe')->group(function () {
        Route::get('/', [ClientPackageController::class, 'show_subscribtions']);
    });
    //
    Route::middleware('role.admin:admin-super')->group(function () {
    });

});

//////////////////////////////end dashborad////////////////////////////////


//site 
//password

Route::get('u/password/reset', [ClientPasswordResetController::class, 'showLinkRequestForm'])->name('client.password.request');
Route::post('u/password/email', [ClientPasswordResetController::class, 'sendResetLinkEmail'])->name('client.password.email');
Route::get('u/password/reset/{token}', [ClientPasswordResetController::class, 'showResetForm'])->name('client.password.reset');
Route::post('u/password/reset', [ClientPasswordResetController::class, 'reset'])->name('client.password.update');

//

// Route::get('{lang}/questions', [QuestionController::class, 'getquestions']);
Route::post('/befor-reg', [ClientController::class, 'befor_reg_check']);
Route::post('/checkmail', [ClientController::class, 'check_email']);
//cities
Route::get('/cities/{id}', [CountryController::class, 'getCities']);

Route::prefix('{lang}')->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
    Route::get('/befor-reg', [ClientController::class, 'befor_reg']);
    Route::get('/member/{id}', [ClientController::class, 'show_member']);
    // Route::get('/scores', [ClientController::class, 'scores']);
    //Route::get('/{slug}', [ClientController::class, 'send_message']);
    Route::prefix('members')->group(function () {
        Route::get('online', [SearchController::class, 'online_clients']);
        Route::get('new', [SearchController::class, 'new_clients']);
        Route::get('health-cases', [SearchController::class, 'health_search']);
        Route::post('health-cases', [SearchController::class, 'health_search_by_inputs']);
        //  Route::get('special', [SearchController::class, 'special_search']);
    });

    Route::get('/page/{slug}', [HomeController::class, 'showpage']);
    Route::middleware('guest:client')->group(function () {
        Route::get('/register/{gender}', [ClientController::class, 'create'])->name('register.client');
        Route::post('/register', [ClientController::class, 'store']);

        Route::get('/login', [ClientController::class, 'showlogin'])->name('login.client');
        Route::post('/login', [ClientController::class, 'login']);
    });
});

//     Route::prefix('{lang}')->group(function () {
//     Route::get('/vote/{slug}', [HomeController::class, 'getques']);
// });
//vote
//  Route::post('/addvote/{slug}', [AnswerController::class, 'addvote']);

Route::resource('verify', CodeController::class);
//can only logout without verify
Route::middleware(['auth:client', 'verified'])->group(function () {

    Route::post('u/logout', [ClientController::class, 'logout'])->name('logout.client');
});
Route::middleware(['auth:client', 'verified', 'code'])->group(function () {
    //  Route::post('u/logout', [ClientController::class, 'logout'])->name('logout.client');
    //account
    Route::post('u/delete', [ClientController::class, 'destroy']);
    Route::get('/balanceinfo', [ClientController::class, 'balanceinfo']);
    //Chat
    Route::prefix('chat')->group(function () {
        Route::post('/send', [ChatController::class, 'send']);
        Route::get('/show', [ChatController::class, 'show']);
        Route::get('/showlast', [ChatController::class, 'showlast']);
    });

    Route::prefix('favorite')->group(function () {
        Route::post('/', [FavoriteController::class, 'store']);
        Route::post('/delete', [FavoriteController::class, 'delete_fav']);

    });
    Route::prefix('blacklist')->group(function () {
        Route::post('/', [FavoriteController::class, 'store_blacklist']);
        //  Route::post('/delete', [FavoriteController::class, 'delete_black']);

    });
    Route::prefix('reportoption')->group(function () {
        Route::get('/show', [ReportOptionController::class, 'getoptions']);
    });

    Route::resource('report', ClientReportController::class);
    Route::post('/setting', [ClientSettingController::class, 'update']);
    Route::post('inbox/delete/{id}', [ChatController::class, 'destroymember_chat']);
    // Route::get('/voteres/{id}', [HomeController::class, 'get_vote_results']);
    Route::post('/update-member-image', [PrivateImageController::class, 'update']);
    //  Route::get('/voteres/{slug}', [AnswerController::class, 'voteresult']);

    Route::post('/payment/process', [PaymentController::class, 'processPayment'])->name('payment.process');
    Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');

    Route::get('/paypal/success', [PaymentController::class, 'paypalSuccess'])->name('paypal.success');
    Route::get('/paypal/cancel', [PaymentController::class, 'paypalCancel'])->name('paypal.cancel');
    Route::prefix('{lang}')->group(function () {
        //account
        Route::post('/updatepass', [ClientController::class, 'updatepass'])->name('client.updatepass');
        Route::post('/updatename', [ClientController::class, 'updatename'])->name('client.updatename');
        Route::post('/updateemail', [ClientController::class, 'update_email'])->name('client.updateemail');
        Route::get('/edit-profile', [ClientController::class, 'edit'])->name('client.account');
        Route::get('/edit-username', [ClientController::class, 'edit_username'])->name('client.edit_username');
        Route::get('/edit-email', [ClientController::class, 'edit_email'])->name('client.edit_email');
        Route::get('/edit-password', [ClientController::class, 'edit_password'])->name('client.edit_password');
        Route::post('/update', [ClientController::class, 'update'])->name('client.update');
        Route::post('/pull', [ClientController::class, 'pull']);
        Route::get('/edit-image', [ClientController::class, 'edit_image'])->name('client.edit_image');
        Route::post('/update-image', [ClientController::class, 'update_image'])->name('client.update_image');
        Route::post('/delete-image', [ClientController::class, 'delete_image']);
        Route::get('/profile', [ClientController::class, 'showprofile'])->name('client.profile');
        Route::get('/setting', [ClientSettingController::class, 'index']);

        Route::get('advance-search', [SearchController::class, 'show']);
        Route::post('advance-search', [SearchController::class, 'advance_search']);
        Route::get('ai-search', [SearchController::class, 'ai_show']);
        Route::post('ai-search', [SearchController::class, 'ai_search']);
        Route::get('search', [SearchController::class, 'all_search']);
        Route::post('name-search', [SearchController::class, 'name_search']);
        Route::post('quick-search', [SearchController::class, 'quick_search']);

        Route::prefix('members')->group(function () {
            //    Route::get('online', [SearchController::class, 'online_clients']);
            //    Route::get('new', [SearchController::class, 'new_clients']);
            //    Route::get('health-cases', [SearchController::class, 'health_search']);
            //    Route::post('health-cases', [SearchController::class, 'health_search_by_inputs']);
            Route::get('special', [SearchController::class, 'special_search']);
            Route::get('image', [PrivateImageController::class, 'show_to_members']);
        });
        Route::get('myfavorite', [FavoriteController::class, 'my_favorite']);
        Route::get('myblacklist', [FavoriteController::class, 'my_blacklist']);
        Route::get('who-like-me', [FavoriteController::class, 'who_like_me']);
        Route::get('who-visited-me', [VisitorController::class, 'who_visited_me']);
        Route::get('inbox', [ChatController::class, 'inbox']);
        Route::get('notifications', [NotificationController::class, 'index']);

        Route::prefix('subscribe')->group(function () {
            Route::get('/', [ClientPackageController::class, 'index']);
            Route::any('payment', [ClientPackageController::class, 'payment']);
            Route::any('features', [ClientPackageController::class, 'features']);

        });
        //payment





    });
});


require __DIR__ . '/auth.php';

