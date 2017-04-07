<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Sub Menu
	    </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/submenu">Manage Sub Menu</a></li>
            <li class="active">Add New Menu</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">Add New Sub Categories</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="<?php echo base_url()."admin/submenu/addrecord"; ?>"  enctype="multipart/form-data" onSubmit="return check()">
                  
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Submenu Name</label>
                      <input type="text" class="form-control" id="exampleInputName" name="txtsubmenuname" placeholder="Enter Sub Name" value="<?php echo set_value('txtsubmenuname')?>">
                      <?php if(form_error('txtsubmenuname') != ''){ ?><div class="alert-danger"><?php echo form_error('txtsubmenuname'); ?></div><?php } ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Parent Menu</label>
                      <select name="selmenu" class="form-control" >
                      <option>Select</option>
                      <?php foreach($menu as $item) { ?>
                      <option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
                      <?php } ?>
                      </select>
                    </div> 
                    <div class="form-group">
                      <label for="exampleInputEmail1">URL Link</label>
                      <textarea class="form-control" id="txtlink" name="txtlink" placeholder="Enter URL Link" ><?php echo set_value('txtlink');  ?></textarea>
                      <?php if(form_error('txtlink') != ''){ ?><div class="alert-danger"><?php echo form_error('txtlink'); ?></div><?php } ?>
                    </div>   
                  </div><!-- /.box-body -->
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div><!-- /.box -->         

            </div><!--/.col (left) -->
            
          </div>   <!-- /.row -->
        </section><!-- /.content -->
      </div>
            
                                      