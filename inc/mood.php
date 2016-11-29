<?php
require_once('config.php'); 
require_once('functions.php'); 

if (isset($_GET['mood'])) : 
	$mood = $_GET['mood']; ?>
	
	<div class="panel panel-default ">
  		<div class="panel-heading">
  			<h3><img class="mood-icon" src="<?php echo $GLOBALS['root_url'];?>/img/<?php echo $mood;?>.png"/> <?php echo get_mood_name($mood); ?> </h3> 
  			<br/>
  		</div>
  	
  		<div class="panel-body">
    		<div class="well">
    			<p>
    				<b>LOW score: </b><?php echo get_mood_facet ($mood, "low"); ?>
    				<br>
    				<?php echo get_mood_descriptor($mood, "low"); ?>
    				<br>
    			</p>
    			<p>
    				<b>HIGH score: </b><?php echo get_mood_facet ($mood, "high"); ?>
    				<br>
    				<?php echo get_mood_descriptor($mood, "high"); ?>
    				<br>
    			</p>
    		</div>
  		</div>
	</div>

<?php else: 

echo "Mood not recognized";
endif;

?>