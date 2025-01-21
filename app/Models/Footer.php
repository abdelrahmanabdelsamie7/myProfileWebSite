<?php
namespace App\Models;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Footer extends Model
{
    use HasFactory;
    protected $table = 'footers';
    protected $fillable = ['name', 'facebook_Link', 'whatsapp_Link', 'instgram_Link', 'linkedIn_Link', 'youtube_Link'];
    protected $keyType = 'string';
    public $incrementing = false;
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = Str::uuid()->toString();
            }
        });
    }
}
