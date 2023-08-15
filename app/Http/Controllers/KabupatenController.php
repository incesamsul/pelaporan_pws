<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    public function index()
    {
        $data['kabupaten'] = Kabupaten::all();
        return view('pages.kabupaten.index', $data);
    }

    public function sync()
    {
        $kabupaten = getKabupaten(73);

        Kabupaten::query()->delete();
        foreach ($kabupaten as $row) {
            Kabupaten::create([
                'nama' => $row['name']
            ]);
        }

        return redirect()->back()->with('message', 'sync sukses');
    }
}
