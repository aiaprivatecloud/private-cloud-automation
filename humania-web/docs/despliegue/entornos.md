# Entornos — HUMANía Web

Este documento define los entornos previstos para HUMANía Web.

## Entorno local

El entorno local se usará para desarrollo y pruebas iniciales.

Puede estar formado por:

- repositorio GitHub clonado en el ordenador
- editor Cursor o VS Code
- instalación local de WordPress en el futuro
- tema propio
- plugin propio

## Objetivo del entorno local

- editar código
- revisar estructura
- probar cambios básicos
- preparar commits
- trabajar con ramas
- evitar tocar producción directamente

## Entorno staging

El entorno staging será una copia de pruebas previa a producción.

Debe parecerse lo máximo posible a producción.

## Objetivo de staging

- instalar tema
- instalar plugin
- activar cambios
- probar visualmente
- revisar errores PHP
- comprobar accesibilidad básica
- comprobar rendimiento básico
- validar que no se rompe WordPress
- probar cambios antes de publicarlos

## Entorno producción

Producción es la web pública real.

Debe tocarse lo mínimo posible y siempre después de probar en staging.

## Reglas de producción

- no editar archivos desde el panel de WordPress
- no probar código nuevo directamente
- no activar plugins sin revisar
- no cambiar tema sin backup previo
- no introducir claves o credenciales en el repositorio
- documentar cambios importantes
- mantener backups disponibles

## Separación de entornos

Los entornos deben separarse para evitar:

- romper la web pública
- publicar pruebas por error
- exponer configuraciones internas
- mezclar datos reales con pruebas
- perder control sobre cambios

## Flujo básico

Desarrollo local -> GitHub -> staging -> producción

## Pendiente

- definir herramienta local de WordPress
- definir método exacto de staging en Hostinger
- definir método final de subida
- definir política de sincronización entre staging y producción
