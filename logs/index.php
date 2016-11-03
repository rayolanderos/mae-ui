<?php 
$page_id = 2; 

require_once('../inc/header.php');
require_once('../inc/sidebar.php');
?>
	<div class="main-container">
		<div class="container-fluid">
			<section>
				<div class="page-header">
					<h1><?php echo $GLOBALS["pages"][$page_id]["title"]?></h1>
				</div>

				<table class="table table-striped table-condensed">
					<thead>
						<tr>
							<th colspan="5">
								<form class="form-inline">
									<label>Sort by:</label>
									<select>
										<option>Date</option>
										<option>Title</option>
										<option>Number</option>
									</select>
									<label>Order by:</label>
									<select>
										<option>Desc</option>
										<option>Asc</option>
									</select>
								</form>

							</th>
							<th colspan="2">
								<button class="btn btn-primary pull-right">Add new text entry <i class="fa fa-plus" aria-hidden="true"></i></button>
							</th>
						</tr>
						<tr>
							<th></th>
							<th>#</th>
							<th>Title</th>
							<th>Date</th>
							<th class="tc">Type</th>
							<th class="tc">Status</th>
							<th class="tc"></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td class="favorite"><i class="fa fa-star" aria-hidden="true"></i></td>
							<td>001</td>
							<td>My first log</td>
							<td>06:23 PM 2016-10-22</td>
							<td class="tc"><i class="fa fa-volume-up" aria-hidden="true"></i></td>
							<td class="tc"><span class="label label-success">Logged</span></td>
							<td class="tc">
								<a href="#" class="btn"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<td class="favorite"><i class="fa fa-star-o" aria-hidden="true"></i></td>
							<td>002</td>
							<td>Baby's second day</td>
							<td>02:45 AM 2016-10-24</td>
							<td class="tc"><i class="fa fa-pencil" aria-hidden="true"></i></td>
							<td class="tc"><span class="label label-success">Logged</span></td>
							<td class="tc">
								<a href="#" class="btn"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<td class="favorite"><i class="fa fa-star" aria-hidden="true"></i></td>
							<td>003</td>
							<td>Evening bath</td>
							<td>07:12 PM 2016-10-24</td>
							<td class="tc"><i class="fa fa-volume-up" aria-hidden="true"></i></td>
							<td class="tc"><span class="label label-success">Logged</span></td>
							<td class="tc">
								<a href="#" class="btn"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<td class="favorite"><i class="fa fa-star-o" aria-hidden="true"></i></td>
							<td>004</td>
							<td>Tuesday morning log</td>
							<td>09:15 AM 2016-10-25</td>
							<td class="tc"><i class="fa fa-volume-up" aria-hidden="true"></i></td>
							<td class="tc"><span class="label label-success">Logged</span></td>
							<td class="tc">
								<a href="#" class="btn"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<td class="favorite"><i class="fa fa-star-o" aria-hidden="true"></i></td>
							<td>005</td>
							<td>Tuesday lunchtime log</td>
							<td>12:34 PM 2016-10-25</td>
							<td class="tc"><i class="fa fa-volume-up" aria-hidden="true"></i></td>
							<td class="tc"><span class="label label-success">Logged</span></td>
							<td class="tc">
								<a href="#" class="btn"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
							</td>
						</tr>
						<tr>
							<td class="favorite"><i class="fa fa-star-o" aria-hidden="true"></i></td>
							<td>006</td>
							<td>Untitled</td>
							<td>09:08 PM 2016-10-25</td>
							<td class="tc"><i class="fa fa-volume-up" aria-hidden="true"></i></td>
							<td class="tc"><span class="label label-success">Logged</span></td>
							<td class="tc">
								<a href="#" class="btn"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="6">
								<div class="pagination">
									<ul>
										<li><a href="#">&laquo;</a></li>
										<li><a href="#">1</a></li>
										<li class="active"><a href="#">2</a></li>
										<li class="disabled"><a href="#">...</a></li>
										<li><a href="#">6</a></li>
										<li><a href="#">7</a></li>
										<li><a href="#">&raquo;</a></li>
									</ul>
								</div>
							</td>
						</tr>
					</tfoot>
				</table>
			</section>
		</div>
	</div>
</body>
</html>