<?php

    // class ProductController extends Controller
    // {

    //     public function __construct()
    //     {
    //         $this->middleware('auth:api')->except('index','show');
    //     }


    //     public function index()
    //     {

    //         return ProductCollection::collection(Product::paginate(5));
    //     }

    //     public function store(ProductRequest $request)
    //     {
    //        $product = new Product;
    //        $product->name = $request->name;
    //        $product->detail = $request->description;
    //        $product->price = $request->price;
    //        $product->stock = $request->stock;
    //        $product->discount = $request->discount;

    //        $product->save();

    //        return response([

    //          'data' => new ProductResource($product)

    //        ],Response::HTTP_CREATED);

    //     }

    //     public function show(Product $product)
    //     {
    //         return new ProductResource($product);
    //     }

    //     public function update(Request $request, Product $product)
    //     {
    //         $this->userAuthorize($product);

    //         $request['detail'] = $request->description;

    //         unset($request['description']);

    //         $product->update($request->all());

    //        return response([

    //          'data' => new ProductResource($product)

    //        ],Response::HTTP_CREATED);

    //     }

    //     public function destroy(Product $product)
    //     {
    //         $product->delete();

    //         return response(null,Response::HTTP_NO_CONTENT);
    //     }

    //      public function userAuthorize($product)
    //     {
    //         if(Auth::user()->id != $product->user_id){
    //             //throw your exception text here;

    //         }
    //     }
    // }








    // public function list(){
    //     try{
    //         $products = Product::select('id','name','description','price')->get();

    //         return Response::json(['data' => $products],200);
    //     }catch(Exception $e){
    //         return Response::json(['errors' => 'Bad Request'], 400);
    //     }
    // }

    // public function create(Request $request){

    //     try{
    //         $validator = Validator::make($request->all(), [
    //             'name' => 'required|min:5',
    //             'description' => 'required',
    //             'price' => 'required'
    //         ]);

    //         if ($validator->fails()) {
    //             return Response::json(['errors' => $validator->errors()], 400);
    //         }

    //         $product = new Product;

    //         $product->name = $request->name;
    //         $product->description = $request->description;
    //         $product->price = $request->price;
    //         $product->save();

    //         return Response::json(['data' => 'added successfully'],200);

    //     }catch(Exception $e){
    //         return Response::json(['errors' => 'Bad Request'], 400);
    //     }

    // }

    // public function show($id){
    //     try{
    //         $product = Product::select('id','name','description','price')->where('id', $id)->first();

    //         return Response::json(['data' => $product],200);
    //     }catch(Exception $e){
    //         return Response::json(['errors' => 'Bad Request'], 400);
    //     }
    // }

    // public function update($id, Request $request){
    //     try{

    //         $validator = Validator::make($request->all(), [
    //             'name' => 'required|min:5',
    //             'description' => 'required',
    //             'price' => 'required'
    //         ]);

    //         if ($validator->fails()) {
    //             return Response::json(['errors' => $validator->errors()],400);
    //         }

    //         $product = Product::where('id', $id)->first();

    //         $product->name = $request->name;
    //         $product->description = $request->description;
    //         $product->price = $request->price;
    //         $product->update();

    //         return Response::json(['data' => 'updated successfully'],200);
    //     }catch(Exception $e){
    //         return Response::json(['errors' => 'Bad Request'], 400);
    //     }

    // }

    // public function delete($id){
    //     try{
    //         $product = Product::where('id', $id)->delete();

    //         return Response::json(['data' => 'deleted successfully'],200);
    //     }catch(Exception $e){
    //         return Response::json(['errors' => 'Bad Request'], 400);
    //     }
    // }


    // public function render($request, Exception $exception)
    // {
    //     // This will replace our 404 response with
    //     // a JSON response.
    //     if ($exception instanceof ModelNotFoundException) {
    //         return response()->json([
    //             'error' => 'Resource not found'
    //         ], 404);
    //     }

    //     return parent::render($request, $exception);
    // }


    // public function render($request, Exception $exception)
    // {
    //     // This will replace our 404 response with
    //     // a JSON response.
    //     if ($exception instanceof ModelNotFoundException &&
    //         $request->wantsJson())
    //     {
    //         return response()->json([
    //             'data' => 'Resource not found'
    //         ], 404);
    //     }

    //     return parent::render($request, $exception);
    // }






