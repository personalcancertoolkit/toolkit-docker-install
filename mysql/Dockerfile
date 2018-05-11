FROM mysql:5.6

ENV MYSQL_ROOT_PASSWORD=root \
    MYSQL_DATABASE=openmrs \
    MYSQL_USER=openmrs \
    MYSQL_PASSWORD=openmrs

COPY base.sql /docker-entrypoint-initdb.d