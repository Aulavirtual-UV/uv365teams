<?php
require_once('../../config.php');
require_once($CFG->dirroot . '/local/uv365teams/activeteams_form.php');
$idnumber      = optional_param('idnumber',null, PARAM_TEXT);

$course        = $DB->get_record('course', array('idnumber'=>$idnumber), '*', MUST_EXIST);
$return        = new moodle_url('/course/view.php', array('cid'=>$idnumber));
$teamsSettings = $DB->get_record('uv_o365', array('idnumber'=>$idnumber,'accion'=>'CREAGROUP'));

if (!$teamsSettings) {
    #DRG inicializacion de valores
    $teamsSettings = new stdClass();
    $teamsSettings->idnumber = $idnumber;
    $teamsSettings->enabled  = 'f';
    $teamsSettings->estado   = 'none';
    $teamsSettings->email    = $USER->email;
}

$coursecontext = context_course::instance($course->id);

require_login($course);
require_capability('moodle/course:update', $coursecontext);

$PAGE->set_pagelayout('admin');
$PAGE->set_url('/local/uv365teams/activeteams.php', array('idnumber'=>$idnumber));
$PAGE->set_title(get_string('admintreelabel', 'local_uv365teams'));
$PAGE->set_heading($course->fullname);

echo $OUTPUT->header();
$mform = new local_uv365teams_activeteams_edit_form(new moodle_url('activeteams.php', array ('idnumber' => $idnumber)),array($teamsSettings));

if ($mform->is_cancelled()) {
    // form cancelled, redirect
    redirect($return);
} else if ($data = $mform->get_data()) {
    // form has been submitted
    if (isset($teamsSettings->id)) {
        $data->id     = $teamsSettings->id;
        $DB->update_record('uv_o365', $data);
    } else {
        #idnumber,email se insertan en el form con set_data
        #INSERT INTO mdl_uv_o365 (idnumber,email,enabled,estado,accion,nombre) VALUES($1,$2,$3,$4,$5,$6)
        $data->estado     = 'none'; #estado inicial none, done una vez creado
        $data->accion     = 'CREAGROUP'; 
        $data->nombre     = $course->shortname;
        $DB->insert_record('uv_o365', $data);
        
        $message = get_string('descripcionInProgressMessage', 'local_uv365teams');
        redirect(new moodle_url('activeteams.php', array ('idnumber' => $idnumber)),$message);
    }
} else {
    // form has not been submitted, just display it
    $mform->display();

}

echo $OUTPUT->footer();


