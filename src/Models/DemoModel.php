<?php

namespace Jmrashed\Automation\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jmrashed\Automation\Database\Factories\DemoFactory;

class DemoModel extends Model
{
    use HasFactory;

    // Disable Laravel's mass assignment protection
    protected $guarded = [];
    protected $fillable = ['status_id', 'created_at', 'updated_at'];


    protected static function newFactory()
    {
        return DemoFactory::new();
    }



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
