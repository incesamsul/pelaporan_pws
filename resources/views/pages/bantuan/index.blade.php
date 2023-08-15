@extends('layouts.v_template')

@section('content')
    <section class="section">

        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header">
                        <h4>Pws</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ URL::to('/pws') }}" method="POST">
                            <div class="form-control">
                                <label for="kabupaten">kabupaten</label>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



    </section>
@endsection
@section('script')
    <script>
        $('#liBantuan').addClass('active');
    </script>
@endsection