// class PostsController extends Controller
// {
// public function create(Request $request)
// {
// try {
// $post = new Posts();
// $post->setUUID(Uuid::uuid4());
// $post->title = $request->input('title');
// $post->content = $request->input('content’);
// $post->category = $request->input('category’);
// $contact->save();
// return response(new Post($contact), 201);
// } catch (\Exception $e) {
// Log::debug($e);
// throw new HttpResponseException(response()->error());
// }
// }
// }

// public function list(Request $request)
// {
// try {
// $creator = $request->get('userSession');
// $contacts = Posts::where('created_by', $request->input('id'))->get();
// return response(Post::collection($contacts), 200);
// } catch (\Exception $e) {
// Log::debug($e);
// throw new HttpResponseException(response()->error());
// }
// }

// public function toArray($request)
// {
// return [
// "id" => $this->getUUID($this->uuid),
// "title" => $this->title,
// "content" => $this->content,
// "category" => $this->category->only(['id', 'name']),
// ];
// }
// }





// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class ImageController extends Controller
// {
//     public function index()
// 	{
//         try{
//             $statusCode = 200;
//             $response = [
//               'photos'  => []
//             ];

//             $photos = Photo::all()->take(9);

//             foreach($photos as $photo){

//                 $response['photos'][] = [
//                     'id' => $photo->id,
//                     'user_id' => $photo->user_id,
//                     'url' => $photo->url,
//                     'title' => $photo->title,
//                     'description' => $photo->description,
//                     'category' => $photo->category,
//                 ];
//             }

//         }catch (Exception $e){
//             $statusCode = 400;
//         }finally{
//             return Response::json($response, $statusCode);
//         }

//     }

//     public function show($id)
// 	{
//         try{
//             $photo = Photo::find($id);
//             $statusCode = 200;
//             $response = [ "photo" => [
//                 'id' => (int) $id,
//                 'user_id' => (int) $photo->user_id,
//                 'title' => $photo->title,
//                 'url' => $photo->url,
//                 'category' => (int) $photo->category,
//                 'description' => $photo->description
//             ]];

//         }catch(Exception $e){
//             $response = [
//                 "error" => "File doesn`t exists"
//             ];
//             $statusCode = 404;
//         }finally{
//             return Response::json($response, $statusCode);
//         }

//     }

//     use Dropbox\Client;
//     use League\Flysystem\Filesystem;
//     use League\Flysystem\Adapter\Local as Adapter;
//     use League\Flysystem\Adapter\Dropbox;

//     private $filesystem;

//     public function __construct(){

//         if(App::environment() === "local"){

//             $this->filesystem = new Filesystem(new Adapter( public_path() . '/images/'));

//         }else{

//             $client = new Client(Config::get('dropbox.token'), Config::get('dropbox.appName'));
//             $this->filesystem = new Filesystem(new Dropbox($client, '/images/'));

//         }

//     }

//     public function show($name)
//     {
//         try{
//             $file = $this->filesystem->read($name);
//         }catch (Exception $e){
//             return Response::json("{}", 404);
//         }

//         $response = Response::make($file, 200);

//         return $response;

//     }


//     public function destroy($name)
//     {
//         try{
//             $this->filesystem->delete($name);
//             return Response::json("{}", 200);
//         }catch (\Dropbox\Exception $e){
//             return Response::json("{}", 404);
//         }
//     }

// }








































// class PostsController extends Controller
// {
//     public function index()
//     {
//         $posts = Post::latest()->get();
//         return response([
//             'success' => true,
//             'message' => 'List Semua Posts',
//             'data' => $posts
//         ], 200);
//     }

