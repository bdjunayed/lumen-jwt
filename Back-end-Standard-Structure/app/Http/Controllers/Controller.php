<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * Create the response for an item.
     *
     * @param  mixed                                $item
     * @param  \League\Fractal\TransformerAbstract  $transformer
     * @param  int                                  $status
     * @param  array                                $headers
     * @return Response
     */
    protected function buildItemResponse($item, \League\Fractal\TransformerAbstract $transformer, $status = 200, array $headers = [])
    {
        $resource = new \League\Fractal\Resource\Item($item, $transformer);

        return $this->buildResourceResponse($resource, $status, $headers);
    }

    /**
     * Create the response for a collection.
     *
     * @param  mixed                                $collection
     * @param  \League\Fractal\TransformerAbstract  $transformer
     * @param  int                                  $status
     * @param  array                                $headers
     * @return Response
     */
    protected function buildCollectionResponse($collection, \League\Fractal\TransformerAbstract $transformer, $status = 200, array $headers = [])
    {
        $resource = new \League\Fractal\Resource\Collection($collection, $transformer);

        return $this->buildResourceResponse($resource, $status, $headers);
    }

    /**
     * Create the response for a resource.
     *
     * @param  \League\Fractal\Resource\ResourceAbstract  $resource
     * @param  int                                        $status
     * @param  array                                      $headers
     * @return Response
     */
    protected function buildResourceResponse(\League\Fractal\Resource\ResourceAbstract $resource, $status = 200, array $headers = [])
    {
        $fractal = app('League\Fractal\Manager');

        return response()->json(
            $fractal->createData($resource)->toArray(),
            $status,
            $headers
        );
    }
}
