<?php
if ($input->post->assign_user) {
	$id = $input->post->id;
	$assign_user = $input->post->assign_user;

	$lead = $pages->get("id={$id}");
	$lead->of(false);
	$lead->assigned_to = $assign_user;
	$lead->save();
	$session->redirect($page->url);
}

 include(\ProcessWire\wire('files')->compile('partials/_sales_header.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); 
 include(\ProcessWire\wire('files')->compile('partials/_check_login.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); 
?>
<div class="uk-container uk-container-large" data-uk-height-viewport="expand: true">

	<?php if ($user->hasRole('superuser') || $user->hasRole('marketing')): ?>
	<div class="uk-margin">
		<ul class="uk-tab uk-text-bold">
			<li><a href="<?=$pages->get("id=25925")->url?>">Dashboard</a></li>
			<li><a href="<?=$pages->get("id=25925")->url?>personal-loan/">Personal Loan</a></li>
			<li><a href="<?=$pages->get("id=25925")->url?>credit-card/">Credit Card</a></li>
			<li><a href="<?=$pages->get("id=25925")->url?>nri/">NRI</a></li>
			<li class="uk-active"><a href="<?=$pages->get("id=25925")->url?>business-banking/">Business Banking</a></li>
			<li><a href="<?=$pages->get("id=25925")->url?>report/source-reports/">Source Reports</a></li>
			<?php if (!$user->hasRole('sales-executive')): ?>
				<li><a href="<?=$pages->get("id=25925")->url?>report/my-exports/">My Exports</a></li>
			<?php endif ?>
		</ul>
	</div>
	<?php endif ?>
	
	<div class="uk-panel">
		<h1 class="uk-h2 uk-margin-bottom uk-text-light">Business Banking</h1>
		<ul class="uk-tab uk-text-bold">
			<?php
				$subnav = array(
					array('title' => 'Request', 'url' => '' ),
					array('title' => 'Process', 'url' => 'process' ),
					array('title' => 'Reject', 'url' => 'reject' ),
					array('title' => 'Success', 'url' => 'success' ),
					array('title' => 'Follow up', 'url' => 'follow-up' )
				);
				for ($i=0; $i < count($subnav); $i++) { 
					if ($subnav[$i]['url'] === $input->urlSegment1) {
						$class = "class='uk-active'";
					}else{
						$class = "";
					}
				?>
				<li <?=$class?>><a href="<?=$page->url.$subnav[$i]['url']?>"><?=$subnav[$i]['title']?></a></li>
			<?php  } ?>
			<li><a href="<?=$pages->get("id=25925")->url?>report/">Campaign Report</a></li>
		</ul>

		<div class="uk-margin">
			<div class="uk-card uk-card-body uk-card-small uk-card-default">
				<div class="uk-flex uk-flex-middle uk-flex-between">
					<a href="#filtersForm" class="uk-display-block uk-width-expand" uk-toggle><h1 class="uk-h4 uk-text-blue uk-margin-remove">Filter Card Applications</h1></a>
					<a href="#filtersForm" class="uk-icon-link uk-margin-small-right" uk-icon="icon:chevron-down;ratio:1.5" uk-toggle></a>
				</div>
				<form action="./" method="get" id="filtersForm" class="uk-margin-top" hidden>
				<div class="uk-grid uk-child-width-1-4@m uk-child-width-1-3@s uk-child-width-1-2">
					<div class="uk-margin-small">
						<label>
							<div class="uk-margin-small-bottom">App Code</div>
							<input type="text" class="uk-input" tabindex="1" name="app_code" />
						</label>
					</div>

					<div class="uk-margin-small uk-margin-remove-top">
						<label>
							<div class="uk-margin-small-bottom">Enter from Date <span class="uk-text-small uk-text-muted">(applied after)</span></div>
							<input type="text" class="uk-input" tabindex="3" name="from_date" id="fromDate" />
						</label>
					</div>

					<div class="uk-margin-small uk-margin-remove-top">
						<label>
							<div class="uk-margin-small-bottom">Enter to Date <span class="uk-text-small uk-text-muted">(applied before)</span></div>
							<input type="text" class="uk-input" tabindex="4" name="to_date" id="toDate" />
						</label>
					</div>

					<div class="uk-margin-small">
						<label>
							<div class="uk-margin-small-bottom">Select Country of residence</div>
							<select name="cc" class="uk-select" tabindex="5">
								<option>All</option>
							</select>
						</label>
					</div>

					<div class="uk-margin-small uk-margin-remove-top">
						<label>
							<div class="uk-margin-small-bottom">City of opening account</div>
							<input type="text" class="uk-input" tabindex="2" name="City" />
						</label>
					</div>

					<div class="uk-margin-small">
						<label>
							<div class="uk-margin-small-bottom">PAN <span class="uk-text-small uk-text-muted">(or potion of)</span></div>
							<input type="text" class="uk-input" tabindex="6" name="pan" />
						</label>
					</div>

					<div class="uk-margin-small">
						<label>
							<div class="uk-margin-small-bottom">Firstname <span class="uk-text-small uk-text-muted">(or potion of)</span></div>
							<input type="text" class="uk-input" tabindex="7" name="firstname" />
						</label>
					</div>

					<div class="uk-margin-small">
						<label>
							<div class="uk-margin-small-bottom">Lastname <span class="uk-text-small uk-text-muted">(or potion of)</span></div>
							<input type="text" class="uk-input" tabindex="8" name="lastname" />
						</label>
					</div>

					<div class="uk-margin-small">
						<label>
							<div class="uk-margin-small-bottom">Select product</div>
							<select name="loan_status" class="uk-select" tabindex="9">
								<option>All</option>
							</select>
						</label>
					</div>

					<div class="uk-margin-small">
						<label>
							<div class="uk-margin-small-bottom">Mobile number</div>
							<input type="tel" class="uk-input" tabindex="10" name="mobile" />
						</label>
					</div>

					<div class="uk-margin-small">
						<label>
							<div class="uk-margin-small-bottom">Email ID <span class="uk-text-small uk-text-muted">(or potion of)</span></div>
							<input type="email" class="uk-input" tabindex="11" name="email" />
						</label>
					</div>

					<div class="uk-margin-small">
						<label>
							<div class="uk-margin-small-bottom">Select Lead Source</div>
							<select name="lead_source" class="uk-select" tabindex="12">
								<option>All</option>
							</select>
						</label>
					</div>

					<div class="uk-width-1-1 uk-text-center uk-margin">
						<input type="submit" class="uk-button uk-button-primary" value="Search" name="submit" />
						<?php if (!$user->hasRole('sales-executive')): ?>
							<input type="button" class="uk-button uk-button-secondary" value="Export" name="export" />	
						<?php endif ?>
					</div>
				</div>
				</form>
			</div>
		</div>

		<!-- Getting Leads -->
		<?php 
		switch ($input->urlSegment1) {
			case 'process':
				$count = $pages->find("template=lead_template,product=4,app_status=1")->count();
				$leads = $pages->find("template=lead_template,product=4,app_status=1,sort=-id,limit=10");
				break;
			case 'reject':
				$count = $pages->find("template=lead_template,product=4,app_status=2")->count();
				$leads = $pages->find("template=lead_template,product=4,app_status=2,sort=-id,limit=10");
				break;
			case 'success':
				$count = $pages->find("template=lead_template,product=4,app_status=3")->count();
				$leads = $pages->find("template=lead_template,product=4,app_status=3,sort=-id,limit=10");
				break;
			case 'follow-up':
				$count = $pages->find("template=lead_template,product=4,app_status=1,app_status_process=2")->count();
				$leads = $pages->find("template=lead_template,product=4,app_status=1,app_status_process=2,sort=-id,limit=10");
				break;
			default:
				$count = $pages->find("template=lead_template,product=4,app_status!=1|2|3")->count();
				$leads = $pages->find("template=lead_template,product=4,app_status!=1|2|3,sort=-id,limit=10");
				break;
		}
		$pagination = $leads->renderPager();
		?>
		<!-- End of getting leads -->
		<div class="list-wrap">
			<h4 class="uk-h5">Showing <?=count($leads)?> of <?=$count?></h4>
			<div class="uk-overflow-auto">
				<table class="uk-table uk-text-small uk-table-striped uk-table-hover uk-table-divider">
					<tr>
						<th style="width: 50px">App Code</th>
						<th style="width: 50px">Entry Date</th>
						<th style="width: 70px">Product Required</th>
						<th style="width: 70px">Customer name</th>
						<th style="width: 70px">Mobile/Email</th>
						<th style="width: 70px">City</th>
						<th style="width: 70px">Assigned To</th>
						<th style="width: 70px">Status</th>
						<th style="width: 50px">Last Updated</th>
						<th style="width: 50px"></th>
					</tr>
					<?php foreach ($leads as $l): ?>
					<tr>
						<td><?=$l->unique_id?></td>
						<td><?=date('d-m-y G:i',$l->created)?></td>
						<td><?=$l->product_of_interest?></td>
						<td><div><?=$l->fname." ".$l->lname?></div></td>
						<td>
							<div><?=$l->mobile?></div>
							<div><?=$l->email?></div>
						</td>
						<td><?=$l->city?></td>
						<td><?php
						if ($l->assigned_to) {
							echo "<div class='uk-margin-small-bottom'>".$l->assigned_to->title."</div>";
						}else{
							echo "<div class='uk-margin-small-bottom'>-NA-</div>";
						}
						
						if ($input->urlSegment1 != "success" && $input->urlSegment1 != "reject") {
						if ($l->assigned_to) { ?>
							<form action="<?=$page->url?>" method="post">
								<input type="hidden" name="id" value="<?=$l->id?>" />
								<select name="assign_user" class="uk-select uk-select-small" onchange="this.form.submit()">
									<option>Change User</option>
									<?php foreach ($users->find("id!=40") as $u): ?>
										<option value="<?=$u->id?>"><?=$u->title?></option>
									<?php endforeach ?>
								</select>
							</form>
						<?php }else{ ?>
							<form action="<?=$page->url?>" method="post">
								<input type="hidden" name="id" value="<?=$l->id?>" />
								<select name="assign_user" class="uk-select uk-select-small" onchange="this.form.submit()">
									<option>Assign User</option>
									<?php foreach ($users->find("id!=40") as $u): ?>
										<option value="<?=$u->id?>"><?=$u->title?></option>
									<?php endforeach ?>
								</select>
							</form>
						<?php } 
						}//not success or reject
						?></td>
						<td><?php
						if ($l->child("sort=-id")->app_status != "") {
							echo $l->child("sort=-id")->app_status->title;
						}else{
							echo "Fresh";
						}
						?></td>
						<td><?=date('d-m-y G:i',$l->modified);?></td>
						<td>
							<div uk-lightbox>
								<a href="<?=$page->url?>view/<?=$l->id?>?view=iframe&source=<?=$input->urlSegment1?>" title="View" class="uk-button uk-button-small uk-button-default" data-type="iframe"><span uk-icon="icon:search;ratio:0.8"></span></a>
							</div>
						</td>
					</tr>
					<?php endforeach ?>
				</table>
			</div><!-- overflow-auto -->

			<div class="uk-margin-medium uk-flex uk-flex-center">
				<?=$pagination?>
			</div>
		</div><!-- list-wrap -->
	</div><!-- uk-section -->
</div><!-- uk-container -->
<?php include(\ProcessWire\wire('files')->compile('partials/_sales_footer.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); ?>