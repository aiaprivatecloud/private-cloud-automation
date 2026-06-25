# Formato de episodio HUMANía

Este documento define el formato mínimo recomendado para publicar episodios en la nueva web HUMANía.

La web usa WordPress como gestor de contenido, el tema humania-theme para la presentación visual y el plugin humania-ai-news para el reproductor propio mediante shortcode.

## Tipo de contenido

Cada episodio se publica como una entrada normal de WordPress.

Ruta recomendada:

- WordPress → Entradas → Añadir nueva

No se debe crear cada episodio como página estática.

## Título

El título debe ser claro, corto y reconocible.

Ejemplo:

La conciencia sale a bolsa

Evitar títulos demasiado largos si no aportan información real.

## Categoría

Cada episodio debe tener al menos una categoría.

Categorías iniciales recomendadas:

- Podcast
- Inteligencia artificial
- Actualidad IA
- HUMANía

La categoría Uncategorized debe evitarse en publicaciones reales.

## Imagen destacada

Cada episodio debe tener imagen destacada.

Requisitos básicos:

- formato recomendado: 1:1 para portadas de podcast;
- texto alternativo descriptivo;
- coherencia visual con la identidad HUMANía;
- evitar imágenes decorativas sin sentido editorial.

Ejemplo de texto alternativo:

Portada del episodio La conciencia sale a bolsa, con una campana financiera sobre una cocina humilde.

## Estructura recomendada del contenido

Estructura mínima:

Introducción breve del episodio.

[humania_player audio="URL_DEL_AUDIO_MP3" title="TÍTULO_DEL_EPISODIO" rss="URL_DEL_RSS"]

## Resumen

Resumen editorial del episodio.

## Ideas clave

- Primera idea clave.
- Segunda idea clave.
- Tercera idea clave.

## Referencias

- Fuente 1
- Fuente 2
- Fuente 3

## Shortcode del reproductor

El shortcode correcto es:

[humania_player audio="https://..." title="Título" ivoox="https://..." spotify="https://..." apple="https://..." youtube="https://..." rss="https://..."]

## Atributo obligatorio

El único atributo obligatorio es:

audio

Sin audio, el reproductor mostrará un aviso de error.

Ejemplo mínimo válido:

[humania_player audio="https://ejemplo.com/audio.mp3"]

## Atributos opcionales

Se pueden añadir enlaces externos:

- title
- ivoox
- spotify
- apple
- youtube
- rss

Ejemplo recomendado:

[humania_player audio="https://ejemplo.com/audio.mp3" title="La conciencia sale a bolsa" spotify="https://open.spotify.com/..." rss="https://anchor.fm/s/f06d1154/podcast/rss"]

## Referencias

Las referencias deben ir dentro del contenido del episodio, no dentro del reproductor.

Recomendación:

- Nombre de la fuente: breve descripción.
- Nombre de la fuente: breve descripción.

Cuando haya enlaces, deben ser claros y comprensibles. Evitar textos tipo pincha aquí.

## Accesibilidad básica

Antes de publicar, comprobar:

- la entrada tiene un único título principal;
- los encabezados siguen orden lógico;
- la imagen destacada tiene texto alternativo;
- los enlaces tienen texto descriptivo;
- el reproductor aparece después de una introducción breve;
- las referencias no dependen solo de URLs pegadas sin contexto.

## SEO básico

Antes de publicar, revisar:

- título SEO claro;
- metadescripción específica;
- frase clave relacionada con el episodio;
- categoría correcta;
- imagen destacada definida;
- extracto manual si procede.

## Checklist antes de publicar

- [ ] Título revisado.
- [ ] Categoría asignada.
- [ ] Imagen destacada añadida.
- [ ] Texto alternativo añadido.
- [ ] Shortcode del reproductor con atributo audio.
- [ ] Audio probado.
- [ ] Enlaces externos probados.
- [ ] Referencias añadidas.
- [ ] Extracto revisado.
- [ ] Vista móvil comprobada.
- [ ] Entrada publicada o programada.

## Estado

Formato inicial validado en WordPress limpio de Hostinger con:

- tema humania-theme;
- plantilla single.php;
- plugin humania-ai-news;
- shortcode [humania_player];
- reproductor propio funcionando.
