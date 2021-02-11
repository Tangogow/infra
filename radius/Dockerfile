FROM freeradius/freeradius-server:latest
COPY raddb/ /etc/raddb/
COPY ldap /etc/raddb/mods-available/
COPY default /etc/raddb/sites-enabled/

RUN apt update && apt install nano
RUN apt install openssh-server -y
RUN mkdir /root/.ssh/ && touch /root/.ssh/authorized_keys
COPY authorized_keys /root/.ssh/
RUN chmod 700 /root/.ssh/
RUN chmod 600 /root/.ssh/authorized_keys
RUN /etc/init.d/ssh restart
RUN cd /etc/raddb/mods-enabled/ && ln -s ../mods-available/ldap ldap
RUN /etc/init.d/freeradius restart
EXPOSE 22

ENTRYPOINT ["/bin/bash"]
