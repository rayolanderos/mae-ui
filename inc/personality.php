<?php
require_once('config.php'); 
require_once('functions.php'); 

if (isset($_GET['personality'])) : 
	$personality = $_GET['personality']; ?>
	
	<div class="panel panel-default ">
  		<div class="panel-heading">
  			<h3><?php echo get_personality_name($personality); ?> </h3> 
  			<h4><?php echo get_personality_meaning($personality); ?></h4>
  			<br/>
  		</div>
  	
  		<div class="panel-body">
    		<div class="well">
    			<h4></h4>
    			<p>
    				People who score <b>low</b> may have the following range of characteristics:
    				<br>
    				<ul>
	    				<?php 
	    				$descriptors = get_personality_descriptors($personality, "low"); 
	    				foreach ($descriptors as $key => $descriptor) {
	    					echo '<li><b>'.$key.': </b>'.$descriptor.'</li>';
	    				}
	    				?>
    				</ul>
    				<br>
    			</p>
    			<p>
    				People who score <b>high</b> may have the following range of characteristics:
    				<br>
    				<ul>
	    				<?php 
	    				$descriptors = get_personality_descriptors($personality, "high"); 
	    				foreach ($descriptors as $key => $descriptor) {
	    					echo '<li><b>'.$key.': </b>'.$descriptor.'</li>';
	    				}
	    				?>
    				</ul>
    				<br>
    			</p>
    		</div>
  		</div>
	</div>

<?php else: 

echo "Mood not recognized";
endif;

?>