<div class="modal fade" id="importSoalModal" tabindex="-1" aria-labelledby="exampleModalLable" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Soal</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <div class="modal-body">
        <form action="/admin/soal/import" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group">
            <label for="cover">Upload File</label>
            <input type="file" class="form-control" name="file"/>
        </div>
    </div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
    <button type="submit" class="btn btn-primary">Import Data</button>
</form>
</div>
</div>
</div>
</div>