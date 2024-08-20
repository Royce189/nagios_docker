FROM oraclelinux:8-slim
#FROM amd64/oraclelinux:8@sha256:5c553f9f1c5f4351754f905d5ead8b6cf2c2cbe88039d910c69fb0e19aa5dbc4 
#FROM redhat/ubi9-init:latest
#MAINTAINER cbpeckles

####### MINE ######
#RUN yum update --disablerepo=* --enablerepo=ubi-9-appstream-rpms --enablerepo=ubi-9-baseos-rpms -y && rm -rf /var/cache/yum
#RUN yum install --disablerepo=* --enablerepo=ubi-9-appstream-rpms --enablerepo=ubi-9-baseos-rpms httpd -y && rm -rf /var/cache/yum


#RUN yum -y install systemd; yum clean all; (cd /lib/systemd/system/sysinit.target.wants/; for i in *; do [ $i == systemd-tmpfiles-setup.service ] || rm -f $i; done); \
#    rm -f /lib/systemd/system/multi-user.target.wants/*; \
#    rm -f /etc/systemd/system/*.wants/*; \
#    rm -f /lib/systemd/system/local-fs.target.wants/*; \
#    rm -f /lib/systemd/system/sockets.target.wants/*udev*; \
#    rm -f /lib/systemd/system/sockets.target.wants/*initctl*; \
#    rm -f /lib/systemd/system/basic.target.wants/*; \
#    rm -f /lib/systemd/system/anaconda.target.wants/*;
#VOLUME [ "/sys/fs/cgroup" ]
######## MINE END ###

# get stuff from the interwebs
RUN yum update && yum -y install wget tar; yum clean all && cd /tmp
COPY nagiosxi /tmp 
RUN cd /tmp/nagiosxi
#RUN cd /tmp && wget https://assets.nagios.com/downloads/nagiosxi/xi-latest.tar.gz && tar xzf xi-latest.tar.gz && cd nagiosxi
##RUN mkdir /tmp/nagiosxi && /usr/bin/wget -qO- https://assets.nagios.com/downloads/nagiosxi/xi‑latest.tar.gz | tar xz -C /tmp
WORKDIR /tmp/nagiosxi

# overwrite custom config file
ADD config.cfg xi-sys.cfg

# start building
RUN ./init.sh \
    && . ./xi-sys.cfg \
	&& umask 0022 \
	&& . ./functions.sh \
	&& log="install.log"
RUN export INTERACTIVE="False" \
    && export INSTALL_PATH=`pwd`
RUN . ./functions.sh \
    && run_sub ./0-repos noupdate
RUN . ./functions.sh \
    && run_sub ./1-prereqs
RUN . ./functions.sh \
    && run_sub ./2-usersgroups
RUN touch nagiosxi/touch installed.mysql && touch installed.dbservers
#RUN . ./functions.sh \
#    && run_sub ./3-dbservers
RUN . ./functions.sh \
    && run_sub ./4-services
RUN . ./functions.sh \
    && run_sub ./5-sudoers
RUN sed -i.bak s/selinux/sudoers/g 9-dbbackups
RUN . ./functions.sh \
    && run_sub ./9-dbbackups
RUN . ./functions.sh \
    && run_sub ./11-sourceguardian
RUN . ./functions.sh \
    && run_sub ./13-phpini

ADD scripts/NDOUTILS-POST subcomponents/ndoutils/post-install
ADD scripts/install subcomponents/ndoutils/install
RUN chmod 755 subcomponents/ndoutils/post-install \
    && chmod 755 subcomponents/ndoutils/install \
	&& . ./functions.sh \
	&& run_sub ./A-subcomponents \
	&& run_sub ./A0-mrtg

RUN . ./functions.sh \
	&& run_sub ./B-installxi
RUN . ./functions.sh \
    && run_sub ./C-cronjobs
RUN . ./functions.sh \
    && run_sub ./D-chkconfigalldaemons
#RUN service mysqld start \
#    && . ./functions.sh \
#	&& run_sub ./E-importnagiosql
#RUN . ./functions.sh \
#    && run_sub ./F-startdaemons
RUN . ./functions.sh \
    && run_sub ./Z-webroot

RUN yum clean all

# set startup script
ADD start.sh /start.sh
RUN chmod 755 /start.sh
EXPOSE 80 5666 5667

CMD ["/start.sh"]
