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
        $paginator = User::paginate(3);
        $users = $paginator->getCollection();  // extra line
        $resource = new Collection($users, new UserTransformer);
        $resource->setPaginator(new IlluminatePaginatorAdapter($paginator)); //paginator
        return $this->fractal->createData($resource)->toArray();

//        return $this->buildCollectionResponse($users, new \App\Http\Transformers\UserTransformer);
    }
}