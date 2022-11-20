<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use App\Models\FourLevelAddress;
use Illuminate\Http\Request;
use DB;

class FourLevelAddressController extends Controller
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

	public function index(Request $request)
	{
		$code_length = $request->addr ? strlen($request->addr) : 0;
		$this->data = [
			'address' => $code_length == 2 ? $this->District($request->addr) : ($code_length == 4 ? $this->Commune($request->addr) : ($code_length == 6 ? $this->Village($request->addr) : $this->Province())),
			'addr' => $request->addr			
		];
		return view('province.index', $this->data);
	}

	public function BSSFullAddress($code = '08021103', $return_type = 'selection') {
		if (!$code) $code = '08021103';
		return array_map(function($length, $level) use ($code, $return_type) {			
			return $this->Platform($this->$level(substr($code, 0, $length - 2)), $return_type, substr($code, 0, $length));
		}, [2, 4, 6, 8], ['Province', 'District', 'Commune', 'Village']);
	}

	public function Province($code = null, $return_type = 'array')
	{
		return $this->Platform($this->Address([__FUNCTION__, 'Capital'], $code), $return_type);
	}

	public function District($code = null, $return_type = 'array')
	{
		return $this->Platform($this->Address([__FUNCTION__, 'Municipality', 'Khan'], $code), $return_type);
	}

	public function Commune($code = null, $return_type = 'array')
	{
		return $this->Platform($this->Address([__FUNCTION__, 'Sangkat'], $code), $return_type);
	}

	public function Village($code = null, $return_type = 'array')
	{
		return $this->Platform($this->Address(__FUNCTION__, $code), $return_type);
	}

	public function Address($level_type = 'Province', $code = null, $order_by = '_name_en')
	{
		// When Ajax request with 4 level address
		$code = $_POST['parent_code'] ?? $code;

		if (is_array($level_type)) $province = FourLevelAddress::whereIn('_type_en', $level_type);
		else $province = FourLevelAddress::where('_type_en', $level_type);

		if ($code) $province->where('_code', 'like',  $code . '%');
		return $province->orderBy($order_by)->limit(100)->get()->toArray();
	}

	// array|selection|datalist|option|array_selection
	public function Platform($address, $return_type = 'array', $selected = null)
	{
		// When Ajax request with 4 level address
		$return_type = isset($_POST['parent_code']) ? 'option' : $return_type;

		if ($return_type == 'selection') {
			$html_elements = '<select __ATTRIBUTES__>';
			foreach ($address as $addr) {
				$html_elements .= '<option ' . (($selected && $selected == $addr['_code']) ? 'selected' : '') . ' value="' . $addr['_code'] . '">' . $addr['_name_kh'] . '</option>';
			}
			$html_elements .= '</select>';
			return $html_elements;
		} else if ($return_type == 'option') {
			$html_elements = '<option value="">------------------</option>';
			foreach ($address as $addr) {
				$html_elements .= '<option ' . (($selected && $selected == $addr['_code']) ? 'selected' : '') . ' value="' . $addr['_code'] . '">' . $addr['_name_kh'] . ' :: ' . $addr['_name_en'] . '</option>';
			}
			return $html_elements;
		} else if ($return_type == 'array_selection') {
			$html_elements = [];
			foreach ($address as $addr) {
				$html_elements[$addr['_code']] = $addr['_name_kh'] . ' :: ' . $addr['_name_en'];
			}
			return [$html_elements, $selected];
		} else if ($return_type == 'datalist') {
			$html_elements = '<datalist __ATTRIBUTES__>';
			foreach ($address as $addr) {
				$html_elements .= '<option value="' . $addr['_name_kh'] . '">' . $addr['_name_en'] . '</option>';
			}
			$html_elements .= '</datalist>';
			return $html_elements;
		}
		return $address;
	}

	public function create (Request $request) {
		$code_length = $request->addr ? strlen($request->addr) : 0;
		$this->data = [
			'addr' => $request->addr		
		];
		return view('province.create', $this->data);
	} 

	public function store (Request $request) {
		$code_length = $request->addr ? strlen($request->addr) : 0;
		$_type_kh = $code_length == 0 ? 'ខេត្ត' : ($code_length == 2 ? 'ស្រុក' : ($code_length == 4 ? 'ឃុំ' : 'ភូមិ'));
		$_type_en = $code_length == 0 ? 'Province' : ($code_length == 2 ? 'District' : ($code_length == 4 ? 'Commune' : 'Village'));
		
		$_name_kh = $request->name_kh;
		$_name_en = $request->name_en;
		
		$_path_kh = $request->path_kh;
		$_path_en = $request->path_en;

		// Generate new code
		$address = FourLevelAddress::where('_type_en', $_type_en);
		if ($request->addr) $address = $address->where('_code', 'like',  $request->addr . '%');
		$address = $address->orderBy('_code', 'desc')->take(1)->get()->first();

		if ($address && $address->count() > 0) {
			$nb_digit = strlen($address->_code);
			$_code = str_pad((int) $address->_code + 1, $nb_digit, '0', STR_PAD_LEFT);
		} else {
			$_code = $request->addr . '01';
		}

		if (FourLevelAddress::create(compact('_type_kh', '_type_en', '_name_kh', '_name_en', '_path_kh', '_path_en', '_code'))) {
			return redirect()->back()
			->with('success', __('alert.crud.success.create', ['name' => $_name_kh]) . $_name_kh . " :: " . $_name_en);
		}
	}

	public function edit (Request $request, $code) {
		$province = FourLevelAddress::where('_code', $code)->first();
		$this->data = [
			'addr' => $request->addr,
			'province' => $province,		
		];
		return view('province.edit', $this->data);
	}

	public function update(Request $request, $code)
	{
		$_name_kh = $request->name_kh;
		$_name_en = $request->name_en;
		
		$_path_kh = $request->path_kh;
		$_path_en = $request->path_en;

		DB::statement('UPDATE addresses SET _name_kh="'. $_name_kh .'", _name_en="'. $_name_en .'", _path_kh="'. $_path_kh .'", _path_en="'.$_path_en.'" WHERE _code="' . $code . '"');
		return redirect()->back()
			->with('success', __('alert.crud.success.update',  ['name' => $_name_kh]) . $_name_kh . " :: " . $_name_en);
	}
}
