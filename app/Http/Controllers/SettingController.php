<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Auth::user()->settings;
        return view("pages.dashboard.settings.edit", compact("settings"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.dashboard.settings.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSettingRequest $request)
    {
        $validations = Validator::make(
            $request->all(),
            [
                "username" => "required",
                "email" => "required",
                "password" => "required",
                "phone" => "required",
                "address" => "required",
                "postal_code" => "required",
                "avatar" => "required",
            ]
        );

        //check password :
        if (! Hash::check($request->password, Auth::user()->password)) {
            return back()->withErrors(['password' => 'The provided password does not match your current password.'])->withInput();
        }


        if ($validations->fails()) {
            $errors = $validations->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        }

        $attributes = $request->all();

        if ($request->hasFile('avatar')) {
            // Store the profile image
            $image = $request->file('avatar');
            $imageName = time() .'-'.$request->name. '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            // Update the customer's profile_image field
            $attributes['avatar'] = env('APP_URL').env('APP_IMAGE_path'). $imageName;
        }

        $attributes["user_id"] = Auth::user()->id;

        try {
            Setting::create($attributes);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }

        return redirect()->route('dashboard.')->with("success", "Settings create Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting) {}

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingRequest $request, Setting $settings)
    {
        $validations = Validator::make(
            $request->all(),
            [
                "username" => "required",
                "email" => "required",
                "password" => "required",
                "phone" => "required",
                "address" => "required",
                "postal_code" => "required",
                "avatar" => "required|file|image",
            ]
        );

        //check password :
        if (! Hash::check($request->password, Auth::user()->password)) {
            return back()->withErrors(['password' => 'The provided password does not match your current password.'])->withInput();
        }


        if ($validations->fails()) {
            $errors = $validations->errors();
            return redirect()->back()->withErrors($errors)->withInput();
        }

        $attributes = $request->all();

        if ($request->hasFile('avatar')) {
            // Store the profile image
            $image = $request->file('avatar');
            $imageName = time() .'-'.$request->username. '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            // Update the customer's profile_image field
            $attributes['avatar'] = env('APP_URL').env('APP_IMAGE_path'). $imageName;
        }

        $attributes["user_id"] = Auth::user()->id;

        try {
            $settings->update($attributes);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage())->withInput();
        }

        return redirect()->route('dashboard.settings.index')->with("success", "Settings create Successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
