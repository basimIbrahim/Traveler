# Traveler – PHP Hotel & Tour Booking

Traveler is a simple PHP/MySQL web app for browsing hotels and tours, viewing details with galleries, and simulating bookings. It ships with Bootstrap styling, basic auth modals, and seed data for quick demos.

## Features
- Landing page with featured hotels and tours pulled from MySQL.
- Hotel and tour lists with detail pages, image galleries, and “Book” CTAs.
- Modal-based login/registration (session-backed) plus a newsletter form stub.
- Payment pop-up UI (front-end only) with Apple Pay, credit card, and PayPal options.
- Responsive layout via Bootstrap 5 and custom CSS.

## Tech Stack
- PHP 8+, MySQL/MariaDB
- Bootstrap 5.3, vanilla JS
- Sessions for auth state; mysqli for DB access

## Getting Started
1) Prereqs: PHP 8+, MySQL/MariaDB, a local web server (Apache via XAMPP/WAMP is fine).  
2) Clone or drop the project into your web root (e.g., `htdocs/Traveler`).  
3) Database:
   - Create a database named `booking_system`.
   - Import `Database/booking_system.sql` (phpMyAdmin or `mysql -u root -p booking_system < Database/booking_system.sql`).
4) Config: Update DB credentials in `config/db.php` if your MySQL user/password differ from `root`/``.  
5) Run: Start Apache/MySQL, then open `http://localhost/Traveler/index.php`.

## Demo Data / Accounts
- Seed data includes hotels, rooms, tours, and one user: `s445005309@uqu.edu.sa` with password `1129682926`.
- You can also register a new account via the modal (passwords are stored as entered; see notes below).

## Key Files
- `index.php` – homepage with featured cards
- `hotelList.php`, `TourList.php` – listing pages
- `infoHotel.php`, `infoTour.php` – detail pages with galleries and booking modal
- `auth.php` – login/register handler
- `includes/header.php`, `includes/footer.php` – shared layout and modals
- `js/Payment.js`, `js/RegisterSignin.js` – booking/payment modal behavior and auth modals
- `css/style.css` plus supporting styles
- `Database/booking_system.sql` – schema and sample content

## Notes & Limitations
- Payment modal is UI-only; no real payment processing or booking persistence is wired up.
- Passwords are stored in plain text or unhashed values from the seed data; add hashing (password_hash) before production use.
- Some queries interpolate IDs directly; prefer prepared statements for all inputs.
- Newsletter form posts to `newsletter.php`, which you’ll need to implement if you want real handling.
- No automated tests are included.

## Customization Ideas
- Add real booking inserts with availability checks and payment gateway integration.
- Hash and salt passwords; add CSRF tokens and stricter validation.
- Extend seed data with more hotels/tours and replace placeholder images.
- Add Roles for Users, Travelers, Owners, Opreators.
