@extends('layouts.master')
@section('content')
@can('admin')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">{{$fakultas->nama_fakultas}} / Pilih Jurusan</h2>
                        </div>
                    </div>
                </div>
                <hr/>
                <a href="/dashboard/fakultas" class="btn btn-primary mb-2">Kembali</a>
                <hr/>
                <div class="table-responsive-sm">
                    <table class="table table-hover bg-white" id="myTable">
                        <thead>
                            <th>Kode Jurusan</th>
                            <th>Nama Jurusan</th>
                            <th>Jumlah Pendaftar</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @forelse($jurusan as $item)
                                <tr>
                                    <td>{{ $item->kode_jurusan }}</td>
                                    <td>{{ $item->nama_jurusan }}</td>
                                    <td>
                                        @php
                                        $value = $item->kode_jurusan;
                                        $i = 0;
                                        foreach ($pendaftar as $data){
                                        if ($data->jurusan_kode == $value){
                                            $i += 1;
                                        }else{
                                            $i += 0;
                                        }
                                        }
                                        @endphp
                                        {{$i}}
                                    </td>
                                    <td>
                                        <a href="/dashboard/fakultas/{{$item->fakultas_kode}}/{{$item->kode_jurusan}}" class="btn btn-info success">Lihat</a>
                                    </td>
                                </tr>
                            @empty
                            <h1>Belum Menambahkan Data Jurusan</h1>
                            <br/>
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