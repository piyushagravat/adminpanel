
                <!---Banner Start--->        
   			 <div class="content">				
        <div id="slider" class="banner">
        	<ul class="bxslider">
                <li>
                    <div class="slide_app_wrapp">
                        <div class="container">
                            <div class="slide_app_info wow fadeInLeft" data-wow-delay="0.80s">
                                <h1>Bhagavadgomandal</h1>
                                <p>
                                    Bhagwadgomandal is the biggest and the most prolific work in Gujarati.
                                    Visionary Maharaj Bhagvadsinhji of Gondal gifted the original Bhagwadgomandal
                                    to the world after 26 years of scientific and detailed work. 
                                </p>
                                <div class="slide_btn">
                                    <a href="#">View App</a>
                                </div>
                            </div>
                        </div>
                    </div>            	
                    <img class="img-responsive" src="<?php echo base_url(); ?>images/slider/slide-1.jpg" title="" />
                </li>
                <li>
                    <div class="container">
                            <div class="slide_app_info wow fadeInRight" data-wow-delay="0.80s">
                                <h1>Gujarati Font Reader</h1>
                                <p>
                                    Does your phone support Gujarati Font ? No… ? Then this is the perfect app for you!
									Gujarati Font Reader allows Gujarati readers to convert the text to readable fonts
                                    and enjoy the content in Gujarati.
                                </p>
                                <div class="slide_btn">
                                    <a href="#">View App</a>
                                </div>
                            </div>
                        </div>
                    <img class="img-responsive" src="<?php echo base_url(); ?>images/slider/slide-2.jpg" title="" />
                </li>                
        	</ul>
        </div>				
    </div>
    <!---Main Content Start---> 
    <div class="apps_wrapp">
		<div class="container content">
        	<div class="col-md-9 col-sm-9">
			<?php    foreach($appsdetail as $item) {  ?>
            	<div class="app_download_detial">
                	<div class="app_icon">
                    	<img src="<?php echo base_url(); ?>images/appicon/<?php echo $item->app_icon; ?>" alt="Word Search"/>
                     </div>   
                    <h1 style="margin-top:15px;"><?php echo $item->app_name; ?></h1>
                    <h3 class="small"><a href="#">GujaratiLexicon.com</a></h3>
                    <div class="app_downlaod">
                    	<a href="<?php echo $item->app_link; ?>" target="_blank"><button type="button" class="btn btn-warning" >DOWNLOAD</button></a>
                    </div>
                </div> 
			<?php } ?>
                <div id="photoslide" class="web_open">                   
                    <ul class="bxslider">                    	
                       <?php foreach($appslider as $item) {  ?>
					   <li> 
							<a href="#" title="">
								<img src="<?php echo base_url(); ?>images/slider/<?php echo $item->img; ?>"/>
							</a>
                        </li> 
					<?php } ?>                        
                    </ul>
                </div>
                <h2>Application Details</h2>
                <?php    foreach($appsdetail as $item) {  ?>
				<p>
                    <?php echo $item->app_details; ?>
                </p>
                
				<?php } ?>
        	</div>
            <div class="col-md-3 col-sm-3">
            	<h2>Recent Apps</h2>
                <div class="recent_list">
                	<ul>
                    	<li>
                        	<a href="#">Android
                            <span><img src="<?php echo base_url(); ?>images/recent-arrow.png" width="6" height="12"></span></a>                           
                        </li>
                        <li>
                        	<a href="#">iPhone<span><img src="<?php echo base_url(); ?>images/recent-arrow.png" width="6" height="12"></span></a>
                        </li>
                        <li>
                        	<a href="#">Windows<span><img src="<?php echo base_url(); ?>images/recent-arrow.png" width="6" height="12"></span></a>
                        </li>
                        <li>
                        	<a href="#">Blackberry<span><img src="<?php echo base_url(); ?>images/recent-arrow.png" width="6" height="12"></span></a>
                        </li>
                    </ul>
                </div>
                <div class="add_div"><img src="<?php echo base_url(); ?>images/add_250x250.jpg"/> </div>
                <div class="add_div"><img src="<?php echo base_url(); ?>images/add_250x250.jpg"/> </div>
           </div>               	        
    	</div>
        <div class="white_bg">
        		<div class="container">
                    <div class="col-md-12">
                    	<h2>Similar Apps</h2>
                    	<div class="line"></div>
                    	<div id="similar_app" class="web_open">                             
                    		<ul class="bxslider">                    
                    			<li>
                                    <?php foreach($appsdetail as $item) {  ?>
										
									<?php
									$str = $item->similer_apps; 
									$arr = explode(',',$str);
									foreach($arr as $num)	
									{   
											
									?> 
									<div class="col-md-2 col-sm-2"> 
                                        <div class="similar_box">
                                            <div class="app_pic">
                                                <img src="<?php echo base_url(); ?>images/appicon/<?php echo $item->app_icon; ?>" alt="Gujarati Dictionary">
                                            </div>                        	
                                            <div class="app_footer">
                                                <div class="app_name"><a href="<?php echo $item->app_link; ?>"><?php echo $item->app_name; ?></a></div>                                    
                                            </div>
                                        </div>
										</div>    <?php } } ?>
									
                    			</li>
                                                   
                    		</ul>
                    	</div>
                    </div>
            	</div>
        	</div>        
    	</div>