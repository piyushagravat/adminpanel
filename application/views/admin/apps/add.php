<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Manage Application
	    </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url(); ?>admin/application">Manage Application</a></li>
            <li class="active">Add New Application</li>
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
                  <h3 class="box-title">Add New Products</h3>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form role="form" method="post" action="<?php echo base_url()."admin/application/addrecord"; ?>"  enctype="multipart/form-data" onSubmit="return check()">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">App Name</label>
                      <input type="text" class="form-control" id="exampleInputName" name="txtappname" placeholder="Enter Application Name" value="<?php echo set_value('txtnappname')?>">
                      <?php if(form_error('txtappname') != ''){ ?><div class="alert-danger"><?php echo form_error('txtnappname'); ?></div><?php } ?>
                     </div>
                      <?php if($list->num_rows > 0){ ?>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <select class="form-control" name="txtcategories" onchange="selectSubcategories(this.options[this.selectedIndex].value)">
                              <option value="0">Select Categories</option>
                              <?php
                              foreach($list->result() as $listElement){
                                      ?>
                                      <option value="<?php echo $listElement->cid?>"><?php echo $listElement->cname?></option>
                                      <?php
                              }
                              ?>
                        </select>
                      </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Sub Category</label>
                      <select class="form-control" name="txtsubcategories" id="state_dropdown" onchange="selectSubsubcategories(this.options[this.selectedIndex].value)">
                            <option value="0">Select Sub-Categories</option>
                      </select>
                    <span id="state_loader"></span>
                     
                    </div> 
                  
                    <?php } else { echo 'No Categories Found'; } ?>  
                    <div class="form-group">
                      <label>App OS Type</label>
                      <select name="selostype" id="selostype" class="form-control">
                      <option value="0">Please Select App OS Type</option>
                      <?php foreach($ostype as $item){ ?>
                        <option value="<?php  echo $item->id; ?>"><?php echo $item->os_name; ?></option>
                        <?php } ?>  
                      </select>
                    </div>  
                    <div class="form-group">
                      <label for="exampleInputFile">Upload App Icone</label>
                      <input type="file" class="form-control" name="userfile2" id="userfile2" size="20" />  
                      <?php if(form_error('userfile2') != ''){ ?><div class="alert alert-danger"><?php echo form_error('userfile2'); ?></div><?php } ?>
                    </div>
                   <div class="form-group">
						<label for="exampleInputEmail1">Details</label>
						<textarea class="form-control" id="txtdetails" name="txtdetails" placeholder="Enter Detail"><?php echo set_value('txtdetail');  ?>
						</textarea>
                      <?php if(form_error('txtdetails') != ''){ ?><div class="alert-danger"><?php echo form_error('txtdetails'); ?></div><?php } ?>
					</div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">App Link</label>
                        <textarea class="form-control" id="txtapplink" name="txtapplink" placeholder="Enter Applcation Link" ><?php echo set_value('txtapplink');  ?></textarea>
                        <?php if(form_error('txtapplink') != ''){ ?><div class="alert-danger"><?php echo form_error('txtapplink'); ?></div><?php } ?>
                    </div>
					<div class="form-group">
					  <label>Select Similer Apps.</label>
					  <select multiple class="form-control" name="similerapp[]">
						  <?php   foreach($apps as $item){ ?>
							<option value="<?php echo $item->mid; ?>"><?php echo $item->app_name; ?></option>
						  <?php } ?>
					  </select>
					</div>
					
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" name="chkfeaturedapp" value="1" > Is Featured App
                      </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>
                        <input type="checkbox" name="chktopapp" value="1" > Is Top App
                      </label>
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
            
                                      