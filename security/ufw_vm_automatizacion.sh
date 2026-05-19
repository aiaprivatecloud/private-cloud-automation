#!/usr/bin/env bash
set -euo pipefail

# Política base
sudo ufw default deny incoming
sudo ufw default deny outgoing

# Salida mínima necesaria
sudo ufw allow out to any port 53 proto udp
sudo ufw allow out to any port 80 proto tcp
sudo ufw allow out to any port 443 proto tcp

# Administración por SSH solo desde VLAN 10
sudo ufw allow in from 192.168.10.0/24 to any port 22 proto tcp

# Activación
sudo ufw enable
sudo ufw status verbose
