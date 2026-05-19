# Seguridad del entorno

Este directorio recoge los controles de seguridad documentados para la VM de automatización y para el repositorio.

## Controles principales

- Segmentación de red.
- Acceso SSH restringido.
- Autenticación por clave.
- UFW con política restrictiva.
- Usuario de servicio `aia-bot`.
- ACL sobre el sandbox.
- Exclusión de secretos y backups reales del repositorio.

## Archivos relacionados

- `docs/09-seguridad-implementada.md`
- `security/ufw_vm_automatizacion.sh`
- `security/ssh-hardening_vm.md`
- `security/acl-sandbox.md`
