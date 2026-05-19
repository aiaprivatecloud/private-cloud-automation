# 01 - Visión global del proyecto

## 1. Propósito

El proyecto **AIA Private Cloud Automation** implanta una infraestructura privada, segura y segmentada para soportar servicios digitales y automatización básica sobre hardware propio. Su valor principal no reside en “tener muchos servicios”, sino en construir una base coherente de:

- red segmentada;
- virtualización controlada;
- aislamiento de funciones;
- acceso administrativo seguro;
- trazabilidad;
- capacidad de crecimiento sin rehacer la arquitectura.

## 2. Principios de diseño

### Seguridad por defecto
Se prioriza el mínimo privilegio, el control de accesos, el filtrado de tráfico y la reducción de exposición.

### Segmentación funcional
La infraestructura se separa por funciones:

- administración;
- servicios críticos;
- automatización;
- tránsito WAN;
- usuarios, como ampliación prevista.

### Viabilidad real
Las decisiones técnicas se adaptan al entorno disponible. Por ello, el modelo router-on-a-stick se documenta como diseño inicial descartado, mientras que la implantación final utiliza múltiples interfaces Ethernet físicas dedicadas.

### Trazabilidad
Las decisiones, scripts y procedimientos se documentan de forma versionada para poder justificar el proceso de diseño, implementación y corrección de incidencias.

## 3. Componentes principales

- **Mac mini M4**: anfitrión principal del laboratorio.
- **UTM**: plataforma de virtualización.
- **OpenWRT VM**: router interno y punto de encaminamiento.
- **Ubuntu Server VM**: entorno de automatización controlado.
- **Switch AT-GS950/8**: segmentación física por puertos de acceso.
- **Raspberry Pi 4**: nodo de automatización, monitorización y evidencias.
- **NAS TerraMaster**: almacenamiento en red y soporte para copias.
- **SAI APC**: protección eléctrica y continuidad básica.

## 4. Alcance funcional de la automatización

La automatización incluida en esta fase es deliberadamente básica y verificable:

- creación de un sandbox de servicio;
- usuario específico `aia-bot`;
- entorno Python aislado;
- script de prueba con logs;
- ejecución periódica mediante `cron`.

Este enfoque demuestra que la infraestructura soporta automatización programada sin sobredimensionar el proyecto ni presentar como implantado un agente autónomo que queda fuera del alcance del TFG.

## 5. Entregables técnicos

- Documentación de red y direccionamiento.
- Configuración final del switch.
- Configuración de OpenWRT.
- Documentación de la Raspberry Pi.
- Sandbox de automatización.
- Seguridad de la VM.
- Incidencias técnicas documentadas.
- Evidencias de validación.
- Material de continuidad eléctrica asociado al SAI.
