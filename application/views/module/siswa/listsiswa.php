  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
            <a class="btn btn-primary" href="<?= base_url('siswa/add');?>"><i class="fa fa-plus"></i> Tambah Siswa</a>
            <a class="btn btn-primary" href="<?=base_url('uploads/dokumen/template-import.xlsx');?>"><i class="fa fa-download"></i> Download Format</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm" >Import Data Siswa</button>
            <ul class="nav navbar-right panel_toolbox">
             <li><a class="text-success"><i class="fa fa-file-excel-o"></i> Export</a></li>
             </ul>
             <div class="clearfix"></div>
             </div>
            <div class="x_content">
            <!-- content starts here -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('sukses');?>"></div>
      <table id="datatable" class="table table-striped table-bordered" style="width:100%"> 
        <thead>
          <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nis / Nama Siswa</th>
            <th>No Telepon</th>
            <th>Kelas</th>
            <th>Status Siswa</th>
            <th>Tahun Ajaran</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <!-- server side -->
        </tbody>
      </table>
</div>
      </div>
</div>
  </div>
</div>

<!--modal-->
                  <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel2">Import Data</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <h4 style="margin-bottom:20px;">Masukkan File</h4>
                        <?= form_open_multipart('siswa/import');?>
                            <input type="file" name="import" class="form-control">
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                        </form>
                      </div>
                    </div>
                  </div>

<script>
  $(document).ready(function() {
    $('#datatable').DataTable({
      "processing" : true,
      "serverSide" : true,
      "ajax" : {
        "url" : "<?= site_url('siswa/get_ajax_aktif') ;?>",
        "type" : "POST"
      } 
    })
  })
</script>