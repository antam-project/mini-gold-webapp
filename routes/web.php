<?php

use App\Http\Controllers\Admin\Master\MasterGoldController;
use App\Http\Controllers\Admin\Master\MasterProductController;
use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\KonfirmasiPembayaranController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ScrapperController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\HomeController;
use App\Models\Master\MasterProduct;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PurchaseController;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

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

Route::get('/', [HomeController::class, 'welcome'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('chart')->group(function () {
        Route::get('', [ChartController::class, 'list'])->name('pages.chart.list');
        Route::get('/new', [ChartController::class, 'new'])->name('pages.new.list');
        Route::get('{id}/update', [ChartController::class, 'updatePage'])->name('admin.user.update.page');
        Route::patch('{id}/update', [ChartController::class, 'update'])->name('admin.user.update');
        Route::delete('{id}/delete', [ChartController::class, 'delete'])->name('admin.user.delete');
    });

    Route::prefix('order')->group(function () {
        Route::get('', [OrderController::class, 'list'])->name('admin.user.list');
        Route::get('{id}/update', [OrderController::class, 'updatePage'])->name('admin.user.update.page');
        Route::patch('{id}/update', [OrderController::class, 'update'])->name('admin.user.update');
        Route::delete('{id}/delete', [OrderController::class, 'delete'])->name('admin.user.delete');
    });
});

Route::get('qrcode', function () {
    return QrCode::size(300)->generate('A basic example of QR code!');
});

Route::prefix('admin')->middleware(['role:Admin'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('', [UserController::class, 'list'])->name('admin.user.list');
        Route::get('{id}/update', [UserController::class, 'updatePage'])->name('admin.user.update.page');
        Route::patch('{id}/update', [UserController::class, 'update'])->name('admin.user.update');
        Route::delete('{id}/delete', [UserController::class, 'delete'])->name('admin.user.delete');

        Route::prefix('role')->group(function () {
            Route::post('{idUser}', [UserController::class, 'addRole'])->name('admin.user.role.add');
            Route::delete('{idUser}/{idRole}', [UserController::class, 'deleteRole'])->name('admin.user.role.delete');
        });
    });

    Route::prefix('konfirmasi-pembayaran')->group(function () {
        Route::get('', [KonfirmasiPembayaranController::class, 'list'])->name('admin.user.list');
        Route::get('{id}/update', [KonfirmasiPembayaranController::class, 'updatePage'])->name('admin.user.update.page');
        Route::patch('{id}/update', [KonfirmasiPembayaranController::class, 'update'])->name('admin.user.update');
        Route::delete('{id}/delete', [KonfirmasiPembayaranController::class, 'delete'])->name('admin.user.delete');
    });

    Route::prefix('master')->group(function () {
        Route::prefix('gold')->group(function () {
            Route::get('', [MasterGoldController::class, 'list'])->name('admin.master.gold.list');
        });
        Route::prefix('product')->group(function () {
            Route::get('', [MasterProductController::class, 'list'])->name('admin.master.product.list');
            Route::get('{id}/update',[MasterProductController::class,'updatePage'])->name('admin.master.product.update.page');
            Route::patch('{id}/update',[MasterProductController::class,'update'])->name('admin.master.product.update');
        });
    });

    Route::prefix('product')->group(function () {
        Route::get('', [ProdukController::class, 'list'])->name('admin.product.list');
        Route::get('add', [ProdukController::class, 'addPage'])->name('admin.product.add.page');
        Route::post('add', [ProdukController::class, 'add'])->name('admin.product.add');
        Route::get('{group}/group',[ProdukController::class, 'groupPage'])->name('admin.product.group.page');
        Route::get('{group}/group/{id}',[ProdukController::class, 'groupDetailPage'])->name('admin.product.group.detail.page');
    });

    Route::get('scrapper', [ScrapperController::class, 'getData']);

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

})->name('admin');

Route::prefix('purchase')->group(function () {
    Route::get('', [PurchaseController::class, 'invoice'])->name('purchase.invoice');
    Route::get('invoice', [PurchaseController::class, 'invoice'])->name('purchase.invoice');
    Route::get('delivery', [PurchaseController::class, 'delivery'])->name('purchase.delivery');
});


Route::get('qr_code/index',[QRController::class,'index'])->name('qrcode.index');
Route::get('qr_code/create',[QRController::class,'create'])->name('qrcode.create');

require __DIR__ . '/auth.php';
