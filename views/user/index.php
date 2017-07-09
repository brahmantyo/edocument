<?php echo $data['header']; ?>
<?php echo $data['sidebarleft']; ?>
<!--main content start-->
<section id="main-content">
  <section class="wrapper">
  <h3><i class="fa fa-angle-right"></i> Daftar User</h3>
    <div class="row mt">
        <div class="col-md-12">
            <div class="content-panel">
                <table class="table table-striped table-advance table-hover">
                    <!-- <h4><i class="fa fa-angle-right"></i> Daftar Dokumen</h4> -->
                    <hr>
                    <thead>
                    <tr>
                        <th width="10"></th>
                        <th><i class="fa fa-calendar"></i> Tanggal</th>
                        <th><i class="fa fa-user"></i> Nama</th>
                        <th><i class="fa fa-file-archive-o "></i> Email</th>
                        <th> Login Terakhir</th>
                        <th> Status</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach ($data['list'] as $list) {
                    ?>
                    <tr>
                        <td><input type="checkbox" /></td>
                        <td><?php echo $list->tgl; ?></td>
                        <td><?php echo $list->name; ?></td>
                        <td><?php echo $list->email; ?></td>
                        <td><?php echo $list->last; ?></td>
                        <td><?php echo $list->status; ?></td>
                        <td>
                            <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                            <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                        </td>
                    </tr>
                    <?php } ?>


                    </tbody>
                </table>

                <footer class="site-footer">
                    <dir class="col-md-3 hidden-sm hidden-xs"></dir>
                    <div class="col-md-6 col-xs-12 text-center">
                      <a href="?url=dokumen/otorisasi" class="btn btn-sm btn-danger "><i class="fa fa-check-circle-o"></i> Otorisasi</a>
                      <a href="?url=dokumen/tolak" class="btn btn-sm btn-danger "><i class="fa fa-times-circle-o"></i> Tolak</a>
                      <a href="#myModal" class="btn btn-sm btn-success" data-toggle="modal"><i class="fa fa-plus"></i> Tambah</a>
                      <!-- <button id="btntambah" class="btn btn-sm btn-success"><i class="fa fa-plus"></i> Tambah</button> -->
                      <a href="?url=dokumen/ubah" class="btn btn-sm btn-success "><i class="fa fa-pencil"></i> Ubah</a>
                      <a href="?url=dokumen/hapus" class="btn btn-sm btn-success "><i class="fa fa-eraser"></i> Hapus</a>
                    </div>
                    <div class="col-md-3"></div>
                </footer>
            </div><!-- /content-panel -->
        </div><!-- /col-md-12 -->
    </div><!-- /row -->
  </section>
</section>
<!--main content end-->
<!-- Modal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
  <div class="modal-dialog modal-lg">
                <form action="" method="post" class="form-horizontal style-form">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Tambah User</h4>
          </div>
          <div class="modal-body">
            <div class="form-panel">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">User ID</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Konfirmasi</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Departemen</label>
                        <div class="col-sm-10">
                            <select class="form-control">
                              <option>-- Pilih Departemen --</option>
                              <option>Tata Usaha</option>
                              <option>Wakil Rektor 1</option>
                              <option>Wakil Rektor 2</option>
                              <option>Wakil Rektor 3</option>
                              <option>Ketua Rektor</option>
                              <option>Bagian Keuangan</option>
                            </select>
                        </div>
                    </div>
            </div>
          </div>
          <div class="modal-footer">
              <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
              <button class="btn btn-theme" type="button">Submit</button>
          </div>
      </div>
                </form>
  </div>
</div>
<!-- modal -->
<?php echo $data['footer']; ?>




<!-- <script>
    $('#btntambah').on('click',function(){
        $('#myModal').show();
    });
</script> -->