
<?php
use App\Http\Middleware\AuthorizedMiddleware;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home.index')
    ->middleware(AuthorizedMiddleware::class);

Route::get('/home/section/{id}', [HomeController::class, 'section'])
    ->name('home.section')
    ->middleware(AuthorizedMiddleware::class);

Route::get('/home/blog/{id}', [HomeController::class, 'blog'])
    ->name('home.blog')
    ->middleware(AuthorizedMiddleware::class);