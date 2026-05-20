# Evidencias técnicas seleccionadas

Este directorio reúne una selección de evidencias públicas del proyecto **AIA Private Cloud Automation**.  
Su finalidad no es sustituir a la memoria completa, sino permitir una verificación rápida, clara y ordenada de los elementos realmente implantados y validados.

## Criterio de selección

Se han incluido capturas que acreditan de forma directa:

- la configuración final de la segmentación de red;
- la arquitectura definitiva basada en interfaces físicas dedicadas;
- la ubicación de la máquina virtual de automatización en la VLAN 40;
- la automatización programada mínima con `cron` y generación de logs;
- el endurecimiento básico de la máquina virtual mediante UFW y SSH;
- el montaje del SSD externo en la Raspberry Pi;
- la integración del SAI mediante NUT y la generación de evidencias durante una prueba de corte eléctrico breve.

## Índice de evidencias

| Nº | Evidencia | Qué demuestra | Archivo |
|---:|---|---|---|
| 01 | Base de datos VLAN del switch | VLAN operativas y puertos miembros de la configuración final | [`01-switch-vlan-database-final.png`](capturas/red/01-switch-vlan-database-final.png) |
| 02 | PVID e ingress filtering | PVID finales y filtrado de entrada habilitado por puerto | [`02-switch-pvid-ingress-final.png`](capturas/red/02-switch-pvid-ingress-final.png) |
| 03 | GVRP deshabilitado | Gestión manual de VLAN sin propagación dinámica | [`03-switch-gvrp-deshabilitado.png`](capturas/red/03-switch-gvrp-deshabilitado.png) |
| 04 | Interfaces y rutas de OpenWRT | `eth0`-`eth3`, direccionamiento y tabla de rutas de la arquitectura final | [`04-openwrt-interfaces-rutas-finales.png`](capturas/red/04-openwrt-interfaces-rutas-finales.png) |
| 05 | MV de automatización en VLAN 40 | Dirección `192.168.40.20/24` en la máquina Ubuntu Server | [`05-mv-automatizacion-ip-vlan40.png`](capturas/red/05-mv-automatizacion-ip-vlan40.png) |
| 06 | Línea de cron de `aia-bot` | Ejecución programada del script de prueba cada 5 minutos | [`06-cron-linea-programada-aia-bot.png`](capturas/automatizacion/06-cron-linea-programada-aia-bot.png) |
| 07 | Servicio cron activo | El planificador está operativo durante la validación | [`07-cron-servicio-activo.png`](capturas/automatizacion/07-cron-servicio-activo.png) |
| 08 | Log del script de prueba | Entradas sucesivas con marca temporal en `test_bot.log` | [`08-log-test-bot-ejecuciones.png`](capturas/automatizacion/08-log-test-bot-ejecuciones.png) |
| 09 | Log asociado a cron | Registro de la ejecución periódica en `cron_test.log` | [`09-log-cron-test.png`](capturas/automatizacion/09-log-cron-test.png) |
| 10 | Estado final de UFW | Política restrictiva de entrada y salida con excepciones explícitas | [`10-ufw-estado-final-mv.png`](capturas/seguridad/10-ufw-estado-final-mv.png) |
| 11 | SSH sin contraseña | Directiva `PasswordAuthentication no` aplicada en `sshd_config` | [`11-ssh-passwordauthentication-no.png`](capturas/seguridad/11-ssh-passwordauthentication-no.png) |
| 12 | SSD externo de la Raspberry Pi | Montaje activo de `/dev/sda2` en `/mnt/externo` | [`12-ssd-externo-montado-mnt-externo.png`](capturas/raspberry/12-ssd-externo-montado-mnt-externo.png) |
| 13 | Lectura inicial del SAI con NUT | Consulta de modelo, batería, autonomía y tensión de entrada | [`13-sai-valores-iniciales-nut.png`](capturas/sai/13-sai-valores-iniciales-nut.png) |
| 14 | Cambio de estado del SAI | Transición de funcionamiento normal `OL CHRG` a batería `OB DISCHRG` | [`14-sai-cambio-estado-ol-ob.png`](capturas/sai/14-sai-cambio-estado-ol-ob.png) |
| 15 | Script de monitorización del SAI | Ejecución en segundo plano del monitor y apertura del log de eventos | [`15-sai-monitor-script-lanzado.png`](capturas/sai/15-sai-monitor-script-lanzado.png) |
| 16 | Registro de eventos del SAI | Cambios de estado detectados y disponibilidad de nodos supervisados | [`16-sai-registro-eventos.png`](capturas/sai/16-sai-registro-eventos.png) |
| 17 | Evidencias CSV de la prueba SAI | Salida estructurada con estado del SAI y comprobaciones de disponibilidad | [`17-sai-csv-evidencias.png`](capturas/sai/17-sai-csv-evidencias.png) |
| 18 | Zona de administración en OpenWRT | Forwardings permitidos desde la zona `admin` hacia automatización, servicios y WAN | [`18-openwrt-zona-admin-forwardings.png`](capturas/red/18-openwrt-zona-admin-forwardings.png) |
| 19 | Forwardings configurados mediante UCI | Reenvíos documentados `automatizacion → wan` y `admin → automatizacion` | [`19-openwrt-forwardings-uci.png`](capturas/red/19-openwrt-forwardings-uci.png) |
| 20 | ACL del sandbox de automatización | Verificación de permisos específicos para `administrador` sobre `/opt/aia-bot` mediante `getfacl` | [`20-acl-sandbox-getfacl.png`](capturas/seguridad/20-acl-sandbox-getfacl.png) |
| 21 | Raspberry Pi integrada en VLAN 40 | Dirección `192.168.40.10/24`, ruta por defecto vía `192.168.40.1` y servicio SSH activo | [`21-raspberry-ip-rutas-ssh-activo.png`](capturas/raspberry/21-raspberry-ip-rutas-ssh-activo.png) |

## Relación con la memoria del proyecto

Estas evidencias complementan los apartados de la memoria dedicados a:

- la configuración de la red principal;
- la validación de OpenWRT y de la máquina virtual de automatización;
- la automatización programada mínima;
- la seguridad del entorno;
- la monitorización, el almacenamiento externo y la integración del SAI.

La memoria completa incorpora explicaciones, tablas, anexos y contexto técnico adicional. Este directorio actúa como **índice visual de verificación rápida** para el repositorio público.
