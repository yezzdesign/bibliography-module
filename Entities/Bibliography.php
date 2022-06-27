<?php

namespace Modules\Bibliography\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bibliography extends Model
{
    use HasFactory;

    protected $fillable = [
        'read_at',
        'book_title',
        'book_author',
        'book_blurb',
        'book_cover',
        'book_status'
    ];

    public static function getIndexTableData() {
        return self::orderBy('id', 'desc')->paginate(25);
    }

    protected static function newFactory()
    {
        return \Modules\Bibliography\Database\factories\BibliographyFactory::new();
    }

    public function links() {
        return $this->belongsTo(Booklinks::class, 'link_id');
    }



}
