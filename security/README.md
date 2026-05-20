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

- [`docs/09-seguridad-implementada.md`](../docs/09-seguridad-implementada.md)
- [`security/ufw_vm_automatizacion.sh`](ufw_vm_automatizacion.sh)
- [`security/ssh-hardening_vm.md`](ssh-hardening_vm.md)
- [`security/acl-sandbox.md`](acl-sandbox.md)

## Evidencias técnicas asociadas

Las medidas principales de este bloque cuentan con evidencias públicas seleccionadas en el repositorio:

- [`10-ufw-estado-final-mv.png`](../docs/evidencias/capturas/seguridad/10-ufw-estado-final-mv.png) — estado final de UFW en la VM de automatización.
- [`11-ssh-passwordauthentication-no.png`](../docs/evidencias/capturas/seguridad/11-ssh-passwordauthentication-no.png) — desactivación de autenticación por contraseña en SSH.
- [`20-acl-sandbox-getfacl.png`](../docs/evidencias/capturas/seguridad/20-acl-sandbox-getfacl.png) — verificación de ACL sobre el sandbox `/opt/aia-bot`.

El índice completo puede consultarse en [`docs/evidencias/README.md`](../docs/evidencias/README.md).
