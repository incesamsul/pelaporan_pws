@extends('layouts.v_template')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card ">
                    <div class="card-header">
                        <h4>Filter pencarian</h4>

                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">

                                <div class="col-sm-3">
                                    <?php
                                    $tahun = [2018, 2019, 2020, 2021, 2022, 2023, 2024];
                                    ?>
                                    <form-group>
                                        <label for="tahun">tahun</label>
                                        <select name="tahun" id="tahun" class="form-control">
                                            <option value="">--pilih tahun--</option>
                                            @foreach ($tahun as $t)
                                                <option {{ $tahun_filter == $t ? 'selected' : '' }}
                                                    value="{{ $t }}">
                                                    {{ $t }}</option>
                                            @endforeach
                                        </select>
                                    </form-group>
                                </div>
                                <div class="col-sm-3">
                                    <form-group>
                                        <label for="bulan">bulan</label>
                                        <select name="bulan" id="bulan" class="form-control">
                                            <option value="">-- pilih bulan --</option>
                                            @foreach (getBulan() as $key => $bulan)
                                                <option {{ $bulan_filter == $key + 1 ? 'selected' : '' }}
                                                    value="{{ $key + 1 }}">{{ $bulan }}</option>
                                            @endforeach
                                        </select>
                                    </form-group>
                                </div>
                            </div>
                            <div class="row mt-3">
                                {{-- <div class="col-sm-">
                                    <form-group>
                                        <label for="periode">periode</label>
                                        <input type="text" class="form-control" name="periode" id="periode">
                                    </form-group>
                                </div> --}}
                                <div class="col-sm-3">
                                    <form-group>
                                        <label for="kabupaten">kabupaten</label>
                                        <select name="kabupaten" id="kabupaten" class="form-control">
                                            <option value="">-- pilih kabupaten --</option>
                                            @foreach ($kabupaten as $row)
                                                <option {{ $kabupaten_filter == $row->id ? 'selected' : '' }}
                                                    value="{{ $row->id }}">{{ $row->nama }}</option>
                                            @endforeach
                                        </select>
                                    </form-group>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-filter"></i> filter</button>
                                        <a href="{{ URL::to('/report_pws') }}" type="submit" class="btn btn-secondary">
                                            <i class="fas fa-sync"></i> Reset</a>
                                    </div>
                                </div>
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
                        <h4>Data Pws </h4>
                        <button id="export-button" class="btn btn-success mb-3">Export to Excel</button>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped table-bordered text-nowrap" id="data-table">
                            <thead>

                                <tr align="center">
                                    <th rowspan="2  ">no</th>
                                    <th rowspan="2  ">kabupaten</th>
                                    <th colspan="7">sasaran</th>
                                    @foreach (getIndikator() as $indikator)
                                        <th colspan="4">{{ $indikator }}</th>
                                    @endforeach

                                </tr>
                                <tr>
                                    <th>bumil</th>
                                    <th>bulin</th>
                                    <th>lahir hidup</th>
                                    <th>bayi</th>
                                    <th>balita</th>
                                    <th>bumil resti</th>
                                    <th>bayi resti</th>

                                    {{-- INDIKATOR --}}
                                    @foreach (getIndikator() as $indikator)
                                        <th>bulan lalu</th>
                                        <th>bulan ini</th>
                                        <th>abs</th>
                                        @if ($indikator != 'mtbs_berobat')
                                            <th>%</th>
                                        @endif
                                    @endforeach

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sasaran as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->kabupaten->nama }}</td>
                                        <td>{{ $row->bumil }}</td>
                                        <td>{{ $row->bulin }}</td>
                                        <td>{{ $row->lahir_hidup }}</td>
                                        <td>{{ $row->bayi }}</td>
                                        <td>{{ $row->balita }}</td>
                                        <td>{{ $row->bumil_resti }}</td>
                                        <td>{{ $row->bayi_resti }}</td>

                                        @foreach (getIndikator() as $indikator)
                                            <td>{{ getSasaranPerIndikator(spaceToUL($indikator), $row->id, $bulan_lalu_filtered) }}
                                            </td>
                                            <td>{{ getSasaranPerIndikator(spaceToUL($indikator), $row->id, $bulan_filtered) }}
                                            </td>
                                            <td>{{ getSasaranPerIndikator(spaceToUL($indikator), $row->id, $bulan_filtered) + getSasaranPerIndikator(spaceToUL($indikator), $row->id, $bulan_lalu_filtered) }}
                                            </td>
                                            @if ($indikator != 'mtbs_berobat')
                                                <td>{{ round((getSasaranPerIndikator(spaceToUL($indikator), $row->id, $bulan_filtered) / $row->bumil) * 100, 2) }}

                                                </td>
                                            @endif
                                        @endforeach

                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>#</td>
                                    <td>Provinsi</td>
                                    <td>{{ round(getSumSasaran('bumil')) }}</td>
                                    <td>{{ round(getSumSasaran('bulin')) }}</td>
                                    <td>{{ round(getSumSasaran('lahir_hidup')) }}</td>
                                    <td>{{ round(getSumSasaran('bayi')) }}</td>
                                    <td>{{ round(getSumSasaran('balita')) }}</td>
                                    <td>{{ round(getSumSasaran('bumil_resti')) }}</td>
                                    <td>{{ round(getSumSasaran('bayi_resti')) }}</td>
                                    @foreach (getIndikator() as $indikator)
                                        <td>{{ getSumSasaranPerIndikator(spaceToUL($indikator), $row->id, $bulan_lalu_filtered) }}
                                        </td>
                                        <td>{{ getSumSasaranPerIndikator(spaceToUL($indikator), $row->id, $bulan_filtered) }}
                                        </td>
                                        <td>{{ getSumSasaranPerIndikator(spaceToUL($indikator), $row->id, $bulan_filtered) + getSumSasaranPerIndikator(spaceToUL($indikator), $row->id, $bulan_lalu_filtered) }}
                                        </td>
                                        @if ($indikator != 'mtbs_berobat')
                                            @php
                                                $bumil;
                                                if ($row->bumil == 0) {
                                                    $bumil = 1;
                                                } else {
                                                    $bumil = $row->bumil;
                                                }
                                            @endphp
                                            <td>{{ round((getSumSasaranPerIndikator(spaceToUL($indikator), $row->id, $bulan_filtered) / $bumil) * 100, 2) }}
                                            </td>
                                        @endif
                                    @endforeach
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>



    </section>
@endsection
@section('script')
    <script>
        $('#lireportpws').addClass('active');
    </script>
    <script>
        document.getElementById('export-button').addEventListener('click', function() {
            // Select the table element
            var table = document.getElementById('data-table');

            // Create a new workbook and worksheet
            var workbook = XLSX.utils.book_new();
            var worksheet = XLSX.utils.table_to_sheet(table);

            // Add the worksheet to the workbook
            XLSX.utils.book_append_sheet(workbook, worksheet, 'Sheet1');

            // Generate and download the Excel file
            XLSX.writeFile(workbook, 'exported_table.xlsx');
        });
    </script>
@endsection
