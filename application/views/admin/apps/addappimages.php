<script type="text/javascript">
function check()
{
	var fup1 = document.getElementById('userfile');	
	if(document.getElementById('userfile').value != '')
	{
		var fileName1 = fup1.value;
		var ext1 = fileName1.substring(fileName1.lastIndexOf('.') + 1);
		
		if(ext1 == "jpg" || ext1 == "gif" || ext1 == "png" || ext1 == "jpeg")
		{
			return true;
		}
		else
		{
			alert("Upload Image only");
			fup1.focus();
			return false;
		}
	}
	else {
		alert("Please select atleast one image ");
			fup1.focus();
			return false;
	}
}
</script>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Application Images
	    </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/application">Manage Application Images</a></li>
            <li class="active"><?php echo $images->app_name; ?> - Add New Application Images</li>
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
                  <h3 class="box-title"><?php echo $images->app_name; ?> - Add New Images</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="<?php echo base_url()."admin/application/addrecord_images"; ?>"  enctype="multipart/form-data"  onSubmit="return check()">
                <input type="hidden" name="mid" value="<?php echo $images->mid; ?>"  />
                  <div class="box-body">
                  	
                    <div class="form-group">
                      <label for="exampleInputFile">Upload Images (Select multiple images to upload morethan 1 image )</label>
                      <input type="file" class="form-control" name="userfile[]" id="userfile" size="20" multiple />  
                      <?php if(form_error('userfile') != ''){ ?><div class="alert alert-danger"><?php echo form_error('userfile'); ?></div><?php } ?>
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
            
                                      