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
        	<div class="row">
        	<div class="col-md-8">
             	<div class="head_tab wow bounceInUp" data-wow-delay="0.15s">
                	<h1>iOS Apps</h1>                     
                     <div class="sepretor"></div>
                </div>
				<?php $time = 0; foreach($ios as $item) { ?>
                <div class="col-md-3 col-sm-3 wow fadeInLeft" data-wow-delay="0.20s">
                    <div class="appbox">                 	
                        <div class="app_pic">
                            <img src="<?php echo base_url(); ?>images/appicon/<?php echo $item->app_icon; ?>" alt="Gujarati Dictionary" />
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
				<div class="fb-page" data-href="https://www.facebook.com/facebook" data-width="380" data-hide-cover="false" data-show-facepile="false" data-show-posts="false"></div>
				<div class="left_add">              
					<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
						<!-- Responsive Add block -->
						<ins class="adsbygoogle"
						style="display:block"
						data-ad-client="ca-pub-4542091423624465"
						data-ad-slot="8230587981"
						data-ad-format="rectangle"></ins>
						<script>
						(adsbygoogle = window.adsbygoogle || []).push({});
					</script>
                </div>
			</div>
		</div>
    </div>
	</div>