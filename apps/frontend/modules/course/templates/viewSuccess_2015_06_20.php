<?php
global $CFG;
$current_user = $CFG->current_app->getCurrentUser();
$enrol_count = count($current_user->getEnrolments());
$course_creator = $CFG->current_app->hasPrivilege('EclassroomUser');

//libraries list
/* $libraries_list = array(
	"home" => "Microsoft E-learning Centre",
 	"acctandfinance" => "Accounting and Finance",
	"careerready" => "Career Readiness", 
	"coding" => "Coding",
	"customerservice" => "Customer Service",
	"entrepreneurship" => "Entrepreneurship",
	"franklincovey" => "FranklinCovey",
	"humanresources" => "Human Resources",
	"technology" => "Information Technology",
	"leadership" => "Leadership",
	"management" => "Management",
	"mastersubscription" => "Master Subscription (Platinum)",
	"msicrosoft" => "Microsoft - Desktop",
	"microsoftitprof" => "Microsoft - IT Professional",
	"operations" => "Operations",
	"salesandmkt" => "Sales and Marketing",
	"socialmedia" => "Social Media",
	"softwareapps" => "Software Apps",
); */
?>
<link rel="stylesheet" href="/js/masonry/css/style.css" />
<link rel="stylesheet" href="/css/course_view.css" />
<link rel="stylesheet" href="/css/course_detail.css" />

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

