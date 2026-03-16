<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MembershipCategory;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       menuSubmenu('memberships', 'all_membership');
       $membershipCategory = MembershipCategory::orderBy('subscription_fee')->paginate(10);
       return view('admin.memberships.index',compact('membershipCategory'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       menuSubmenu('memberships', 'create_membership');
       return view('admin.memberships.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'subscription_fee' => 'required|numeric',
            'free_books' => 'nullable|integer',
            'validity_days' => 'nullable|integer',
            'access_all_books' => 'nullable|boolean',
            'layer_count' => 'nullable|integer',
            'active' => 'nullable|boolean',
        ]);

        MembershipCategory::create([
            'name' => $request->name,
            'subscription_fee' => $request->subscription_fee,
            'free_books' => $request->free_books ?? null,
            'validity_days' => $request->validity_days,
            'layer_count' => $request->layer_count,
            'access_all_books' => $request->has('access_all_books'),
            'active' => $request->has('active'),
        ]);

        return redirect()->route('memberships.index')->with('success', 'Membership created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MembershipCategory $membership)
    {
        return view('admin.memberships.edit',compact('membership'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'subscription_fee' => 'required|numeric',
            'free_books' => 'nullable|integer',
            'layer_count' => 'nullable|integer',
            'validity_days' => 'nullable|integer',
        ]);

        $membership = MembershipCategory::findOrFail($id);

        $membership->update([
            'name' => $request->name,
            'subscription_fee' => $request->subscription_fee,
            'free_books' => $request->free_books ?? null,
            'validity_days' => $request->validity_days,
            'layer_count' => $request->layer_count,
            'access_all_books' => $request->has('access_all_books'),
            'active' => $request->has('active'),
        ]);

        return redirect()
            ->route('memberships.index')
            ->with('success', 'Membership updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $membership = MembershipCategory::findOrFail($id);
        $membership->delete();

        return redirect()
            ->route('memberships.index')
            ->with('success', 'Membership deleted successfully.');
    }

}
