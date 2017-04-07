 <div class="clearfix"></div>        
    <!---Footer Start---> 
    <footer>
     
    </footer>	
    	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-2.1.4.min.js"></script>
		
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.bxslider.min.js"></script>       		
        <script type="text/javascript">	
            $(document).ready(function() {            
                $('#slider .bxslider').bxSlider({ mode: 'horizontal', auto:false, controls:true,});
                 $('#similar_app .bxslider').bxSlider({  mode: 'horizontal', auto:false });
                $('#photoslide .bxslider').bxSlider({ mode:'horizontal',minSlides: 2,maxSlides: 4, slideMargin: 10,infiniteLoop: false});              
				 
			});
        </script>   
        <style type="text/css">
		#photoslide .bx-wrapper .bx-viewport .bxslider li{width:160px!important;margin:0px 20px!important;}
			.fixed {
					position: fixed;
					top:0; left:0;
					width: 100%; z-index:9;-webkit-transition: height 0.3s;
					-moz-transition: height 0.3s;
					-ms-transition: height 0.3s;
					-o-transition: height 0.3s;
				transition: height 0.3s; }
		</style>
        <script type="text/javascript">
			/*$(function() {
			//caches a jQuery object containing the header element
			var header = $(".clearHeader");
			 header.removeClass("darkHeader").addClass('clearHeader');
			 $(".darkHeader").css("display", "none");
			 var lastScrollTop = 0;
			$(window).scroll(function() {
				var scrltop = $(window).scrollTop();
				
				var st = $(this).scrollTop();
			   if (st > lastScrollTop){
					header.removeClass('clearHeader').addClass("darkHeader");
					$(".darkHeader").css("display", "block");
					$(".clearHeader").css("display", "none");
			   } 
			   else if (st < lastScrollTop){
				   header.removeClass('darkHeader').addClass("clearHeader");
					$(".darkHeader").css("display", "none");					  
			   }
			   lastScrollTop = st;
				
			});
		});*/
		var offset = $( ".clearHeader" ).offset();
var sticky = document.getElementById("clearHeader")

$(window).scroll(function() {
    
    if ( $('body').scrollTop() > offset.top){
        $('.clearHeader').addClass('fixed');
    } else {
         $('.clearHeader').removeClass('fixed');
    }
    

});
	</script>
<script src="<?php echo base_url(); ?>js/wow.min.js"></script>   
<script type="text/javascript"> new WOW().init(); </script> 
<script type="text/javascript">			
		function validation() {
				var name = document.contact.txtname;
				var email = document.contact.txtemail;
				var phone = document.forms["contact"]["txtphone"].value;
				
				var message = document.contact.txtmessage;

				if (name.value == "")
				{
					window.alert("Please enter your  Name.");
					name.focus();
					return false;
				}
				
				if (email.value == "")
				{
					window.alert("Please enter a valid e-mail address.");
					email.focus();
					return false;
				}
				if (email.value.indexOf("@", 0) < 0)
				{
					window.alert("Please enter a valid e-mail address.");
					email.focus();
					return false;
				}
				if (email.value.indexOf(".", 0) < 0)
				{
					window.alert("Please enter a valid e-mail address.");
					email.focus();
					return false;
				}
					
				if(!/^[0-9]+$/.test(phone)){
					alert("Please enter your Contact number.")
					return false;
				}
				
				if (message.value == "")
				{
					window.alert("Please enter Message.");
					message.focus();
					return false;
				}
				return true;
			}
			
</script> 



<script type="text/javascript">
jQuery(function () {
   jQuery("#selapp").change(function () {
        location.href = jQuery(this).val();
    })
})
</script>

</body>
</html>