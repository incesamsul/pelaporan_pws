<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use App\Models\Kabupaten;
use App\Models\Sasaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SasaranController extends Controller
{
    public function kabupaten()
    {
        $data['sasaran'] = Sasaran::where('id_kabupaten', auth()->user()->kabupaten->id)->get();
        return view('pages.sasaran.index', $data);
    }

    public function indikator()
    {
        $data['indikator'] = Indikator::all();
        $data['sasaran'] = Sasaran::where('id_kabupaten', auth()->user()->kabupaten->id)->get();
        return view('pages.sasaran.indikator', $data);
    }

    public function storeIndikator(Request $request)
    {
        Indikator::create([
            'id_sasaran' => $request->sasaran,
            'bulan' => $request->bulan,
            'k1' => $request->k1,
            'k4' => $request->k4,
            'k6' => $request->k6,
            'persalinan_oleh_nakes' => $request->persalinan_oleh_nakes,
            'pn_di_fasyankes' => $request->pn_di_fasyankes,
            'pn_di_non_fasyankes' => $request->pn_di_non_fasyankes,
            'kunjungan_nifas_lengkap' => $request->kunjungan_nifas_lengkap,
            'kn1' => $request->kn1,
            'kn_lengkap' => $request->kn_lengkap,
            'risti_masyarakat' => $request->risti_masyarakat,
            'komplikasi_obsterti_ditangani' => $request->komplikasi_obsterti_ditangani,
            'neonatus_ditangani' => $request->neonatus_ditangani,
            'kby_lengkap' => $request->kby_lengkap,
            'balita_lengkap' => $request->balita_lengkap,
            'mtbs' => $request->mtbs,
        ]);

        return redirect()->back()->with('message', 'data psw tersimpan');
    }


    public function report()
    {
        if (auth()->user()->role == 'pimpinan') {
            $data['sasaran'] = Sasaran::all();
            $bulan = isset($_GET['bulan']) ? $_GET['bulan'] : 0;
            $data['bulan_filtered'] = $bulan;
            $data['kabupaten'] = Kabupaten::all();
            return view('pages.sasaran.report_all', $data);
        } else {
            $data['sasaran'] = Sasaran::where('id_kabupaten', auth()->user()->kabupaten->id)->get();
            return view('pages.sasaran.report', $data);
        }
    }

    public function store(Request $request)
    {
        Sasaran::create([
            'id_kabupaten' => $request->kabupaten,
            'bumil' => $request->bumil,
            'bulin' => $request->bulin,
            'lahir_hidup' => $request->lahir_hidup,
            'bayi' => $request->bayi,
            'balita' => $request->balita,
            'bumil_resti' => $request->bumil_resti,
            'bayi_res' => $request->bayi_res,
        ]);

        return redirect()->back()->with('message', 'data psw tersimpan');
    }
}
