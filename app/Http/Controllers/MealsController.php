<?php

namespace App\Http\Controllers;

use App\Http\Resources\Meals;
use App\Models\Meal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MealsController extends Controller
{
    public function filter(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'language'  => 'required|max:2',
                'per_page'  => 'nullable|integer|min:1',
                'page'      => 'nullable|integer|min:1',
                'diff_time' => 'nullable|integer|min:0'
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $meals = Meal::query();

        $categoryId = $request->get('category');
        $tagId = $request->get('tag');

        $perPage = (int)$request->get('per_page');
        $with = $request->get('with');
        $diffTime = $request->get('diff_time');
        $date = date("Y-m-d H:i:s", $diffTime);

        if ($tagId) {
            $tags = explode(',', $tagId);
            $meals->whereHas(
                'tag',
                function ($query) use ($tags) {
                    $query->whereIn('tag_id', $tags);

                },
                '>=',
                count($tags)
            );
        }

        if ($with) {
            $withName = explode(',', $with);
            $meals->with($withName);
        }

        if ($categoryId == "null") {
            $meals->whereNull('category_id');

        } elseif ($categoryId == "!null") {
            $meals->whereNotNull('category_id');

        } elseif ($categoryId) {
            $meals->where('category_id', $categoryId);

        }

        if ($diffTime) {
            $meals->where('updated_at', '>=', $date);

            $meals->withTrashed();

        }

        if ($perPage) {

            return Meals::collection($meals->paginate($perPage)->withPath(url()->full()));
        } else {

            return Meals::collection($meals->get());
        }
    }
}
