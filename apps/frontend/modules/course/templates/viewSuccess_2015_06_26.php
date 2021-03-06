<?php /* <h1 style="color:red;">This page is in-progress</h1> */ ?>
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

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.6/css/jquery.dataTables.css" />
<script src="https://cdn.datatables.net/1.10.6/js/jquery.dataTables.min.js"></script>
<style>
.dataTables_wrapper .dataTables_filter { float: left; text-align: right; margin-bottom: 10px; margin-top: 10px; }
table.dataTable.no-footer { border-bottom: none; }
table.dataTable thead th,
table.dataTable thead td {
  padding: 10px 18px;
  border-bottom: 1px solid #ddd;
}
table.dataTable tfoot th,
table.dataTable tfoot td {
  padding: 10px 18px 6px 18px;
  border-bottom: 0px solid #fff;
}
table.dataTable.row-border tbody th, table.dataTable.row-border tbody td, table.dataTable.display tbody th, table.dataTable.display tbody td {
  border-top: 0px solid #fff;
}
table.dataTable.row-border tbody tr:first-child th,
table.dataTable.row-border tbody tr:first-child td, table.dataTable.display tbody tr:first-child th,
table.dataTable.display tbody tr:first-child td {
  border-top: none;
}
table.dataTable.cell-border tbody th, table.dataTable.cell-border tbody td {
  border-top: 0px solid #fff;
  border-right: 0px solid #fff;
}
table.dataTable.cell-border tbody tr th:first-child,
table.dataTable.cell-border tbody tr td:first-child {
  border-left: 0px solid #fff;
}
table.dataTable.cell-border tbody tr:first-child th,
table.dataTable.cell-border tbody tr:first-child td {
  border-top: none;
}
table.dataTable.cell-border tbody th, table.dataTable.cell-border tbody td { border-bottom: 1px solid #ddd; }
</style>

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
$ind_ctlg_crse_lists = array();
$ind_ctlg_crse_count = array();
$ind_all_catalogs_list = array();
$int_all_catalogs_count = 0;
foreach($ind_products_list as $product_list_key=>$product_list_val)
{
	$institution_name = $product_list_key;
	$mhr_institution_obj = $CFG->current_app->selectFromMhrTable('institution', 'name', $institution_name, true);
	if ($mhr_institution_obj) {
		$mhr_institution = new GcrMhrInstitution($mhr_institution_obj, $CFG->current_app);
		$potential_eschools = array();
		$current_eschools = array();
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
		$ind_ctlg_crse_count[$product_list_key] = 0;
		foreach($current_eschools as $current_eschool_key=>$current_eschool_val) {
			//if(isset($catalog_courses_count[$current_eschool_key]) && $catalog_courses_count[$current_eschool_key] > 0) {
				$ind_ctlg_crse_count[$product_list_key] = $ind_ctlg_crse_count[$product_list_key] + $catalog_courses_count[$current_eschool_key];
				$int_all_catalogs_count = $int_all_catalogs_count + $catalog_courses_count[$current_eschool_key];
				//$ind_ctlg_crse_lists[$product_list_key][$current_eschool_key] = substr($current_eschool_val, 1, strlen($current_eschool_val));
				$ind_ctlg_crse_lists[$product_list_key][$current_eschool_key] = $current_eschool_val;
				$ind_all_catalogs_list[] = $current_eschool_val;
			//}
		}				
	} else {
		$ind_ctlg_crse_count[$product_list_key] = 0;
	}
}

$cert_ctlg_crse_lists = array();
$cert_ctlg_crse_count = array();
$cert_all_catalogs_list = array();
$cert_all_catalogs_count = 0;
foreach($cert_products_list as $product_list_key=>$product_list_val)
{
	$institution_name = $product_list_key;
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
		$cert_ctlg_crse_count[$product_list_key] = 0;
		foreach($current_eschools as $current_eschool_key=>$current_eschool_val) {
			//if(isset($catalog_courses_count[$current_eschool_key]) && $catalog_courses_count[$current_eschool_key] > 0) {
				$cert_ctlg_crse_count[$product_list_key] = $cert_ctlg_crse_count[$product_list_key] + $catalog_courses_count[$current_eschool_key];
				$cert_all_catalogs_count = $cert_all_catalogs_count + $catalog_courses_count[$current_eschool_key];
				//$cert_ctlg_crse_lists[$product_list_key][$current_eschool_key] = substr($current_eschool_val, 14, strlen($current_eschool_val));
				$cert_ctlg_crse_lists[$product_list_key][$current_eschool_key] = $current_eschool_val;
				$cert_all_catalogs_list[] = $current_eschool_val;
			//}
		}				
	} else {
		$cert_ctlg_crse_count[$product_list_key] = 0;
	}
}
/*
print "<pre>";
echo $int_all_catalogs_count;
print_r($ind_ctlg_crse_count);
print_r($ind_all_catalogs_list);
print_r($ind_ctlg_crse_lists);
print_r($ind_products_details);
echo "=======================================";
echo $cert_all_catalogs_count;
print_r($cert_ctlg_crse_count);
print_r($cert_all_catalogs_list);
print_r($cert_ctlg_crse_lists);
print_r($cert_products_details);
print "</pre>";
*/
?>

