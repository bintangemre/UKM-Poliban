# AGENTS.md — Pengelolaan Anggota UKM POLIBAN

## Identity
Aplikasi web **pengelolaan anggota UKM** (Unit Kegiatan Mahasiswa) POLIBAN.
Dibangun dengan Laravel 12 + Filament v5.6 admin panel. Akses via `/admin`.

## Stack
- **Laravel 12** + **Filament v5.6** (admin panel at `/admin`)
- **MySQL** via Laragon, DB: `ukm_poliban` (see `.env`)
- **Vite** + **Tailwind CSS v4** for frontend assets
- PHP ^8.2, Node for Vite build

## Quick start
```bash
composer install && npm install
cp .env.example .env && php artisan key:generate
# ensure MySQL is running, create DB `ukm_poliban`
php artisan migrate:fresh --seed
php artisan serve          # http://127.0.0.1:8000/admin
npm run dev                # Vite HMR (separate terminal)
```

## Commands
| Task | Command |
|---|---|
| Dev server (all-in-one) | `composer run dev` |
| Run tests | `composer run test` (config-clears first) |
| Single migration refresh | `php artisan migrate:fresh --seed` |
| DB reset + seed | `php artisan migrate:fresh --seed` |
| Publish Filament migrations | `php artisan vendor:publish --tag=filament-actions-migrations` |
| Check syntax all files | `php -l app/Filament/Resources/*.php` |

## Rutinitas (otomatis — jangan tanya)
- Kalau error `Class "..." not found` → `composer dump-autoload`
- Kalau export gak langsung jalan → set `QUEUE_CONNECTION=sync` di `.env`
- Kalau error migration FK → cek urutan seeder di `DatabaseSeeder.php`
- Kalau tombol Create hilang / menu hilang → cek `canAccess()` di resource & role user
- Kalau `Section` not found → import dari `Filament\Schemas\Components\Section`
- Kalau `EditAction/DeleteAction` not found → import dari `Filament\Actions`
- Kalau ada perubahan migration → `php artisan migrate:fresh --seed`

## App architecture
- **4 models** in `app/Models/`: `User` (roles), `Mahasiswa`, `UKM`, `AnggotaUKM`
- **4 Filament resources** in `app/Filament/Resources/`: `MahasiswaResource`, `UKMResource`, `AnggotaUKMResource`, `PendaftaranResource`
- **Role-based access** via `canAccess()` on each resource + `getEloquentQuery()` scoping
  - Roles: `admin`, `wadir3`, `kabag_akademik`, `ketua_ukm`, `sekretaris_ukm`
  - `canManageMahasiswaDanUKM()` → admin, wadir3, kabag_akademik
  - `canManagePendaftaran()` → admin, ketua_ukm, sekretaris_ukm
- **Export** uses Filament built-in `ExportAction` with `app/Filament/Exports/*Exporter`
- **Print** via custom routes + Blade views in `resources/views/print/`
- **1 mahasiswa only 1 UKM** enforced by DB unique(`mahasiswa_id`) + form validation rule
- **Pendaftaran Anggota** = create-only, redirect ke AnggotaUKM
- **Anggota UKM** = view/edit/delete only (no create)

## Seeders (run order via DatabaseSeeder)
1. `MahasiswaSeeder` (8 students)
2. `UKMSeeder` (4 UKMs: Futsal, Debat, Fotografi, Coding Club)
3. `UserSeeder` (8 accounts including admin, wadir3, kabag, UKM leaders)
4. `AnggotaUKMSeeder` (8 membership records)

## Test accounts (password: `password`)
| Email | Role |
|---|---|
| `admin@poliban.com` | admin (full access) |
| `wadir3@poliban.com` | mahasiswa & UKM |
| `kabag@poliban.com` | mahasiswa & UKM |
| `ketua.futsal@poliban.com` | pendaftaran & anggota (UKM id=1) |
| `sekretaris.futsal@poliban.com` | pendaftaran & anggota (UKM id=1) |
| `ketua.debat@poliban.com` | pendaftaran & anggota (UKM id=2) |
| `ketua.fotografi@poliban.com` | pendaftaran & anggota (UKM id=3) |
| `ketua.coding@poliban.com` | pendaftaran & anggota (UKM id=4) |

## Test quirks
- PHPUnit config uses **in-memory SQLite** (`:memory:`), not the MySQL from `.env`
- Only skeleton `ExampleTest` files exist — no app-specific tests yet
- `composer run test` runs `config:clear` first

## Key conventions
- 4-space indent, LF line endings (`.editorconfig`)
- Migrations for `u_k_m_s` and `anggota_u_k_m_s` use underscored table names
- `filament:upgrade` runs on `composer install`/`update` via `post-autoload-dump`
- Filament v5: layout components (`Section`, `Fieldset`) in `Filament\Schemas\Components`, not `Forms`
- Filament v5: actions (`EditAction`, `DeleteAction`) in `Filament\Actions`, not `Tables\Actions`
