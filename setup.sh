#!/usr/bin/env bash
set -euo pipefail
cd "$(dirname "$0")"

docker compose up -d

docker compose run --rm wpcli core install \
  --url=http://localhost:8080 \
  --title="Numa Vietnam Travel" \
  --admin_user=admin \
  --admin_password=Admin123! \
  --admin_email=admin@example.com \
  --skip-email \
  --allow-root

docker compose run --rm wpcli plugin install woocommerce --activate --allow-root

echo "WordPress setup complete. Open http://localhost:8080 and log in with admin/Admin123!"
