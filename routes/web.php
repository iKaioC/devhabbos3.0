<?php

use App\Http\Controllers\Admin\ArchiveController;
use App\Http\Controllers\Admin\ClientController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\VpsController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Admin\HabboController;
use App\Http\Controllers\Client\UserController;
use App\Http\Controllers\Admin\ServerController;
use App\Http\Controllers\Web\HabboWebController;
use App\Http\Controllers\Admin\OptionalController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Used\ServerController as UsedServerController;
use App\Http\Controllers\Web\OptionalWebController;
use App\Http\Controllers\Client\HabboClientDashboard;
use App\Http\Controllers\Client\ServerClientController;
use App\Http\Controllers\Client\TicketClientController;
use App\Http\Controllers\Client\OptionalClientDashboard;
use App\Http\Controllers\Client\DashboardClientController;
use App\Http\Controllers\Client\TestimonialClientController;
use App\Http\Controllers\Client\TicketCommentClientController;

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


// Website Routes
Route::get('/', [HomeController::class, 'index'])->name('web-index');
Route::get('/habbos', [HabboWebController::class, 'index'])->name('web-habbo');
Route::get('/servers', [VpsController::class, 'index'])->name('web-sv');
Route::get('/servers-brasil', [VpsController::class, 'brasil'])->name('web-svbrasil');
Route::get('/optionals', [OptionalWebController::class, 'index'])->name('web-optional');
// End Website Routes

// Client Routes
Route::prefix('client')->middleware(['auth'])->group(function () {

    // Client Panel
    Route::get('dashboard', [DashboardClientController::class, 'index'])->name('client-dashboard');
    Route::get('habbos', [HabboClientDashboard::class, 'listHabbos'])->name('client-habbos');
    Route::get('servers', [ServerClientController::class, 'listServers'])->name('client-servers');
    Route::get('optionals', [OptionalClientDashboard::class, 'listOptionals'])->name('client-optionals');

    Route::get('user/profile', [UserController::class, 'edit'])->name('user-edit');
    Route::put('user/profile', [UserController::class, 'update'])->name('user-update');

    Route::post('user/update-image', [UserController::class, 'updateImage'])->name('user-update-image');
    Route::get('user/remove-image', [UserController::class, 'removeImage'])->name('user-remove-image');

    Route::post('user/change-password', [UserController::class, 'changePassword'])->name('user-change-password');
    // End Client Panel

    // Service Tickets
    Route::get('/tickets', [TicketClientController::class, 'index'])->name('tickets-index');
    Route::get('/tickets/create', [TicketClientController::class, 'create'])->name('tickets-create');
    Route::post('/tickets', [TicketClientController::class, 'store'])->name('tickets-store');
    Route::get('/tickets/{ticket}', [TicketClientController::class, 'edit'])->name('tickets-update');
    Route::post('/tickets/{ticket}/comments', [TicketCommentClientController::class, 'store'])
  ->name('ticket-comments-store');
    // End Service Tickets

    // Client Testimonials
    Route::get('/testimonials', [TestimonialClientController::class, 'index'])->name('testimonial-index');
    // End Client Testimonials
});
// End Client Routes

// Admin Routes
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');

    // Servers Routes
    Route::controller(ServerController::class)->group(function () {
        Route::get('servers', 'index')->name('admin-servers');
        Route::get('servers-brasil', 'brasil')->name('admin-servers-brasil');

        Route::get('server/create', 'create')->name('create-server');
        Route::post('server', 'store')->name('store-server');

        Route::get('server/{server}/edit', 'edit')->name('edit-server');
        Route::put('server/{server}', 'update')->name('update-server');

        Route::delete('server/{server}', 'destroy')->name('server-destroy');
    });

    // Habbos Routes
    Route::controller(HabboController::class)->group(function () {
        Route::get('habbos', 'index')->name('admin-habbos');

        Route::get('habbo/create', 'create')->name('create-habbo');
        Route::post('habbo', 'store')->name('store-habbo');

        Route::get('habbo/{habbo}/edit', 'edit')->name('edit-habbo');
        Route::put('habbo/{habbo}', 'update')->name('update-habbo');

        Route::delete('habbo/{habbo}', 'destroy')->name('habbo-destroy');
    });

    // Optionals Routes
    Route::controller(OptionalController::class)->group(function () {
        Route::get('optionals', 'index')->name('admin-optionals');

        Route::get('optional/create', 'create')->name('create-optional');
        Route::post('optional', 'store')->name('store-optional');

        Route::get('optional/{optional}/edit', 'edit')->name('edit-optional');
        Route::put('optional/{optional}', 'update')->name('update-optional');

        Route::delete('optional/{optional}', 'destroy')->name('optional-destroy');
    });

    // Used Services
    Route::get('used/servers', [UsedServerController::class, 'index'])->name('used-servers');

    // Archives Routes
    Route::controller(ArchiveController::class)->group(function () {
        Route::get('archives', 'index')->name('admin-archives');

        Route::get('archive/create', 'create')->name('create-archive');
        Route::post('archive', 'store')->name('store-archive');

        Route::get('archive/{archive}/edit', 'edit')->name('edit-archive');
        Route::put('archive/{archive}', 'update')->name('update-archive');

        Route::delete('archive/{archive}', 'destroy')->name('archive-destroy');
    });

    // Clients Routes
    Route::controller(ClientController::class)->group(function () {
        Route::get('clients', 'index')->name('admin-clients');

        Route::get('client/create', 'create')->name('create-client');
        Route::post('client', 'store')->name('store-client');

        Route::get('client/{user}/edit', 'edit')->name('edit-client');
        Route::put('client/{user}', 'update')->name('update-client');

        // Client Services Useds
        Route::get('client/{id}/vps', 'showVps')->name('client-vps');
        Route::get('client/{id}/habbos', 'showHabbos')->name('client-habbos');
        Route::get('client/{id}/optionals', 'showOptionals')->name('client-optionals');
    });

});
// End Admin Routes