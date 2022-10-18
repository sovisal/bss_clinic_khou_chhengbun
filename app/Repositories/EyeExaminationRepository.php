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
			->addColumn('actions', function () {
				$button = '';
				return $button;
			})
			->make(true);
	}

	public function getEyeExaminationPreview($id)
	{
		$GlobalComponent = new GlobalComponent;

		$no = 1;
		$total = 0;
		$total_discount = 0;
		$grand_total = 0;
		$eye_examination_detail = '';
		$tbody = '';

		$eye_examination = EyeExamination::find($id);

		$title = 'EyeExamination (INV'. date('Y', strtotime($eye_examination->date)) .'-'.str_pad($eye_examination->inv_number, 6, "0", STR_PAD_LEFT) .')';
		$total_riel = number_format($total*$eye_examination->rate, 0);
		$total_discount_riel = number_format($total_discount*$eye_examination->rate, 0);
		$grand_total_riel = number_format($grand_total*$eye_examination->rate, 0);


		$gtt = explode(".", number_format($grand_total,2));
		$gtt_dollars = $gtt[0];
		$gtt_cents = $gtt[1];

		$grand_total_in_word = Auth::user()->num2khtext($gtt_dollars, false) . 'ដុល្លារ' . (($gtt_cents>0)? ' និង'. Auth::user()->num2khtext($gtt_cents, false) .'សេន' : '');
		$grand_total_riel_in_word = Auth::user()->num2khtext(round($grand_total*$eye_examination->rate, 0), false);

		if(empty($eye_examination->province)){ $eye_examination->province = new \stdClass(); $eye_examination->province->name = ''; }
		if(empty($eye_examination->district)){ $eye_examination->district = new \stdClass(); $eye_examination->district->name = ''; }

		if ($eye_examination->echo_default_description->slug == 'letter-form-the-hospital') {
			$eye_examination_detail = '<section class="eye_examination-print" style="position: relative;">
				' . $GlobalComponent->PrintHeader('echo', $eye_examination) . '
				<br/>
				<br/>
				<div class="echo_description">
					'. $eye_examination->description .'
				</div>
			</section>';
		}else{
			$eye_examination_detail = '<section class="eye_examination-print" style="position: relative;">
				' . $GlobalComponent->PrintHeader('echo', $eye_examination) . '
				<div class="echo_description">
					<div style="margin-bottom: 10px;">
						រោគវិនិច្ឆ័យ: '. $eye_examination->pt_diagnosis .'
					</div>
					'. $eye_examination->description .'
				</div>
				<table class="table-detail" width="100%">
					<tr>
						<td width="70%" style="padding: 10px;">
							<img src="/images/eye_examination/'. $eye_examination->image .'" alt="IMG" height="300px">
						</td>
						<td>
							<div>Le. '. date('d-m-Y', strtotime($eye_examination->date)) .'</div>
							<br/>
							<br/>
							<br/>
							<br/>
							<br/>
							<br/>
							<br/>
							<div>'. Auth::user()->setting()->sign_name_en .'</div>
						</td>
					</tr>
				</table>
				<div class="color_red" style="color: red; text-decoration: underline; text-align: center; position: absolute; bottom: 30px; left: 50%; transform: translateX(-50%);">សូមយកវេជ្ជបញ្ជាមកវិញពេលមកពិនិត្យលើក្រោយ</div>
				<br/>
			</section>';
		}

		return response()->json(['eye_examination_detail' => $eye_examination_detail, 'title' => $title]);
		// return $eye_examination_detail;

	}

	public function create($request, $path)
	{
		dd($request);
		$request->patient_id = GlobalComponent::GetPatientIdOrCreate($request);
		$eye_examination = EyeExamination::create(GlobalComponent::MergeRequestPatient($request, [
			'date' => $request->date,
			'initial_iop_re' => $request->initial_iop_re,
			'initial_iop_le' => $request->initial_iop_le,
			'primary_diagnosis_re' => $request->primary_diagnosis_re,
			'primary_diagnosis_le' => $request->primary_diagnosis_le,
			'initial_iop_re' => $request->initial_iop_re,
			'initial_iop_le' => $request->initial_iop_le,
			'primary_diagnosis_re' => $request->primary_diagnosis_re,
			'primary_diagnosis_le' => $request->primary_diagnosis_le,
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

			// 'image_uper_lide_re' => $request->image_uper_lide_re,
			// 'image_uper_lide_le' => $request->image_uper_lide_le,
			// 'image_eye_boll_re' => $request->image_eye_boll_re,
			// 'image_eye_boll_le' => $request->image_eye_boll_le,
			// 'image_locver_lide_re' => $request->image_locver_lide_re,
			// 'image_locver_lide_le' => $request->image_locver_lide_le,

			'created_by' => Auth::user()->id,
			'updated_by' => Auth::user()->id,
		]));

		if ($request->file('image')) {
			$image = $request->file('image');
			$eye_examination_image = time() .'_'. $eye_examination->id .'.png';
			$img = Image::make($image->getRealPath())->save($path.$eye_examination_image);
			$eye_examination->update(['image'=>$eye_examination_image]);
		}
		return $eye_examination;
	}

	public function update($request, $eye_examination, $path)
	{
		$eye_examination->update(GlobalComponent::MergeRequestPatient($request, [
			'date' => $request->date,
			'pt_diagnosis' => $request->pt_diagnosis,
			'description' => $request->description,
			'updated_by' => Auth::user()->id,
		]));

		if ($request->file('image')) {
			$image = $request->file('image');
			$eye_examination_image = (($eye_examination->image!='default.png')? $eye_examination->image : time() .'_'. $eye_examination->id .'.png');
			$img = Image::make($image->getRealPath())->save($path.$eye_examination_image);
			$eye_examination->update(['image'=>$eye_examination_image]);
		}
		return $eye_examination;
	}

	public function destroy($request, $eye_examination, $path)
	{
		if (Hash::check($request->passwordDelete, Auth::user()->password)){
			$image = $eye_examination->image;
			if($eye_examination->delete()){

				if ($eye_examination->image!='default.png') {
					File::deleteDirectory($path.$image);
				}

				return $request->pt_name;
			}
		}else{
			return false;
		}
	}
}
