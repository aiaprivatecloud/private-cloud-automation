# Políticas de firewall y zonas en OpenWRT

## 1. Propósito del documento

Este documento resume las políticas de firewall de OpenWRT que quedaron reflejadas en la documentación técnica y en las evidencias gráficas conservadas del proyecto.

Su finalidad es dejar constancia pública de que la segmentación del entorno no se limita a la separación física y lógica de redes, sino que se apoya también en OpenWRT como punto central de encaminamiento y control de tráfico entre zonas.

Este archivo no pretende sustituir a un volcado completo de `/etc/config/firewall`, sino sintetizar las relaciones entre zonas y los reenvíos que sí quedaron documentados durante la implantación y validación del entorno.

## 2. Zonas funcionales documentadas

En la implantación final se trabajó con zonas asociadas a los principales segmentos activos del proyecto:

| Zona | Función asociada |
|---|---|
| `wan` | Red de tránsito y salida hacia el router principal |
| `admin` | Red de administración |
| `servicios` | Red de servicios críticos |
| `automatizacion` | Red de automatización |

Estas zonas son coherentes con la arquitectura final basada en interfaces físicas dedicadas y con el reparto funcional de las redes internas del proyecto.

## 3. Forwardings documentados

Las evidencias técnicas conservadas permiten acreditar, como mínimo, los siguientes reenvíos configurados en OpenWRT.

### 3.1 Reenvío de automatización hacia WAN

Se documentó la creación de un forwarding desde la zona `automatizacion` hacia la zona `wan`:

```sh
uci set firewall.@forwarding[-1].src='automatizacion'
uci set firewall.@forwarding[-1].dest='wan'

Su finalidad fue permitir que la red de automatización dispusiera de salida funcional hacia Internet a través de OpenWRT y del segmento WAN del proyecto.

3.2 Reenvío de administración hacia automatización

También se documentó la creación de un forwarding desde la zona admin hacia la zona automatizacion:

uci add firewall forwarding
uci set firewall.@forwarding[-1].src='admin'
uci set firewall.@forwarding[-1].dest='automatizacion'
uci commit firewall
/etc/init.d/firewall restart

Esta política permite administrar desde la red de gestión los equipos ubicados en la red de automatización, entre ellos la Raspberry Pi y la máquina virtual de automatización, conforme al diseño del proyecto.

3.3 Destinos autorizados desde la zona de administración

La captura de configuración de la zona admin muestra que esta zona quedó asociada a la red de administración y con destinos de reenvío seleccionados hacia:

automatizacion
servicios
wan

Esto respalda que la red de administración se concibió como segmento autorizado para acceder a los bloques necesarios de operación y gestión de la infraestructura.

4. Alcance de lo que puede afirmarse

A partir de la documentación y las evidencias conservadas, puede afirmarse que:

OpenWRT actuó como punto de control del tráfico entre segmentos.
La red de automatización dispuso de salida hacia WAN mediante una política de forwarding específica.
La red de administración dispuso de acceso hacia automatización para tareas de operación y diagnóstico.
La configuración de zonas y reglas de firewall formó parte de la consolidación del estado operativo del router.

No se incorpora en este repositorio una exportación completa y exhaustiva de todas las reglas internas del cortafuegos de OpenWRT. Por tanto, este documento se limita a describir las políticas confirmadas por la documentación final y por las capturas técnicas disponibles.

5. Valor técnico dentro del proyecto

Este bloque permite justificar que la segmentación del proyecto no se planteó únicamente como separación de direccionamiento IP o de puertos de switch, sino también como una arquitectura gobernada por reglas básicas de control de tráfico en OpenWRT.

La documentación de estas políticas mejora la trazabilidad del diseño y responde de forma directa a una cuestión importante en redes segmentadas: qué segmentos pueden comunicarse y bajo qué criterio.
