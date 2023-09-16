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
                                    <th colspan="7">sasaran</th>
                                </tr>
                                <tr>
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
                        <form action="{{ URL::to('/indikator') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="kabupaten">kabupaten</label>
                                <select name="kabupaten" id="kabupaten" required class="form-control">
                                    <option value="{{ auth()->user()->kabupaten->id }}">
                                        {{ auth()->user()->kabupaten->nama }}</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="sasaran">sasaran</label>
                                <select name="sasaran" id="sasaran" class="form-control">
                                    <option value="">--pilih sasaran--</option>
                                    @foreach ($sasaran as $row)
                                        <option value="{{ $row->id }}">{{ $row->id }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="bulan">bulan</label>
                                <select name="bulan" id="bulan" class="form-control">
                                    <option value="">--pilih bulan--</option>
                                    @foreach (getBulan() as $key => $row)
                                        <option value="{{ $key + 1 }}">{{ $row }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="k1">k1</label>
                                <input type="text" class="form-control" id="k1" name="k1">
                            </div>
                            <div class="form-group">
                                <label for="k4">k4</label>
                                <input type="text" class="form-control" id="k4" name="k4">
                            </div>
                            <div class="form-group">
                                <label for="k6">k6</label>
                                <input type="text" class="form-control" id="k6" name="k6">
                            </div>
                            <div class="form-group">
                                <label for="persalinan_oleh_nakes">persalinan_oleh_nakes</label>
                                <input type="text" class="form-control" id="persalinan_oleh_nakes"
                                    name="persalinan_oleh_nakes">
                            </div>
                            <div class="form-group">
                                <label for="pn_di_fasyankes">pn_di_fasyankes</label>
                                <input type="text" class="form-control" id="pn_di_fasyankes" name="pn_di_fasyankes">
                            </div>
                            <div class="form-group">
                                <label for="pn_di_non_fasyankes">pn_di_non_fasyankes</label>
                                <input type="text" class="form-control" id="pn_di_non_fasyankes"
                                    name="pn_di_non_fasyankes">
                            </div>
                            <div class="form-group">
                                <label for="kunjungan_nifas_lengkap">kunjungan_nifas_lengkap</label>
                                <input type="text" class="form-control" id="kunjungan_nifas_lengkap"
                                    name="kunjungan_nifas_lengkap">
                            </div>
                            <div class="form-group">
                                <label for="kn1">kn1</label>
                                <input type="text" class="form-control" id="kn1" name="kn1">
                            </div>
                            <div class="form-group">
                                <label for="kn_lengkap">kn_lengkap</label>
                                <input type="text" class="form-control" id="kn_lengkap" name="kn_lengkap">
                            </div>
                            <div class="form-group">
                                <label for="risti_masyarakat">risti_masyarakat</label>
                                <input type="text" class="form-control" id="risti_masyarakat" name="risti_masyarakat">
                            </div>
                            <div class="form-group">
                                <label for="komplikasi_obsterti_ditangani">komplikasi_obsterti_ditangani</label>
                                <input type="text" class="form-control" id="komplikasi_obsterti_ditangani"
                                    name="komplikasi_obsterti_ditangani">
                            </div>
                            <div class="form-group">
                                <label for="neonatus_ditangani">neonatus_ditangani</label>
                                <input type="text" class="form-control" id="neonatus_ditangani"
                                    name="neonatus_ditangani">
                            </div>
                            <div class="form-group">
                                <label for="kby_lengkap">kby_lengkap</label>
                                <input type="text" class="form-control" id="kby_lengkap" name="kby_lengkap">
                            </div>
                            <div class="form-group">
                                <label for="balita_lengkap">balita_lengkap</label>
                                <input type="text" class="form-control" id="balita_lengkap" name="balita_lengkap">
                            </div>
                            <div class="form-group">
                                <label for="mtbs_berobat">Mtbs jumlah balita yang berobat ke pkm </label>
                                <input type="text" class="form-control" id="mtbs_berobat" name="mtbs_berobat">
                            </div>
                            <div class="form-group">
                                <label for="mtbs_pelayanan">Mtbs balita sakit yang mendapatkan pelayanan mtbs</label>
                                <input type="text" class="form-control" id="mtbs_pelayanan" name="mtbs_pelayanan">
                            </div>
                            <div class="form-group">
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
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
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
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($indikator as $row)
                                    <tr>
                                        <td>{{ $row->bulan }}</td>
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
