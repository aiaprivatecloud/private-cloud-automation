# Diagrama lógico — Red segmentada (Switch AT-GS950/8 + Router OpenWRT en VM)

## 1. Visión general

```text
                       (Internet opcional)
                              |
                            [ASUS]
                              |
                     VLAN 50 (WAN tránsito)
                              |
                    +-------------------+
                    |  AT-GS950/8 L2    |
                    |  Core VLAN        |
                    +-------------------+
                         |  Port 1 (TRUNK 802.1Q)
                         |  Tagged: 10,20,30,40,50
                         v
                 +-----------------------+
                 | Mini (host físico)    |
                 |  VM: OpenWRT Router   |
                 |  - subifs VLAN        |
                 |  - firewall           |
                 |  - DHCP por VLAN      |
                 +-----------------------+

Access ports (untagged + PVID):
- VLAN10 Admin
- VLAN20 Usuarios
- VLAN30 Servicios críticos (NAS)
- VLAN40 Automatización (Bicho)
- VLAN1  Gestión exclusiva del switch (puerto salvavidas)

## 2. Segmentación por VLAN
VLAN	Nombre lógico	Uso
1	SWITCH-MGMT	Gestión del switch (puerto salvavidas, aislado)
10	ADMIN	Administración (PC admin, gestión)
20	USERS	Dispositivos de usuario
30	SERVICES	Servicios críticos (NAS, servicios internos)
40	AUTOMATION	VM/servicio del “bicho” (sin acceso a NAS por diseño)
50	WAN-TRANSIT	Tránsito hacia router ASUS (salida a Internet)

## 3. Principios de seguridad aplicados (alto nivel)

Separación de funciones por VLAN (mínimo privilegio).

El “bicho” se aísla en VLAN 40.

El NAS se mantiene en VLAN 30.

La gestión del switch se mantiene fuera del trunk (VLAN 1, puerto dedicado).

El enrutamiento inter-VLAN y las reglas de firewall se centralizan en OpenWRT.


## 4. Notas operativas

El puerto trunk (switch Port 1) transporta VLANs etiquetadas.

Los puertos access entregan tráfico sin etiqueta y usan PVID para asignación de VLAN.

La administración del switch se conserva en VLAN 1 para recuperación ante errores.


