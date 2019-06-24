docker-compose -f docker-compose.dep.yml up -d --build
docker-compose -f docker-compose.dep.yml exec -T blog bash /opt/upgrade.sh