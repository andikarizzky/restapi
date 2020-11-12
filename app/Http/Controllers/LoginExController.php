<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class LoginExController extends Controller
// {
//     //
// }

// class AuthController extends Controller
// {
//     /**
//      * Create user
//      *
//      * @param  [string] name
//      * @param  [string] email
//      * @param  [string] password
//      * @param  [string] password_confirmation
//      * @return [string] message
//      */
//     public function signup(Request $request)
//     {
//         $request->validate([
//             'name' => 'required|string',
//             'email' => 'required|string|email|unique:users',
//             'password' => 'required|string|confirmed'
//         ]);

//         $user = new User([
//             'name' => $request->name,
//             'email' => $request->email,
//             'password' => bcrypt($request->password)
//         ]);

//         $user->save();

//         return response()->json([
//             'message' => 'Successfully created user!'
//         ], 201);
//     }

//     /**
//      * Login user and create token
//      *
//      * @param  [string] email
//      * @param  [string] password
//      * @param  [boolean] remember_me
//      * @return [string] access_token
//      * @return [string] token_type
//      * @return [string] expires_at
//      */
//     public function login(Request $request)
//     {
//         $request->validate([
//             'email' => 'required|string|email',
//             'password' => 'required|string',
//             'remember_me' => 'boolean'
//         ]);

//         $credentials = request(['email', 'password']);
//         if(!Auth::attempt($credentials)){
//             return response()->json([
//                 'message' => 'Unauthorized'
//             ], 401);
//         }

//         $user = $request->user();
//         $tokenResult = $user->createToken('Personal Access Token');
//         $token = $tokenResult->token;

//         if ($request->remember_me){
//             $token->expires_at = Carbon::now()->addWeeks(1);
//         }

//         $token->save();

//         return response()->json([
//             'access_token' => $tokenResult->accessToken,
//             'token_type' => 'Bearer',
//             'expires_at' => Carbon::parse(
//                 $tokenResult->token->expires_at
//             )->toDateTimeString()
//         ]);
//     }

//     /**
//      * Logout user (Revoke the token)
//      *
//      * @return [string] message
//      */
//     public function logout(Request $request)
//     {
//         $request->user()->token()->revoke();

//         return response()->json([
//             'message' => 'Successfully logged out'
//         ]);
//     }

//     /**
//      * Get the authenticated User
//      *
//      * @return [json] user object
//      */
//     public function user(Request $request)
//     {
//         return response()->json($request->user());
//     }
// }
// Route::group([
//     'prefix' => 'auth'
// ], function () {
//     Route::post('login', 'AuthController@login');
//     Route::post('signup', 'AuthController@signup');

//     Route::group([
//       'middleware' => 'auth:api'
//     ], function() {
//         Route::get('logout', 'AuthController@logout');
//         Route::get('user', 'AuthController@user');
//     });
// });



























// class AuthController extends Controller
// {

//     public function login(Request $request){

//         $request->validate([
//             'email' => 'required|string',
//             'password' => 'required|string'
//         ]);

//         $credentials = request(['email', 'password']);

//         if(!Auth::attempt($credentials)){
//             return response()->json([
//                 'message'=> 'Invalid email or password'
//             ], 401);
//         }

//         $user = $request->user();

//         $token = $user->createToken('Access Token');

//         $user->access_token = $token->accessToken;

//         return response()->json([
//             "user"=>$user
//         ], 200);
//     }

//     public function signup(Request $request){

//         $request->validate([
//             'name' => 'required|string',
//             'email' => 'required|string|email|unique:users',
//             'password' => 'required|string|confirmed'
//         ]);

//         $user = new User([
//             'name'=>$request->name,
//             'email'=>$request->email,
//             'password'=>bcrypt($request->password)
//         ]);

//         $user->save();

//         return response()->json([
//             "message" => "User registered successfully"
//         ], 201);

//     }

//     public function logout(Request $request){
//         $request->user()->token()->revoke();
//         return response()->json([
//             "message"=>"User logged out successfully"
//         ], 200);
//     }

//     public function index(){
//         echo "Hello World";
//     }

// }
// Route::namespace('Api')->group(function(){

//     Route::prefix('auth')->group(function(){

//         Route::post('login', 'AuthController@login');
//         Route::post('signup', 'AuthController@signup');

//     });

//     Route::group([
//         'middleware'=>'auth:api'
//     ], function(){


//         Route::get('helloworld', 'AuthController@index');
//         Route::post('logout', 'AuthController@logout');

//     });

// });
































// class UserController extends Controller
// {

//     public $successStatus = 200;

//     public function login(){
//         if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
//             $user = Auth::user();
//             $success['token'] =  $user->createToken('nApp')->accessToken;
//             return response()->json(['success' => $success], $this->successStatus);
//         }
//         else{
//             return response()->json(['error'=>'Unauthorised'], 401);
//         }
//     }

//     public function register(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'name' => 'required',
//             'email' => 'required|email',
//             'password' => 'required',
//             'c_password' => 'required|same:password',
//         ]);

//         if ($validator->fails()) {
//             return response()->json(['error'=>$validator->errors()], 401);
//         }

//         $input = $request->all();
//         $input['password'] = bcrypt($input['password']);
//         $user = User::create($input);
//         $success['token'] =  $user->createToken('nApp')->accessToken;
//         $success['name'] =  $user->name;

