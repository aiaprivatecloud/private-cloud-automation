# Paleta de colores — HUMANía

Este documento define la paleta cromática principal del ecosistema HUMANía.

La paleta busca una identidad moderna, accesible, editorial y tecnológica, sin caer en una estética recargada o excesivamente futurista.

## Colores principales

| Nombre | Hex | Uso |
|---|---|---|
| Azul noche | #0F172A | Fondo principal en modo oscuro |
| Azul pizarra | #1E293B | Tarjetas, bloques y superficies secundarias |
| Blanco humano | #F8FAFC | Texto principal sobre fondo oscuro |
| Gris niebla | #CBD5E1 | Texto secundario sobre fondo oscuro |
| Azul HUMANía | #0EA5E9 | Enlaces, botones y detalles tecnológicos |
| Turquesa humano | #14B8A6 | Apoyos visuales y estados positivos |
| Ámbar firma | #F59E0B | Pincelada del logo y acentos de marca |
| Verde foco | #22C55E | Foco visible y accesibilidad |

## Uso en el logotipo

### Versión sobre fondo oscuro

| Elemento | Color |
|---|---|
| Fondo | #0F172A |
| H | #F8FAFC |
| Wordmark HUMANía | #F8FAFC |
| Pincelada-firma | #F59E0B |

### Versión sobre fondo claro

| Elemento | Color |
|---|---|
| Fondo | #F8FAFC |
| H | #0F172A |
| Wordmark HUMANía | #0F172A |
| Pincelada-firma | #F59E0B |

## Variables CSS recomendadas

:root {
  --humania-bg: #0F172A;
  --humania-surface: #1E293B;

  --humania-text: #F8FAFC;
  --humania-text-muted: #CBD5E1;

  --humania-primary: #0EA5E9;
  --humania-secondary: #14B8A6;
  --humania-accent: #F59E0B;

  --humania-focus: #22C55E;
}

## Reglas de accesibilidad

- No usar el color como único indicador de información.
- Mantener contraste suficiente entre texto y fondo.
- Usar foco visible en todos los elementos interactivos.
- Evitar texto pequeño en ámbar sobre fondo claro.
- Usar el ámbar como acento, no como color principal de lectura.
- Revisar siempre las combinaciones nuevas antes de publicarlas.

## Resumen de identidad

La identidad cromática de HUMANía se apoya en tres elementos:

1. Azul noche para profundidad, tecnología y lectura cómoda.
2. Blanco humano para claridad, limpieza y accesibilidad.
3. Ámbar firma para voz propia, humanidad y personalidad visual.
