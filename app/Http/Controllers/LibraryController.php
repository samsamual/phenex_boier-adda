<?php

namespace App\Http\Controllers;

use App\Models\UserBook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\BlogPost;
use App\Models\MembershipCategory;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class LibraryController extends Controller
{

    public function purchasedBooks()
    {
        // Using pagination is a good practice for long lists
        $user = Auth::user();
        $books = UserBook::where('user_id', Auth::id())
                           ->where('status', 'purchased')
                           ->with('product') 
                           ->paginate(15);
        $activeTab = 'purchase';
        // You will need to create this view file: 
        // resources/views/mypanel/library/purchased_books.blade.php
        return view('mypanel.library.purchased_books', compact('user', 'activeTab', 'books'));
    }


    public function favoriteBooks()
    {
        $user = Auth::user();
        $books = UserBook::where('user_id', Auth::id())
                                         ->where('status', 'favorite')
                                         ->with('product')
                                         ->paginate(15);
        $activeTab = 'favorite';
        // You will need to create this view file: 
        // resources/views/mypanel/library/favorite_books.blade.php
        return view('mypanel.library.favorite_books', compact('activeTab', 'user' ,'books'));
    }

    public function trackAndRead($productId)
    {
        $user = auth()->user();

        $product = Product::findOrFail($productId);

        // Create or update user_books record
        // $userBook = UserBook::updateOrCreate(
        //     [
        //         'user_id' => $user->id,
        //         'product_id' => $productId,
        //     ],
        //     [
        //         'status' => 'reading',
        //         'last_read_at' => now(),
        //     ]
        // );

        UserBook::create([
            'user_id' => $user->id,
            'product_id' => $productId,
            'status' => 'reading',
            'last_read_at' => now(),
        ]);

        // Redirect directly to the PDF file
        return redirect(asset('storage/product_files/' . $product->file_path));
    }




    public function toggleFavorite(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'auth' => false,
                'message' => 'Please log in to add favorites.'
            ]);
        }

        $userId = Auth::id();
        $productId = $request->product_id;

        $favorite = UserBook::where('user_id', $userId)
            ->where('product_id', $productId)
            ->where('status', 'favorite')
            ->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json(['success' => true, 'favorited' => false]);
        } else {
            UserBook::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'status' => 'favorite'
            ]);
            return response()->json(['success' => true, 'favorited' => true]);
        }
    }
    // public function toggleFavorite(Request $request)
    // {
    //     if (!Auth::check()) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Please log in to add favorites.',
    //             'auth' => false
    //         ]);
    //     }

    //     $user = Auth::user();
    //     $productId = $request->product_id;

    //     // Check if already exists
    //     $userBook = UserBook::where('user_id', $user->id)
    //                         ->where('product_id', $productId)
    //                         ->first();

    //     if ($userBook && $userBook->status === 'favorite') {
    //         // Remove from favorite
    //         $userBook->delete();
    //         return response()->json(['success' => true, 'favorited' => false]);
    //     } else {
    //         // Add to favorite
    //         UserBook::updateOrCreate(
    //             ['user_id' => $user->id, 'product_id' => $productId],
    //             ['status' => 'favorite']
    //         );
    //         return response()->json(['success' => true, 'favorited' => true]);
    //     }
    // }

    public function lastReadBook()
    {
        $user = Auth::user();
        $bookEntry = UserBook::where('user_id', Auth::id())
                                             ->whereNotNull('last_read_at')
                                             ->orderBy('last_read_at', 'desc')
                                             ->with('product')
                                             ->first();
        $activeTab = 'last';
        // You will need to create this view file: 
        // resources/views/mypanel/library/last_read_book.blade.php
        return view('mypanel.library.last_read_book', compact('activeTab','user','bookEntry'));
    }

    /**
     * Show the form for creating a new book.
     */
    public function createBook()
    {
        $user = Auth::user();
        $categories = ProductCategory::latest()->get();
        $activeTab = 'upload'; 

        return view('mypanel.library.upload_book', compact('user', 'activeTab', 'categories'));
    }

    /**
     * Store a newly created book in storage.
     */
    public function storeBook(Request $request)
    {
        $request->validate([
            'name_en'        => 'required|string|max:255',
            'price'          => 'required|numeric',
            'description_en' => 'nullable|string',
            'featured_image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'file_path'      => 'required|mimes:pdf|max:10240', // 10MB Max
        ]);

        $product = new Product();
        $product->name_en = $request->name_en;
        $product->price = $request->price;
        $product->description_en = $request->description_en;
        $product->slug = Str::slug($request->name_en);
        $product->active = 1;
        $product->addedby_id = Auth::id();
        $product->book_type = $request->price > 0 ? 'paid' : 'free';
        $product->save();

        // Upload featured image
        if ($request->hasFile('featured_image')) {
            $file = $request->file('featured_image');
            $imageName = $product->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put('product_images/' . $imageName, File::get($file));
            $product->featured_image = $imageName;
        }

        // Upload book PDF
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');
            $fileName = $product->id . '_' . time() . '.' . $file->getClientOriginalExtension();
            Storage::disk('public')->put('product_files/' . $fileName, File::get($file));
            $product->file_path = $fileName;
        }

        $product->save();

        // Attach categories if any
        if ($request->has('categories')) {
            $product->categories()->attach($request->categories);
        }

        /**
         * 🔹 Create or link record in user_books table
         * Meaning: this user owns or uploaded this book.
         */
        UserBook::create([
            'user_id'    => Auth::id(),
            'product_id' => $product->id,
            'status'     => $request->price > 0 ? 'purchased' : 'reading', // you can customize logic
            'last_read_at' => now(),
        ]);

        return redirect()->route('user.library.purchased_books')
            ->with('success', 'Book uploaded and added to your library successfully!');
    }

    /**
     * Show the page with the user's referral link.
     */
    public function showInvitePage()
    {
        $user = Auth::user();
        $activeTab = 'invite'; 
        return view('mypanel.library.invite', compact('user','activeTab'));
    }

    // simple affiliate 
    // public function showAffiliate()
    // {
    //     $user = Auth::user();
    //     $activeTab = 'affiliate'; 
    //     return view('mypanel.library.affilaite', compact('user','activeTab'));
    // }


    // advance 02 code 
    // public function showAffiliate()
    // {
    //     $user = Auth::user();
    //     $activeTab = 'affiliate';

    //     // Get layer count from membership category
    //     $membership = \App\Models\MembershipCategory::find($user->membership_category_id);
    //     $layerCount = $membership ? $membership->layer_count : 1;

    //     // Build layer-wise referrals
    //     $layers = [];
    //     $currentLevelIds = [$user->id]; // start with the logged-in user

    //     for ($level = 1; $level <= $layerCount; $level++) {
    //         // Get users referred by the current layer of users
    //         $nextLevelUsers = \App\Models\User::whereIn('referred_by', $currentLevelIds)->get();

    //         if ($nextLevelUsers->isEmpty()) break;

    //         // Exponential limit (2^1, 2^2, etc. depending on layerCount)
    //         $power = pow($layerCount, $level);

    //         // Take up to the power count
    //         $layers[$level] = $nextLevelUsers->take($power);

    //         // Prepare for next loop
    //         $currentLevelIds = $nextLevelUsers->pluck('id')->toArray();
    //     }

    //     // Referral transactions (if any)
    //     $referralCollections = \App\Models\ReferralTransaction::where('from_user_id', $user->id)
    //         ->with('user')
    //         ->orderBy('created_at', 'desc')
    //         ->get();

    //     return view('mypanel.library.affiliate', compact(
    //         'user', 'activeTab', 'layers', 'referralCollections', 'layerCount'
    //     ));
    // }

