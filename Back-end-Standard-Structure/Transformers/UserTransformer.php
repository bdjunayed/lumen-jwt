<?php
/**
 * Created by PhpStorm.
 * User: Hydrogen
 * Date: 6/22/2018
 * Time: 3:53 AM
 */

namespace App\Transformers;

use App\User;
use League\Fractal\TransformerAbstract;
class UserTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    //protected $availableIncludes = ['user'];

    /**
     * List of resources to automatically include.
     *
     * @var array
     */
    //protected $defaultIncludes = ['user'];

    /**
     * Turn this item object into a generic array.
     *
     * @param  \App\Post  $post
     * @return array
     */
    public function transform(User $user) {
        return [
            'id' => $user->id,
            'name' => $user->name.' '.$user->surname,
            'email' => $user->email,
            'phone' => $user->phone,
            'created_at' => $user->created_at->toDateTimeString(),
            'links'        => [
                [
                    'rel' => 'self',
                    'uri' => '/user/images/'.$user->id,
                ],
            ],
        ];
    }

    /**
     * Include user.
     *
     * @param  \App\Post  $post
     * @return League\Fractal\ItemResource
     */
//    public function includeLevels(Post $post)
//    {
//        return $this->item($post->user, new UserTransformer);
//    }
}