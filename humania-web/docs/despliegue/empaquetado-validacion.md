# Empaquetado y validación — HUMANía Web

Este documento define cómo preparar el tema y el plugin de HUMANía Web para instalarlos en WordPress.

El objetivo es evitar errores de estructura, subidas incorrectas y activaciones fallidas.

## Elementos a empaquetar

Tema:

- humania-theme

Plugin:

- humania-ai-news

## Rutas en el repositorio

Tema:

- humania-web/theme/humania-theme/

Plugin:

- humania-web/plugins/humania-ai-news/

## Resultado esperado

Archivos ZIP esperados:

- humania-theme.zip
- humania-ai-news.zip

## Regla importante

El ZIP debe contener la carpeta correcta en su raíz.

Correcto para el tema:

- humania-theme/style.css
- humania-theme/index.php
- humania-theme/functions.php

Incorrecto para el tema:

- humania-web/theme/humania-theme/style.css
- style.css directamente en la raíz del ZIP sin carpeta `humania-theme`

Correcto para el plugin:

- humania-ai-news/humania-ai-news.php
- humania-ai-news/includes/
- humania-ai-news/admin/

Incorrecto para el plugin:

- humania-web/plugins/humania-ai-news/humania-ai-news.php
- humania-ai-news.php directamente en la raíz del ZIP sin carpeta `humania-ai-news`

## Empaquetado manual en Windows

### Tema

1. Ir a `humania-web/theme/`.
2. Seleccionar la carpeta `humania-theme`.
3. Comprimir la carpeta completa.
4. Renombrar el ZIP como `humania-theme.zip`.
5. Comprobar que dentro del ZIP aparece `humania-theme/style.css`.

### Plugin

1. Ir a `humania-web/plugins/`.
2. Seleccionar la carpeta `humania-ai-news`.
3. Comprimir la carpeta completa.
4. Renombrar el ZIP como `humania-ai-news.zip`.
5. Comprobar que dentro del ZIP aparece `humania-ai-news/humania-ai-news.php`.

## Empaquetado desde Git Bash

Crear carpeta de paquetes:

    mkdir -p humania-web/packages

Empaquetar tema:

    cd humania-web/theme
    tar -a -c -f ../packages/humania-theme.zip humania-theme
    cd ../..

Empaquetar plugin:

    cd humania-web/plugins
    tar -a -c -f ../packages/humania-ai-news.zip humania-ai-news
    cd ../..

Nota:

En algunos entornos de Git Bash o Windows, `tar -a` puede variar según la configuración. Si falla, usar empaquetado manual.

## Validación del ZIP del tema

Antes de instalar el tema, comprobar:

- el ZIP se llama `humania-theme.zip`
- contiene la carpeta `humania-theme`
- dentro está `style.css`
- dentro está `index.php`
- dentro está `functions.php`
- no contiene archivos temporales
- no contiene credenciales
- no contiene claves API
- no contiene carpetas innecesarias del repositorio

## Validación del ZIP del plugin

Antes de instalar el plugin, comprobar:

- el ZIP se llama `humania-ai-news.zip`
- contiene la carpeta `humania-ai-news`
- dentro está `humania-ai-news.php`
- dentro está `includes/`
- dentro está `admin/`
- dentro está `assets/`
- no contiene archivos temporales
- no contiene credenciales
- no contiene claves API
- no contiene carpetas innecesarias del repositorio

## Instalación en staging

Primero instalar en staging.

### Tema

1. Subir `humania-theme.zip`.
2. Instalar.
3. Activar.
4. Revisar la portada.
5. Revisar una entrada.
6. Revisar una página.
7. Revisar menú.
8. Revisar footer.
9. Revisar móvil.
10. Revisar foco visible.

### Plugin

1. Subir `humania-ai-news.zip`.
2. Instalar.
3. Activar.
4. Revisar que no hay error fatal.
5. Comprobar que aparece el menú HUMANía IA.
6. Abrir pantalla de ajustes.
7. Abrir pantalla de revisión.
8. Confirmar que no captura noticias.
9. Confirmar que no publica contenido.
10. Confirmar que no llama APIs externas.

## Instalación en producción

Solo instalar en producción si staging funciona correctamente.

Antes de producción:

- hacer backup de archivos
- hacer backup de base de datos
- confirmar versión del tema
- confirmar versión del plugin
- tener plan de rollback
- elegir un momento tranquilo
- evitar cambios simultáneos

## Validación después de activar

Después de activar en producción:

- comprobar home
- comprobar una entrada
- comprobar una página
- comprobar acceso a administración
- comprobar menús
- comprobar footer
- comprobar vista móvil
- comprobar que no hay pantalla blanca
- comprobar que no hay errores visibles
- comprobar que el plugin no publica nada automáticamente

## Rollback rápido del tema

Si el tema rompe la web:

1. Cambiar a un tema estable desde WordPress.
2. Si no se puede entrar, renombrar la carpeta `humania-theme`.
3. Restaurar versión anterior si procede.
4. Revisar logs.
5. Documentar incidencia.

## Rollback rápido del plugin

Si el plugin rompe la web:

1. Desactivar el plugin desde WordPress.
2. Si no se puede entrar, renombrar la carpeta `humania-ai-news`.
3. Restaurar versión anterior si procede.
4. Revisar logs.
5. Documentar incidencia.

## Checklist final antes de subir

- rama fusionada en main
- repositorio limpio
- ZIP generado desde la carpeta correcta
- ZIP revisado
- staging probado
- backup preparado
- rollback definido
- sin secretos
- sin claves API
- sin archivos temporales

## Resumen

El empaquetado correcto evita errores tontos.

Y los errores tontos son los más humillantes, porque ni siquiera puedes fingir que fue un ataque sofisticado.
