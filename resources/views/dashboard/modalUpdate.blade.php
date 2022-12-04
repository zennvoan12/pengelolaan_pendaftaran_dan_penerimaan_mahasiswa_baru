{{-- modal form edit registrasi --}}
<div class="modal fade" id="formEditRegistrasiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Edit Data Registrasi</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body">
                    <form id="form" method="post" action="/dashboard/edit-form-registrasi">
                    @csrf
                    @method('put')
                        <div class="alert alert-primary">
                            <strong>Data Diri</strong>
                        </div>
                        <div class="row">
                            <div class="col-sm-7">
                                <div class="form-group">
                                    <label>Nama Lengkap:</label>
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" id="user_id">
                                    <input type="text" name="nama" class="form-control" value="{{$pendaftar->nama}}">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label class="small">Nomor Identitas (NIK / Passport / Driving License):</label>
                                    <input type="text" name="nik" value="{{$pendaftar->nik}}" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Tempat Lahir:</label>
                                    <input type="text" name="tempat_lahir" value="{{$pendaftar->tempat_lahir}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label>Tanggal Lahir:</label>
                                    <input type="date" name="tanggal_lahir" class="form-control" value="{{$pendaftar->tanggal_lahir}}">
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label>Jenis Kelamin:</label>
                                    <select class="form-control" name="jk">
                                        @if ($pendaftar->jenis_kelamin == 1)
                                        <option selected value="1">Laki - Laki</option>        
                                        <option value="2">Perempuan</option>
                                        @else
                                        <option selected value="2">Perempuan</option>
                                        <option value="1">Laki-laki</option>
                                        @endif
                                    </select>
                                </div>
                                    </div>
                                </div>
                                <div class="row">    
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Kewarganegaraan:</label>
                                            <select class="form-control" name="kewarganegaraan">
                                                @if ($pendaftar->kewarganegaraan != 'WNI')
                                                <option selected value="WNA">Warga Negara Asing</option>
                                                <option value="WNI">Warga Negara Indonesia</option>
                                                @else
                                                <option selected value="WNI">Warga Negara Indonesia</option>    
                                                <option value="WNA">Warga Negara Asing</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Agama:</label>
                                            <select class="form-control" name="agama">
                                                <option selected value="{{$pendaftar->agama}}">{{$pendaftar->agama}}</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Nama Ibu Kandung:</label>
                                            <input type="text" name="nama_ibu" class="form-control" value="{{$pendaftar->nama_ibu}}">
                                        </div>
                                    </div>
                                </div>
                    
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" name="email_daftar" class="form-control" value="{{$pendaftar->email_daftar}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>No Telp / No Whatsapp</label>
                                            <input type="text" name="no_telp" class="form-control" value="{{$pendaftar->no_telp}}">
                                            <p class="small">Diawali kode negara. <br/> Contoh +62896xxx </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-primary">
                                    <strong>Data Alamat Asal</strong>
                                </div>
                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group">
                                            <label>Alamat:</label>
                                            <textarea class="form-control" name="alamat" rows="2" id="alamat">{{$pendaftar->alamat}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group">
                                            <label>Kode Pos:</label>
                                            <input type="text" name="kode_pos" class="form-control" value="{{$pendaftar->kode_pos}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-primary">
                                    <strong>Data Pendidikan</strong>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Pendidikan Terakhir:</label>
                                            <select class="form-control" name="pendidikan">
                                                <option value="{{$pendaftar->pendidikan}}" selected>{{$pendaftar->pendidikan}}</option>
                                                <option value="SMA">SMA</option>
                                                <option value="SMK">SMK</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama Sekolah:</label>
                                            <input type="text" name="sekolah" class="form-control" value="{{$pendaftar->asal_sekolah}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="alert alert-primary">
                                    <strong>Data Nilai Rapor</strong>
                                </div>
                                <div class="row">
                                    <div class="col-sm 12">
                                        <div class="form group">
                                            <div class="table-responsive-sm">
                                                <table class="table table-sm table-hover">
                                                    <tr>
                                                        <td rowspan="2"></td>
                                                        <td colspan="2">Kelas X</td>
                                                        <td colspan="2">Kelas XI</td>
                                                        <td colspan="2">Kelas XII</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Smt 1</td>
                                                        <td>Smt 2</td>
                                                        <td>Smt 1</td>
                                                        <td>Smt 2</td>
                                                        <td>Smt 1</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Bahasa Indonesia</td>
                                                        @php
                                                            $indonesia = $pendaftar->nilai_indonesia;
                                                            $nilaiIndonesia = explode("," , $indonesia)
                                                        @endphp
                                                        @foreach ($nilaiIndonesia as $itemIndonesia)
                                                        <td><input type="number" name="indonesia[]" class="form-control" style="width: 60px;height: 50px" value="{{$itemIndonesia}}"></td> 
                                                        @endforeach
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Bahasa Inggris</td>
                                                        @php
                                                            $inggris = $pendaftar->nilai_inggris;
                                                            $nilaiInggris = explode("," , $inggris)
                                                        @endphp
                                                        @foreach ($nilaiInggris as $itemInggris)
                                                        <td><input type="number" name="inggris[]" class="form-control" style="width: 60px;height: 50px" value="{{$itemInggris}}"></td> 
                                                        @endforeach
                                                    </tr>
                                                    <tr>
                                                        <td class="align-middle">Matematika</td>
                                                        @php
                                                            $mtk = $pendaftar->nilai_mtk;
                                                            $nilaiMtk = explode("," , $mtk)
                                                        @endphp
                                                        @foreach ($nilaiMtk as $itemMtk)
                                                        <td><input type="number" name="mtk[]" class="form-control" style="width: 60px;height: 50px" value="{{$itemMtk}}"></td> 
                                                        @endforeach
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br/>
                                <div class="alert alert-primary">
                                    <strong>Pilihan Program Studi</strong>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label>Pilih Program Studi</label>
                                            <select class="form-control" name="prodi">
                                                <option value="{{$pendaftar->prodi}}" selected>{{$pendaftar->pilihan_prodi}}</option>
                                                <option value="D3 - Teknik Komputer">D3 - Teknik Komputer</option>
                                                <option value="D3 - Komputerisasi Akuntansi">D3 - Komputerisasi Akuntansi</option>
                                                <option value="D3 - Manajemen Informatika">D3 - Manajemen Informatika</option>
                                                <option value="S1 - Sistem Informasi">S1 - Sistem Informasi</option>
                                                <option value="S1 - Teknik Informatika">S1 - Teknik Informatika</option>
                                                <option value="S1 - Teknik Informatika">S1 - Teknik Sipil</option>
                                                <option value="S1 - Teknik Informatika">S1 - Teknik Industri</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <div class="modal-footer">
                                <button type="submit" name="Submit" id="Submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                            </form>
                        </div>
                </div>
            </div>
</div>