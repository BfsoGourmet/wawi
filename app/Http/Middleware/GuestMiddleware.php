<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class GuestMiddleware {
  public function handle($request, Closure $next) {
    if (Helper::isGuest()) {
      return $next($request);
    } else {
      return redirect()->route('wrong-permission');
    }
  }
}
