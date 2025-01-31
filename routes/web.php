<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ImportController;
use App\Http\Controllers\Admin\OpnameController;
use App\Http\Controllers\Admin\LapStokController;
use App\Http\Controllers\Admin\MinimumController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RiwayatController;
use App\Http\Controllers\Manager\MasukController;
use App\Http\Controllers\Manager\OpnamController;
use App\Http\Controllers\Admin\LapTransController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Manager\KeluarController;
use App\Http\Controllers\Manager\ProdukController;
use App\Http\Controllers\Admin\AttributesController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\DashboardaController;
use App\Http\Controllers\Admin\PengaturanController;
use App\Http\Controllers\Manager\LapStokmController;
use App\Http\Controllers\Staff\DashboardsController;
use App\Http\Controllers\Staff\PenerimaanController;
use App\Http\Controllers\Manager\LapBarangController;
use App\Http\Controllers\Manager\SuppliermController;
use App\Http\Controllers\Staff\PengeluaranController;
use App\Http\Controllers\Admin\LapAktivitasController;
use App\Http\Controllers\Manager\DashboardmController;

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

Route::middleware(['guest'])->group(function() {
    Route::get('/', [AuthController::class, 'index'])->name('login');
    Route::post('/', [AuthController::class, 'login']);
});

Route::get('/home', function() {
    $user = Auth::user();

    if ($user->role === 'admin') {
        return redirect()->route('admin.index-admin');
    } elseif ($user->role === 'manager') {
        return redirect()->route('manager.index-manager');
    } elseif ($user->role === 'staff') {
        return redirect()->route('staff.index-staff');
    }
    abort(403, 'Unauthorized');
})->middleware('auth');

Route::middleware(['auth'])->group(function() {
    Route::prefix('admin')->name('admin.')->middleware('userAkses:admin')->group(function() {
        Route::get('/', [DashboardaController::class, 'index'])->name('index-admin');

        Route::name('produk.')->group(function () {
            Route::get('/produk', [ProductController::class, 'index'])->name('produk');
            Route::resource('produk', ProductController::class);
            Route::post('/import-produk', [ProductController::class, 'import'])->name('import');
            Route::get('/export-produk', [ProductController::class, 'exportProduk'])->name('export-produk');

            Route::get('/kategori', [CategoriesController::class, 'index'])->name('kategori');
            Route::resource('kategori', CategoriesController::class);

            Route::get('/atribut', [AttributesController::class, 'index'])->name('atribut');
            Route::resource('atribut', AttributesController::class);
        });

        Route::name('stock.')->group(function () {
            Route::get('/riwayat-transaksi', [RiwayatController::class, 'index'])->name('riwayat');

            Route::get('/stok-opname', [OpnameController::class, 'index'])->name('opname');

            Route::get('/stok-minimum', [MinimumController::class, 'index'])->name('minimum');
            Route::resource('minimum', MinimumController::class);
        });

        Route::get('/supplier', [SupplierController::class, 'index'])->name('supplier');
        Route::resource('supplier', SupplierController::class);

        Route::get('/pengguna', [UserController::class, 'index'])->name('pengguna');
        Route::resource('pengguna', UserController::class);

        Route::name('laporan.')->group(function () {
            Route::get('/laporan-stock', [LapStokController::class, 'index'])->name('stok');
            Route::get('/export-lapstok', [LapStokController::class, 'exportLapStok'])->name('export-lapstok');

            Route::get('/laporan-transaksi', [LapTransController::class, 'index'])->name('transaksi');
            Route::get('/export-laptrans', [LapTransController::class, 'exportLapTrans'])->name('export-laptrans');

            Route::get('/laporan-pengguna', [LapAktivitasController::class, 'index'])->name('pengguna');
            Route::get('/export-lapaktivitas', [LapAktivitasController::class, 'exportLapAktivitas'])->name('export-lapaktivitas');
        });

        Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan');
        Route::resource('pengaturan', PengaturanController::class);
    });

    Route::prefix('manager')->name('manager.')->middleware('userAkses:manager')->group(function() {
        Route::get('/', [DashboardmController::class, 'index'])->name('index-manager');

        Route::get('produk', [ProdukController::class, 'index'])->name('produk');
        Route::resource('produk', ProdukController::class);
        Route::get('/export-produk', [ProdukController::class, 'exportProduk'])->name('export-produk');

        Route::name('stock.')->group(function () {
            Route::get('/transaksi-masuk', [MasukController::class, 'index'])->name('masuk');
            Route::resource('masuk', MasukController::class);

            Route::get('/transaksi-keluar', [KeluarController::class, 'index'])->name('keluar');
            Route::resource('keluar', KeluarController::class);

            Route::get('/stok-opname', [OpnamController::class, 'index'])->name('opname');
        });

        Route::get('supplier', [SuppliermController::class, 'index'])->name('supplier');

        Route::name('laporan.')->group(function () {
            Route::get('/laporan-stock', [LapStokmController::class, 'index'])->name('stok');
            Route::get('/export-lapstok', [LapStokmController::class, 'exportLapStok'])->name('export-lapstok');

            Route::get('/laporan-barang', [LapBarangController::class, 'index'])->name('barang');
            Route::get('/export-lapbarang', [LapBarangController::class, 'exportLapBarang'])->name('export-lapbarang');
        });
    });

    Route::prefix('staff')->name('staff.')->middleware('userAkses:staff')->group(function() {
        Route::get('/', [DashboardsController::class, 'index'])->name('index-staff');

        Route::name('stock.')->group(function () {
            Route::get('/penerimaan', [PenerimaanController::class, 'index'])->name('penerimaan');
            Route::resource('penerimaan', PenerimaanController::class);

            Route::get('/pengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran');
            Route::resource('pengeluaran', PengeluaranController::class);
        });
    });
    
    Route::get('/logout', [AuthController::class, 'logout']);
});