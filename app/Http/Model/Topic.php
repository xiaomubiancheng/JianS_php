<?php

namespace App\Http\Model;

use App\Http\Model\Model;

class Topic extends Model
{

    // 属于这个主题的所有文章
    public function posts()
    {
        return $this->belongsToMany(\App\Http\Model\Post::class, 'post_topics', 'topic_id', 'post_id');
    }

    //主题的文章数
    public function postTopics()
    {
        return $this->hasMany(\App\Http\Model\PostTopic::class, 'topic_id');
    }


}
