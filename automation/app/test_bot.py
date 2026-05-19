from pathlib import Path
from datetime import datetime

log_file = Path("/opt/aia-bot/logs/test_bot.log")
log_file.parent.mkdir(parents=True, exist_ok=True)

timestamp = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
message = f"[{timestamp}] Ejecución correcta del script de prueba\n"

with log_file.open("a", encoding="utf-8") as file_handle:
    file_handle.write(message)

print("Script ejecutado correctamente")
