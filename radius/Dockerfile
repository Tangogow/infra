FROM freeradius/freeradius-server:latest
COPY raddb/ /etc/raddb/

RUN apt update && apt install nano

ENTRYPOINT ["/bin/bash"]
