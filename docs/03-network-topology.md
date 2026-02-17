# 03 - Topología de Red

## 1. Modelo de segmentación

Se implementará segmentación mediante VLAN en switch gestionable.

### VLAN propuestas

VLAN 10 - Gestión
Dispositivos de administración (router, switch, hosts críticos).

VLAN 20 - Servicios
Host principal 24/7 y servicios internos.

VLAN 30 - Almacenamiento
NAS y sistema de copias de seguridad.

VLAN 40 - Laboratorio
Entorno de pruebas y ejecución del bot.

VLAN 50 - Invitados/IoT (opcional).

## 2. Direccionamiento propuesto

VLAN 10 - 192.168.10.0/24
VLAN 20 - 192.168.20.0/24
VLAN 30 - 192.168.30.0/24
VLAN 40 - 192.168.40.0/24
VLAN 50 - 192.168.50.0/24

Gateway en router mediante subinterfaces.

## 3. Política básica de tráfico

- Laboratorio -> Almacenamiento: bloqueado por defecto.
- Servicios -> Almacenamiento: permitido solo en puertos necesarios.
- Gestión -> todas las VLAN: acceso restringido a administradores.
- No se expondrán servicios internos directamente a Internet.

## 4. Justificación técnica

La segmentación reduce superficie de ataque, limita movimiento lateral
y permite aplicar reglas de firewall específicas por segmento.

## 5. Inter-VLAN Routing

El enrutamiento entre VLAN se realizará en el router mediante subinterfaces
configuradas con encapsulación 802.1Q.

Ejemplo conceptual:

- eth0.10 -> VLAN 10 -> 192.168.10.1/24
- eth0.20 -> VLAN 20 -> 192.168.20.1/24
- eth0.30 -> VLAN 30 -> 192.168.30.1/24
- eth0.40 -> VLAN 40 -> 192.168.40.1/24

El puerto del switch conectado al router funcionará como trunk.

Los puertos hacia dispositivos finales funcionarán como access,
asignados a su VLAN correspondiente.

## 6. Control de tráfico

Se aplicarán reglas de firewall en el router para:

- Bloquear tráfico directo desde VLAN Laboratorio hacia VLAN Almacenamiento.
- Permitir únicamente puertos específicos entre VLAN Servicios y VLAN Almacenamiento.
- Restringir acceso a VLAN Gestión a dispositivos autorizados.
