<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AmbulanceService;
use App\Models\BookAppointment;
use App\Models\Cart;
use App\Models\DeliveryLocation;
use App\Models\Gallery;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Page;
use App\Models\Product;
use App\Models\District;
use App\Models\ProductCategory;
use App\Models\ProductReview;
use App\Models\shippingMethod;
use App\Models\WebsiteParameter;
use Illuminate\Http\Request;
use Alert;
use App\Models\BisesoggoCategory;
use App\Models\Publisher;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Doctor;
use App\Models\FrontSlider;
use App\Models\Hospital;
use App\Models\User;
use App\Models\BlogComment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderConfirmationEmail;

class FrontendController extends Controller
{

    public function __construct()
    {
        $this->middleware('locale');
    }

    // ebook website  
    public function index()
    {
        // $data['doctors'] = Doctor::whereActive(true)->paginate(12);
        $data['trendings'] = Product::with('categories')->latest()->whereActive(true)->limit(4)->get();
        // $data['sliders'] = FrontSlider::whereActive(true)->get();
        // $data['departments'] = BisesoggoCategory::whereActive(true)->limit(6)->get();
        // $data['newses'] = BlogPost::whereActive(true)->limit(3)->get();
        // $data['ambulances'] = AmbulanceService::whereActive(true)->get();
        return view('frontend.home.index', $data);  

        // return view('frontend.home.index');  

    }

    public function books()
    {
        return view('website.books');
    }

    public function allGeneres()
    {
        $categories = ProductCategory::whereActive(true)->latest()->get();
        return view('website.generes', compact('categories'));
    }

public function generes(Request $request, $slug)
{
    $category = ProductCategory::where('slug', $slug)
        ->where('active', 1)
        ->firstOrFail();

    $query = Product::whereHas('categories', function ($q) use ($slug) {
        $q->where('slug', $slug);
    })->where('active', 1);

    // Sorting
    switch ($request->get('sort')) {
        case 1:
            $query->latest();
            break;
        case 2:
            $query->oldest();
            break;
        case 3:
            $query->orderBy('final_price', 'desc');
            break;
        case 4:
            $query->orderBy('final_price', 'asc');
            break;
        default:
            $query->latest();
    }

    $products = $query->paginate(12)->appends($request->all());
    $categories = ProductCategory::where('active', 1)->latest()->get();

    return view('website.product_category', compact('categories', 'slug', 'products'));
}



    public function authors()
    {
        return view('website.authors');
    }

    public function publisher()
    {
        $publishers = Publisher::whereActive(true)->latest()->get();
        return view('website.publisher', compact('publishers'));
    }

    public function pricing()
    {
        return view('website.pricing');
    }

    public function blog()
    {
        $data['blogs'] = BlogPost::whereActive(true)->whereStatus('published')->latest()->paginate(12);
        return view('website.blog', $data);
    }

    public function blogDetails()
    {
        return view('website.blog-details');
    }

    public function cart()
    {
        return view('website.cart');
    }

    public function login()
    {
        return view('frontend.login');
    }

    public function page($slug)
    {
        $data['page'] = Page::with('pageItems')->where('active', 1)
                        ->where('slug', $slug)
                        ->first();
        $data['contactUsPage'] = Page::where('type', 'contact_us')->first();
        $data['websiteParameter'] = WebsiteParameter::first();

        if(!$data['page']){
            abort(404);
        }
        return view('frontend.home.page_content', $data);
    }

    // public function page($slug)
    // {
    //     $data['page'] = Page::whereActive('slug', $slug)->first();
    //     return view('frontend.home.page_content', $data);
    // }

    public function websiteCompliance()
    {
      
        return view("frontend.home.websiteCompliance");
    }



    public function doctorDashboard(){
        $data['doctor'] = auth()->user()->doctor;
        return view('frontend.home.doctor-dashbord',$data);
    }





    public function profile(){
        return view('frontend.home.profile');
    }

    public function oldPassword(Request $request){
        $password = auth()->user()->password;
        if(Hash::check($request->old_pwd,$password)){
           return response()->json([
                'success' => true,
           ]);
        }else{
          return response()->json([
             'success' => false,
          ]);
        }
    }



