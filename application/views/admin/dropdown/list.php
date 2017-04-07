<div class="content-wrapper">
        <!-- Content Header (Page header) -->
      
        <!-- Main content -->
        <section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-6">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header">
                  <h3 class="box-title">	</h3>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form role="form" method="post" action="<?php echo base_url()."product/addrecord"; ?>"  enctype="multipart/form-data" onSubmit="return check()">
                  <div class="box-body">
                    
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
                    <div class="form-group">
                      <label for="exampleInputEmail1">Sub-Sub-Category</label>
                      <select class="form-control" name="txtsubsubcategories" id="city_dropdown">
                                <option value="0">Select Sub-Sub-Categories</option>
                        </select>
                        <span id="city_loader"></span>
                   
                       
                    </div>
                    <?php } else { echo 'No Categories Found'; } ?>  
                   
                   
                    
                    
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
            
                                      