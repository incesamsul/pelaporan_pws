@extends('layouts.v_template')

@section('content')
    <section class="section">

        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header">
                        <h4>sasaran</h4>
                    </div>
                    <div class="card-body">
                        @if ($edit)
                            <form action="{{ URL::to('/sasaran/update/' . $edit->id) }}" method="POST">
                            @else
                                <form action="{{ URL::to('/sasaran') }}" method="POST">
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
                            <label class="col-sm-3" for="bumil">bumil</label>
                            <input type="number" class="form-control col-sm-3" id="bumil" name="bumil"
                                value="{{ $edit ? $edit->bumil : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="tahun">tahun</label>
                            <input type="number" class="form-control col-sm-3" id="tahun" name="tahun"
                                value="{{ $edit ? $edit->tahun : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="bulin">bulin</label>
                            <input type="number" class="form-control col-sm-3" id="bulin" name="bulin"
                                value="{{ $edit ? $edit->bulin : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="lahir_hidup">lahir_hidup</label>
                            <input type="number" class="form-control col-sm-3" id="lahir_hidup" name="lahir_hidup"
                                value="{{ $edit ? $edit->lahir_hidup : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="bayi">bayi</label>
                            <input type="number" class="form-control col-sm-3" id="bayi" name="bayi"
                                value="{{ $edit ? $edit->bayi : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="balita">balita</label>
                            <input type="number" class="form-control col-sm-3" id="balita" name="balita"
                                value="{{ $edit ? $edit->balita : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="bumil_resti">bumil_resti</label>
                            <input readonly type="number" class="form-control col-sm-3" id="bumil_resti" name="bumil_resti"
                                value="{{ $edit ? $edit->bumil_resti : '' }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3" for="bayi_resti">bayi_resti</label>
                            <input readonly type="number" class="form-control col-sm-3" id="bayi_resti" name="bayi_resti"
                                value="{{ $edit ? $edit->bayi_resti : '' }}">
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
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header">
                        <h4>Data sasaran {{ auth()->user()->kabupaten->nama }}</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr align="center">
                                    <th colspan="9">sasaran</th>
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
                                    <th>aksi</th>
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
                                        <td>
                                            <a class="btn btn-warning" href="{{ URL::to('/sasaran/edit/' . $row->id) }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <a class="btn btn-danger ml-2"
                                                href="{{ URL::to('/sasaran/hapus/' . $row->id) }}">
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
        $('#bumil').on('input', function() {
            let bumilVal = $(this).val();
            let bumilResti = (20 / 100) * bumilVal;
            $('#bumil_resti').val(bumilResti);
        })

        $('#bayi').on('input', function() {

            let bayiVal = $(this).val();
            let bayiResti = (15 / 100) * bayiVal;
            $('#bayi_resti').val(bayiResti);
        })

        $('#lisasaran').addClass('active');
    </script>
@endsection
