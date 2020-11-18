Moodle Local uv365teams
=======================
Allows teachers to request the creation of a team with the same members as their Moodle
course.

The Moodle plugin saves the request and action in the table mdl_uv_o365.

The application MS365API allows you to create groups, users and teams in Microsoft 365 through API GRAPH and PHP. 

Once the group is created, you need some method to determine which courses should Moodle have had new participants, these courses are inserted in mdl_uv_o365_refresh. 
MS365API the program will resynchronize the list of members of these courses.

To communicate both systems (Moodle and Microsoft) the plugins and MS365API use these tables (In Postgres): 
CREATE TABLE mdl_uv_o365 (
  id              SERIAL PRIMARY KEY,
  enabled         boolean NOT NULL DEFAULT true,
  idnumber        varchar(20) NOT NULL DEFAULT '',
  idoff365        varchar(40) DEFAULT '',
  nombre          varchar(255) NOT NULL DEFAULT '',
  descripcion     varchar(255) DEFAULT '',
  fechacreacion   timestamp,
  estado          varchar(20) NOT NULL DEFAULT 'none',
  accion          varchar(20) NOT NULL DEFAULT 'none',
  weburl          varchar (1000) DEFAULT '',
  email           varchar(40) DEFAULT '',
  fechapeticion   timestamp NOT NULL DEFAULT now()
);     
CREATE INDEX "mdl_uv_o365_idoff365" ON mdl_uv_o365 (idoff365);
CREATE INDEX "mdl_uv_o365_nombre" ON mdl_uv_o365 (nombre);
CREATE INDEX "mdl_uv_o365_idnumber" ON mdl_uv_o365 (idnumber);
ALTER TABLE mdl_uv_o365 OWNER TO moodleuser;
GRANT ALL PRIVILEGES ON mdl_uv_o365 TO moodleuser;

CREATE TABLE mdl_uv_o365_refresh (
 id              SERIAL PRIMARY KEY,
 idnumber        varchar(20) NOT NULL DEFAULT '',
 fechacreacion   timestamp NOT NULL DEFAULT now()
);
CREATE INDEX "mdl_uv_o365_refresh_idnumber" ON mdl_uv_o365_refresh (idnumber);
ALTER TABLE mdl_uv_o365_refresh OWNER TO moodleuser;
GRANT ALL PRIVILEGES ON mdl_uv_o365_refresh TO moodleuser;
