<?php

// Global Classroom Enrolment Plugin
// Ron Stewart
// May 19, 2011

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir.'/formslib.php');

class enrol_globalclassroom_edit_form extends moodleform {

    function definition()
    {
        $mform = $this->_form;

        list($instance, $plugin, $context) = $this->_customdata;

        $mform->addElement('header', 'header', get_string('pluginname', 'enrol_globalclassroom'));

        $mform->addElement('text', 'name', get_string('custominstancename', 'enrol'));

        $options = array(ENROL_INSTANCE_ENABLED  => get_string('yes'),
                         ENROL_INSTANCE_DISABLED => get_string('no'));
        $mform->addElement('select', 'status', get_string('status', 'enrol_globalclassroom'), $options);
        $mform->setDefault('status', $plugin->get_config('status'));

        $mform->addElement('passwordunmask', 'password', get_string('password', 'enrol_globalclassroom'));
        $mform->addHelpButton('password', 'password', 'enrol_globalclassroom');
        if (empty($instance->id) and $plugin->get_config('requirepassword')) {
            $mform->addRule('password', get_string('required'), 'required', null, 'client');
        }
        $options = array(1 => get_string('yes'),
                         0 => get_string('no'));
        $mform->addElement('select', 'customint1', get_string('groupkey', 'enrol_globalclassroom'), $options);
        $mform->addHelpButton('customint1', 'groupkey', 'enrol_globalclassroom');
        $mform->setDefault('customint1', $plugin->get_config('groupkey'));

        $options = array(1 => get_string('yes'),
                         0 => get_string('no'));
        $mform->addElement('select', 'customchar1', get_string('freeformembers', 'enrol_globalclassroom'), $options);
        $mform->setDefault('customchar1', $plugin->get_config('freeformembers'));

        $mform->addElement('text', 'cost', get_string('cost', 'enrol_globalclassroom'), array('size'=>4));
        $mform->setDefault('cost', $plugin->get_config('cost'));
        $paypalcurrencies = array('USD' => 'US Dollars',
                                  'EUR' => 'Euros',
                                  'JPY' => 'Japanese Yen',
                                  'GBP' => 'British Pounds',
                                  'CAD' => 'Canadian Dollars',
                                  'AUD' => 'Australian Dollars'
                                 );
        $mform->addElement('select', 'currency', get_string('currency', 'enrol_globalclassroom'), $paypalcurrencies);
        $mform->setDefault('currency', $plugin->get_config('currency'));


        if ($instance->id)
        {
            $roles = get_default_enrol_roles($context, $instance->roleid);
        }
        else
        {
            $roles = get_default_enrol_roles($context, $plugin->get_config('roleid'));
        }
        $mform->addElement('select', 'roleid', get_string('assignrole', 'enrol_globalclassroom'), $roles);
        $mform->setDefault('roleid', $plugin->get_config('roleid'));


        $mform->addElement('duration', 'enrolperiod', get_string('enrolperiod', 'enrol_globalclassroom'), array('optional' => true, 'defaultunit' => 86400));
        $mform->setDefault('enrolperiod', $plugin->get_config('enrolperiod'));


        $mform->addElement('date_selector', 'enrolstartdate', get_string('enrolstartdate', 'enrol_globalclassroom'), array('optional' => true));
        $mform->setDefault('enrolstartdate', 0);


        $mform->addElement('date_selector', 'enrolenddate', get_string('enrolenddate', 'enrol_globalclassroom'), array('optional' => true));
        $mform->setDefault('enrolenddate', 0);
        $options = array(0 => get_string('never'),
                 1800 * 3600 * 24 => get_string('numdays', '', 1800),
                 1000 * 3600 * 24 => get_string('numdays', '', 1000),
                 365 * 3600 * 24 => get_string('numdays', '', 365),
                 180 * 3600 * 24 => get_string('numdays', '', 180),
                 150 * 3600 * 24 => get_string('numdays', '', 150),
                 120 * 3600 * 24 => get_string('numdays', '', 120),
                 90 * 3600 * 24 => get_string('numdays', '', 90),
                 60 * 3600 * 24 => get_string('numdays', '', 60),
                 30 * 3600 * 24 => get_string('numdays', '', 30),
                 21 * 3600 * 24 => get_string('numdays', '', 21),
                 14 * 3600 * 24 => get_string('numdays', '', 14),
                 7 * 3600 * 24 => get_string('numdays', '', 7));
        $mform->addElement('select', 'customint2', get_string('longtimenosee', 'enrol_globalclassroom'), $options);
        $mform->setDefault('customint2', $plugin->get_config('longtimenosee'));
        $mform->addHelpButton('customint2', 'longtimenosee', 'enrol_globalclassroom');

        $mform->addElement('text', 'customint3', get_string('maxenrolled', 'enrol_globalclassroom'));
        $mform->setDefault('customint3', $plugin->get_config('maxenrolled'));
        $mform->addHelpButton('customint3', 'maxenrolled', 'enrol_globalclassroom');
        $mform->setType('customint3', PARAM_INT);

        $mform->addElement('advcheckbox', 'customint4', get_string('sendcoursewelcomemessage', 'enrol_globalclassroom'));
        $mform->setDefault('customint4', $plugin->get_config('sendcoursewelcomemessage'));
        $mform->addHelpButton('customint4', 'sendcoursewelcomemessage', 'enrol_globalclassroom');

        $mform->addElement('textarea', 'customtext1', get_string('customwelcomemessage', 'enrol_globalclassroom'), array('cols'=>'60', 'rows'=>'8'));


        $mform->addElement('hidden', 'id');
        $mform->addElement('hidden', 'courseid');

        $this->add_action_buttons(true, ($instance->id ? null : get_string('addinstance', 'enrol')));

        $this->set_data($instance);
    }

    function validation($data, $files)
    {
        global $DB, $CFG;
        $errors = parent::validation($data, $files);

        list($instance, $plugin, $context) = $this->_customdata;
        $checkpassword = false;

        if ($instance->id)
        {
            if ($data['status'] == ENROL_INSTANCE_ENABLED)
            {
                if ($instance->password !== $data['password'])
                {
                    $checkpassword = true;
                }
            }
        }
        else
        {
            if ($data['status'] == ENROL_INSTANCE_ENABLED)
            {
                $checkpassword = true;
            }
        }

        if ($checkpassword)
        {
            $require = $plugin->get_config('requirepassword');
            $policy  = $plugin->get_config('usepasswordpolicy');
            if ($require and trim($data['password']) === '')
            {
                $errors['password'] = get_string('required');
            }
            else if ($policy)
            {
                $errmsg = '';//prevent eclipse warning
                if (!check_password_policy($data['password'], $errmsg))
                {
                    $errors['password'] = $errmsg;
                }
            }
        }

        if ($data['status'] == ENROL_INSTANCE_ENABLED)
        {
            if (!empty($data['enrolenddate']) and $data['enrolenddate'] < $data['enrolstartdate'])
            {
                $errors['enrolenddate'] = get_string('enrolenddaterror', 'enrol_globalclassroom');
            }
        }

        if (!is_numeric($data['cost']))
        {
            $errors['cost'] = get_string('costerror', 'enrol_globalclassroom');
        }

        return $errors;
    }
}