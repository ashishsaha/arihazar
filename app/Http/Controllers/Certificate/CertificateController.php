<?php

namespace App\Http\Controllers\Certificate;

use App\Models\Certificate\Certificate;
use App\Models\Certificate\CharacterCertificate;
use App\Models\Certificate\Counselor;
use App\Models\Certificate\FamilyCertificate;
use App\Models\Certificate\FamilyCertificateDetails;
use App\Models\Certificate\FamilyCertificateEnglish;
use App\Models\Certificate\FamilyCertificateEnglishDetails;
use App\Http\Controllers\Controller;
use App\Models\Certificate\IncomeCertificate;
use App\Models\Certificate\LandlessCertificate;
use App\Models\Certificate\NationalityCertificate;
use App\Models\Certificate\NationalityCertificateEng;
use App\Models\Certificate\OyarishCertificate;
use App\Models\Certificate\OyarishCertificateFamily;
use App\Models\Certificate\OyarishCertificateFamilyDetails;
use App\Models\Certificate\RemarriageCertificateBn;
use App\Models\Certificate\unmarriageCertificateBn;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CertificateController extends Controller
{
    public function unmarriageCertificateBnPrint($certificate_id)
    {
        $certificate = unmarriageCertificateBn::find($certificate_id);
        return view('certificate.unmarriage-bng-certificate-print', ['certificate' => $certificate, 'active' => 20]);
    }

    public function addOyarishCertificate()
    {
        $counselors = Counselor::all();
        return view('certificate.add-oyarish-certificate', ['active' => 3, 'counselors' => $counselors]);
    }

    public function addOyarishDetailsCertificate(Request $request)
    {
        $certificate_id =  $request->certificate_id;
        $details_id =  $request->details_id;
        $oyarish_details = OyarishCertificateFamily::where('oyarish_certificate_id', $certificate_id)->where('id', $details_id)->first();

        return view('certificate.add-oyarish-details-certificate', ['oyarish_details' => $oyarish_details]);
    }

    public function saveOyarishDetailsCertificate(Request $request)
    {
        $oyarish_certificate_id = $request->certificate_id;
        $oyarish_certificate_family_id = $request->oyarish_certificate_family_id;

        $wife_name_array = $request->wife_name_array;
        $wife_aliv_status_array = $request->wife_aliv_status;


        if ($wife_name_array[0]) {
            for ($i = 0; $i < count($wife_name_array); $i++) {
                $oyarishCertificateFamily = new OyarishCertificateFamilyDetails();
                $oyarishCertificateFamily->oyarish_certificate_id = $oyarish_certificate_id;
                $oyarishCertificateFamily->oyarish_certificate_family_id = $oyarish_certificate_family_id;
                $oyarishCertificateFamily->name = $wife_name_array[$i];
                $oyarishCertificateFamily->alive_status  = null;
                $oyarishCertificateFamily->status = 1;
                $oyarishCertificateFamily->save();
            }
        }

        $son_name_array = $request->son_name_array;
        $son_aliv_status_array = $request->son_aliv_status;

        if ($son_name_array[0]) {
            for ($i = 0; $i < count($son_name_array); $i++) {

                $oyarishCertificateFamily = new OyarishCertificateFamilyDetails();
                $oyarishCertificateFamily->oyarish_certificate_id = $oyarish_certificate_id;
                $oyarishCertificateFamily->oyarish_certificate_family_id = $oyarish_certificate_family_id;
                $oyarishCertificateFamily->name = $son_name_array[$i];
                $oyarishCertificateFamily->alive_status  = null;
                $oyarishCertificateFamily->status = 2;
                $oyarishCertificateFamily->save();
            }
        }

        $daughter_name_array = $request->daughter_name_array;
        $girl_aliv_status_array = $request->girl_aliv_status;

        if ($daughter_name_array[0]) {
            for ($i = 0; $i < count($daughter_name_array); $i++) {

                $oyarishCertificateFamily = new OyarishCertificateFamilyDetails();
                $oyarishCertificateFamily->oyarish_certificate_id = $oyarish_certificate_id;
                $oyarishCertificateFamily->oyarish_certificate_family_id = $oyarish_certificate_family_id;
                $oyarishCertificateFamily->name = $daughter_name_array[$i];
                $oyarishCertificateFamily->alive_status  = null;
                $oyarishCertificateFamily->status = 3;
                $oyarishCertificateFamily->save();
            }
        }

        return redirect()->route('oyarish.certificate.print', ['certificate_id' => $oyarish_certificate_id]);
    }

    public function showAllOyarishCertificate()
    {
        $all_certificate = OyarishCertificate::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('certificate.show-all-Oyarish-certificate', ['all_certificate' => $all_certificate, 'active' => 20]);
    }

    public function saveOyarishCertificate(Request $request)
    {
        $bn = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
        $en = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
        $lastOyarishCertificate = OyarishCertificate::latest()->first();
        if ($lastOyarishCertificate) {
            $serial = (int) $lastOyarishCertificate->serial_no + 1;
        } else {
            $serial = 1;
        }

        $serialNo = str_pad($serial, 6, '0', STR_PAD_LEFT);
        /*$wordNoEng = (int) str_replace($bn, $en, $request->word_no);

        if (in_array($wordNoEng, [1, 2, 3, 4, 5, 6, 7, 8, 9])) {
            $counselor = Counselor::find(11);
        } elseif (in_array($wordNoEng, [10, 11])) {
            $counselor = Counselor::find(16);
        } elseif (in_array($wordNoEng, [12, 16])) {
            $counselor = Counselor::find(18);
        } elseif (in_array($wordNoEng, [13, 14, 27])) {
            $counselor = Counselor::find(19);
        } elseif (in_array($wordNoEng, [15, 20])) {
            $counselor = Counselor::find(22);
        } elseif (in_array($wordNoEng, [17])) {
            $counselor = Counselor::find(24);
        } elseif (in_array($wordNoEng, [18, 19])) {
            $counselor = Counselor::find(25);
        } elseif (in_array($wordNoEng, [21, 22])) {
            $counselor = Counselor::find(29);
        } elseif (in_array($wordNoEng, [23, 24, 25, 26])) {
            $counselor = Counselor::find(30);
        }*/

        $oyarishCertificate = new OyarishCertificate();
        $oyarishCertificate->serial_no = $serialNo;
        $oyarishCertificate->name = $request->name;
        $oyarishCertificate->father_husband = $request->father_husband;
        $oyarishCertificate->mother = $request->mother;
        $oyarishCertificate->address = $request->address;
        $oyarishCertificate->counselor_id = $request->counselor_id;
        $oyarishCertificate->word_no = $request->word_no;
        $oyarishCertificate->moholla = $request->moholla;
        $oyarishCertificate->save();

        $oyarishCertificate_id = $oyarishCertificate->id;

        $wife_name_array = $request->wife_name_array;

        if ($wife_name_array[0]) {
            for ($i = 0; $i < count($wife_name_array); $i++) {
                $oyarishCertificateFamily = new OyarishCertificateFamily();
                $oyarishCertificateFamily->oyarish_certificate_id = $oyarishCertificate_id;
                $oyarishCertificateFamily->name = $wife_name_array[$i];
                $oyarishCertificateFamily->alive_status  = null;
                $oyarishCertificateFamily->status = 1;
                $oyarishCertificateFamily->save();
            }
        }

        $son_name_array = $request->son_name_array;
        $son_aliv_status_array = $request->son_aliv_status;

        if ($son_name_array[0]) {
            for ($i = 0; $i < count($son_name_array); $i++) {
                $oyarishCertificateFamily = new OyarishCertificateFamily();
                $oyarishCertificateFamily->oyarish_certificate_id = $oyarishCertificate_id;
                $oyarishCertificateFamily->name = $son_name_array[$i];
                $oyarishCertificateFamily->alive_status  = isset($son_aliv_status_array[$i]) ? $son_aliv_status_array[$i] : 1;
                $oyarishCertificateFamily->status = 2;
                $oyarishCertificateFamily->save();
            }
        }

        $daughter_name_array = $request->daughter_name_array;
        $daughter_aliv_status_array = $request->daughter_aliv_status;

        if ($daughter_name_array[0]) {
            for ($i = 0; $i < count($daughter_name_array); $i++) {

                $oyarishCertificateFamily = new OyarishCertificateFamily();
                $oyarishCertificateFamily->oyarish_certificate_id = $oyarishCertificate_id;
                $oyarishCertificateFamily->name = $daughter_name_array[$i];
                $oyarishCertificateFamily->alive_status  = isset($daughter_aliv_status_array[$i]) ? $daughter_aliv_status_array[$i] : 1;
                $oyarishCertificateFamily->status = 3;
                $oyarishCertificateFamily->save();
            }
        }
        return redirect()->route('oyarish.certificate.print', ['certificate_id' => $oyarishCertificate_id]);
    }

    public function unmarriageCertificateEnPrint($certificate_id)
    {
        $certificate = unmarriageCertificateBn::find($certificate_id);
        return view('certificate.unmarriage-eng-certificate-print', ['certificate' => $certificate, 'active' => 20]);
    }

    public function remarriageCertificateBnPrint($certificate_id)
    {
        $certificate = RemarriageCertificateBn::find($certificate_id);
        return view('certificate.remarriage-bng-certificate-print', ['certificate' => $certificate, 'active' => 20]);
    }

    public function incomeCertificateBnPrint($certificate_id)
    {
        $certificate = IncomeCertificate::find($certificate_id);
        return view('certificate.income-bng-certificate-print', ['certificate' => $certificate, 'active' => 20]);
    }

    public function editIncomeBnCertificate($certificate_id)
    {
        $certificate = IncomeCertificate::find($certificate_id);
        return view('certificate.income-certificate-bn-edit', ['certificate' => $certificate, 'active' => 20]);
    }

    public function remarriageCertificateEnPrint($certificate_id)
    {
        $certificate = RemarriageCertificateBn::find($certificate_id);
        return view('certificate.remarriage-eng-certificate-print', ['certificate' => $certificate, 'active' => 20]);
    }

    public function showAllUnmarriageBnCertificate()
    {
        $all_certificate = unmarriageCertificateBn::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('certificate.show-all-unmarriage-bn-certificate', ['all_certificate' => $all_certificate, 'active' => 20]);
    }

    public function showAllUnmarriageEnCertificate()
    {
        $all_certificate = unmarriageCertificateBn::where('status', 2)->orderBy('created_at', 'DESC')->get();
        return view('certificate.show-all-unmarriage-en-certificate', ['all_certificate' => $all_certificate, 'active' => 20]);
    }

    public function showAllRemarriageBnCertificate()
    {
        $all_certificate = RemarriageCertificateBn::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('certificate.show-all-remarriage-bn-certificate', ['all_certificate' => $all_certificate, 'active' => 20]);
    }

    public function showAllRemarriageEnCertificate()
    {
        //        $all_certificate = unmarriageCertificateBn::where('status',2)->orderBy('created_at', 'DESC')->get();
        $all_certificate = remarriageCertificateBn::where('status', 2)->orderBy('created_at', 'DESC')->get();
        return view('certificate.show-all-remarriage-en-certificate', ['all_certificate' => $all_certificate, 'active' => 20]);
    }

    public function showAllIncomeBnCertificate()
    {
        $all_certificate = IncomeCertificate::orderBy('created_at', 'DESC')->get();
        return view('certificate.show-all-income-bn-certificate', ['all_certificate' => $all_certificate, 'active' => 20]);
    }

    public function addCharacterCertificate()
    {
        return view('certificate.add-character-certificate', ['active' => 7]);
    }

    public function addCertificate()
    {
        return view('certificate.add-certificate', ['active' => 1]);
    }

    public function addNationalityCertificate()
    {
        $counselors = Counselor::all();
        return view('certificate.add-nationality-certificate', ['active' => 9, 'counselors' => $counselors]);
    }

    public function addUnmarriageCertificateBn()
    {
        return view('certificate.add-unmarriage-certificate-bn', ['active' => 20]);
    }

    public function addUnmarriageCertificateEn()
    {
        return view('certificate.add-unmarriage-certificate-en', ['active' => 20]);
    }

    public function addRemarriageCertificateBn()
    {
        return view('certificate.add-remarriage-certificate-bn', ['active' => 20]);
    }

    public function addIncomeCertificateBn()
    {
        return view('certificate.add-income-certificate-bn', ['active' => 20]);
    }

    public function addRemarriageCertificateEn()
    {
        return view('certificate.add-remarriage-certificate-en', ['active' => 20]);
    }

    public function saveIncomeCertificateBn(Request $request)
    {
        $lastCertificate = IncomeCertificate::latest()->first();

        $serial = null;
        if ($lastCertificate) {
            $serial = (int) $lastCertificate->serial_no + 1;
        } else {
            $serial = 1;
        }

        $serialNo = str_pad($serial, 6, '0', STR_PAD_LEFT);

        $certificate = new IncomeCertificate();
        $certificate->serial_no = $serialNo;
        $certificate->name = $request->name;
        $certificate->father_husband = $request->father_husband;
        $certificate->mother = $request->mother;
        $certificate->area_name = $request->area_name;
        $certificate->road_name = $request->road_name;
        $certificate->word_no = $request->word_no;
        $certificate->post_office = $request->post_office;
        $certificate->thana = $request->thana;
        $certificate->upazila = $request->upazila;
        $certificate->status = 1;
        $certificate->certificate_details = $request->certificate_details;
        $certificate->save();

        return redirect()->route('income.certificate_bn.print', ['id' => $certificate->id]);
    }

    public function updateIncomeBnCertificate($certificate_id, Request $request)
    {
        $certificate = IncomeCertificate::find($certificate_id);
        $certificate->serial_no = $request->serial_no;
        $certificate->name = $request->name;

        $certificate->father_husband = $request->father_husband;
        $certificate->mother = $request->mother;
        $certificate->area_name = $request->area_name;
        $certificate->road_name = $request->road_name;
        $certificate->word_no = $request->word_no;
        $certificate->post_office = $request->post_office;
        $certificate->thana = $request->thana;
        $certificate->upazila = $request->upazila;
        $certificate->certificate_details = $request->certificate_details;
        $certificate->save();
        return redirect()->route('income.certificate_bn.print', ['id' => $certificate->id]);
    }

    public function saveRemarriageCertificateBn(Request $request)
    {
        $lastCertificate = RemarriageCertificateBn::latest()->first();

        $serial = null;
        if ($lastCertificate) {
            $serial = (int) $lastCertificate->serial_no + 1;
        } else {
            $serial = 1;
        }

        $serialNo = str_pad($serial, 6, '0', STR_PAD_LEFT);

        $certificate = new RemarriageCertificateBn();
        $certificate->serial_no = $serialNo;
        $certificate->name = $request->name;
        $certificate->father_husband = $request->father_husband;
        $certificate->mother = $request->mother;
        $certificate->area_name = $request->area_name;
        $certificate->road_name = $request->road_name;
        $certificate->word_no = $request->word_no;
        $certificate->post_office = $request->post_office;
        $certificate->thana = $request->thana;
        $certificate->upazila = $request->upazila;
        $certificate->status = 1;
        $certificate->certificate_details = $request->certificate_details;
        $certificate->save();

        return redirect()->route('remarriage.certificate_bn.print', ['id' => $certificate->id]);
    }

    public function saveRemarriageCertificateEn(Request $request)
    {
        $lastCertificate = RemarriageCertificateBn::latest()->first();

        $serial = null;
        if ($lastCertificate) {
            $serial = (int) $lastCertificate->serial_no + 1;
        } else {
            $serial = 1;
        }

        $serialNo = str_pad($serial, 6, '0', STR_PAD_LEFT);

        $certificate = new RemarriageCertificateBn();
        $certificate->serial_no = $serialNo;
        $certificate->name = $request->name;
        $certificate->father_husband = $request->father_husband;
        $certificate->mother = $request->mother;
        $certificate->area_name = $request->area_name;
        $certificate->road_name = $request->road_name;
        $certificate->word_no = $request->word_no;
        $certificate->post_office = $request->post_office;
        $certificate->thana = $request->thana;
        $certificate->upazila = $request->upazila;
        $certificate->status = 2;
        $certificate->certificate_details = $request->certificate_details;
        $certificate->save();

        return redirect()->route('remarriage.certificate_en.print', ['id' => $certificate->id]);
    }

    public function updateRemarriageBnCertificate($certificate_id, Request $request)
    {
        $certificate = RemarriageCertificateBn::find($certificate_id);
        $certificate->serial_no = $request->serial_no;
        $certificate->name = $request->name;

        $certificate->father_husband = $request->father_husband;
        $certificate->mother = $request->mother;
        $certificate->area_name = $request->area_name;
        $certificate->road_name = $request->road_name;
        $certificate->word_no = $request->word_no;
        $certificate->post_office = $request->post_office;
        $certificate->thana = $request->thana;
        $certificate->upazila = $request->upazila;
        $certificate->certificate_details = $request->certificate_details;
        $certificate->save();
        return redirect()->route('remarriage.certificate_bn.print', ['id' => $certificate->id]);
    }

    public function updateRemarriageEnCertificate($certificate_id, Request $request)
    {
        $certificate = RemarriageCertificateBn::find($certificate_id);
        $certificate->serial_no = $request->serial_no;
        $certificate->name = $request->name;

        $certificate->father_husband = $request->father_husband;
        $certificate->mother = $request->mother;
        $certificate->area_name = $request->area_name;
        $certificate->road_name = $request->road_name;
        $certificate->word_no = $request->word_no;
        $certificate->post_office = $request->post_office;
        $certificate->thana = $request->thana;
        $certificate->upazila = $request->upazila;
        $certificate->certificate_details = $request->certificate_details;
        $certificate->save();
        return redirect()->route('remarriage.certificate_en.print', ['id' => $certificate->id]);
    }

    public function saveUnmarriageCertificateEn(Request $request)
    {
        $lastCertificate = unmarriageCertificateBn::latest()->first();

        $serial = null;
        if ($lastCertificate) {
            $serial = (int) $lastCertificate->serial_no + 1;
        } else {
            $serial = 1;
        }

        $serialNo = str_pad($serial, 6, '0', STR_PAD_LEFT);

        $certificate = new unmarriageCertificateBn();
        $certificate->serial_no = $serialNo;
        $certificate->name = $request->name;
        $certificate->father_husband = $request->father_husband;
        $certificate->mother = $request->mother;
        $certificate->area_name = $request->area_name;
        $certificate->road_name = $request->road_name;
        $certificate->word_no = $request->word_no;
        $certificate->post_office = $request->post_office;
        $certificate->thana = $request->thana;
        $certificate->upazila = $request->upazila;
        $certificate->status = 2;
        $certificate->certificate_details = $request->certificate_details;
        $certificate->save();

        return redirect()->route('unmarriage.certificate_en.print', ['id' => $certificate->id]);
    }

    public function saveUnmarriageCertificateBn(Request $request)
    {
        $lastCertificate = unmarriageCertificateBn::latest()->first();

        $serial = null;
        if ($lastCertificate) {
            $serial = (int) $lastCertificate->serial_no + 1;
        } else {
            $serial = 1;
        }

        $serialNo = str_pad($serial, 6, '0', STR_PAD_LEFT);

        $certificate = new unmarriageCertificateBn();
        $certificate->serial_no = $serialNo;
        $certificate->name = $request->name;
        $certificate->father_husband = $request->father_husband;
        $certificate->mother = $request->mother;
        $certificate->area_name = $request->area_name;
        $certificate->road_name = $request->road_name;
        $certificate->word_no = $request->word_no;
        $certificate->post_office = $request->post_office;
        $certificate->thana = $request->thana;
        $certificate->upazila = $request->upazila;
        $certificate->status = 1;
        $certificate->certificate_details = $request->certificate_details;
        $certificate->save();

        return redirect()->route('unmarriage.certificate_bn.print', ['id' => $certificate->id]);
    }

    public function editUnmarriageBnCertificate($certificate_id)
    {
        $certificate = unmarriageCertificateBn::find($certificate_id);
        return view('certificate.unmarriage-certificate-bn-edit', ['certificate' => $certificate, 'active' => 20]);
    }

    public function editUnmarriageEnCertificate($certificate_id)
    {
        $certificate = unmarriageCertificateBn::find($certificate_id);
        return view('certificate.unmarriage-certificate-en-edit', ['certificate' => $certificate, 'active' => 20]);
    }

    public function updateUnmarriageEnCertificate($certificate_id, Request $request)
    {
        $certificate = unmarriageCertificateBn::find($certificate_id);
        $certificate->serial_no = $request->serial_no;
        $certificate->name = $request->name;
        $certificate->father_husband = $request->father_husband;
        $certificate->mother = $request->mother;
        $certificate->area_name = $request->area_name;
        $certificate->road_name = $request->road_name;
        $certificate->word_no = $request->word_no;
        $certificate->post_office = $request->post_office;
        $certificate->thana = $request->thana;
        $certificate->upazila = $request->upazila;
        $certificate->certificate_details = $request->certificate_details;
        $certificate->save();
        return redirect()->route('unmarriage.certificate_en.print', ['id' => $certificate->id]);
    }

    public function editRemarriageEnCertificate($certificate_id)
    {
        $certificate = RemarriageCertificateBn::find($certificate_id);
        return view('certificate.remarriage-certificate-en-edit', ['certificate' => $certificate, 'active' => 20]);
    }

    public function editRemarriageBnCertificate($certificate_id)
    {
        $certificate = RemarriageCertificateBn::find($certificate_id);
        return view('certificate.remarriage-certificate-bn-edit', ['certificate' => $certificate, 'active' => 20]);
    }

    public function updateUnmarriageBnCertificate($certificate_id, Request $request)
    {
        $certificate = unmarriageCertificateBn::find($certificate_id);
        $certificate->serial_no = $request->serial_no;
        $certificate->name = $request->name;

        $certificate->father_husband = $request->father_husband;
        $certificate->mother = $request->mother;
        $certificate->area_name = $request->area_name;
        $certificate->road_name = $request->road_name;
        $certificate->word_no = $request->word_no;
        $certificate->post_office = $request->post_office;
        $certificate->thana = $request->thana;
        $certificate->upazila = $request->upazila;
        $certificate->certificate_details = $request->certificate_details;
        $certificate->save();
        return redirect()->route('unmarriage.certificate_bn.print', ['id' => $certificate->id]);
    }

    public function addNationalityCertificateEng()
    {
        $counselors = Counselor::all();
        return view('certificate.add-nationality-certificate-eng', ['active' => 11, 'counselors' => $counselors]);
    }

    public function addFamilyCertificate()
    {
        return view('certificate.add-family-certificate', ['active' => 3]);
    }

    public function addFamilyCertificateEng()
    {
        return view('certificate.add-family-certificate-english', ['active' => 5]);
    }

    public function saveNationalityCertificateEng(Request $request)
    {
        $lastCertificate = NationalityCertificateEng::latest()->first();

        $serial = null;
        if ($lastCertificate) {
            $serial = (int) $lastCertificate->serial_no + 1;
        } else {
            $serial = 1;
        }

        $serialNo = str_pad($serial, 6, '0', STR_PAD_LEFT);

        /*$wordNoEng = (int) $request->word_no;

        if (in_array($wordNoEng, [1, 2, 3, 4, 5, 6, 7, 8, 9])) {
            $counselor = Counselor::find(11);
        } elseif (in_array($wordNoEng, [10, 11])) {
            $counselor = Counselor::find(16);
        } elseif (in_array($wordNoEng, [12, 16])) {
            $counselor = Counselor::find(18);
        } elseif (in_array($wordNoEng, [13, 14, 27])) {
            $counselor = Counselor::find(19);
        } elseif (in_array($wordNoEng, [15, 20])) {
            $counselor = Counselor::find(22);
        } elseif (in_array($wordNoEng, [17])) {
            $counselor = Counselor::find(24);
        } elseif (in_array($wordNoEng, [18, 19])) {
            $counselor = Counselor::find(25);
        } elseif (in_array($wordNoEng, [21, 22])) {
            $counselor = Counselor::find(29);
        } elseif (in_array($wordNoEng, [23, 24, 25, 26])) {
            $counselor = Counselor::find(30);
        }*/

        $certificate = new NationalityCertificateEng();
        $certificate->serial_no = $serialNo;
        $certificate->name = $request->name;
        $certificate->father_husband = $request->father_husband;
        $certificate->mother = $request->mother;
        $certificate->area_name = $request->area_name;
        $certificate->road_name = $request->road_name;
        $certificate->word_no = $request->word_no;
        $certificate->post_office = $request->post_office;
        $certificate->thana = $request->thana;
        $certificate->upazila = $request->upazila;
        $certificate->counselor_id = $request->counselor_id;
        $certificate->certificate_details = $request->certificate_details;
        $certificate->save();

        return redirect()->route('nationality.certificate_eng.print', ['id' => $certificate->id]);
    }

    public function saveNationalityCertificate(Request $request)
    {
        $lastCertificate = NationalityCertificate::latest()->first();
        $bn = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
        $en = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');

        $serial = null;
        if ($lastCertificate) {
            $serial = (int) $lastCertificate->serial_no + 1;
        } else {
            $serial = 1;
        }

        $serialNo = str_pad($serial, 6, '0', STR_PAD_LEFT);

        /*$wordNoEng = (int) str_replace($bn, $en, $request->word_no);

        if (in_array($wordNoEng, [1, 2, 3, 4, 5, 6, 7, 8, 9])) {
            $counselor = Counselor::find(11);
        } elseif (in_array($wordNoEng, [10, 11])) {
            $counselor = Counselor::find(16);
        } elseif (in_array($wordNoEng, [12, 16])) {
            $counselor = Counselor::find(18);
        } elseif (in_array($wordNoEng, [13, 14, 27])) {
            $counselor = Counselor::find(19);
        } elseif (in_array($wordNoEng, [15, 20])) {
            $counselor = Counselor::find(22);
        } elseif (in_array($wordNoEng, [17])) {
            $counselor = Counselor::find(24);
        } elseif (in_array($wordNoEng, [18, 19])) {
            $counselor = Counselor::find(25);
        } elseif (in_array($wordNoEng, [21, 22])) {
            $counselor = Counselor::find(29);
        } elseif (in_array($wordNoEng, [23, 24, 25, 26])) {
            $counselor = Counselor::find(30);
        }*/




        $certificate = new NationalityCertificate();
        $certificate->serial_no = $serialNo;
        $certificate->name = $request->name;
        $certificate->father_husband = $request->father_husband;
        $certificate->mother = $request->mother;
        $certificate->area_name = $request->area_name;
        $certificate->road_name = $request->road_name;
        $certificate->word_no = $request->word_no;
        $certificate->post_office = $request->post_office;
        $certificate->thana = $request->thana;
        $certificate->upazila = $request->upazila;
        $certificate->counselor_id = $request->counselor_id;
        $certificate->certificate_details = $request->certificate_details;
        $certificate->save();

        return redirect()->route('nationality.certificate.print', ['id' => $certificate->id]);
    }

    public function saveCharacterCertificate(Request $request)
    {
        $lastCertificate = CharacterCertificate::latest()->first();

        $serial = null;
        if ($lastCertificate) {
            $serial = (int) $lastCertificate->serial_no + 1;
        } else {
            $serial = 1;
        }

        $serialNo = str_pad($serial, 6, '0', STR_PAD_LEFT);

        $certificate = new CharacterCertificate();
        $certificate->serial_no = $serialNo;
        $certificate->name = $request->name;
        $certificate->father_husband = $request->father_husband;
        $certificate->mother = $request->mother;
        $certificate->address = $request->address;
        $certificate->certificate_details = $request->certificate_details;
        $certificate->save();

        return redirect()->route('character.certificate.print', ['id' => $certificate->id]);
    }

    public function saveCertificate(Request $request)
    {
        $lastCertificate = Certificate::latest()->first();

        $serial = null;
        if ($lastCertificate) {
            $serial = (int) $lastCertificate->serial_no + 1;
        } else {
            $serial = 1;
        }

        $serialNo = str_pad($serial, 6, '0', STR_PAD_LEFT);

        $certificate = new Certificate();
        $certificate->serial_no = $serialNo;
        $certificate->name = $request->name;
        $certificate->father_husband = $request->father_husband;
        $certificate->mother = $request->mother;
        $certificate->present_address = $request->present_address;
        $certificate->parmanent_address = $request->parmanent_address;
        $certificate->certificate_details = $request->certificate_details;
        $certificate->save();

        return redirect()->route('certificate.print', ['id' => $certificate->id]);
    }

    public function nationalityCertificatePrint($certificate_id)
    {
        $certificate = NationalityCertificate::find($certificate_id);
        $counselor = Counselor::find($certificate->counselor_id);

        return view('certificate.nationality-certificate-print', ['certificate' => $certificate, 'counselor' => $counselor, 'active' => 10]);
    }

    public function nationalityCertificateEngPrint($certificate_id)
    {
        $certificate = NationalityCertificateEng::find($certificate_id);
        $counselor = Counselor::find($certificate->counselor_id);
        return view('certificate.nationality-eng-certificate-print', ['certificate' => $certificate, 'counselor' => $counselor, 'active' => 12]);
    }

    public function characterCertificatePrint($certificate_id)
    {
        $certificate = CharacterCertificate::find($certificate_id);
        return view('certificate.character-certificate-print', ['certificate' => $certificate, 'active' => 8]);
    }

    public function certificatePrint($certificate_id = null)
    {
        $certificate = Certificate::find($certificate_id);
        return view('certificate.certificate-print', ['certificate' => $certificate, 'active' => 2]);
    }

    public function editCharacterCertificate($certificate_id = null)
    {
        $certificate = CharacterCertificate::find($certificate_id);
        return view('certificate.character-certificate-edit', ['certificate' => $certificate, 'active' => 8]);
    }

    public function editNationalityCertificate($certificate_id = null)
    {
        $certificate = NationalityCertificate::find($certificate_id);
        $counselors = Counselor::all();
        $counselor = Counselor::find($certificate->counselor_id);

        return view('certificate.nationality-certificate-edit', ['certificate' => $certificate, 'counselors' => $counselors, 'counselor' => $counselor, 'active' => 10]);
    }

    public function editNationalityCertificateEng($certificate_id = null)
    {
        $certificate = NationalityCertificateEng::find($certificate_id);
        $counselors = Counselor::all();
        $counselor = Counselor::find($certificate->counselor_id);

        return view('certificate.nationality-certificate-eng-edit', ['certificate' => $certificate, 'counselors' => $counselors, 'counselor' => $counselor, 'active' => 12]);
    }

    public function editCertificate($certificate_id = null)
    {
        $certificate = Certificate::find($certificate_id);
        return view('certificate.certificate-edit', ['certificate' => $certificate, 'active' => 2]);
    }

    public function updateNationalCertificateEng(Request $request, $certificate_id)
    {
        /*$wordNoEng = (int) $request->word_no;

        if (in_array($wordNoEng, [1, 2, 3, 4, 5, 6, 7, 8, 9])) {
            $counselor = Counselor::find(11);
        } elseif (in_array($wordNoEng, [10, 11])) {
            $counselor = Counselor::find(16);
        } elseif (in_array($wordNoEng, [12, 16])) {
            $counselor = Counselor::find(18);
        } elseif (in_array($wordNoEng, [13, 14, 27])) {
            $counselor = Counselor::find(19);
        } elseif (in_array($wordNoEng, [15, 20])) {
            $counselor = Counselor::find(22);
        } elseif (in_array($wordNoEng, [17])) {
            $counselor = Counselor::find(24);
        } elseif (in_array($wordNoEng, [18, 19])) {
            $counselor = Counselor::find(25);
        } elseif (in_array($wordNoEng, [21, 22])) {
            $counselor = Counselor::find(29);
        } elseif (in_array($wordNoEng, [23, 24, 25, 26])) {
            $counselor = Counselor::find(30);
        }*/

        $certificate = NationalityCertificateEng::find($certificate_id);
        $certificate->serial_no = $request->serial_no;
        $certificate->name = $request->name;
        $certificate->counselor_id = $request->counselor_id;
        $certificate->father_husband = $request->father_husband;
        $certificate->mother = $request->mother;
        $certificate->area_name = $request->area_name;
        $certificate->road_name = $request->road_name;
        $certificate->word_no = $request->word_no;
        $certificate->post_office = $request->post_office;
        $certificate->thana = $request->thana;
        $certificate->upazila = $request->upazila;
        $certificate->certificate_details = $request->certificate_details;
        $certificate->save();
        //  return view('dashboard.nationality-certificate-print',['certificate'=>$certificate,'active'=>10]);
        return redirect()->route('nationality.certificate_eng.print', ['id' => $certificate->id]);
    }

    public function updateNationalCertificate(Request $request, $certificate_id)
    {
        $bn = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
        $en = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '0');
        /*$wordNoEng = (int) str_replace($bn, $en, $request->word_no);

        if (in_array($wordNoEng, [1, 2, 3, 4, 5, 6, 7, 8, 9])) {
            $counselor = Counselor::find(11);
        } elseif (in_array($wordNoEng, [10, 11])) {
            $counselor = Counselor::find(16);
        } elseif (in_array($wordNoEng, [12, 16])) {
            $counselor = Counselor::find(18);
        } elseif (in_array($wordNoEng, [13, 14, 27])) {
            $counselor = Counselor::find(19);
        } elseif (in_array($wordNoEng, [15, 20])) {
            $counselor = Counselor::find(22);
        } elseif (in_array($wordNoEng, [17])) {
            $counselor = Counselor::find(24);
        } elseif (in_array($wordNoEng, [18, 19])) {
            $counselor = Counselor::find(25);
        } elseif (in_array($wordNoEng, [21, 22])) {
            $counselor = Counselor::find(29);
        } elseif (in_array($wordNoEng, [23, 24, 25, 26])) {
            $counselor = Counselor::find(30);
        }*/

        $certificate = NationalityCertificate::find($certificate_id);
        $certificate->serial_no = $request->serial_no;
        $certificate->name = $request->name;
        $certificate->counselor_id = $request->counselor_id;
        $certificate->father_husband = $request->father_husband;
        $certificate->mother = $request->mother;
        $certificate->area_name = $request->area_name;
        $certificate->road_name = $request->road_name;
        $certificate->word_no = $request->word_no;
        $certificate->post_office = $request->post_office;
        $certificate->thana = $request->thana;
        $certificate->upazila = $request->upazila;
        $certificate->certificate_details = $request->certificate_details;
        $certificate->save();
        //  return view('dashboard.nationality-certificate-print',['certificate'=>$certificate,'active'=>10]);
        return redirect()->route('nationality.certificate.print', ['id' => $certificate->id]);
    }

    public function updateCharacterCertificate(Request $request, $certificate_id)
    {
        $certificate = CharacterCertificate::find($certificate_id);
        $certificate->serial_no = $request->serial_no;
        $certificate->name = $request->name;
        $certificate->father_husband = $request->father_husband;
        $certificate->mother = $request->mother;
        $certificate->address = $request->address;
        $certificate->certificate_details = $request->certificate_details;
        $certificate->save();
        return view('certificate.character-certificate-print', ['certificate' => $certificate, 'active' => 8]);
    }

    public function updateCertificate(Request $request, $certificate_id)
    {
        $certificate = Certificate::find($certificate_id);
        $certificate->serial_no = $request->serial_no;
        $certificate->name = $request->name;
        $certificate->father_husband = $request->father_husband;
        $certificate->mother = $request->mother;
        $certificate->present_address = $request->present_address;
        $certificate->parmanent_address = $request->parmanent_address;
        $certificate->certificate_details = $request->certificate_details;
        $certificate->save();
        return view('certificate.certificate-print', ['certificate' => $certificate, 'active' => 2]);
    }

    public function familyCertificateEngEdit($certificate_id = null)
    {
        $data = [];
        $certificate = FamilyCertificateEnglish::find($certificate_id);
        $certificate_details = FamilyCertificateEnglishDetails::where('family_certificate_id', $certificate_id)->get();
        $data['certificate'] = $certificate;
        $data['certificate_details'] = $certificate_details;
        $data['active'] = 6;
        return view('certificate.family-certificate-eng-edit', $data);
    }

    public function familyCertificatePrintEng($certificate_id = null)
    {
        $data = [];
        $certificate = FamilyCertificateEnglish::find($certificate_id);
        $certificate_details = FamilyCertificateEnglishDetails::where('family_certificate_id', $certificate_id)->get();



        $data['certificate'] = $certificate;
        $data['certificate_details'] = $certificate_details;
        $data['active'] = 6;



        return view('certificate.family-certificate-eng-print', $data);
    }

    public function editFamilyCertificate($certificate_id = null)
    {
        $data = [];
        $certificate = DB::select("select * from family_certificates where id=$certificate_id");
        $certificate_details = FamilyCertificateDetails::where('family_certificate_id', $certificate_id)->get();

        $data['certificate'] = $certificate;
        $data['certificate_details'] = $certificate_details;
        $data['active'] = 4;

        return view('certificate.edit-family-certificate', $data);
    }

    public function oyarishCertificatePrint(Request $request)
    {
        $certificate_id = isset($request->id) ? $request->id : $request->certificate_id;

        $data = [];

        $certificate = OyarishCertificate::find($certificate_id);

        $certificate_details = OyarishCertificateFamily::where('oyarish_certificate_id', $certificate_id)->get();

        $wife = 0;
        $son = 0;
        $daughter = 0;
        if ($certificate_details->count() > 0) {
            foreach ($certificate_details as $details) {
                if ($details->status == 1) {
                    $wife++;
                } else if ($details->status == 2) {
                    $son++;
                } else if ($details->status == 3) {
                    $daughter++;
                }
            }
        }



        $data['certificate'] = $certificate;
        $data['certificate_details'] = $certificate_details;
        $data['active'] = 4;
        $data['wife'] = $wife;
        $data['son'] = $son;
        $data['daughter'] = $daughter;
        $data['certificate_id'] = $certificate_id;




        return view('certificate.oyarish-certificate-print', $data);
    }

    public function familyCertificatePrint($certificate_id = null)
    {
        $data = [];
        $certificate = FamilyCertificate::find($certificate_id);
        $certificate_details = FamilyCertificateDetails::where('family_certificate_id', $certificate_id)->get();

        $wife = 0;
        $son = 0;
        $daughter = 0;
        if ($certificate_details->count() > 0) {
            foreach ($certificate_details as $details) {
                if ($details->status == 1) {
                    $wife++;
                } else if ($details->status == 2) {
                    $son++;
                } else if ($details->status == 3) {
                    $daughter++;
                }
            }
        }

        // Age
        $birth_date = Carbon::parse($certificate->birth_date);
        $death_date = Carbon::parse($certificate->death_date);
        $cal_age = $death_date->diff($birth_date);
        $age = $cal_age->y . ' বছর ' . $cal_age->m . ' মাস';

        $data['certificate'] = $certificate;
        $data['certificate_details'] = $certificate_details;
        $data['active'] = 4;
        $data['wife'] = $wife;
        $data['son'] = $son;
        $data['daughter'] = $daughter;
        $data['age'] = $age;


        return view('certificate.family-certificate-print', $data);
    }

    public function updatefamilyCertificateEng(Request $request, $certificate_id = null)
    {
        $familyCertificateEng = FamilyCertificateEnglish::find($certificate_id);
        $family_certificate_id = $certificate_id;

        $name_array = $request->name;
        $father_name_array = $request->father_name;
        $relation_array = $request->relation;
        $birthday_array = $request->birthday;
        $present_address_array = $request->present_address;
        $parmanent_address_array = $request->parmanent_address;


        $familyCertificateEng->serial_no = $request->serial_no;
        $familyCertificateEng->name = $name_array[0];
        $familyCertificateEng->save();

        DB::table('family_certificate_english_details')->where('family_certificate_id', $certificate_id)->delete();



        for ($i = 0; $i < count($name_array); $i++) {
            $familyCertificateDetails = new FamilyCertificateEnglishDetails();
            $familyCertificateDetails->family_certificate_id = $familyCertificateEng->id;
            $familyCertificateDetails->name = $name_array[$i];
            $familyCertificateDetails->father_name = $father_name_array[$i];
            $familyCertificateDetails->relation = $relation_array[$i];
            $familyCertificateDetails->birthday = $birthday_array[$i];
            $familyCertificateDetails->present_address = $present_address_array[$i];
            $familyCertificateDetails->parmanent_address = $parmanent_address_array[$i];
            $familyCertificateDetails->save();
        }

        return redirect()->route('family.certificate.eng.print', ['id' => $familyCertificateEng->id]);
    }

    public function saveFamilyCertificateEng(Request $request)
    {
        $lastFamilyCertificate = FamilyCertificateEnglish::latest()->first();

        if ($lastFamilyCertificate) {
            $serial = (int) $lastFamilyCertificate->serial_no + 1;
        } else {
            $serial = 1;
        }

        $serialNo = str_pad($serial, 6, '0', STR_PAD_LEFT);

        $name_array = $request->name;
        $father_name_array = $request->father_name;
        $relation_array = $request->relation;
        $birthday_array = $request->birthday;
        $present_address_array = $request->present_address;
        $parmanent_address_array = $request->parmanent_address;

        $familyCertificateEng = new FamilyCertificateEnglish();
        $familyCertificateEng->serial_no = $serialNo;
        $familyCertificateEng->name = $name_array[0];
        $familyCertificateEng->save();

        for ($i = 0; $i < count($name_array); $i++) {
            $familyCertificateDetails = new FamilyCertificateEnglishDetails();
            $familyCertificateDetails->family_certificate_id = $familyCertificateEng->id;
            $familyCertificateDetails->name = $name_array[$i];
            $familyCertificateDetails->father_name = $father_name_array[$i];
            $familyCertificateDetails->relation = $relation_array[$i];
            $familyCertificateDetails->birthday = $birthday_array[$i];
            $familyCertificateDetails->present_address = $present_address_array[$i];
            $familyCertificateDetails->parmanent_address = $parmanent_address_array[$i];
            $familyCertificateDetails->save();
        }

        return redirect()->route('family.certificate.eng.print', ['id' => $familyCertificateEng->id]);
    }

    public function updateFamilyCertificate(Request $request, $id)
    {
        $lastFamilyCertificate = FamilyCertificate::latest()->first();
        $familyCertificate = FamilyCertificate::find($id);

        $familyCertificate->serial_no = $request->serial_no;
        $familyCertificate->type = $request->type;
        $familyCertificate->name = $request->name;
        $familyCertificate->father_husband = $request->father_husband;
        $familyCertificate->mother = $request->mother;
        $familyCertificate->address = $request->address;
        $familyCertificate->certificate_details = $request->certificate_details;
        $familyCertificate->save();

        // $familyCertificateDetails = FamilyCertificateDetails::where('family_certificate_id',$id)->get();

        DB::table('family_certificate_details')->where('family_certificate_id', $id)->delete();

        $family_certificate_id = $id;

        $wife_name_array = $request->wife_name_array;
        $wife_nationalid_array = $request->wife_nationalid_array;
        $wife_dateofbirth_array = $request->wife_dateofbirth_array;
        $wife_comment_array = $request->wife_comment_array;

        if ($wife_name_array[0]) {
            for ($i = 0; $i < count($wife_name_array); $i++) {

                $familyCertificateDetails = new FamilyCertificateDetails();
                $familyCertificateDetails->family_certificate_id = $family_certificate_id;
                $familyCertificateDetails->name = $wife_name_array[$i];
                $familyCertificateDetails->national_id = $wife_nationalid_array[$i];
                $familyCertificateDetails->birthday = $wife_dateofbirth_array[$i];
                $familyCertificateDetails->comment = $wife_comment_array[$i];
                $familyCertificateDetails->status = 1;
                $familyCertificateDetails->save();
            }
        }



        $son_name_array = $request->son_name_array;
        $son_nationalid_array = $request->son_nationalid_array;
        $son_dateofbirth_array = $request->son_dateofbirth_array;
        $son_comment_array = $request->son_comment_array;


        if ($son_name_array[0]) {
            for ($i = 0; $i < count($son_name_array); $i++) {
                $familyCertificateDetails = new FamilyCertificateDetails();
                $familyCertificateDetails->family_certificate_id = $family_certificate_id;
                $familyCertificateDetails->name = $son_name_array[$i];
                $familyCertificateDetails->national_id = $son_nationalid_array[$i];
                $familyCertificateDetails->birthday = $son_dateofbirth_array[$i];
                $familyCertificateDetails->comment = $son_comment_array[$i];
                $familyCertificateDetails->status = 2;
                $familyCertificateDetails->save();
            }
        }


        $daughter_name_array = $request->daughter_name_array;
        $daughter_nationalid_array = $request->daughter_nationalid_array;

        $daughter_dateofbirth_array = $request->daughter_dateofbirth_array;
        $daughter_comment_array = $request->daughter_comment_array;
        if ($daughter_name_array[0]) {
            for ($i = 0; $i < count($daughter_name_array); $i++) {

                $familyCertificateDetails = new FamilyCertificateDetails();
                $familyCertificateDetails->family_certificate_id = $family_certificate_id;
                $familyCertificateDetails->name = $daughter_name_array[$i];
                $familyCertificateDetails->national_id = $daughter_nationalid_array[$i];
                $familyCertificateDetails->birthday = $daughter_dateofbirth_array[$i];
                $familyCertificateDetails->comment = $daughter_comment_array[$i];
                $familyCertificateDetails->status = 3;
                $familyCertificateDetails->save();
            }
        }



        return redirect()->route('family.certificate.print', ['id' => $family_certificate_id]);
    }

    public function saveFamilyCertificate(Request $request)
    {
        $lastFamilyCertificate = FamilyCertificate::latest()->first();

        if ($lastFamilyCertificate) {
            $serial = (int) $lastFamilyCertificate->serial_no + 1;
        } else {
            $serial = 1;
        }
        // dd($request);
        $serialNo = str_pad($serial, 6, '0', STR_PAD_LEFT);

        $familyCertificate = new FamilyCertificate();
        $familyCertificate->serial_no = $serialNo;
        $familyCertificate->type = $request->type;
        $familyCertificate->name = $request->name;
        $familyCertificate->father_husband = $request->father_husband;
        $familyCertificate->mother = $request->mother;
        $familyCertificate->address = $request->address;
        $familyCertificate->current_address = $request->current_address;
        $familyCertificate->certificate_id = $request->certificate_id;
        $familyCertificate->birth_date = Carbon::parse($request->birth_date)->format('Y-m-d');
        $familyCertificate->death_date = Carbon::parse($request->death_date)->format('Y-m-d');
        $familyCertificate->certificate_details = $request->certificate_details;
        $familyCertificate->save();

        $family_certificate_id = $familyCertificate->id;

        $wife_name_array = $request->wife_name_array;
        $wife_nationalid_array = $request->wife_nationalid_array;
        $wife_dateofbirth_array = $request->wife_dateofbirth_array;
        $wife_comment_array = $request->wife_comment_array;

        if ($wife_name_array[0]) {
            for ($i = 0; $i < count($wife_name_array); $i++) {
                $familyCertificateDetails = new FamilyCertificateDetails();
                $familyCertificateDetails->family_certificate_id = $family_certificate_id;
                $familyCertificateDetails->name = $wife_name_array[$i];
                $familyCertificateDetails->national_id = $wife_nationalid_array[$i];
                $familyCertificateDetails->birthday = $wife_dateofbirth_array[$i];
                $familyCertificateDetails->comment = $wife_comment_array[$i];
                $familyCertificateDetails->status = 1;
                $familyCertificateDetails->save();
            }
        }



        $son_name_array = $request->son_name_array;
        $son_nationalid_array = $request->son_nationalid_array;
        $son_dateofbirth_array = $request->son_dateofbirth_array;
        $son_comment_array = $request->son_comment_array;


        if ($son_name_array[0]) {
            for ($i = 0; $i < count($son_name_array); $i++) {
                $familyCertificateDetails = new FamilyCertificateDetails();
                $familyCertificateDetails->family_certificate_id = $family_certificate_id;
                $familyCertificateDetails->name = $son_name_array[$i];
                $familyCertificateDetails->national_id = $son_nationalid_array[$i];
                $familyCertificateDetails->birthday = $son_dateofbirth_array[$i];
                $familyCertificateDetails->comment = $son_comment_array[$i];
                $familyCertificateDetails->status = 2;
                $familyCertificateDetails->save();
            }
        }


        $daughter_name_array = $request->daughter_name_array;
        $daughter_nationalid_array = $request->daughter_nationalid_array;

        $daughter_dateofbirth_array = $request->daughter_dateofbirth_array;
        $daughter_comment_array = $request->daughter_comment_array;
        if ($daughter_name_array[0]) {
            for ($i = 0; $i < count($daughter_name_array); $i++) {

                $familyCertificateDetails = new FamilyCertificateDetails();
                $familyCertificateDetails->family_certificate_id = $family_certificate_id;
                $familyCertificateDetails->name = $daughter_name_array[$i];
                $familyCertificateDetails->national_id = $daughter_nationalid_array[$i];
                $familyCertificateDetails->birthday = $daughter_dateofbirth_array[$i];
                $familyCertificateDetails->comment = $daughter_comment_array[$i];
                $familyCertificateDetails->status = 3;
                $familyCertificateDetails->save();
            }
        }



        return redirect()->route('family.certificate.print', ['id' => $family_certificate_id]);
    }

    public function showAllCharacterCertificate()
    {
        $all_certificate = CharacterCertificate::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('certificate.show-all-character-certificate', ['all_certificate' => $all_certificate, 'active' => 8]);
    }

    public function showAllNationalityCertificate()
    {
        $all_certificate = NationalityCertificate::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('certificate.show-all-nationality-certificate', ['all_certificate' => $all_certificate, 'active' => 10]);
    }

    public function showAllNationalityCertificateEng()
    {
        $all_certificate = NationalityCertificateEng::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('certificate.show-all-nationality-certificate-eng', ['all_certificate' => $all_certificate, 'active' => 12]);
    }

    public function showAllCertificate()
    {
        $all_certificate = Certificate::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('certificate.show-all-certificate', ['all_certificate' => $all_certificate, 'active' => 2]);
    }

    public function showAllFamilyCertificate()
    {
        $all_certificate = FamilyCertificate::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('certificate.show-family-all-certificate', ['all_certificate' => $all_certificate, 'active' => 4]);
    }

    public function showAllFamilyCertificateEng()
    {
        $all_certificate = FamilyCertificateEnglish::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('certificate.show-family-all-certificate-eng', ['all_certificate' => $all_certificate, 'active' => 6]);
    }

    //landless Certificate
    public function landlessCertificate()
    {
        $all_certificate = LandlessCertificate::where('status', 1)->orderBy('created_at', 'DESC')->get();
        return view('certificate.all_landless_certificate', ['all_certificate' => $all_certificate, 'active' => 2]);
    }

    public function addLandlessCertificate()
    {
        return view('certificate.add_landless_certificate', ['active' => 1]);
    }

    public function addLandlessCertificatePost(Request $request)
    {
        $lastCertificate = LandlessCertificate::latest()->first();

        $serial = null;
        if ($lastCertificate) {
            $serial = (int) $lastCertificate->serial_no + 1;
        } else {
            $serial = 1;
        }

        $serialNo = str_pad($serial, 6, '0', STR_PAD_LEFT);

        $certificate = new LandlessCertificate();
        $certificate->serial_no = $serialNo;
        $certificate->name = $request->name;
        $certificate->father_husband = $request->father_husband;
        $certificate->mother = $request->mother;
        $certificate->present_address = $request->present_address;
        $certificate->parmanent_address = $request->parmanent_address;
        $certificate->certificate_details = $request->certificate_details;
        $certificate->save();

        return redirect()->route('landless_certificate.print', ['certificate' => $certificate->id]);
    }

    public function landlessCertificatePrint(LandlessCertificate $certificate)
    {
        return view('certificate.landless_certificate_print', ['certificate' => $certificate, 'active' => 2]);
    }

    public function editLandlessCertificate(LandlessCertificate $certificate)
    {
        return view('certificate.landless_certificate_edit', ['certificate' => $certificate, 'active' => 2]);
    }

    public function editLandlessCertificatePost(LandlessCertificate $certificate, Request $request)
    {
        $certificate->name = $request->name;
        $certificate->father_husband = $request->father_husband;
        $certificate->mother = $request->mother;
        $certificate->present_address = $request->present_address;
        $certificate->parmanent_address = $request->parmanent_address;
        $certificate->certificate_details = $request->certificate_details;
        $certificate->save();
        return redirect()->route('landless_certificate.print', ['certificate' => $certificate->id]);
    }
}
