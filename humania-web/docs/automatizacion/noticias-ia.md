# Automatización de noticias IA — HUMANía Web

Este documento define el diseño inicial del sistema de automatización de noticias de inteligencia artificial para HUMANía Web.

La automatización debe servir para ahorrar tiempo editorial, no para delegar el criterio del proyecto.

## Objetivo

Crear un sistema que cada 6 horas pueda:

- consultar fuentes de noticias de inteligencia artificial
- filtrar contenidos relevantes
- eliminar duplicados
- resumir la información
- clasificar la noticia
- crear un borrador en WordPress
- dejar el contenido listo para revisión humana

En la primera fase, el sistema no debe publicar automáticamente.

## Principio editorial

La automatización ayuda, pero no decide.

El flujo inicial será:

Captura -> filtrado -> deduplicación -> resumen -> borrador -> revisión humana -> publicación

## Frecuencia

La frecuencia prevista es:

- cada 6 horas
- 4 ejecuciones al día
- horario configurable
- preferiblemente mediante Cron Job real en Hostinger o sistema externo controlado

Horarios orientativos:

- 00:00
- 06:00
- 12:00
- 18:00

La hora final dependerá de la configuración del servidor y de la zona horaria.

## Fuentes

Las fuentes deberán ser fiables y estar documentadas.

Tipos de fuente admitidos:

- RSS
- APIs públicas
- APIs privadas autorizadas
- medios especializados
- blogs oficiales de empresas
- publicaciones institucionales
- repositorios o anuncios técnicos relevantes

## Criterios de fuente

Una fuente debe cumplir:

- autoría identificable
- fecha de publicación clara
- URL estable
- contenido accesible
- relación directa con inteligencia artificial
- fiabilidad editorial razonable

## Fuentes no recomendadas

No deben usarse como fuente principal:

- publicaciones sin fecha
- rumores sin confirmar
- contenido copiado sin atribución
- cuentas sociales sin verificación
- agregadores que no enlazan bien la fuente original
- páginas con contenido engañoso o excesivamente promocional

## Flujo general

### 1. Captura

El sistema consulta las fuentes configuradas.

Datos mínimos capturados:

- título
- URL
- fuente
- fecha
- extracto
- autor si existe
- imagen si existe
- categoría inicial si existe

### 2. Normalización

Los datos se limpian y normalizan.

Acciones:

- limpiar espacios
- unificar formato de fechas
- validar URL
- descartar entradas incompletas
- eliminar HTML no necesario
- limitar longitud de campos

### 3. Filtrado por relevancia

El sistema decide si una noticia está relacionada con IA.

Criterios posibles:

- menciona modelos de IA
- menciona empresas relevantes
- menciona regulación de IA
- menciona automatización
- menciona seguridad de IA
- menciona educación, empleo o sociedad vinculados a IA
- menciona investigación o lanzamientos técnicos

### 4. Deduplicación

Antes de crear un borrador, el sistema comprueba si la noticia ya existe.

Criterios de duplicado:

- misma URL
- mismo título normalizado
- mismo dominio y título parecido
- misma noticia detectada en varias fuentes
- contenido extremadamente similar

Si una noticia aparece en varias fuentes, se debe priorizar la fuente original.

### 5. Clasificación

Cada noticia debe clasificarse.

Categorías iniciales:

- Modelos de IA
- Empresas
- Regulación
- Educación
- Empleo
- Sociedad
- Creatividad
- Ciencia
- Hardware
- Seguridad
- Ética
- Automatización

### 6. Resumen

El sistema genera un resumen breve y claro.

El resumen debe:

- explicar qué ha pasado
- indicar por qué importa
- evitar exageraciones
- no inventar datos
- citar o enlazar la fuente original
- mantener tono informativo
- dejar margen para edición humana

### 7. Creación de borrador

El sistema crea una entrada en WordPress en estado borrador.

Nunca debe publicar directamente en la primera fase.

Estado inicial obligatorio:

