<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    protected $fillable = [
        'your_name',
        'title',
        'email',
        'url',
        'age',
        'gender',
        'contact',
    ];

    public function scopeSearch($query, $search)
    {
        // もしキーワードがあったら
        if ($search !== null) {
            // 全角スペースを半角に
            $search_split = mb_convert_kana($search, 's');

            // 空白で区切る
            $search_split2 = preg_split('/[\s]+/', $search_split, -1, PREG_SPLIT_NO_EMPTY);

            // 単語をループで回す
            foreach ($search_split2 as $value) {
                $query->where('your_name', 'like', '%' . $value . '%');
            }
        }

        return $query;
    }
}
