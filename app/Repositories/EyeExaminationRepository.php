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

	public function getEyeExaminationPreview($id, $path)
	{
		$GlobalComponent = new GlobalComponent;
		$tbody = '';
		$eye_examination = EyeExamination::find($id);

		$title = 'EyeExamination (EE'. date('Y', strtotime($eye_examination->date)) .'-'.str_pad($eye_examination->id, 6, "0", STR_PAD_LEFT) .')';

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
							<td>'. $eye_examination->plain_eye_vare .'</td>
							<td>'. $eye_examination->plain_eye_vale .'</td>
						</tr>
						<tr>
							<td class="text-center">With PH/td>
							<td>'. $eye_examination->with_ph_vare .'</td>
							<td>'. $eye_examination->with_ph_vale  .'</td>
						</tr>
						<tr>
							<td class="text-center">With Glasses</td>
							<td>'. $eye_examination->with_glasses_vare .'</td>
							<td>'. $eye_examination->with_glasses_vale .'</td>
						</tr>
					</tbody>
				</table>
				<table class="table-info-2">
					<tbody>
						<tr>
							<td width="30%">Initial IOP</td>
							<td width="35%"><b>RE: </b> '. $eye_examination->plain_eye_vare .'</td>
							<td width="35%"><b>LE: </b> '. $eye_examination->plain_eye_vare .'</td>
						</tr>
						<tr>
							<td rowspan="2">Primary Diagnosis</td>
							<td colspan="2"><b>RE: </b> '. $eye_examination->primary_diagnosis_re .'</td>
						</tr>
						<tr>
							<td colspan="2"><b>LE: </b> '. $eye_examination->primary_diagnosis_le .'</td>
						</tr>
					</tbody>
				</table>
				<table class="table-image">
					<tbody>
						<tr>
							<td width="30%">Examination</td>
							<td width="20%">RE</td>
							<td width="30%"></td>
							<td width="20%">LE</td>
						</tr>
						<tr>
							<td class="text-right">Uper Lide</td>
							<td class="text-center"><img src="'. $path . $eye_examination->image_uper_lide_re .'" alt=""></td>
							<td class="text-right">Uper Lide</td>
							<td class="text-center"><img src="'. $path . $eye_examination->image_uper_lide_le .'" alt=""></td>
						</tr>
						<tr>
							<td class="text-right">Eye Boll</td>
							<td class="text-center"><img src="'. $path . $eye_examination->image_eye_boll_re .'" alt=""></td>
							<td class="text-right">Eye Boll</td>
							<td class="text-center"><img src="'. $path . $eye_examination->image_eye_boll_le .'" alt=""></td>
						</tr>
						<tr>
							<td class="text-right">Locver lide</td>
							<td class="text-center"><img src="'. $path . $eye_examination->image_locver_lide_re .'" alt=""></td>
							<td class="text-right">Locver lide</td>
							<td class="text-center"><img src="'. $path . $eye_examination->image_locver_lide_le .'" alt=""></td>
						</tr>
					</tbody>
				</table>
				<table class="table-info-2">
					<tbody>
						<tr>
							<td width="15%">Orbit</td>
							<td>'. $eye_examination->orbit_re .'</td>
							<td>'. $eye_examination->orbit_le .'</td>
						</tr>
						<tr>
							<td>Ocular Movem</td>
							<td>'. $eye_examination->ocular_movem_re .'</td>
							<td>'. $eye_examination->ocular_movem_le .'</td>
						</tr>
						<tr>
							<td>Eyelid/lash</td>
							<td>'. $eye_examination->eyelid_las_re .'</td>
							<td>'. $eye_examination->eyelid_las_le .'</td>
						</tr>
						<tr>
							<td>Conjunctiva</td>
							<td>'. $eye_examination->conjunctiva_re .'</td>
							<td>'. $eye_examination->conjunctiva_le .'</td>
						</tr>
						<tr>
							<td>Cornea</td>
							<td>'. $eye_examination->cornea_re .'</td>
							<td>'. $eye_examination->cornea_le .'</td>
						</tr>
						<tr>
							<td>AC</td>
							<td>'. $eye_examination->ac_re .'</td>
							<td>'. $eye_examination->ac_le .'</td>
						</tr>
						<tr>
							<td>Lris/Pupil</td>
							<td>'. $eye_examination->lris_pupil_re .'</td>
							<td>'. $eye_examination->lris_pupil_le .'</td>
						</tr>
						<tr>
							<td>Lens</td>
							<td>'. $eye_examination->lens_re .'</td>
							<td>'. $eye_examination->lens_le .'</td>
						</tr>
						<tr>
							<td>Retinal Reflex</td>
							<td>'. $eye_examination->retinal_reflex_re .'</td>
							<td>'. $eye_examination->retinal_reflex_le .'</td>
						</tr>
					</tbody>
				</table>
                <br/>
                ' . $GlobalComponent->FooterComeBackText('សូមត្រលប់មកវិញ តាមការណាត់ជួប និងមានអាការៈខុសពីធម្មតា!') . '
                <table class="table-footer" width="100%">
                ' . $GlobalComponent->DoctorSignature() . '
                </table>
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
			'created_by' => Auth::user()->id,
			'updated_by' => Auth::user()->id,
		]));

		if ($request->file('image_uper_lide_re')) {
			$image_uper_lide_re = $request->file('image_uper_lide_re');
			$eye_examination_image_uper_lide_re = time() .'_'. $eye_examination->id .'.png';
			Image::make($image_uper_lide_re->getRealPath())->save($path.$eye_examination_image_uper_lide_re);
			$eye_examination->update(['image_uper_lide_re'=>$eye_examination_image_uper_lide_re]);
		}
		if ($request->file('image_uper_lide_le')) {
			$image_uper_lide_le = $request->file('image_uper_lide_le');
			$eye_examination_image_uper_lide_le = time() .'_'. $eye_examination->id .'.png';
			Image::make($image_uper_lide_le->getRealPath())->save($path.$eye_examination_image_uper_lide_le);
			$eye_examination->update(['image_uper_lide_le'=>$eye_examination_image_uper_lide_le]);
		}

		if ($request->file('image_eye_boll_re')) {
			$image_eye_boll_re = $request->file('image_eye_boll_re');
			$eye_examination_image_eye_boll_re = time() .'_'. $eye_examination->id .'.png';
			Image::make($image_eye_boll_re->getRealPath())->save($path.$eye_examination_image_eye_boll_re);
			$eye_examination->update(['image_eye_boll_re'=>$eye_examination_image_eye_boll_re]);
		}
		if ($request->file('image_eye_boll_le')) {
			$image_eye_boll_le = $request->file('image_eye_boll_le');
			$eye_examination_image_eye_boll_le = time() .'_'. $eye_examination->id .'.png';
			Image::make($image_eye_boll_le->getRealPath())->save($path.$eye_examination_image_eye_boll_le);
			$eye_examination->update(['image_eye_boll_le'=>$eye_examination_image_eye_boll_le]);
		}

		if ($request->file('image_locver_lide_re')) {
			$image_locver_lide_re = $request->file('image_locver_lide_re');
			$eye_examination_image_locver_lide_re = time() .'_'. $eye_examination->id .'.png';
			Image::make($image_locver_lide_re->getRealPath())->save($path.$eye_examination_image_locver_lide_re);
			$eye_examination->update(['image_locver_lide_re'=>$eye_examination_image_locver_lide_re]);
		}
		if ($request->file('image_locver_lide_le')) {
			$image_locver_lide_le = $request->file('image_locver_lide_le');
			$eye_examination_image_uper_lide_re = time() .'_'. $eye_examination->id .'.png';
			Image::make($image_locver_lide_le->getRealPath())->save($path.$eye_examination_image_uper_lide_re);
			$eye_examination->update(['image_locver_lide_le'=>$eye_examination_image_uper_lide_re]);
		}

		return $eye_examination;
	}

	public function update($request, $eye_examination, $path)
	{
		dd($request->all());
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
			'updated_by' => Auth::user()->id,
		]));

		if ($request->file('image_uper_lide_re')) {
			$image_uper_lide_re = $request->file('image_uper_lide_re');
			$eye_examination_image_uper_lide_re = (($eye_examination->image_uper_lide_re!='default.png')? $eye_examination->image_uper_lide_re : time() .'_'. $eye_examination->id .'.png');
			$img = Image::make($image_uper_lide_re->getRealPath())->save($path.$eye_examination_image_uper_lide_re);
			$eye_examination->update(['image_uper_lide_re'=>$eye_examination_image_uper_lide_re]);
		}
		if ($request->file('image_uper_lide_le')) {
			$image_uper_lide_le = $request->file('image_uper_lide_le');
			$eye_examination_image_uper_lide_le = (($eye_examination->image_uper_lide_le!='default.png')? $eye_examination->image_uper_lide_le : time() .'_'. $eye_examination->id .'.png');
			$img = Image::make($image_uper_lide_le->getRealPath())->save($path.$eye_examination_image_uper_lide_le);
			$eye_examination->update(['image_uper_lide_le'=>$eye_examination_image_uper_lide_le]);
		}

		if ($request->file('image_eye_boll_re')) {
			$image_eye_boll_re = $request->file('image_eye_boll_re');
			$eye_examination_image_eye_boll_re = (($eye_examination->image_eye_boll_re!='default.png')? $eye_examination->image_eye_boll_re : time() .'_'. $eye_examination->id .'.png');
			$img = Image::make($image_eye_boll_re->getRealPath())->save($path.$eye_examination_image_eye_boll_re);
			$eye_examination->update(['image_eye_boll_re'=>$eye_examination_image_eye_boll_re]);
		}
		if ($request->file('image_eye_boll_le')) {
			$image_eye_boll_le = $request->file('image_eye_boll_le');
			$eye_examination_image_eye_boll_le = (($eye_examination->image_eye_boll_le!='default.png')? $eye_examination->image_eye_boll_le : time() .'_'. $eye_examination->id .'.png');
			$img = Image::make($image_eye_boll_le->getRealPath())->save($path.$eye_examination_image_eye_boll_le);
			$eye_examination->update(['image_eye_boll_le'=>$eye_examination_image_eye_boll_le]);
		}

		if ($request->file('image_locver_lide_re')) {
			$image_locver_lide_re = $request->file('image_locver_lide_re');
			$eye_examination_image_locver_lide_re = (($eye_examination->image_locver_lide_re!='default.png')? $eye_examination->image_locver_lide_re : time() .'_'. $eye_examination->id .'.png');
			$img = Image::make($image_locver_lide_re->getRealPath())->save($path.$eye_examination_image_locver_lide_re);
			$eye_examination->update(['image_locver_lide_re'=>$eye_examination_image_locver_lide_re]);
		}
		if ($request->file('image_locver_lide_le')) {
			$image_locver_lide_le = $request->file('image_locver_lide_le');
			$eye_examination_image_locver_lide_le = (($eye_examination->image_locver_lide_le!='default.png')? $eye_examination->image_locver_lide_le : time() .'_'. $eye_examination->id .'.png');
			$img = Image::make($image_locver_lide_le->getRealPath())->save($path.$eye_examination_image_locver_lide_le);
			$eye_examination->update(['image_locver_lide_le'=>$eye_examination_image_locver_lide_le]);
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
