<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Models\Account;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        if (Account::count() > 0) {
            $account = Account::all();
            return response()->json(
                [
                    'id' => $account->user_id,
                    'name' => $account->user_id->name,
                    'last_name' => $account->user_id->last_name
                ],
                200
            );
        }
        return response()->json('Error, colección vacia', 200);
    }
}
