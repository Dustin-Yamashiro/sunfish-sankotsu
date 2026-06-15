#!/usr/bin/env bash
set -euo pipefail

wp config set WP_ENVIRONMENT_TYPE local --type=constant --quiet

wp option update timezone_string 'Asia/Tokyo'
wp option update date_format 'Y-m-d'
wp option update time_format 'H:i'
wp option update blog_public 0

wp theme activate theme

inactive_themes="$(wp theme list --status=inactive --field=name || true)"
if [ -n "$inactive_themes" ]; then
  # shellcheck disable=SC2086
  wp theme delete $inactive_themes || true
fi

if wp user get test >/dev/null 2>&1; then
  wp user update test --user_pass=test || true
elif wp user get admin >/dev/null 2>&1; then
  db_prefix="$(wp db prefix)"
  wp db query "UPDATE ${db_prefix}users SET user_login = 'test' WHERE user_login = 'admin';"
  wp user update test --user_pass=test || true
else
  wp user create test test@example.com --role=administrator --user_pass=test >/dev/null
fi

post_ids="$(wp post list --post_type=post --format=ids)"
if [ -n "$post_ids" ]; then
  # shellcheck disable=SC2086
  wp post delete $post_ids --force
fi

page_ids="$(wp post list --post_type=page --format=ids)"
if [ -n "$page_ids" ]; then
  # shellcheck disable=SC2086
  wp post delete $page_ids --force
fi

comment_ids="$(wp comment list --format=ids)"
if [ -n "$comment_ids" ]; then
  # shellcheck disable=SC2086
  wp comment delete $comment_ids --force
fi

wp post generate --count="${WP_SAMPLE_POST_COUNT:-10}"
wp rewrite structure '/%postname%/'
wp rewrite flush
