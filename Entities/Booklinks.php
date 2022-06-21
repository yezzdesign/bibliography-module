<?php

namespace Modules\Bibliography\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Blog\Entities\Posts;

class Booklinks extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'post_id',
        'link_amazon',
        'link_lovelybooks',
        'link_twitter',
        'link_thalia',
        'link_goodreads',
        'link_instagram',
        'link_facebook',
        'link_other'
    ];

    protected static function newFactory()
    {
        return \Modules\Bibliography\Database\factories\BooklinksFactory::new();
    }

    public function book() {
        return $this->belongsTo(Bibliography::class, 'book_id');
    }

    public function post() {
        return $this->belongsTo(Posts::class, 'post_id');
    }
}
