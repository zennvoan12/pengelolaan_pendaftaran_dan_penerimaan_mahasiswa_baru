{{-- modal form registrasi --}}
<div class="modal fade" id="formRegistrasiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="exampleModalLabel">Form Registrasi</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- id form == #form --}}
                <form id="table-form" method="post" action="/dashboard/input-form-registrasi"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="alert alert-primary">
                        <strong>Data Diri</strong>
                    </div>
                    <div class="row">
                        <div class="col-sm-7">
                            <div class="form-group">
                                <label>Nama Lengkap:</label>
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" id="user_id">
                                <input type="text" name="nama" class="form-control"
                                    placeholder="Masukan Nama Lengkap">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label class="small">Nomor Identitas (NIK / Passport / Driving License):</label>
                                <input type="text" name="nik" placeholder="Masukan Nomor Identitas"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Tempat Lahir:</label>
                                <input type="text" name="tempat_lahir" placeholder="Masukan Tempat Lahir"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Tanggal Lahir:</label>
                                <input type="date" name="tanggal_lahir" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                                <label>Jenis Kelamin:</label>
                                <select class="form-control" name="jk">
                                    <option>Pilih Jenis Kelamin</option>
                                    <option value="2">Perempuan</option>

                                    <option value="1">Laki-laki</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Kewarganegaraan:</label>
                                <select class="form-control" name="kewarganegaraan">
                                    <option value="WNI">Warga Negara Indonesia</option>
                                    <option value="WNA">Warga Negara Asing</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <label>Agama:</label>
                                <select class="form-control" name="agama">
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
                                <input type="text" name="nama_ibu" class="form-control"
                                    placeholder="Masukan Nama Ibu">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Email:</label>
                                <input type="email" name="email_daftar" class="form-control"
                                    placeholder="Masukan Alamat Email">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>No Telp / No Whatsapp</label>
                                <input type="text" name="no_telp" class="form-control"
                                    placeholder="Masukan Nomor Telepon">
                                <p class="small">Diawali kode negara. <br /> Contoh +62896xxx </p>
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
                                <textarea class="form-control" name="alamat" rows="2" id="alamat"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="form-group">
                                <label>Kode Pos:</label>
                                <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos">
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

                                    <option>Pendidikan Terakhir</option>
                                    <option value="SMA">SMA</option>
                                    <option value="SMK">SMK</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Nama Sekolah:</label>
                                <input type="text" name="sekolah" class="form-control"
                                    placeholder="Masukan Nama Asal Sekolah">
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
                                            <td><input type="number" name="indonesia[]" class="form-control"
                                                    style="width: 60px;height: 50px" value="0"></td>
                                            <td><input type="number" name="indonesia[]" class="form-control"
                                                    style="width: 60px;height: 50px" value="0"></td>
                                            <td><input type="number" name="indonesia[]" class="form-control"
                                                    style="width: 60px;height: 50px" value="0"></td>
                                            <td><input type="number" name="indonesia[]" class="form-control"
                                                    style="width: 60px;height: 50px" value="0"></td>
                                            <td><input type="number" name="indonesia[]" class="form-control"
                                                    style="width: 60px;height: 50px" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">Bahasa Inggris</td>
                                            <td><input type="number" name="inggris[]" class="form-control"
                                                    style="width: 60px;height: 50px" value="0"></td>
                                            <td><input type="number" name="inggris[]" class="form-control"
                                                    style="width: 60px;height: 50px" value="0"></td>
                                            <td><input type="number" name="inggris[]" class="form-control"
                                                    style="width: 60px;height: 50px" value="0"></td>
                                            <td><input type="number" name="inggris[]" class="form-control"
                                                    style="width: 60px;height: 50px" value="0"></td>
                                            <td><input type="number" name="inggris[]" class="form-control"
                                                    style="width: 60px;height: 50px" value="0"></td>
                                        </tr>
                                        <tr>
                                            <td class="align-middle">Matematika</td>
                                            <td><input type="number" name="mtk[]" class="form-control"
                                                    style="width: 60px;height: 50px" value="0"></td>
                                            <td><input type="number" name="mtk[]" class="form-control"
                                                    style="width: 60px;height: 50px" value="0"></td>
                                            <td><input type="number" name="mtk[]" class="form-control"
                                                    style="width: 60px;height: 50px" value="0"></td>
                                            <td><input type="number" name="mtk[]" class="form-control"
                                                    style="width: 60px;height: 50px" value="0"></td>
                                            <td><input type="number" name="mtk[]" class="form-control"
                                                    style="width: 60px;height: 50px" value="0"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br />
                    <div class="alert alert-primary">
                        <strong>Pilihan Program Studi</strong>
                    </div>
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label>Pilih Program Studi</label>
                                <select class="form-control" name="jurusan">
                                    <option value="">--> Pilih Program Studi Yang Akan Diambil <-- </option>
                                            @foreach ($jurusan as $item)
                                    <option value="{{$item->kode_jurusan}}">{{ $item->nama_jurusan}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-primary">
                        <strong>Berkas Pendudukung</strong>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Upload foto diri</label>
                                <input type="file" name="foto" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Upload Berkas Pendukung</label>
                                <input type="file" name="berkas" class="form-control">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" name="Submit" id="Submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>
