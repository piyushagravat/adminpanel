<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Categories
	    </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/users">Manage Categories</a></li>
            <li class="active">Add New Categories</li>
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
                  <h3 class="box-title">Add New Categories</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <form role="form" method="post" action="<?php echo base_url()."admin/categories/addrecord"; ?>"  enctype="multipart/form-data" onSubmit="return check()">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName" name="txtcatname" placeholder="Enter Categories Name" value="<?php echo set_value('txtcatname')?>">
                      <?php if(form_error('txtcatname') != ''){ ?><div class="alert-danger"><?php echo form_error('txtcatname'); ?></div><?php } ?>
                    </div>
                    <div class="form-group">
                      <label>App OS Type</label>
                      <select name="selostype" id="selostype" class="form-control">
                      <option value="0">Please Select App OS Type</option>
                      <?php foreach($ostype as $item){ ?>
                        <option value="<?php echo $item->os_name; ?>"><?php echo $item->os_name; ?></option>
                        <?php } ?>  
                      </select>
                    </div>  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                        <textarea class="form-control" id="txtdescription" name="txtdescription" placeholder="Enter Description" ><?php echo set_value('txtdescription');  ?></textarea>
                        <?php if(form_error('txtdescription') != ''){ ?><div class="alert-danger"><?php echo form_error('txtdescription'); ?></div><?php } ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Keyword</label>
                      <input type="text" class="form-control" id="exampleInputName" name="txtkeyword" placeholder="Enter Keyword" value="<?php echo set_value('txtkeyword')?>">
                      <?php if(form_error('txtkeyword') != ''){ ?><div class="alert-danger"><?php echo form_error('txtkeyword'); ?></div><?php } ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">SEO Title</label>
                      <input type="text" class="form-control" id="exampleInputName" name="txtseotitle" placeholder="Enter SEO Title" value="<?php echo set_value('txtcatname')?>">
                      <?php if(form_error('txtseotitle') != ''){ ?><div class="alert-danger"><?php echo form_error('txtseotitle'); ?></div><?php } ?>
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
            
                                      