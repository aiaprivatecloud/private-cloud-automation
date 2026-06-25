# Decisión: HUMANía Web se desarrollará en un WordPress limpio

## Motivo

La instalación actual de staging procede de la web antigua AI IA HOY / AI Aprendí.

Aunque el tema HUMANía y el plugin HUMANía IA se instalan correctamente, el entorno sigue cargando capas heredadas de Elementor, Theme Builder, headers/footers antiguos y plugins previos.

Esto impide validar de forma fiable las plantillas propias del tema.

## Decisión

No se seguirá intentando arreglar la web antigua.

La staging clonada se usará solo para:

- consultar contenido existente;
- localizar páginas legales;
- comprobar formularios antiguos;
- extraer textos, imágenes o URLs necesarias;
- evitar romper producción.

El desarrollo visual y funcional de HUMANía Web se hará en una instalación WordPress limpia.

## Objetivo de la nueva instalación

La instalación limpia deberá contener inicialmente solo:

- WordPress;
- tema humania-theme;
- plugin humania-ai-news;
- plugins legales mínimos cuando sean necesarios;
- contenido de prueba.

## Ventajas

- Las plantillas propias del tema se podrán probar sin interferencias.
- Elementor dejará de condicionar header, footer, portada y entradas.
- El rendimiento será más fácil de controlar.
- La accesibilidad se podrá auditar desde una base limpia.
- La migración será progresiva y controlada.

## Flujo de trabajo

1. Desarrollar tema y plugin en el repositorio.
2. Generar ZIP del tema y plugin.
3. Instalar en WordPress limpio.
4. Probar plantillas propias.
5. Migrar contenido importante desde la web antigua.
6. Mantener producción intacta hasta el cambio final.

## Estado

Decisión tomada tras comprobar que la instalación clonada sigue cargando estructura heredada de Elementor y no permite validar limpiamente el tema HUMANía.
