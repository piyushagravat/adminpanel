<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Manage Categories</h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/categories">Manage Categories</a></li>
            <li class="active">List of Categories</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- /.row -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of Categories</h3>
                  &nbsp;<?php if($message != ''){ echo "<span class='btn btn-danger btn-xs'>".$message."</span>"; } ?>
                  <div class="box-tools">
                    <div class="input-group">
                     <a href="<?php echo base_url(); ?>admin/categories/add"> <button class="btn btn-block btn-primary btn-sm">Add New Categories</button></a>
                      
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>App OS</th>
                      <th>Description</th>
                      <th>Keyword</th>
                      <th>SEO Title</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    <?php $i=0; foreach($viewdata as $item) { ?>
                    <tr>
                      <td><?php echo $i+1; ?></td>
                      <td><?php echo $item->cname; ?></td>
                      <td><?php echo $item->osid; ?></td>
                      <td><?php echo $item->desc; ?></td>
                      <td><?php echo $item->keywords; ?></td>
                      <td><?php echo $item->seotitle; ?></td>
                      <th><?php if($item->status == "Disable") { ?> <a href="<?php echo base_url(); ?>admin/categories/action/<?php echo $item->cid; ?>/Enable"><span class="label label-success">Enable ?</span></a><?php } else { ?><a href="<?php echo base_url(); ?>admin/categories/action/<?php echo $item->cid; ?>/Disable"><span class="label label-default">Disable ?</span></a><?php } ?></span></a></th>
                      <th><a href="<?php echo base_url(); ?>admin/categories/delete/<?php echo $item->cid; ?>" onclick="return confirm('Are you sure you want to delete?')"><span class="label label-danger">Delete</span></a> &nbsp; <a href="<?php echo base_url(); ?>admin/categories/edit/<?php echo $item->cid; ?>"><span class="label label-warning">Edit</span></a></th>
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