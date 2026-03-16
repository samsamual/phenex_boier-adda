<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\ProductCat;
use App\Models\Media;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Author;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Storage, File, DB, Cache, Auth, Validator
};



class ProductController extends Controller
{
    // Show All Categories
    /**
     * Display a paginated list of all product categories.
     *
     * @return \Illuminate\View\View
     */
    public function productCategoriesAll()
    {
        // Set the current menu and submenu for active sidebar highlighting
        menuSubmenu('product', 'productCategoriesAll');

        // Fetch latest product categories with pagination (30 per page)
        $categories = ProductCategory::latest()->paginate(30);
    
        // Return the view with data
        return view('admin.productCategories.productCategoriesAll', compact('categories'));
    }

    /**
    * Show the form to create a new product category.
    *
    * @return \Illuminate\View\View
    */
    public function productCategoryCreate()
    {
        // Set the current menu and submenu for sidebar highlighting
        menuSubmenu('product', 'productCategoriesAll');

        // Return the view to create a new category
        return view('admin.productCategories.productCategoryCreate');
    }

    /**
    * Store a newly created product category in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\RedirectResponse
    */
    public function productCategoryStore(Request $request)
    {
        // Highlight correct menu in sidebar
        menuSubmenu('product', 'productCategoriesAll');

        // Validate incoming request
        $request->validate([
            'name_en' => 'required|string|max:255',
            'slug'    => 'required|string|unique:product_categories,slug',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048'
        ]);

        // Initialize new category instance
        $category = new ProductCategory();
        $category->name_en      = $request->name_en;
        $category->name_bn      = $request->name_bn ?? null;
        $category->slug         = getSlug($request->slug, $category, true);
        $category->excerpt      = $request->excerpt;
        $category->active       = $request->boolean('active');
        $category->addedby_id   = Auth::id();

        // Handle image upload
        if ($request->hasFile('image')) {
            $file      = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put('product_categories_images/' . $imageName, File::get($file));
            $category->image = $imageName;
        }

        // Save category
        $category->save();

        // Clear cache
        Cache::flush();

        return redirect()->route('admin.productCategoriesAll')->with('success', 'Category successfully created');
    }

    public function productCategoryEdit(Request $request, ProductCategory $category)
    {
        menuSubmenu('product', 'productCategoriesAll');

        return view('admin.productCategories.productCategoryEdit', compact('category'));
    }

    /**
    * Update an existing product category
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\ProductCategory  $category
    * @return \Illuminate\Http\RedirectResponse
    */
    public function productCategoryUpdate(Request $request, ProductCategory $category)
    {
        // Set active menu for admin sidebar
        menuSubmenu('product', 'productCategoriesAll');


        // Validate incoming request data
        $validation = Validator::make($request->all(), [
            'name_en' => 'required|string',
            // Unique slug validation but ignore current category ID
            'slug' => 'required|string|unique:product_categories,slug,' . $category->id,
        ]);

        if ($validation->fails()) {
            toast('Something went wrong!', 'error');
            return back()->withErrors($validation)->withInput();
        }

        // Update category fields
        $category->name_en = $request->name_en;
        $category->name_bn = $request->name_bn;
        $category->slug = getSlug($request->slug, $category, true);
        $category->excerpt = $request->excerpt;
        $category->active = $request->boolean('active');
        $category->editedby_id = Auth::id();

        // Handle image replacement if a new image is uploaded
        if ($request->hasFile('image')) {
            $oldFile = 'product_categories_images/' . $category->image;

            // Delete old image if exists
            if (Storage::disk('public')->exists($oldFile)) {
                Storage::disk('public')->delete($oldFile);
            }

            // Store new image
            $file = $request->file('image');
            $imageName = time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put('product_categories_images/' . $imageName, File::get($file));
            $category->image = $imageName;
        }

        // Save the updated category
        $category->save();

        // Clear cache to reflect updates immediately
        Cache::flush();


        return redirect()->back()->with('success', 'Product Category successfully updated');

    }

