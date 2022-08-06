<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    public function likes()
    {
        return $this->belongsToMany('App\Models\Product','likes','user_id','product_id')->withTimestamps();
    }
    //この投稿に対して既にlikeしたかどうかを判別する
    public function isLike($productId)
    {
      return $this->likes()->where('product_id',$productId)->exists();
    }

    //isLikeを使って、既にlikeしたか確認したあと、いいねする（重複させない）
    public function like($productId)
    {
      if($this->isLike($productId)){
        //もし既に「いいね」していたら何もしない
      } else {
        $this->likes()->attach($productId);
      }
    }

    //isLikeを使って、既にlikeしたか確認して、もししていたら解除する
    public function unlike($productId)
    {
      if($this->isLike($productId)){
        //もし既に「いいね」していたら消す
        $this->likes()->detach($productId);
      } else {
      }
    }

}
