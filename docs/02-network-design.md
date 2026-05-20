# 02 - Diseño de red definitivo

## 1. Objetivo

La red se diseña para separar funciones, reducir exposición innecesaria y facilitar administración y diagnóstico. El proyecto abandona la idea de una red doméstica plana y adopta una infraestructura segmentada mediante VLAN y subredes diferenciadas.

## 2. Segmentación lógica final

| VLAN | Función | Red | Estado |
|---:|---|---|---|
| 10 | Administración | 192.168.10.0/24 | Implantada |
| 20 | Usuarios | 192.168.20.0/24 | Definida en el diseño, no desplegada operativamente en esta fase. |
| 30 | Servicios críticos | 192.168.30.0/24 | Implantada |
| 40 | Automatización | 192.168.40.0/24 | Implantada |
| 50 | WAN / tránsito | 192.168.50.0/24 | Implantada |

La VLAN 1 queda como residuo de gestión del propio switch, pero **no se utiliza como red operativa del proyecto**.

## 3. Criterio de uso por segmento

### VLAN 10 - Administración
Destinada al acceso técnico a la infraestructura:

- portátil de administración;
- gestión de OpenWRT;
- gestión del switch;
- acceso SSH controlado a sistemas internos cuando proceda.

### VLAN 20 - Usuarios
Red prevista para ampliaciones futuras. Está definida a nivel de diseño, pero no se despliega como segmento operativo en la fase actual.

### VLAN 30 - Servicios críticos
Aloja el NAS y los servicios persistentes vinculados a almacenamiento o respaldo.

### VLAN 40 - Automatización
Aloja la Raspberry Pi y el entorno vinculado a monitorización, automatización y evidencias. La VM de automatización se documenta dentro de esta lógica de aislamiento.

### VLAN 50 - WAN / tránsito
Conecta OpenWRT con el router principal de salida a Internet.

## 4. Encaminamiento

OpenWRT actúa como puerta de enlace para los segmentos internos:

| Interfaz OpenWRT | Función | Dirección |
|---|---|---|
| `eth0` | WAN / tránsito | IP obtenida en la red 192.168.50.0/24 |
| `eth1` | Administración | 192.168.10.1/24 |
| `eth2` | Servicios | 192.168.30.1/24 |
| `eth3` | Automatización | 192.168.40.1/24 |

## 5. Decisión arquitectónica clave

El modelo inicial de **router-on-a-stick** se descartó tras pruebas reales. Aunque era correcto a nivel conceptual, el tráfico VLAN etiquetado no se comportó de forma operativa y estable al atravesar la capa de virtualización del anfitrión Apple Silicon + UTM.

La solución final se basa en **interfaces físicas dedicadas**, una por segmento principal, lo que mantiene la segmentación prevista y mejora la estabilidad del despliegue.

## 6. Reglas funcionales básicas de comunicación

A alto nivel:

- Administración puede acceder a los elementos que necesita gestionar.
- Servicios y automatización quedan separados por función.
- La exposición hacia Internet se mantiene controlada.
- El acceso SSH de la VM de automatización queda limitado a la VLAN 10.
- El NAS no se considera un recurso de acceso indiscriminado desde todas las redes.

## 7. Validaciones relevantes

- Acceso al switch desde administración.
- Acceso al gateway OpenWRT.
- Enrutamiento entre redes internas según el diseño.
- Acceso desde la red de administración a la Raspberry Pi tras añadir ruta estática persistente en Windows.
- Salida a Internet de la Raspberry Pi.
