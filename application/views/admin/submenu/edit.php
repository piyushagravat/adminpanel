<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Sub-Menu
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/submenu">Manage Sub-Menu</a></li>
            <li class="active">Edit Sub-Menu Details</li>
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
                  <h3 class="box-title">Edit Sub-Menu</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               <form role="form" method="post" action="<?php echo base_url()."admin/submenu/updaterecord"; ?>"  enctype="multipart/form-data">
                    <input type="hidden" name="smid" value="<?php echo $editdata->smid; ?>" /> 
                   <div class="box-body">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Sub Menu Name</label>
                      <input type="text" class="form-control" id="exampleInputName" name="txtsubmenuname" placeholder="Enter Sub-Menu Name" value="<?php echo $editdata->name; ?>">
                      <?php if(form_error('txtsubmenuname') != ''){ ?><div class="alert-danger"><?php echo form_error('txtsubmenuname'); ?></div><?php } ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Parent Category</label>
                      <select name="selmenu" class="form-control" >
                       <?php foreach($menu as $item) { ?>
                        <option value="<?php echo $item->id; ?>" <?php if($editdata->smid == $item->id) { ?> selected="selected" <?php } ?>><?php echo $item->name; ?></option>
                      <?php } ?>
                      </select>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">URL Link</label>
                      <textarea class="form-control" id="txtlink" name="txtlink"><?php echo $editdata->link; ?></textarea>
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
 