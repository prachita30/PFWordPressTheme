# Security policy

## Supported versions

Only the latest release receives security fixes while the project is pre-1.0.

## Scope

Petal & Form is a presentation-only theme: it renders templates and patterns, has no forms,
no AJAX endpoints, no custom database tables and processes no user input. Likely issues are
output-escaping mistakes in patterns or the demo seed. Vulnerabilities in WordPress core or
WooCommerce should be reported to those projects (WordPress: https://hackerone.com/wordpress).

## Reporting a vulnerability

Please **do not open a public issue**. Use GitHub's private
[security advisory](../../security/advisories/new) form for this repository. Include:

- affected version and file,
- steps to reproduce or a proof of concept,
- impact as you understand it.

You can expect an acknowledgement within 7 days. Fixes are released as soon as practical and
credited in the changelog unless you prefer otherwise.

## Notes for site owners

No theme makes a site secure by itself. Keep WordPress, WooCommerce, plugins and PHP updated,
use strong passwords and HTTPS, and keep backups. The `demo/seed.php` script is for fresh local or
staging sites only — never upload the `demo/` folder to a production server.
