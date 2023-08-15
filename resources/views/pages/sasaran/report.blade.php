@extends('layouts.v_template')

@section('content')
    <section class="section">


        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header">
                        <h4>Data Pws {{ auth()->user()->kabupaten->nama }}</h4>
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
                                @foreach ($pws as $row)
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
        $('#lipws').addClass('active');
    </script>
@endsection