    /**
    * Delete a product category along with its image
    *
    * @param  \App\Models\ProductCategory  $category
    * @return \Illuminate\Http\RedirectResponse
    */
    public function productCategoryDelete(ProductCategory $category)
    {
        // Set active menu for admin sidebar
        menuSubmenu('product', 'productCategoriesAll');

        // Check if category has an image and delete it from storage
        if ($category->image) {
            $imagePath = 'product_categories_images/' . $category->image;
            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
        }

        // Delete the category record from database
        $category->delete();

        // Clear cache to update any cached data
        Cache::flush();


        return redirect()->back()->with('success', 'Product Category successfully deleted');
    }

    /**
    * Toggle the active status of a product category via AJAX
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
    */
    public function categoryStatus(Request $request)
    {

     
        // Find category by ID or fail with 404
        $category = ProductCategory::findOrFail($request->category);

        // Toggle the active status
        $category->active = !$category->active;

        // Save the updated status
        $category->save();

        // Return JSON response for AJAX success
        return response()->json([
            'success' => true,
            'active' => $category->active,
        ]);
    }





    /**
     * Display a paginated list of all products in descending order by creation date.
     *
     * @return \Illuminate\View\View
     */
    public function productsAll()
    {
        // Set active menu and submenu for UI highlighting
        menuSubmenu('product', 'productsAll');

        // Fetch latest products with pagination (30 per page)
        $data['products'] = Product::with(['publisher', 'author'])->latest()->paginate(30);

        // Return the products list view with data
        return view('admin.products.productsAll', $data);
    }



   /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\View\View
     */
    public function productCreate()
    {
        // Set active menu and submenu for UI highlighting
        menuSubmenu('product', 'productsAll');

        // Fetch latest product categories for category dropdown/select
        $data['categories'] = ProductCategory::latest()->get();

        // Fetch paginated media items for media selection (20 per page)
        $data['medias'] = Media::latest()->paginate(20);
        // Fetch authors and publishers
        $data['authors'] = Author::where('active', 1)->get();
        $data['publishers'] = Publisher::where('active', 1)->get();
        // Return the create product view with categories and medias data
        return view('admin.products.productCreate', $data);
    }




