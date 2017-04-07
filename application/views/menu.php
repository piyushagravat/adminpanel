<div class="clearHeader"> 
                	<nav class="navbar navbar-default">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-menu">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="collapse navbar-collapse" id="navbar-menu">
                            <ul class="nav navbar-nav">
								<?php foreach($menu as $item) { ?>
								<li class=""><a href="<?php echo $item->link; ?>"><?php echo $item->name; ?></a></li>
								<?php  } ?>
							</ul>
                        </div>
                    </div>
                </nav>
            </div>
         </header>  