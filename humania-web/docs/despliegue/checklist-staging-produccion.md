# Checklist staging y producción — HUMANía Web

Este documento define las comprobaciones antes y después de desplegar cambios.

## Antes de desplegar en staging

- rama fusionada en main
- repositorio limpio
- cambios revisados
- README actualizado si procede
- documentación actualizada si procede
- sin secretos en el repositorio
- sin claves API
- sin credenciales
- sin archivos temporales
- sin dependencias no documentadas

## Pruebas en staging

- WordPress carga correctamente
- el tema se puede activar
- el plugin se puede activar
- la home carga
- una entrada carga
- una página carga
- el panel de administración carga
- no hay errores PHP visibles
- no hay pantalla blanca
- el menú funciona
- el footer aparece
- el foco visible funciona
- la web es usable en móvil

## Antes de producción

- staging probado
- backup de archivos realizado
- backup de base de datos realizado
- método de vuelta atrás preparado
- hora de despliegue elegida
- cambios documentados
- versión identificada

## Después de desplegar en producción

- comprobar home
- comprobar entrada
- comprobar página
- comprobar login WordPress
- comprobar panel de administración
- comprobar que el tema está activo
- comprobar que el plugin está activo si procede
- revisar errores visibles
- revisar rendimiento básico
- revisar móvil
- revisar enlaces principales

## Si algo falla

1. No improvisar.
2. Anotar el error.
3. Capturar pantalla si procede.
4. Revisar logs si están disponibles.
5. Desactivar plugin si el problema viene del plugin.
6. Cambiar temporalmente de tema si el problema viene del tema.
7. Restaurar backup si es necesario.
8. Documentar la incidencia.

## Regla de oro

Si no hay backup, no hay despliegue.

Todo lo demás es fe con panel de administración.
