#!/usr/bin/env bash

set -x
set -e

DOCKER_DIR=${PWD}
COMPOSE_FILE=${DOCKER_DIR}/docker-compose.yml

[ -z "${SOURCES_ROOT}" ] && export SOURCES_ROOT=$(cd $(dirname $0)/../ && pwd)
[ -z "${BUILD_NAME}" ] && export BUILD_NAME="diplom"

echo "Sources root: ${SOURCES_ROOT}"
echo

if [ -z $1 ]; then
    docker-compose -p ${BUILD_NAME} -f ${COMPOSE_FILE} up --build -d
else
    docker-compose -p ${BUILD_NAME} -f ${COMPOSE_FILE} down
fi