<section id="content">
<div id="gc_course_list">
    <div id="gc_course_list_settings" style="margin: 0 70px">
        <div id="gc_my_course_toggle" <?php print ($CFG->current_app->hasPrivilege('Student')) ? '' : ' style="display:none"';?>>
            <h3>
            <?php /*
			<input id="gc_search_courses" type="radio" name="gc_my_course_toggle" checked="checked" value="search" /><label for="gc_search_courses">Search Courses</label>
            <input id="gc_my_courses" type="radio" name="gc_my_course_toggle"
                <?php print ($params['mode'] == 'Student') ? ' checked="checked"' : ''; ?> value="my" /><label for="gc_my_courses">My Courses</label>
			*/ ?>	
            <?php
            if ($course_creator)
            {
                ?>
                <input id="gc_create_course_button" type="radio" name="gc_my_course_toggle" value="create" /><label for="gc_create_course_button">Create New Course</label>
                <?php
            } ?>
            </h3>
        </div>
        <div class="clearfix"></div>
		
		<br>
		<div class="page_header_title">
			AVAILABLE COURSES
		</div>
		<div class="page_header_title_subline">
			<a href="">Please click here for platinum subscription</a>
			<a href="#" class="tooltip">
				<img src="<?php print $CFG->current_app->getAppUrl(); ?>theme/globalclassroom/static/images/questionmark3.png" width="25px" />
				<span>
					<strong>Platinum Subscription</strong><br />
					gives you access to all the courses in all the libraries.
				</span>
			</a>
		</div>	
		<div class="clearfix"></div>
		<br>
		<div class="colorbar1"></div>
		<br><br>
		<div class="clearfix"></div>
		
        <input id="gc_course_id" type="hidden" value="<?php print ($course) ? $course->getObject()->id : ''; ?>">		
		<div class="clearfix"></div>
		
		<?php
		$lib_ctlg_crse_lists = array();
		$cert_lib_ctlg_crse_lists = array();
		$ind_lib_ctlg_crse_lists = array();
		foreach($libraries_list as $library_list_key=>$library_list_val)
		{
			$institution_name = $library_list_key;
			$mhr_institution_obj = $CFG->current_app->selectFromMhrTable('institution', 'name', $institution_name, true);
			if ($mhr_institution_obj)
			{
				$mhr_institution = new GcrMhrInstitution($mhr_institution_obj, $CFG->current_app);
				$potential_eschools = array();
				$current_eschools = array();
				// Check if users do not exist on the eschool, and get potential users in properly formatted form
				$eschools = $mhr_institution->getEschools();
				if ($eschools)
				{
					foreach ($eschools as $eschool)
					{
						$current_eschools[$eschool->getShortName()] = $eschool->getFullName();
					}
				}
				$eschools = $CFG->current_app->getMnetEschools();
				if ($eschools)
				{
					foreach ($eschools as $eschool)
					{
						if (!array_key_exists($eschool->getShortName(), $current_eschools))
						{
							$potential_eschools[$eschool->getShortName()] = $eschool->getFullName();
						}
					}
				}
				asort($potential_eschools);
				asort($current_eschools);
				foreach($current_eschools as $current_eschool_key=>$current_eschool_val) 
				{
					if(stripos(strtolower($current_eschool_val), "$") !== false) {
						if(stripos(strtolower($current_eschool_val), "certification$") !== false) {
							if(isset($catalog_courses_count[$current_eschool_key]) && $catalog_courses_count[$current_eschool_key] > 0) {
								$cert_lib_ctlg_crse_lists[$library_list_key][$current_eschool_key] = $current_eschool_val;
							}
						} else {
							if((stripos(strtolower($current_eschool_val), "$") !== false && stripos(strtolower($current_eschool_val), "certification$") !== true) && isset($catalog_courses_count[$current_eschool_key]) && $catalog_courses_count[$current_eschool_key] > 0) {
								$ind_lib_ctlg_crse_lists[$library_list_key][$current_eschool_key] = $current_eschool_val;
							}
						}
					} else {
						if(isset($catalog_courses_count[$current_eschool_key]) && $catalog_courses_count[$current_eschool_key] > 0) {
							$lib_ctlg_crse_lists[$library_list_key][$current_eschool_key] = $current_eschool_val;
						}
					}
				}				
			}
		}

		foreach($lib_ctlg_crse_lists as $lib_ctlg_crse_list_key=>$lib_ctlg_crse_list_val)
		{
		?>			
			<div class="library-div">
				<div class="clearfix"></div>
				<div style="width:40%;float:left;position: relative;">
					<h1><?php echo $libraries_list[$lib_ctlg_crse_list_key]; ?></h1>
				</div>
				<div style="width:20%;float:left;position: relative;">				
					<span class="myfont2">
						<a href="/course/coursesList?lib_id=<?php echo $lib_ctlg_crse_list_key; ?>" class="tooltip">
							(Show Listing)
							<span>
							<strong>Click this link</strong><br />
							to see a listing of all the courses available in this library or to enrol in a specific course in the library.
							</span>
						</a>
					</span>
				</div>
				<div style="width:40%;float:right;position: relative;">
					<?php if($lib_ctlg_crse_list_key != "home") { ?>
					<button id="register_catalog" value="Register" class="register-button">Register</button>
					<?php } ?>
				</div>				
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			<?php
			foreach($lib_ctlg_crse_list_val as $catalog_list_key=>$catalog_list_val) 
			{
			?>
			<div id="wrap0">
				<span class="myfont1">
				<?php
				print $catalog_list_val;
				print "&nbsp;&nbsp;&nbsp;&nbsp;";
				print "<span class='count'>";
				print $catalog_courses_count[$catalog_list_key];
				if($catalog_courses_count[$catalog_list_key] > 1) {
					print " Courses";
				} else {
					print " Course";
				}				
				print "</span>";
				?>
				</span>
				<span class="myfont2">
					<a href="/course/coursesList?mode=Eschool&mode_id=<?php echo $catalog_list_key; ?>" class="tooltip">
						(Show Listing)
						<span>
						<strong>Click this link</strong><br />
						to see a listing of all the courses available in this library or to enrol in a specific course in the library.
						</span>
					</a>
				</span>
			</div>
			<?php
			}
			?>
			<div class="clearfix"></div>
			<br><br>
			<div class="colorbar1"></div>
			<br><br>		
			<div class="clearfix"></div>
		<?php
		}
		
 		foreach($cert_lib_ctlg_crse_lists as $cert_lib_ctlg_crse_list_key=>$cert_lib_ctlg_crse_list_val)
		{
		?>			
			<div class="library-div">
				<div class="clearfix"></div>
				<div style="width:40%;float:left;position: relative;">
					<?php /* <h1><?php echo $libraries_list[$cert_lib_ctlg_crse_list_key]; ?></h1> */ ?>
					<h1>Certifications</h1>
				</div>
				<div style="width:20%;float:left;position: relative;">				
					<?php /* <span class="myfont2">
						<a href="/course/coursesList?lib_id=<?php echo $cert_lib_ctlg_crse_list_key; ?>" class="tooltip">
							(Show Listing)
							<span>
							<strong>Click this link</strong><br />
							to see a listing of all the courses available in this library or to enrol in a specific course in the library.
							</span>
						</a>
					</span> */ ?>
				</div>
				<div style="width:40%;float:right;position: relative;">
					<?php /* if($cert_lib_ctlg_crse_list_key != "home") { ?>
					<button id="register_catalog" value="Register" class="register-button">Register</button>
					<?php } */ ?>
				</div>				
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			<?php
			foreach($cert_lib_ctlg_crse_list_val as $catalog_list_key=>$catalog_list_val) 
			{
			?>
			<div id="wrap0">
				<span class="myfont1">
				<?php
				print substr($catalog_list_val, 14, strlen($catalog_list_val));
 				print "&nbsp;&nbsp;&nbsp;&nbsp;";
/*				print "<span class='count'>";
				print $catalog_courses_count[$catalog_list_key];
				if($catalog_courses_count[$catalog_list_key] > 1) {
					print " Courses";
				} else {
					print " Course";
				}				
				print "</span>"; */
				?>
				<button>Enroll</button>
				</span>
				<?php /* <span class="myfont2">
					<a href="/course/coursesList?mode=Eschool&mode_id=<?php echo $catalog_list_key; ?>" class="tooltip">
						(Show Listing)
						<span>
						<strong>Click this link</strong><br />
						to see a listing of all the courses available in this library or to enrol in a specific course in the library.
						</span>
					</a>
				</span> */ ?>
			</div>
			<?php
			}
			?>
			<div class="clearfix"></div>
			<br><br>
			<div class="colorbar1"></div>
			<br><br>		
			<div class="clearfix"></div>
		<?php
		}		
		
		foreach($ind_lib_ctlg_crse_lists as $ind_lib_ctlg_crse_list_key=>$ind_lib_ctlg_crse_list_val)
		{
		?>			
			<div class="library-div">
				<div class="clearfix"></div>
				<div style="width:40%;float:left;position: relative;">
					<?php /* <h1><?php echo $libraries_list[$ind_lib_ctlg_crse_list_key]; ?></h1> */ ?>
					<h1>Individual Courses</h1>
				</div>
				<div style="width:20%;float:left;position: relative;">				
					<?php /* <span class="myfont2">
						<a href="/course/coursesList?lib_id=<?php echo $ind_lib_ctlg_crse_list_key; ?>" class="tooltip">
							(Show Listing)
							<span>
							<strong>Click this link</strong><br />
							to see a listing of all the courses available in this library or to enrol in a specific course in the library.
							</span>
						</a>
					</span> */ ?>
				</div>
				<div style="width:40%;float:right;position: relative;">
					<?php /* if($ind_lib_ctlg_crse_list_key != "home") { ?>
					<button id="register_catalog" value="Register" class="register-button">Register</button>
					<?php } */ ?>
				</div>				
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			<?php
			foreach($ind_lib_ctlg_crse_list_val as $catalog_list_key=>$catalog_list_val) 
			{
			?>
			<div id="wrap0">
				<span class="myfont1">
				<?php
				print substr($catalog_list_val, 1, strlen($catalog_list_val));
				print "&nbsp;&nbsp;&nbsp;&nbsp;";
/* 				print "<span class='count'>";
				print $catalog_courses_count[$catalog_list_key];
				if($catalog_courses_count[$catalog_list_key] > 1) {
					print " Courses";
				} else {
					print " Course";
				}
				print "</span>"; */
				?>
				<button>Enroll</button>
				</span>
				<?php /*
				<span class="myfont2">
					<a href="/course/coursesList?mode=Eschool&mode_id=<?php echo $catalog_list_key; ?>" class="tooltip">
						(Show Listing)
						<span>
						<strong>Click this link</strong><br />
						to see a listing of all the courses available in this library or to enrol in a specific course in the library.
						</span>
					</a>
				</span>
				*/ ?>
			</div>
			<?php
			}
			?>
			<div class="clearfix"></div>
			<br><br>
			<div class="colorbar1"></div>
			<br><br>		
			<div class="clearfix"></div>
		<?php
		}
		?>

    </div>
    <div id="gc_course_list_container" class="transitions-enabled infinite-scroll clearfix centered"></div>
    


