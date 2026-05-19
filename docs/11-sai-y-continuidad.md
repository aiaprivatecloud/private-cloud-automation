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
- capacidad de generar evidencias sobre comportamiento real ante incidencias.

## 3. Material ya trabajado en el proyecto

En la fase final del TFG se han desarrollado pruebas y procedimientos relacionados con:

- supervisión del estado del SAI;
- monitorización de equipos alimentados o implicados;
- generación de registros de prueba;
- documentación del comportamiento ante corte.

## 4. Estado del repositorio

Este repositorio deja preparado el apartado documental, pero **el script definitivo de prueba del SAI y sus evidencias exactas deben incorporarse desde la versión final validada del proyecto**, para evitar subir una reconstrucción incompleta o distinta de la utilizada realmente.

Archivos previstos:

```text
scripts/monitor_sai_equipos.sh
monitoring/evidencias-sai/
docs/evidencias/logs/
```

## 5. Criterio de rigor

Hasta que se vuelque el script exacto y la evidencia final, el repositorio no afirma una automatización cerrada de apagado controlado. Documenta la integración y reserva el espacio para la versión plenamente trazable.
