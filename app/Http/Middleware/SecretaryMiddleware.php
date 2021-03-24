<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class SecretaryMiddleware {
  public function handle($request, Closure $next) {
    if (Helper::isSecretary()) {
      return $next($request);
    } else {
      return redirect()->route('wrong-permission');
    }
  }
}
