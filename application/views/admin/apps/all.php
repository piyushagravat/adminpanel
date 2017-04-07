<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>Manage Application</h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>users">Manage Application</a></li>
            <li class="active">List of Application</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- /.row -->
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List of Application</h3>
                  &nbsp;<?php if($message != ''){ echo "<span class='btn btn-danger btn-xs'>".$message."</span>"; } ?>
                  <div class="box-tools">
                    <div class="input-group">
                     <a href="<?php echo base_url(); ?>admin/application/add"> <button class="btn btn-block btn-primary btn-sm">Add New Application</button></a>
                      
                    </div>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive no-padding">
                  
				  <table class="table table-hover">
                    <tr>
                      <th>ID</th>
                      <th>App Name</th>
                      <th>App OS</th>
                      <th>App Categories</th>
                      <th>App Sub-Categories</th>
                      <th>View App Images</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                    <?php $i=0;  foreach($viewdata as $item) { 
							
                              $cat = $this->SubcategoriesModel->get_cat_list_by_id($item->cid)->row();
                              $subcat = $this->SubcategoriesModel->get_subcat_list_by_id($item->scid)->row();
							  $os = $this->CategoriesModel->get_ostype_by_id($item->osid)->row();
                              
					    ?>
                    <tr>
                      <td><?php echo $i+1; ?></td>
                      <td><?php echo $item->app_name; ?></td>
                      <td><span class="label label-success"><?php if(count($os) == 0) { ?><?php echo "-------" ?><?php }else { echo $os->os_name;} ?></span></td>
                      <td><?php if(count($cat) == 0) { ?><?php echo "-------" ?><?php }else { echo $cat->cname;} ?></td>
                      <td><?php if(count($subcat) == 0) { ?><?php echo "-------" ?><?php }else { echo $subcat->scname;} ?></td>
                      <th><a href="<?php echo base_url(); ?>admin/application/viewimages/<?php echo $item->mid; ?>"><span class="label label-primary">View Slider Images</span></a></th>
                      <th><?php if($item->status == "Disable") { ?> <a href="<?php echo base_url(); ?>admin/application/action/<?php echo $item->mid; ?>/Enable"><span class="label label-success">Enable ?</span></a><?php } else { ?><a href="<?php echo base_url(); ?>admin/application/action/<?php echo $item->mid; ?>/Disable"><span class="label label-default">Disable ?</span></a><?php } ?></span></a></th>
                      <th><a href="<?php echo base_url(); ?>admin/application/delete/<?php echo $item->mid; ?>" onclick="return confirm('Are you sure you want to delete?')"><span class="label label-danger">Delete</span></a> &nbsp; <a href="<?php echo base_url(); ?>admin/application/edit/<?php echo $item->mid; ?>"><span class="label label-warning">Edit</span></a></th>
                      
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