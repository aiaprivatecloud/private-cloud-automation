# Automatización básica

## 1. Objetivo

Conservar en el repositorio los elementos técnicos que demuestran la preparación del entorno de automatización del proyecto.

## 2. Sandbox desplegado

Ruta operativa:

```text
/opt/aia-bot
```

Estructura:

```text
app/
venv/
input/
output/
tmp/
logs/
conf/
```

## 3. Usuario de servicio

La ejecución de scripts se realiza con:

```text
aia-bot
```

## 4. Script de prueba versionado

Archivo:

```text
automation/app/test_bot.py
```

En el sistema desplegado se ubica en:

```text
/opt/aia-bot/app/test_bot.py
```

Su función es registrar una marca temporal en el log de ejecución para validar:

- permisos;
- entorno Python;
- escritura en disco;
- trazabilidad.

## 5. Tarea programada

La programación probada se conserva en:

```text
automation/cron/cron_aia-bot.txt
```

Contenido:

```cron
*/5 * * * * /opt/aia-bot/venv/bin/python /opt/aia-bot/app/test_bot.py >> /opt/aia-bot/logs/cron_test.log 2>&1
```

## 6. Alcance

La automatización incluida es una validación funcional mínima. La evolución hacia procesos reales más complejos queda preparada, pero no se presenta como implantada en esta fase.