- draft
- pendiente de revisión
- no publicado

### 8. Revisión humana

Una persona revisa:

- exactitud
- fuente
- título
- resumen
- categoría
- etiquetas
- imagen
- tono
- posible duplicado
- relevancia real

### 9. Publicación

Solo tras revisión se publica la noticia.

## Estados editoriales

Estados recomendados:

- capturada
- descartada
- duplicada
- resumida
- borrador
- revisada
- publicada
- error

## Campos recomendados en WordPress

Cada noticia debería tener:

- título
- slug
- resumen
- fuente original
- URL original
- fecha de publicación original
- fecha de captura
- categoría
- etiquetas
- estado editorial
- puntuación de relevancia
- imagen destacada
- texto alternativo de imagen
- notas internas
- hash de deduplicación

## Seguridad

La automatización debe tratar toda entrada externa como no confiable.

Esto incluye:

- fuentes RSS
- HTML externo
- APIs
- imágenes
- títulos
- resúmenes
- respuestas de modelos de IA

## Riesgos principales

| Riesgo | Mitigación |
|---|---|
| Duplicados | Hash y comparación de títulos |
| Fuente falsa | Lista blanca de fuentes |
| Prompt injection | Separar contenido de instrucciones |
| Publicación errónea | Crear solo borradores |
| HTML malicioso | Sanitización |
| URL peligrosa | Validación de URL |
| Exceso de llamadas | Límites y logs |
| Coste inesperado de API | Control de frecuencia |
| Resumen inventado | Revisión humana |

## Prompt injection

Las noticias externas pueden contener instrucciones maliciosas o manipuladoras.

El sistema debe tratar el contenido externo solo como datos.

No debe obedecer instrucciones encontradas dentro de:

- titulares
- cuerpos de noticia
- comentarios
- metadatos
- feeds
- respuestas HTML

Regla:

El contenido externo se resume, no se obedece.

## Control de errores

El sistema debe registrar:

- fuente consultada
- hora de ejecución
- número de noticias detectadas
- número de noticias descartadas
- duplicados
- errores HTTP
- errores de resumen
- errores de creación de borrador
- tiempo de ejecución

Los logs no deben guardar claves API ni datos sensibles.

## Límites

El sistema debe tener límites claros:

- máximo de fuentes por ejecución
- máximo de noticias por fuente
- máximo de borradores por ejecución
- tiempo máximo de ejecución
- reintentos limitados
- límite de llamadas a APIs externas

## Fase 1

Objetivo:

- diseño documental
- fuentes iniciales
- estructura del plugin
- creación manual de prueba
- sin publicación automática

## Fase 2

Objetivo:

- capturar fuentes reales
- deduplicar
- generar borradores
- revisar manualmente
- registrar logs

## Fase 3

Objetivo:

- mejorar puntuación de relevancia
- añadir panel interno
- añadir estado editorial
- mejorar clasificación automática
- añadir alertas de errores

## Fase 4

Objetivo:

- valorar publicación semiautomática
- solo para fuentes de máxima confianza
- solo con reglas muy estrictas
- mantener supervisión humana

## Estructura futura del plugin

Plugin previsto:

humania-ai-news

Estructura orientativa:

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

## Reglas de publicación

En la fase inicial:

- no publicar automáticamente
- no crear más de un número limitado de borradores por ejecución
- no usar fuentes no revisadas
- no usar contenido sin URL original
- no usar contenido sin fecha
- no guardar claves en el repositorio

## Pendiente de definir

- lista inicial de fuentes
- formato final de resumen
- prompt editorial
- política de imágenes
- sistema exacto de logs
- campos personalizados de WordPress
- taxonomías
- configuración del Cron Job
- límites por ejecución
- modo de revisión desde WordPress

## Resumen

La automatización de noticias de HUMANía debe estar diseñada para aumentar la capacidad editorial sin perder control, rigor ni seguridad.

La IA ayuda a preparar contenido, pero la decisión editorial sigue siendo humana.
