# AT-GS950/8 — Reset y acceso inicial

## 1. Identificación del equipo

- Modelo: Allied Telesis AT-GS950/8
- Tipo: Switch WebSmart Layer 2
- Uso previsto: Core de segmentación VLAN en infraestructura privada

---

## 2. Estado al recibir el equipo

- Encendido correcto.
- LEDs activos en puerto 1 (SPD y DPX fijos, L/A parpadeando).
- No respondía a ping.
- No accesible vía interfaz web.
- Dirección IP y credenciales desconocidas.

---

## 3. Diagnóstico inicial

El equipo se encontraba configurado en una red distinta a la LAN actual del laboratorio, impidiendo el acceso desde la infraestructura existente.

---

## 4. Procedimiento de reset a valores de fábrica

Dado que no era posible acceder por red, se procedió a restaurar el equipo a configuración de fábrica.

### Pasos realizados

1. Localización del botón de reset físico (oculto bajo el botón "ECO Friendly").
2. Con el equipo encendido, mantener pulsado el botón de reset durante varios segundos.
3. Esperar el reinicio completo del switch.
4. Verificación visual de arranque mediante LEDs frontales.

Resultado: el switch volvió a la configuración por defecto del fabricante.
