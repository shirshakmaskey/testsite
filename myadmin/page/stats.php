<div class="row">
			<div class="col-md-8">

<!-- 5. $UPLOADS_CHART =============================================================================

				Uploads chart
-->
				<!-- Javascript -->
				<script>
					init.push(function () {
						var uploads_data = [
							{ day: '2014-03-10', v: 20 },
							{ day: '2014-03-11', v: 10 },
							{ day: '2014-03-12', v: 15 },
							{ day: '2014-03-13', v: 12 },
							{ day: '2014-03-14', v: 5  },
							{ day: '2014-03-15', v: 5  },
							{ day: '2014-03-16', v: 20 }
						];
						Morris.Line({
							element: 'hero-graph',
							data: uploads_data,
							xkey: 'day',
							ykeys: ['v'],
							labels: ['Value'],
							lineColors: ['#fff'],
							lineWidth: 2,
							pointSize: 4,
							gridLineColor: 'rgba(255,255,255,.5)',
							resize: true,
							gridTextColor: '#fff',
							xLabels: "day",
							xLabelFormat: function(d) {
								return ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov', 'Dec'][d.getMonth()] + ' ' + d.getDate(); 
							},
						});
					});
				</script>
				<!-- / Javascript -->

				<div class="stat-panel">
					<div class="stat-row">
						<!-- Small horizontal padding, bordered, without right border, top aligned text -->
						<div class="stat-cell col-sm-4 padding-sm-hr bordered no-border-r valign-top">
							<!-- Small padding, without top padding, extra small horizontal padding -->
							<h4 class="padding-sm no-padding-t padding-xs-hr"><i class="fa fa-cloud-upload text-primary"></i>&nbsp;&nbsp;Uploads</h4>
							<!-- Without margin -->
							<ul class="list-group no-margin">
								<!-- Without left and right borders, extra small horizontal padding, without background, no border radius -->
								<li class="list-group-item no-border-hr padding-xs-hr no-bg no-border-radius">
									Documents <span class="label label-pa-purple pull-right">34</span>
								</li> <!-- / .list-group-item -->
								<!-- Without left and right borders, extra small horizontal padding, without background -->
								<li class="list-group-item no-border-hr padding-xs-hr no-bg">
									Audio <span class="label label-danger pull-right">128</span>
								</li> <!-- / .list-group-item -->
								<!-- Without left and right borders, without bottom border, extra small horizontal padding, without background -->
								<li class="list-group-item no-border-hr no-border-b padding-xs-hr no-bg">
									Videos <span class="label label-success pull-right">12</span>
								</li> <!-- / .list-group-item -->
							</ul>
						</div> <!-- /.stat-cell -->
						<!-- Primary background, small padding, vertically centered text -->
						<div class="stat-cell col-sm-8 bg-primary padding-sm valign-middle">
							<div style="height: 230px;" class="graph" id="hero-graph"><svg height="230" version="1.1" width="434" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative; top: -0.78334px;"><desc>Created with Raphaël 2.1.2</desc><defs/><text style="text-anchor: end; font: 12px sans-serif;" x="29.5" y="190" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4.5">0</tspan></text><path style="" fill="none" stroke="#ffffff" d="M42,190H409" stroke-opacity="0.5" stroke-width="0.5"/><text style="text-anchor: end; font: 12px sans-serif;" x="29.5" y="148.75" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4.5">5</tspan></text><path style="" fill="none" stroke="#ffffff" d="M42,148.75H409" stroke-opacity="0.5" stroke-width="0.5"/><text style="text-anchor: end; font: 12px sans-serif;" x="29.5" y="107.5" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4.5">10</tspan></text><path style="" fill="none" stroke="#ffffff" d="M42,107.5H409" stroke-opacity="0.5" stroke-width="0.5"/><text style="text-anchor: end; font: 12px sans-serif;" x="29.5" y="66.25" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4.5">15</tspan></text><path style="" fill="none" stroke="#ffffff" d="M42,66.25H409" stroke-opacity="0.5" stroke-width="0.5"/><text style="text-anchor: end; font: 12px sans-serif;" x="29.5" y="25" text-anchor="end" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" font-size="12px" font-family="sans-serif" font-weight="normal"><tspan dy="4.5">20</tspan></text><path style="" fill="none" stroke="#ffffff" d="M42,25H409" stroke-opacity="0.5" stroke-width="0.5"/><text style="text-anchor: middle; font: 12px sans-serif;" x="409" y="202.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7.5)"><tspan dy="4.5">Mar 16</tspan></text><text style="text-anchor: middle; font: 12px sans-serif;" x="286.66666666666663" y="202.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7.5)"><tspan dy="4.5">Mar 14</tspan></text><text style="text-anchor: middle; font: 12px sans-serif;" x="164.33333333333331" y="202.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7.5)"><tspan dy="4.5">Mar 12</tspan></text><text style="text-anchor: middle; font: 12px sans-serif;" x="42" y="202.5" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#ffffff" font-size="12px" font-family="sans-serif" font-weight="normal" transform="matrix(1,0,0,1,0,7.5)"><tspan dy="4.5">Mar 10</tspan></text><path style="" fill="none" stroke="#ffffff" d="M42,25C57.291666666666664,45.625,87.875,102.34375,103.16666666666666,107.5C118.45833333333331,112.65625,149.04166666666666,68.3125,164.33333333333331,66.25C179.625,64.1875,210.20833333333331,80.6875,225.5,91C240.79166666666666,101.3125,271.375,141.53125,286.66666666666663,148.75C301.9583333333333,155.96875,332.54166666666663,164.21875,347.8333333333333,148.75C363.125,133.28125,393.7083333333333,55.9375,409,25" stroke-width="2"/><circle cx="42" cy="25" r="4" fill="#ffffff" stroke="#ffffff" style="" stroke-width="1"/><circle cx="103.16666666666666" cy="107.5" r="4" fill="#ffffff" stroke="#ffffff" style="" stroke-width="1"/><circle cx="164.33333333333331" cy="66.25" r="4" fill="#ffffff" stroke="#ffffff" style="" stroke-width="1"/><circle cx="225.5" cy="91" r="4" fill="#ffffff" stroke="#ffffff" style="" stroke-width="1"/><circle cx="286.66666666666663" cy="148.75" r="4" fill="#ffffff" stroke="#ffffff" style="" stroke-width="1"/><circle cx="347.8333333333333" cy="148.75" r="4" fill="#ffffff" stroke="#ffffff" style="" stroke-width="1"/><circle cx="409" cy="25" r="4" fill="#ffffff" stroke="#ffffff" style="" stroke-width="1"/></svg><div class="morris-hover morris-default-style" style="left: 358px; top: 35px;"><div class="morris-hover-row-label">2014-03-16</div><div style="color: #fff" class="morris-hover-point">
  Value:
  20
