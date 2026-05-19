#!/bin/bash

# ============================================================
# Script de monitorización de prueba de SAI
# Proyecto: AIA Private Cloud Automation
# Nodo de ejecución: Raspberry Pi
# ============================================================

BASE="/mnt/externo/evidencias_sai"
FECHA=$(date +"%F_%H-%M-%S")

LOG="$BASE/prueba_sai_$FECHA.log"
CSV="$BASE/prueba_sai_$FECHA.csv"
EVENTOS="$BASE/eventos_sai_$FECHA.log"

mkdir -p "$BASE"

EQUIPOS=(
"Switch_gestionable|192.168.10.2|ping|"
"Router_principal|192.168.50.1|ping|"
"OpenWRT_gateway_VLAN40|192.168.40.1|icmp_any|"
"OpenWRT_admin_VLAN10|192.168.10.1|icmp_any|"
"Raspberry_local|127.0.0.1|ping|"
)

declare -A ESTADO_ANTERIOR

# ------------------------------------------------------------
# Función de comprobación
# ------------------------------------------------------------

check_equipo() {
    local NOMBRE="$1"
    local IP="$2"
    local METODO="$3"
    local PUERTO="$4"
    local OUT

    case "$METODO" in
        ping)
            if ping -c 1 -W 1 "$IP" >/dev/null 2>&1; then
                echo "UP"
            else
                echo "DOWN"
            fi
            ;;

        icmp_any)
            OUT=$(ping -c 1 -W 1 "$IP" 2>&1)

            if echo "$OUT" | grep -Eq "bytes from $IP|From $IP|1 received|0% packet loss|Destination Port Unreachable"; then
                echo "UP"
            else
                echo "DOWN"
            fi
            ;;

        *)
            echo "DOWN"
            ;;
    esac
}

# ------------------------------------------------------------
# Inicialización de estados
# ------------------------------------------------------------

for ITEM in "${EQUIPOS[@]}"; do
    IFS="|" read -r NOMBRE IP METODO PUERTO <<< "$ITEM"
    ESTADO_ANTERIOR["$NOMBRE"]="DESCONOCIDO"
done

# ------------------------------------------------------------
# Cabeceras de logs
# ------------------------------------------------------------

{
    echo "============================================================"
    echo "PRUEBA DE MONITORIZACIÓN DEL SAI"
    echo "Proyecto: AIA Private Cloud Automation"
    echo "Nodo de monitorización: Raspberry Pi"
    echo "Inicio de prueba: $(date '+%F %T')"
    echo "Archivo de log: $LOG"
    echo "Archivo CSV: $CSV"
    echo "Archivo de eventos: $EVENTOS"
    echo "============================================================"
    echo ""
} | tee -a "$LOG"

echo "timestamp,ups_status,battery_charge,battery_runtime,equipo,ip,metodo,puerto,estado" > "$CSV"

{
    echo "============================================================"
    echo "REGISTRO DE CAMBIOS DE ESTADO"
    echo "Inicio: $(date '+%F %T')"
    echo "============================================================"
    echo ""
} > "$EVENTOS"

# ------------------------------------------------------------
# Bucle principal
# ------------------------------------------------------------

while true; do
    TS=$(date '+%F %T')

    UPS_STATUS=$(upsc aia-sai@localhost ups.status 2>/dev/null)
    BATTERY_CHARGE=$(upsc aia-sai@localhost battery.charge 2>/dev/null)
    BATTERY_RUNTIME=$(upsc aia-sai@localhost battery.runtime 2>/dev/null)

    [ -z "$UPS_STATUS" ] && UPS_STATUS="N/D"
    [ -z "$BATTERY_CHARGE" ] && BATTERY_CHARGE="N/D"
    [ -z "$BATTERY_RUNTIME" ] && BATTERY_RUNTIME="N/D"

    {
        echo "===== $TS ====="
        echo "SAI: $UPS_STATUS"
        echo "Batería: ${BATTERY_CHARGE}%"
        echo "Autonomía estimada: ${BATTERY_RUNTIME}s"
    } >> "$LOG"

    for ITEM in "${EQUIPOS[@]}"; do
        IFS="|" read -r NOMBRE IP METODO PUERTO <<< "$ITEM"

        ESTADO=$(check_equipo "$NOMBRE" "$IP" "$METODO" "$PUERTO")

        echo "$TS,$UPS_STATUS,$BATTERY_CHARGE,$BATTERY_RUNTIME,$NOMBRE,$IP,$METODO,$PUERTO,$ESTADO" >> "$CSV"
        echo "$NOMBRE ($IP) [$METODO ${PUERTO:-sin_puerto}]: $ESTADO" >> "$LOG"

        if [ "${ESTADO_ANTERIOR[$NOMBRE]}" != "$ESTADO" ]; then
            echo "$TS - CAMBIO - $NOMBRE ($IP): ${ESTADO_ANTERIOR[$NOMBRE]} -> $ESTADO | Método: $METODO ${PUERTO:-} | SAI: $UPS_STATUS | Batería: ${BATTERY_CHARGE}% | Runtime: ${BATTERY_RUNTIME}s" | tee -a "$EVENTOS"

            ESTADO_ANTERIOR["$NOMBRE"]="$ESTADO"
        fi
    done

    echo "" >> "$LOG"
    sync
    sleep 2
done
