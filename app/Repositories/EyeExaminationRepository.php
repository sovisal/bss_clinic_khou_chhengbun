<?php

namespace App\Repositories;

use Auth;
use App\Models\EyeExamination;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\Facades\DataTables;
use App\Repositories\Component\GlobalComponent;


class EyeExaminationRepository
{

	public function getDatatable($request)
	{

		$from = $request->from;
		$to = $request->to;
		$eye_examinations = EyeExamination::whereBetween('date', [$from, $to])->orderBy('date', 'asc')->get();

		return Datatables::of($eye_examinations)
			->addColumn('number', function ($eye_examination) {
				return str_pad($eye_examination->id, 6, '0', STR_PAD_LEFT);
			})
			->addColumn('actions', function () {
				$button = '';
				return $button;
			})
			->make(true);
	}

	public function getEyeExaminationPreview($id)
	{
		$GlobalComponent = new GlobalComponent;
		$tbody = '';
		$eye_examination = EyeExamination::find($id);

		$title = 'EyeExamination (EE' . date('Y', strtotime($eye_examination->date)) . '-' . str_pad($eye_examination->id, 6, "0", STR_PAD_LEFT) . ')';

		$eye_examination_detail = '<section class="eye_examination-print" style="position: relative;">
			' . $GlobalComponent->PrintHeader('eye_examination', $eye_examination) . '
				<table class="table-info-1">
					<thead>
						<tr>
							<th width="34%"></th>
							<th width="33%">VARE</th>
							<th width="33%">VALE</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="text-center">Plain Eye</td>
							<td>' . $eye_examination->plain_eye_vare . '</td>
							<td>' . $eye_examination->plain_eye_vale . '</td>
						</tr>
						<tr>
							<td class="text-center">With PH</td>
							<td>' . $eye_examination->with_ph_vare . '</td>
							<td>' . $eye_examination->with_ph_vale  . '</td>
						</tr>
						<tr>
							<td class="text-center">With Glasses</td>
							<td>' . $eye_examination->with_glasses_vare . '</td>
							<td>' . $eye_examination->with_glasses_vale . '</td>
						</tr>
					</tbody>
				</table>
				<table class="table-info-2">
					<tbody>
						<tr>
							<td width="25%">Initial IOP</td>
							<td width="25%"><b>RE: </b> ' . $eye_examination->initial_iop_re . '</td>
							<td width="25%"><b>LE: </b> ' . $eye_examination->initial_iop_le . '</td>
							<td width="25%">Normal :(10-20)mmhg</td>
						</tr>
						<tr>
							<td rowspan="2">Primary Diagnosis</td>
							<td colspan="3"><b>RE: </b> ' . $eye_examination->primary_diagnosis_re . '</td>
						</tr>
						<tr>
							<td colspan="3"><b>LE: </b> ' . $eye_examination->primary_diagnosis_le . '</td>
						</tr>
					</tbody>
				</table>
				<table class="table-image">
					<tbody>
						<tr>
							<td width="20%">Examination:</td>
							<td width="30%" class="text-center">RE</td>
							<td width="20%"></td>
							<td width="30%" class="text-center">LE</td>
						</tr>
						<tr>
							<td class="text-right">Uper Lide</td>
							<td class="text-center">' . (($eye_examination->image_uper_lide_re != '') ? '<img src="' . asset('images/eye_examinations/' . $eye_examination->image_uper_lide_re) . '" alt="...">' : '') . '</td>
							<td class="text-right">Uper Lide</td>
							<td class="text-center">' . (($eye_examination->image_uper_lide_le != '') ? '<img src="' . asset('images/eye_examinations/' . $eye_examination->image_uper_lide_le) . '" alt="...">' : '') . '</td>
						</tr>
						<tr>
							<td class="text-right">Eye Boll</td>
							<td class="text-center">' . (($eye_examination->image_eye_boll_re != '') ? '<img src="' . asset('images/eye_examinations/' . $eye_examination->image_eye_boll_re) . '" alt="...">' : '') . '</td>
							<td class="text-right">Eye Boll</td>
							<td class="text-center">' . (($eye_examination->image_eye_boll_le != '') ? '<img src="' . asset('images/eye_examinations/' . $eye_examination->image_eye_boll_le) . '" alt="...">' : '') . '</td>
						</tr>
						<tr>
							<td class="text-right">Locver lide</td>
							<td class="text-center">' . (($eye_examination->image_locver_lide_re != '') ? '<img src="' . asset('images/eye_examinations/' . $eye_examination->image_locver_lide_re) . '" alt="...">' : '') . '</td>
							<td class="text-right">Locver lide</td>
							<td class="text-center">' . (($eye_examination->image_locver_lide_le != '') ? '<img src="' . asset('images/eye_examinations/' . $eye_examination->image_locver_lide_le) . '" alt="...">' : '') . '</td>
						</tr>
					</tbody>
				</table>
				<table class="table-info-3">
					<tbody>
						<tr>
							<td width="35%">' . $eye_examination->orbit_re . '</td>
							<td width="30%"><span>Orbit</span></td>
							<td width="35%">' . $eye_examination->orbit_le . '</td>
						</tr>
						<tr>
							<td>' . $eye_examination->ocular_movem_re . '</td>
							<td><span>Ocular Movem</span></td>
							<td>' . $eye_examination->ocular_movem_le . '</td>
						</tr>
						<tr>
							<td>' . $eye_examination->eyelid_las_re . '</td>
							<td><span>Eyelid/lash</span></td>
							<td>' . $eye_examination->eyelid_las_le . '</td>
						</tr>
						<tr>
							<td>' . $eye_examination->conjunctiva_re . '</td>
							<td><span>Conjunctiva</span></td>
							<td>' . $eye_examination->conjunctiva_le . '</td>
						</tr>
						<tr>
							<td>' . $eye_examination->cornea_re . '</td>
							<td><span>Cornea</span></td>
							<td>' . $eye_examination->cornea_le . '</td>
						</tr>
						<tr>
							<td>' . $eye_examination->ac_re . '</td>
							<td><span>AC</span></td>
							<td>' . $eye_examination->ac_le . '</td>
						</tr>
						<tr>
							<td>' . $eye_examination->lris_pupil_re . '</td>
							<td><span>Lris/Pupil</span></td>
							<td>' . $eye_examination->lris_pupil_le . '</td>
						</tr>
						<tr>
							<td>' . $eye_examination->lens_re . '</td>
							<td><span>Lens</span></td>
							<td>' . $eye_examination->lens_le . '</td>
						</tr>
						<tr>
							<td>' . $eye_examination->retinal_reflex_re . '</td>
							<td><span>Retinal Reflex</span></td>
							<td>' . $eye_examination->retinal_reflex_le . '</td>
						</tr>
					</tbody>
				</table>
				<br/>
				' . $GlobalComponent->FooterComeBackText('សូមយកវេជ្ជបញ្ជានេះមកវិញពេលមកពិនិត្យលើកក្រោយ') . '
			</section>';
		return response()->json(['eye_examination_detail' => $eye_examination_detail, 'title' => $title]);
		// return $eye_examination_detail;

	}

