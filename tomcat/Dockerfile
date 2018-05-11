FROM tomcat:8.0-jre8-alpine

ADD openmrs-runtime.properties /usr/local/tomcat/openmrs-runtime.properties
ADD setenv.sh /usr/local/tomcat/bin/setenv.sh

ADD openmrs.war /usr/local/tomcat/webapps/openmrs.war

RUN mkdir -p /usr/local/tomcat/.OpenMRS/modules

COPY ./refapp-modules/*.omod /usr/local/tomcat/.OpenMRS/modules/