//     public function store(Request $request)
//     {
//         //validate data
//         $validator = Validator::make($request->all(), [
//             'title'     => 'required',
//             'content'   => 'required',
//         ],
//             [
//                 'title.required' => 'Masukkan Title Post !',
//                 'content.required' => 'Masukkan Content Post !',
//             ]
//         );

//         if($validator->fails()) {

//             return response()->json([
//                 'success' => false,
//                 'message' => 'Silahkan Isi Bidang Yang Kosong',
//                 'data'    => $validator->errors()
//             ],400);

//         } else {

//             $post = Post::create([
//                 'title'     => $request->input('title'),
//                 'content'   => $request->input('content')
//             ]);


//             if ($post) {
//                 return response()->json([
//                     'success' => true,
//                     'message' => 'Post Berhasil Disimpan!',
//                 ], 200);
//             } else {
//                 return response()->json([
//                     'success' => false,
//                     'message' => 'Post Gagal Disimpan!',
//                 ], 400);
//             }
//         }
//     }


//     public function show($id)
//     {
//         $post = Post::whereId($id)->first();

//         if ($post) {
//             return response()->json([
//                 'success' => true,
//                 'message' => 'Detail Post!',
//                 'data'    => $post
//             ], 200);
//         } else {
//             return response()->json([
//                 'success' => false,
//                 'message' => 'Post Tidak Ditemukan!',
//                 'data'    => ''
//             ], 404);
//         }
//     }

//     public function update(Request $request)
//     {
//         //validate data
//         $validator = Validator::make($request->all(), [
//             'title'     => 'required',
//             'content'   => 'required',
//         ],
//             [
//                 'title.required' => 'Masukkan Title Post !',
//                 'content.required' => 'Masukkan Content Post !',
//             ]
//         );

//         if($validator->fails()) {

//             return response()->json([
//                 'success' => false,
//                 'message' => 'Silahkan Isi Bidang Yang Kosong',
//                 'data'    => $validator->errors()
//             ],400);

//         } else {

//             $post = Post::whereId($request->input('id'))->update([
//                 'title'     => $request->input('title'),
//                 'content'   => $request->input('content'),
//             ]);


//             if ($post) {
//                 return response()->json([
//                     'success' => true,
//                     'message' => 'Post Berhasil Diupdate!',
//                 ], 200);
//             } else {
//                 return response()->json([
//                     'success' => false,
//                     'message' => 'Post Gagal Diupdate!',
//                 ], 500);
//             }

//         }

//     }



// }





// public function getUsersDetails()
//     	{
//         $userDetails = User::all();
//         if ($userDetails) {
//             return response()->json([
//                 'userDetails' => $userDetails
//             ], 200);
//         }
//         return response()->json([
//             'errorMsg' => 'No record found'
//         ], 404);
//         }

//         public function storeUserDetails(Request $request)
//     	{
//         $createUser = User::create($request->all());
//         return response()->json([
//             'successMsg' => 'New User Created'
//         ], 200);
//     	}

//         public function updateUserDetails(Request $request, $userId)
//     	{
//         $updateUser = find($userId);
//         if ($updateUser) {
//             $updateUser = $updateUser->update([$request->all()]);
//             return response()->json([
//                 'userDetails' => $updateUser
//             ], 200);
//         }
//         return response()->json([
//             'errorMsg' => 'No user found'
//         ], 404);
//     	}

//         public function deleteUserDetails($userId)
//     	{
//         $deleteUser = find($userId);
//         if ($deleteUser) {
//             $deleteUser->delete();
//             return response()->json([
//                 'successMsg' => 'User Record Deleted'
//             ], 200);
//         }
//         return response()->json([
//             'errorMsg' => 'No user found'
//         ], 404);
//     	}

//         public function show($id)
//     	{
//         $userDetails = find($id);
//         if ($userDetails) {
//             return response()->json([
//                 'userDetails' => $userDetails
//             ], 200);
//         }
//         return response()->json([
//             'errorMsg' => 'No user found'
//         ], 404);
//     	}




