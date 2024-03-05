<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

/**
 * @OA\Tag(name="Suppliers")
 */
class SupplierController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/suppliers",
     *     summary="Get the list of suppliers",
     *     @OA\Response(response="200", description="Successful operation"),
     *     tags={"Suppliers"}
     * )
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return response()->json($suppliers);
    }

    /**
     * @OA\Get(
     *     path="/api/suppliers/{id}",
     *     summary="Get a specific supplier by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the supplier",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="200", description="Successful operation"),
     *     @OA\Response(response="404", description="Supplier not found"),
     *     tags={"Suppliers"}
     * )
     */
    public function show($id)
    {
        $supplier = Supplier::find($id);
        return response()->json($supplier);
    }

    /**
     * @OA\Post(
     *     path="/api/suppliers",
     *     summary="Create a new supplier",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="contact_name", type="string"),
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="phone_number", type="string"),
     *             @OA\Property(property="address", type="string"),
     *             @OA\Property(property="website", type="string"),
     *             @OA\Property(property="payment_terms", type="string"),
     *         )
     *     ),
     *     @OA\Response(response="201", description="Supplier created"),
     *     tags={"Suppliers"}
     * )
     */
    public function store(Request $request)
    {
        $supplier = Supplier::create($request->all());
        return response()->json($supplier, 201);
    }

    /**
     * @OA\Put(
     *     path="/api/suppliers/{id}",
     *     summary="Update an existing supplier",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the supplier",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="name", type="string"),
     *             @OA\Property(property="contact_name", type="string"),
     *             @OA\Property(property="email", type="string"),
     *             @OA\Property(property="phone_number", type="string"),
     *             @OA\Property(property="address", type="string"),
     *             @OA\Property(property="website", type="string"),
     *             @OA\Property(property="payment_terms", type="string"),
     *         )
     *     ),
     *     @OA\Response(response="200", description="Supplier updated"),
     *     @OA\Response(response="404", description="Supplier not found"),
     *     tags={"Suppliers"}
     * )
     */
    public function update(Request $request, $id)
    {
        $supplier = Supplier::findOrFail($id);
        $supplier->update($request->all());
        return response()->json($supplier);
    }

    /**
     * @OA\Delete(
     *     path="/api/suppliers/{id}",
     *     summary="Delete a supplier",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of the supplier",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(response="204", description="Supplier deleted"),
     *     @OA\Response(response="404", description="Supplier not found"),
     *     tags={"Suppliers"}
     * )
     */
    public function destroy($id)
    {
        // $supplier = Supplier::findOrFail($id);
        // $supplier->products()->delete();
        // $supplier->delete();
        // return response()->json(null, 204);
    }
}
