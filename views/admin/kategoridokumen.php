<?php echo $data['header']; ?>
<?php echo $data['sidebarleft']; ?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Kategori Dokumen</h3>
    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel">
          <table class="table table-striped table-advance table-hover">
            <hr>
            <thead>
              <tr>
                <th width="10"></th>
                <th> ID</th>
                <th> Kategori Dokumen</th>
                <th> Deskripsi</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($data['list'] as $list) {?>
                <tr>
                  <td>
                    <input type="checkbox" />
                  </td>
                  <td>
                    <?php echo $list->id; ?>
                  </td>
                  <td>
                    <?php echo $list->kategori; ?>
                  </td>
                  <td>
                    <?php echo $list->deskripsi; ?>
                  </td>
                  <td>
                    <a href="?url=admin/kategoridokumen/ubah/<?php echo $list->id; ?>" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>
                    <a href="?url=admin/kategoridokumen/hapus/<?php echo $list->id; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>
                  </td>
                </tr>
              <?php }?>
            </tbody>
          </table>
          <footer class="site-footer">
            <dir class="col-md-3 hidden-sm hidden-xs"></dir>
            <div class="col-md-6 col-xs-12 text-center">
              <a id="addBtn" href="/#tambahForm" class="btn btn-sm btn-success" data-toggle="modal"><i class="fa fa-plus"></i> Tambah</a>
            </div>
            <div class="col-md-3"></div>
          </footer>
        </div>
        <!-- /content-panel -->
      </div>
      <!-- /col-md-12 -->
    </div>
    <!-- /row -->
  </section>
</section>
<!--main content end-->
<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambahForm" class="modal fade">
  <div class="modal-dialog modal-lg">
    <form action="?url=admin/kategoridokumen/tambahSimpan" method="post" class="form-horizontal style-form">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Tambah Kategori Dokumen</h4>
        </div>
      <?php if ($data['successMessage']) {?>
      <!-- Message OK -->
      <div id="successMessage" class="alert alert-success">
        <p><strong>Your file was uploaded succesifully!</strong>
        <a href="#" class="close"><i class="fa fa-times-circle-o"></i></a></p>
      </div>
      <!-- End Message OK -->
      <?php }?>
      <?php if ($data['errorMessage']) {?>
      <!-- Message Error -->
      <div id="errorMessage" class="alert alert-danger">
        <p><strong><?php echo $data['errorMessage']; ?></strong>
        <a href="#" class="close"><i class="fa fa-times-circle-o"></i></a></p> </div>
      <!-- End Message Error -->
      <?php }?>
        <div class="modal-body">
          <div class="form-panel">
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Kategori Dokumen</label>
              <div class="col-sm-10">
                <input name="kategoridokumen" type="text" class="form-control" value="<?=isset($data['kategoridokumen']) ? $data['kategoridokumen'] : '';?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Deskrispi</label>
              <div class="col-sm-10">
                <input name="deskripsi" type="text" class="form-control" value="<?=isset($data['deskripsi']) ? $data['deskripsi'] : '';?>">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
          <button class="btn btn-theme" type="submit">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>
<a href="/#ubahForm" id="editbtn" data-toggle="modal"></a>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="ubahForm" class="modal fade">
  <div class="modal-dialog modal-lg">
    <form action="?url=admin/kategoridokumen/ubahSimpan" method="post" class="form-horizontal style-form">
      <input name="id" type="hidden" class="form-control" value="<?php echo $data['id']; ?>">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Ubah Kategori Dokumen</h4>
        </div>
        <div class="modal-body">
          <div class="form-panel">
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Kategori Dokumen</label>
              <div class="col-sm-10">
                <input name="kategoridokumen" type="text" class="form-control" value="<?php echo $data['kategoridokumen']; ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 col-sm-2 control-label">Deskrispi</label>
              <div class="col-sm-10">
                <input name="deskripsi" type="text" class="form-control" value="<?php echo $data['deskripsi']; ?>">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn btn-default" type="button">Batal</button>
          <button class="btn btn-theme" type="submit">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- modal -->
<?php echo $data['footer']; ?>
<?php if (isset($data['ubahForm'])) {?>
<script>
  $(document).ready(function(){
    $('#editbtn').click();
  })
</script>
<?php }?>
<?php if (isset($data['tambahForm'])) {?>
<script>
  $(document).ready(function(){
    $('#addBtn').click();
  })
</script>
<?php }?>
<!-- <script>
    $('#btntambah').on('click',function(){
        $('#myModal').show();
    });
</script> -->