// class ProductController extends Controller
// {
//     public function index()
//     {
//         $products = auth()->user()->products;

//         return response()->json([
//             'success' => true,
//             'data' => $products
//         ]);
//     }

//     public function show($id)
//     {
//         $product = auth()->user()->products()->find($id);

//         if (!$product) {
//             return response()->json([
//                 'success' => false,
//                 'message' => 'Product with id ' . $id . ' not found'
//             ], 400);
//         }

//         return response()->json([
//             'success' => true,
//             'data' => $product->toArray()
//         ], 400);
//     }

//     public function store(Request $request)
//     {
//         $this->validate($request, [
//             'name' => 'required',
//             'price' => 'required|integer'
//         ]);

//         $product = new Product();
//         $product->name = $request->name;
//         $product->price = $request->price;

//         if (auth()->user()->products()->save($product))
//             return response()->json([
//                 'success' => true,
//                 'data' => $product->toArray()
//             ]);
//         else
//             return response()->json([
//                 'success' => false,
//                 'message' => 'Product could not be added'
//             ], 500);
//     }

//     public function update(Request $request, $id)
//     {
//         $product = auth()->user()->products()->find($id);

//         if (!$product) {
//             return response()->json([
//                 'success' => false,
//                 'message' => 'Product with id ' . $id . ' not found'
//             ], 400);
//         }

//         $updated = $product->fill($request->all())->save();

//         if ($updated)
//             return response()->json([
//                 'success' => true
//             ]);
//         else
//             return response()->json([
//                 'success' => false,
//                 'message' => 'Product could not be updated'
//             ], 500);
//     }

//     public function destroy($id)
//     {
//         $product = auth()->user()->products()->find($id);

//         if (!$product) {
//             return response()->json([
//                 'success' => false,
//                 'message' => 'Product with id ' . $id . ' not found'
//             ], 400);
//         }

//         if ($product->delete()) {
//             return response()->json([
//                 'success' => true
//             ]);
//         } else {
//             return response()->json([
//                 'success' => false,
//                 'message' => 'Product could not be deleted'
//             ], 500);
//         }
//     }















































































//     use Illuminate\Http\Request;
// use App\Http\Controllers\API\BaseController as BaseController;
// use App\Product;
// use Validator;
// use App\Http\Resources\Product as ProductResource;

// class ProductController extends BaseController
// {
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         $products = Product::all();

//         return $this->sendResponse(ProductResource::collection($products), 'Products retrieved successfully.');
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         $input = $request->all();


//         $validator = Validator::make($input, [
//             'name' => 'required',
//             'detail' => 'required'
//         ]);

//         if($validator->fails()){
//             return $this->sendError('Validation Error.', $validator->errors());
//         }

//         $product = Product::create($input);

//         return $this->sendResponse(new ProductResource($product), 'Product created successfully.');
//     }


//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         $product = Product::find($id);

//         if (is_null($product)) {
//             return $this->sendError('Product not found.');
//         }

//         return $this->sendResponse(new ProductResource($product), 'Product retrieved successfully.');
//     }


//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, Product $product)
//     {
//         $input = $request->all();

//         $validator = Validator::make($input, [
//             'name' => 'required',
//             'detail' => 'required'
//         ]);

//         if($validator->fails()){
//             return $this->sendError('Validation Error.', $validator->errors());
//         }

//         $product->name = $input['name'];
//         $product->detail = $input['detail'];
//         $product->save();

//         return $this->sendResponse(new ProductResource($product), 'Product updated successfully.');
//     }


//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(Product $product)
//     {
//         $product->delete();

//         return $this->sendResponse([], 'Product deleted successfully.');
//     }
// }




//         <?php

//         namespace App\Http\Controllers\API;

//         use Illuminate\Http\Request;
//         use App\Http\Controllers\API\BaseController as BaseController;
//         use App\Product;
//         use Validator;
//         use App\Http\Resources\Product as ProductResource;

//         class ProductController extends BaseController
//         {

//         public function index()
//         {
//         $products = Product::all();

