<?php

namespace App\Http\Middleware;
use Closure;

class UserValidation {
  public function handle($request, Closure $next) {


    return $next($request);
  }
}