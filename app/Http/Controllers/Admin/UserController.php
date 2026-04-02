<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('open.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Valideer de invoer
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8', // Minimaal 8 tekens
        ]);

        // 2. Maak een nieuwe user aan (OOP manier)
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;

        // 3. Hash het wachtwoord!
        $user->password = Hash::make($request->password);

        // 4. Verwerk de checkbox
        // $request->has() geeft true als het vinkje aan staat, anders false
        $user->is_admin = $request->has('is_admin');

        $user->save();

        return redirect()->route('admin.users.index')
            ->with('status', 'Gebruiker succesvol aangemaakt!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
