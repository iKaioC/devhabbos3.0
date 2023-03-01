<?php

use App\Models\Habbo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\VpsController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TermController;
use App\Http\Controllers\Admin\TicketResponse;
use App\Http\Controllers\Web\FaqWebController;
use App\Http\Controllers\Admin\Add\ClientHabbo;
use App\Http\Controllers\Admin\HabboController;
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\Web\TermWebController;
use App\Http\Controllers\Admin\Add\ClientServer;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ServerController;
use App\Http\Controllers\Web\HabboWebController;
use App\Http\Controllers\Admin\ArchiveController;
use App\Http\Controllers\Admin\Add\ClientOptional;
use App\Http\Controllers\Admin\OptionalController;
use App\Http\Controllers\Web\ArchiveWebController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Web\OptionalWebController;
use App\Http\Controllers\Client\HabboClientDashboard;
use App\Http\Controllers\Client\ServerClientController;
use App\Http\Controllers\Client\TicketClientController;
use App\Http\Controllers\Client\OptionalClientDashboard;
use App\Http\Controllers\Client\DashboardClientController;
use App\Http\Controllers\Client\TestimonialClientController;
use App\Http\Controllers\Client\TicketCommentClientController;
use App\Http\Controllers\Admin\Used\ServerController as UsedServerController;

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

Auth::routes();


// WEBSITE ROUTES

Route::get('/', [HomeController::class, 'index'])->name('web-index');
Route::get('/register', [HomeController::class, 'index'])->name('web-index');
Route::get('/habbos', [HabboWebController::class, 'index'])->name('web-habbo');
Route::get('/servers', [VpsController::class, 'index'])->name('web-sv');
Route::get('/servers-brasil', [VpsController::class, 'brasil'])->name('web-svbrasil');
Route::get('/optionals', [OptionalWebController::class, 'index'])->name('web-optional');
Route::get('/optionals-habbo', [OptionalWebController::class, 'habbo'])->name('web-optional-habbo');
Route::get('/archives', [ArchiveWebController::class, 'index'])->name('web-archives');
Route::get('/faqs', [FaqWebController::class, 'index'])->name('web-faqs');
Route::get('/terms-of-services', [TermWebController::class, 'index'])->name('web-terms');

Route::get('/habbo/{slug}', [HabboWebController::class, 'show'])->name('habbo-show');
Route::get('/optional/{category}/{slug}', [OptionalWebController::class, 'showOptional'])->name('optional-habbo-show');

// END WEBSITE ROUTES

// ------------------------------------------------------------------------------------------------ //

// CLIENT ROUTES
Route::prefix('client')->middleware(['auth'])->group(function () {

    // CLIENT PANEL
    Route::get('dashboard', [DashboardClientController::class, 'index'])->name('client-dashboard');
    Route::get('habbos', [HabboClientDashboard::class, 'listHabbos'])->name('client-habbos');
    Route::get('servers', [ServerClientController::class, 'listServers'])->name('client-servers');
    Route::get('optionals', [OptionalClientDashboard::class, 'listOptionals'])->name('client-optionals');

    Route::get('user/profile', [UserController::class, 'edit'])->name('user-edit');
    Route::put('user/profile', [UserController::class, 'update'])->name('user-update');

    Route::post('user/update-image', [UserController::class, 'updateImage'])->name('user-update-image');
    Route::get('user/remove-image', [UserController::class, 'removeImage'])->name('user-remove-image');

    Route::post('user/change-password', [UserController::class, 'changePassword'])->name('user-change-password');
    // END CLIENT PANEL

    // ------------------------------------------------------------------------------------------- //

    // SERVICE TICKETS
    Route::get('/tickets', [TicketClientController::class, 'index'])->name('tickets-index');
    Route::get('/tickets/create', [TicketClientController::class, 'create'])->name('tickets-create');
    Route::post('/tickets', [TicketClientController::class, 'store'])->name('tickets-store');
    Route::get('/tickets/{ticket}', [TicketClientController::class, 'edit'])->name('tickets-update');
    Route::post('/tickets/{ticket}/comments', [TicketCommentClientController::class, 'store'])
  ->name('ticket-comments-store');
    // END SERVICE TICKETS

    // ------------------------------------------------------------------------------------------- //

    // CLIENT TESTIMONIALS
    Route::get('/testimonials', [TestimonialClientController::class, 'index'])->name('testimonial-index');
    // END CLIENT TESTIMONIALS

    // ------------------------------------------------------------------------------------------- //
});
// END CLIENT ROUTES

// ------------------------------------------------------------------------------------------- //

