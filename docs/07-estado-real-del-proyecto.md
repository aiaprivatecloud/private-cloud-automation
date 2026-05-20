# 07 - Estado real del proyecto

## 1. Finalidad del documento

Este archivo resume qué componentes están **implantados**, cuáles quedan **definidos para ampliación** y qué elementos se documentan como **decisiones descartadas**. Su objetivo es evitar contradicciones entre el repositorio, la memoria y la presentación final.

## 2. Tabla de estado

| Bloque | Estado |
|---|---|
| Diseño general de la arquitectura | Completado |
| Segmentación lógica de red | Completada |
| VLAN 10 Administración | Implantada |
| VLAN 20 Usuarios | Definida en el diseño, no desplegada operativamente en esta fase. |
| VLAN 30 Servicios | Implantada |
| VLAN 40 Automatización | Implantada |
| VLAN 50 WAN / tránsito | Implantada |
| Switch gestionable | Configurado y validado |
| OpenWRT virtualizado | Implantado y validado |
| Router-on-a-stick | Descartado tras validación |
| Arquitectura multi-NIC | Implantada |
| Raspberry Pi | Integrada y accesible por SSH |
| SSD externo de Raspberry | Montado permanentemente |
| Sandbox `aia-bot` | Implantado |
| Entorno Python aislado | Implantado |
| Script de prueba con logs | Implantado |
| Ejecución periódica con cron | Validada |
| UFW y endurecimiento SSH en VM | Documentados e implantados según memoria |
| ACL sobre sandbox | Implantadas |
| SAI | Incorporado al entorno |
| Evidencias SAI y script de monitorización | Incorporados al repositorio en la fase final |

## 3. Criterio de coherencia

El repositorio debe presentar como arquitectura final únicamente aquello que se sostiene con la memoria y las pruebas realizadas. Por ello:

- router-on-a-stick se mantiene como **incidencia técnica**;
- la solución multi-NIC se presenta como **implantación definitiva**;
- la VLAN 20 queda definida en el diseño, pero no desplegada operativamente en esta fase;
- el agente autónomo completo se mantiene **fuera de alcance**.
