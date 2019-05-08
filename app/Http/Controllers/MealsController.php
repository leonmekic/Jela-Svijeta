<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestValidation;
use App\Http\Resources\Meals;
use App\Models\Meal;
use Illuminate\Http\Request;
use App\Http\Controllers\ValidateParameters;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MealsController extends Controller
{
    public function filter(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'language'  => 'required|max:2',
                'per_page'  => 'nullable|integer',
                'page'      => 'nullable|integer|min:1',
                'diff_time' => 'nullable|min:0'
            ]
        );

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $meals = Meal::query();
        $category = DB::table('category_meal');
        $tag = DB::table('meal_tag');

        $categoryId = $request->get('category_id');
        $tagId = $request->get('tag_id');
        $perPage = (int)$request->get('per_page');
        $with = $request->get('with');
        $diffTime = $request->get('diff_time');

        if ($categoryId == "null") {
            $mealID = $category->whereNull('category_id')->pluck('meal_id');
            $meals->whereIn('id', $mealID);

        } elseif ($categoryId == "!null") {
            $mealID = $category->whereNotNull('category_id')->pluck('meal_id');
            $meals->whereIn('id', $mealID);

        } elseif ($categoryId) {
            $mealID = $category->where('category_id', $categoryId)->pluck('meal_id');
            $meals->where('id', $mealID);
        }

        if ($tagId) {
            $tags = explode(',', $tagId);
            $mealID = $tag->whereIn('tag_id', $tags)->pluck('meal_id');
            $meals->whereIn('id', $mealID);
        }

        if ($with) {
            $withName = explode(',', $with);
            $meals->with($withName);
        }

        if ($diffTime && $diffTime > 0) {
            $meals->where('updated_at', '>', $diffTime);
        }

        if ($perPage && $perPage > 0) {
            return Meals::collection($meals->paginate($perPage)->withPath(url()->full()));
        } else {
            return Meals::collection($meals->get());
        }
    }
}