public function showAffiliate()
{
    $user = Auth::user();
    $activeTab = 'affiliate';

    // Membership info
    $membership = MembershipCategory::find($user->membership_category_id);
    $requiredMembers = $membership ? $membership->layer_count : 2; // e.g., 2, 3, 5

    // Get all direct referrals
    $directReferrals = \App\Models\User::where('referred_by', $user->id)
        ->orderBy('created_at')
        ->get();

    $layers = [];
    $offset = 0; // start from first direct referral
    $maxLayer = 3; // or more if needed

    for ($level = 1; $level <= $maxLayer; $level++) {
        $count = pow($requiredMembers, $level); // number of members in this layer
        $layers[$level] = $directReferrals->slice($offset, $count);
        $offset += $count;
        if ($offset >= $directReferrals->count()) {
            break; // no more users to assign
        }
    }

    // Referral earnings
    $referralCollections = \App\Models\ReferralTransaction::where('from_user_id', $user->id)
        ->with('user')
        ->orderBy('created_at', 'desc')
        ->get();

    return view('mypanel.library.affiliate', compact(
        'user',
        'activeTab',
        'layers',
        'requiredMembers',
        'referralCollections'
    ));
}






    // advanced affiliate 
    // public function showAffiliate()
    // {
    //     $user = Auth::user();
    //     $activeTab = 'affiliate';

    //     // Users referred by the logged-in user
    //     $referrals = \App\Models\User::where('referred_by', $user->id)->get();

    //     // Referral transactions (if any)
    //     $referralCollections = \App\Models\ReferralTransaction::where('from_user_id', $user->id)
    //         ->with('user') // assuming relationship defined
    //         ->orderBy('created_at', 'desc')
    //         ->get();

    //     return view('mypanel.library.affiliate', compact('user', 'activeTab', 'referrals', 'referralCollections'));
    // }

    public function blogpost()
    {
        $user = Auth::user();
        $activeTab = 'blog'; 
        $data['blogs'] = BlogPost::where('addedby_id', Auth::id())->latest()->paginate(50);
        return view('mypanel.library.blogpost', compact('user','activeTab'), $data);
    }

    public function blogCreate()
    {
        $user = Auth::user();
        $categories = BlogCategory::where('active',1)->latest()->get();
        $activeTab = 'blogCreate'; 

        return view('mypanel.library.blog_create', compact('user', 'activeTab', 'categories'));
    }
    


    public function blogStore(Request $request)
    {

        $request->validate([
            'name_en' => 'required|string|max:255',
            'description_en' => 'required|string',
            'category_id' => 'required|exists:blog_categories,id',
            'featured_image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('featured_image')) {
            $image = $request->file('featured_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = public_path('storage/post_images');

            // Create directory if not exists
            if (!File::isDirectory($path)) {
                File::makeDirectory($path, 0777, true, true);
            }

            $image->move($path, $imageName);
            // $imagePath = 'storage/post_images/' . $imageName;
            $imagePath =  $imageName;
        }

        // Save blog
        $blog = new BlogPost();
        $blog->addedby_id = Auth::id();
        $blog->title = $request->name_en;
        $blog->description = $request->description_en;
        $blog->category_id = $request->category_id;
        $blog->feature_image = $imagePath;
        $blog->active = 0;
        $blog->status = 'pending';
        $blog->save();

        return redirect()->route('user.blogpost')->with('success', 'Blog post created successfully!');
    }

    public function blogEdit($id)
    {
        $user = Auth::user();
        $activeTab = 'blogEdit'; 
        $blog = BlogPost::findOrFail($id);
        $categories = BlogCategory::where('active', 1)->get();

        return view('mypanel.library.blog_edit', compact('user','blog', 'categories','activeTab'));
    }

    public function blogUpdate(Request $request, $id)
    {
        $request->validate([
            'name_en' => 'required|string|max:255',
            'description_en' => 'required|string',
            'category_id' => 'required|exists:blog_categories,id',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $blog = BlogPost::findOrFail($id);

        // Handle image update
        if ($request->hasFile('featured_image')) {
            $oldPath = public_path('storage/post_images/'.$blog->feature_image);
            if (File::exists($oldPath)) {
                File::delete($oldPath);
            }

            $image = $request->file('featured_image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $path = public_path('storage/post_images');
            $image->move($path, $imageName);
            $blog->feature_image = $imageName;
        }

        $blog->title = $request->name_en;
        $blog->description = $request->description_en;
        $blog->category_id = $request->category_id;
        $blog->save();

        return redirect()->route('user.blogpost')->with('success', 'Blog updated successfully!');
    }



    public function blogdelete($id)
    {
        // Find the blog post
        $blog = BlogPost::findOrFail($id);

        // Delete featured image if exists
        if ($blog->feature_image) {
            $imagePath = public_path('storage/post_images/' . $blog->feature_image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
        }

        // Delete the blog record
        $blog->delete();

        // Redirect with success message
        return redirect()->back()->with('success', 'Blog deleted successfully!');
    }

    



}