//         return $this->sendResponse(ProductResource::collection($products), 'Products retrieved successfully.');
//         }

//         public function store(Request $request)
//         {
//         $input = $request->all();

//         $validator = Validator::make($input, [
//         'name' => 'required',
//         'detail' => 'required'
//         ]);

//         if($validator->fails()){
//         return $this->sendError('Validation Error.', $validator->errors());
//         }

//         $product = Product::create($input);

//         return $this->sendResponse(new ProductResource($product), 'Product created successfully.');
//         }

//         public function show($id)
//         {
//         $product = Product::find($id);

//         if (is_null($product)) {
//         return $this->sendError('Product not found.');
//         }

//         return $this->sendResponse(new ProductResource($product), 'Product retrieved successfully.');
//         }

//         public function update(Request $request, $id)
//         {
//         $product = Product::find($id);

//         if (!$product) {
//         return response()->json([
//         'success' => false,
//         'message' => 'Sorry, product with id ' . $id . ' cannot be found'
//         ], 400);
//         }
//         $updated = $product->fill($request->all())
//         ->save();

//         $product->name = $request->name;

//         $product->detail = $request->detail;
//         $product->save();

//         if ($updated) {
//         return response()->json([
//         'success' => true,
//         'message' => 'product with id ' . $id . ' succesfuly be updated'
//         ], 200);
//         } else {
//         return response()->json([
//         'success' => false,
//         'message' => 'Sorry, product could not be updated'
//         ], 500);
//         }
//         }

//         public function destroy($id)
//         {
//         $product = Product::find($id);

//         if (!$product) {
//         return response()->json([
//         'success' => false,
//         'message' => 'Sorry, product with id ' . $id . ' cannot be found'
//         ], 400);
//         }

//         if ($product->delete()) {
//         return response()->json([
//         'success' => true,
//         'message' => 'product with id ' . $id . ' succesfuly be deleted'
//         ], 200);
//         } else {
//         return response()->json([
//         'success' => false,
//         'message' => 'product could not be deleted'
//         ], 500);
//         }
//         }
//         }




//         class ProductController extends BaseController
//         {
//             /**
//              * Display a listing of the resource.
//              *
//              * @return \Illuminate\Http\Response
//              */
//             public function index()
//             {
//                 $products = Product::all();


//                 return $this->sendResponse($products->toArray(), 'Products retrieved successfully.');
//             }


//             /**
//              * Store a newly created resource in storage.
//              *
//              * @param  \Illuminate\Http\Request  $request
//              * @return \Illuminate\Http\Response
//              */
//             public function store(Request $request)
//             {
//                 $input = $request->all();


//                 $validator = Validator::make($input, [
//                     'name' => 'required',
//                     'detail' => 'required'
//                 ]);


//                 if($validator->fails()){
//                     return $this->sendError('Validation Error.', $validator->errors());
//                 }


//                 $product = Product::create($input);


//                 return $this->sendResponse($product->toArray(), 'Product created successfully.');
//             }


//             /**
//              * Display the specified resource.
//              *
//              * @param  int  $id
//              * @return \Illuminate\Http\Response
//              */
//             public function show($id)
//             {
//                 $product = Product::find($id);


//                 if (is_null($product)) {
//                     return $this->sendError('Product not found.');
//                 }


//                 return $this->sendResponse($product->toArray(), 'Product retrieved successfully.');
//             }


//             /**
//              * Update the specified resource in storage.
//              *
//              * @param  \Illuminate\Http\Request  $request
//              * @param  int  $id
//              * @return \Illuminate\Http\Response
//              */
//             public function update(Request $request, Product $product)
//             {
//                 $input = $request->all();


//                 $validator = Validator::make($input, [
//                     'name' => 'required',
//                     'detail' => 'required'
//                 ]);


//                 if($validator->fails()){
//                     return $this->sendError('Validation Error.', $validator->errors());
//                 }


//                 $product->name = $input['name'];
//                 $product->detail = $input['detail'];
//                 $product->save();


