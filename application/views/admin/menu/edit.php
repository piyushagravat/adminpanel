<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Menu
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/menu">Manage Menu</a></li>
            <li class="active">Edit Menu Details</li>
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
                  <h3 class="box-title">Edit Menu</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               <form role="form" method="post" action="<?php echo base_url()."admin/menu/updaterecord"; ?>"  enctype="multipart/form-data">
                   <input type="hidden" name="id" value="<?php echo $editdata->id; ?>" /> 
                   <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Menu Name</label>
                      <input type="text" class="form-control" id="exampleInputName" name="txtmenuname" value="<?php echo $editdata->name; ?>" >
                      <?php if(form_error('txtmenuname') != ''){ ?><div class="alert-danger"><?php echo form_error('txtmenuname'); ?></div><?php } ?>
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
            
                                      										 