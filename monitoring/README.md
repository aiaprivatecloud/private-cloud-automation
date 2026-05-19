# Monitorización, auditoría y continuidad

Este directorio reúne los elementos del repositorio vinculados a la supervisión operativa del entorno, la continuidad eléctrica básica y la generación de evidencias técnicas asociadas al SAI.

## Alcance documentado en esta fase

El proyecto incorpora una validación real de monitorización del SAI mediante NUT, ejecutada desde la Raspberry Pi, con los siguientes elementos:

- consulta del estado del SAI;
- detección del paso de alimentación normal a funcionamiento con batería;
- supervisión de varios nodos relevantes del entorno durante la prueba;
- generación de registros en formato log, CSV y eventos;
- conservación de evidencias técnicas seleccionadas en el repositorio público.

## Material disponible

- Documento técnico de continuidad:
  - [`docs/11-sai-y-continuidad.md`](../docs/11-sai-y-continuidad.md)
- Índice de evidencias públicas:
  - [`docs/evidencias/README.md`](../docs/evidencias/README.md)
- Script de monitorización de la prueba:
  - [`sai/monitor_sai_equipos.sh`](sai/monitor_sai_equipos.sh)

## Criterio de rigor

En esta fase se documenta y respalda una prueba real de monitorización y registro de eventos del SAI. No se presenta todavía como un sistema completo de apagado automático coordinado de toda la infraestructura, funcionalidad que queda planteada como ampliación futura.
