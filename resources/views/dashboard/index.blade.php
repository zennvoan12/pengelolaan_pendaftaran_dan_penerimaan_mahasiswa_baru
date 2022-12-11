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
            <hr/>
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
                        <th>Aksi</th>  
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$pendaftar->no_reg}}</td>
                            <td>{{$pendaftar->nama}}</td>
                            @if ($pendaftar->can_update == true)
                            <td>
                                <button type="button" id="btn-edit-registrasi" class="btn btn-warning sm" data-toggle="modal"
                                data-target="#formEditRegistrasiModal" onclick="enable()" data-id="{{$pendaftar->no_reg}}">Edit</button>      
                            </td>   
                            @else
                            <td>
                                <button type="button" id="btn-read-registrasi" class="btn btn-info success" data-toggle="modal"
                                data-target="#formReadRegistrasiModal" data-id="{{$pendaftar->no_reg}}">Lihat</button>      
                            </td>    
                            @endif
                        </tr>    
                    </tbody>    
                </table>   
            </div> 
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
            <hr/>
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <form action="/dashboard/nonaktif" method="post">
                            @method('patch')
                            @csrf
                            @foreach ($calonMhs as $value)
                            {{-- <input type="hidden" value="{{$value->no_reg}}" name="reg[]">    
                            <input type="hidden" value="{{$value->status}}" name="status[]"> --}}
                            @endforeach
                            @if ($value->can_update == true)
                            <button type="submit" name="Submit" id="Submit" class="btn btn-warning">Nonaktifkan Fungsi Edit Form Registrasi</button>        
                            @else
                            <button type="submit" name="Submit" id="Submit" class="btn btn-danger">Aktifkan Fungsi Edit Form Registrasi</button>    
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{route('export.excel')}}" class="btn btn-info" target="_blank"><i class="fa fa-file-excel"></i> Export</a>
                            <a href="" class="btn btn-warning">Import</a>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <hr/>
            <div class="table-responsive">
                <table class="table table-hover bg-white" id="myTable">
                    <thead>
                        <th>No Registrasi</th>
                        <th>Nama</th>  
                        <th>Total Nilai</th>
                        <th>Aksi</th>  
                    </thead>
                    <tbody>
                        @forelse ($calonMhs as $item)
                        <tr>
                            <td>{{$item->no_reg}}</td>
                            <td>{{$item->nama}}</td>
                            <td>
                                @php
                                    $indonesia = $item->nilai_indonesia;
                                    $nilaiIndonesia = explode("," , $indonesia);
                                    $total_indonesia = array_sum($nilaiIndonesia);

                                    $inggris = $item->nilai_inggris;
                                    $nilaiinggris = explode("," , $inggris);
                                    $total_inggris = array_sum($nilaiinggris);

                                    $mtk = $item->nilai_mtk;
                                    $nilaimtk = explode("," , $mtk);
                                    $total_mtk = array_sum($nilaimtk);

                                    $total_nilai = $total_mtk + $total_indonesia + $total_inggris;

                                @endphp
                                {{$total_nilai}}
                            </td>
                            <td>
                                <a href="/dashboard/lihat/{{$item->no_reg}}" class="btn btn-success">Lihat</a>
                                @if ($item->can_update == true)
                                <button class="btn btn-primary">Edit</button>
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