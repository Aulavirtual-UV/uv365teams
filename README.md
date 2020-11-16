Moodle Local uv365teams
=======================
Allows teachers to request the creation of a team with the same members as their Moodle
course.

The Moodle plugin saves the request and action in the table mdl_uv_o365.

The application MS365API allows you to create groups, users and teams in Microsoft 365 through API GRAPH and PHP. 

Once the group is created, you need some method to determine which courses should Moodle have had new participants, these courses are inserted in mdl_uv_o365_refresh. 
MS365API the program will resynchronize the list of members of these courses.