#!/bin/bash

negro="\e[30m"
rojo="\e[31m"
verde="\e[32m"
amarillo="\e[33m"
azul="\e[34m"
magenta="\e[35m"
cyan="\e[36m"
blanco="\e[37m"

function instalarJQ(){
if dpkg -s jq >/dev/null 2>&1; then
    echo -e "${verde}  Instalado correctamente"
    sleep 0
else
    pkg install -y jq
fi
}



function banner(){
echo -e "${rojo}            ___       ____            _   "
echo -e "${rojo}           |_ _|_ __ / ___|  ___ _ __| |_ "
echo -e "${rojo}            | ||  _ \\___ \ / _ \ '__| __|"
echo -e "${rojo}            | || | | |___) |  __/ |  | |_ "
echo -e "${rojo}           |___|_| |_|____/ \___|_|   \__|"
echo ""
echo ""
}





function datos(){
    while true; do
    echo -e "${cyan}"
    read -p "Ingresa una dirección IP: " IP
    if [[ $IP =~ ^[0-9]+\.[0-9]+\.[0-9]+\.[0-9]+$ ]]; then
        break
    else
        echo -e "${rojo}Por favor, ingresa una dirección IP válida csmr."
        echo " "
    fi
done



    TOKEN="0a6558e144a7ff"
    response=$(curl -s "https://ipinfo.io/$IP/json?token=$TOKEN")

    ip=$(echo $response | jq -r '.ip')
    ciudad=$(echo $response | jq -r '.city')
    region=$(echo $response | jq -r '.region')
    pais=$(echo $response | jq -r '.country')
    codigo_postal=$(echo $response | jq -r '.postal')
    coordenadas=$(echo $response | jq -r '.loc')
    zona_horaria=$(echo $response | jq -r '.timezone')
    isp=$(echo $response | jq -r '.org')
    hostname=$(echo $response | jq -r '.hostname')
    as=$(echo $response | jq -r '.as')
    tipo=$(echo $response | jq -r '.type')
    servicios=$(echo $response | jq -r '.services')
    dominio=$(echo $response | jq -r '.domain')
    ciudad_geoname_id=$(echo $response | jq -r '.city_geoname_id')
    region_geoname_id=$(echo $response | jq -r '.region_geoname_id')
    pais_geoname_id=$(echo $response | jq -r '.country_geoname_id')
    idiomas=$(echo $response | jq -r '.languages')
    organizacion=$(echo $response | jq -r '.org')

    echo -e "Dirección IP: ${amarillo}$ip${reset}"
    echo -e "Ciudad: ${amarillo}$ciudad${reset}"
    echo -e "Región: ${amarillo}$region${reset}"
    echo -e "País: ${amarillo}$pais${reset}"
    echo -e "Código Postal: ${amarillo}$codigo_postal${reset}"
    echo -e "Coordenadas: ${amarillo}$coordenadas${reset}"
    echo -e "Zona Horaria: ${amarillo}$zona_horaria${reset}"
    echo -e "ISP: ${amarillo}$isp${reset}"
    echo -e "Hostname: ${amarillo}$hostname${reset}"
    echo -e "AS: ${amarillo}$as${reset}"
    echo -e "Tipo: ${amarillo}$tipo${reset}"
    echo -e "Servicios: ${amarillo}$servicios${reset}"
    echo -e "Dominio: ${amarillo}$dominio${reset}"
    echo -e "ID de Ciudad: ${amarillo}$ciudad_geoname_id${reset}"
    echo -e "ID de Región: ${amarillo}$region_geoname_id${reset}"
    echo -e "ID de País: ${amarillo}$pais_geoname_id${reset}"
    echo -e "Idiomas: ${amarillo}$idiomas${reset}"
    echo -e "Organización: ${amarillo}$organizacion${reset}"
}

instalarJQ
clear
banner
datos
