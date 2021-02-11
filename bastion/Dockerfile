FROM alpine
ADD rootfs.tar.gz /
EXPOSE 22
RUN apk --update add openssh && rm -f /var/cache/apk/*
RUN ssh-keygen -A
RUN echo "PermitRootLogin no" >> /etc/ssh/sshd_config && \
  echo "PasswordAuthentication no" >> /etc/ssh/sshd_config && \
  echo "ChallengeResponseAuthentication no" >> /etc/ssh/sshd_config && \
  echo "Port 22" >> /etc/ssh/sshd_config && \
  echo "StrictModes no" >> /etc/ssh/sshd_config

RUN adduser -D bastion && passwd -d bastion && mkdir /home/bastion/.ssh && chown bastion:nogroup /home/bastion/.ssh && chmod 700 /home/bastion/.ssh
VOLUME /home/bastion/.ssh
COPY authorized_keys /home/bastion/.ssh/authorized_keys
ADD harden.sh /usr/bin/harden.sh
RUN chmod 700 /usr/bin/harden.sh && /usr/bin/harden.sh
USER bastion
CMD ["/usr/sbin/sshd", "-D"]
