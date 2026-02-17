# 02 - Diseño de red (borrador inicial)

## 1. Objetivo
Separar almacenamiento/backups y servicios críticos del entorno donde se ejecuta el bot y las pruebas,
reduciendo el impacto de compromisos y errores de configuración.

## 2. Segmentos propuestos (sin switch gestionable aún)
- Red doméstica (LAN): dispositivos familiares y acceso general.
- Red laboratorio (aislada): VM del bot, pruebas, servicios experimentales.
- Red almacenamiento (preferible separada): NAS y backups (acceso mínimo).

## 3. Evolución cuando llegue el switch (VLAN)
Propuesta de VLANs:
- VLAN 10: Gestión (router/switch/hosts críticos)
- VLAN 20: Servicios (mini/servicios)
- VLAN 30: Almacenamiento (NAS/backup)
- VLAN 40: Laboratorio (VM/bot)
- VLAN 50: Invitados/IoT (si aplica)

## 4. Reglas base (alto nivel)
- Laboratorio -> NAS: bloqueado por defecto, abrir solo lo imprescindible.
- Servicios -> NAS: permitido solo en puertos necesarios (SMB/NFS/HTTPS según servicio).
- Gestión -> todo: permitido con control (solo desde hosts autorizados).
- Acceso remoto: solo vía VPN (ideal), nunca exponer paneles en Internet.

## 5. Evidencias a generar
- Diagrama lógico (VLANs, flujos).
- Tabla de puertos permitidos por segmento.
- Capturas de configuración (router/switch/host).
- Pruebas: ping, traceroute, escaneo controlado, validación de ACL/firewall.
