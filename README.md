# Škoda dealer website — Кременчук

Website of the official Škoda dealer in Kremenchuk: model pages, cars in stock, credit / trade-in /
service pages and lead forms that go to email and Bitrix24. Content is managed in a Filament admin panel.

Production: https://www.avtocenter-kremenchuk.com.ua

## Stack

- Laravel 12, PHP 8.2+
- Filament 3 admin panel at `/admin`
- Blade + Tailwind CSS 4 (built with Vite), Alpine.js and Swiper from a CDN
- Pest for tests

## Local setup

```bash
composer install
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan storage:link
npm install && npm run build
php artisan serve
```

Create an admin user (only `@skoda-kremen.com.ua` emails can open the panel — see `User::canAccessPanel()`):

```bash
php artisan make:filament-user
```

Pages read their content from the database, so add at least the contacts record and the models in
`/admin` before browsing the site.

## How it fits together

| Area | Where |
|---|---|
| Routes | `routes/web.php` |
| Page data (queries) | `app/Http/Controllers/PageController.php`; header/footer contacts via a view composer in `AppServiceProvider` |
| Model pages (`/kodiaq`, `/karoq`, …) | one template `resources/views/model-page.blade.php`, per-model SEO/FAQ in `config/model-pages.php`, marketing copy in `resources/views/model-pages/` |
| Blade components | `resources/views/components/` (keep folder names lowercase — production runs on a case-sensitive filesystem) |
| Admin panel | `app/Filament/Resources/` |

### Adding a model page

1. Add an entry to `config/model-pages.php` (the key is the URL slug).
2. Add `resources/views/model-pages/<name>.blade.php` with the page copy.
3. Create the model in `/admin` with the same `url`.

The route and sitemap entry follow from the config.

### Lead forms

All forms (`x-form`, `x-modal`, `x-service-form`) post to `/send-form` through the shared
`submitLeadForm()` helper (`resources/views/components/lead-form-script.blade.php`).

`ModalFormController` validates the request, then `App\Jobs\ProcessLead` sends:

- an email — to `LEADS_SALON_EMAIL` for sales leads, `LEADS_SERVICE_EMAIL` when a car model is filled in;
- a lead to Bitrix24 via `BITRIX_WEBHOOK`.

The job runs after the response is sent, so no queue worker is needed. Failures are logged to
`storage/logs/laravel.log` together with the lead, so it can be recovered. The endpoint is rate limited
(10 requests/minute per IP) and has a honeypot field.

UTM parameters are stored in cookies by the script in `components/layout.blade.php` and attached to
each lead.

## Tests

```bash
php artisan test
```

- `tests/Feature/LeadFormTest.php` covers the lead pipeline.
- `tests/Feature/PagesSmokeTest.php` renders every public page with sample data.

## Deployment notes

- After deploying, run `php artisan config:cache && php artisan route:cache`. Run them again whenever
  `config/model-pages.php` changes: the model page route is limited to its slugs.
- `public/sitemap.xml` is regenerated automatically when a stock car is saved or deleted, or manually
  with `php artisan sitemap:generate`.