    public function updatePassword(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
        ]);
         $old_password = auth()->user()->password;
         if(Hash::check($request->old_password, $old_password)){
            if(!Hash::check($request->new_password, $old_password)){
              if($request->new_password == $request->confirm_password){
                 $user = User::find(Auth::id());
                 $user->password = Hash::make($request->new_password);
                 $user->password_temp = null;
                 $user->save();
                 return redirect()->back();
                 Alert::error('success', 'Password Change Successfully!');
                 return redirect()->back();
              }else{
                Alert::error('Error', 'New password and Confirm doed not match!');
                return redirect()->back();
              }

            }else{
                Alert::error('Error', 'New password and Current password are same');
                return redirect()->back();
            }

         }else{
            Alert::error('Error','Current password is not match');
            return redirect()->back();
         }
    }


    public function updateProfile(Request $request){
        $user = User::find(Auth::id());
        if($request->hasFile('image')){
            if ($user->image) {
                Storage::delete('public/user_images/'.$user->image);
            }
            $image = $request->file('image');
            $image_ex =  $image->getClientOriginalExtension();
            $file_path = date('ymdhis').'.'.$image_ex;
            $image->storeAs('user_images', $file_path,'public');
        }else{
            $file_path =  $user->image;
        }

        $user->image  =  $file_path;
        $user->save();
        Alert::Success('Success','Profile Update successfuly');
        return redirect()->back();
    }




   public function selectGetDoctor(Request $request){

      $hospital = Hospital::find($request->hospital_id);
      $doctors = $hospital->doctors()->get();
      return response()->json($doctors);
   }



    public function ambulanceProviderList(){
        $data['ambulances'] = AmbulanceService::whereActive(true)->get();
        return view('frontend.home.ambulanceProviderList',$data);
    }

    public function charity()
    {
        return view('frontend.home.charity');
    }
   

    public function doctorList(){
        $data['doctors'] =  Doctor::whereActive(true)->get();
        $data['departments'] =  BisesoggoCategory::whereActive(true)->get();
        return view('frontend.home.doctorList',$data);
    }

    public function doctorDetails($id){
        $data['doctor'] = $doctor =  Doctor::whereActive(true)->find($id);
        $data['department'] = $department = $doctor->department;
        $data['doctors'] =  Doctor::whereActive(true)->where('department_id',$department->id)->take(10)->get();
        return view('frontend.home.doctorDetails',$data);
    }


    public function doctorAppointment(){
        $data['doctors'] = Doctor::whereActive(true)->paginate(12);
        $data['departments'] = BisesoggoCategory::whereActive(true)->get();
        return view('frontend.home.doctorAppointment',$data);
    }



    public function hospitalList()
    {
        $data['hospitals'] = Hospital::whereActive(true)->paginate(12); 
        return view('frontend.home.hospitalList', $data);
    }

    public function diagnostic()
    {
        return view('frontend.home.diagnostic');
    }

    public function hospitalDetails($id)
    {
        $data['hospital'] = $hospital = Hospital::whereActive(true)->findOrFail($id);
        $data['doctors'] = $hospital->doctors()->whereActive(true)->paginate(12);

        return view('frontend.home.hospitalDetails', $data);
    }


    public function departmentList()
    {
        $data['departments'] = BisesoggoCategory::whereActive(true)->paginate(12); 
        return view('frontend.home.departmentList', $data);
    }


    public function gallery()
    {
        $data['galleries'] = Gallery::whereActive(true)->paginate(20); 
        return view('frontend.home.gallery', $data);
    }



    public function languageChange(Request $request)
    {
        $locale = $request->locale;
        if (in_array($locale, config('app.locales')))
        {
            // $cookie = cookie('locale', $locale, 43200);
            $request->session()->forget(['locale']);
            $request->session()->put(['locale'=>$locale]);
            // return redirect()->back()->withCookie($cookie);
        }

        return back();

    }



    public function news()
    {
        $data['news'] = BlogPost::whereActive(true)->whereStatus('published')->latest()->paginate(12);
        $data['cats'] = BlogCategory::whereActive(true)->orderBy('name')->get();
        return view('frontend.home.news', $data);
    }


    public function singleblog($id)
    {

        $news = BlogPost::with(['comments.replies'])->where('id', $id)->firstOrFail();
        if (!$news) {
            abort(404);
        }
        $news->increment('view_count');
        $data['relatedPosts'] = BlogPost::where('category_id', $news->category_id)->get();
        $data['news'] = $news;

        $data['popular_posts'] = BlogPost::orderBy('view_count', 'DESC')->whereActive(true)->whereStatus('published')->take(6)->get();
        
        return view('website.blog-details', $data);
    }

    public function storeComment(Request $request, $postId)
    {
        $request->validate([
            'comment' => 'required|string|max:5000',
            'email'   => 'nullable|email|max:255',
            'parent_id' => 'nullable|integer',
            'name'    => $request->parent_id ? 'nullable|string|max:255' : 'required|string|max:255',
        ]);

        BlogComment::create([
            'post_id' => $postId,
            'parent_id' => $request->parent_id,
            'name' => $request->name,
            'email' => $request->email,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Comment added successfully.');
    }

    public function likePost($id)
    {
        $post = BlogPost::findOrFail($id);
        $post->increment('likes_count');
        return response()->json(['likes' => $post->likes_count]);
    }



    // public function singleNews($id)
    // {

    //     $news = BlogPost::where('id', $id)->firstOrFail();
    //     if (!$news) {
    //         abort(404);
    //     }
    //     $news->increment('view_count');

    //     $data['relatedPosts'] = BlogPost::where('category_id', $news->category_id)->get();
    //     $data['news'] = $news;

    //     $data['popular_posts'] = BlogPost::orderBy('view_count', 'DESC')->whereActive(true)->whereStatus('published')->take(6)->get();

    //     return view('frontend.home.singleNews', $data);
    // }



    public function supportpolicy()
    {
        $page =  Page::where('type', 'support_policy')->first();
        return view("frontend.home.policies.supportpolicy", compact('page'));
    }

    public function terms()
    {
        $page =  Page::where('type', 'terms_conditions')->first();
        return view("frontend.home.policies.terms", compact('page'));
    }

    public function privacypolicy()
    {
        $page =  Page::where('type', 'privacy_policy')->first();
        return view("frontend.home.privacypolicy", compact('page'));
    }

    public function helpcenter()
    {
        $page =  Page::where('type', 'help_center')->first();
        return view("frontend.home.helpcenter", compact('page'));
    }

    public function contactus()
    {
        $page =  Page::where('type', 'contact_us')->first();
        return view("frontend.home.policies.contactus", compact('page'));
    }

    public function aboutus()
    {
        $page =  Page::where('type', 'about_us')->first();
        return view("frontend.home.aboutus", compact('page'));
    }



    public function storeAppointment(Request $request)
    {
        // ✅ Validation
        $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'mobile'           => 'required|string|max:20',
            'department_id'    => 'required|integer',
            'doctor_id'        => 'required|integer',
            'appointment_date' => 'required|date',
        ]);

        try {
            // ✅ Create new appointment
            $appointment = new BookAppointment();
            $appointment->name             = $request->name;
            $appointment->email            = $request->email;
            $appointment->mobile           = $request->mobile;
            $appointment->department_id    = $request->department_id;
            $appointment->doctor_id        = $request->doctor_id;
            $appointment->appointment_date = $request->appointment_date;
            $appointment->message          = $request->message ?? null;
            $appointment->addedby_id       = Auth::id();
            $appointment->save();

            // ✅ Success message
            // toast('Appointment Confirmed, Your appointment has been successfully booked.','success');
            Alert::success('Appointment Confirmed', 'Your appointment has been successfully booked.');
            return redirect()->back();

        } catch (\Exception $e) {
            // ✅ Error message
            Alert::error('Something went wrong', 'We could not process your request. Please try again later.');
            return redirect()->back()->withInput();
        }
    }


    public function shasthoseba(Request $request)
    {
        $query = Product::whereActive(true);

        // Sorting
        if ($request->get('sort') == 1) {
            $query->latest();
        } elseif ($request->get('sort') == 2) {
            $query->oldest();
        } elseif ($request->get('sort') == 3) {
            $query->orderBy('final_price', 'desc');
        } elseif ($request->get('sort') == 4) {
            $query->orderBy('final_price', 'asc');
        } else {
            $query->latest();
        }

        $products = $query->paginate(12)->appends($request->all());

        $categories = ProductCategory::whereActive(true)->latest()->get();
        $total_products = Product::whereActive(true)->count();

        return view("frontend.home.shasthoseba", compact('products', 'categories', 'total_products'));
    }

    public function productCategory(Request $request, $slug)
    {
        $category = ProductCategory::where('slug', $slug)
            ->whereActive(true)
            ->firstOrFail();

        $query = Product::whereHas('categories', function ($q) use ($slug) {
            $q->where('slug', $slug);
        })->whereActive(true);

        // Sorting
        if ($request->get('sort') == 1) {
            $query->latest();
        } elseif ($request->get('sort') == 2) {
            $query->oldest();
        } elseif ($request->get('sort') == 3) {
            $query->orderBy('final_price', 'desc');
        } elseif ($request->get('sort') == 4) {
            $query->orderBy('final_price', 'asc');
        } else {
            $query->latest();
        }

        $products = $query->paginate(12)->appends($request->all());

        $categories = ProductCategory::whereActive(true)->latest()->get();
        $total_products = Product::whereActive(true)->count();

        return view("frontend.home.shasthoseba", compact('products', 'categories', 'category', 'total_products'));
    }

    public function allProductCategories(Request $request)
    {
        $categories = ProductCategory::whereActive(true)->latest()->get();
        return view("frontend.home.all-categories", compact('categories'));
    }




    public function productDetails(Request $request, $slug)
    {
        $product = Product::where('slug', $slug)->with('categories', 'reviews')->first();

        if(!$product){
            abort(404);
        }

        $relatedProducts = Product::whereHas('categories', function($q) use ($product) {
                                $q->whereIn('product_categories.id', $product->categories->pluck('id'));
                            })
                            ->where('id', '!=', $product->id)
                            ->take(12)
                            ->get();

        return view('frontend.home.productDetails', compact('product','relatedProducts'));
    }


 


    /**
     * Add product to cart (session/user-wise)
     */
    public function addToCart(Request $request)
    {
        if (!Session::has('session_id')) {
            Session::put('session_id', session()->getId());
        }
        $session_id = Session::get('session_id');

        $user_id   = Auth::id() ?? 0;
        $productId = $request->product;

        $product = Cache::remember("product_{$productId}", now()->addMinutes(10), function () use ($productId) {
            return Product::find($productId);
        });

        if (!$product) {
            abort(404, 'Product not found');
        }

        $cart = Cart::firstOrNew([
            'product_id' => $product->id,
            'session_id' => $session_id,
            'user_id'    => $user_id,
        ]);

        $cart->quantity   = $cart->exists ? $cart->quantity + $request->qty : $request->qty;
        $cart->addedby_id = $user_id;
        $cart->save();

        if ($request->ajax()) {
            return response()->json([
                'status'          => true,
                'message'         => 'Item added to cart!',
                'productCartItem' => view('frontend.home.includes.productCartItem', compact('cart', 'product'))->render(),
                'cartCount'       => Cart::cartCount(),
                'cartItemsCount'  => Cart::CartItemsCount(),
                'cartTotal'       => Cart::totalCartPrice(),
            ]);
        }

        return response()->noContent();
    }



    public function addToCart2(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'qty'        => 'required|integer|min:1'
        ]);

        if (!Session::has('session_id')) {
            Session::put('session_id', session()->getId());
        }
        $session_id = Session::get('session_id');

        $user_id   = Auth::id() ?? 0;
        $productId = $request->product_id;

        // Cache product for 10 minutes
        $product = Cache::remember("product_{$productId}", now()->addMinutes(10), function () use ($productId) {
            return Product::find($productId);
        });

        if (!$product) {
            abort(404, 'Product not found');
        }

        // Find or create cart item
        $cart = Cart::firstOrNew([
            'product_id' => $product->id,
            'session_id' => $session_id,
            'user_id'    => $user_id,
        ]);

        // Update quantity
        $cart->quantity   = $cart->exists ? $cart->quantity + $request->qty : $request->qty;
        $cart->addedby_id = $user_id;
        $cart->save();


        return redirect()->back()->with([
            'success' => '(' . $product->name_en . ') added to cart successfully!',
        ]);
    }




    /**
     * Update cart item quantity
     */
    public function cartUpdateQty(Request $request)
    {
        
        $request->validate([
            'cart'    => 'required|integer|exists:carts,id',
            'new_qty' => 'required|integer|min:0'
        ]);

        $cart = Cart::findOrFail($request->cart);

        if ($request->new_qty == 0) {
            $cart->delete();
        } else {
            $cart->update(['quantity' => $request->new_qty]);
        }

        if ($request->ajax()) {
            return response()->json([
                'status'        => true,
                'message'       => 'Cart updated successfully!',
                'product_id'    => $cart->product_id ?? null,
                'add_to_cart_url' => route('addToCart'),
                'cartCount'       => Cart::cartCount(),
                'cartItemsCount'  => Cart::CartItemsCount(),
                'cartTotal'       => Cart::totalCartPrice(),
                'discount'        => Cart::totalDiscountAmount(),
                'payable'         => Cart::totalCartPrice() - Cart::totalDiscountAmount(),
            ]);
        }

        return response()->noContent();
    }

    /**
     * Remove a cart item
     */
    public function cartRemoveItem(Cart $cart)
    {
        // Security check
        if (Auth::check() && $cart->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        } elseif (!Auth::check() && $cart->session_id !== Session::get('session_id')) {
            abort(403, 'Unauthorized action.');
        }

        $cartId    = $cart->id;
        $productId = $cart->product_id;

        $cart->delete();

        return response()->json([
            'status'         => true,
            'message'        => 'Item removed from cart!',
            'cart_id'        => $cartId,
            'product_id'     => $productId,
            'add_to_cart_url'=> route('addToCart'),
            'cartCount'      => Cart::cartCount(),
            'cartTotal'      => Cart::totalCartPrice(),
            'discount'       => Cart::totalDiscountAmount(),
            'payable'        => Cart::totalCartPrice() - Cart::totalDiscountAmount(),
        ]);
    }


    public function checkout(Request $request)
    {

        $sessionId = Session::get('session_id');
        $cartItems = Cart::with('product')
            ->when(auth()->check(), fn($q) => $q->where('user_id', auth()->id()))
            ->when(!auth()->check(), fn($q) => $q->where('session_id', $sessionId))
            ->get();

        $shippingMethods = shippingMethod::get();

        return view('frontend.home.checkout', compact( 'cartItems', 'shippingMethods'));
    }

    public function new_checkout(Request $request)
    {

        $sessionId = Session::get('session_id'); 
        $cartItems = Cart::with('product')
            ->when(auth()->check(), fn($q) => $q->where('user_id', auth()->id()))
            ->when(!auth()->check(), fn($q) => $q->where('session_id', $sessionId))
            ->get();

        $shippingMethods = shippingMethod::get();
        $districts = District::all();
        return view('frontend.home.new_checkout', compact( 'cartItems', 'shippingMethods','districts'));
    }


    
    public function storeDeliveryLocation(Request $request)
    {
       
        //  Validation
        $request->validate([
            'name'          => 'required',
            'mobile'        => 'required',
            'email'         => 'nullable|email',
            'address_title' => 'required',
        
        ]);

        // Check if delivery location exists for the user
        $location = DeliveryLocation::where('user_id', Auth::id())->first();

        // If exists, update; otherwise create new
        if (!$location) {
            $location = new DeliveryLocation();
            $location->user_id = Auth::id();
        }

        // Set common fields
        $location->name = $request->name;
        $location->email = $request->email;
        $location->mobile = $request->mobile;
        $location->address_title = $request->address_title;
        $location->save();

        return redirect()->back()->with([
            'success' => 'Delivery location saved successfully!',
        ]);
    }


    public function codOrderStore(Request $request)
    {
        $ws = WebsiteParameter::first();
        $cartItems = Cart::getCartItems();

        if ($cartItems->isEmpty()) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        $subtotal = $this->calculateSubtotal($cartItems);
        $deliveryCost = $ws->shipping_cahrge ?? $request->shipping_price;
        $grandTotal = $subtotal + $deliveryCost;
        $paymentMethod = $request->input('payment_method');

        if (Auth::check()) {
            $user = auth()->user();
            if ($request->has('billing_address')) {
                DeliveryLocation::updateOrCreate(
                    ['user_id' => $user->id],
                    [
                        'address_title' => $request->input('billing_address'),
                        'name' => $request->input('name'),
                        'email' => $request->input('email'),
                        'mobile' => $request->input('mobile'),
                    ]
                );
            }

            $location = $this->getUserLocation($user);

            if (!$location) {
                return redirect()->back()->with('error', 'No delivery location found.');
            }

            $order = $this->createOrder($user, $location, $deliveryCost, $paymentMethod, $subtotal, $deliveryCost, $grandTotal);

            $this->storeOrderItems($order, $cartItems, $user->id);
            Cart::where('user_id', $user->id)->delete();

            // Mail::to('admin@93shasthoseba.com')->send(new OrderConfirmationEmail($order));

            return redirect()->route('user.dashboard')->with('success', 'Order placed successfully!');
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'mobile' => 'required|string|max:20',
                'billing_address' => 'required|string|max:1000',
            ]);

            $location = new \stdClass();
            $location->name = $request->input('name');
            $location->email = $request->input('email');
            $location->mobile = $request->input('mobile');
            $location->address_title = $request->input('billing_address');

            $order = $this->createOrder(null, $location, $deliveryCost, $paymentMethod, $subtotal, $deliveryCost, $grandTotal);

            $this->storeOrderItems($order, $cartItems, null);
            Cart::where('session_id', Session::get('session_id'))->delete();

            // Mail::to($location->email)->send(new OrderConfirmationEmail($order));

            return redirect()->route('shop.shasthoseba')->with('success', 'Order placed successfully!');
        }
    }



    private function getUserLocation($user)
    {
        if ($user) {
            return $user->locations()->first();
        }
        return null;
    }


    private function calculateSubtotal($cartItems)
    {
        return $cartItems->sum(function ($cart) {
            return $cart->product->final_price * $cart->quantity;
        });
    }

    private function createOrder($user, $location, $area, $paymentMethod, $subtotal, $deliveryCost, $grandTotal)
    {
        return Order::create([
            'user_id'        => $user ? $user->id : null,
            'name'           => $location->name,
            'mobile'         => $location->mobile,
            'email'          => $location->email,
            'address_title'  => $location->address_title,
            'subtotal'       => $subtotal,
            'grand_total'    => $grandTotal,
            'payment_method' => $paymentMethod,
            'payment_status' => 'unpaid',
            'payment_gateway'=> $paymentMethod,
            'delivery_cost'  => $deliveryCost,
            'pending_at'     => now(),
            'addedby_id'     => $user ? $user->id : null,
        ]);
    }

    private function storeOrderItems($order, $cartItems, $userId)
    {
        foreach ($cartItems as $cart) {
            OrderItem::create([
                'order_id'      => $order->id,
                'user_id'       => $userId,
                'product_id'    => $cart->product_id,
                'product_name'  => $cart->product->name_en,
                'product_price' => $cart->product->final_price,
                'quantity'      => $cart->quantity,
                'total_cost'    => $cart->product->final_price * $cart->quantity,
                'addedby_id'    => $userId,
            ]);
        }
    }


    public function reviewsStore(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating'     => 'required|integer|min:1|max:5',
            'comment'    => 'required|string|max:1000',
        ]);

        ProductReview::create([
            'user_id'    => Auth::id(),
            'product_id' => $request->product_id,
            'rating'     => $request->rating,
            'comment'    => $request->comment,
        ]);

        return back()->with('success', 'Review submitted successfully!');
    }


    public function orderPrint(Order $order)
    {
        $items = $order->orderItems()->get();

        return view('user.order.orderPrint', compact('order', 'items'));
    }


     public function orderChalan(Order $order)
    {
        $items = $order->orderItems()->get();

        return view('user.order.orderChalan', compact('order', 'items'));
    }

    // public function quickView(Request $request, $id)
    // {
    //     $product = Product::with('categories')->findOrFail($id);
    //     dd($product);
    //     return response()->json([
    //         'id' => $product->id,
    //         'name' => $product->name,
    //         'image' => asset('storage/product_images/' . $product->image),
    //         'category' => $product->categories->first()->name,
    //     ]);
    // }


        public function quickView($id)
        {
            try {
                // Log the request
                // \Log::info('Quick view request for product ID: ' . $id);
                
                $product = Product::with('categories')->find($id);
                // dd($product);
                if (!$product) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Product not found'
                    ], 404);
                }

                $html = view('frontend.layouts.quick-view', compact('product'))->render();

                return response()->json([
                    'success' => true,
                    'html' => $html
                ]);
                
            } catch (\Exception $e) {
                \Log::error('Quick view error: ' . $e->getMessage());
                
                return response()->json([
                    'success' => false,
                    'message' => 'Server error'
                ], 500);
            }
        }

        public function testidcard(){
            $user = User::findOrFail(136);
            return view('idcard',compact('user'));
        }
    }
