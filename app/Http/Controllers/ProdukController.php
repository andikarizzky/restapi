<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Product;
use Validator;

class ProdukController extends Controller
{
    public function index()
    {

        $productDetails = Product::with('reviews')->orderBy('id', 'DESC')->get();
        if ($productDetails) {

            foreach($productDetails as $productDetail){
                $response[] = array(
                    "product"=>$productDetail,
                    "view_product" => [
                        'href' => 'api/v1/product/' . $productDetail->id,
                        'method' => 'GET',
                    ]
                );
            }
            return response()->json([
                'success' => true,
                'message' => 'Semua Data Produk',
                'response' => $response
            ], 200);

        } else {
            return response()->json([
                'success' => false,
                'message' => 'Tidak Ada Data Produk'
            ], 404);
        }

    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'name' => 'required|max:255|unique:products',
                'detail' => 'required',
                'price' => 'required|max:10',
                'stock' => 'required|max:6',
                'discount' => 'required|max:2',
        ],
            [
                'name.required' => 'Masukkan Nama Produk !',
                'discount.max' => 'Maksimal 2 angka !',
            ]
        );

        if($validator->fails()) {

            return response()->json([
                'success' => false,
                'message' => 'Silahkan Periksa Kembali Data Anda',
                'data'    => $validator->errors()
            ], 400);

        } else {

            $post = new Product([
                'name'          => $request->input('name'),
                'detail'        => $request->input('detail'),
                'price'         => $request->input('price'),
                'stock'         => $request->input('stock'),
                'discount'      => $request->input('discount'),
                'user_id'       => 7,
                ]);


            if ($post->save()) {

                $post->view_product = [
                    'href' => 'api/v1/product/' . $post->id,
                    'method' => 'GET',
                ];

                return response()->json([
                    'success' => true,
                    'message' => 'Post Berhasil Disimpan!',
                    'data' => $post,
                ], 200);

            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Post Gagal Disimpan!',
                ], 400);
            }

        }

    }

    public function show($id)
    {
        $product = Product::with('reviews')->whereId($id)->first();

        if (is_null($product)) {
            return response()->json([
                'success' => false,
                'message' => 'Product Tidak Ditemukan!',
                'data'    => ' '
            ], 404);
        } else {
            return response()->json([
                'success' => true,
                'message' => 'Detail Product' . ' ' . $product->name,
                'data'    => $product
            ], 200);
        }
    }

    public function update(Request $request, $id)
    {
        $product = Product::whereId($id)->first();

        if (is_null($product)) {
            return response()->json([
                'success' => false,
                'message' => 'Product dengan id' . $id . 'Tidak Ditemukan!',
                'data'    => ' '
            ], 404);

        } else {

            $validator = Validator::make($request->all(), [
                'name' => 'required|max:255|unique:products',
                'detail' => 'required',
                'price' => 'required|max:10',
                'stock' => 'required|max:6',
                'discount' => 'required|max:2',
            ],
                [
                    'name.required' => 'Masukkan Nama Produk !',
                    'discount.max' => 'Maksimal 2 angka !',
                ]
            );

            if($validator->fails()) {

                return response()->json([
                    'success' => false,
                    'message' => 'Silahkan periksa kembali data anda',
                    'data'    => $validator->errors()
                ], 400);

            } else {

                $productUpdate = Product::findOrFail($id);

                $productUpdate->name          = $request->input('name');
                $productUpdate->detail        = $request->input('detail');
                $productUpdate->price         = $request->input('price');
                $productUpdate->stock         = $request->input('stock');
                $productUpdate->discount      = $request->input('discount');
                $productUpdate->user_id       = 7;

                if ($productUpdate->update()) {

                    $productUpdate->view_product = [
                        'href' => 'api/v1/product/' . $productUpdate->id,
                        'method' => 'GET',
                    ];

                    return response()->json([
                        'success' => true,
                        'message' => 'Produk'. ' ' . $productUpdate->name . ' ' . 'Berhasil Disimpan!',
                        'data' => $productUpdate,
                    ], 200);

                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Produk Gagal Disimpan!',
                    ], 400);
                }

                }

        }

    }

    public function delete($id)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return response()->json([
                'success' => false,
                'message' => 'Produk' . ' ' . $id . ' ' . 'Tidak Ditemukan!',
            ], 404);
        } else {
            if ($product->delete()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Produk' . ' ' . $product->name . ' ' . 'Berhasil Dihapus!',
                ], 200);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Produk' . ' ' . $product->name . ' ' . 'Gagal Dihapus!',
                ], 500);
            }
        }

    }

}
