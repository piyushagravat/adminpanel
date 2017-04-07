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
                  <h3 class="box-title">Add New Application</h3>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form role="form" method="post" action="<?php echo base_url()."admin/application/updaterecord"; ?>"  enctype="multipart/form-data" onSubmit="return check()">
                  <input type="hidden" name="mid" value="<?php echo $editdata->mid; ?>" /> 
				  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">App Name</label>
                      <input type="text" class="form-control" id="exampleInputName" name="txtappname" placeholder="Enter Application Name" value="<?php  echo $editdata->app_name; ?>">
                      <?php if(form_error('txtappname') != ''){ ?><div class="alert-danger"><?php echo form_error('txtnappname'); ?></div><?php } ?>
                     </div>
                      <?php if($list->num_rows > 0){ ?>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Category</label>
                        <select class="form-control" name="txtcategories" onchange="selectSubcategoriesEdit(this.options[this.selectedIndex].value)">
                              <option value="0">Select Categories</option>
                              <?php 
                              foreach($list->result() as $listElement){
                                      ?>
                                      <option value="<?php echo $listElement->cid?>" <?php if($listElement->cid == $editdata->cid ) { ?> selected="selected" <?php } ?>><?php echo $listElement->cname; ?></option>
									  
									  <?php
                              }
                              ?>
                        </select>
                     </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Sub Category</label>
					<?php 
					  $this->load->model("appsModel");	
					  $subcat = $this->appsModel->get_subcat_by_cid($editdata->cid)->result();  	?>                     

					 <select class="form-control" name="txtsubcategories" id="state_dropdown" onchange="selectSubsubcategoriesEdit(this.options[this.selectedIndex].value)">
                            <option value="0">Select Sub-Categories</option>
							<?php foreach($subcat as $item){  ?>
                            <option value="<?php echo $item->scid?>" <?php if($item->scid == $editdata->scid ) { ?> selected="selected" <?php } ?>><?php echo $item->scname; ?></option>
                            <?php } ?>
                      </select>
                    <span id="state_loader"></span>
                     
                    </div> 
                  
                    <?php } else { echo 'No Categories Found'; } ?>  
                    <div class="form-group">
                      <label>App OS Type</label>
					 
					 <select name="selostype" id="selostype" class="form-control">
                      <option value="0">Please Select App OS Type</option>
                      <?php foreach($ostype as $item){ ?>
                        <option value="<?php echo $item->id?>" <?php if($item->id == $editdata->osid ) { ?> selected="selected" <?php } ?>><?php echo $item->os_name; ?></option>
					  <?php } ?>  
                      </select>
                    </div>  
					
					 <div class="form-group">
                      <label for="exampleInputFile">Upload App Icone</label>
                     <input type="hidden" name="userfile1old" value="<?php echo $editdata->app_icon;  ?>"  />
                     <input type="file" class="form-control" name="userfile1" id="userfile1" size="20" />  
                     <?php if(form_error('userfile1') != ''){ ?><div class="alert alert-danger"><?php echo form_error('userfile1'); ?></div><?php } ?>
                     <strong>Image :</strong><br /><img src="<?php echo base_url(); ?>images/appicon/<?php echo $editdata->app_icon; ?>" width="150px">	
                    </div> 
					
                    <div class="form-group">
                      <label for="exampleInputEmail1">Details</label>
                      
					   <textarea class="form-control" id="txtdetails" name="txtdetails" placeholder="Enter email">
                      <?php echo $editdata->app_details; ?>
                      </textarea>
					  
					  
					  <?php if(form_error('txtdetail') != ''){ ?><div class="alert-danger"><?php echo form_error('txtdetail'); ?></div><?php } ?>
                    </div> 

					
					
                    <div class="form-group">
                      <label for="exampleInputEmail1">App Link</label>
                        <textarea class="form-control" id="txtapplink" name="txtapplink" placeholder="Enter Applcation Link" ><?php  echo $editdata->app_link; ?></textarea>
                        <?php if(form_error('txtapplink') != ''){ ?><div class="alert-danger"><?php echo form_error('txtapplink'); ?></div><?php } ?>
                    </div>
					
					<div class="form-group">
					  <label>Select Similer Apps.</label>
					  <select multiple class="form-control" name="similerapp[]">
						  <?php   foreach($apps as $item){?>
						   <option value="<?php echo $item->mid?>" <?php $str = $editdata->similer_apps; $arr = explode(',',$str);foreach($arr as $num)	{   if($item->mid ==  $num){  ?> selected="selected" <?php } } ?>><?php echo $item->app_name; ?></option>
						  <?php  } ?>
					</select>
					</div>
                    <div class="checkbox">
                      <label>
                        
						<input type="checkbox" name="chkfeaturedapp" value="1"  <?php if($editdata->isfeatured == "1") { ?>checked="checked" <?php } ?>> Is Featured App
                      </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>
                        <input type="checkbox" name="chktopapp" value="1" value="1"  <?php if($editdata->istop == "1") { ?>checked="checked" <?php } ?>> Is Top App
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
            
                                      