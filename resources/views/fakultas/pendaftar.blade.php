@extends('layouts.master')
@section('content')
@can('admin')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">{{ $fakultas }} / {{$jurusan}} </h2>
                        </div>
                    </div>
                </div>
                <hr />
                <a href="{{ url()->previous() }}" class="btn btn-primary mb-2">Kembali</a>
                <hr/>
                {{-- javascript:history.back() --}}
                <div class="table-responsive-sm">
                    <table class="table table-hover bg-white" id="myTable">
                        <thead>
                            <th>No</th>
                            <th>No Registrasi</th>
                            <th>Nama Pendaftar</th>
                            <th>Total Score</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @forelse($pendaftar as $value => $item)
                                <tr>
                                    <td>{{$value+1}}</td>
                                    <td>{{ $item->no_reg }}</td>
                                    <td>{{ $item->nama }}</td>
                                    @php
                                        $ujian = $item->nilai_ujian;
                                        $indonesia = $item->nilai_indonesia;
                                        $nilaiIndonesia = explode("," , $indonesia);
                                        $total_indonesia = array_sum($nilaiIndonesia);
                                        $inggris = $item->nilai_inggris;
                                        $nilaiinggris = explode("," , $inggris);
                                        $total_inggris = array_sum($nilaiinggris);
                                        $mtk = $item->nilai_mtk;
                                        $nilaimtk = explode("," , $mtk);
                                        $total_mtk = array_sum($nilaimtk);
                                        $total_nilai = $total_mtk + $total_indonesia + $total_inggris + $ujian;
                                    @endphp
                                    <td>{{$total_nilai}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info success">Aksi</button>
                                    </td>
                                </tr>
                            @empty
                                <h1>Belum Ada Pendaftar Di Jurusan Ini</h1>
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