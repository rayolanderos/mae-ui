<?php 
$page_id = 2; 

require_once('../inc/header.php');
require_once('../inc/sidebar.php');

$log_saved = false; 

if(isset($_REQUEST['entry']) ) {
	$entry = $_REQUEST['entry'];
	if($entry != ""){
		$result =  post_mae_api("journal", $entry);
		$log_saved = $result['success'];
	}

}


?>
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<?php if ($log_saved) { ?>
				<div class="alert alert-info">
					<button class="close" data-dismiss="alert">x</button>
					<strong>Success!</strong> Your entry has been saved.
				</div>
				<?php  } ?>
				
				<div class="page-header">
					<h1><?php echo $GLOBALS["pages"][$page_id]["title"]?></h1>
				</div>
				<form class="form" id="add-log-entry" method="POST" action="" style="display:none;">
					<label for="username" class="control-label">Add your entry below</label>
					<div class="controls">
						<div class="input-group" id="textarea-container">
							<textarea name="entry" placeholder="How was your day?" rows="10"></textarea>
						</div>
					</div>
					<button id="btn-cancel-entry" class="btn btn-warning pull-right">Nevermind</button>
					<button id="btn-send-entry" class="btn btn-success pull-right" type="submit">Done </button>
					<div class="clear"></div>
				</form>
				<table id="log-table" class="table table-striped table-condensed">
					<thead>
						<tr>
							<th colspan="2">
								

							</th>
							<th colspan="4">
								<button id="btn-add-entry" class="btn btn-primary pull-right">Add a new entry <i class="fa fa-plus" aria-hidden="true"></i></button>
							</th>
						</tr>
						<?php $logs =  get_mae_api();  ?>
						<tr>
							<th>#</th>
							<th>Date</th>
							<th class="tc">Source</th>
							<th class="tc">Type</th>
							<th> Content </th>
							<th class="tc"></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($logs as $key => $log) { 
							if($log->type != "test" ) { ?>
								<tr id="<?php echo $log->id;?>">
									<!-- <td class="favorite"><i class="fa fa-star" aria-hidden="true"></i></td> -->
									<td><a href=""><?php echo str_pad($key, 4, '0', STR_PAD_LEFT); ?></a></td>
									<td><?php echo format_date($log->date)?></td>
									<td class="tc"><i class="fa <?php echo get_journal_type_icon($log->source); ?>" aria-hidden="true"></i></td>
									<td class="tc" class="<?php echo $log->type;?>"><i class="fa <?php echo get_journal_type_icon($log->type);?>" aria-hidden="true"></i></td>
									<td><?php echo get_value_display($log->value, $log->type); ?>
									<td class="tc">
										<a href="javascript:void(0);" class="btn-remove btn" data="<?php echo $log->id;?>"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
									</td>
								</tr>
							<?php } 
						} ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="6">
								<!-- <div class="pagination">
									<ul>
										<li><a href="#">&laquo;</a></li>
										<li><a href="#">1</a></li>
										<li class="active"><a href="#">2</a></li>
										<li class="disabled"><a href="#">...</a></li>
										<li><a href="#">6</a></li>
										<li><a href="#">7</a></li>
										<li><a href="#">&raquo;</a></li>
									</ul>
								</div> -->
							</td>
						</tr>
					</tfoot>
				</table>
			</section>
		</div>
		<?php //var_dump($logs); ?>
	</div>
	<script type="text/javascript">
	$(function() {
	    $("#btn-add-entry").click(function() {
			$("#add-log-entry").slideDown();
		});

		$("#btn-cancel-entry").click(function() {
			$("#add-log-entry").slideUp();
		});

		$(".btn-remove").click(function(){
			var id = $(this).attr("data");
			$.ajax({
			    type: "POST",
			    url: '<?php echo $GLOBALS["root_url"];?>/inc/delete.php',
			    dataType: 'json',
			    data: {logId: id},
			    success: function (obj, textstatus) {
					if( !('error' in obj) ) {
					  $("#"+id).fadeOut( "slow", function() {
					    $("#"+id).remove();
					  });
					}
					else {
					  console.log(obj.error);
					}
				}
			});
		});
	});

	</script>
</body>

</html>