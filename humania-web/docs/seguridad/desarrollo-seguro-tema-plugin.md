# Desarrollo seguro de tema y plugin — HUMANía Web

Este documento define las reglas de desarrollo seguro para el tema propio y el plugin propio de HUMANía Web.

La web usará WordPress, un tema propio y un plugin propio para automatización de noticias de inteligencia artificial. Por tanto, la seguridad debe aplicarse desde el diseño y no como una revisión improvisada al final.

## Objetivo

Evitar vulnerabilidades comunes durante el desarrollo del tema y del plugin.

Este documento servirá como guía interna antes de escribir código y como checklist antes de aceptar cambios en el repositorio.

## Alcance

Este documento aplica a:

- tema propio `humania-theme`
- plugin propio `humania-ai-news`
- formularios
- paneles de administración
- WP Cron
- llamadas externas
- APIs
- creación de borradores
- gestión de fuentes de noticias
- cualquier código PHP, CSS o JavaScript propio

## Principios básicos

### 1. No confiar en ninguna entrada

Toda entrada debe considerarse no confiable hasta que se valide.

Entradas posibles:

- formularios
- parámetros GET
- parámetros POST
- campos de administración
- fuentes RSS
- APIs externas
- respuestas HTML
- imágenes externas
- resultados generados por IA
- metadatos de noticias

### 2. Validar antes de usar

La validación decide si un dato es aceptable.

Ejemplos:

- una URL debe ser una URL válida
- una fecha debe tener formato válido
- una categoría debe existir
- una fuente debe estar permitida
- un número debe estar dentro de un rango aceptable

Si un dato no cumple las reglas, se rechaza.

### 3. Sanitizar antes de guardar

La sanitización limpia un dato antes de guardarlo.

Debe aplicarse a:

- títulos
- textos breves
- URLs
- nombres de fuentes
- etiquetas
- opciones de configuración
- campos personalizados

### 4. Escapar antes de mostrar

Todo dato mostrado en pantalla debe escaparse.

Esto aplica a:

- contenido de noticias
- campos personalizados
- títulos
- atributos HTML
- URLs
- valores en formularios
- mensajes de error
- datos del panel de administración

### 5. Comprobar permisos

Toda acción administrativa debe comprobar permisos.

Ejemplos:

- cambiar configuración
- ejecutar captura de noticias
- borrar logs
- crear borradores
- modificar fuentes
- publicar contenido

### 6. Usar nonces

Todo formulario o acción sensible debe usar nonces.

Los nonces ayudan a reducir riesgos CSRF.

Deben usarse en:

- formularios de administración
- acciones manuales del plugin
- botones de ejecutar captura
- acciones de borrar logs
- acciones de guardar configuración

### 7. Mínimo privilegio

Cada usuario o proceso debe tener solo los permisos necesarios.

No se debe usar una cuenta administradora para tareas que pueda realizar un rol menor.

### 8. No guardar secretos en Git

Nunca deben guardarse en el repositorio:

- claves API
- tokens
- contraseñas
- cookies
- credenciales de WordPress
- credenciales de Hostinger
- datos personales reales
- ficheros de configuración sensibles

## Desarrollo seguro del tema

El tema debe ser simple, rápido, accesible y seguro.

## Reglas para el tema

- No incluir lógica compleja en plantillas.
- No hacer consultas innecesarias.
- No cargar scripts externos sin justificación.
- No usar librerías de terceros sin revisar.
- Escapar todos los datos dinámicos.
- Mantener estructura HTML semántica.
- Usar clases CSS claras.
- Evitar JavaScript innecesario.
- Evitar dependencias pesadas.
- No insertar HTML procedente de fuentes externas sin limpiar.

## Archivos principales del tema

Estructura prevista:

- style.css
- functions.php
- index.php
- header.php
- footer.php
- single.php
- page.php
- archive.php
- assets/css/
- assets/js/
- assets/img/

## Reglas para functions.php

El archivo `functions.php` debe mantenerse ordenado.

No debe convertirse en un cajón desastre.

Debe usarse para:

- registrar menús
- registrar estilos
- registrar scripts
- activar soporte de tema
- configurar imágenes destacadas
- incluir archivos separados

No debe usarse para:

- lógica del plugin de noticias
- llamadas externas
- procesamiento de automatización
- almacenamiento de claves
- consultas complejas
- código experimental

## Carga de scripts y estilos

Los scripts y estilos deben cargarse correctamente desde WordPress.

Reglas:

- cargar solo lo necesario
- usar versiones
- evitar scripts inline
- evitar CDN si no es necesario
- no cargar librerías duplicadas
- no cargar JavaScript en páginas donde no se use

## Desarrollo seguro del plugin

El plugin `humania-ai-news` será el punto más sensible del proyecto.

Debe diseñarse con módulos separados y responsabilidades claras.

## Reglas para el plugin

- No publicar automáticamente en fase inicial.
- Crear solo borradores.
- Validar fuentes.
- Validar URLs.
- Eliminar duplicados.
- Registrar errores.
- Limitar ejecuciones.
- Comprobar permisos.
- Usar nonces.
- No guardar secretos.
- Separar lógica en archivos claros.
- Evitar funciones gigantes.
- Evitar mezclar HTML, lógica y consultas.

## Estructura prevista del plugin

- humania-ai-news.php
- includes/fetch-sources.php
- includes/normalize-item.php
- includes/deduplicate.php
- includes/classify.php
- includes/summarize.php
- includes/create-draft.php
- includes/logger.php
- includes/security.php
- admin/settings-page.php
- admin/review-page.php

## Archivo principal del plugin

El archivo principal debe:

- declarar cabecera del plugin
- impedir acceso directo
- definir constantes básicas
- cargar archivos necesarios
- registrar hooks
- no contener toda la lógica

