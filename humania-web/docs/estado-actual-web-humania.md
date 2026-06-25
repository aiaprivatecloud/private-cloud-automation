# Estado actual de la web HUMANía

Este documento resume el estado funcional actual de la nueva web HUMANía tras las primeras fases de construcción y prueba en una instalación limpia de WordPress en Hostinger.

## Objetivo de la web

La nueva web HUMANía tiene como objetivo ser una web simple, ligera, accesible y centrada en el podcast y los contenidos sobre inteligencia artificial en castellano.

La filosofía del proyecto es:

- WordPress como gestor de contenido;
- tema propio para controlar el diseño;
- plugin propio para funciones específicas;
- evitar dependencia de Elementor;
- trabajar en instalación limpia;
- mantener la web antigua solo como referencia o almacén de contenido.

## Entorno de pruebas

La web se está probando en una instalación limpia de WordPress en Hostinger.

Dominio temporal de pruebas:

seashell-lion-245826.hostingersite.com

La instalación limpia se usa para validar el tema y el plugin sin interferencias de plantillas heredadas, Elementor, footers antiguos o configuraciones residuales.

## Branding

Nombre del proyecto:

HUMANía

Frase principal:

HUMANía, la IA en castellano.

Paleta base:

- Azul noche: #0B1B2B
- Turquesa: #00D1C1
- Fondo claro: #F2F5F8
- Texto principal: #1F2E3A
- Acento cálido: #FFB703
- Blanco: #FFFFFF

## Tema activo

Tema:

humania-theme

Ubicación en el repositorio:

humania-web/theme/humania-theme/

El tema contiene actualmente:

- style.css
- functions.php
- header.php
- footer.php
- front-page.php
- single.php
- page.php
- archive.php
- search.php
- 404.php
- assets/css/main.css
- assets/js/main.js

## Plantillas implementadas

### Portada

Archivo:

front-page.php

Estado:

Funciona correctamente en WordPress limpio.

Incluye:

- hero principal de HUMANía;
- frase La IA en castellano;
- botones de acción;
- listado de episodios o contenidos recientes;
- diseño mobile-first.

### Entradas / episodios

Archivo:

single.php

Estado:

Funciona correctamente en WordPress limpio.

Incluye:

- estructura propia de episodio;
- título;
- fecha;
- categorías;
- imagen destacada;
- contenido;
- soporte para shortcode del reproductor;
- etiquetas.

### Páginas simples

Archivo:

page.php

Estado:

Funciona correctamente en WordPress limpio.

Usada para páginas como:

- Sobre HUMANía;
- Contacto;
- Política de privacidad;
- Política de cookies;
- Términos y condiciones.

### Archivos y categorías

Archivo:

archive.php

Estado:

Funciona correctamente en WordPress limpio.

Usada para listados como:

- categorías;
- archivos por fecha;
- taxonomías compatibles.

### Búsqueda

Archivo:

search.php

Estado:

Funciona correctamente en WordPress limpio.

Incluye:

- formulario de búsqueda;
- listado de resultados;
- mensaje si no hay resultados;
- paginación.

### Error 404

Archivo:

404.php

Estado:

Funciona correctamente en WordPress limpio.

Incluye:

- mensaje personalizado;
- enlace de vuelta al inicio;
- diseño alineado con HUMANía.

## Header

Archivo:

header.php

Estado:

Funciona correctamente.

Incluye:

- marca HUMANía;
- frase La IA en castellano;
- skip link de accesibilidad;
- menú principal registrable desde WordPress;
- fallback de navegación si no hay menú creado.

Menú configurado en WordPress:

Menú principal HUMANía

Ubicación:

Menú principal

Elementos iniciales:

- Inicio;
- Sobre HUMANía;
- Contacto.

## Footer

Archivo:

footer.php

Estado:

Funciona correctamente.

Incluye enlaces a:

- Política de privacidad;
- Política de cookies;
- Términos y condiciones;
- Contacto.

Las páginas base existen en WordPress y los enlaces funcionan.

## Plugin activo

Plugin:

humania-ai-news

Ubicación en el repositorio:

humania-web/plugins/humania-ai-news/

Estado:

Instalado y activo en WordPress limpio.

Funcionalidad actual:

- menú de administración HUMANía IA;
- pantalla de Ajustes;
- pantalla de Revisión;
- shortcode del reproductor;
- CSS propio del reproductor.

La automatización de noticias todavía no está activada.

## Reproductor

Shortcode:

[humania_player]

Atributo obligatorio:

audio

Ejemplo mínimo:

[humania_player audio="https://ejemplo.com/audio.mp3"]

Ejemplo probado:

[humania_player audio="https://anchor.fm/s/f06d1154/podcast/play/121783560/https%3A%2F%2Fd3ctxlq1ktw2nl.cloudfront.net%2Fstaging%2F2026-5-21%2F86b75e1e-ea7e-cd47-f998-bda6c2592fbb.mp3" title="Episodio de prueba HUMANía" rss="https://anchor.fm/s/f06d1154/podcast/rss"]

Estado:

Funciona correctamente en entradas.

## Páginas creadas en WordPress

Páginas base creadas y publicadas:

- Sobre HUMANía
- Política de privacidad
- Política de cookies
- Términos y condiciones
- Contacto

Las páginas legales tienen contenido provisional pendiente de revisión final.

## Pruebas realizadas

Se ha comprobado en WordPress limpio:

- portada;
- entrada con reproductor;
- página simple;
- header;
- footer;
- menú principal;
- enlaces legales;
- categoría;
- búsqueda;
- página 404.

## Decisiones tomadas

### No continuar arreglando la web vieja

La web antigua contenía interferencias de Elementor, plantillas heredadas, popups y configuraciones residuales.

Decisión:

- no invertir más tiempo en limpiar el staging viejo;
- usar WordPress limpio como base real;
- usar la web vieja solo como referencia o fuente de contenido.

### No depender de Elementor

La nueva web debe funcionar con:

- tema propio;
- editor de WordPress;
- plugin propio;
- código controlado en GitHub.

### No versionar ZIPs

Los archivos ZIP generados para instalar tema o plugin en WordPress no deben añadirse al repositorio salvo decisión expresa.

Se versiona el código fuente.

## Pendiente

Próximos bloques recomendados:

1. Mejorar estilos de contenido editorial.
2. Crear plantilla o documentación para la página Sobre HUMANía definitiva.
3. Preparar textos legales reales.
4. Añadir página de episodios si se decide separarla de la portada.
5. Diseñar página de contacto funcional.
6. Revisar accesibilidad con checklist.
7. Revisar rendimiento y caché.
8. Avanzar en automatización de noticias IA.
9. Preparar migración de contenido desde la web antigua.
10. Definir proceso final de despliegue a producción.

## Estado general

La web nueva HUMANía ya tiene una base estructural funcional.

No es todavía la versión final, pero ya cuenta con:

- identidad visual básica;
- tema propio;
- plugin propio;
- navegación real;
- páginas base;
- reproductor funcional;
- plantillas principales;
- plantillas auxiliares;
- pruebas correctas en WordPress limpio.
