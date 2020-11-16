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
 * You may localized strings in your plugin
 *
 * @package    local_uv365teams
 * @copyright  2014 Daniel Neis
 * @license    http://www.gnu.org/copyleft/gpl.html gnu gpl v3 or later
 */

$string['pluginname'] = 'UV 365 Teams';

$string['teams']                 = 'Teams';
$string['activateTeams']         = 'Activar Teams';
$string['configureTeams']        = 'Configurar Teams';
$string['activateTeamsOn']       = 'Activación Teams';
$string['usuariopeticion']       = 'Solicitud Usuario:';
$string['fechapeticion']         = 'Fecha de petición:';
$string['fechacreacion']         = 'Fecha de creación:';
$string['fecharefresh']          = 'Fecha de actualización:';
$string['enabled']               = 'Habilitado:';
$string['state']                 = 'Estado:';
$string['inProgress']            = 'En progreso:';
$string['descripcionInProgress'] = 'Pendiente procesamiento nocturno.';
$string['descripcionInProgressMessage'] = 'Procesamiento nocturno, estará disponible mañana.';
$string['accion']                = 'Acción:';
$string['descripcionAccion']     = 'Grupo creado';
$string['weburl']                = 'Weburl:';
$string['descripcionWeburl']     = 'descriptionWeburl';
$string['weburlhelp']            = 'weburlhelp';
$string['admintreelabel']        = 'Admin Teams';
$string['volverAlCurso']         = 'Volver al curso';

$string['enabled_help']          = "La activación de Teams crea un equipo con los participantes de la asignaturas-grupo de AulaVirtual en la plataforma MS Teams. Los participantes accederán con la cuenta de MS Office 365, que coincide con el correo electrónico de UV (user@alumni.uv.es) pero la contraseña es independiente de la cuenta de UV.";
$string['enabledText_help']      = "La asignatura-grupo tiene un equipo de MS Teams activado. Los participantes accederán con la cuenta de MS Office 365, que coincide con el correo electrónico de UV (user@alumni.uv.es) pero la contraseña es independiente de la cuenta de UV.";
$string['emailpeticion_help']    = 'Usuario que ha solicitado la activación.';
$string['fechapeticionText_help']= 'Fecha en la que se solicitó la activación.';
$string['inProgress_help']       = 'La creación del equipo está pendiente de procesarse, le llegará un correo cuando este creado. Lo habitual es que este disponible al dia siguiente.';

$string['fechacreacionText_help']= 'Fecha de activación.';
$string['accionText_help']       = 'Grupo creado. La actualización de la inscripción en el equipo de Teams es automática, pero solo se actualizan los estudiantes inscritos oficialmente.';
$string['weburlText_help']       = 'URL para enlazar con el equipo asociado. Aparece un enlace automático al equipo en la página principal del curso cuando el equipo está creado.';

$string['fecharefreshText_help'] = 'Fecha de actualización de los participantes.';

$string['enabledText']      = "Habilitado";
$string['emailpeticion']    = "Solicitud Usuario";
$string['fechapeticionText']= "Fecha de petición";
$string['fechacreacionText']= "Fecha de creación";
$string['accionText']       = "Acción";
$string['weburlText']       = "Weburl";