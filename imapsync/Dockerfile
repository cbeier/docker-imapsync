FROM debian:wheezy

RUN apt-get update -y
RUN apt-get install -y \
    php5-cli \
    git-core \
    make \
    makepasswd \
    rcs \
    perl-doc \
    libmail-imapclient-perl \
    libdigest-hmac-perl \
    libterm-readkey-perl \
    libio-socket-ssl-perl \
    libdate-manip-perl \
    libmail-imapclient-perl \
    libfile-copy-recursive-perl \
    libio-tee-perl \
    libunicode-string-perl

ADD entrypoint.sh /entrypoint.sh

# Get imapsync source via github
RUN git clone git://github.com/imapsync/imapsync.git

# Alternative use the included tar.gz
#ADD src/imapsync-imapsync-1.607.tar.gz /imapsync.tar.gz
#RUN tar -xvzf /imapsync.tar.gz

RUN cd imapsync && mkdir dist && make install

VOLUME /data

ENTRYPOINT ["/entrypoint.sh"]
CMD ["noop"]