</div></div></div>
						</div>
					</div>
				</div> <!-- /.stat-panel -->
<!-- /5. $UPLOADS_CHART -->

<!-- 6. $EASY_PIE_CHARTS ===========================================================================

				Easy Pie charts
-->
				<!-- Javascript -->
				<script>
					init.push(function () {
						// Easy Pie Charts
						var easyPieChartDefaults = {
							animate: 2000,
							scaleColor: false,
							lineWidth: 6,
							lineCap: 'square',
							size: 90,
							trackColor: '#e5e5e5'
						}
						$('#easy-pie-chart-1').easyPieChart($.extend({}, easyPieChartDefaults, {
							barColor: PixelAdmin.settings.consts.COLORS[1]
						}));
						$('#easy-pie-chart-2').easyPieChart($.extend({}, easyPieChartDefaults, {
							barColor: PixelAdmin.settings.consts.COLORS[1]
						}));
						$('#easy-pie-chart-3').easyPieChart($.extend({}, easyPieChartDefaults, {
							barColor: PixelAdmin.settings.consts.COLORS[1]
						}));
					});
				</script>
				<!-- / Javascript -->

				<div class="row">
					<div class="col-xs-4">
						<!-- Centered text -->
						<div class="stat-panel text-center">
							<div class="stat-row">
								<!-- Dark gray background, small padding, extra small text, semibold text -->
								<div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
									<i class="fa fa-globe"></i>&nbsp;&nbsp;BANDWIDTH
								</div>
							</div> <!-- /.stat-row -->
							<div class="stat-row">
								<!-- Bordered, without top border, without horizontal padding -->
								<div class="stat-cell bordered no-border-t no-padding-hr">
									<div id="easy-pie-chart-1" data-percent="43" class="pie-chart">
										<div class="pie-chart-label">12.3TB</div>
									<canvas height="90" width="90"></canvas></div>
								</div>
							</div> <!-- /.stat-row -->
						</div> <!-- /.stat-panel -->
					</div>
					<div class="col-xs-4">
						<div class="stat-panel text-center">
							<div class="stat-row">
								<!-- Dark gray background, small padding, extra small text, semibold text -->
								<div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
									<i class="fa fa-flash"></i>&nbsp;&nbsp;PICK LOAD
								</div>
							</div> <!-- /.stat-row -->
							<div class="stat-row">
								<!-- Bordered, without top border, without horizontal padding -->
								<div class="stat-cell bordered no-border-t no-padding-hr">
									<div id="easy-pie-chart-2" data-percent="93" class="pie-chart">
										<div class="pie-chart-label">93%</div>
									<canvas height="90" width="90"></canvas></div>
								</div>
							</div> <!-- /.stat-row -->
						</div> <!-- /.stat-panel -->
					</div>
					<div class="col-xs-4">
						<div class="stat-panel text-center">
							<div class="stat-row">
								<!-- Dark gray background, small padding, extra small text, semibold text -->
								<div class="stat-cell bg-dark-gray padding-sm text-xs text-semibold">
									<i class="fa fa-cloud"></i>&nbsp;&nbsp;USED RAM
								</div>
							</div> <!-- /.stat-row -->
							<div class="stat-row">
								<!-- Bordered, without top border, without horizontal padding -->
								<div class="stat-cell bordered no-border-t no-padding-hr">
									<div id="easy-pie-chart-3" data-percent="75" class="pie-chart">
										<div class="pie-chart-label">12GB</div>
									<canvas height="90" width="90"></canvas></div>
								</div>
							</div> <!-- /.stat-row -->
						</div> <!-- /.stat-panel -->
					</div>
				</div>
			</div>
