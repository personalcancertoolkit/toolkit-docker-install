# Overview
This folder/package creates a tomcat install of OpenMRS and needs to be paired with mysql to be functional. A sample docker-compose is available in the root of this repository.



## Runtime Properties
This assumes the username and password is `openmrs` (not recommended) for mysql.

If using this for a test then you can directly use it from the repo maurya/toolkit-openmrs-tomcat:1.0

If you are using it for production then please change the password both in runtime properties, mysql and build this docker file.