    /**
     * Store a newly created product in database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function productStore(Request $request)
    {
        // Set active menu and submenu for admin UI highlighting
        menuSubmenu('product', 'productsAll');


        // Validate incoming request data
        $request->validate([
            'name_en'        => 'required|string',
            // 'sku'            => 'required',
            'price'          => 'required|numeric',
            'slug'           => 'required|string',
            'featured_image' => 'nullable|image',
            'file_path'      => 'nullable|mimes:pdf',
            'preview_path'   => 'nullable|mimes:pdf',
        ]);

    

        // Initialize new product instance
        $product = new Product();
        $product->author_id  = $request->author_id ?? null;
        $product->publisher_id  = $request->publisher_id ?? null;
        $product->name_en = $request->name_en;
        $product->name_bn = $request->name_bn ?? null;
        $product->sku = $request->sku ?? null;
        $product->stock = $request->stock ? $request->stock : 1;

        // Generate slug, helper function ensures uniqueness if needed
        $product->slug = getSlug($request->slug, $product, boolval($request->slug));

        $product->price = $request->price ?? 0.00;
        $product->discount = $request->discount ?? 0.00;

        // Calculate discount price and final price
        $product->discount_price = $request->discount ?? 0.00;
        $product->final_price = $request->price - $product->discount;

        $product->unit = $request->unit;
        $product->excerpt_en = $request->excerpt_en;
        $product->excerpt_bn = $request->excerpt_bn ?? null;
        $product->description_en = $request->description_en;
        $product->description_bn = $request->description_bn ?? null;

        // Checkbox fields: convert to boolean 1/0
        $product->editor = $request->editor ? 1 : 0;
        $product->active = $request->active ? 1 : 0;

        $product->addedby_id = Auth::id();

        // Save initially to get product ID (needed for image filename)
        $product->save();

        // Handle featured image upload
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $ext = '.' . $file->getClientOriginalExtension();

            // Filename using product ID and current timestamp
            $imageName = $product->id . '_' . time() . $ext;

            // Store file in 'public/product_images' disk
            Storage::disk('public')->put('product_images/' . $imageName, File::get($file));

            // Update product featured_image field and save
            $product->featured_image = $imageName;
            $product->save();
        }

        // Handle book pdf upload
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $ext = '.' . $file->getClientOriginalExtension();

            // Filename using product ID and current timestamp
            $fileName = $product->id . '_' . time() . $ext;

            // Store file in 'public/product_files' disk
            Storage::disk('public')->put('product_files/' . $fileName, File::get($file));

            // Update product file_path field and save
            $product->file_path = $fileName;
            $product->save();
        }

        // Handle book preview pdf upload
        if ($request->hasFile('preview_path')) {
            $file = $request->file('preview_path');
            $ext = '.' . $file->getClientOriginalExtension();

            // Filename using product ID and current timestamp
            $fileName = $product->id . '_' . time() . '_preview' . $ext;

            // Store file in 'public/product_previews' disk
            Storage::disk('public')->put('product_previews/' . $fileName, File::get($file));

            // Update product preview_path field and save
            $product->preview_path = $fileName;
            $product->save();
        }

        // Cache management: clear and set fresh cache for this product
        Cache::forget('product');
        Cache::put("product_{$product->id}", $product, now()->addDays(7));

        // Handle product categories and subcategories relationship
        if ($request->categories) {
            foreach ($request->categories as $catId) {
                // Attach category if not already attached
                $categoryExists = ProductCat::where('product_category_id', $catId)
                    ->where('product_id', $product->id)
                    ->first();
                if (!$categoryExists) {
                    $productCat = new ProductCat();
                    $productCat->product_category_id = $catId;
                    $productCat->product_id = $product->id;
                    $productCat->addedby_id = Auth::id();
                    $productCat->save();
                }

            }
        }


        return redirect()->route('admin.productsAll')->with('success', 'Product successfully created');
    }




    /**
     * Show the form for editing the specified product.
     *
     * @param  \App\Models\\Product  $product
     * @return \Illuminate\View\View
     */
    public function productEdit(Product $product)
    {
        // Set active menu/submenu for UI highlight
        menuSubmenu('product', 'productsAll');

        // Prepare data array to pass to view
        $data = [
            'product'    => $product,
            'categories' => ProductCategory::latest()->get(),
            'medias'     => Media::latest()->paginate(20),
            // Fetch authors and publishers
            'authors' => Author::where('active', 1)->get(),
            'publishers' => Publisher::where('active', 1)->get(),
            // Explode tags string into array or null if no tags
            'ots'        => $product->tags ? explode(', ', $product->tags) : null,
        ];

        // Return edit view with prepared data
        return view('admin.products.productEdit', $data);
    }



