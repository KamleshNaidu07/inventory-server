<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

/**
 * @OA\Tag(name="Categories")
 */
class CategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/categories",
     *     summary="Get the list of categories",
     *     @OA\Response(response="200", description="Successful operation"),
     *     tags={"Categories"}
     * )
     */
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    /**
     * @OA\Get(
     *     path="/api/categories/{id}",
     *     summary="Get a specific category by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the category",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Successful operation"),
     *     @OA\Response(response="404", description="Category not found"),
     *     tags={"Categories"}
     * )
     */
    public function show($id)
    {
        $category = Category::find($id);
        return response()->json($category);
    }

    /**
     * @OA\Post(
     *     path="/api/categories",
     *     summary="Create a new category",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="parent_id", type="integer"),
     *         )
     *     ),
     *     @OA\Response(response="201", description="Category created"),
     *     tags={"Categories"}
     * )
     */
    public function store(Request $request)
    {
        $category = Category::create($request->all());
        return response()->json($category, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/categories/{id}",
     *     summary="Update an existing category",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the category",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="description", type="string"),
     *             @OA\Property(property="parent_id", type="integer"),
     *         )
     *     ),
     *     @OA\Response(response="200", description="Category updated"),
     *     @OA\Response(response="404", description="Category not found"),
     *     tags={"Categories"}
     * )
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return response()->json($category);
    }

    /**
     * @OA\Delete(
     *     path="/api/categories/{id}",
     *     summary="Delete a category",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the category",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="204", description="Category deleted"),
     *     @OA\Response(response="404", description="Category not found"),
     *     tags={"Categories"}
     * )
     */
    public function destroy($id)
    {
        // $category = Category::findOrFail($id);
        // $category->children()->delete();
        // $category->delete();
        // return response()->json(null, 204);
    }
}
