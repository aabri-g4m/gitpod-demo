#!/bin/bash
set +e  # Continue on errors

if [ -f "./spiral" ]; then
  echo "RoadRunner binary file exist"
  ./spiral serve -v -d
  else 
    echo "RoadRunner binary doesn't exist"
    ./vendor/bin/spiral get && ./spiral serve -v -d
fi  

COLOR_CYAN="\033[0;36m"
COLOR_RESET="\033[0m"

echo -e "${COLOR_CYAN}

 ██████  ███████  █████  ██████      ██   ██     ███    ███ ██    ██ ███████ ██  ██████ 
██       ██      ██   ██ ██   ██     ██   ██     ████  ████ ██    ██ ██      ██ ██      
██   ███ █████   ███████ ██████      ███████     ██ ████ ██ ██    ██ ███████ ██ ██      
██    ██ ██      ██   ██ ██   ██          ██     ██  ██  ██ ██    ██      ██ ██ ██      
 ██████  ███████ ██   ██ ██   ██          ██     ██      ██  ██████  ███████ ██  ██████ 
                                                                                                      
${COLOR_RESET}
Welcome to your development container!
"

bash
