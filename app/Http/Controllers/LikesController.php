<?php

namespace App\Http\Controllers;

use App\Helpers\Service;
use App\Models\Like;
use Horizom\Http\Request;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class LikesController
{
    public function index(Request $request): ResponseInterface
    {
        $error = Service::getErrorResponse();
        $post = $request->post();

        if (
            !$post->has('user_id') || $post->get('user_id') == '' ||
            !$post->has('professionnal_id') || $post->get('professionnal_id') == ''
        ) {
            $error->code = 'bad_request';
            $error->message = "Les données n'ont pas été fournis.";
            return response()->json($error, 400);
        }

        $userId = (int) $post->get('user_id');
        $proId = (int) $post->get('professionnal_id');
        $newItem = Like::where('user_id', $userId)->where('professionnal_id', $proId)->first();

        if ($newItem) {
            try {
                $newItem->delete();
            } catch (Throwable $e) {
                $error->code = 'unknown_error';
                $error->message = "Une erreur est survenue.";
                return response()->json($error, 400);
            }
        } else {
            try {
                $item = new Like();
                $item->user_id = $userId;
                $item->professionnal_id = $proId;

                $item->save();
            } catch (Throwable $e) {
                $error->code = 'unknown_error';
                $error->message = "Une erreur est survenue.";
                return response()->json($error, 400);
            }
        }

        $data = Service::getJsonResponse(true, 'ok');
        return response()->json($data);
    }
}
