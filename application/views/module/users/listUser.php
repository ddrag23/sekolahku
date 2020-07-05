  <div class="row">
    <div class="col-md-12">
      <div class="x_panel">
        <div class="x_title">
             <a href="<?= site_url('user/add'); ?>" class="btn btn-primary" ><i class="fa fa-plus"></i> Tambah Akun</a>
            <ul class="nav navbar-right panel_toolbox">
             <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
             <li><a class="close-link"><i class="fa fa-close"></i></a></li>
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
                <th>Username</th>
                <th>Email</th>
                <th>No Telepon</th>
                <th>Level</th>
                <th>Status User</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              </tbody>   
         </table>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $('#datatable').DataTable({
      "processing" : true,
      "responsive" : true,
      "serverSide" : true,
      "ajax" : {
        "url" : "<?= site_url('user/get_ajax_user') ;?>",
        "type" : "POST"
      } 
    })
  })
</script>
