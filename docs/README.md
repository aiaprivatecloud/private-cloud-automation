# Documentación técnica

Este directorio reúne la documentación general del proyecto **AIA Private Cloud Automation**. Su función es ofrecer una lectura ordenada del sistema implementado, separar el diseño inicial de la solución final y conservar trazabilidad técnica.

## Índice recomendado

| Archivo | Contenido |
|---|---|
| `01-vision-global.md` | Propósito y criterios generales del proyecto |
| `02-network-design.md` | Diseño de red definitivo y plan de segmentación |
| `03-network-topology.md` | Topología física y lógica final |
| `04-laboratory-architecture.md` | Entorno de automatización y aislamiento |
| `05-hosting-model.md` | Distribución de funciones entre equipos |
| `06-virtualization-plan.md` | Virtualización en UTM y rol de las VMs |
| `07-estado-real-del-proyecto.md` | Estado final implantado frente a elementos reservados |
| `08-incidencias-tecnicas.md` | Router-on-a-stick descartado e integración de Raspberry Pi |
| `09-seguridad-implementada.md` | Controles de seguridad realmente aplicados |
| `10-evidencias-y-validacion.md` | Evidencias técnicas que respaldan la defensa |
| `11-sai-y-continuidad.md` | Integración del SAI y materiales aún por volcar |

## Criterio documental

- La documentación debe distinguir entre:
  - **implantado**
  - **validado**
  - **definido para ampliación**
  - **descartado tras pruebas**
- No se versionarán secretos ni datos privados.
- Las evidencias publicadas deben estar anonimizadas o ser estrictamente técnicas.
- Los cambios relevantes del proyecto deben reflejarse también en el README principal.
