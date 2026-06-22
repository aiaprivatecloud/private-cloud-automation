# Contenido actual — HUMANía Web

Este documento recoge el análisis inicial del contenido existente en la web actual antes de migrar al nuevo diseño de HUMANía Web.

## Objetivo

Comprobar qué contenido debe conservarse, cómo está estructurado y qué dependencias existen antes de activar el nuevo tema y el nuevo plugin.

## Fuente de datos

Datos obtenidos a partir de:

- panel actual de WordPress
- exportación XML completa de WordPress realizada el 22/06/2026

## Resumen general

| Elemento | Cantidad |
|---|---:|
| Total de elementos exportados | 1075 |
| Entradas publicadas | 452 |
| Páginas publicadas | 9 |
| Medios / adjuntos | 562 |
| Comentarios | 421 |
| Elementos de menú | 22 |
| Plantillas Elementor | 12 |
| Cabecera Elementor/HFE | 1 |
| Reproductores Lean Player | 5 |
| Playlist Lean Player | 1 |
| Usuarios | 2 |

## Entradas por año

| Año | Entradas |
|---|---:|
| 2023 | 8 |
| 2024 | 356 |
| 2025 | 65 |
| 2026 | 23 |
| Total | 452 |

## Páginas actuales detectadas

| Página | Dependencia detectada |
|---|---|
| Nosotros | Elementor |
| Contacta | Elementor |
| Dudas | Elementor |
| Términos y condiciones | Documento legal / Complianz |
| AI decálogo | Elementor |
| Política de cookies (UE) | Documento legal / Complianz |
| Podcast | WordPress / posible dependencia parcial de Elementor |
| Portada | Elementor |
| AIA | Elementor |

## Conclusión sobre páginas

La mayoría de páginas visuales importantes dependen de Elementor.

Esto significa que el nuevo tema podrá mostrar el contenido general, pero habrá que reconstruir el diseño de varias páginas antes de poder abandonar Elementor.

Páginas que habrá que rediseñar o sustituir:

- Portada
- Podcast
- Nosotros
- Contacta
- Dudas
- AI decálogo
- AIA

Páginas legales que deben conservarse:

- Política de cookies (UE)
- Términos y condiciones

## Categorías principales

| Categoría | Entradas aproximadas |
|---|---:|
| empresas | 153 |
| Desafíos | 107 |
| Podcast IA Hoy | 96 |
| Chat GPT | 77 |
| Aplicaciones | 60 |
| Noticias IA | 60 |
| Ciencias | 54 |
| Historias | 52 |
| Leyes IA | 46 |
| Biografías | 28 |
| Educación | 27 |
| Blog | 25 |
| AI Aprendí | 20 |

## Etiquetas principales

| Etiqueta | Apariciones aproximadas |
|---|---:|
| IA | 257 |
| OpenAI | 143 |
| Sam Altman | 117 |
| FuturoDeLaIA | 91 |
| Elon Musk | 62 |
| InnovaciónTecnológica | 54 |
| Humania | 53 |
| AGI | 33 |
| Anthropic | 32 |
| GPT-4 | 28 |
| Meta | 23 |
| Nvidia | 20 |
| GPT 5 | 19 |
| Ciberseguridad | 16 |

## Problemas de taxonomía detectados

Se detectan posibles inconsistencias en categorías y etiquetas.

Ejemplos:

- Humania debería pasar a HUMANía.
- Elon Musk y ElonMusk deberían unificarse.
- Chat GPT y ChatGPT deberían revisarse.
- Ciencias y ciencias deberían unificarse si aparecen duplicadas.
- Noticias IA y noticias IA deberían normalizarse si aparecen duplicadas.
- Podcast IA Hoy debería adaptarse a la nueva marca HUMANía.
- Leyes IA podría pasar a Regulación.
- empresas debería pasar a Empresas.

## Dependencias detectadas

### Elementor

La exportación confirma dependencia importante de Elementor:

- páginas creadas con Elementor
- plantillas Elementor
- metadatos Elementor
- cabecera/footer posiblemente gestionados por Elementor o extensiones relacionadas

No se debe eliminar Elementor hasta que el nuevo tema sustituya esas plantillas.

### Lean Player

La exportación incluye:

- 5 reproductores Lean Player
- 1 playlist Lean Player

Los elementos detectados parecen demos o configuraciones iniciales.

Debe comprobarse si alguna página o entrada real utiliza Lean Player antes de decidir mantenerlo o eliminarlo.

### Complianz

Las páginas legales parecen depender de Complianz:

- Política de cookies (UE)
- Términos y condiciones

Complianz debe mantenerse hasta que se decida una alternativa legal clara.

## Estrategia de migración de contenido

El contenido actual se puede conservar.

La migración debe hacerse en fases:

1. Mantener la base de datos actual de WordPress.
2. Mantener entradas, páginas, medios, categorías y etiquetas.
3. Probar el nuevo tema en staging.
4. Crear plantillas propias para entradas y páginas.
5. Reconstruir la portada.
6. Reconstruir la página de podcast.
7. Revisar páginas hechas con Elementor.
8. Migrar o rehacer páginas visuales.
9. Mantener páginas legales.
10. Limpiar categorías y etiquetas.
11. Eliminar dependencias solo cuando ya no se usen.

## Plantillas necesarias en el nuevo tema

El tema HUMANía deberá incorporar progresivamente:

- front-page.php
- home.php
- single.php
- page.php
- archive.php
- category.php
- tag.php
- search.php
- 404.php
- plantilla específica para podcast
- plantilla específica para noticias IA
- plantilla específica para archivo temático

## Riesgos

| Riesgo | Mitigación |
|---|---|
| Romper páginas Elementor | Mantener Elementor hasta reconstrucción |
| Perder diseño actual | Probar en staging |
| Perder SEO | Mantener URLs y revisar metadatos |
| Perder imágenes | Conservar biblioteca de medios |
| Duplicar categorías | Limpieza controlada |
| Romper formularios | Revisar WPForms antes de cambios |
| Romper páginas legales | Mantener Complianz al inicio |
| Perder reproductores | Revisar uso real de Lean Player |

## Decisión actual

No instalar el tema ni el plugin en producción.

Primero:

- completar auditoría de plugins
- revisar suscriptores
- revisar formularios
- probar en staging
- reconstruir plantillas necesarias
- preparar limpieza de taxonomías

## Pendiente

- revisar lista completa de categorías
- revisar lista completa de etiquetas
- revisar URLs principales
- revisar páginas con Elementor una por una
- revisar uso real de Lean Player
- revisar formularios activos
- revisar SEO actual
- revisar si existen shortcodes dependientes de plugins
