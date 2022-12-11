@extends('layouts.master')
@section('content')
@can('admin')
<div class="main-content bg-white">
    <div class="section__content section__content--p30">
        <div class="container-fluid bg-light">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Biodata calon mahasiswa baru</h2>
                    </div>
                </div>
            </div>
            <br/>
            <hr/>
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <a href="/dashboard" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
            <hr/>     
            @include('layouts.formLayout')         
        </div>
    </div>
</div>
@endcan
@endsection