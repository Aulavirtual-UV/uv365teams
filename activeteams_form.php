<?php

// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Moodle form
 *
 * @license http://www.gnu.org/copyleft/gpl.html GNU Public License
 * @copyright
 * @package
 * @subpackage
 * @author 
 */

defined('MOODLE_INTERNAL') || die();

require_once($CFG->libdir . '/formslib.php');

class local_uv365teams_activeteams_edit_form extends moodleform {
    // Define the form
    function definition() {
        global $USER, $CFG, $COURSE;
        $mform = $this->_form;
        list($teamsSettings) = $this->_customdata;
        $enabled_v  = $teamsSettings->enabled;
        $idnumber_v = $teamsSettings->idnumber;
        $email_v    = $teamsSettings->email;
        
        $mform->addElement('hidden', 'idnumber');
        $mform->setType('idnumber', PARAM_TEXT);
        $mform->addElement('hidden', 'email', $email_v);
        $mform->setType('email', PARAM_RAW);
        
        if ($teamsSettings->enabled=='f' or empty($teamsSettings->enabled)) {
           $mform->addElement('advcheckbox', 'enabled', get_string('enabled', 'local_uv365teams'),  get_string('activateTeams', 'local_uv365teams'), array() , array('f','t'));
           $mform->addHelpButton('enabled', 'enabled', 'local_uv365teams');
           $mform->setDefault('enabled', $teamsSettings->enabled);
           $this->add_action_buttons(true);
        } else {
           $enabledText= "Habilitado";
           $mform->addElement('static', 'enabledText', get_string('enabled', 'local_uv365teams'),  get_string('activateTeamsOn', 'local_uv365teams'));
           $mform->addHelpButton('enabledText', 'enabledText', 'local_uv365teams');
           if ( $teamsSettings->estado == "none") {
             $inProgress= "Pendiente";
             $mform->addElement('static', 'inProgress', get_string('state', 'local_uv365teams'),  get_string('descripcionInProgress', 'local_uv365teams') );
             $mform->addHelpButton('inProgress', 'inProgress', 'local_uv365teams');
             $fechapeticionText=date ("d-m-y H:m:s",strtotime( $teamsSettings->fechapeticion));
             $mform->addElement('static', 'fechapeticionText', get_string('fechapeticion', 'local_uv365teams'), $fechapeticionText);           
             $mform->addHelpButton('fechapeticionText', 'fechapeticionText', 'local_uv365teams');
           } else {
             
             $accionText= "Grupo creado";
             $mform->addElement('static', 'accionText', get_string('accion', 'local_uv365teams'),get_string('descripcionAccion', 'local_uv365teams'));
             $mform->addHelpButton('accionText', 'accionText', 'local_uv365teams');
             
             $fechacreacionText=date ("d-m-y h:m:s",strtotime( $teamsSettings->fechacreacion)); 
             $mform->addElement('static', 'fechacreacionText', get_string('fechacreacion', 'local_uv365teams'), $fechacreacionText);
             $mform->addHelpButton('fechacreacionText', 'fechacreacionText', 'local_uv365teams');
             $url = new moodle_url($teamsSettings->weburl);
             $link = html_writer::link($url,'Teams URL');
             $weburlText= "<a href='$url' target='_blank'>$teamsSettings->weburl</a>";
             $mform->addElement('static', 'weburlText', get_string('weburl', 'local_uv365teams'),$weburlText);
             $mform->addHelpButton('weburlText', 'weburlText', 'local_uv365teams');
             $mform->addHelpButton('weburlhelp', 'weburlhelp', 'local_uv365teams');
           }
           
           $mform->addElement('static', 'emailpeticion', get_string('usuariopeticion', 'local_uv365teams'),  $teamsSettings->email);
           $mform->addHelpButton('emailpeticion', 'emailpeticion', 'local_uv365teams');
           
           echo "<CENTER><form method='post' action='/course/view.php?cid=$teamsSettings->idnumber'>
                 <button type='submit' class='btn btn-primary' id='single_button5f6ddd546104618' title=''>".get_string('volverAlCurso', 'local_uv365teams')."</button>
                 </form></CENTER>
             ";         
        }
        $this->set_data($teamsSettings);        
        // Uncomment to disable "Are you sure?" alrert if someone tries to leave the page.
        // $mform->disable_form_change_checker();

    }
}
