<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('dasdas', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
Route::get('/', function()
{
	$items = App\jenislap::pluck('NAMA_JENIS_LAP','NAMA_JENIS_LAP');
	return view('index',['items' => $items]);
});

//http://localhost/cari?kota=dsfsdf&tgl=03-10-2016&jam=fdsfsd&lapangan=Futsal
Route::get('/cari', function()
{
	$items = App\jenislap::pluck('NAMA_JENIS_LAP','NAMA_JENIS_LAP');
	$tgl = Request::input('tgl');
	$kota = Request::input('kota');
	$jam = Request::input('jam');
	$lapangan = Request::input('lapangan');
	$results = DB::select("select fasor.NAMA_FASOR, harga from fasor,lapangan where ID_LAP not in (select lapangan.ID_LAP from lapangan,transaksi where lapangan.ID_LAP=transaksi.ID_LAP and transaksi.tgl_main='2016-03-19' and (transaksi.JAM_MAIN<'08:00:00' and transaksi.JAM_SELESAI>'06:00:00'))and lapangan.ID_FASOR=fasor.ID_FASOR group by fasor.NAMA_FASOR;");

	//foreach ($results as $post) {
    //echo $post->ID_FASOR . '<br>';
//}
   return view('hasil',['tgl' => $tgl,'kota' => $kota,'jam' => $jam,'lapangan' => $lapangan,'result' => $results, 'items' => $items]);
});


/*Route::get('test', function()
{
	$jenis=App\jenislap::get();

	//return view('index',['jenis' => $jenis]);
	foreach ($jenis as $jeniss){
		echo $jeniss->NAMA_JENIS_LAP;
		echo '<br>';
	}
});*/



Route::get('/halo-juga', 'Controller@haloJuga');

Route::group(['middleware' => ['web']], function () {
    //
});