<script>
jQuery(function()
{
    var $container = jQuery('#gc_course_list_container');
    var category_array = [];
    
    <?php
    GcrJavascriptBlockFactory::printBlock('CourseCategoryArray');
    ?>
            
    jQuery('#gc_course_visibility_selector').css('visibility', 'visible');
    
    jQuery("input[name='gc_course_visibility_selector']").change(function()
    {
        reloadCourseList();
    });
    
    jQuery('#gc_my_course_toggle').change(function ()
    {
        var my_course_toggle = jQuery('input:radio[name=gc_my_course_toggle]:checked').val();
        if (my_course_toggle == 'create')
        {
            document.location.href = '<?php print $CFG->current_app->getAppUrl(); ?>artefact/courses/create.php';
        }
        else
        {
            if (my_course_toggle == 'my')
            {
                jQuery('#gc_course_catalog_selector').hide();
            }

            else
            {
                jQuery('#gc_course_catalog_selector').show();
            }

            // reset catalog selector to "all catalogs"
            jQuery('#gc_course_catalogs').val('1');

            // Reset visibility toogle to active courses
            jQuery("input[name=gc_course_visibility_selector][value=visible]").attr('checked', 'checked');
            jQuery("#gc_course_visibility_selector").buttonset("refresh");

            resetCategoryList();
            reloadCourseList();
        }
    });        


});
</script>
</div>
</section> <!-- #content -->