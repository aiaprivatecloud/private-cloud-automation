# 05 - Modelo de alojamiento del laboratorio

## 1. Decisión adoptada

La infraestructura principal del proyecto se aloja en un **Mac mini M4**, que actúa como anfitrión de las máquinas virtuales y como punto central del laboratorio doméstico segmentado.

## 2. Distribución funcional

| Elemento | Función |
|---|---|
| Mac mini M4 | Host principal de virtualización |
| OpenWRT VM | Enrutamiento interno del laboratorio |
| Ubuntu Server VM | Automatización básica y sandbox |
| Switch gestionable | Separación física por puertos de acceso |
| Raspberry Pi | Monitorización, auditoría y evidencias |
| NAS | Almacenamiento y copias |
| SAI | Protección frente a cortes eléctricos |

## 3. Razones técnicas

- Reutilización de hardware propio.
- Capacidad suficiente para virtualizar los servicios definidos.
- Centralización del laboratorio.
- Separación entre infraestructura del proyecto y equipos de uso personal.
- Posibilidad de snapshots y recuperación.

## 4. Relación entre host y segmentación de red

El host no sustituye al switch ni a OpenWRT. Su papel es alojar las máquinas virtuales, mientras que:

- el switch distribuye los enlaces físicos por segmento;
- OpenWRT define las puertas de enlace internas;
- el diseño final evita depender de un trunk VLAN virtualizado inestable.

## 5. Riesgos y mitigaciones

| Riesgo | Mitigación |
|---|---|
| Fallo de configuración | Documentación y rollback |
| Error en VM | Snapshot o reconstrucción controlada |
| Corte eléctrico | SAI y pruebas de continuidad |
| Pérdida de acceso | Segmentación documentada y rutas verificadas |
| Mezcla de roles | Separación entre host, router, automatización y almacenamiento |

## 6. Estado final

El modelo de alojamiento queda validado para el alcance del TFG: infraestructura real, segmentada y suficientemente documentada para su defensa y futura evolución.