    /**
     * Update the specified product in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function productUpdate(Request $request, Product $product)
    {
        // Highlight the 'product' menu and 'productsAll' submenu in the admin panel
        menuSubmenu('product', 'productsAll');

        // Validate incoming request data
        $request->validate([
            'name_en' => 'required|string',
            'price' => 'required|numeric',
            // 'sku'   => 'required',
            'slug' => 'required|string',
            'featured_image' => 'nullable|image',
            'file_path'      => 'nullable|mimes:pdf',
            'preview_path'   => 'nullable|mimes:pdf',
        ]);

      

        // Update product attributes with request data
        $product->author_id  = $request->author_id ?? null;
        $product->publisher_id  = $request->publisher_id ?? null;
        $product->name_en = $request->name_en;
        $product->name_bn = $request->name_bn ?? null;
        $product->sku = $request->sku ?? null;
        $product->slug = getSlug($request->slug, $product, boolval($request->slug));
        $product->price = $request->price ?? 0.00;
        $product->discount = $request->discount ?? 0.00;
        $product->discount_price = $request->discount ?? 0.00;
        $product->final_price = $product->price - $product->discount;
        $product->excerpt_en = $request->excerpt_en;
        $product->excerpt_bn = $request->excerpt_bn ?? null;
        $product->description_en = $request->description_en;
        $product->description_bn = $request->description_bn ?? null;
        $product->editor = $request->editor ? 1 : 0;
        $product->active = $request->active ? 1 : 0;

      

        // Handle featured image upload if a file is provided
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $ext = '.' . $file->getClientOriginalExtension();
            $imageName = $product->id . time() . $ext;
            Storage::disk('public')->put('product_images/' . $imageName, File::get($file));
            $product->featured_image = $imageName;
        }

        // Handle book pdf upload
        if ($request->hasFile('file_path')) {
            $old_file = 'product_files/' . $product->file_path;
            if (Storage::disk('public')->exists($old_file)) {
                Storage::disk('public')->delete($old_file);
            }
            $file = $request->file('file_path');
            $ext = '.' . $file->getClientOriginalExtension();
            $fileName = $product->id . '_' . time() . $ext;
            Storage::disk('public')->put('product_files/' . $fileName, File::get($file));
            $product->file_path = $fileName;
        }

        // Handle book preview pdf upload
        if ($request->hasFile('preview_path')) {
            $old_file = 'product_previews/' . $product->preview_path;
            if (Storage::disk('public')->exists($old_file)) {
                Storage::disk('public')->delete($old_file);
            }
            $file = $request->file('preview_path');
            $ext = '.' . $file->getClientOriginalExtension();
            $fileName = $product->id . '_' . time() . '_preview' . $ext;
            Storage::disk('public')->put('product_previews/' . $fileName, File::get($file));
            $product->preview_path = $fileName;
        }

        // Save updated product data to the database
        $product->save();

        // Clear and update product cache
        Cache::forget('product');
        Cache::put("product_{$product->id}", $product, now()->addDays(30));

        // Detach all existing categories and subcategories relationships
        $product->categories()->detach();


        // Attach new categories and their subcategories from the request
        if ($request->categories) {
            foreach ($request->categories as $cat) {
                $c = ProductCat::where('product_category_id', $cat)->where('product_id', $product->id)->first();
                if (!$c) {
                    $c = new ProductCat;
                    $c->product_category_id = $cat;
                    $c->product_id = $product->id;
                    $c->addedby_id = Auth::id();
                    $c->save();
                }
            }
        }

 
        return redirect()->back()->with('success', 'Product successfully updated');

    }




    /**
     * Delete the specified product from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function productDelete(Product $product)
    {
        // Highlight the 'productsAll' menu item
        menuSubmenu('product', 'productsAll');

        // Prepare the path of the old featured image file
        $old_file = 'product_images/' . $product->featured_image;

        // Check if the file exists in storage and delete it
        if (Storage::disk('public')->exists($old_file)) {
            Storage::disk('public')->delete($old_file);
        }

        // Delete the product record from the database
        $product->delete();

        // Clear the cache related to this product
        Cache::forget("product_{$product->id}");

        return redirect()->back()->with('success', 'Product successfully deleted');

    }



    /**
     * Toggle the active status of a product.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function productStatus(Request $request)
    {


        // প্রোডাক্ট আইডি দিয়ে প্রোডাক্ট খুঁজে পাওয়া
        $product = Product::find($request->product);

        // যদি প্রোডাক্ট অ্যাক্টিভ না থাকে, তাহলে অ্যাক্টিভ করো, না হলে ইনঅ্যাক্টিভ করো
        if ($product->active == 0) {
            $product->active = 1;
            $active = true;
        } else {
            $product->active = 0;
            $active = false;
        }

        // পরিবর্তন সংরক্ষণ
        $product->save();

        // JSON রেসপন্স রিটার্ন করা, স্ট্যাটাস সহ
        return response()->json([
            'success' => true,
            'active' => $active
        ]);
    }








    /**
     * Search entities based on type and query.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function productSearch(Request $request)
    {
        $type = $request->type;
        $q = $request->q;

        if ($type == 'product') {
            // Search products by name, price, code or ID
            $products = Product::where(function ($qq) use ($q) {
                $qq->orWhere('name_en', 'like', "%{$q}%")
                ->orWhere('name_bn', 'like', "%{$q}%")
                ->orWhere('price', 'like', "%{$q}%")
                ->orWhere('product_code', 'like', "%{$q}%")
                ->orWhere('id', 'like', "%{$q}%");
            })->orderBy('name_en')
            ->paginate(100);

            $products->appends($request->all());

            $page = View('admin.products.searchData', ['products' => $products])->render();

            return response()->json([
                'success' => true,
                'page' => $page,
            ]);
        } elseif ($type == 'category') {
            // Search product categories by name or ID
            $categories = ProductCategory::where(function ($qq) use ($q) {
                $qq->orWhere('name_en', 'like', "%{$q}%")
                ->orWhere('name_bn', 'like', "%{$q}%")
                ->orWhere('id', 'like', "%{$q}%");
            })->orderBy('name_en')
            ->paginate(100);

            $categories->appends($request->all());

            $page = View('admin.productCategories.searchData', ['categories' => $categories])->render();

            return response()->json([
                'success' => true,
                'page' => $page,
            ]);
        } else {
           return response()->json([
                'success' => false,
                'message' => 'Invalid search type.',
            ], 400);
        }
    }






 
   



    /**
     * Display a list of orders with optional filters (date range, status, mobile, user).
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View|\Illuminate\Http\Response
     */
    public function orderList(Request $request)
    {
        // Highlight the correct menu
        menuSubmenu('order', 'orderList');

        // Get all orders with or without user filter
        $orders = Order::when($request->id, function ($q) use ($request) {
            $q->where('user_id', $request->id);
        })->where(function ($query) use ($request) {

            // Filter by date range
            if ($request->filled(['date_from', 'date_to'])) {
                $from = $request->date_from . ' 00:00:00';
                $to = $request->date_to . ' 23:59:59';
                $query->whereBetween('created_at', [$from, $to]);
            }

            // Filter by order status
            if ($request->status) {
                $query->where('order_status', 'like', '%' . $request->status . '%');
            }

            // Filter by mobile number
            if ($request->mobile) {
                $query->where('mobile', 'like', '%' . $request->mobile . '%');
            }

        })->orderBy('created_at', 'desc') // Show latest first
        ->paginate($request->id ? 100 : 30);

       
        // Show regular order list view
        return view('admin.orders.orderList', compact('orders'));
    }




