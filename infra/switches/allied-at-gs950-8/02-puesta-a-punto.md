# AT-GS950/8 — Puesta a punto e integración en la LAN

## 1. Objetivo

Preparar el switch para operar como core de segmentación VLAN en la infraestructura privada, asegurando:
- Acceso de gestión estable dentro de la LAN real.
- Evitar conflictos con DHCP.
- Segmentación por VLAN con puerto trunk y puertos access.
- Configuración persistente (guardado en flash) y export de evidencias.

---

## 2. Estado de partida

- Acceso recuperado tras reset (ver documento 01).
- IP por defecto del switch: 192.168.1.1 (fuera de la LAN real).
- Router LAN actual: 192.168.<LAN>.1/24, DHCP activo.

---

## 3. Riesgo identificado

Mientras el switch permanezca fuera de la subred 192.168.<LAN>.0/24:
- La gestión depende de IP manuales y desconexión de WiFi.
- Se complica el diagnóstico y aumenta el riesgo de pérdida de acceso.

---

## 4. Cambio de IP de gestión

Se modificó la configuración de red del switch para integrarlo en la LAN real.

### Configuración aplicada

- Nueva IP de gestión: 192.168.<LAN>.100
- Máscara: /24
- Gateway: 192.168.<LAN>.1

Resultado:
- Acceso estable desde la red 192.168.<LAN>.0/24.
- Posibilidad de mantener WiFi activo sin pérdida de conectividad.
- Eliminación de conflicto con red anterior (192.168.1.0/24).

---

## 5. Ajuste del rango DHCP en el router

Para evitar conflictos entre IP fija del switch y asignaciones dinámicas:

- Rango DHCP anterior: 192.168.<LAN>.2 – 192.168.<LAN>.254
- Rango DHCP actualizado: 192.168.<LAN>.103 – 192.168.<LAN>.200

Objetivo:
- Reservar el rango 192.168.<LAN>.2 – 192.168.<LAN>.102 para infraestructura con IP fija.
- Garantizar que el switch no reciba una IP duplicada.

---

## 6. Diseño de segmentación VLAN

Se definió la siguiente estructura lógica para segmentación de red:

| VLAN | Rol |
|------|------|
| 1 | Gestión exclusiva del switch |
| 10 | Administración |
| 20 | Usuarios |
| 30 | Servicios críticos |
| 40 | Automatización |
| 50 | Tránsito WAN hacia router |

Objetivo del diseño:
- Separar funciones por dominio lógico.
- Reducir superficie de ataque.
- Permitir control granular mediante firewall en el router.

---

## 7. Configuración del puerto trunk

El puerto 1 fue configurado como enlace trunk 802.1Q hacia el router virtual (OpenWRT).

Configuración aplicada:

- VLAN 10 → Tagged
- VLAN 20 → Tagged
- VLAN 30 → Tagged
- VLAN 40 → Tagged
- VLAN 50 → Tagged
- VLAN 1 → Not Member

Objetivo:
Permitir el transporte simultáneo de múltiples VLAN a través de un único enlace físico (router-on-a-stick).

---

## 8. Configuración de puertos access

Se configuraron los puertos restantes como access, asignando:

- VLAN correspondiente en modo Untagged.
- PVID igual al ID de VLAN asignado.

Medida adicional:
- Se mantuvo un puerto dedicado en VLAN 1 como “puerto salvavidas” para gestión directa del switch en caso de error de configuración.

---

## 9. Medidas básicas de estabilidad y protección

Se aplicaron las siguientes medidas adicionales:

### Storm Control
- Activación de control de Broadcast.
- Activación de control de DLF (Destination Lookup Failure).

Objetivo:
Prevenir tormentas de broadcast o tráfico anómalo que puedan degradar la red.

### Spanning Tree
- Deshabilitado en entorno actual.
Motivo: topología simple sin enlaces redundantes.

---

## 10. Persistencia de configuración y evidencias

Tras cada modificación relevante:

- Se utilizó la opción "Save Configuration to Flash".
- Se exportó un backup de configuración.
- El backup real se almacena fuera del repositorio (no versionado).
- Se mantiene versión documentada anonimizada en el repo.

Resultado final:
Switch integrado en la LAN, segmentado por VLAN y preparado para integración con router virtual.
