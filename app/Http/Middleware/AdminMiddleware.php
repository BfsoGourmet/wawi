<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AdminMiddleware {
  public function handle($request, Closure $next) {
    if (Helper::isAdmin()) {
      return $next($request);
    } else {
      return redirect()->route('wrong-permission');
    }
  }
}