    /**
     * Display the details of a specific order.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\View\View
     */
    public function orderDeatils(Order $order)
    {
        // Highlight the order menu and submenu for active navigation
        menuSubmenu('order', 'orderList');

        // Return the order details view with the selected order
        return view('admin.orders.orderDeatils', compact('order'));
    }


    /**
     * Update the status of a specific order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function orderStatus(Request $request, Order $order)
    {


        // Prevent further updates if the order is already delivered
        if ($order->order_status === 'delivered') {
            return response()->json([
                'success' => false,
                'message' => 'This order has already been delivered and cannot be updated.'
            ]);
        }

        // Prevent delivery if the payment has not been completed
        if ($request->order_status === 'delivered' && $order->payment_status !== 'paid') {
            return response()->json([
                'success' => false,
                'message' => 'Order cannot be marked as delivered because the payment is not fully completed.'
            ]);
        }

        // Update order status and assign appropriate timestamp
        switch ($request->order_status) {
            case 'pending':
                $order->order_status = 'pending';
                $order->pending_at = now();
                break;

            case 'confirmed':
                $order->order_status = 'confirmed';
                $order->confirmed_at = now();
                break;

            case 'delivered':
                $order->order_status = 'delivered';
                $order->delivered_at = now();
                break;

            case 'canceled':
                $order->order_status = 'canceled';
                $order->canceled_at = now();
                break;

            default:
                // Invalid status provided
                toast('Invalid order status provided.', 'warning');
                return redirect()->back();
        }

        // Save the updated order
        $order->save();

        // Notify success
        toast('Order status updated successfully.', 'success');

        // Redirect to previous page
        return redirect()->back();
    }





    /**
     * Store a new payment for the specified order.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\RedirectResponse
     */
    public function orderPayment(Request $request, Order $order)
    {

        // Validate the payment input fields
        $request->validate([
            'payment_date'    => 'required|date',
            'payment_method'  => 'required|string|max:255',
            'paid_amount'     => 'required|numeric|min:0.01',
        ]);

        // Initialize new Payment instance and assign values
        $payment                      = new Payment();
        $payment->order_id           = $order->id;
        $payment->user_id            = $order->user_id;
        $payment->note               = $request->note;
        $payment->payment_method     = $request->payment_method;
        $payment->transaction_id     = $request->transaction_id;
        $payment->previous_due_amount = $order->due();
        $payment->paid_amount        = $request->paid_amount;
        $payment->due_amount         = $payment->previous_due_amount - $payment->paid_amount;
        $payment->payment_date       = $request->payment_date;
        $payment->payment_status     = 'paid'; // Hardcoded since it's a successful payment
        $payment->addedby_id         = Auth::id();
        $payment->save();

        // Update order payment status and paid amount
        $order->paid_amount += $request->paid_amount;
        $order->payment_status = $order->due() > 0.99 ? 'partial' : 'paid';
        $order->editedby_id    = Auth::id(); // Fix: assignment operator should be '='
        $order->save();

        // Display success notification
        toast('Order payment successfully added.', 'success');

        // Redirect back to the previous page
        return redirect()->back();
    }






