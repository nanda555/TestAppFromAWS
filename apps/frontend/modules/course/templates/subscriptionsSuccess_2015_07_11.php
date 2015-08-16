<?php
global $CFG;
$current_user = $CFG->current_app->getCurrentUser();
$enrol_count = count($current_user->getEnrolments());
$course_creator = $CFG->current_app->hasPrivilege('EclassroomUser');
?>
<style type="text/css">.fancybox-margin{margin-right:17px;}</style>
 
<link rel="stylesheet" href="/js/masonry/css/style.css">
<link rel="stylesheet" href="/css/course_view.css">
<link rel="stylesheet" href="/css/course_detail.css">

<link href='https://fonts.googleapis.com/css?family=Rambla|Domine|Droid+Sans|BenchNine|Economica|Great+Vibes|Amaranth|Playfair+Display+SC|Cookie|Cinzel+Decorative|Righteous|Roboto|Roboto+Condensed|Squada+One|Fjalla+One|Satisfy|Oswald|Damion|Marvel' rel='stylesheet' type='text/css'>
<style type="text/css">
.fontlist{font-family:'Rambla',sans-serif;font-family:Domine,serif;font-family:'Droid Sans',sans-serif;font-family:BenchNine,sans-serif;font-family:Economica,sans-serif;font-family:'Great Vibes',cursive;font-family:Amaranth,sans-serif;font-family:'Playfair Display SC',serif;font-family:Cookie,cursive;font-family:'Cinzel Decorative',cursive;font-family:Righteous,cursive;font-family:Roboto,sans-serif;font-family:'Roboto Condensed',sans-serif;font-family:'Squada One',cursive;font-family:'Fjalla One',sans-serif;font-family:Satisfy,cursive;font-family:Oswald,sans-serif;font-family:Damion,cursive;font-family:Marvel,sans-serif}
html,body{height:100%;margin:0}
.mybox{width:96%;height:auto;margin:auto;-webkit-border-radius:20px;-moz-border-radius:20px;border-radius:20px;border:2px solid #A9B6B8;background-color:#FFF;-webkit-box-shadow:#A6A6A6 1px 1px 1px;-moz-box-shadow:#A6A6A6 1px 1px 1px;box-shadow:#A6A6A6 1px 1px 1px}
.mycss{margin:20px;font-weight:400;color:#3B3B3B;letter-spacing:1pt;word-spacing:2pt;font-size:25px;text-align:left;font-family:arial,helvetica,sans-serif;line-height:1}
.page_header_title{margin:10px;font-weight:700;color:#00f;letter-spacing:1pt;word-spacing:3pt;font-size:30px;text-align:left;font-family:'Roboto',sans-serif;line-height:1}
.page_header_title_subline{margin-left:100px;font-weight:400;color:#333;letter-spacing:1pt;word-spacing:3pt;font-size:16px;text-align:left;font-family:'Roboto Condensed',sans-serif;line-height:1.5}
.myfont{margin:20px;font-weight:400;color:#3B3B3B;letter-spacing:3pt;word-spacing:2pt;font-size:25px;text-align:left;font-family:arial,helvetica,sans-serif;line-height:1}
.myfont1{margin:10px;font-weight:700;color:#415B84;letter-spacing:1pt;word-spacing:3pt;font-size:21px;text-align:left;font-family:'Roboto',sans-serif;line-height:1}
.myfont2{font-weight:400;color:#333;letter-spacing:1pt;word-spacing:3pt;font-size:16px;text-align:left;font-family:'Roboto Condensed',sans-serif;line-height:1.5}
.myfont3{margin:10px;font-weight:400;color:#00f;letter-spacing:3pt;word-spacing:2pt;font-size:16px;text-align:left;font-family:arial,helvetica,sans-serif;line-height:1}
#wrap0{width:100%;margin:20px;background-color:#fff}
#wrap1{width:100%;margin:20px;background-color:#fff}
#wrap1_left_col2{float:left;width:45%;background-color:#fff}
#wrap1_right_col2{float:right;width:45%;background-color:#fff}
#wrap2{width:100%;margin:20px;background-color:#ddd}
#wrap2_left_col2{float:left;width:45%;background-color:#ddd}
#wrap2_right_col2{float:right;width:45%;background-color:#ddd}
.col5header{position:relative;float:left;left:auto;width:auto;background-color:#fff}
.col5wrapper{position:relative;float:left;left:auto;width:auto;background-color:#fff}
.col5left1{position:relative;float:left;left:auto;width:auto;background-color:#fff}
.col5left2{position:relative;float:left;left:auto;width:auto;background-color:#fff}
.col5left3{position:relative;float:left;left:auto;width:auto;background-color:#fff}
.col5left4{position:relative;float:left;left:auto;width:auto;background-color:#fff}
.col5right{position:relative;float:right;right:auto;width:auto;background-color:#fff}
.col5footer{position:relative;float:left;left:auto;width:auto;background-color:#fff}
body{border-width:0;padding:0;margin:0;font-size:90%;background-color:#fff}
a.tooltip{outline:none}
a.tooltip strong{line-height:30px}
a.tooltip:hover{text-decoration:none}
a.tooltip span{z-index:10;display:none;padding:14px 20px;margin-top:-30px;margin-left:28px;width:300px;line-height:16px}
a.tooltip:hover span{display:inline;position:absolute;color:#111;border:1px solid #DCA;background:#fffAF0}
.callout{z-index:20;position:absolute;top:30px;border:0;left:-12px}
a.tooltip span{border-radius:4px;box-shadow:5px 5px 8px #CCC}
.subscribe_btn{background:#3498db;background-image:-webkit-linear-gradient(top,#3498db,#2980b9);background-image:-moz-linear-gradient(top,#3498db,#2980b9);background-image:-ms-linear-gradient(top,#3498db,#2980b9);background-image:-o-linear-gradient(top,#3498db,#2980b9);background-image:linear-gradient(to bottom,#3498db,#2980b9);-webkit-border-radius:28;-moz-border-radius:28;border-radius:28px;text-shadow:3px 3px 4px #666;font-family:Arial;color:#fff;font-size:18px;padding:10px 20px;text-decoration:none}
.subscribe_btn:hover{background:#3cb0fd;background-image:-webkit-linear-gradient(top,#3cb0fd,#3498db);background-image:-moz-linear-gradient(top,#3cb0fd,#3498db);background-image:-ms-linear-gradient(top,#3cb0fd,#3498db);background-image:-o-linear-gradient(top,#3cb0fd,#3498db);background-image:linear-gradient(to bottom,#3cb0fd,#3498db);text-decoration:none}
.free_btn{background:#34d97b;background-image:-webkit-linear-gradient(top,#34d97b,#137d09);background-image:-moz-linear-gradient(top,#34d97b,#137d09);background-image:-ms-linear-gradient(top,#34d97b,#137d09);background-image:-o-linear-gradient(top,#34d97b,#137d09);background-image:linear-gradient(to bottom,#34d97b,#137d09);-webkit-border-radius:28;-moz-border-radius:28;border-radius:28px;text-shadow:3px 3px 4px #666;font-family:Arial;color:#fff;font-size:18px;padding:10px 20px;text-decoration:none}
.free_btn:hover{background:#0b8f49;background-image:-webkit-linear-gradient(top,#0b8f49,#2ed9a6);background-image:-moz-linear-gradient(top,#0b8f49,#2ed9a6);background-image:-ms-linear-gradient(top,#0b8f49,#2ed9a6);background-image:-o-linear-gradient(top,#0b8f49,#2ed9a6);background-image:linear-gradient(to bottom,#0b8f49,#2ed9a6);text-decoration:none}
.available_btn{background:#b5a017;background-image:-webkit-linear-gradient(top,#b5a017,#e8e84c);background-image:-moz-linear-gradient(top,#b5a017,#e8e84c);background-image:-ms-linear-gradient(top,#b5a017,#e8e84c);background-image:-o-linear-gradient(top,#b5a017,#e8e84c);background-image:linear-gradient(to bottom,#b5a017,#e8e84c);-webkit-border-radius:28;-moz-border-radius:28;border-radius:28px;text-shadow:3px 3px 4px #666;font-family:Arial;color:#fff;font-size:18px;padding:10px 20px;text-decoration:none}
.available_btn:hover{background:#ebeb52;background-image:-webkit-linear-gradient(top,#ebeb52,#bda718);background-image:-moz-linear-gradient(top,#ebeb52,#bda718);background-image:-ms-linear-gradient(top,#ebeb52,#bda718);background-image:-o-linear-gradient(top,#ebeb52,#bda718);background-image:linear-gradient(to bottom,#ebeb52,#bda718);text-decoration:none}
.colorbar1{background-color:#9561FE;width:100%;height:12px}
.myfont1 span.count { font-size: 21px; color: #3838CB;}
.myfont2 a { text-decoration:underline; font-weight:200; font-size: 14px; }
h3.sub-title{font-size: 22px;}
button.library-button{  background-image: none !important; background-color: #415B84 !important; padding: 12px 26px; font-size: 26px; color: #fff; font-weight: 300;}
.library-div .myfont2 a {margin-left: 40px;}
button.register-button{  background-image: none !important; background-color: #00f !important; padding: 12px 26px; font-size: 26px; color: #fff; font-weight: 300;}
h1 { color: #5F6169; font-size: 26px; }
</style>

<!-- ***************************** TMG Added for CDN  *****************************  -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" />
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type='text/javascript' src='//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/js/bootstrap.min.js?ver=3.3.4-0'></script>

<!-- Add jQuery library -->
<script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
<!-- Add fancyBox main JS and CSS files -->
<link rel="stylesheet"  type="text/css" href="/css/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript" src="/js/jquery.fancybox.pack.js?v=2.1.5"></script>
<script type="text/javascript">
$(document).ready(function() {
	$(".various").fancybox({
		scrollOutside	: true,
		width		: '90%',
		height		: '75%',
		scrollOutside  : true,
		title		: 'Library',
		closeClick	: true,
	});
	$(".video").fancybox({
		maxWidth	: 960,
		maxHeight	: 600,
		fitToView	: true,
		width		: '90%',
		height		: '80%',
		autoSize	: true,
	});
});
</script>
<!-- ***************************** TMG Added for CDN  *****************************  -->

<?php
$lib_ctlg_crse_lists = array();
$lib_ctlg_crse_count = array();
$all_catalogs_list = array();
$all_catalogs_count = 0;
foreach($libraries_list as $library_list_key=>$library_list_val)
{

//echo " ==".$library_list_key;

	$institution_name = $library_list_key;
	$mhr_institution_obj = $CFG->current_app->selectFromMhrTable('institution', 'name', $institution_name, true);
	if ($mhr_institution_obj) {
		$mhr_institution = new GcrMhrInstitution($mhr_institution_obj, $CFG->current_app);
		$potential_eschools = array();
		$current_eschools = array();
		// Check if users do not exist on the eschool, and get potential users in properly formatted form
		$eschools = $mhr_institution->getEschools();
		if ($eschools) {
			foreach ($eschools as $eschool) {
				$current_eschools[$eschool->getShortName()] = $eschool->getFullName();
			}
		}
		$eschools = $CFG->current_app->getMnetEschools();
		if ($eschools) {
			foreach ($eschools as $eschool) {
				if (!array_key_exists($eschool->getShortName(), $current_eschools)) {
					$potential_eschools[$eschool->getShortName()] = $eschool->getFullName();
				}
			}
		}
		asort($potential_eschools);
		asort($current_eschools);
		$lib_ctlg_crse_count[$library_list_key] = 0;
		foreach($current_eschools as $current_eschool_key=>$current_eschool_val) {
			//if(isset($catalog_courses_count[$current_eschool_key]) && $catalog_courses_count[$current_eschool_key] > 0) {
				//if(stripos(strtolower($current_eschool_val), "$") !== false) {
 					/* if(stripos(strtolower($current_eschool_val), "certification$") !== false) {
						$lib_ctlg_crse_lists[$library_list_key][$current_eschool_key] = substr($current_eschool_val, 14, strlen($current_eschool_val));
						$all_catalogs_list[] = substr($current_eschool_val, 14, strlen($current_eschool_val));
					} else {
						$lib_ctlg_crse_lists[$library_list_key][$current_eschool_key] = substr($current_eschool_val, 1, strlen($current_eschool_val));
						$all_catalogs_list[] = substr($current_eschool_val, 1, strlen($current_eschool_val));
					} */
				//} else {
					$lib_ctlg_crse_count[$library_list_key] = $lib_ctlg_crse_count[$library_list_key] + $catalog_courses_count[$current_eschool_key];
					$all_catalogs_count = $all_catalogs_count + $catalog_courses_count[$current_eschool_key];					
					$lib_ctlg_crse_lists[$library_list_key][$current_eschool_key] = $current_eschool_val;
					$all_catalogs_list[] = $current_eschool_val;
				//}
			//}
		}				
	} else {
		$lib_ctlg_crse_count[$library_list_key] = 0;
	}
}
/* print "<pre>";
echo $all_catalogs_count;
print_r($all_catalogs_list);
print_r($lib_ctlg_crse_lists);
print_r($products_details);
print_r($lib_ctlg_crse_count);
print "</pre>"; */
?>
<section id="content">
<div id="gc_course_list">
<h1>Premium Subscriptions</h1>
<ul>
<li>All courses include video-rich tutorials and lectures.</li>
<li>Unlimited access to all courses in your purchased library</li>
<li>All courses include a Certificate of Completion and become part of your Global Classroom transcript</li>
<li>No contract to sign</li>
</ul>

<div>
<div>
	<h1>Platinum Library offers "All You Can Learn" from every library</h1>
</div>
<div>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-6">
					<p><a class="" href="javascript:;"><img src="<?php print $CFG->current_app->getAppUrl(); ?>theme/globalclassroom/static/images/platinum_library.png" alt="Platinum Library"></a> <a data-toggle="collapse" data-parent="#accordion" href="#collapseOneCS00"><span style="font-size: 16px; font-weight: bold; color:">Platinum Library</span></a> : $35  per month</p>
				</div>
				<div class="col-md-3 col-md-offset-3" style="padding-top:20px;">
				<a class="btn btn-primary" href="#"><span class="glyphicon glyphicon-usd" aria-hidden="true"></span>&nbsp;&nbsp;<strong>Buy Now</strong></a>
				</div>
			</div>
		</div>
		<div id="collapseOneCS00" class="panel-collapse collapse">
			<div class="panel-body">
				<h4>Platinum Library</h4>
				<div>
					<p>Unlimited access to all course libraries</p>
				</div>
				<div class="content_spacer_20px">
					<a class="various fancybox.iframe" href="http://globalclassroomportal.com/educationlibrary/library_template.php?PassedEducationLibrariesKEY=14"><span class="btn btn-primary">View courses</span></a>
				</div>
				<p><strong>Number of online courses:</strong> <?php echo $all_catalogs_count; ?> </p>
				<p><strong>Courses Catalogs:</strong>  
				<?php
				asort($all_catalogs_list);
				echo join(", ", $all_catalogs_list);
				?>
				</p>
				<div></div>
			</div>
		</div>
	</div>
</div>
<hr size="10" width="80%" align="center">
<div>
<h1>Indivdual Libraries</h1>
<h2>Overview</h2>

<div class="row">
<?php
$loop_i = 1;
foreach($products_details as $products_detail_key=>$products_detail_val)
{
	//if(isset($lib_ctlg_crse_count[$products_detail_val["short_name"]]) && $lib_ctlg_crse_count[$products_detail_val["short_name"]] > 0) {
	?>
		<div class="col-md-4">
			<a class="various fancybox.iframe" href="http://globalclassroomportal.com/educationlibrary/library_template.php?PassedEducationLibrariesKEY=<?php echo $products_detail_val["id"]; ?>">
				<img src="<?php print $CFG->current_app->getAppUrl(); ?>theme/globalclassroom/static/images/<?php echo $products_detail_val["icon"]; ?>" alt="<?php echo $products_detail_val["full_name"]; ?>" height="30" width="30"><?php echo $products_detail_val["full_name"]; ?>
			</a>: 
			<u><?php echo $products_detail_val["pricing_html"]; ?></u>&nbsp; <strong>&nbsp;-&nbsp;<?php echo isset($lib_ctlg_crse_count[$products_detail_val["short_name"]]) ? $lib_ctlg_crse_count[$products_detail_val["short_name"]] : 0; ?> courses</strong>
		</div>
	<?php
	if($loop_i%3 == 0) {
		?></div><div class="row"><?php
	}
	$loop_i++;
	//}
}
?>
</div>

</div>
<p>&nbsp;</p>
<div>
	<h2>Details</h2>
<?php
foreach($products_details as $products_detail_key=>$products_detail_val)
{
	//if(isset($lib_ctlg_crse_count[$products_detail_val["short_name"]]) && $lib_ctlg_crse_count[$products_detail_val["short_name"]] > 0) {
?>	
	<div class="panel panel-info">
		<div class="panel-heading">
			<div class="row">
				<div class="col-md-6">
					<p>
						<a class="various fancybox.iframe" href="http://globalclassroomportal.com/educationlibrary/library_template.php?PassedEducationLibrariesKEY=<?php echo $products_detail_val["id"]; ?>">
							<img src="<?php print $CFG->current_app->getAppUrl(); ?>theme/globalclassroom/static/images/<?php echo $products_detail_val["icon"]; ?>" alt="<?php echo $products_detail_val["full_name"]; ?>">
						</a> 
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseOneCS<?php echo $products_detail_val["id"]; ?>" aria-expanded="false" class="collapsed">
							<span style="font-size: 16px; font-weight: bold; color:"><?php echo $products_detail_val["full_name"]; ?></span>
						</a> : <?php echo $products_detail_val["pricing_html"]; ?>
						</p>
				</div>
				<div class="col-md-3 col-md-offset-3" style="padding-top:20px;">
					<a class="btn btn-info" href="#">
					<span class="glyphicon glyphicon-usd" aria-hidden="true"></span>&nbsp;&nbsp;<strong>Buy Now</strong></a></div>
			</div>
		</div>
		<div id="collapseOneCS<?php echo $products_detail_val["id"]; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
			<div class="panel-body">
				<h4><?php echo $products_detail_val["full_name"]; ?></h4>
				<div>
					<p>
					<?php echo $products_detail_val["description"]; ?>
					</p>
				</div>
				<div class="content_spacer_20px">
					<a class="various fancybox.iframe" href="http://globalclassroomportal.com/educationlibrary/library_template.php?PassedEducationLibrariesKEY=<?php echo $products_detail_val["id"]; ?>"><span class="btn btn-info">View courses</span>
					</a>
				</div>
				<p><strong>Number of online courses:</strong> <?php echo isset($lib_ctlg_crse_count[$products_detail_val["short_name"]]) ? $lib_ctlg_crse_count[$products_detail_val["short_name"]] : 0; ?> </p>
				<p><strong>Courses Catalogs:</strong> 
				<?php 
				if(count($lib_ctlg_crse_lists[$products_detail_val["short_name"]]) > 0) {
					asort($lib_ctlg_crse_lists[$products_detail_val["short_name"]]);
					echo join(", ", $lib_ctlg_crse_lists[$products_detail_val["short_name"]]);
				}	
				?>
				</p>
				<div></div>
			</div>
		</div>
	</div>
<?php
	//}
}
?>	
</div>
</div>
</div>
<!-- #content -->

</section>