//                 return $this->sendResponse($product->toArray(), 'Product updated successfully.');
//             }


//             /**
//              * Remove the specified resource from storage.
//              *
//              * @param  int  $id
//              * @return \Illuminate\Http\Response
//              */
//             public function destroy(Product $product)
//             {
//                 $product->delete();


//                 return $this->sendResponse($product->toArray(), 'Product deleted successfully.');
//             }
//         }






































//         class BlogController extends Controller
//         {
//          /**
//           * Display a listing of the resource.
//           *
//           * @return \Illuminate\Http\Response
//           */
//            public function index()
//             {
//               //Get list of blogs
//               $blogs = Blog::all();
//               $message = 'Blogs retrieved successfully.';
//               $status = true;
//               //Call function for response data
//               $response = $this->response($status, $blogs, $message);
//               return $response;
//             }
//             /**
//              * Store a newly created blog in the database.
//              *
//              * @param \Illuminate\Http\Request $request
//              * @return \Illuminate\Http\Response
//              */
//             public function store(Request $request)
//             {
//              //Get request data
//              $input = $request->all();

//              //Validate requested data
//              $validator = Validator::make($input, [
//                     'name' => 'required',
//                     'description' => 'required'
//                 ]);
//                 if ($validator->fails()) {
//                     return $this->sendError('Validation Error.', $validator->errors());
//                 }
//                 $blog = Blog::create($input);
//                 $message = 'Blog created successfully.';
//                 $status = true;

//                 //Call function for response data
//                 $response = $this->response($status, $blog, $message);
//                 return $response;
//             }
//             /**
//              * Update the specified blog in storage.
//              *
//              * @param \Illuminate\Http\Request $request
//              * @param int $id
//              * @return \Illuminate\Http\Response
//              */
//             public function update(Request $request, $id)
//             {
//                 //Get request data
//                 $input = $request->all();

//                 //Validate requested data
//                 $validator = Validator::make($input, [
//                     'name' => 'required',
//                     'description' => 'required'
//                 ]);
//                 if ($validator->fails()) {
//                     $message = $validator->errors();
//                     $blog = [];
//                     $status = 'fail';
//                     $response = $this->response($status, $blog, $message);
//                     return $response;
//                 }

//                 //Update blog
//                 $blog = Blog::find($id)->update(['name' => $input['name'], 'description' => $input['description']]);
//                 $message = 'Blog updated successfully.';
//                 $status = true;

//                 //Call function for response data
//                 $response = $this->response($status, $blog, $message);
//                 return $response;
//             }
//             /**
//              * Display the specified blog.
//              *
//              * @param int $id
//              * @return \Illuminate\Http\Response
//              */
//             public function show($id)
//             {
//                 $blog = Blog::find($id);
//                 //Check if the blog found or not.
//                 if (is_null($blog)) {
//                     $message = 'Blog not found.';
//                     $status = false;
//                     $response = $this->response($status, $blog, $message);
//                     return $response;
//                 }
//                 $message = 'Blog retrieved successfully.';
//                 $status = true;

//                 //Call function for response data
//                 $response = $this->response($status, $blog, $message);
//                 return $response;
//             }
//             /**
//              * Remove the specified blog from storage.
//              *
//              * @param int $id
//              * @return \Illuminate\Http\Response
//              */
//             public function destroy($id)
//             {
//                 //Delete blog
//                 $blog = Blog::findOrFail($id);
//                 $blog->delete();
//                 $message = 'Blog deleted successfully.';
//                 $status = true;

//                 //Call function for response data
//                 $response = $this->response($status, $blog, $message);
//                 return $response;
//             }
//             /**
//              * Response data
//              *
//              * @param $status
//              * @param $blog
//              * @param $message
//              * @return \Illuminate\Http\Response
//              */
//             public function response($status, $blog, $message)
//             {
//                 //Response data structure
//                 $return['success'] = $status;
//                 $return['data'] = $blog;
//                 $return['message'] = $message;
//                 return $return;
//             }
//         }
