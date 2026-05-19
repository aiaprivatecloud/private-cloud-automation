# 11 - SAI y continuidad eléctrica

## 1. Función del SAI en el proyecto

El SAI se incorpora para reducir el impacto de cortes breves de suministro y permitir validar el comportamiento del entorno ante una interrupción eléctrica.

Equipo documentado:

- APC BE650G2-GR
- 650 VA / 400 W
- formato torre
- ocho tomas Schuko

## 2. Relación con el TFG

El SAI refuerza dos ideas clave:

- continuidad básica de la infraestructura;
- capacidad de generar evidencias sobre el comportamiento real del sistema ante incidencias eléctricas.

## 3. Trabajo realizado y validado

Durante la fase final del proyecto se realizaron pruebas específicas relacionadas con:

- supervisión del estado del SAI mediante NUT;
- detección del paso de alimentación normal a funcionamiento con batería;
- monitorización de equipos relevantes del entorno;
- generación de registros de prueba en formato log, CSV y eventos;
- documentación del comportamiento observado durante un corte eléctrico breve.

Estas pruebas no se plantearon como un sistema completo de apagado automático coordinado, sino como una validación técnica del seguimiento del SAI y de la generación de evidencias operativas.

## 4. Material incorporado al repositorio

El repositorio incluye ya los siguientes elementos asociados a esta validación:

- script de monitorización de la prueba:
  - `monitoring/sai/monitor_sai_equipos.sh`
- índice de evidencias técnicas seleccionadas:
  - `docs/evidencias/README.md`
- capturas públicas relacionadas con el SAI:
  - lectura inicial de valores mediante NUT;
  - transición de estado `OL CHRG` a `OB DISCHRG`;
  - lanzamiento del script de monitorización;
  - registro de eventos;
  - CSV generado durante la prueba.

## 5. Criterio de rigor

El repositorio documenta y respalda una **prueba real de monitorización del SAI y de registro de evidencias**, coherente con la memoria final del proyecto.

No se afirma que exista en esta fase una automatización cerrada de apagado controlado de todos los dispositivos. Esa posibilidad queda planteada como ampliación futura, una vez definido un procedimiento completo de parada segura y validado en el entorno real.
