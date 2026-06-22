# Checklist de accesibilidad — HUMANía

Este documento define la checklist inicial de accesibilidad para la web de HUMANía.

El objetivo es diseñar y desarrollar la web desde el principio con criterios de accesibilidad, usabilidad y lectura clara.

## Objetivo

La web debe aspirar a cumplir:

- WCAG nivel AA como base mínima.
- Buenas prácticas de accesibilidad web.
- Criterios adicionales de nivel AAA cuando sean viables.
- Diseño inclusivo y usable en móvil, teclado y lectores de pantalla.

## Principios generales

La accesibilidad debe aplicarse desde:

- diseño visual
- estructura HTML
- navegación
- formularios
- contenido
- imágenes
- automatización editorial
- mantenimiento

No debe añadirse al final como parche, porque entonces no es accesibilidad: es maquillaje con casco.

## Checklist global

### Estructura HTML

- Usar HTML semántico.
- Usar una sola etiqueta h1 por página.
- Mantener jerarquía correcta de encabezados.
- Usar header, nav, main, section, article y footer cuando corresponda.
- Evitar divs innecesarios para estructura principal.
- Mantener orden lógico del contenido.

### Navegación

- La web debe poder usarse con teclado.
- Todos los enlaces deben ser alcanzables con Tab.
- El orden de tabulación debe ser lógico.
- Debe existir un enlace de salto al contenido principal.
- El menú debe poder abrirse y cerrarse con teclado.
- No deben existir trampas de teclado.

### Foco visible

- Todo elemento interactivo debe tener foco visible.
- El foco debe distinguirse claramente del estado normal.
- El foco no debe eliminarse con outline: none sin alternativa.
- El color de foco recomendado es #22C55E.

### Contraste

- El texto principal debe tener contraste suficiente con el fondo.
- El texto secundario debe mantener legibilidad.
- No usar ámbar para texto pequeño sobre fondo claro.
- No usar el color como único medio para transmitir información.
- Revisar contraste en botones, enlaces, etiquetas y formularios.

### Texto y lectura

- Usar tamaños de fuente legibles.
- Evitar bloques de texto demasiado largos.
- Usar frases claras.
- Evitar jerga innecesaria.
- Mantener buen interlineado.
- Mantener suficiente espacio entre párrafos.
- Evitar texto justificado.

### Enlaces

- Los enlaces deben tener texto descriptivo.
- Evitar textos genéricos como "clic aquí".
- Los enlaces externos deben identificarse cuando sea necesario.
- Los enlaces deben distinguirse del texto normal sin depender solo del color.

### Botones

- Los botones deben tener texto claro.
- Los botones deben ser suficientemente grandes para móvil.
- Los botones deben tener estados hover, active y focus.
- No usar botones vacíos con solo icono sin etiqueta accesible.
- Los botones deben indicar claramente la acción que realizan.

### Imágenes

- Todas las imágenes informativas deben tener texto alternativo.
- Las imágenes decorativas deben poder ignorarse por lectores de pantalla.
- Las imágenes de portada deben tener descripción útil.
- No insertar texto importante únicamente dentro de imágenes.
- Optimizar peso y tamaño de las imágenes.

### Formularios

- Todo campo debe tener label visible.
- Los errores deben explicarse con texto claro.
- No indicar errores solo con color.
- Los campos obligatorios deben identificarse.
- El formulario debe poder completarse con teclado.
- El mensaje de éxito debe ser claro.

### Noticias automatizadas

- Las noticias generadas automáticamente deben revisarse antes de publicar.
- Cada noticia debe incluir fuente original.
- Cada noticia debe incluir fecha.
- Cada noticia debe tener título claro.
- Los resúmenes deben ser comprensibles.
- No publicar contenido duplicado.
- No depender solo de imágenes para explicar la noticia.

### Responsive

- La web debe diseñarse primero para móvil.
- No debe existir scroll horizontal.
- Los botones deben ser cómodos en pantallas táctiles.
- El menú móvil debe ser accesible.
- Las tarjetas deben reorganizarse de forma clara.
- El texto debe poder leerse sin zoom forzado.

### Movimiento y animaciones

- Evitar animaciones innecesarias.
- Respetar prefers-reduced-motion.
- No usar parpadeos.
- No usar animaciones que dificulten la lectura.
- Las transiciones deben ser suaves y no esenciales.

### Multimedia

- Los audios del podcast deben tener alternativa textual cuando sea posible.
- Las transcripciones son recomendables para episodios importantes.
- Los vídeos, si se usan, deben tener subtítulos.
- No usar reproducción automática con sonido.

### SEO y accesibilidad

- Los títulos de página deben ser únicos.
- Las metadescripciones deben ser claras.
- Las URLs deben ser legibles.
- El contenido principal debe estar disponible en HTML.
- No ocultar contenido importante detrás de scripts innecesarios.

### Rendimiento

- Optimizar imágenes.
- Minimizar JavaScript.
- Evitar plugins innecesarios.
- Cargar solo fuentes necesarias.
- Mantener tiempos de carga bajos.
- Revisar rendimiento en móvil.

## Checklist por página

### Inicio

- h1 claro.
- Texto introductorio comprensible.
- Último episodio accesible.
- Noticias con títulos claros.
- Enlaces visibles.
- CTA con foco visible.

### Podcast

- Episodios ordenados.
- Enlaces a plataformas claros.
- Imagen de portada con alt.
- Descripción breve de cada episodio.
- Transcripción recomendada.

### Noticias IA

- Fuente visible.
- Fecha visible.
- Resumen claro.
- Enlace a fuente original.
- Categorías y etiquetas comprensibles.

### HUMANía

- Buena jerarquía de encabezados.
- Lectura cómoda.
- Imágenes con alt.
- Enlaces internos útiles.
- Artículos sin bloques visuales confusos.

### Archivo

- Buscador accesible.
- Filtros con etiquetas claras.
- Resultados comprensibles.
- Estado vacío explicado.
- Paginación accesible.

### Contacto

- Labels visibles.
- Errores claros.
- Confirmación de envío.
- Alternativa de contacto.
- Campos obligatorios identificados.

### Accesibilidad

- Compromiso de accesibilidad.
- Nivel objetivo.
- Canal de comunicación para incidencias.
- Fecha de revisión.
- Lenguaje claro.

## Pruebas mínimas antes de publicar

Antes de publicar una versión importante, comprobar:

- Navegación completa con teclado.
- Contraste principal.
- Formularios.
- Lectura en móvil.
- Textos alternativos.
- Jerarquía de encabezados.
- Foco visible.
- Lighthouse Accessibility.
- Revisión manual de páginas principales.

## Herramientas recomendadas

- Lighthouse.
- axe DevTools.
- WAVE.
- Validador HTML W3C.
- Prueba manual con teclado.
- Lector de pantalla.
- Comprobador de contraste.

## Resumen

La accesibilidad en HUMANía no es un añadido estético, sino una condición básica del proyecto.

La web debe ser usable, clara y comprensible para el mayor número posible de personas.