// ADMIN ROUTES
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');

    // SERVERS ROUTES
    Route::controller(ServerController::class)->group(function () {
        Route::get('servers', 'index')->name('admin-servers');
        Route::get('servers-brasil', 'brasil')->name('admin-servers-brasil');

        Route::get('server/create', 'create')->name('create-server');
        Route::post('server', 'store')->name('store-server');

        Route::get('server/{server}/edit', 'edit')->name('edit-server');
        Route::put('server/{server}', 'update')->name('update-server');

        Route::delete('server/{server}', 'destroy')->name('server-destroy');
    });

    // ------------------------------------------------------------------------------------------- //

    // HABBO ROUTES
    Route::controller(HabboController::class)->group(function () {
        Route::get('habbos', 'index')->name('admin-habbos');

        Route::get('habbo/create', 'create')->name('create-habbo');
        Route::post('habbo', 'store')->name('store-habbo');

        Route::get('habbo/{habbo}/edit', 'edit')->name('edit-habbo');
        Route::put('habbo/{habbo}', 'update')->name('update-habbo');

        Route::delete('habbo/{habbo}', 'destroy')->name('habbo-destroy');
        Route::delete('habbo/{habbo}/image/{image}', 'deleteImage')->name('delete-habbo-image');
    });

    // ------------------------------------------------------------------------------------------- //

    // OPTIONALS ROUTES
    Route::controller(OptionalController::class)->group(function () {
        Route::get('optionals', 'index')->name('admin-optionals');

        Route::get('optional/create', 'create')->name('create-optional');
        Route::post('optional', 'store')->name('store-optional');

        Route::get('optional/{optional}/edit', 'edit')->name('edit-optional');
        Route::put('optional/{optional}', 'update')->name('update-optional');

        Route::delete('optional/{optional_id}', 'destroy')->name('optional-destroy');
        Route::delete('optional/{optional}/image/{image}', 'deleteImage')->name('delete-optional-image');
    });

    // ------------------------------------------------------------------------------------------- //

    // ADD SERVICES

    // ADD SERVER
    Route::get('add/server', [ClientServer::class, 'index'])->name('add-server-client');
    Route::post('add/server', [ClientServer::class, 'store'])->name('store-server-client');
    Route::get('edit/{id}/server', [ClientServer::class, 'edit'])->name('edit-server-client');
    Route::put('edit/{id}/server', [ClientServer::class, 'update'])->name('update-server-client');

    // ------------------------------------------------------------------------------------------- //

    // ADD HABBO
    Route::get('add/habbo', [ClientHabbo::class, 'index'])->name('add-habbo-client');
    Route::post('add/habbo', [ClientHabbo::class, 'store'])->name('store-habbo-client');
    Route::get('edit/{id}/habbo', [ClientHabbo::class, 'edit'])->name('edit-habbo-client');
    Route::put('edit/{id}/habbo', [ClientHabbo::class, 'update'])->name('update-habbo-client');

    // ------------------------------------------------------------------------------------------- //

    // ADD OPTIONALS
    Route::get('add/optional', [ClientOptional::class, 'index'])->name('add-optional-client');
    Route::post('add/optional', [ClientOptional::class, 'store'])->name('store-optional-client');
    Route::get('edit/{id}/optional', [ClientOptional::class, 'edit'])->name('edit-optional-client');
    Route::put('edit/{id}/optional', [ClientOptional::class, 'update'])->name('update-optional-client');

    // ------------------------------------------------------------------------------------------- //

    // ARCHIVES ROUTES
    Route::controller(ArchiveController::class)->group(function () {
        Route::get('archives', 'index')->name('admin-archives');

        Route::get('archive/create', 'create')->name('create-archive');
        Route::post('archive', 'store')->name('store-archive');

        Route::get('archive/{archive}/edit', 'edit')->name('edit-archive');
        Route::put('archive/{archive}', 'update')->name('update-archive');

        Route::delete('archive/{archive}', 'destroy')->name('archive-destroy');
    });

    
    // ------------------------------------------------------------------------------------------- //

    // FAQs ROUTES
    Route::controller(FaqController::class)->group(function () {
        Route::get('faqs', 'index')->name('admin-faqs');

        Route::get('faq/create', 'create')->name('create-faq');
        Route::post('faq', 'store')->name('store-faq');

        Route::get('faq/{faq}/edit', 'edit')->name('edit-faq');
        Route::put('faq/{faq}', 'update')->name('update-faq');

        Route::delete('faq/{faq}', 'destroy')->name('faq-destroy');
    });

    // ------------------------------------------------------------------------------------------- //

    // Terms ROUTES
    Route::controller(TermController::class)->group(function () {
        Route::get('terms', 'index')->name('admin-terms');

        Route::get('term/create', 'create')->name('create-term');
        Route::post('term', 'store')->name('store-term');

        Route::get('term/{term}/edit', 'edit')->name('edit-term');
        Route::put('term/{term}', 'update')->name('update-term');

        Route::delete('term/{term}', 'destroy')->name('term-destroy');
    });

    // ------------------------------------------------------------------------------------------- //

    // CLIENTS ROUTS
    Route::controller(ClientController::class)->group(function () {
        Route::get('clients', 'index')->name('admin-clients');

        Route::get('client/create', 'create')->name('create-client');
        Route::post('client', 'store')->name('store-client');

        Route::get('client/{user}/edit', 'edit')->name('edit-client');
        Route::put('client/{id}', 'update')->name('update-client');

        // ------------------------------------------------------------------------------------------- //

        // CLIENT SERVICES USED
        Route::get('client/{id}/vps', 'showVps')->name('client-vps-admin');
        Route::get('client/{id}/habbos', 'showHabbos')->name('client-habbos-admin');
        Route::get('client/{id}/optionals', 'showOptionals')->name('client-optionals-admin');

        Route::get('client/testimonials', 'showTestimonials')->name('client-testimonials-admin');

        // ------------------------------------------------------------------------------------------- //

        // CLIENT TICKETS
        Route::get('client/tickets', 'showTickets')->name('client-tickets-admin');
        Route::get('client/ticket/{ticket}', [TicketResponse::class, 'edit'])->name('tickets-edit-admin');
        Route::patch('client/ticket/{ticket}', [TicketResponse::class, 'update'])->name('tickets-update-admin');

        // ------------------------------------------------------------------------------------------- //
    });

    // END CLIENTS ROUTS

    // ------------------------------------------------------------------------------------------- //

});
// END ADMIN ROUTES