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
 * Library function for reminders cron function.
 *
 * @package    local
 * @subpackage uv365teams
 * @copyright  2020 Dario Roig Garcia
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
#DRG https://docs.moodle.org/dev/Local_plugins 
#DRG copiado de local/remote_backup_provider/
#DRG lib/uv2.php controla que se muestre en el curso el icono de teams
defined('MOODLE_INTERNAL') || die();

function local_uv365teams_extend_navigation_course($navigation, $course, $context) {
    #m("DRG modificando menu curso admin");
    global $USER,$COURSE;
    #if (has_capability('moodle/course:update', $context) and (is_siteadmin($USER->id) or  get_usersAdminTeams_uv($USER->id)) and get_community_key($COURSE->id)!="") {    
    if (has_capability('moodle/course:update', $context) and get_community_key($COURSE->id)!="") {
        $url = new moodle_url('/local/uv365teams/activeteams.php', array('idnumber' => $course->idnumber));
        $navigation->add(get_string('configureTeams', 'local_uv365teams'), $url,
                navigation_node::TYPE_SETTING, null, null, new pix_icon('msteamsG', '', 'local_uv365teams')
                );
    }
}

#    $icon = new pix_icon('my-media', '', 'local_mymedia');


