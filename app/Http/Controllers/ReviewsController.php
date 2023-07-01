<?php

namespace App\Http\Controllers;

use App\Helpers\Service;
use Psr\Http\Message\ResponseInterface;

class ReviewsController
{
    public function index(int $id = null): ResponseInterface
    {
        return response()->json(['code' => 'not-implemented-yet', 'message' => 'Not implemented yet']);
    }

    public function create(): ResponseInterface
    {
        return response()->json(['code' => 'not-implemented-yet', 'message' => 'Not implemented yet']);
    }

    public function update(int $id): ResponseInterface
    {
        return response()->json(['code' => 'not-implemented-yet', 'message' => 'Not implemented yet']);
    }

    public function delete(int $id): ResponseInterface
    {
        return response()->json(['code' => 'not-implemented-yet', 'message' => 'Not implemented yet']);
    }
}
