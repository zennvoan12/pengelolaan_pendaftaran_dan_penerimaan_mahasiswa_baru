@extends('layouts.master')
@section('content')
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
            @include('layouts.formLayout')
            <hr/>         
        </div>
                <div class="overview-wrap">
                    <a href="/dashboard" class="btn btn-primary align-right">Kembali</a>
                </div>
        <hr/>
    </div>
</div>
@endsection