	public function create($request, $path)
	{
		$request->patient_id = GlobalComponent::GetPatientIdOrCreate($request);
		$eye_examination = EyeExamination::create(GlobalComponent::MergeRequestPatient($request, [
			'date' => $request->date,
			'plain_eye_vare' => $request->plain_eye_vare,
			'plain_eye_vale' => $request->plain_eye_vale,
			'with_ph_vare' => $request->with_ph_vare,
			'with_ph_vale' => $request->with_ph_vale,
			'with_glasses_vare' => $request->with_glasses_vare,
			'with_glasses_vale' => $request->with_glasses_vale,
			'initial_iop_re' => $request->initial_iop_re,
			'initial_iop_le' => $request->initial_iop_le,
			'primary_diagnosis_re' => $request->primary_diagnosis_re,
			'primary_diagnosis_le' => $request->primary_diagnosis_le,
			'orbit_re' => $request->orbit_re,
			'orbit_le' => $request->orbit_le,
			'ocular_movem_re' => $request->ocular_movem_re,
			'ocular_movem_le' => $request->ocular_movem_le,
			'eyelid_las_re' => $request->eyelid_las_re,
			'eyelid_las_le' => $request->eyelid_las_le,
			'conjunctiva_re' => $request->conjunctiva_re,
			'conjunctiva_le' => $request->conjunctiva_le,
			'cornea_re' => $request->cornea_re,
			'cornea_le' => $request->cornea_le,
			'ac_re' => $request->ac_re,
			'ac_le' => $request->ac_le,
			'lris_pupil_re' => $request->lris_pupil_re,
			'lris_pupil_le' => $request->lris_pupil_le,
			'lens_re' => $request->lens_re,
			'lens_le' => $request->lens_le,
			'retinal_reflex_re' => $request->retinal_reflex_re,
			'retinal_reflex_le' => $request->retinal_reflex_le,
			'created_by' => auth()->user()->id,
			'updated_by' => auth()->user()->id,
		]));

		// Save image to path
		$images = $this->saveImage(['image_uper_lide_re', 'image_uper_lide_le', 'image_eye_boll_re', 'image_eye_boll_le', 'image_locver_lide_re', 'image_locver_lide_le'], $path, $eye_examination->id);
		// Update iamge name on records
		$eye_examination->update($images);

		return $eye_examination;
	}

