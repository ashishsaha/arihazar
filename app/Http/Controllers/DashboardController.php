<?php

namespace App\Http\Controllers;

use App\Enumeration\Role;
use App\Models\Certificate\Certificate;
use App\Models\Certificate\CharacterCertificate;
use App\Models\Certificate\FamilyCertificate;
use App\Models\Certificate\FamilyCertificateEnglish;
use App\Models\Certificate\IncomeCertificate;
use App\Models\Certificate\LandlessCertificate;
use App\Models\Certificate\NationalityCertificate;
use App\Models\Certificate\NationalityCertificateEng;
use App\Models\Certificate\OyarishCertificate;
use App\Models\Certificate\RemarriageCertificateBn;
use App\Models\Certificate\unmarriageCertificateBn;
use App\Models\Collection\Collection;
use App\Models\SisterConcern;
use App\Models\Sweeper\Area;
use App\Models\Sweeper\Cleaner;
use App\Models\Sweeper\Team;
use App\Models\Sweeper\Type;
use App\Models\Upangsho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {

        if (auth()->user()->is_super_admin == Role::$IS_SUPER_ADMIN) {
            if ($request->role_permission != '') {
                $user = auth()->user();
                $sisterConcern = SisterConcern::where('role',$request->role_permission)->first();
                $user->sister_concern_id = $sisterConcern->id;
                $user->role = $request->role_permission;
                $user->save();
            } else {
                $sisterConcerns = SisterConcern::orderBy('sort')->where('status',1)->get();
                return view('admin_dashboard',compact('sisterConcerns'));
            }
        }
        $data = [];
        if (auth()->user()->role == Role::$SWEEPER_BILL) {

            $totalArea = Area::count();
            $totalTeam = Team::count();
            $totalType = Type::count();
            $totalCleaner = Cleaner::count();

            $data = [
                'totalArea' => enNumberToBn(number_format($totalArea)),
                'totalTeam' => enNumberToBn(number_format($totalTeam)),
                'totalType' => enNumberToBn(number_format($totalType)),
                'totalCleaner' => enNumberToBn(number_format($totalCleaner))
            ];

        }elseif (auth()->user()->role == Role::$COLLECTION){
            $query = Collection::query();
            if (Auth::user()->role != Role::$ADMIN){
                $query->where('collect_by',Auth::id());
            }
            $collections = $query->where('date',date('Y-m-d'))->get();
            $data['collections'] = $collections;
        }elseif (auth()->user()->role == Role::$ACCOUNTS){
            $upangshos = upangsho::where('upangsho_id', '!=', 0)->get();
            $data['upangshos'] = $upangshos;
        }elseif (auth()->user()->role == Role::$CERTIFICATE){
            $certificate_total= Certificate::all()->count();
            $landless_certificate_total= LandlessCertificate::all()->count();
            $chr_certificate_total= CharacterCertificate::all()->count();
            $fmly_certificate_bn_total= FamilyCertificate::all()->count();
            $fmly_certificate_en_total= FamilyCertificateEnglish::all()->count();
            $nationality_certificate_total= NationalityCertificate::all()->count();
            $nationality_certificate_eng_total= NationalityCertificateEng::all()->count();

            $unmarriage_certificateBn_total= unmarriageCertificateBn::where('status',1)->count();
            $unmarriage_certificateEn_total= unmarriageCertificateBn::where('status',2)->count();
            $remarriageCertificateBn_total= RemarriageCertificateBn::where('status',1)->count();
            $remarriageCertificateEn_total= RemarriageCertificateBn::where('status',2)->count();
            $incomeCertificateEn_total= IncomeCertificate::count();
            $oyarishCertificate_total= OyarishCertificate::count();

            $data = [
                'active'=>0,
                'certificate_total'=>$certificate_total,
                'landless_certificate_total'=>$landless_certificate_total,
                'chr_certificate_total'=>$chr_certificate_total,
                'fmly_certificate_bn_total'=>$fmly_certificate_bn_total,
                'fmly_certificate_en_total'=>$fmly_certificate_en_total,
                'nationality_certificate_total'=>$nationality_certificate_total,
                'nationality_certificate_eng_total'=>$nationality_certificate_eng_total,
                'unmarriage_certificateBn_total'=>$unmarriage_certificateBn_total,
                'unmarriage_certificateEn_total'=>$unmarriage_certificateEn_total,
                'remarriageCertificateBn_total'=>$remarriageCertificateBn_total,
                'remarriageCertificateEn_total'=>$remarriageCertificateEn_total,
                'incomeCertificateEn_total'=>$incomeCertificateEn_total,
                'oyarishCertificate_total'=>$oyarishCertificate_total,
            ];
        }

        return view('dashboard', $data);

    }
}
