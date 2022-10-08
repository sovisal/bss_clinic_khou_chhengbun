<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\Patient;
use App\Models\Doctor;
use App\Models\Medicine;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;
use File;

class HomeController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Contracts\Support\Renderable
	 */
	public function index()
	{
		$this->data =[
			'patients' => Patient::all(),
			'doctors' => Doctor::all(),
			'medicines' => Medicine::all(),
			// 'invoices' => Invoice::all(),
			'users' => User::all(),
		];
		return view('home', $this->data);
	}


	public function approval()
	{
		return view('approval');
	}

	public function uplaod_sync_database(Request $request)
	{
		if (\AppHelper::IsInternetConnected() != true) return false;
		$cmd = \AppHelper::GetMySqlDump() . ' -h ' . env('DB_HOST') . ' -u ' . env('DB_USERNAME') . (env('DB_PASSWORD') ? ' -p"' . env('DB_PASSWORD') . '"' : '') . ' --databases ' . env('DB_DATABASE');
		$output = [];
		exec($cmd, $output);
		$output = implode($output, "\n");
		$file_name =  date('Ymd-His') . '_' . Auth::user()->email . '.sql';
		return Storage::disk('ftp')->put(date("Y") . '/' . date("F") . '/' . $file_name, $output) ?: 0;
	}

	public function update_missing_sql(Request $request)
	{
		// Find available SQL update
		$list_files = File::files(public_path('execute_sql_files'));
		foreach ($list_files as $file) {
			if (!in_array(pathinfo($file, PATHINFO_EXTENSION), ['sql', 'SQL'])) continue;
			if (File::exists($file . '.lock')) continue;

			// Lock file and execute query
			$query = File::get($file);			
			if (!empty($query)) {
				try { 
					DB::unprepared($query);
					File::put($file . '.lock', date('Y-m-d H:i:s') . "\r\r OK");
				} catch(\Illuminate\Database\QueryException $ex){ 
					File::put($file . '.lock', date('Y-m-d H:i:s') . "\r\r" . $ex->getMessage());
				}				
			}
		}
	}	
}
