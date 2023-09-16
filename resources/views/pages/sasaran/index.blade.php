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
                        @if (count($sasaran) > 0)
                            <p>anda telah menignput sasaran</p>
                        @else
                            <form action="{{ URL::to('/sasaran') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="kabupaten">kabupaten</label>
                                    <select name="kabupaten" id="kabupaten" required class="form-control">
                                        <option value="{{ auth()->user()->kabupaten->id }}">
                                            {{ auth()->user()->kabupaten->nama }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="bumil">bumil</label>
                                    <input type="text" class="form-control" id="bumil" name="bumil">
                                </div>
                                <div class="form-group">
                                    <label for="bulin">bulin</label>
                                    <input type="text" class="form-control" id="bulin" name="bulin">
                                </div>
                                <div class="form-group">
                                    <label for="lahir_hidup">lahir_hidup</label>
                                    <input type="text" class="form-control" id="lahir_hidup" name="lahir_hidup">
                                </div>
                                <div class="form-group">
                                    <label for="bayi">bayi</label>
                                    <input type="text" class="form-control" id="bayi" name="bayi">
                                </div>
                                <div class="form-group">
                                    <label for="balita">balita</label>
                                    <input type="text" class="form-control" id="balita" name="balita">
                                </div>
                                <div class="form-group">
                                    <label for="bumil_resti">bumil_resti</label>
                                    <input readonly type="text" class="form-control" id="bumil_resti" name="bumil_resti">
                                </div>
                                <div class="form-group">
                                    <label for="bayi_resti">bayi_resti</label>
                                    <input readonly type="text" class="form-control" id="bayi_resti" name="bayi_resti">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        @endif
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
