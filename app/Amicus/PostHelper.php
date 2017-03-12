<?php
/**
 * Created by PhpStorm.
 * User: tkagnus
 * Date: 12/03/2017
 * Time: 10:28
 */

namespace App\Amicus;


use App\Models\Post;

class PostHelper
{
    public static function create($data)
    {
        $data = Helper::a2o($data);

        $post = Post::create([
            'title' => $data->title,
            'content' => $data->content,
            'slug' => $data->slug,
            'owner_id' => $data->owner_id,
            'active' => $data->active
        ]);

        return $post;
    }

    public static function update(Post $post, $data)
    {

        $data = Helper::a2o($data);

        $post = $post->fill([
            'title' => $data->title,
            'content' => $data->content,
            'slug' => $data->slug,
            'owner_id' => $data->owner_id,
            'active' => $data->active
        ]);

        if($post->save()){
            return $post;
        }

        return false;
    }

    public static function delete(Post $post)
    {
        return $post->delete();
    }
}