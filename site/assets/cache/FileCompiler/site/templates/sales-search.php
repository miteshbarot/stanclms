<?php include(\ProcessWire\wire('files')->compile('partials/_sales_header.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); ?>
<div class="uk-container uk-container-large" data-uk-height-viewport="expand: true">
	<div class="uk-panel">
		<h1 class="uk-h2 uk-margin-bottom uk-text-light">Search</h1>
		<!-- Getting Leads -->
		<?php 
		if ($input->get->c != "" && $input->get->c != "Category") {
			$c = $input->get->c;
		}else{
			$c = "unique_id|mobile|email|fname|lname";
		}

		$count = $pages->find("template=lead_template|aggregator_lead_template,{$c}%={$input->get->q}")->count();
		$leads = $pages->find("template=lead_template|aggregator_lead_template,{$c}%={$input->get->q},sort=-id,limit=10");
		$pagination = $leads->renderPager();
		?>
		<!-- End of getting leads -->
		<div class="list-wrap">
			<?php if ($count > 0): ?>
			<h4 class="uk-h5">Showing <?=count($leads)?> of <?=$count?></h4>
			<div class="uk-overflow-auto">
				<table class="uk-table uk-text-small uk-table-striped uk-table-hover uk-table-divider">
					<tr>
						<th class="uk-text-center" style="width: 100px">App Code</th>
						<th>Entry Date</th>
						<th>Product Type</th>
						<th>Customer name</th>
						<th>Mobile/Email</th>
						<th>Status</th>
						<th>Last Updated</th>
						<th></th>
					</tr>
					<?php foreach ($leads as $l): ?>
					<tr>
						<td><?=$l->unique_id?></td>
						<td><?=date('d-m-y h:i A',$l->created)?></td>
						<td><?=$l->product->title?></td>
						<td><div><?=$l->fname." ".$l->lname?></div></td>
						<td>
							<div><?=$l->mobile?></div>
							<div><?=$l->email?></div>
						</td>
						<td>-NA-</td>
						<td><?=date('d-m-y h:i A',$l->modified);?></td>
						<td><a href="#" title="View" class="uk-button uk-button-small uk-button-default"><span uk-icon="icon:search;ratio:0.8"></span></a></td>
					</tr>
					<?php endforeach ?>
				</table>
			</div><!-- overflow-auto -->

			<div class="uk-margin-medium uk-flex-center">
				<?=$pagination?>
			</div>

			<?php else: ?>
				<?php 
				switch ($input->get->c) {
					case 'fname':
						$cat = "First name";
						break;
					case 'lname':
						$cat = "Last name";
						break;
					case 'unique_id':
						$cat = "App code";
						break;
					case 'mobile':
						$cat = "Mobile number";
						break;
					case 'email':
						$cat = "Email address";
						break;
				}
				?>
				<h1 class="uk-h3 uk-text-muted uk-text-italic">No results found for query '<?=$input->get->q?>' in category '<?=$cat?>'.</h1>
			<?php endif ?>
		</div><!-- list-wrap -->
	</div><!-- uk-section -->
</div><!-- uk-container -->
<?php include(\ProcessWire\wire('files')->compile('partials/_sales_footer.php',array('includes'=>true,'namespace'=>true,'modules'=>true,'skipIfNamespace'=>true))); ?>