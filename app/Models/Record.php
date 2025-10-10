<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Kra8\Snowflake\HasSnowflakePrimary;

class Record extends Model
{
    use HasSnowflakePrimary;

}
