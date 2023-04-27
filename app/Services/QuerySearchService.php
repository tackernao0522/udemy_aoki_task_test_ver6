<?php

namespace App\Services;

class QuerySearchService
{
  public static function searchIndex($query, $data)
  {
    // もしキーワードがあったら
    if ($data !== null) {
      // 全角スペースを半角に
      $search_split = mb_convert_kana($data, 's');

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
