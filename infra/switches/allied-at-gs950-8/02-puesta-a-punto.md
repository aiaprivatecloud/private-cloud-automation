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

