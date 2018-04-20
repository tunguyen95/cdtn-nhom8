<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


class CustomerModel extends Authenticatable
{
    use Notifiable;
    protected $table = "customer";
}
