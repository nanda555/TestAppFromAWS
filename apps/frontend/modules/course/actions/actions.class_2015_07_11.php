<?php

/**
 * course actions.
 *
 * @package    globalclassroom
 * @subpackage course
 * @author     Ron Stewart
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class courseActions extends sfActions
{
    public function executeGetUsernames(sfWebRequest $request)
    {
        global $CFG;
        $CFG->current_app->requireMoodle();
        $CFG->current_app->requireLogin();
        if ($CFG->current_app->hasPrivilege('EschoolAdmin'))
        {
            $this->params = $request->getGetParameters();
            $id = $this->params['course'];
            if (is_numeric($id))
            {
                $sn = $CFG->current_app->getShortName();
                $sql = 'select distinct firstname, lastname, username ' . 
                       'from ' . $sn . '.mdl_user_enrolments ue, ' . 
                       $sn . '.mdl_user u, ' .
                       $sn . '.mdl_enrol e where ue.enrolid = e.id ' .
                       'and u.id = ue.userid and e.courseid = ' . $id . 
                       ' and u.deleted = 0';
                $results = $CFG->current_app->gcQuery($sql);

            }
            foreach ($results as $result)
            {
                print '<br>' . $result->username . ',' . $result->lastname . ',' . $result->firstname;
            }
        }
        die;
    }
	
    public function executeView(sfWebRequest $request)
    {
        /*global $CFG;
        $CFG->current_app->requireMahara();
        $this->params = $request->getGetParameters();
        $this->course = false;
        if (isset($this->params['course']) && isset($this->params['catalog']))
        {
            $eschool = GcrEschoolTable::getEschool($this->params['catalog'], true);
            if ($eschool)
            {
                $course = $eschool->getCourse($this->params['course']);
                if ($course)
                {
                    $this->course = $course;
                }
            }
        }
		$eschool_array = array();
		$catalog_courses_count = array();
		foreach($CFG->current_app->getMnetEschools() as $eschool)
		{
			if (GcrEschoolTable::authorizeEschoolAccess($eschool, true))
			{
				$eschool_array[$eschool->getFullName()] = $eschool;
			}
		} 
		ksort($eschool_array);
		foreach($eschool_array as $eschool) {
			//$catalog_courses_count[$eschool->getShortName()] = $eschool->getFullName();
			$catalog_courses_count[$eschool->getShortName()] = $this->getHTMLCoursesCount($eschool->getShortName());
		}
		$this->catalog_courses_count = $catalog_courses_count;
		$products = GcrProductsTable::getProducts();
		$products_list = array();
 		foreach($products as $product) {
			$products_list[$product->getShortName()] = $product->getFullName();
		}
		$this->libraries_list = $products_list;
        $this->getResponse()->setTitle('Courses');
        sfConfig::set('sf_escaping_strategy', false);*/
        global $CFG;
        $CFG->current_app->requireMahara();
        $this->params = $request->getGetParameters();
        $this->course = false;
        if (isset($this->params['course']) && isset($this->params['catalog']))
        {
            $eschool = GcrEschoolTable::getEschool($this->params['catalog'], true);
            if ($eschool)
            {
                $course = $eschool->getCourse($this->params['course']);
                if ($course)
                {
                    $this->course = $course;
                }
            }
        }
		$eschool_array = array();
		$catalog_courses_count = array();
		foreach($CFG->current_app->getMnetEschools() as $eschool)
		{
			if (GcrEschoolTable::authorizeEschoolAccess($eschool, true))
			{
				$eschool_array[$eschool->getFullName()] = $eschool;
			}
		} 
		ksort($eschool_array);
		foreach($eschool_array as $eschool) {
			//$catalog_courses_count[$eschool->getShortName()] = $eschool->getFullName();
			$catalog_courses_count[$eschool->getShortName()] = $this->getHTMLCoursesCount($eschool->getShortName());
		}
		$this->catalog_courses_count = $catalog_courses_count;
		$ind_products = GcrProductsTable::getProductIndividuals();
		$cert_products = GcrProductsTable::getProductCertifications();
		$ind_products_list = array();
		$cert_products_list = array();
		$ind_products_details = array();
		$cert_products_details = array();
 		foreach($ind_products as $product) {
			$ind_products_list[$product->getShortName()] = $product->getFullName();
			$ind_products_details[$product->getShortName()]["id"] = $product->getId();
			$ind_products_details[$product->getShortName()]["short_name"] = $product->getShortName();
			$ind_products_details[$product->getShortName()]["full_name"] = $product->getFullName();
			$ind_products_details[$product->getShortName()]["description"] = $product->getDescription();
			$ind_products_details[$product->getShortName()]["cost"] = $product->getCost();
			$ind_products_details[$product->getShortName()]["pricing_html"] = $product->getPricingHtml();
			$ind_products_details[$product->getShortName()]["icon"] = $product->getIcon();
		}
 		foreach($cert_products as $product) {
			$cert_products_list[$product->getShortName()] = $product->getFullName();
			$cert_products_details[$product->getShortName()]["id"] = $product->getId();
			$cert_products_details[$product->getShortName()]["short_name"] = $product->getShortName();
			$cert_products_details[$product->getShortName()]["full_name"] = $product->getFullName();
			$cert_products_details[$product->getShortName()]["description"] = $product->getDescription();
			$cert_products_details[$product->getShortName()]["cost"] = $product->getCost();
			$cert_products_details[$product->getShortName()]["pricing_html"] = $product->getPricingHtml();
			$cert_products_details[$product->getShortName()]["icon"] = $product->getIcon();
		}		
		$this->ind_products_list = $ind_products_list;
		$this->cert_products_list = $cert_products_list;
		$this->ind_products_details = $ind_products_details;
		$this->cert_products_details = $cert_products_details;
        $this->getResponse()->setTitle('Courses');
        sfConfig::set('sf_escaping_strategy', false);		
    }
	
    public function executeSubscriptions(sfWebRequest $request)
    {
        global $CFG;
        $CFG->current_app->requireMahara();
        $this->params = $request->getGetParameters();
        $this->course = false;
        if (isset($this->params['course']) && isset($this->params['catalog']))
        {
            $eschool = GcrEschoolTable::getEschool($this->params['catalog'], true);
            if ($eschool)
            {
                $course = $eschool->getCourse($this->params['course']);
                if ($course)
                {
                    $this->course = $course;
                }
            }
        }
		$eschool_array = array();
		$catalog_courses_count = array();
		foreach($CFG->current_app->getMnetEschools() as $eschool)
		{
			if (GcrEschoolTable::authorizeEschoolAccess($eschool, true))
			{
				$eschool_array[$eschool->getFullName()] = $eschool;
			}
		} 
		ksort($eschool_array);
		foreach($eschool_array as $eschool) {
			//$catalog_courses_count[$eschool->getShortName()] = $eschool->getFullName();
			$catalog_courses_count[$eschool->getShortName()] = $this->getHTMLCoursesCount($eschool->getShortName());
		}
		$this->catalog_courses_count = $catalog_courses_count;
		$products = GcrProductsTable::getProductLibraries();
		$products_list = array();
		$products_details = array();
 		foreach($products as $product) {
			$products_list[$product->getShortName()] = $product->getFullName();
			$products_details[$product->getShortName()]["id"] = $product->getId();
			$products_details[$product->getShortName()]["short_name"] = $product->getShortName();
			$products_details[$product->getShortName()]["full_name"] = $product->getFullName();
			$products_details[$product->getShortName()]["description"] = $product->getDescription();
			$products_details[$product->getShortName()]["cost"] = $product->getCost();
			$products_details[$product->getShortName()]["pricing_html"] = $product->getPricingHtml();
			$products_details[$product->getShortName()]["icon"] = $product->getIcon();
		}
		$this->libraries_list = $products_list;
		$this->products_details = $products_details;
        $this->getResponse()->setTitle('Courses');
        sfConfig::set('sf_escaping_strategy', false);
    }	
	
    public function executeCoursesGrid(sfWebRequest $request)
    {
        global $CFG;
        $CFG->current_app->requireMahara();
        $params = array();
        foreach (GcrCourseList::getParameterList() as $key => $value)
        {
            $params[$key] = $request->getParameter($key);
        }
		$params["list_size"] = 0;
        $courses_list = new GcrCourseList($params, $CFG->current_app);
		$this->courses_list = $courses_list->getCourseList();
		$this->request_params = $params;
		$this->getResponse()->setTitle('Courses');
        sfConfig::set('sf_escaping_strategy', false);
    }
	
    public function executeCoursesList(sfWebRequest $request)
    {
        global $CFG;
        $CFG->current_app->requireMahara();
        $params = array();
        $lib_ctlg_courses_list = array();
		$catalog_courses_count = array();
		$current_eschools = array();
        foreach (GcrCourseList::getParameterList() as $key => $value)
        {
            $params[$key] = $request->getParameter($key);
        }
		$params["list_size"] = 4;
		if(isset($params["lib_id"]) && !empty($params["lib_id"])) {
 			$mhr_institution_obj = $CFG->current_app->selectFromMhrTable('institution', 'name', $params["lib_id"], true);
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
					$sub_params = array();
					$sub_params = $params;
					$sub_params["mode"] = "Eschool";
					$sub_params["mode_id"] = $current_eschool_key;
					$courses_list = new GcrCourseList($sub_params, $CFG->current_app);
					$lib_ctlg_courses_list[$current_eschool_key] = $courses_list->getCourseList();
					$catalog_courses_count[$current_eschool_key] = $this->getHTMLCoursesCount($current_eschool_key);
				}
			}
		} else {
			$courses_list = new GcrCourseList($params, $CFG->current_app);
			//$this->lib_courses_list[] = array($params["mode_id"]=>$courses_list->getCourseList());
			$lib_ctlg_courses_list[$params["mode_id"]] = $courses_list->getCourseList();
			$catalog_courses_count[$params["mode_id"]] = $this->getHTMLCoursesCount($params["mode_id"]);
			$eschools = $CFG->current_app->getMnetEschools();
			if ($eschools)
			{
				foreach ($eschools as $eschool)
				{
					$current_eschools[$eschool->getShortName()] = $eschool->getFullName();
				}
			}
		}
		$this->lib_courses_list = $lib_ctlg_courses_list;
		$this->catalog_courses_count = $catalog_courses_count;
		$this->current_eschools = $current_eschools;
		$this->request_params = $params;
		$this->getResponse()->setTitle('Courses');
        sfConfig::set('sf_escaping_strategy', false);
    }	
	
    public function executeGetCourses(sfWebRequest $request)
    {
        $this->forward404Unless($request->isXmlHttpRequest());
        global $CFG;
        $CFG->current_app->requireMahara();
        $params = array();
        foreach (GcrCourseList::getParameterList() as $key => $value)
        {
            $params[$key] = $request->getParameter($key);
        }
        if (!$params['include_closed'])
        {
            if ($CFG->current_app->hasPrivilege('EschoolStaff'))
            {
                $params['include_closed'] = true;
            }
        }
        $course_list = new GcrCourseList($params, $CFG->current_app);
        $course_list_array = $course_list->toArray();
        $this->getResponse()->setHttpHeader('Content-type', 'application/json');
        return $this->renderText(json_encode($course_list_array));
        
    }
    // This action assembles a json object which contains all data about
    // a course collection, for use in course listings. 
    public function executeGetHTMLCourseSummary(sfWebRequest $request)
    {
        $return_array = array();
        $eschool_id = $request->getParameter('eschool_id');
        $course_id = $request->getParameter('course_id');
        $eschool = GcrEschoolTable::getEschool($eschool_id);
        $course = $eschool->getCourse($course_id);
        
        $this->forward404Unless($course);
        $course_collection = $course->getCourseCollection();
        $course_instances = array();
        $courses = array($course);
        if ($course_collection)
        {
            if (!$course->isRepresentative())
            {
                $course = $course_collection->getRepresentativeCourse();
            }
            $courses = $course_collection->getCourses();
            $category = $course_collection->getCourseCategory();
            $summary = $category->getDescription();
            $summary_edit_url = $category->getApp()->getAppUrl() . 
                    '/course/editcategory.php?id=' . $category->getObject()->id;
        }
        $course_obj = $course->getObject();
        if (empty($summary))
        {
            $summary = $course->getDescription();
            $summary_edit_url = $course->getApp()->getAppUrl() . 
                    '/course/edit.php?id=' . $course->getObject()->id;
        }
        foreach ($courses as $course_instance)
        {
            $course_instance_array = array();
            $teacher = $course_instance->getInstructor();
            if ($teacher)
            {
                $course_instance_array['instructor'] = array(
                    'id' => $teacher->getObject()->id,
                    'profile_html' => GcrEschoolTable::getInstructorProfileHtml($teacher),
                    'app' => $teacher->getApp()->getShortName());
            }
            $cost = $course_instance->getCost();
            $course_instance_array['cost'] = ($cost) ? $cost : 0;
            $course_instance_array['visible'] = $course_instance->isVisible();
            $course_instance_array['enrolment_count'] = count($course_instance->getActiveUsersInCourse());
            $course_instance_array['admin'] = $this->canAdministerCourse($course_instance);
            $course_instance_array['enrolment_status'] = $this->getEnrolmentStatus($course_instance);
            $course_instance_array['shortname'] = $course_instance->getObject()->shortname;
            $course_instance_array['start_date'] = $course_instance->getObject()->startdate;
            $course_instances[$course_instance->getObject()->id] = $course_instance_array;
        }
        $return_array['eschool_id'] = $course->getApp()->getId();
        $return_array['course_instances'] = $course_instances;
        $return_array['summary'] = $summary;
        $return_array['summary_edit_url'] = $summary_edit_url;
        $return_array['course_fullname'] = $course_obj->fullname;
        
        $return_array['rep_course_id'] = $course->getObject()->id;
        $return_array['category_id'] = $course_obj->category;
        
        $this->getResponse()->setHttpHeader('Content-type', 'application/json');
        return $this->renderText(json_encode($return_array));
    }
    
    protected function canAdministerCourse(GcrMdlCourse $course)
    {
        global $CFG;
        $current_user = $CFG->current_app->getCurrentUser();
        return ($course->isTeacher($current_user) || 
                $current_user->getRoleManager()->hasPrivilege('GCUser') ||
                ($current_user->getRoleManager()->hasPrivilege('EschoolAdmin') && 
                $course->getInstitution()->getShortName() == $CFG->current_app->getShortName()));
    }
    protected function getEnrolmentStatus(GcrMdlCourse $course)
    {
        global $CFG;
        $current_user = $CFG->current_app->getCurrentUser();
        if ($current_user->getRoleManager()->hasPrivilege('Student'))
        {
            $mdl_roles = $course->getRoleAssignments($current_user);
            return ($mdl_roles && count($mdl_roles > 0));     
        }
        return false;
    }
    public function executeGetHTMLCourses(sfWebRequest $request)
    {
        global $CFG;
        $CFG->current_app->requireMahara();
        $params = array();
        foreach (GcrCourseList::getParameterList() as $key => $value)
        {
            $params[$key] = $request->getParameter($key);
        }
        $this->course_list = new GcrCourseList($params, $CFG->current_app);
        sfConfig::set('sf_escaping_strategy', false);
    }
    public function getHTMLCoursesCount($mode_id_name)
    {
        global $CFG;
        $CFG->current_app->requireMahara();
        $params = array();
		$params["start_index"] = 0;
		$params["mode"] = "Eschool";
		$params["mode_id"] = $mode_id_name;
        $this->course_list = new GcrCourseList($params, $CFG->current_app);
		return count($this->course_list->getCourseList());
        //sfConfig::set('sf_escaping_strategy', false);
    }

    public function executeRepair(sfWebRequest $request)
    {
        global $CFG;
        $CFG->current_app->requireMoodle();
        $CFG->current_app->requireLogin();
        $current_user = $CFG->current_app->getCurrentUser();

        if (!$course_id = $request->getParameter('course'))
        {
            $this->redirect($CFG->current_app->getAppUrl());
        }
        if (!$this->course = $CFG->current_app->getCourse($course_id))
        {
            $CFG->current_app->gcError('Course ID: ' . $course_id . ' does not exist.', 'gcdatabaseerror');
        }
        if (!$current_user->canEditCourse($this->course))
        {
            $CFG->current_app->gcError('User does not have permission to edit course ID: ' .
                    $course_id . '.', 'gcpageaccessdenied');
        }
        // We need to repress warnings on this function call, otherwise we get a very long list of warnings
        // about using foreach on a NULL variable (when there are no associated records for a question).
        $this->repair_count_question = @$this->course->repairQuestionsWithSrcAttribute();
        $this->repair_count_resource = @$this->course->repairFileReferences('resource', 'course', 'alltext');
        $this->repair_count_section = @$this->course->repairFileReferences('course_sections', 'course', 'summary');
        $this->repair_count_label = @$this->course->repairFileReferences('label', 'course', 'content');
        $this->repair_count_event = @$this->course->repairFileReferences('event', 'courseid', 'description');
        rebuild_course_cache($course_id); // we need to force a cache rebuild on the course, else the changes won't show up
    }
    public function executeHistory(sfWebRequest $request)
    {
        $this->authorizeHistory();
        $this->setupTimePeriod($request);
        $this->course_history_table = new GcrUserCourseHistoryTable($this->user, $this->start_ts,
                $this->end_ts, $this->gc_admin, $this->owner, true, true);
        $this->getResponse()->setTitle($this->user->getObject()->firstname . ' ' .
                $this->user->getObject()->lastname . ' Course History');
    }
    public function executeTranscript(sfWebRequest $request)
    {
        global $CFG;
        $this->authorizeHistory();
        $form = $request->getPostParameters();
        $enrolments = array();
        foreach($form as $key => $value)
        {
            $key_data = explode('&', $key);
            $eschool = GcrEschoolTable::getEschool($key_data[0]);
            $mdl_user_enrolment = $eschool->selectFromMdlTable('user_enrolments', 'id', $key_data[1], true);
            $enrolment = new GcrMdlUserEnrolment($mdl_user_enrolment, $eschool);
            if ($this->is_user)
            {
                $mhr_user = $enrolment->getUser();
                if ($this->user->getObject()->id == $mhr_user->getObject()->id)
                {
                    $enrolments[] = $enrolment;
                }
            }
            else
            {
                $enrolments[] = $enrolment;
            }
        }
        $this->course_history_table = new GcrCourseHistoryTable($enrolments, $this->user, 0,
                false, $this->gc_admin, $this->owner, false);
        $this->course_history_table->printTableAsPdf();
        die;
    }
    private function authorizeHistory()
    {
        global $CFG;
        $CFG->current_app->requireMahara();
        $CFG->current_app->requireLogin();
        $this->current_user = $CFG->current_app->getCurrentUser();
        $role_manager = $this->current_user->getRoleManager();
        $this->gc_admin = $role_manager->hasRole('GCUser');
        $this->owner = $role_manager->hasRole('EschoolAdmin');
        if (!$user_id = $this->request->getParameter('user'))
        {
            $user_id = $this->current_user->getObject()->id;
        }
        $this->is_user = ($user_id == $this->current_user->getObject()->id);
        if (!($this->gc_admin || $this->owner || $this->is_user))
        {
            $CFG->current_app->gcError('Non-privileged attempted access to ' .
                    $short_name . ':' . 'user_id:' . $user_id . ' course history page', 'gcpageaccessdenied');
        }
        if (!$mhr_user_obj = $CFG->current_app->selectFromMhrTable('usr', 'id', $user_id, true))
        {
            $CFG->current_app->gcError('Invalid user id parameter: ' . $user_id .
                    ' on institution ' . $this->app->getShortName(), 'gcdatabaseerror');
        }
        $this->user = new GcrMhrUser($mhr_user_obj, $CFG->current_app);
    }
    private function setupTimePeriod(sfWebRequest $request)
    {
        if ($start_date = $request->getParameter('startdate'))
        {
            $ts = strtotime($start_date);
            $this->start_ts = $ts;
        }
        else
        {
            $this->start_ts = gcr::startDateForApplication;
        }
        if ($end_date = $request->getParameter('enddate'))
        {
            $ts = strtotime($end_date);
            $this->end_ts = $ts;
        }
        else
        {
            $this->end_ts = time();
        }
    }
}
