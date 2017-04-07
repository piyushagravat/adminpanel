<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Manage Menu</h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/menu">Manage Menu</a></li>
            <li class="active">List of Menu</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- /.row -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of Menu</h3>
                  &nbsp;<?php if($message != ''){ echo "<span class='btn btn-danger btn-xs'>".$message."</span>"; } ?>
                  <div class="box-tools">
                    <div class="input-group">
                     <a href="<?php echo base_url(); ?>admin/menu/add"> <button class="btn btn-block btn-primary btn-sm">Add New Menu</button></a>
                      
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>Menu Name</th>
                      <th>URL Link</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    <?php $i=0; foreach($viewdata as $item) { ?>
                    <tr>
                      <td><?php echo $i+1; ?></td>
                      <td><?php echo $item->name; ?></td>
                      <td><?php echo $item->link; ?></td>
                      <th><?php if($item->status == "Disable") { ?> <a href="<?php echo base_url(); ?>admin/menu/action/<?php echo $item->id; ?>/Enable"><span class="label label-success">Enable ?</span></a><?php } else { ?><a href="<?php echo base_url(); ?>admin/menu/action/<?php echo $item->id; ?>/Disable"><span class="label label-default">Disable ?</span></a><?php } ?></span></a></th>
                      <th><a href="<?php echo base_url(); ?>admin/menu/delete/<?php echo $item->id; ?>" onclick="return confirm('Are you sure you want to delete?')"><span class="label label-danger">Delete</span></a> &nbsp; <a href="<?php echo base_url(); ?>admin/menu/edit/<?php echo $item->id; ?>"><span class="label label-warning">Edit</span></a></th>
                    </tr>
                    <?php $i++; } ?>
                   
                    <tr>
                    <td colspan="7"><div class="box-tools">
                    <div class="input-group">
                      
                      <div class="box-tools">
                    <ul class="pagination pagination-sm no-margin pull-right">
                      <?php echo $pagination; ?>
                    </ul>
                  </div>
                    </div>
                  </div></td>
                    </tr>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>
        </section><!-- /.content -->
      </div>