@extends('layouts.master')
@section('content')
@can('admin')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="overview-wrap">
                            <h2 class="title-1">Pilih Fakultas</h2>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="table-responsive-sm">
                    <table class="table table-hover bg-white">
                        <thead>
                            <th>Kode Fakultas</th>
                            <th>Nama Fakultas</th>
                            <th>Jumlah Pendaftar</th>
                            <th>Aksi</th>
                        </thead>
                        <tbody>
                            @forelse($fakultas as $item)
                                <tr>
                                    <td>{{ $item->kode_fakultas }}</td>
                                    <td>{{ $item->nama_fakultas }}</td>
                                    <td>
                                        @php
                                        $value = $item->kode_fakultas;
                                        $i = 0;
                                        foreach ($pendaftar as $data){
                                        if ($data->fakultas_kode == $value){
                                            $i += 1;
                                        }else{
                                            $i += 0;
                                        }
                                        }
                                        @endphp
                                        {{$i}}
                                    </td>
                                    <td>
                                        <a href="/dashboard/fakultas/{{ $item->kode_fakultas }}" class="btn btn-info success">Lihat</a>
                                    </td>
                                </tr>
                            @empty
                                <h1>Belum Menambahkan Data Fakultas</h1>
                            @endforelse
                            <tr>
                                <td><strong>Jumlah</strong></td>
                                <td>:</td>
                                <td><strong>{{count($pendaftar)}}</strong></td>
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
@endcan
@endsection