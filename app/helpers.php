<?php

use App\Models\FavoritModel;
use App\Models\Indikator;
use App\Models\KategoriModel;
use App\Models\LogAktivitasModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use phpDocumentor\Reflection\Types\Null_;
use PhpParser\Node\Expr\FuncCall;

use function PHPUnit\Framework\isNull;


function getIndikator()
{
    return  [
        'k1',
        'k4',
        'k6',
        'persalinan oleh nakes',
        'pn di fasyankes',
        'pn di non fasyankes',
        'kunjungan nifas lengkap',
        'kn1',
        'kn lengkap',
        'risti masyarakat',
        'komplikasi obsterti ditangani',
        'neonatus ditangani',
        'kby lengkap',
        'balita lengkap',
        'mtbs_berobat',
        'mtbs_pelayanan',
    ];
}

function getBulan()
{

    return ['januari', 'februari', 'maret', 'april', 'mei', 'juni', 'juli', 'agustus', 'september', 'oktober', 'november', 'desember'];
}

function getSasaranPerIndikator($indikator, $sasaran, $bulan)
{

    $query = Indikator::select($indikator)->where('id_sasaran', $sasaran)->where('bulan', $bulan)->first();
    return $query ? $query->$indikator : 0;
}

function getKabupaten($idProvinsi)
{
    // Make a request to the external API
    $api_key = 'vIZCft23nkQ7jaHp7Wh1ffHcKNAOT5';
    $response = Http::get("https://api.goapi.id/v1/regional/kota", [
        'provinsi_id' => $idProvinsi,
        'api_key' => $api_key,
    ]);

    $kabupaten = null;
    if ($response->successful()) {
        $kabupaten = $response->json()['data'];
    }
    return $kabupaten;
}

function removeSpace($string)
{
    return str_replace(" ", "", $string);
}

function spaceToUL($string)
{
    return str_replace(" ", "_", $string);
}

function getUserRoleName($userRoleId)
{
    return DB::table('users')
        ->Join('role', 'role.id_role', '=', 'users.id_role')
        ->where('users.id_role', $userRoleId)
        ->select('nama_role')
        ->first()->nama_role;
}


function sweetAlert($pesan, $tipe)
{
    echo '<script>document.addEventListener("DOMContentLoaded", function() {
        Swal.fire(
            "' . $pesan . '",
            "proses berhasil di lakukan",
            "' . $tipe . '",
        );
    })</script>';
}