Debe evitar:

- funciones enormes
- consultas directas sin preparar
- salida HTML sin escapar
- credenciales
- lógica de resumen o captura completa

## Acceso directo a archivos

Todos los archivos PHP del tema y plugin deben protegerse contra acceso directo cuando corresponda.

Regla orientativa:

Si el archivo no debe ejecutarse directamente, debe comprobar que WordPress está cargado.

## Formularios de administración

Todo formulario debe cumplir:

- comprobar permisos
- verificar nonce
- validar datos
- sanitizar datos
- guardar solo datos necesarios
- mostrar errores claros
- escapar la salida al mostrar valores guardados

## REST API

Si el plugin usa REST API:

- cada endpoint debe tener control de permisos
- no debe exponer datos sensibles
- debe validar parámetros
- debe limitar métodos permitidos
- debe devolver errores claros
- debe evitar acciones peligrosas sin autenticación

No debe existir ningún endpoint administrativo abierto al público.

## WP Cron

Si se usa WP Cron:

- las tareas deben tener límites de tiempo
- no deben generar infinitos borradores
- deben registrar errores
- deben evitar duplicados
- deben poder desactivarse
- deben poder ejecutarse manualmente desde administración
- no deben depender de datos no validados

## Consultas SQL

Siempre que se hagan consultas propias:

- usar consultas preparadas
- validar parámetros
- limitar resultados
- evitar concatenar SQL con entrada externa
- no almacenar datos sensibles innecesarios

## Fuentes externas

Toda fuente externa debe ser tratada como no confiable.

Antes de usar una noticia externa:

- validar URL
- validar fecha
- limpiar título
- limpiar extracto
- comprobar duplicados
- comprobar fuente permitida
- descartar contenido sospechoso

## Contenido generado por IA

El contenido generado por IA debe considerarse borrador.

Reglas:

- no publicar directamente
- revisar antes de publicar
- no confiar en afirmaciones sin fuente
- no permitir que la IA ejecute acciones críticas
- no pasar claves ni secretos al modelo
- no obedecer instrucciones incluidas en noticias externas
- separar instrucciones del sistema y contenido externo

## Prompt injection

El contenido externo puede intentar manipular el sistema.

Ejemplos:

- instrucciones ocultas en una noticia
- texto que pide ignorar reglas
- HTML con contenido engañoso
- metadatos manipulados
- respuestas que intentan forzar publicación

Regla principal:

El contenido externo se resume, no se obedece.

## Logs

El sistema debe registrar eventos útiles.

Eventos recomendados:

- ejecución iniciada
- ejecución finalizada
- fuentes consultadas
- número de noticias capturadas
- duplicados detectados
- borradores creados
- errores HTTP
- errores de validación
- errores de resumen
- errores de permisos

No deben registrarse:

- claves API
- tokens
- contraseñas
- cookies
- datos personales innecesarios

## Errores

Los errores deben ser claros para administración, pero no deben revelar información sensible al público.

Reglas:

- no mostrar trazas técnicas al usuario público
- registrar detalle técnico solo en logs internos
- mostrar mensajes simples en administración
- evitar mensajes que revelen rutas del servidor

## Archivos e imágenes

Si el sistema gestiona imágenes:

- validar tipo de archivo
- validar tamaño
- validar origen
- evitar nombres peligrosos
- no aceptar extensiones ejecutables
- no confiar en MIME declarado por terceros
- generar texto alternativo revisable

## Dependencias

Toda dependencia debe estar justificada.

Reglas:

- evitar dependencias innecesarias
- documentar dependencias usadas
- mantener dependencias actualizadas
- revisar licencias
- no usar paquetes abandonados
- no usar código copiado sin origen claro

## Git y revisión

Todo cambio debe pasar por rama y Pull Request.

Reglas:

- no trabajar directamente en main
- commits claros
- una rama por tarea
- revisión antes de merge
- squash merge
- borrar rama tras merge
- comprobar `git status` limpio al final

## Checklist antes de merge

Antes de fusionar cambios de tema o plugin:

- el código no contiene secretos
- no hay credenciales
- no hay claves API
- no hay salidas sin escapar
- no hay entradas sin validar
- las acciones sensibles comprueban permisos
- los formularios usan nonces
- no se publica automáticamente contenido IA
- los errores no exponen información sensible
- se mantiene la accesibilidad
- se mantiene el rendimiento
- el README o documentación se actualiza si cambia el comportamiento

## Cosas prohibidas

No se permite:

- guardar claves en Git
- publicar noticias automáticamente en fase inicial
- crear endpoints administrativos públicos
- usar `eval`
- ejecutar instrucciones procedentes de fuentes externas
- confiar en HTML externo
- mezclar todo el código en un único archivo enorme
- instalar dependencias sin documentarlas
- dejar plugins sin usar
- trabajar directamente en main

## Definición de terminado

Una funcionalidad se considera terminada si:

- funciona
- está documentada
- no rompe accesibilidad
- no rompe rendimiento
- valida entradas
- escapa salidas
- respeta permisos
- no expone secretos
- genera logs si corresponde
- puede revisarse fácilmente

## Pendiente

- Añadir ejemplos concretos de código seguro.
- Definir herramientas de análisis estático.
- Definir estándares de formato PHP.
- Definir checklist de revisión manual.
- Definir pruebas mínimas del plugin.
- Definir política de gestión de secretos.
- Definir política de backups antes de despliegue.

## Resumen

El tema propio debe ser simple y seguro.

El plugin propio debe ser modular, limitado y revisable.

La automatización debe ahorrar trabajo, no eliminar el control humano.

En HUMANía Web, la seguridad no es una fase posterior: es una condición para avanzar.