<!-- /6. $EASY_PIE_CHARTS -->

			<div class="col-md-4">
				<div class="row">

<!-- 7. $EARNED_TODAY_STAT_PANEL ===================================================================

					Earned today stat panel
-->
					<div class="col-sm-4 col-md-12">
						<div class="stat-panel">
							<!-- Danger background, vertically centered text -->
							<div class="stat-cell bg-danger valign-middle">
								<!-- Stat panel bg icon -->
								<i class="fa fa-trophy bg-icon"></i>
								<!-- Extra large text -->
								<span class="text-xlg"><span class="text-lg text-slim">$</span><strong>147</strong></span><br>
								<!-- Big text -->
								<span class="text-bg">Earned today</span><br>
								<!-- Small text -->
								<span class="text-sm"><a href="#">See details in your profile</a></span>
							</div> <!-- /.stat-cell -->
						</div> <!-- /.stat-panel -->
					</div>
<!-- /7. $EARNED_TODAY_STAT_PANEL -->


<!-- 8. $RETWEETS_GRAPH_STAT_PANEL =================================================================

					Retweets graph stat panel
-->
					<div class="col-sm-4 col-md-12">
						<!-- Javascript -->
						<script>
							init.push(function () {
								$("#stats-sparklines-3").pixelSparkline([275,490,397,487,339,403,402,312,300], {
									type: 'line',
									width: '100%',
									height: '45px',
									fillColor: '',
									lineColor: '#fff',
									lineWidth: 2,
									spotColor: '#ffffff',
									minSpotColor: '#ffffff',
									maxSpotColor: '#ffffff',
									highlightSpotColor: '#ffffff',
									highlightLineColor: '#ffffff',
									spotRadius: 4,
									highlightLineColor: '#ffffff'
								});
							});
						</script>
						<!-- / Javascript -->

						<div class="stat-panel">
							<div class="stat-row">
								<!-- Purple background, small padding -->
								<div class="stat-cell bg-pa-purple padding-sm">
									<!-- Extra small text -->
									<div style="margin-bottom: 5px;" class="text-xs">RETWEETS GRAPH</div>
									<div style="width: 100%" id="stats-sparklines-3" class="stats-sparklines"><canvas style="display: inline-block; width: 305px; height: 45px; vertical-align: top;" width="305" height="45"></canvas></div>
								</div>
							</div> <!-- /.stat-row -->
							<div class="stat-row">
								<!-- Bordered, without top border, horizontally centered text -->
								<div class="stat-counters bordered no-border-t text-center">
									<!-- Small padding, without horizontal padding -->
									<div class="stat-cell col-xs-4 padding-sm no-padding-hr">
										<!-- Big text -->
										<span class="text-bg"><strong>312</strong></span><br>
										<!-- Extra small text -->
										<span class="text-xs text-muted">TWEETS</span>
									</div>
									<!-- Small padding, without horizontal padding -->
									<div class="stat-cell col-xs-4 padding-sm no-padding-hr">
										<!-- Big text -->
										<span class="text-bg"><strong>1000</strong></span><br>
										<!-- Extra small text -->
										<span class="text-xs text-muted">FOLLOWERS</span>
									</div>
									<!-- Small padding, without horizontal padding -->
									<div class="stat-cell col-xs-4 padding-sm no-padding-hr">
										<!-- Big text -->
										<span class="text-bg"><strong>523</strong></span><br>
										<!-- Extra small text -->
										<span class="text-xs text-muted">FOLLOWING</span>
									</div>
								</div> <!-- /.stat-counters -->
							</div> <!-- /.stat-row -->
						</div> <!-- /.stat-panel -->
					</div>