//         return response()->json(['success'=>$success], $this->successStatus);
//     }

//     public function logout(Request $request)
//     {
//         $logout = $request->user()->token()->revoke();
//         if($logout){
//             return response()->json([
//                 'message' => 'Successfully logged out'
//             ]);
//         }
//     }

//     public function details()
//     {
//         $user = Auth::user();
//         return response()->json(['success' => $user], $this->successStatus);
//     }
// }




























// class PassportController extends Controller
// {
//     /**
//      * Handles Registration Request
//      *
//      * @param Request $request
//      * @return \Illuminate\Http\JsonResponse
//      */
//     public function register(Request $request)
//     {
//         $this->validate($request, [
//             'name' => 'required|min:3',
//             'email' => 'required|email|unique:users',
//             'password' => 'required|min:6',
//         ]);

//         $user = User::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'password' => bcrypt($request->password)
//         ]);

//         $token = $user->createToken('TutsForWeb')->accessToken;

//         return response()->json(['token' => $token], 200);
//     }

//     /**
//      * Handles Login Request
//      *
//      * @param Request $request
//      * @return \Illuminate\Http\JsonResponse
//      */
//     public function login(Request $request)
//     {
//         $credentials = [
//             'email' => $request->email,
//             'password' => $request->password
//         ];

//         if (auth()->attempt($credentials)) {
//             $token = auth()->user()->createToken('TutsForWeb')->accessToken;
//             return response()->json(['token' => $token], 200);
//         } else {
//             return response()->json(['error' => 'UnAuthorised'], 401);
//         }
//     }

//     /**
//      * Returns Authenticated User Details
//      *
//      * @return \Illuminate\Http\JsonResponse
//      */
//     public function details()
//     {
//         return response()->json(['user' => auth()->user()], 200);
//     }
// }






























// class UserController extends Controller
// {
//     private $successStatus  =   200;

//     //----------------- [ Register user ] -------------------
//     public function registerUser(Request $request) {

//         $validator  =   Validator::make($request->all(),
//             [
//                 'name'              =>      'required|min:3',
//                 'email'             =>      'required|email',
//                 'password'          =>      'required|alpha_num|min:5',
//                 'confirm_password'  =>      'required|same:password'
//             ]
//         );

//         if($validator->fails()) {
//             return response()->json(['Validation errors' => $validator->errors()]);
//         }

//         $input              =       array(
//             'name'          =>          $request->name,
//             'email'         =>          $request->email,
//             'password'      =>          bcrypt($request->password),
//             'address'       =>          $request->address,
//             'city'          =>          $request->city
//         );

//         // check if email already registered
//         $user                   =       User::where('email', $request->email)->first();
//         if(!is_null($user)) {
//             $data['message']     =      "Sorry! this email is already registered";
//             return response()->json(['success' => false, 'status' => 'failed', 'data' => $data]);
//         }

//         // create and return data
//         $user                   =       User::create($input);
//         $success['message']     =       "You have registered successfully";

//         return response()->json( [ 'success' => true, 'user' => $user ] );
//     }

//     // -------------- [ User Login ] ------------------

//     public function userLogin(Request $request) {
//         if(Auth::attempt(['email' => request('email'), 'password' => request('password')])) {

//             // getting auth user after auth login
//             $user = Auth::user();

//             $token                  =       $user->createToken('token')->accessToken;
//             $success['success']     =       true;
//             $success['message']     =       "Success! you are logged in successfully";
//             $success['token']       =       $token;

//             return response()->json(['success' => $success ], $this->successStatus);
//         }

//         else {
//             return response()->json(['error'=>'Unauthorised'], 401);
//         }
//     }
// }




























// public function register(Request $request)
// {
// 	$userDetails = $request->all();
// 	$userDetails->password = bcrypt($userDetails->password);
// 	$registerUser = User::create($userDetails);
// 	return response()->json([
// 		'successMsg' => 'New User Registered'
// 	], 200);

// }

// public function login(Request $request)
// {
// 	if (auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
// 		$user = auth()->user();
// 		$userToken = $user->createToken()->accessToken;
// 		return response()->json([
// 			'userDetails' => $user,
// 			'access_token' => $userToken
// 		], 200);
// 	}
// 	return response()->json([
// 		'errorMsg' => 'Invalid credentials'
// 	], 404);
// }




























// class PassportAuthController extends Controller
// {
//     /**
//      * Registration Req
//      */
//     public function register(Request $request)
//     {
//         $this->validate($request, [
//             'name' => 'required|min:4',
//             'email' => 'required|email',
//             'password' => 'required|min:8',
//         ]);

//         $user = User::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'password' => bcrypt($request->password)
//         ]);

//         $token = $user->createToken('LaravelAuthApp')->accessToken;

//         return response()->json(['token' => $token], 200);
//     }

//     /**
//      * Login Req
//      */
//     public function login(Request $request)
//     {
//         $data = [
//             'email' => $request->email,
//             'password' => $request->password
//         ];

//         if (auth()->attempt($data)) {
//             $token = auth()->user()->createToken('LaravelAuthApp')->accessToken;
//             return response()->json(['token' => $token], 200);
//         } else {
//             return response()->json(['error' => 'Unauthorised'], 401);
//         }
//     }
// }
