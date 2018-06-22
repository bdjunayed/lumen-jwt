<?php
/**
 * Created by PhpStorm.
 * User: Hydrogen
 * Date: 6/22/2018
 * Time: 4:36 AM
 */

namespace App\Http\Controllers;

use App\Transformers\UserTransformer;
use App\User;
use Laravel\Lumen\Routing\Controller as BaseController;
use League\Fractal;
use League\Fractal\Manager;
use League\Fractal\Resource\Collection;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class UserController extends BaseController
{
    private $fractal;
    public function __construct()
    {
        $this->fractal = new Manager();
    }

    public function index() {
//        return "hi";

//        $fractal = new Manager();
//        return $fractal->createData(new Collection(User::all()))->toJson();


        $paginator = User::paginate(3);
        //dd($paginator);
        $users = $paginator->getCollection();
        //dd($users);
        $resource = new Collection($users, new UserTransformer);
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator)); //paginator
        return $this->fractal->createData($resource)->toArray();




//        return $this->response->paginator($users, new UserTransformer());

//   return new Fractal\Resource\Collection($users, new UserTransformer);

        //return $this->collection(User::all(), new UserTransformer());
    }
}