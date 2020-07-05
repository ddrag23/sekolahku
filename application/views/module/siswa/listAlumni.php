  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
            <a class="btn btn-primary" href="<?= base_url('halaman/siswa/alumni');?>"><i class="fa fa-plus"></i> Tambah Siswa</a>
            <a class="btn btn-primary" href="<?=base_url('uploads/dokumen/template-import.xlsx');?>"><i class="fa fa-download"></i> Download Format</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-sm" >Import Data Siswa</button>
            <ul class="nav navbar-right panel_toolbox">
             <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
             <li><a class="close-link"><i class="fa fa-close"></i></a></li>
             </ul>
             <div class="clearfix"></div>
             </div>
            <div class="x_content">
            <!-- content starts here -->
        <table id="table-alumni" class="table table-striped table-bordered" style="width:100%"> 
        <thead>
          <tr>
            <th>No</th>
            <th>Foto</th>
            <th>Nisn / Nama Siswa</th>
            <th>Status Siswa</th>
            <th>Tahun Ajaran</th>
            <th>Status Ijazah</th>
            <th>Tanggal Pengambilan</th>
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
<script>
  $(document).ready(function() {
    $('#table-alumni').DataTable({
      "processing" : true,
      "responsive" : true,
      "serverSide" : true,
      "ajax" : {
        "url" : "<?= site_url('halaman/siswa/data-alumni') ;?>",
        "type" : "POST"
      }, 
      "columnDefs" :[
        {
            "targets":[3, 4, 5, 6, 7],
            "className" : 'text-center'
        },
        {
            "targets" : [0, 1, 7, -1],
            "orderable" : false
        }
      ]
    })
  })
</script>
