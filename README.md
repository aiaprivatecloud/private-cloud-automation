# AIA Private Cloud Automation

Repositorio técnico del Proyecto de Fin de Ciclo de **Administración de Sistemas Informáticos en Red (ASIR)**:

**Arquitectura e Implementación de una Nube Privada Segmentada para Automatización de Servicios Digitales**

## 1. Propósito del proyecto

El proyecto diseña e implanta una infraestructura privada, segmentada y administrable para soportar automatización básica, almacenamiento, monitorización y evidencias técnicas en un entorno real de pequeña escala.

La solución se apoya en:

- **Mac mini M4** como anfitrión principal.
- **UTM** como plataforma de virtualización.
- **OpenWRT virtualizado** como router interno del laboratorio.
- **Switch Allied Telesis AT-GS950/8** para segmentación física por puertos de acceso.
- **Raspberry Pi 4** como nodo auxiliar de monitorización, auditoría y almacenamiento de evidencias.
- **NAS TerraMaster** como almacenamiento del segmento de servicios.
- **SAI APC** como protección eléctrica del entorno.

Este repositorio no pretende duplicar la memoria del TFG, sino conservar una **base técnica versionada, reproducible y defendible** de las decisiones, configuraciones, pruebas y materiales asociados al proyecto.

## 2. Estado real del proyecto

La arquitectura final **no utiliza router-on-a-stick** como implantación definitiva. Ese modelo fue diseñado y validado conceptualmente, pero se descartó tras comprobar una limitación práctica en el paso estable de tráfico VLAN etiquetado hacia la VM de OpenWRT en el entorno **Apple Silicon + UTM**.

La solución final implementada utiliza **múltiples interfaces Ethernet físicas dedicadas** hacia OpenWRT, manteniendo la segmentación funcional del diseño:

| VLAN | Función | Red | Estado |
|---:|---|---|---|
| 10 | Administración | 192.168.10.0/24 | Implantada |
| 20 | Usuarios | 192.168.20.0/24 | Definida, reservada para ampliación |
| 30 | Servicios críticos | 192.168.30.0/24 | Implantada |
| 40 | Automatización | 192.168.40.0/24 | Implantada |
| 50 | WAN / tránsito | 192.168.50.0/24 | Implantada |

## 3. Arquitectura final resumida

### 3.1 Correspondencia entre interfaces, switch y OpenWRT

| Mac mini | Puerto switch | OpenWRT | Función |
|---|---:|---|---|
| en0 | 1 | eth0 | WAN / tránsito |
| en8 | 2 | eth1 | Administración |
| en9 | 3 | eth2 | Servicios |
| en10 | 4 | eth3 | Automatización |

### 3.2 Puertos del switch en la implantación final

| Puerto | VLAN | Uso |
|---:|---:|---|
| 1 | 50 | Mac mini / WAN OpenWRT |
| 2 | 10 | Mac mini / administración OpenWRT |
| 3 | 30 | Mac mini / servicios OpenWRT |
| 4 | 40 | Mac mini / automatización OpenWRT |
| 5 | 30 | NAS |
| 6 | 40 | Raspberry Pi |
| 7 | 10 | Portátil de administración |
| 8 | 50 | Router principal / tránsito |

## 4. Componentes técnicos documentados

- Arquitectura de red definitiva.
- Configuración final del switch gestionable.
- Configuración de interfaces de OpenWRT.
- Implantación de la Raspberry Pi y SSD externo.
- Sandbox de automatización `/opt/aia-bot`.
- Script de prueba y ejecución programada con `cron`.
- Endurecimiento de la VM Ubuntu:
  - UFW con denegación por defecto.
  - SSH restringido a VLAN de administración.
  - Autenticación por clave.
  - Separación de roles mediante usuario de servicio y ACL.
- Incidencias técnicas relevantes:
  - Descarte de router-on-a-stick en este entorno.
  - Integración de la Raspberry Pi y resolución de la ruta estática en Windows.
- Evidencias y validaciones asociadas al proyecto.

## 5. Estructura del repositorio

```text
docs/                  Documentación general y estado del proyecto
infra/                 Inventario técnico y configuración de red
network/               Resumen de arquitectura de red
virtualization/        Entorno UTM y máquinas virtuales
automation/            Sandbox y automatización básica
security/              Endurecimiento y control de accesos
raspberry-pi/          Integración de la Raspberry y SSD externo
monitoring/            Monitorización, auditoría y continuidad
scripts/               Scripts auxiliares pendientes de consolidación
backups/               Espacio de trabajo para documentación de copias
```

## 6. Alcance y límites

Incluido en el alcance del TFG:

- Segmentación de red implantada y validada.
- Virtualización de servicios de infraestructura.
- Preparación segura de un entorno de automatización básica.
- Monitorización y auditoría planteadas e integradas en la arquitectura.
- Evidencias técnicas y documentación reproducible.

Fuera del alcance principal:

- Desarrollo de un agente autónomo completo.
- Exposición pública directa de servicios internos.
- Despliegue empresarial de alta disponibilidad.
- Incorporación de secretos, credenciales reales o backups sensibles al repositorio.

## 7. Seguridad del repositorio

Este repositorio debe mantenerse libre de:

- Contraseñas.
- Tokens.
- Claves privadas.
- Backups reales de configuración sensibles.
- Imágenes de máquinas virtuales.
- Evidencias con datos privados no anonimizados.

Los ficheros de trabajo sensibles se excluyen mediante `.gitignore` y deben conservarse fuera del control de versiones.

## 8. Documentos de entrada recomendados

Para entender el proyecto sin recorrer cada carpeta:

1. `docs/07-estado-real-del-proyecto.md`
2. `docs/02-network-design.md`
3. `docs/03-network-topology.md`
4. `docs/08-incidencias-tecnicas.md`
5. `docs/09-seguridad-implementada.md`
6. `raspberry-pi/README.md`
7. `automation/README.md`

## 9. Nota sobre trazabilidad

El repositorio conserva documentación de fases iniciales y decisiones técnicas del proyecto. Cuando una solución fue descartada, se documenta como **incidencia o diseño no adoptado**, no como arquitectura final. Esta distinción es esencial para mantener coherencia entre:

- Memoria del TFG.
- Presentación final.
- Repositorio técnico.
