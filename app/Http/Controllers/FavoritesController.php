<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseSchema;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Throwable;

class FavoritesController
{
    public function index(Request $request)
    {
        $response = ResponseSchema::create();
        $post = $request->post();

        if (
            !$request->has('user_id') || $request->get('user_id') == '' ||
            !$request->has('professional_id') || $request->get('professional_id') == ''
        ) {
            return $response->error(400, 'bad_request', "Les données n'ont pas été fournis.");
        }

        $userId = (int) $post->get('user_id');
        $proId = (int) $post->get('professional_id');
        $newItem = Favorite::where('user_id', $userId)->where('professional_id', $proId)->first();

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
                $item = new Favorite();
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
