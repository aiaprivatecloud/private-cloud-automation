# 08 - Incidencias técnicas relevantes

## 1. Incidencia con el modelo router-on-a-stick

### 1.1 Diseño inicial

El proyecto planteó inicialmente un enlace trunk 802.1Q desde el switch hacia OpenWRT, de modo que una única interfaz transportara varias VLAN mediante subinterfaces:

- `eth0.10`
- `eth0.20`
- `eth0.30`
- `eth0.40`
- `eth0.50`

### 1.2 Problema observado

El diseño resultó correcto desde el punto de vista conceptual, pero no ofreció un funcionamiento operativo estable en el entorno real:

- Apple Silicon;
- UTM;
- interfaz física integrada en una capa de bridge del anfitrión;
- tráfico VLAN etiquetado hacia la VM.

### 1.3 Decisión adoptada

Se abandonó el router-on-a-stick como solución de implantación y se adoptó una arquitectura con cuatro interfaces físicas diferenciadas:

- WAN / tránsito;
- administración;
- servicios;
- automatización.

Esta adaptación conserva los objetivos del proyecto y mejora la estabilidad del despliegue.

---

## 2. Incidencias con la Raspberry Pi

### 2.1 Falta de direccionamiento útil

Durante la integración inicial de la Raspberry Pi, el equipo no quedó accesible por red. Tras revisar DHCP, cableado, VLAN y mapeo de interfaces, se optó por configurar una dirección fija:

```text
192.168.40.10/24
Gateway: 192.168.40.1
```

### 2.2 Acceso desde la red de administración

Una vez configurada la Raspberry, se comprobó que tenía conectividad saliente, pero el portátil de administración no alcanzaba la subred 192.168.40.0/24.

La solución fue añadir en Windows:

```powershell
route -p add 192.168.40.0 mask 255.255.255.0 192.168.10.1
```

### 2.3 Resultado

Tras la corrección:

- ping funcional;
- SSH operativo;
- encaminamiento entre administración y automatización validado.

---

## 3. Valor técnico de las incidencias

Estas incidencias son relevantes para el módulo porque demuestran:

- diagnóstico por capas;
- descarte de hipótesis;
- análisis de enrutamiento;
- comprensión de virtualización de red;
- adaptación razonada de la arquitectura.
