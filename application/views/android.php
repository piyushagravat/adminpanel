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
	<div class="container content">
    	<div class="apps_wrapp">
        	<div class="row" style="margin-bottom:25px;">
				<div class="col-md-8">
					<div class="head_tab wow bounceInUp" data-wow-delay="0.15s">
						<h1>Android Apps</h1>                     
						 <div class="sepretor"></div>
					</div>
				
					<?php $time = 0; foreach($android as $item) { ?>
						<div class="col-md-3 col-sm-3 wow fadeInLeft" data-wow-delay="<?php echo $time + 0.10;?>s">
						
							<div class="appbox">                 	
								<div class="app_pic">
									<img src="<?php echo base_url(); ?>images/appicon/<?php echo $item->app_icon; ?> " alt="Gujarati Dictionary" />
								</div>
								<div class="app_name"><a href="#"><?php echo $item->app_name; ?></a></div>
								<div class="app_compny"><a href="#">By Gujaratilexicon</a></div> 
								<div class="more"><a href="<?php echo base_url(); ?>pages/appdetail/<?php echo $item->mid;?>">More</a></div>                  
							</div>  
						
						</div>
					<?php $time++; } ?>
				</div>
				 <!---Fetured Apps Start---> 
				<div class="col-md-4 wow fadeInRight" data-wow-delay="0.100s">
					<div class="head_tab wow bounceInUp" data-wow-delay="0.15s">
						<h1>Featured App</h1>
						<div class="sepretor"></div>                     
					</div>
					<div class="col-md-12 col-sm-12">
						<div class="fetured_app">
							<img src="<?php echo base_url(); ?>images/fetured_app.jpg"/>
							 <p>
							  Lorem ipsum dolor sit amet, consectetur adipiscing elit.
							  Suspendisse massa arcu, dignissim a ullamcorper quis,
							  varius tristique dolor.
							</p>
						</div> 
						<div class="col-md-4 col-lg-12 plattform">
							<h2>Available On</h2>
							<span><a href="#"><img src="<?php echo base_url(); ?>images/windows.png" width="30" height="30" alt="Andorid"></a></span>
							<span><a href="#"><img src="<?php echo base_url(); ?>images/iphone.png" width="30" height="30" alt="Andorid"></a></span>
							<span><a href="#"><img src="<?php echo base_url(); ?>images/android.png" width="30" height="30" alt="Andorid"></a></span>
						</div>
					</div>
				</div>
			</div>
    </div>
	</div>