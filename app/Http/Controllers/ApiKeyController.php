<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\ApiKey;

class ApiKeyController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $apiKeys = ApiKey::where('user_id', $user->id)->get();

        return Inertia::render('ApiKey/Index', [
            'apiKeys' => $apiKeys,
        ]);
    }

    public function create()
    {
        $apiKeys = ApiKey::where('user_id', auth()->user()->id)->get();

        return Inertia::render('ApiKey/Create', [
            'apiKeys' => $apiKeys,
        ]);
    }

    public function destroy()
    {
        $user = auth()->user();
        $apiKeys = ApiKey::where('user_id', $user->id)->get();

        return Inertia::render('ApiKey/Index', [
            'apiKeys' => $apiKeys,
        ]);
    }

}
