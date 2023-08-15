@extends('layouts.v_template')

@section('content')
    <section class="section">

        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header">
                        <h4>Pws</h4>
                        <a href="{{ URL::to('/admin/sync_kabupaten') }}">
                            <i class="fas fa-sync"></i>
                            Sync data kabupaten
                        </a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>nama</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kabupaten as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->nama }}</td>
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
        $('#likabupaten').addClass('active');
    </script>
@endsection
