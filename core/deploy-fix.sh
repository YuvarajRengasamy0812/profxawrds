#!/bin/bash
# PROFX Awards - live server repair script (cPanel Terminal)
# Usage:
#   cd ~/public_html/profxawards.com/core
#   bash deploy-fix.sh
# If cPanel's default "php" is old, run with:  PHP=/opt/cpanel/ea-php82/root/usr/bin/php bash deploy-fix.sh

cd "$(dirname "$0")" || exit 1
CORE="$(pwd)"
ROOT="$(dirname "$CORE")"
PHP="${PHP:-php}"

echo "== Project: $CORE"
echo
echo "== 1. PHP version (needs 8.1 or newer)"
"$PHP" -v | head -1

echo
echo "== 2. Last errors BEFORE fix (this shows the real reason for the 500)"
for f in "$ROOT/error_log" "$CORE/error_log" "$CORE/storage/logs/laravel.log"; do
    if [ -s "$f" ]; then
        echo "--- $f"
        tail -n 15 "$f" | cut -c1-400
    fi
done

echo
echo "== 3. Required files"
for f in vendor/autoload.php .env bootstrap/app.php app/Models/Sponsor.php app/Http/Middleware/BlockUnusedAdmin.php config/profx.php; do
    if [ -f "$f" ]; then echo "OK      $f"; else echo "MISSING $f   <-- upload this file"; fi
done

echo
echo "== 4. Folders + permissions"
mkdir -p storage/app storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs bootstrap/cache "$ROOT/uploads/sponsors"
find storage bootstrap/cache -type d -exec chmod 755 {} \;
find storage bootstrap/cache -type f -exec chmod 644 {} \;
chmod 755 "$ROOT/uploads" "$ROOT/uploads/sponsors"
chmod 644 "$ROOT/index.php" "$ROOT/.htaccess" .env 2>/dev/null
echo "done"

echo
echo "== 5. Clear old caches"
rm -f bootstrap/cache/config.php bootstrap/cache/routes-v7.php bootstrap/cache/routes.php bootstrap/cache/events.php
rm -f storage/framework/views/*.php
"$PHP" artisan optimize:clear

echo
echo "== 6. Create sponsor tables"
"$PHP" artisan migrate --path=database/migrations/2026_10_07_000001_create_sponsors_tables.php --force

echo
echo "== 7. Check routes load (a PHP error in uploaded files shows here)"
"$PHP" artisan route:list --path=admin/sponsors 2>&1 | tail -n 12

echo
echo "== 8. Live check"
for u in "" admin/login admin; do
    code=$(curl -s -o /dev/null -w "%{http_code}" "https://profxawards.com/$u")
    echo "https://profxawards.com/$u  ->  $code"
done
echo "(200 or 302 = working, 500 = still broken: send the output of step 2 and 9)"

echo
echo "== 9. Errors AFTER fix"
for f in "$ROOT/error_log" "$CORE/error_log"; do
    [ -s "$f" ] && { echo "--- $f"; tail -n 8 "$f" | cut -c1-400; }
done
echo
echo "Finished."
