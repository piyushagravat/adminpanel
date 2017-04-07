<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Sub-Categories
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/subcategories">Manage Sub-Categories</a></li>
            <li class="active">Edit Sub-Categories Details</li>
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
                  <h3 class="box-title">Edit Sub-Categories</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
               <form role="form" method="post" action="<?php echo base_url()."admin/subcategories/updaterecord"; ?>"  enctype="multipart/form-data">
                    <input type="hidden" name="scid" value="<?php echo $editdata->scid; ?>" /> 
                   <div class="box-body">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName" name="txtsubcatname" placeholder="Enter Sub-Categories Name" value="<?php echo $editdata->scname; ?>">
                      <?php if(form_error('txtsubcatname') != ''){ ?><div class="alert-danger"><?php echo form_error('txtsubcatname'); ?></div><?php } ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Parent Category</label>
                      <select name="selcategories" class="form-control" >
                       <?php foreach($categories as $item) { ?>
                        <option value="<?php echo $item->cid; ?>" <?php if($editdata->scid == $item->cid) { ?> selected="selected" <?php } ?>><?php echo $item->cname; ?></option>
                      <?php } ?>
                      </select>
                    </div>
                     <div class="form-group">
                      <label>App OS Type</label>
                      <select name="selostype" class="form-control">
                      	<?php if($editdata->selostype == 0) { ?>
                        <option value="0">Please Select App OS Type</option>
                        <?php } ?>
                        <?php foreach($ostype as $item){ ?>
                        
                        <option value="<?php echo $item->os_name; ?>" <?php if($editdata->osid == $item->id) { ?> selected="selected" <?php } ?> ><?php echo $item->os_name; ?></option>
                        <?php } ?>
                      </select>
                    </div>   
                    <div class="form-group">
                      <label for="exampleInputEmail1">Description</label>
                        <textarea class="form-control" id="txtdetail" name="txtdescription" placeholder="Enter Description" ><?php echo $editdata->desc; ?></textarea>
                        <?php if(form_error('txtdescription') != ''){ ?><div class="alert-danger"><?php echo form_error('txtdescription'); ?></div><?php } ?>
                    </div>  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Keyword</label>
                      <input type="text" class="form-control" id="exampleInputName" name="txtkeyword" placeholder="Enter Keyword" value="<?php echo $editdata->keywords; ?>">
                      <?php if(form_error('txtkeyword') != ''){ ?><div class="alert-danger"><?php echo form_error('txtkeyword'); ?></div><?php } ?>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">SEO Title</label>
                      <input type="text" class="form-control" id="exampleInputName" name="txtseotitle" placeholder="Enter SEO Title" value="<?php echo $editdata->seotitle; ?>">
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
 