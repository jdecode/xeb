FROM jdecode/devops:php8.2.11

ENTRYPOINT ["/var/www/html/dockerfiles/queue-listener"]