    /**
     * Update the quantity of a specific order item.
     * Prevent update if the order is already confirmed or delivered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function updateQty(Request $request)
    {

        // Find the order item
        $item = OrderItem::findOrFail($request->item);

        // Get the parent order
        $order = $item->order;

        // Prevent update if the order is already confirmed or delivered
        if (in_array($order->order_status, ['confirmed', 'delivered'])) {
            return response()->json([
                'status' => false,
                'message' => 'Quantity cannot be updated. Order has already been confirmed or delivered.',
            ]);
        }

        // Update quantity
        $item->quantity = $request->new_qty;
        $item->total_cost = $item->product_price * $item->quantity;
        $item->save();

        // Update total order amount
        $order->subtotal = $order->orderItems->sum('total_cost');

        $deliveryCost = $order->delivery_cost ?? 0.00;
        $order->grand_total = $order->subtotal + $deliveryCost;

        $order->save();

        // Load updated order items
        $orderItems = $order->orderItems;

        // Return updated partial view for AJAX
        if ($request->ajax()) {
            return response()->json([
                'status' => true,
                'orderTotalAmount' => $order->grand_total,
                'message' => 'Item quantity updated successfully!',
                'view' => view('admin.orders.includes.items', [
                    'order' => $order,
                    'orderItems' => $orderItems
                ])->render(),
            ]);
        }else{
             return response()->json([
                'status' => false,
            ]);
        }
    }



    /**
     * Delete a specific order item and recalculate the order total.
     * Prevent deletion if order is already confirmed or delivered.
     * @param  \App\Models\OrderItem  $item
     */
    public function orderItemDelete(OrderItem $orderItem)
    {

        $order = $orderItem->order;

        if (in_array($order->order_status, ['confirmed', 'delivered'])) {
            return response()->json([
                'status' => false,
                'message' => 'Cannot delete item. The order is already confirmed or delivered.',
            ]);
        }

        $orderItem->delete();

        $order->subtotal = $order->orderItems()->sum('total_cost');

        $deliveryCost = $order->delivery_cost ?? 0.00;
        $order->grand_total = $order->subtotal + $deliveryCost;

        $order->save();

       return redirect()->back();
    }


   

    /**
     * Print order invoice view.
     * 
     * @param  \App\Models\Order  $order
     * @return \Illuminate\View\View
     */
    public function orderPrint(Order $order)
    {
        $items = $order->orderItems()->get();

        return view('admin.orders.orderPrint', compact('order', 'items'));
    }

   

}