	public function update($request, $eye_examination, $path)
	{
		$eye_examination->update(GlobalComponent::MergeRequestPatient($request, [
			'date' => $request->date,
			'plain_eye_vare' => $request->plain_eye_vare,
			'plain_eye_vale' => $request->plain_eye_vale,
			'with_ph_vare' => $request->with_ph_vare,
			'with_ph_vale' => $request->with_ph_vale,
			'with_glasses_vare' => $request->with_glasses_vare,
			'with_glasses_vale' => $request->with_glasses_vale,
			'initial_iop_re' => $request->initial_iop_re,
			'initial_iop_le' => $request->initial_iop_le,
			'primary_diagnosis_re' => $request->primary_diagnosis_re,
			'primary_diagnosis_le' => $request->primary_diagnosis_le,
			'orbit_re' => $request->orbit_re,
			'orbit_le' => $request->orbit_le,
			'ocular_movem_re' => $request->ocular_movem_re,
			'ocular_movem_le' => $request->ocular_movem_le,
			'eyelid_las_re' => $request->eyelid_las_re,
			'eyelid_las_le' => $request->eyelid_las_le,
			'conjunctiva_re' => $request->conjunctiva_re,
			'conjunctiva_le' => $request->conjunctiva_le,
			'cornea_re' => $request->cornea_re,
			'cornea_le' => $request->cornea_le,
			'ac_re' => $request->ac_re,
			'ac_le' => $request->ac_le,
			'lris_pupil_re' => $request->lris_pupil_re,
			'lris_pupil_le' => $request->lris_pupil_le,
			'lens_re' => $request->lens_re,
			'lens_le' => $request->lens_le,
			'retinal_reflex_re' => $request->retinal_reflex_re,
			'retinal_reflex_le' => $request->retinal_reflex_le,
			'updated_by' => auth()->user()->id,
		]));

		$i = 0;
		$arr_img = [];
		$arr_img[$eye_examination->image_uper_lide_re ?? $i++] = 'image_uper_lide_re';
		$arr_img[$eye_examination->image_uper_lide_le ?? $i++] = 'image_uper_lide_le';
		$arr_img[$eye_examination->image_eye_boll_re ?? $i++] = 'image_eye_boll_re';
		$arr_img[$eye_examination->image_eye_boll_le ?? $i++] = 'image_eye_boll_le';
		$arr_img[$eye_examination->image_locver_lide_re ?? $i++] = 'image_locver_lide_re';
		$arr_img[$eye_examination->image_locver_lide_le ?? $i++] = 'image_locver_lide_le';
		// Save image to path
		$images = $this->saveImage($arr_img, $path, $eye_examination->id);
		// Update iamge name on records
		$eye_examination->update($images);

		return $eye_examination;
	}

	public function destroy($request, $eye_examination, $path)
	{
		if (Hash::check($request->passwordDelete, auth()->user()->password)) {
			$id = $eye_examination->id;
			if ($eye_examination->delete()) {
				
				// Delete Old image
				$this->deleteImage($path . $eye_examination->image_uper_lide_re);
				$this->deleteImage($path . $eye_examination->image_uper_lide_le);
				$this->deleteImage($path . $eye_examination->image_eye_boll_re);
				$this->deleteImage($path . $eye_examination->image_eye_boll_le);
				$this->deleteImage($path . $eye_examination->image_locver_lide_re);
				$this->deleteImage($path . $eye_examination->image_locver_lide_le);
				return $id;
			}
		} else {
			return false;
		}
	}

	public function saveImage($arr_image, $path, $id)
	{
		$images = [];
		foreach ($arr_image as $key => $req) {
			if (request()->file($req)) {
				// Get image from request
				$img = request()->file($req);
				// Generate image name
				$eye_examination_img = time() . '_'. $req .'_' . $id . '.png';
				// Init Intervention Image
				$image = Image::make($img->getRealPath());
				// Save Standard image to path
				$image->resize(1000, null, function ($constraint) {
					$constraint->aspectRatio();
				});
				$image->save($path . $eye_examination_img);

				// Pass save image to array to update record
				$images[$req] = $eye_examination_img;

				// Delete Old image
				$this->deleteImage($path . $key);
			}
		}
		return $images;
	}

	public function deleteImage($path)
	{
		if(File::exists($path)){
			File::delete($path);
			return true;
		}else{
			return false;
		}
	}


}
