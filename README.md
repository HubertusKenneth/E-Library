# ReadSpace (Laravel)

ReadSpace is a simple Laravel-based digital library application that allows users to browse book collections online. The application supports three different roles: guest, user, and admin, with varying access rights depending on each role.

As a guest, users can view the book list and book details. Registered users can access more features, such as adding books to their favorites list. Meanwhile, admins have full control over adding, editing, and deleting book data in the catalog.Website Mini Library sederhana dengan 3 peran: **guest**, **user**, dan **admin**.

**Main Features**

1. Book List --> displays all books.
2. Book Details --> book detail page.
3. Favorite Books --> users can mark books as favorites.
4. Search Books --> search for books by title/author.
5. Authentication (Register / Login) --> view books and details only; user: all features except adding books; admin: can add, edit, and delete books.

---

## Technology:

* Laravel 10+
* PHP 8.2+
* MySQL
* Blade templates
* Laravel Breeze 

---

## Installation:

1. Clone:

```bash
git clone <repo-url> E-library
cd E-library
```

2. Install dependencies:

```bash
composer install
cp .env.example .env
php artisan key:generate
npm install
```

3. .env (database) configuration

4. Run migration:

```bash
php artisan migrate
```

5. Create a storage link:

```bash
php artisan storage:link
```
6. Build asset:

```bash
npm run dev
```
7. Run the server (create new terminal):

```bash
php artisan serve
```

---
