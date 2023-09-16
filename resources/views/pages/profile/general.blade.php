<div class="row">
    <div class="col-md-3">

        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img style="height: 80px; width:80px;" class="profile-user-img img-fluid img-circle"
                        src="{{ auth()->user()->foto == '' ? asset('AdminLTE-3.2.0/dist/img/default-150x150.png') : asset('data/foto_profile/' . auth()->user()->foto . '/' . auth()->user()->foto) }}"
                        alt="" class="rounded-circle mb-2" width="100">

                </div>

                <h3 class="profile-username text-center">{{ auth()->user()->name }}</h3>

                <p class="text-muted text-center">{{ auth()->user()->role }}</p>



                <a href="" class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal">
                    <i class="fas fa-camera"></i> Ganti Foto Profile
                </a>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->


    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#Detail" data-toggle="tab">Detail</a></li>

                    <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="Detail">
                        <!-- Post -->




                        <div class="container">
                            <ul class="list-unstyled list-unstyled-border">
                                <li class="media">
                                    <div class="media-body">
                                        @if ($user)
                                            <table class="table table-striped">
                                                <tr>
                                                    <td class="bg-soft-primary">Nama</td>
                                                    <td>{{ $user->name }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-soft-primary">Jensi Kelamin</td>
                                                    <td>{{ $user->jenis_kelamin }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-soft-primary">Tempat Dan Tanggal Lahir</td>
                                                    <td>{{ $user->tempat_lahir . '  ' . $user->tanggal_lahir }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-soft-primary">Alamat</td>
                                                    <td>{{ $user->alamat }}</td>
                                                </tr>
                                                <tr>
                                                    <td class="bg-soft-primary">Telepon</td>
                                                    <td>{{ $user->no_telp }}</td>
                                                </tr>
                                            </table>
                                            <div class="alert alert-info">silahkan hubungi admin jika terdapat kesalahan
                                                data</div>
                                        @else
                                            <div class="alert alert-warning">Belum ada data user, untuk lebih lanjut
                                                hubungi admin</div>
                                        @endif
                                    </div>
                                </li>
                                <li class="media">
                                    <div class="media-body">
                                        <a href="" class="btn btn-primary btn-block" data-toggle="modal"
                                            data-target="#modal">
                                            <i class="fas fa-camera"></i> Ganti Foto Profile
                                        </a>
                                        {{-- <a href="" class="btn btn-dark btn-lg btn-block btn-icon-split">
                                        <i class="fas fa-pen"></i> Edit Biodata
                                    </a>  --}}
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <!-- /.post -->
                    </div>
                    <!-- /.tab-pane -->

                    <!-- /.tab-pane -->

                    <div class="tab-pane" id="settings">
                        <form class="form-horizontal">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName2" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> I agree to the <a href="#">terms and
                                                conditions</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>