<script src="/js/masonry/jquery.masonry.min.js"></script>
<script src="/js/course_view.js"></script>
<section id="content">
<div id="gc_course_list">
<h1>Individual Courses for sale</h1>
<div>
<h1>Overview</h1>
<div class="panel-group" id="accordion">
	<div class="row">
	<?php
	$loop_i = 1;
	foreach($ind_products_details as $ind_products_detail_key=>$ind_products_detail_val)
	{
		//if(isset($ind_ctlg_crse_count[$ind_products_detail_val["short_name"]]) && $ind_ctlg_crse_count[$ind_products_detail_val["short_name"]] > 0) {
		?>
			<div class="col-md-4">
				<a class="various fancybox.iframe" href="http://globalclassroomportal.com/educationlibrary/library_template.php?PassedEducationLibrariesKEY=<?php echo $ind_products_detail_val["id"]; ?>">
					<img src="<?php print $CFG->current_app->getAppUrl(); ?>theme/globalclassroom/static/images/<?php echo $ind_products_detail_val["icon"]; ?>" alt="<?php echo $ind_products_detail_val["full_name"]; ?>" height="30" width="30"><?php echo $ind_products_detail_val["full_name"]; ?>
				</a>: 
				<u><?php echo $ind_products_detail_val["pricing_html"]; ?></u>&nbsp; <strong>&nbsp;-&nbsp;<?php echo isset($ind_ctlg_crse_count[$ind_products_detail_val["short_name"]]) ? $ind_ctlg_crse_count[$ind_products_detail_val["short_name"]] : 0; ?> courses</strong>
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

	<p>&nbsp;</p>
	<h2>Details</h2>
	<div class="panel-group" id="accordion">
<?php
foreach($ind_products_details as $products_detail_key=>$products_detail_val) {
	//if(isset($ind_ctlg_crse_count[$products_detail_val["short_name"]]) && $ind_ctlg_crse_count[$products_detail_val["short_name"]] > 0) {
?>	
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-6">
						<p>
						<a class="various fancybox.iframe" href="http://globalclassroomportal.com/educationlibrary/library_template.php?PassedEducationLibrariesKEY=<?php echo $products_detail_val["id"]; ?>">
						<img src="<?php print $CFG->current_app->getAppUrl(); ?>theme/globalclassroom/static/images/<?php echo $products_detail_val["icon"]; ?>" alt="<?php echo $products_detail_val["full_name"]; ?>" /></a>
						<a data-toggle="collapse" data-parent="#accordion" href="#collapseOneCS<?php echo $products_detail_val["id"]; ?>">
						<span style="font-size: 16px; font-weight: bold; color:"><?php echo $products_detail_val["full_name"]; ?> </span>
						</a> : <?php echo $products_detail_val["pricing_html"]; ?></p>
					</div>
				</div>
			</div>
			<div id="collapseOneCS<?php echo $products_detail_val["id"]; ?>" class="panel-collapse collapse">
				<div class="panel-body">
					<h4><?php echo $products_detail_val["full_name"]; ?></h4>
					<div>
						<p><?php echo $products_detail_val["description"]; ?></p>
					</div>
					<div class="content_spacer_20px">
						<?php /* <a class="various fancybox.iframe" href="http://globalclassroomportal.com/educationlibrary/library_template.php?PassedEducationLibrariesKEY=<?php echo $products_detail_val["id"]; ?>"><span class="btn btn-default">View courses</span></a> */ ?>
					</div>
					<p><strong>Number of online courses:</strong> <?php echo isset($ind_ctlg_crse_count[$products_detail_val["short_name"]]) ? $ind_ctlg_crse_count[$products_detail_val["short_name"]] : 0; ?> </p>
					<?php
					$ctlg_courses_list = array();
					foreach($ind_ctlg_crse_lists[$products_detail_val["short_name"]] as $ctlg_crse_list_key=>$ctlg_crse_list_val) {
						if(isset($catalog_courses_count[$ctlg_crse_list_key])) {
							$params = array();
							$params["mode"] = "Eschool";
							$params["mode_id"] = $ctlg_crse_list_key;
							$CFG->current_app->requireMahara();
							$courses_list = new GcrCourseList($params, $CFG->current_app);
							$ctlg_courses_list = $courses_list->getCourseList();
						//}
					?>
					<h4>Courses Catalog: <a data-toggle="collapse" data-parent="#accordion" href="#collapseCourse_<?php echo $ctlg_crse_list_key; ?>"><span style="color:red;"><?php echo $ctlg_crse_list_val; ?> ($)</span>&nbsp;<i class="fa fa-folder-open-o"></i></a></h4>
					<div id="collapseCourse_<?php echo $ctlg_crse_list_key; ?>" class="panel-collapse collapse">
						<table cellpadding="0" cellspacing="0" border="0" class="display" id="courses_list_<?php echo $ctlg_crse_list_key; ?>" width="100%" align="left">
						<thead>
							<tr>
								<th width="20%">Course Title</th>
								<th width="15%">Price</th>
								<th width="40%">Description</th>
								<th width="25%"></th>
							</tr>
						</thead>
						<tbody>
						<?php
						foreach($ctlg_courses_list as $course_list) {
							$mdl_course = $course_list->getObject();
							$course_list_item = new GcrCourseListItem($course_list);
							$eschool = $course_list->getApp();
							$id = 'gcr_course_' . $eschool->getShortName() . '_' . $mdl_course->id;
							$img_src = $course_list_item->getCourseIconUrl();
							$mdl_user = $course_list_item->getInstructor();
							$summary = $course_list_item->getSummary();
							$enrol_count = $course_list_item->getActiveUserCount();
							$shortsummary = GcrInstitutionTable::formatStringSize($summary, 250, 21);
							if ($mdl_user) {
								$teacher_text = GcrEschoolTable::getInstructorProfileHtml($mdl_user);
							} else {
								$teacher_text = 'None';
							}
							$fullname = GcrInstitutionTable::formatStringSize($mdl_course->fullname, 60, 30);
							$cost = $course_list->getCost();
							$cost_text = '';
							//if ($cost) {
								//$cost_text = 'Price: ' . GcrPurchaseTable::gc_format_money($cost);
								$cost_text = GcrPurchaseTable::gc_format_money($cost);
							//}
							$enrollment_status = false;
							$current_user = $CFG->current_app->getCurrentUser();
							if ($current_user->getRoleManager()->hasPrivilege('Student'))
							{
								$mdl_roles = $course_list->getRoleAssignments($current_user);
								$enrollment_status = ($mdl_roles && count($mdl_roles > 0));     
							}
							?>
							<tr>
								<td width="20%"><?php print $fullname; ?></td>
								<td width="15%"><span style="color:green;"><?php print $cost_text; ?></span> per course, per person</td>
								<td width="40%"><?php print $shortsummary ?></td>
								<td width="25%">
									<div id="<?php print $id ?>" class="gc_course_list_item_container">
										<a class="various fancybox.iframe" href=""><span class="btn btn-success"> <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Learn More</span></a>
									</div>		
									<?php if(!$enrollment_status) { ?>
									&nbsp;&nbsp;&nbsp;
									<a href="check_out.php?name=HR Compliance Courses&cost=$39 per course"><span class="btn btn-success"> <span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Enroll</span></a>
									<?php } ?>
								</td>
							</tr>			
							<?php
						}
						?>
						</tbody>
						</table>
						<script>
						//jQuery(document).ready( function () {
 							$('#courses_list_<?php echo $ctlg_crse_list_key; ?>').dataTable( {
								"paging": false,
								"ordering": false,
								"info": false
							} );
						//});	
						</script>
					</div>
					<?php
					}
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
	
	
	<h1>Individual Certifications for sale</h1>
	<div>
	<div class="row">
	<?php
	$loop_i = 1;
	foreach($cert_products_details as $cert_products_detail_key=>$cert_products_detail_val)
	{
	//if(isset($cert_ctlg_crse_count[$cert_products_detail_val["short_name"]]) && $cert_ctlg_crse_count[$cert_products_detail_val["short_name"]] > 0) {
		?>
			<div class="col-md-4">
				<a class="various fancybox.iframe" href="http://globalclassroomportal.com/educationlibrary/library_template.php?PassedEducationLibrariesKEY=<?php echo $cert_products_detail_val["id"]; ?>">
					<img src="<?php print $CFG->current_app->getAppUrl(); ?>theme/globalclassroom/static/images/<?php echo $cert_products_detail_val["icon"]; ?>" alt="<?php echo $cert_products_detail_val["full_name"]; ?>" height="30" width="30"><?php echo $cert_products_detail_val["full_name"]; ?>
				</a>: 
				<u><?php echo $cert_products_detail_val["pricing_html"]; ?></u>&nbsp; <strong>&nbsp;-&nbsp;<?php echo isset($cert_ctlg_crse_count[$cert_products_detail_val["short_name"]]) ? $cert_ctlg_crse_count[$cert_products_detail_val["short_name"]] : 0; ?> courses</strong>
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
		
		<p>&nbsp;</p>
		<h2>Details</h2>
		<div class="panel-group" id="accordion">
<?php
foreach($cert_products_details as $products_detail_key=>$products_detail_val) {
	//if(isset($cert_ctlg_crse_count[$products_detail_val["short_name"]]) && $cert_ctlg_crse_count[$products_detail_val["short_name"]] > 0) {
?>		
			<div class="panel panel-success">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-6">
							<p>
							<a class="various fancybox.iframe" href="http://globalclassroomportal.com/educationlibrary/library_template.php?PassedEducationLibrariesKEY=<?php echo $products_detail_val["id"]; ?>">
							<img src="<?php print $CFG->current_app->getAppUrl(); ?>theme/globalclassroom/static/images/<?php echo $products_detail_val["icon"]; ?>" alt="<?php echo $products_detail_val["full_name"]; ?>" /></a>
							<a data-toggle="collapse" data-parent="#accordion" href="#collapseOneCS<?php echo $products_detail_val["id"]; ?>">
							<span style="font-size: 16px; font-weight: bold; color:"><?php echo $products_detail_val["full_name"]; ?> </span>
							</a> : <?php echo $products_detail_val["pricing_html"]; ?></p>
						</div>
					</div>
				</div>
				<div id="collapseOneCS<?php echo $products_detail_val["id"]; ?>" class="panel-collapse collapse">
					<div class="panel-body">
						<h4><?php echo $products_detail_val["full_name"]; ?></h4>
						<div>
							<p>
							<?php echo $products_detail_val["description"]; ?>
							</p>
						</div>
						<div class="content_spacer_20px">
							<?php /* <a class="various fancybox.iframe" href="http://globalclassroomportal.com/educationlibrary/library_template.php?PassedEducationLibrariesKEY=<?php echo $products_detail_val["id"]; ?>"><span class="btn btn-success">View courses</span></a> */ ?>
						</div>
						<p><strong>Number of online courses:</strong> <?php echo isset($cert_ctlg_crse_count[$products_detail_val["short_name"]]) ? $cert_ctlg_crse_count[$products_detail_val["short_name"]] : 0; ?> </p>
						<?php
						$ctlg_courses_list = array();
						foreach($cert_ctlg_crse_lists[$products_detail_val["short_name"]] as $ctlg_crse_list_key=>$ctlg_crse_list_val) {
/*  						echo "=".$ctlg_crse_list_key."=~=".$catalog_courses_count[$ctlg_crse_list_key];
						print "<pre>";
						print_r($catalog_courses_count);
						print "</pre>";
						if(isset($catalog_courses_count[$ctlg_crse_list_key])) echo "ok1";
						if($catalog_courses_count[$ctlg_crse_list_key] > 0) echo "ok1"; */
						$catalog_key_courses_count = isset($catalog_courses_count[$ctlg_crse_list_key]) ? (int)$catalog_courses_count[$ctlg_crse_list_key] : 0;
						if(isset($catalog_courses_count[$ctlg_crse_list_key])) {
							$params = array();
							$params["mode"] = "Eschool";
							$params["mode_id"] = $ctlg_crse_list_key;
							$CFG->current_app->requireMahara();
							$courses_list = new GcrCourseList($params, $CFG->current_app);
							$ctlg_courses_list = $courses_list->getCourseList();
						//}
						?>
						<h4>Courses Catalog: <a data-toggle="collapse" data-parent="#accordion" href="#collapseCourse_<?php echo $ctlg_crse_list_key; ?>"><span style="color:red;"><?php echo $ctlg_crse_list_val; ?></span>&nbsp;<i class="fa fa-folder-open-o"></i></a></h4>
						<div id="collapseCourse_<?php echo $ctlg_crse_list_key; ?>" class="panel-collapse collapse">
						<table cellpadding="0" cellspacing="0" border="0" class="display" id="courses_list_<?php echo $ctlg_crse_list_key; ?>" width="100%" align="left">
						<thead>
							<tr>
								<th width="20%">Course Title</th>
								<th width="15%">Price</th>
								<th width="40%">Description</th>
								<th width="25%"></th>
							</tr>
						</thead>
						<tbody>
						<?php
						foreach($ctlg_courses_list as $course_list) {
							$mdl_course = $course_list->getObject();
							$course_list_item = new GcrCourseListItem($course_list);
							$eschool = $course_list->getApp();
							$id = 'gcr_course_' . $eschool->getShortName() . '_' . $mdl_course->id;
							$img_src = $course_list_item->getCourseIconUrl();
							$mdl_user = $course_list_item->getInstructor();
							$summary = $course_list_item->getSummary();
							$enrol_count = $course_list_item->getActiveUserCount();
							$shortsummary = GcrInstitutionTable::formatStringSize($summary, 250, 21);
							if ($mdl_user) {
								$teacher_text = GcrEschoolTable::getInstructorProfileHtml($mdl_user);
							} else {
								$teacher_text = 'None';
							}
							$fullname = GcrInstitutionTable::formatStringSize($mdl_course->fullname, 60, 30);
							$cost = $course_list->getCost();
							$cost_text = '';
							//if ($cost) {
								//$cost_text = 'Price: ' . GcrPurchaseTable::gc_format_money($cost);
								$cost_text = GcrPurchaseTable::gc_format_money($cost);
							//}
							$enrollment_status = false;
							$current_user = $CFG->current_app->getCurrentUser();
							if ($current_user->getRoleManager()->hasPrivilege('Student'))
							{
								$mdl_roles = $course_list->getRoleAssignments($current_user);
								$enrollment_status = ($mdl_roles && count($mdl_roles > 0));     
							}							
							?>
							<tr>
								<td width="20%"><?php print $fullname; ?></td>
								<td width="15%"><span style="color:green;"><?php print $cost_text; ?></span> per course, per person</td>
								<td width="40%"><?php print $shortsummary ?></td>
								<td width="25%">
									<div id="<?php print $id ?>" class="gc_course_list_item_container">
										<a class="" href=""><span class="btn btn-success"> <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Learn More</span></a>
									</div>
									<?php if(!$enrollment_status) { ?>
									&nbsp;&nbsp;&nbsp;
									<a href="check_out.php?name=HR Compliance Courses&cost=$39 per course"><span class="btn btn-success"> <span class="glyphicon glyphicon-usd" aria-hidden="true"></span> Enroll</span></a>
									<?php } ?>
								</td>
							</tr>			
							<?php
						}
						?>
						</tbody>
						</table>
						<script>
						//jQuery(document).ready( function () {
						$('#courses_list_<?php echo $ctlg_crse_list_key; ?>').dataTable( {
								"paging": false,
								"ordering": false,
								"info": false
							} );
						//});	
						</script>	
						</div>
						<?php
						}
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
</div>
</div>
<!-- #content -->    
</section>
<script>	

</script>
<!-- Print all JavaScript code at the bottom of the body -->
<script type="text/javascript" src="/js/jquery-migrate-1.0.0.min.js"></script>
<script type="text/javascript" src="/js/jquery-ui-1.10.3.custom.min.js"></script>
<style type="text/css">@import "https://microsoft.globalclassroom.us/css/smoothness/jquery-ui-1.10.3.custom.min.css";</style>
<script type="text/javascript" src="/js/jquery.colorbox-min.js"></script>
<style type="text/css">@import "https://microsoft.globalclassroom.us/css/colorbox/colorbox.css";</style>
<script type="text/javascript" src="/js/smartupdater-3.1.00.js"></script>
<script type="text/javascript" src="/js/mediaelement-and-player.min.js"></script>
<style type="text/css">@import "https://microsoft.globalclassroom.us/css/mediaelementjs/mediaelementplayer.css";</style>
<script type="text/javascript">
	var gc_current_app_id = 'microsoft';
	function gcrGetAppUrl(app_id, is_eschool)
	{
	    var domain = (is_eschool) ? 'globalclassroom.us/stratus' : 'globalclassroom.us/portal';
	    return 'https://' + app_id + '.' + domain;
	}
	function gcrLoadMediaelementjs()
	{
	    jQuery('video,audio').each(function(i){
	        var file_url = '';
	        var sources = jQuery(this).find('source');
	        sources.each(function(j)
	        {
	            file_url = jQuery(this).attr('src');
	            file_url = file_url.replace(/\+/g, '%20'); // + must be changed to %20 to pass security test in mediaelementjs
	            jQuery(this).attr('src', file_url);
	        });
	        var width = jQuery(this).attr('width');
	        var height = jQuery(this).attr('height');
	        if (width == undefined)
	        {
	            width = '350';
	        }
	        if (height == undefined)
	        {
	            height = '250';
	        }
	        file_url = file_url.replace(/&/g, '%26'); // & must be url encoded for flashvars
	        jQuery(this).append('<object width="' + width + '" height="' + height + '" type="application/x-shockwave-flash" data="https://' 
	            + document.domain + '/js/mediaelementjs/flashmediaelement.swf"><param name="allowFullScreen" value="true" />'
	            + '<param name="movie" value="https://' + document.domain + '/js/mediaelementjs/flashmediaelement.swf" />'
	            + '<param name="flashvars" value="controls=true&file=' + file_url + '" /></object>');
	    }); 
	    
	    // Load all mediaelementjs videos
	    jQuery('video,audio').mediaelementplayer({

	                            pluginPath: '/js/mediaelementjs/',
	            plugins: ['flash','silverlight'],
	            // name of flash file
	            flashName: 'flashmediaelement.swf',
	            // name of silverlight file
	            silverlightName: 'silverlightmediaelement.xap'        
	        });
	}
	jQuery('.gc-collapsable-header').click(function ()
	{
	    jQuery(this).next().toggle("slow");
	    return false;
	});
	jQuery(".gc_buttonset").buttonset();
	gcrLoadMediaelementjs();
	
	// Inject any javascript code to overwrite default moodle/mahara application content
	jQuery('#accountprefs_username, #edituser_site_username').attr('disabled','disabled');jQuery('.block_settings .block_tree_box .type_course > ul').append('<li class="type_setting collapsed item_with_icon"><p class="tree_item leaf"><a href="https://microsoft.globalclassroom.us/institution/viewUserStorage" target="_blank" title="Cloud Storage"><img class="smallicon navicon" src="https://microsoft.globalclassroom.us/images/icons/cloudstorage.png" title="" alt="">Cloud Storage</a></p></li>');
</script>

<div id="gc_smart_updater"></div>
<script type="text/javascript">
	jQuery(document).ready( function ()
	{
	    jQuery('body').css('background-color', '#386da3');
	    if('fabric-trans_bg.png' != 'none')
	    {
	        jQuery('body').css('background-image', 'url(https://microsoft.globalclassroom.us/images/fabric-trans_bg.png)');
	    }
	    //jQuery('#site-logo img').hide();
	    //jQuery('#site-logo img').delay('1500').fadeIn('slow');
	});
	jQuery.getScript("/js/eschool/rightnav.js");
</script>
<script type="text/javascript" language="javascript">
	var hs_portalid=108225;
	var hs_salog_version = "2.00";
	var hs_ppa = "globalclassroom.app10.hubspot.com";
	document.write(unescape("%3Cscript src='" + document.location.protocol + "//" + hs_ppa + "/salog.js.aspx' type='text/javascript'%3E%3C/script%3E"));
</script>
<script>
	$(document).ready(function () {
	
	    (function ($) {
	
	        $('#filter').keyup(function () {
	
	            var rex = new RegExp($(this).val(), 'i');
	            $('.searchable tr').hide();
	            $('.searchable tr').filter(function () {
	                return rex.test($(this).text());
	            }).show();
	
	        })
	
	    }(jQuery));
	
	});
	
</script>