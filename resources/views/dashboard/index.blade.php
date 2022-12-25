@extends('layouts.master')
@section('content')
    @can('pendaftar')
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview-wrap">
                                <h2 class="title-1">Selamat datang calon mahasiswa baru</h2>
                            </div>
                        </div>
                    </div>
                    <hr />
                    @if ($pendaftar == false)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal"
                                        data-target="#formRegistrasiModal">
                                        <i class="zmdi zmdi-plus"></i>Isi Form Registrasi</button>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="table-responsive-sm">
                            <table class="table table-hover bg-white">
                                <thead>
                                    <th>No Registrasi</th>
                                    <th>Nama</th>
                                    <th>Nilai Ujian</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $pendaftar->no_reg }}</td>
                                        <td>{{ $pendaftar->nama }}</td>
                                        <td>{{ $pendaftar->nilai_ujian }}</td>
                                        @if ($pendaftar->can_update == true)
                                            <td>
                                                <button type="button" id="btn-edit-registrasi" class="btn btn-warning sm"
                                                    data-toggle="modal" data-target="#formEditRegistrasiModal"
                                                    onclick="enable()" data-id="{{ $pendaftar->no_reg }}">Edit</button>
                                            </td>
                                        @else
                                            <td>
                                                <button type="button" id="btn-read-registrasi" class="btn btn-info success"
                                                    data-toggle="modal" data-target="#formReadRegistrasiModal"
                                                    data-id="{{ $pendaftar->no_reg }}">Lihat</button>
                                            </td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    @endif
                    <hr />
                    @if ($pendaftar == true && $pendaftar->nilai_ujian === null)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <a href="/dashboard/soal/{{ Crypt::encryptString($pendaftar->no_reg) }}"
                                        class="au-btn au-btn-icon au-btn--blue">
                                        <i class="zmdi zmdi-plus"></i>Jawab Soal Ujian</a>
                                </div>
                            </div>
                        </div>
                    
                    @elseif($pendaftar == true && $pendaftar->nilai_ujian > null)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Anda Telah Mengerjakan Soal Ujian</h2>
                                </div>
                            </div>
                        </div>
                        <hr />
                    @endif
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
        {{-- Memanggil modal create --}}
        @include('dashboard.modalCreate')
        @if ($pendaftar == true)
            @include('dashboard.modalUpdate')
        @endif
        @if ($pendaftar == true && $pendaftar->can_update == false)
            @include('dashboard.modalRead')
        @endif
        {{-- <div class="row">
    <div class="col-md-12">
        <div class="copyright">
            <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
        </div>
                </div>
            </div> --}}
    @endcan

    @can('admin')
        <div class="main-content">
            <div class="section__content section__content--p30">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="overview-wrap">
                                <h2 class="title-1">Daftar Calon Mahasiswa Baru</h2>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="table-responsive">
                        <table class="table table-hover bg-white" id="myTable">
                            <thead>
                                <th>No Registrasi</th>
                                <th>Nama</th>
                                <th>Total Nilai</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @forelse($calonMhs as $item)
                                    <tr>
                                        <td>{{ $item->no_reg }}</td>
                                        <input type="hidden" value="{{ $item->no_reg }}" name="id[]">
                                        <td>{{ $item->nama }}</td>
                                        <td>
                                            @php
                                                $ujian = $item->nilai_ujian;
                                                $indonesia = $item->nilai_indonesia;
                                                $nilaiIndonesia = explode(',', $indonesia);
                                                $total_indonesia = array_sum($nilaiIndonesia);
                                                $inggris = $item->nilai_inggris;
                                                $nilaiinggris = explode(',', $inggris);
                                                $total_inggris = array_sum($nilaiinggris);
                                                $mtk = $item->nilai_mtk;
                                                $nilaimtk = explode(',', $mtk);
                                                $total_mtk = array_sum($nilaimtk);
                                                $ujian = $item->nilai_ujian;
                                                $total_nilai = $total_mtk + $total_indonesia + $total_inggris + $ujian;
                                            @endphp
                                            <input type="hidden" name="nilai[]" value="{{ $total_nilai }}" id="">
                                            {{ $total_nilai }}
                                        </td>
                                        <td>
                                            <a href="/dashboard/lihat/{{ $item->no_reg }}" class="btn btn-success">Lihat</a>
                                            @if ($item->lulus == 1)
                                                <button class="btn btn-success">Lulus</button>
                                            @endif
                                            @if ($item->lulus == 0)
                                                <button class="btn btn-danger">Tidak</button>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <h1>Belum ada Pendaftar</h1>
                                @endforelse
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
    @endcan
@endsection