<!-- /8. $RETWEETS_GRAPH_STAT_PANEL -->

<!-- 9. $UNIQUE_VISITORS_STAT_PANEL ================================================================

					Unique visitors stat panel
-->
					<div class="col-sm-4 col-md-12">
						<!-- Javascript -->
						<script>
							init.push(function () {
								$("#stats-sparklines-2").pixelSparkline(
									[275,490,397,487,339,403,402,312,300,294,411,367,319,416,355,416,371,479,279,361,312,269,402,327,474,422,375,283,384,372], {
									type: 'bar',
									height: '36px',
									width: '100%',
									barSpacing: 2,
									zeroAxis: false,
									barColor: '#ffffff'
								});
							});
						</script>
						<!-- / Javascript -->

						<div class="stat-panel">
							<div class="stat-row">
								<!-- Warning background -->
								<div class="stat-cell bg-warning">
									<!-- Big text -->
									<span class="text-bg">11% more</span><br>
									<!-- Small text -->
									<span class="text-sm">Unique visitors today</span>
								</div>
							</div> <!-- /.stat-row -->
							<div class="stat-row">
								<!-- Warning background, small padding, without top padding, horizontally centered text -->
								<div class="stat-cell bg-warning padding-sm no-padding-t text-center">
									<div style="width: 100%" class="stats-sparklines" id="stats-sparklines-2"><canvas style="display: inline-block; width: 298px; height: 36px; vertical-align: top;" width="298" height="36"></canvas></div>
								</div>
							</div> <!-- /.stat-row -->
						</div> <!-- /.stat-panel -->
					</div>
				</div>
			</div>
		</div>