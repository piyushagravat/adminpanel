<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Manage Users</h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/users">Manage Users</a></li>
            <li class="active">List of Users</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- /.row -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of Users</h3>
                  &nbsp;<?php if($message != ''){ echo "<span class='btn btn-danger btn-xs'>".$message."</span>"; } ?>
                  <div class="box-tools">
                    <div class="input-group">
                     <a href="<?php echo base_url(); ?>admin/users/add"> <button class="btn btn-block btn-primary btn-sm">Add New User</button></a>
                      
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Created Date</th>
                      <th>Action</th>
                    </tr>
                    <?php foreach($viewdata as $item) { ?>
                    <tr>
                      <td><?php echo $item->id; ?></td>
                      <td><?php echo $item->first_name." ".$item->last_name; ?></td>
                      <td><?php echo $item->email; ?></td>
                      <td><span class="label label-success"><?php echo $item->role; ?></span></td>
                      <td><?php echo $item->created_date; ?></td>
                      <th><a href="<?php echo base_url(); ?>admin/users/delete/<?php echo $item->id; ?>" onclick="return confirm('Are you sure you want to delete?')"><span class="label label-danger">Delete</span></a> &nbsp; <a href="<?php echo base_url(); ?>admin/users/edit/<?php echo $item->id; ?>"><span class="label label-warning">Edit</span></a></th>
                      
                    </tr>
                    <?php } ?>
                   
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