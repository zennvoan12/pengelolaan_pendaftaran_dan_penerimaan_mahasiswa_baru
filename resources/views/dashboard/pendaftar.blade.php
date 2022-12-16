@extends('layouts.master')
@section('content')
@can('admin')   
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">Pilih Program Studi</h2>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a href="{{route('export.excel')}}" class="btn btn-info" target="_blank"><i class="fa fa-file-excel"></i> Export</a>
                        </div>
                    </div>
                </div>
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