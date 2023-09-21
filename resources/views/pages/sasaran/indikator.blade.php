@extends('layouts.v_template')

@section('content')
    <section class="section">


        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header">
                        <h4>Data sasaran {{ auth()->user()->kabupaten->nama }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr align="center">
                                    <th colspan="8">sasaran</th>
                                </tr>
                                <tr>
                                    <th>tahun</th>
                                    <th>bumil</th>
                                    <th>bulin</th>
                                    <th>lahir hidup</th>
                                    <th>bayi</th>
                                    <th>balita</th>
                                    <th>bumil resti</th>
                                    <th>bayi resti</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sasaran as $row)
                                    <tr>
                                        <td>{{ $row->tahun }}</td>
                                        <td>{{ $row->bumil }}</td>
                                        <td>{{ $row->bulin }}</td>
                                        <td>{{ $row->lahir_hidup }}</td>
                                        <td>{{ $row->bayi }}</td>
                                        <td>{{ $row->balita }}</td>
                                        <td>{{ $row->bumil_resti }}</td>
                                        <td>{{ $row->bayi_resti }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        @if ($edit)
                            <form action="{{ URL::to('/indikator/update/' . $edit->id) }}" method="POST">
                            @else
                                <form action="{{ URL::to('/indikator') }}" method="POST">
                        @endif
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3" for="kabupaten">kabupaten</label>
                            <select name="kabupaten" id="kabupaten" required class="form-control col-sm-3">
                                <option value="{{ auth()->user()->kabupaten->id }}">
                                    {{ auth()->user()->kabupaten->nama }}</option>
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="sasaran">sasaran</label>
                            <select name="sasaran" id="sasaran" class="form-control col-sm-3">
                                <option value="">--pilih sasaran--</option>
                                @foreach ($sasaran as $row)
                                    <option {{ $edit->id_sasaran == $row->id ? 'selected' : '' }}
                                        value="{{ $row->id }}">{{ $row->tahun }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="bulan">bulan</label>
                            <select name="bulan" id="bulan" class="form-control col-sm-3">
                                <option value="">--pilih bulan--</option>
                                @foreach (getBulan() as $key => $row)
                                    <option {{ $edit->bulan == $key + 1 ? 'selected' : '' }} value="{{ $key + 1 }}">
                                        {{ $row }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="k1">k1</label>
                            <input type="number" class="form-control col-sm-3" id="k1" name="k1"
                                value="{{ $edit ? $edit->k1 : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="k4">k4</label>
                            <input type="number" class="form-control col-sm-3" id="k4" name="k4"
                                value="{{ $edit ? $edit->k4 : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="k6">k6</label>
                            <input type="number" class="form-control col-sm-3" id="k6" name="k6"
                                value="{{ $edit ? $edit->k6 : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="persalinan_oleh_nakes">persalinan_oleh_nakes</label>
                            <input type="number" class="form-control col-sm-3" id="persalinan_oleh_nakes"
                                name="persalinan_oleh_nakes" value="{{ $edit ? $edit->persalinan_oleh_nakes : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="pn_di_fasyankes">pn_di_fasyankes</label>
                            <input type="number" class="form-control col-sm-3" id="pn_di_fasyankes" name="pn_di_fasyankes"
                                value="{{ $edit ? $edit->pn_di_fasyankes : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="pn_di_non_fasyankes">pn_di_non_fasyankes</label>
                            <input type="number" class="form-control col-sm-3" id="pn_di_non_fasyankes"
                                name="pn_di_non_fasyankes" value="{{ $edit ? $edit->pn_di_non_fasyankes : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="kunjungan_nifas_lengkap">kunjungan_nifas_lengkap</label>
                            <input type="number" class="form-control col-sm-3" id="kunjungan_nifas_lengkap"
                                name="kunjungan_nifas_lengkap" value="{{ $edit ? $edit->kunjungan_nifas_lengkap : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="kn1">kn1</label>
                            <input type="number" class="form-control col-sm-3" id="kn1" name="kn1"
                                value="{{ $edit ? $edit->kn1 : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="kn_lengkap">kn_lengkap</label>
                            <input type="number" class="form-control col-sm-3" id="kn_lengkap" name="kn_lengkap"
                                value="{{ $edit ? $edit->kn_lengkap : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="risti_masyarakat">risti_masyarakat</label>
                            <input type="number" class="form-control col-sm-3" id="risti_masyarakat"
                                name="risti_masyarakat" value="{{ $edit ? $edit->risti_masyarakat : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3"
                                for="komplikasi_obsterti_ditangani">komplikasi_obsterti_ditangani</label>
                            <input type="number" class="form-control col-sm-3" id="komplikasi_obsterti_ditangani"
                                name="komplikasi_obsterti_ditangani"
                                value="{{ $edit ? $edit->komplikasi_obsterti_ditangani : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="neonatus_ditangani">neonatus_ditangani</label>
                            <input type="number" class="form-control col-sm-3" id="neonatus_ditangani"
                                name="neonatus_ditangani" value="{{ $edit ? $edit->neonatus_ditangani : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="kby_lengkap">kby_lengkap</label>
                            <input type="number" class="form-control col-sm-3" id="kby_lengkap" name="kby_lengkap"
                                value="{{ $edit ? $edit->kby_lengkap : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="balita_lengkap">balita_lengkap</label>
                            <input type="number" class="form-control col-sm-3" id="balita_lengkap"
                                name="balita_lengkap" value="{{ $edit ? $edit->balita_lengkap : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="mtbs_berobat">Mtbs jumlah balita yang berobat ke pkm </label>
                            <input type="number" class="form-control col-sm-3" id="mtbs_berobat" name="mtbs_berobat"
                                value="{{ $edit ? $edit->mtbs_berobat : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="mtbs_pelayanan">Mtbs balita sakit yang mendapatkan pelayanan
                                mtbs</label>
                            <input type="number" class="form-control col-sm-3" id="mtbs_pelayanan"
                                name="mtbs_pelayanan" value="{{ $edit ? $edit->mtbs_pelayanan : '' }}">
                        </div>
                        <div class="form-group row">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-striped text-nowrap">
                            <thead>
                                <tr>
                                    <th>bulan</th>
                                    <th>k1</th>
                                    <th>k4</th>
                                    <th>k6</th>
                                    <th>persalinan oleh nakes</th>
                                    <th>pn di fasyankes</th>
                                    <th>pn di non fasyankes</th>
                                    <th>kunjungan nifas lengkap</th>
                                    <th>kn1</th>
                                    <th>kn lengkap</th>
                                    <th>risti masyarakat</th>
                                    <th>komplikasi obsterti di tangani</th>
                                    <th>neonatus di tangani</th>
                                    <th>kby lengkap</th>
                                    <th>balita lengkap</th>
                                    <th>mtbs berobat</th>
                                    <th>mtbs pelayanan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($indikator as $row)
                                    <tr>
                                        <td>{{ getMonthName($row->bulan) }}</td>
                                        <td>{{ $row->k1 }}</td>
                                        <td>{{ $row->k4 }}</td>
                                        <td>{{ $row->k6 }}</td>
                                        <td>{{ $row->persalinan_oleh_nakes }}</td>
                                        <td>{{ $row->pn_di_fasyankes }}</td>
                                        <td>{{ $row->pn_di_non_fasyankes }}</td>
                                        <td>{{ $row->kunjungan_nifas_lengkap }}</td>
                                        <td>{{ $row->kn1 }}</td>
                                        <td>{{ $row->kn_lengkap }}</td>
                                        <td>{{ $row->risti_masyarakat }}</td>
                                        <td>{{ $row->komplikasi_obsterti_ditangani }}</td>
                                        <td>{{ $row->neonatus_ditangani }}</td>
                                        <td>{{ $row->kby_lengkap }}</td>
                                        <td>{{ $row->balita_lengkap }}</td>
                                        <td>{{ $row->mtbs_berobat }}</td>
                                        <td>{{ $row->mtbs_pelayanan }}</td>
                                        <td>
                                            <a class="btn btn-warning"
                                                href="{{ URL::to('/indikator/edit/' . $row->id) }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a class="btn btn-danger ml-2"
                                                href="{{ URL::to('/indikator/hapus/' . $row->id) }}">
                                                <i class="fas fa-trash"></i> Hapus
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
@section('script')
    <script>
        $('#liindikator').addClass('active');
    </script>
@endsection
