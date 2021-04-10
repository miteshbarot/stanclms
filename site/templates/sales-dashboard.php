<?php 
include 'partials/_sales_header.php'; 
include 'partials/_check_login.php'; 
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<!-- <script src="<?=$tpl?>assets/js/chartScripts.js"></script> -->

<div class="uk-container uk-container-large" data-uk-height-viewport="expand: true">
	<div class="uk-margin">
		<ul class="uk-tab uk-text-bold">
			<li class="uk-active"><a href="<?=$pages->get("id=25925")->url?>">Dashboard</a></li>
			<li><a href="<?=$pages->get("id=25925")->url?>personal-loan/">Personal Loan</a></li>
			<li><a href="<?=$pages->get("id=25925")->url?>credit-card/">Credit Card</a></li>
			<li><a href="<?=$pages->get("id=25925")->url?>nri/">NRI</a></li>
			<li><a href="<?=$pages->get("id=25925")->url?>business-banking/">Business Banking</a></li>
			<li><a href="<?=$pages->get("id=25925")->url?>report/source-reports/">Source Reports</a></li>
			<?php if (!$user->hasRole('sales-executive')): ?>
				<li><a href="<?=$pages->get("id=25925")->url?>report/my-exports/">My Exports</a></li>
			<?php endif ?>
		</ul>
	</div>
	<div class="uk-grid">
		<div class="uk-width-3-5">
			<h1 class="uk-h2 uk-margin-remove uk-text-light">Sales Dashboard</h1>	
		</div>
		<div class="uk-width-2-5 uk-text-right uk-text-small uk-margin-bottom">
			
		</div>
	</div>
	<div class="uk-card uk-card-muted uk-padding uk-margin-top" style="box-shadow: 0 2px 6px -1px rgba(0,0,0,0.2)">
		<?php 
			$dashLinks = array('' => 'Home',
						'channel-performance' => 'Channel<br/>Performance',
						'campaign-performance' => 'Campaign<br/>Performance',
						'rejects' => 'Rejects',
						'submits' => 'Submits',
						'call-center' => 'Call Center',
						);
		 ?>
	    <ul class="uk-tab uk-text-bold uk-child-width-expand uk-flex-bottom">
	    	<?php  foreach ($dashLinks as $key => $value):
	    		if ($input->urlSegment1 == $key) {
	    			$cls = 'uk-active';
	    		}else{
	    			$cls = '';
	    		}
	    	?>
	    		<li class="<?=$cls?>"><a href="<?=$page->url.$key?>"><?=$value?></a></li>	
	    	<?php endforeach ?>
	    </ul>

	    <div class="uk-margin uk-flex uk-flex-right">
	    	<div class="uk-inline uk-margin-small-right">
		        <button class="uk-button uk-button-secondary uk-button-small" type="button">Select Date Range <span uk-icon="icon:triangle-down"></span></button>
		        
		        <div class="filter-drop uk-box-shadow-large uk-text-small" uk-drop="mode: click;pos: bottom-right; offset: 0">
		        	<div class="uk-margin-small">
		        		<select name="date_range" id="date_range" class="uk-select">
		        			<option>Past Week</option>
		        			<option>Past Month</option>
		        			<option>Past Year</option>
		        			<option>Custom</option>
		        		</select>
		        	</div>
		        	<div class="uk-margin-small uk-grid uk-grid-small">
		        		<div class="uk-width-1-2">
		        			<input type="text" class="uk-input datePicker" id="fromDate" name="from" placeholder="From" />
		        		</div>
		        		<div class="uk-width-1-2">
		        			<input type="text" class="uk-input datePicker" id="toDate" name="to" placeholder="To" />
		        		</div>
		        	</div>
		        	<hr class="uk-hr"/>
		        	<div class="uk-margin-small uk-grid uk-grid-small uk-flex-middle">
		        		<div class="uk-width-1-2">
		        			<label class="uk-margin-remove"><input type="checkbox" class="uk-checkbox" value="compare" uk-toggle="target: #date_range2; cls: uk-disabled"/>&nbsp;Compare to</label>
		        		</div>
		        		<div class="uk-width-1-2">
		        			<select name="date_range2" id="date_range2" class="uk-select uk-disabled">
			        			<option>Past Week</option>
			        			<option>Past Month</option>
			        			<option>Past Year</option>
			        			<option>Custom</option>
			        		</select>
		        		</div>
		        	</div>
		        	<div class="uk-margin-small uk-grid uk-grid-small">
		        		<div class="uk-width-1-2">
		        			<input type="text" class="uk-input datePicker" id="fromDate" name="from" placeholder="From" />
		        		</div>
		        		<div class="uk-width-1-2">
		        			<input type="text" class="uk-input datePicker" id="toDate" name="to" placeholder="To" />
		        		</div>
		        	</div>
		        	<!-- <hr class="uk-hr"/> -->
					<div class="uk-margin-top-small uk-button-group uk-flex uk-flex-center">
		        		<button class="uk-button uk-button-small uk-button-primary uk-margin-small-right">Apply</button>
		        		<button class="uk-button uk-button-text uk-button-small" uk-toggle="target:.filter-drop">Cancel</button>
		        	</div>
		        </div>
			</div>
	    	<?php if (!$user->hasRole('sales-executive')): ?>
	    		<div><a href="#" class="uk-button uk-button-small uk-button-default uk-margin-left"><span uk-icon="icon:download;ratio:1.0"></span> Export</a></div>
	    	<?php endif ?>
	    </div>

	    <!-- <hr class="uk-hr" />
		<div class="uk-grid uk-grid-divider uk-grid-medium uk-child-width-1-2 uk-child-width-1-4@l uk-child-width-1-5@xl" data-uk-grid>
			<div>
				<span class="uk-text-small"><span data-uk-icon="icon:users" class="uk-margin-small-right uk-text-primary"></span>Total Leads</span>
				<h1 class="uk-heading-primary uk-margin-remove uk-text-primary">10,624</h1>
				<div class="uk-text-small">
					<span class="uk-text-success" data-uk-icon="icon: triangle-up"> 7%</span> more than last week.
				</div>
			</div>
			<div>
				<span class="uk-text-small"><span data-uk-icon="icon:users" class="uk-margin-small-right uk-text-primary"></span>Direct Leads</span>
				<h1 class="uk-heading-primary uk-margin-remove  uk-text-primary">2,134</h1>
				<div class="uk-text-small">
					<span class="uk-text-success" data-uk-icon="icon: triangle-up">15%</span> more than last week.
				</div>			
			</div>
			<div>
				<span class="uk-text-small"><span data-uk-icon="icon:social" class="uk-margin-small-right uk-text-primary"></span>Social Media</span>
				<h1 class="uk-heading-primary uk-margin-remove uk-text-primary">8,490</h1>
				<div class="uk-text-small">
					<span class="uk-text-warning" data-uk-icon="icon: triangle-down">-15%</span> less than last week.
				</div>
			</div>
			<div>
				<span class="uk-text-small"><span data-uk-icon="icon:clock" class="uk-margin-small-right uk-text-primary"></span>Contacted Leads</span>
				<h1 class="uk-heading-primary uk-margin-remove uk-text-primary">7,489<small class="uk-text-small"></small></h1>
				<div class="uk-text-small">
					<span class="uk-text-success" data-uk-icon="icon: triangle-up"> 19%</span> more than last week.
				</div>
			</div>
			<div class="uk-visible@xl">
				<span class="uk-text-small"><span data-uk-icon="icon:check" class="uk-margin-small-right uk-text-primary"></span>Closed Applications</span>
				<h1 class="uk-heading-primary uk-margin-remove uk-text-primary">6,543</h1>
				<div class="uk-text-small">
					<span class="uk-text-danger" data-uk-icon="icon: triangle-down"> -23%</span> less than last week.
				</div>
			</div>
		</div>
		<hr class="uk-hr" /> -->

		<?php if ($input->urlSegment1 == ''): ?>
			<!-- Home -->
			<div class="uk-grid uk-grid-medium uk-grid-match" uk-grid>
				
				<!-- panel -->
				<div class="uk-width-1-3@l">
					<div class="uk-card uk-card-default uk-card-small uk-card-hover">
						<div class="uk-card-header">
							<div class="uk-grid uk-grid-small">
								<div class="uk-width-1-1 uk-flex uk-flex-between uk-flex-middle">
									<h4 class="uk-label">Total Leads</h4>
									<a href="#" class="uk-icon-button"><span uk-icon="icon:download;ratio:1.0"></span></a>
								</div>
							</div>
						</div>
						<div class="uk-card-body">
							<table class="uk-table uk-table-divider uk-text-center">
									<tr>
										<td>Today</td>
										<td>(MTD)</td>
										<td>(YTD)</td>
									</tr>
									<tr>
										<td class="uk-h5 uk-text-light">2,431</td>
										<td class="uk-h5 uk-text-light">55,780</td>
										<td class="uk-h5 uk-text-light">6,69,387</td>
									</tr>
								</table>
							<div class="chart-container">
								<canvas id="chart1"></canvas>
							</div>
						</div>
					</div>
				</div>
				<!-- /panel -->
				<!-- panel -->
				<div class="uk-width-1-3@l">
					<div class="uk-card uk-card-default uk-card-small uk-card-hover">
						<div class="uk-card-header">
							<div class="uk-grid uk-grid-small">
								<div class="uk-width-1-1 uk-flex uk-flex-between uk-flex-middle">
									<h4 class="uk-label">Visits vs Leads</h4>
									<a href="#" class="uk-icon-button"><span uk-icon="icon:download;ratio:1.0"></span></a>
								</div>
							</div>
						</div>
						<div class="uk-card-body">
							<table class="uk-table uk-table-divider uk-text-center">
								<tr>
									<td>Leads</td>
									<td>Visits</td>
									<td>%</td>
								</tr>
								<tr>
									<td class="uk-h5 uk-text-light">2,431</td>
									<td class="uk-h5 uk-text-light">24,324</td>
									<td class="uk-h5 uk-text-light">9.99%</td>
								</tr>
							</table>
							<div class="chart-container">
								<canvas id="chart2"></canvas>
							</div>
						</div>
					</div>
				</div>
				<!-- /panel -->
				<!-- panel -->
				<div class="uk-width-1-3@l">
					<div class="uk-card uk-card-default uk-card-small uk-card-hover">
						<div class="uk-card-header">
							<div class="uk-grid uk-grid-small">
								<div class="uk-width-1-1 uk-flex uk-flex-between uk-flex-middle">
									<h4 class="uk-label">Submits (Top 5 Cities)</h4>
									<a href="#" class="uk-icon-button"><span uk-icon="icon:download;ratio:1.0"></span></a>
								</div>
							</div>
						</div>
						<div class="uk-card-body">
							<div class="overflow-card" hidden>
								<table class="uk-table uk-table-divider uk-text-center uk-text-small">
									<tr>
										<td>City</td>
										<td>Leads</td>
										<td>Closure</td>
									</tr>
									<tr>
										<td>Mumbai</td>
										<td>3,478</td>
										<td>1,887</td>
									</tr>
									<tr>
										<td>Delhi</td>
										<td>4,267</td>
										<td>1,271</td>
									</tr>
									<tr>
										<td>Hyderabad</td>
										<td>3,621</td>
										<td>1,148</td>
									</tr>
									<tr>
										<td>Bangalore</td>
										<td>4,732</td>
										<td>2,293</td>
									</tr>
									<tr>
										<td>Pune</td>
										<td>2,908</td>
										<td>2,127</td>
									</tr>
								</table>
							</div>
							<div style="height: 100px"></div>
							<div class="chart-container">
								<canvas id="chart3"></canvas>
							</div>
						</div>
					</div>
				</div>
				<!-- /panel -->

				<!-- panel -->
				<div class="uk-width-1-1 uk-width-1-3@l uk-width-1-1@xl">
					<div class="uk-card uk-card-default uk-card-small uk-card-hover">
						<div class="uk-card-header">
							<div class="uk-grid uk-grid-small uk-flex-between">
								<div class="uk-width-auto"><h4>Campaign Performance</h4></div>
								<div class="uk-width-auto">
									<div class="uk-button-group">
									    <button class="uk-button uk-button-small uk-button-primary uk-margin-small-right">MTD</button>
									    <button class="uk-button uk-button-small uk-button-default">YTD</button>
									</div>
								</div>
							</div>
						</div>
						<div class="uk-card-body">
							<table class="uk-table uk-table-divider uk-text-center uk-text-small">
								<tr>
									<td>Campaigns</td>
									<td>Visits</td>
									<td>Leads</td>
									<td>Reject Leads</td>
									<td>Submit %</td>
									<td>Submits	Apps%</td>
									<td>Completed Apps</td>
									<td>ATA</td>
									<td>Approved AIP</td>
									<td>AIP post junk</td>
									<td>Cards</td>
									<td>Cost of AIP</td>
									<td>Cards to Net Approved</td>
									<td>Cards to Apps</td>
									<td>Spends</td>
									<td>CoA</td>
								</tr>
								<tr>
									<td>Google Search</td>
									<td>25,000</td>
									<td>2500</td>
									<td>750</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Facebook Leads</td>
									<td>30000</td>
									<td>3000</td>
									<td>900</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Facebook WC</td>
									<td>31500</td>
									<td>3150</td>
									<td>945</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Affiliates</td>
									<td>1630</td>
									<td>163</td>
									<td>49</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Organic</td>
									<td>20326</td>
									<td>2033</td>
									<td>610</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>ETB campaigns</td>
									<td>4165</td>
									<td>417</td>
									<td>125</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Email</td>
									<td>583</td>
									<td>58</td>
									<td>17</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>SMS</td>
									<td>506</td>
									<td>51</td>
									<td>15</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Total</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<!-- /panel -->
				<!-- panel -->
				<div class="uk-width-1-1 uk-width-1-3@l uk-width-1-1@xl">
					<div class="uk-card uk-card-default uk-card-small uk-card-hover">
						<div class="uk-card-header">
							<div class="uk-grid uk-grid-small uk-flex-between">
								<div class="uk-width-auto"><h4>Channel Performance</h4></div>
								<div class="uk-width-auto">
									<div class="uk-button-group">
									    <button class="uk-button uk-button-small uk-button-primary uk-margin-small-right">MTD</button>
									    <button class="uk-button uk-button-small uk-button-default">YTD</button>
									</div>
								</div>
							</div>
						</div>
						<div class="uk-card-body">
							<table class="uk-table uk-table-divider uk-text-center uk-text-small">
								<tr>
									<td>Channels</td>
									<td>Visits</td>
									<td>Leads</td>
									<td>Reject Leads</td>
									<td>Submit %</td>
									<td>Submits	Apps%</td>
									<td>Completed Apps</td>
									<td>ATA</td>
									<td>Approved AIP</td>
									<td>AIP post junk</td>
									<td>Cards</td>
									<td>Cost of AIP</td>
									<td>Cards to Net Approved</td>
									<td>Cards to Apps</td>
									<td>Spends</td>
									<td>CoA</td>
								</tr>
								<tr>
									<td>Paid</td>
									<td>25,000</td>
									<td>2500</td>
									<td>750</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Organic</td>
									<td>30000</td>
									<td>3000</td>
									<td>900</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Internal</td>
									<td>31500</td>
									<td>3150</td>
									<td>945</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Total</td>
									<td>1630</td>
									<td>163</td>
									<td>49</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				<!-- /panel -->
			</div>

			<script type="text/javascript">

				// Chart 1
				// ========================================================================
				var char1El = document.getElementById('chart1');

				new Chart(char1El, {
				  type: 'bar',
				  data: {
				    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'],
				    datasets: [{
				      data: [1200, 1090, 1450, 1780, 2110, 2040, 2000, 3200, 1800, 3450, 2300, 2200],
				      label: "YTD",
				      borderColor: "#3af",
				      fill: false
				    }]
				  },
				  options: {
				    maintainAspectRatio: false,
				    responsiveAnimationDuration: 500,
				    animation: {
				      duration: 2000
				    },
				    title: {
				      display: false
				    }
				  }
				});

				// Chart 2
				// ========================================================================
				var char2El = document.getElementById('chart2');

				new Chart(char2El, {
				  type: 'line',
				  data: {
				    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'],
				    datasets: [{
				      data: [120, 109, 145, 178, 211, 204, 200, 320, 180, 345, 230, 220],
				      label: "Leads",
				      borderColor: "#3af",
				      fill: false
				    }, {
				      data: [900, 1200, 1450, 1881, 2352, 2004, 2000, 3200, 1800, 3450, 2300, 2200],
				      label: "Visits",
				      borderColor: "#f90",
				      fill: false
				    }]
				  },
				  options: {
				    maintainAspectRatio: false,
				    responsiveAnimationDuration: 500,
				    animation: {
				      duration: 2000
				    },
				    title: {
				      display: false,
				      text: 'Visits vs Leads'
				    }
				  }
				});


				// Chart 3
				// ========================================================================
				var char3El = document.getElementById('chart3');
				new Chart(char3El, {
				  type: 'bar',
				  data: {
				    labels: ["Mumbai", "Delhi", "Hyderabad", "Bangalore", "Pune"],
				    datasets: [{
				      label: "Leads (this month)",
				      backgroundColor: ["#39f", "#895df6", "#3cba9f", "#e8c3b9", "#c45850"],
				      data: [3478, 4267, 3621, 4732, 2908]
				    }]
				  },
				  
				  options: {
				    maintainAspectRatio: false,
				    responsiveAnimationDuration: 500,
				    legend: {
				      display: false
				    },
				    animation: {
				      duration: 2000
				    },
				    title: {
				      display: false,
				      text: 'Leads in current month'
				    },
				    scales: {
				        yAxes: [{
				            ticks: {
				                beginAtZero: true
				            }
				        }]
				    }
				  }
				});

				</script>
		<?php elseif ($input->urlSegment1 == 'channel-performance'): ?>
			<!-- Channel Performance -->
			<div class="uk-grid uk-grid-medium" uk-grid>
				<div class="uk-width-1-1 uk-width-1-3@l uk-width-1-1@xl">
					<div class="uk-card uk-card-default uk-card-small uk-card-hover">
						<div class="uk-card-header">
							<div class="uk-flex uk-flex-between uk-flex-middle uk-flex-between">
								<h4 class="uk-label uk-margin-remove-bottom">Channel Performance</h4>
								<div class="uk-button-group">
								    <button class="uk-button uk-button-small uk-button-primary uk-margin-small-right">MTD</button>
								    <button class="uk-button uk-button-small uk-button-default uk-margin-small-right">YTD</button>
								    <a href="#" class="uk-icon-button"><span uk-icon="icon:download;ratio:1.0"></span></a>
								</div>
							</div>
						</div>
						<div class="uk-card-body">
							<div class="chart-container">
								<canvas id="chart4"></canvas>
							</div>
							<table class="uk-table uk-table-divider uk-margin-large-top uk-text-center uk-text-small">
								<tr>
									<td>Channels</td>
									<td>Visits</td>
									<td>Leads</td>
									<td>Reject Leads</td>
									<td>Submit %</td>
									<td>Submits	Apps%</td>
									<td>Completed Apps</td>
									<td>ATA</td>
									<td>Approved AIP</td>
									<td>AIP post junk</td>
									<td>Cards</td>
									<td>Cost of AIP</td>
									<td>Cards to Net Approved</td>
									<td>Cards to Apps</td>
									<!-- <td>Spends</td> -->
									<td>COA</td>
								</tr>
								<tr>
									<td>Paid</td>
									<td>25,000</td>
									<td>2500</td>
									<td>750</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<!-- <td></td> -->
								</tr>
								<tr>
									<td>Organic</td>
									<td>30000</td>
									<td>3000</td>
									<td>900</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<!-- <td></td> -->
								</tr>
								<tr>
									<td>Internal</td>
									<td>31500</td>
									<td>3150</td>
									<td>945</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<!-- <td></td> -->
								</tr>
								<tr>
									<td>Total</td>
									<td>1630</td>
									<td>163</td>
									<td>49</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<!-- <td></td> -->
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>

			<script type="text/javascript">
				// Chart 4
				// ========================================================================

				var char4El = document.getElementById('chart4');

				new Chart(char4El, {
				  type: 'line',
				  data: {
				    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'],
				    datasets: [{
				      data: [120, 109, 145, 178, 211, 204, 200, 320, 180, 345, 230, 220],
				      label: "Paid",
				      borderColor: "#990000",
				      fill: false
				    }, {
				      data: [900, 1200, 1450, 1881, 2352, 2004, 2000, 3200, 1800, 3450, 2300, 2200],
				      label: "Organic",
				      borderColor: "#3498db",
				      fill: false
				    }, {
				      data: [450, 600, 730, 990, 1130, 1000, 1000, 1600, 900, 1700, 1350, 1100],
				      label: "Internal",
				      borderColor: "#038737",
				      fill: false
				    }]
				  },
				  options: {
				    maintainAspectRatio: false,
				    responsiveAnimationDuration: 500,
				    animation: {
				      duration: 2000
				    },
				    title: {
				      display: false,
				      text: 'Visits vs Leads'
				    }
				  }
				});

				</script>


		<?php elseif ($input->urlSegment1 == 'campaign-performance'): ?>
			<!-- Campaign Performance -->
			<div class="uk-grid uk-grid-medium" uk-grid>
				<div class="uk-width-1-1 uk-width-1-3@l uk-width-1-1@xl">
					<div class="uk-card uk-card-default uk-card-small uk-card-hover">
						<div class="uk-card-header">
							<div class="uk-flex uk-flex-between uk-flex-middle uk-flex-between">
								<h4 class="uk-label uk-margin-remove-bottom">Campaign Performance</h4>
								<div class="uk-button-group">
								    <button class="uk-button uk-button-small uk-button-primary uk-margin-small-right">MTD</button>
								    <button class="uk-button uk-button-small uk-button-default uk-margin-small-right">YTD</button>
								    <a href="#" class="uk-icon-button"><span uk-icon="icon:download;ratio:1.0"></span></a>
								</div>
							</div>
						</div>
						<div class="uk-card-body">
							<div class="chart-container">
								<canvas id="chart5"></canvas>
							</div>
							<table class="uk-table uk-table-divider uk-margin-large-top uk-text-center uk-text-small">
								<tr>
									<td>Campaigns</td>
									<td>Visits</td>
									<td>Leads</td>
									<td>Reject Leads</td>
									<td>Submit %</td>
									<td>Submits	Apps%</td>
									<td>Completed Apps</td>
									<td>ATA</td>
									<td>Approved AIP</td>
									<td>AIP post junk</td>
									<td>Cards</td>
									<td>Cost of AIP</td>
									<td>Cards to Net Approved</td>
									<td>Cards to Apps</td>
									<td>COA</td>
								</tr>
								<tr>
									<td>Google Search</td>
									<td>25,000</td>
									<td>2500</td>
									<td>750</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Facebook Leads</td>
									<td>30000</td>
									<td>3000</td>
									<td>900</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Facebook WC</td>
									<td>31500</td>
									<td>3150</td>
									<td>945</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Affiliates</td>
									<td>1630</td>
									<td>163</td>
									<td>49</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Organic</td>
									<td>20326</td>
									<td>2033</td>
									<td>610</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>ETB campaigns</td>
									<td>4165</td>
									<td>417</td>
									<td>125</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Email</td>
									<td>583</td>
									<td>58</td>
									<td>17</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>SMS</td>
									<td>506</td>
									<td>51</td>
									<td>15</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
								<tr>
									<td>Total</td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>

			<script type="text/javascript">

				// Chart 5
				// ========================================================================
				var char5El = document.getElementById('chart5');

				new Chart(char5El, {
				  type: 'line',
				  data: {
				    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'],
				    datasets: [{
				      data: [120, 109, 145, 178, 211, 204, 200, 320, 180, 345, 230, 220],
				      label: "Google Search",
				      borderColor: "#3af",
				      fill: false
				    }, {
				      data: [900, 1200, 1450, 1881, 2352, 2004, 2000, 3200, 1800, 3450, 2300, 2200],
				      label: "Facebook WC",
				      borderColor: "#f90",
				      fill: false
				    }, {
				      data: [450, 600, 730, 990, 1130, 1000, 1000, 1600, 900, 1700, 1350, 1100],
				      label: "Affiliate",
				      borderColor: "#71f",
				      fill: false
				    }, {
				      data: [580, 700, 820, 1100, 1324, 1120, 1324, 1872, 1100, 1983, 1542, 1623],
				      label: "Organic",
				      borderColor: "#383",
				      fill: false
				    }, {
				      data: [380, 565, 650, 890, 1022, 900, 900, 1420, 800, 1654, 1245, 900],
				      label: "ETB Campaigns",
				      borderColor: "#939",
				      fill: false
				    }]
				  },
				  options: {
				    maintainAspectRatio: false,
				    responsiveAnimationDuration: 500,
				    animation: {
				      duration: 2000
				    },
				    title: {
				      display: false,
				      text: 'Visits vs Leads'
				    }
				  }
				});

				</script>

		<?php elseif ($input->urlSegment1 == 'rejects'): ?>
			<!-- Rejects -->
			<div class="uk-grid uk-grid-medium" uk-grid>
				<div class="uk-width-1-2">
					<div class="uk-card uk-card-default uk-card-small uk-card-hover">
						<div class="uk-card-header uk-flex uk-flex-between uk-flex-middle">
							<h4 class="uk-label">Top Reject Reasons at Submit</h4>
							<a href="#" class="uk-icon-button"><span uk-icon="icon:download;ratio:1.0"></span></a>
						</div>
						<div class="uk-card-body">
							<table class="uk-table uk-table-divider uk-text-center uk-text-small">
								<tr>
									<td>Top Reject Reasons at Submit</td>
									<td>%</td>
								</tr>
								<tr>
									<td>OTP not verified</td>
									<td></td>
								</tr>
								<tr>
									<td>Invalid Mobile number</td>
									<td></td>
								</tr>
								<tr>
									<td>Non-eligible Pincode</td>
									<td></td>
								</tr>
								<tr>
									<td>Non-eligible Profession</td>
									<td></td>
								</tr>
								<tr>
									<td>Non-eligible Income</td>
									<td></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
				
				<div class="uk-width-1-2">
					<div class="uk-card uk-card-default uk-card-small uk-card-hover">
						<div class="uk-card-header uk-flex uk-flex-between uk-flex-middle">
							<h4 class="uk-label">Top Reject Reasons at Application</h4>
							<a href="#" class="uk-icon-button"><span uk-icon="icon:download;ratio:1.0"></span></a>
						</div>
						<div class="uk-card-body">
							<table class="uk-table uk-table-divider uk-text-center uk-text-small">
								<tr>
									<td>Top Reject Reasons at Application</td>
									<td>%</td>
								</tr>
								<tr>
									<td>Duplicate Application</td>
									<td></td>
								</tr>
								<tr>
									<td>Invalid Employment Details</td>
									<td></td>
								</tr>
								<tr>
									<td>Non-eligible Pincode</td>
									<td></td>
								</tr>
								<tr>
									<td>Non-eligible Profession</td>
									<td></td>
								</tr>
								<tr>
									<td>Non-eligible Income</td>
									<td></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			
				<div class="uk-width-1-2">
					<div class="uk-card uk-card-default uk-card-small uk-card-hover">
						<div class="uk-card-header uk-flex uk-flex-between uk-flex-middle">
							<h4 class="uk-label">Top Reject Reasons at AIP</h4>
							<a href="#" class="uk-icon-button"><span uk-icon="icon:download;ratio:1.0"></span></a>
						</div>
						<div class="uk-card-body">
							<table class="uk-table uk-table-divider uk-text-center uk-text-small">
								<tr>
									<td>Top Reject Reasons at AIP</td>
									<td>%</td>
								</tr>
								<tr>
									<td>Duplicate Application</td>
									<td></td>
								</tr>
								<tr>
									<td>Invalid Employment Details</td>
									<td></td>
								</tr>
								<tr>
									<td>Non-eligible Pincode</td>
									<td></td>
								</tr>
								<tr>
									<td>Non-eligible Profession</td>
									<td></td>
								</tr>
								<tr>
									<td>Non-eligible Income</td>
									<td></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		<?php elseif ($input->urlSegment1 == 'submits'): ?>
		<!-- Submits -->
			<div class="uk-grid uk-grid-medium" uk-grid>
				<div class="uk-width-1-2">
					<div class="uk-card uk-card-default uk-card-small uk-card-hover">
						<div class="uk-card-header uk-flex uk-flex-between uk-flex-middle">
							<h4 class="uk-label">Top Channels</h4>
							<a href="#" class="uk-icon-button"><span uk-icon="icon:download;ratio:1.0"></span></a>
						</div>
						<div class="uk-card-body">
							<table class="uk-table uk-table-divider uk-text-center uk-text-small">
								<tr>
									<td>Top Channels for submits</td>
									<td>%</td>
								</tr>
								<tr>
									<td>Facebook</td>
									<td></td>
								</tr>
								<tr>
									<td>Google</td>
									<td></td>
								</tr>
								<tr>
									<td>Affiliate</td>
									<td></td>
								</tr>
								<tr>
									<td>Bing</td>
									<td></td>
								</tr>
								<tr>
									<td>Other</td>
									<td></td>
								</tr>
							</table>
						</div>
					</div>
				</div>

				<div class="uk-width-1-2">
					<div class="uk-card uk-card-default uk-card-small uk-card-hover">
						<div class="uk-card-header uk-flex uk-flex-between uk-flex-middle">
							<h4 class="uk-label">Top Cities</h4>
							<a href="#" class="uk-icon-button"><span uk-icon="icon:download;ratio:1.0"></span></a>
						</div>
						<div class="uk-card-body">
							<table class="uk-table uk-table-divider uk-text-center uk-text-small">
								<tr>
									<td>Top Cities for submits</td>
									<td>%</td>
								</tr>
								<tr>
									<td>Mumbai</td>
									<td></td>
								</tr>
								<tr>
									<td>Bangalore</td>
									<td></td>
								</tr>
								<tr>
									<td>Delhi</td>
									<td></td>
								</tr>
								<tr>
									<td>Hyderabad</td>
									<td></td>
								</tr>
								<tr>
									<td>Chennai</td>
									<td></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		<?php elseif ($input->urlSegment1 == 'call-center'): ?>
			<!-- Call Center -->
			<div class="uk-grid uk-grid-medium" uk-grid>
				<div class="uk-width-1-2">
					<div class="uk-card uk-card-default uk-card-small uk-card-hover">
						<div class="uk-card-header uk-flex uk-flex-between uk-flex-middle">
							<h4 class="uk-label">Leads to be called</h4>
							<a href="#" class="uk-icon-button"><span uk-icon="icon:download;ratio:1.0"></span></a>
						</div>
						<div class="uk-card-body">
							<table class="uk-table uk-table-divider uk-text-center uk-text-small">
								<tr>
									<td>Leads to be called</td>
									<td>Leads</td>
									<td>%</td>
								</tr>
								<tr>
									<td>1 day</td>
									<td>1,200</td>
									<td></td>
								</tr>
								<tr>
									<td>2 days</td>
									<td>2,400</td>
									<td></td>
								</tr>
								<tr>
									<td>3 to 7 days</td>
									<td>85,000</td>
									<td></td>
								</tr>
								<tr>
									<td>7 days+</td>
									<td>96,000</td>
									<td></td>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		<?php endif ?>

		
	</div><!-- card -->
</div><!-- uk-container -->




<script type="text/javascript">
// Chart 6
// ========================================================================
var char6El = document.getElementById('chart6');

new Chart(char6El, {
    type: 'doughnut',
    data: {
      labels: ["leads", "visits"],
      datasets: [
        {
          label: "Leads (this month)",
          backgroundColor: ["#39f", "#895df6"],
          data: [2478,5267]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      responsiveAnimationDuration: 500,
      animation: {
        duration: 2000
      },
      title: {
        display: true,
        text: 'Visits vs Leads'
      }
    }
});
</script>

<?php include 'partials/_sales_footer.php'; ?>