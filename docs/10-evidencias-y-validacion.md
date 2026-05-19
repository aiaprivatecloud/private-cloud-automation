# 10 - Evidencias y validación

## 1. Objetivo

Este documento define qué evidencias respaldan técnicamente la implantación del proyecto y cómo deben organizarse en el repositorio sin comprometer información sensible.

## 2. Evidencias recomendadas

### Red
- captura de configuración de VLAN del switch;
- tabla de PVID;
- prueba de acceso al switch;
- prueba de conectividad a OpenWRT;
- prueba de ruta hacia Raspberry Pi;
- comprobación de interfaces OpenWRT.

### Raspberry Pi
- `ip a`;
- `ip route`;
- SSH operativo;
- `df -h` tras reinicio con SSD montado;
- estructura `/mnt/externo`.

### Automatización
- estructura `/opt/aia-bot`;
- ejecución manual de `test_bot.py`;
- contenido de `test_bot.log`;
- crontab del usuario `aia-bot`;
- `cron_test.log`.

### Seguridad
- `ufw status verbose`;
- comprobación de acceso SSH;
- evidencia de configuración ACL;
- estado de servicios de seguridad aplicados.

### SAI y continuidad
- captura o registro de estado del SAI;
- logs de pruebas de corte;
- CSV o registro de disponibilidad por equipo;
- explicación del criterio de parada controlada, si procede.

## 3. Organización sugerida

```text
docs/evidencias/
├── capturas/
├── logs/
└── README.md
```

## 4. Política de publicación

- Publicar solo material necesario para defensa técnica.
- Anonimizar datos privados.
- No incluir direcciones públicas, claves, usuarios reales no necesarios ni contenidos de backups.
- Conservar evidencia sensible fuera del repositorio si no aporta valor público.
