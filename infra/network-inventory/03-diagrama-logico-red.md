# Diagrama lógico — Red segmentada final

## 1. Visión general

```text
                         Internet
                            |
                  [Router ASUS principal]
                            |
                 VLAN 50 - WAN / tránsito
                            |
              +-------------------------------+
              | Switch Allied Telesis         |
              | AT-GS950/8                    |
              +-------------------------------+
                 |     |     |     |    |   |
                P1    P2    P3    P4   P5  P6/P7/P8

P1 -> Mac mini en0  -> OpenWRT eth0  -> WAN / tránsito
P2 -> Mac mini en8  -> OpenWRT eth1  -> Administración
P3 -> Mac mini en9  -> OpenWRT eth2  -> Servicios
P4 -> Mac mini en10 -> OpenWRT eth3  -> Automatización
P5 -> NAS TerraMaster                    VLAN 30
P6 -> Raspberry Pi                       VLAN 40
P7 -> Portátil de administración         VLAN 10
P8 -> Router principal / tránsito        VLAN 50
```

## 2. Segmentación

| VLAN | Nombre lógico | Red | Uso |
|---:|---|---|---|
| 10 | ADMIN | 192.168.10.0/24 | Administración |
| 20 | USERS | 192.168.20.0/24 | Reserva de diseño |
| 30 | SERVICES | 192.168.30.0/24 | NAS y servicios críticos |
| 40 | AUTOMATION | 192.168.40.0/24 | Raspberry Pi y automatización |
| 50 | WAN-TRANSIT | 192.168.50.0/24 | Enlace de tránsito |

## 3. Principio de diseño

La arquitectura final no utiliza trunk etiquetado hacia OpenWRT. La segmentación se mantiene mediante enlaces físicos dedicados, lo que permite conservar el modelo funcional del proyecto con una solución estable en el entorno Apple Silicon + UTM.

## 4. Direcciones clave

- OpenWRT administración: `192.168.10.1`
- Switch gestionable: `192.168.10.2`
- Raspberry Pi: `192.168.40.10`
- OpenWRT automatización: `192.168.40.1`
