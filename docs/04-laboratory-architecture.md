# 04 - Arquitectura del Laboratorio (Jaula de Oro)

## 1. Objetivo

Aislar el entorno de ejecución del bot y pruebas experimentales,
limitando impacto en caso de fallo, error humano o compromiso de seguridad.

## 2. Capas de aislamiento

### 2.1 Aislamiento por virtualización

El bot se ejecutará dentro de una máquina virtual dedicada.

Características:
- Usuario sin privilegios de administración global.
- Recursos limitados (CPU/RAM).
- Sin acceso directo a almacenamiento crítico.

### 2.2 Aislamiento de red (VLAN 40 - Laboratorio)

La VM estará conectada a VLAN 40 (Laboratorio).

- Subred: 192.168.40.0/24
- Gateway: 192.168.40.1
- Sin acceso directo a VLAN 30 (Almacenamiento).

### 2.3 Control de tráfico

En el router:

- Bloqueo por defecto Laboratorio -> Almacenamiento.
- Permitir únicamente tráfico saliente necesario (DNS, HTTPS).
- Sin exposición directa de puertos hacia el exterior.

### 2.4 Gestión de secretos

- Las credenciales del bot estarán almacenadas en Bitwarden.
- No se almacenarán claves en texto plano.
- Tokens limitados y con rotación periódica.

## 3. Relación con otros segmentos

- VLAN Servicios podrá comunicarse con Almacenamiento según necesidad.
- VLAN Gestión tendrá acceso controlado a Laboratorio para administración.
- Laboratorio no tendrá privilegios laterales.

## 4. Justificación técnica

Este diseño reduce la superficie de ataque,
limita el movimiento lateral y permite contener posibles incidentes.

Se adopta un modelo de defensa en profundidad:
virtualización + segmentación + firewall + control de credenciales.
