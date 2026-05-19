# 04 - Arquitectura del entorno de automatización

## 1. Objetivo

Preparar una base segura, ordenada y reproducible para ejecutar automatizaciones simples dentro de la infraestructura privada, sin mezclar la lógica de servicio con la administración general del sistema.

## 2. Enfoque adoptado

La automatización se implementa sobre una **VM Ubuntu Server** y se estructura mediante un sandbox dedicado:

```text
/opt/aia-bot
```

La elección de un directorio bajo `/opt` permite mantener la aplicación diferenciada del sistema base y del espacio personal de los usuarios.

## 3. Estructura del sandbox

```text
/opt/aia-bot/
├── app/
├── venv/
├── input/
├── output/
├── tmp/
├── logs/
└── conf/
```

### Función de cada directorio

| Directorio | Uso |
|---|---|
| `app/` | Scripts y lógica de automatización |
| `venv/` | Entorno virtual de Python |
| `input/` | Datos de entrada |
| `output/` | Resultados generados |
| `tmp/` | Ficheros temporales |
| `logs/` | Registros de ejecución |
| `conf/` | Configuración del entorno |

## 4. Usuario de servicio

Se crea el usuario técnico:

```bash
aia-bot
```

Su función es ejecutar los procesos automáticos con privilegios limitados, evitando que la automatización utilice la identidad del administrador del sistema.

## 5. Separación de administración y operación

El sandbox mantiene como propietario a `aia-bot`, pero se conceden permisos completos al usuario administrador mediante ACL. De esta forma:

- `aia-bot` conserva la propiedad operativa del entorno;
- `administrador` puede revisar, corregir y mantener;
- no se abren permisos globales innecesarios.

## 6. Automatización funcional implantada

Se valida el funcionamiento del sandbox mediante:

- script `test_bot.py`;
- escritura en `test_bot.log`;
- ejecución programada con `cron`;
- salida de cron redirigida a `cron_test.log`.

La tarea programada se ejecuta cada cinco minutos con la siguiente línea:

```cron
*/5 * * * * /opt/aia-bot/venv/bin/python /opt/aia-bot/app/test_bot.py >> /opt/aia-bot/logs/cron_test.log 2>&1
```

## 7. Alcance real

Esta automatización demuestra que el sistema:

- ejecuta scripts de forma controlada;
- escribe registros persistentes;
- usa un usuario de servicio;
- separa dependencias mediante entorno virtual;
- admite programación periódica.

No se presenta como implantado un agente autónomo completo ni un flujo editorial final automatizado.
