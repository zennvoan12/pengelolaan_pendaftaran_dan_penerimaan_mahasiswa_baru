@extends('layouts.master')
@section('content')
@can('admin')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                @if($soal == true)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview-wrap">
                                <h2 class="title-1">Soal Ujian Telah di Upload</h2>
                            </div>
                        </div>
                    </div>
                    <hr />
                @else
                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview-wrap">
                                <h2 class="title-1">Soal Ujian Belum di Upload</h2>
                            </div>
                        </div>
                    </div>
                    <hr />
                @endif
                <div class="overview-wrap">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button" data-toggle="modal" data-target="#importNilaiModal"
                            class="btn btn-secondary"><i class="fa fa-file-excel"></i> Import Nilai Ujian Dari File
                            Excel</button>
                        <button type="button" data-toggle="modal" data-target="#importSoalModal"
                            class="btn btn-primary"><i class="fa fa-file-excel"></i> Import Soal Dari File
                            Excel</button>
                    </div>
                </div>
                <hr />
                <div class="table-responsive">
                    <table class="table table-hover bg-white">
                        <thead>
                            <th>Tipe Soal</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Soal Ujian</td>
                                <td>
                                    <a href="/dashboard/soal/tinjau" class="btn btn-primary">Tinjau</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div> --}}
            </div>
        </div>
    </div>
    @include('dashboard.modalImportNilai')
    @include('dashboard.modalImportSoal')
@endcan
@endsection