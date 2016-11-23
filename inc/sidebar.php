<?php 

$page_list = $GLOBALS["pages"];

?>
	<aside class="sidebar">
		<ul class="nav nav-tabs nav-stacked">
			<?php 
			foreach ($page_list as $key => $page):  
				if($page["active"]) :?>
					<li class="<?php echo $page['id'] == $page_id? 'active' : ''; ?> page-<?php echo $page['slug'];?> page-id-<?php echo $page['id'];?>">
						<a href="<?php echo $page['url'];?>">
							<div>
								<div class="ico">
									<i class="fa <?php echo $page['icon'];?>" aria-hidden="true"></i>
								</div>
								<div class="title">
									<?php echo $page['title'];?>
								</div>
							</div>
							<div class="arrow">
								<div class="bubble-arrow-border"></div>
								<div class="bubble-arrow"></div>
							</div>
							
						</a>
					</li>
				<?php 
				endif;
			endforeach; ?>
	    </ul>
	</aside>
