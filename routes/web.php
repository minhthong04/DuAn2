<?php

use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController;
use Illuminate\Support\Facades\Auth;

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


/*
Route::get('/', function () {
    return view('welcome');
});
*/

// Route::get('/', function () {
//     return view('welcome');  // Hoặc trang khác bạn muốn hiển thị
// })->name('home');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';




/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['admin']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('admin_dashboard');
});

// Category management
Route::get('category-list', [CategoryController::class, 'index'])->name('category-list');
Route::get('add-category', [CategoryController::class, 'indexForm'])->name('add-category');
Route::post('store-category', [CategoryController::class, 'storeCategory'])->name('store-category');
Route::get('edit-category/{id}', [CategoryController::class, 'editForm'])->name('edit-category');
Route::post('update-category', [CategoryController::class, 'updateCategory'])->name('update-category');
Route::delete('delete-category/{id}', [CategoryController::class, 'deleteCategory'])->name('delete-category');

Route::get('news-list', [NewsController::class, 'index'])->name('news-list');
Route::get('add-news', [NewsController::class, 'indexForm'])->name('add-news');
Route::post('store-news', [NewsController::class, 'storeNews'])->name('store-news');
Route::get('edit-news/{id}', [NewsController::class, 'editForm'])->name('edit-news');
Route::post('update-news', [NewsController::class, 'updateNews'])->name('update-news');
Route::delete('delete-news/{id}', [NewsController::class, 'deleteNews'])->name('delete-news');



Route::get('/news', [HomeController::class, 'news'])->name('news');

Route::get('/news/{slug}', [HomeController::class, 'show'])->name('name.detail');

Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

//Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin');

// Route::get('/tinhtich/{a}/{b}', [ThuctapController::class, 'tinhtich']);

// Route::get('/txn', [TintucController::class, 'tinXN']);
// Route::get('/tin/{id}', [TintucController::class, 'detail']);

// Route::get('/chao', function () {
//     return view('xinchao');
// });

// Route::get('/db1', function () {
//     $query = DB::table('loaiTin')->select('id', 'ten');
//     $kq = $query->first();
//     print_r($kq);
//     echo "<h4> {$kq->ten} </h4>";
// });

// Route::get('/db2', function () {
//     $query = DB::table('loaiTin')->select('id', 'ten');
//     $rows = $query->get();

//     foreach ($rows as $row) {
//         echo "<p> {$row->ten} </p>";
//     }
// });

// Route::get('/db3', function () {
//     $t = DB::table('loaiTin')->where('id', '=', 3)->value('ten');
//     echo $t;
// });

// Route::get('/db4', function () {
//     $arr = DB::table('loaiTin')->pluck('ten');
//     foreach ($arr as $ten) echo "<p> {$ten} </p>";
// });

// Route::get('/db5', function () {
//     $sotin = DB::table('tin')->WHERE('noiBat', 1)->count();
//     echo "Số tin nổi bật: $sotin <br/>";

//     $mn = DB::table('tin')->max("ngayDang");
//     echo "Tin mới nhất đăng ngày: $mn <br/>";

//     $sn = DB::table('tin')->min("ngayDang");
//     echo "Tin cũ nhất đăng ngày: $sn <br/>";

//     $tb = DB::table('tin')->avg("xem");
//     echo "Xem trung bình $tb <br/>";

//     $tong = DB::table('tin')->sum("xem");
//     echo "Tổng xem $tong <br/>";
// });

// Route::get('/db7', function () {
//     $query = DB::table('loaiTin')
//         ->where('anHien', '=', 1)
//         ->orderBy('ten', 'ASC')
//         ->offset(0)
//         ->limit(5);
//     //echo $query->toSql();
//     $kq = $query->get();
//     foreach ($kq as $row) {
//         echo "<p>{$row->ten} </p>";
//     }
// });

// Route::get('/db8', function () {
//     $query = DB::table('tin')
//         ->Join('loaiTin', 'tin.idLT', '=', 'loaiTin.id')
//         ->select('tin.id', 'tin.tieuDe', 'loaiTin.ten');
//     echo $query->toSql();
//     $kq = $query->get();
//     foreach ($kq as $row) {
//         echo "<p>{$row->id}: {$row->tieuDe} ({$row->ten}) </p>";
//     }
// });

// Route::get('/db6', function () {
//     $kq = DB::table('loaiTin')
//         ->where('id', 1)->exists();
//     var_dump($kq);
//     if (!$kq) echo "Không tồn tại loại tin này";
//     else echo "Có tồn tại loại tin này";
// });

// Route::get('/db9', function () {
//     $kq = DB::table('tin')->insert(['tieuDe' => 'Việt nam vô địch', 'idLT' => 1]);
//     var_dump($kq);
//     if ($kq) echo "Tin đã thêm thành công";
//     else echo "Tin không thêm thành công";
// });

// Route::get('/db10', function () {
//     $id = DB::table('tin')
//         ->insertGetId(['tieuDe' => 'VN vô địch AFF 2024', 'idLT' => 1]);
//     echo "id của record mới chèn: $id";
// });

// Route::get('/db11', function () {
//     DB::table('tin')->insert([
//         ['TieuDe' => 'VN mến yêu 1', 'idLT' => 1],
//         ['TieuDe' => 'VN yêu mến 2', 'idLT' => 2],
//         ['TieuDe' => 'VN yêu mến 3', 'idLT' => 3]
//     ]);
// });

// Route::get('/db12', function () {
//     DB::table('tin')->where('id', '=', 11)
//         ->update(['TieuDe' => 'Việt nam tuyệt vời', 'idLT' => 3]);
// });


// Route::get('/db13', function () {
//     DB::table('tin')->where('id', '=', 11)->delete();
// });
