<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

class Helper {
  public static function isAdmin() {
    $user = Auth::user();
    if ($user && $user->role == 'admin') {
      return true;
    } else {
      return false;
    }
  }

  public static function isSecretary() {
    $user = Auth::user();
    if ($user && $user->role == 'secretary') {
      return true;
    } else {
      return false;
    }
  }

  public static function isGuest() {
    $user = Auth::user();
    if ($user && $user->role == 'guest') {
      return true;
    } else {
      return false;
    }
  }
}
