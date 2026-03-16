<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cookie;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    private static $user;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'father_name',
        'address',
        'present_address',
        'permanent_address',
        'reg_date',
        'nid',
        'tin_number',
        'bkash_number',
        'mobile',
        'dob',
        'ssc_passing',
        'ssc_registration',
        'blood_group',
        'image',
        'membership_category_id',
        'balance',
        'referred_by',
        'transaction_id',
        'is_approve'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function createUser($request){
        self::$user=new User();
        self::$user->name=$request->name;
        self::$user->email=$request->email;
        self::$user->password=bcrypt($request->password);
        self::$user->save();

    }
    public static function updateUser($request,$id){
        self::$user=User::find($id);
        self::$user->name=$request->name;
        self::$user->email=$request->email;
        self::$user->save();
    }
    public static function changePassword($request,$id){
        self::$user=User::find($id);
        self::$user->password=bcrypt($request->password);
        self::$user->save();
    }
    public static function deleteUser($id){
        self::$user=User::find($id);
        self::$user->delete();
    }
 

    public function roles(){
        return $this->hasMany(Role::class,'user_id','id');
    }

    public function hasRole($role){
        return (bool) $this->roles()->where('role_name',$role)->count();
    }
    public function hasRoleUserId($usrId){
        return (bool) $this->roles()->where('user_id',$usrId)->count();
    }


    public function locations()
    {
        return $this->hasMany(DeliveryLocation::class);
    }



    public function fi()
    {
        return $this->image ?: 'profile.jpg';
    }

 


    public function doctor(){
        return $this->hasOne(Doctor::class);
    }


     public function carts()
    {
        return $this->hasMany(Cart::class);
    }


    public function orders()
    {
        return $this->hasMany(Order::class);
    }


    public function idcard()
    {
        return $this->hasOne(IdCard::class);
    }
    
 
    // ebook orm start here 
    public function userBooks()
    {
        return $this->hasMany(UserBook::class);
    }

    // For convenience: different filtered lists
    public function readingBooks()
    {
        return $this->hasMany(UserBook::class)->where('status', 'reading');
    }

    public function purchasedBooks()
    {
        return $this->hasMany(UserBook::class)->where('status', 'purchased');
    }

    public function favoriteBooks()
    {
        return $this->hasMany(UserBook::class)->where('status', 'favorite');
    }

    public function completedBooks()
    {
        return $this->hasMany(UserBook::class)->where('status', 'completed');
    }

    public function membershipCategory()
    {
        return $this->belongsTo(MembershipCategory::class, 'membership_category_id');
        // return $this->belongsTo(MembershipCategory::class);
    }

    public function referrer()
    {
        return $this->belongsTo(User::class, 'referred_by');
    }

    public function referrals()
    {
        return $this->hasMany(User::class, 'referred_by');
    }

    public function withdrawals()
    {
        return $this->hasMany(Withdrawal::class);
    }
}
