# Backups y rollback — HUMANía Web

Este documento define la estrategia inicial de backups y vuelta atrás para HUMANía Web.

## Objetivo

Poder recuperar la web si un despliegue falla.

## Qué se debe proteger

- archivos de WordPress
- tema propio
- plugin propio
- base de datos
- uploads
- configuración relevante
- contenido editorial
- usuarios y roles
- ajustes del sitio

## Backups antes de cambios importantes

Antes de tocar producción:

- backup de archivos
- backup de base de datos
- comprobar que el backup se ha creado
- guardar fecha y motivo
- identificar versión anterior del tema o plugin

## Rollback del tema

Si el tema falla:

1. Acceder al panel si es posible.
2. Cambiar a un tema estable.
3. Si no se puede acceder, renombrar la carpeta del tema por SFTP o gestor de archivos.
4. Restaurar versión anterior si procede.
5. Revisar logs.
6. Documentar incidencia.

## Rollback del plugin

Si el plugin falla:

1. Desactivar el plugin desde WordPress si es posible.
2. Si no se puede acceder, renombrar la carpeta del plugin.
3. Restaurar versión anterior si procede.
4. Revisar logs.
5. Documentar incidencia.

## Rollback completo

Si el fallo afecta a toda la web:

1. Activar modo mantenimiento si es posible.
2. Restaurar archivos.
3. Restaurar base de datos.
4. Comprobar acceso.
5. Comprobar contenido.
6. Comprobar tema.
7. Comprobar plugins.
8. Documentar el incidente.

## Buenas prácticas

- no depender de un único backup
- probar restauraciones
- no borrar backups recientes tras un despliegue
- documentar cambios
- mantener versiones identificables

## Pendiente

- definir frecuencia de backups
- definir ubicación de backups
- definir responsable de restauración
- definir prueba periódica de restauración
