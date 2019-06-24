FROM node:10.9.0-alpine

MAINTAINER AAli <ahmedali555@live.fr>

RUN apk add --no-cache git alpine-sdk

workdir /
RUN git clone https://github.com/wolfcw/libfaketime.git
workdir /libfaketime/src
RUN make install

RUN mkdir /home/node/.npm-global 
ENV PATH=/home/node/.npm-global/bin:$PATH
ENV NPM_CONFIG_PREFIX=/home/node/.npm-global

ENV HOME=/home/node

WORKDIR $HOME/app

RUN npm i -g npm 

RUN npm install -g @angular/cli && npm cache clean --force 

EXPOSE 4200

ENTRYPOINT ["ng"]