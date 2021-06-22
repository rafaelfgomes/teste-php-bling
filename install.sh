#!/bin/bash

network_name=bling_network
network=$(docker network ls | grep "$network_name" | cut -d " " -f 4)

if [ -z "$network" ]; then

    echo -e "\nCriando a rede '"$network_name"' para o projeto..."

    docker network create --driver=bridge --subnet=172.15.0.0/16 --gateway=172.15.0.1 "$network_name"

    if [ $? -eq 1 ]; then

    echo -e "\nErro ao executar o comando"
    exit 1

    fi

fi

echo -e "\nRede '"$network_name"' Já existe..."
echo -e "\n\nExecutando 'docker-compose up -d'..."

docker-compose up -d --build

if [ $? -eq 1 ]; then

echo -e "\nErro ao executar o comando"
exit 1

fi

echo -e "\n\nScript finalizado..."