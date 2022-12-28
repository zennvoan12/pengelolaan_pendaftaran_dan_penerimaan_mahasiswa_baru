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
                    <form id="form" method="post" action="/dashboard/edit-form-registrasi" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                     @include('layouts.formLayout')
                </div>
                        <div class="modal-footer">
                                <button type="submit" name="Submit" id="Submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                </div>
            </div>
</div>
