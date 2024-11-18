FROM php:8.3-cli-alpine

WORKDIR /srv

# 为容器安装运行测试所需的 Make 工具
RUN apk add --no-cache make

