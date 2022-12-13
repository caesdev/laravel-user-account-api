<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function store(Request $request)
    {
        if ($request->input('type') === 'deposit') {
            return $this->deposit(
                $request->input('destination'),
                $request->input('amount'),
                $request->input('name'),
                $request->input('last_name')
            );
        }
    }

    private function deposit($destination, $amount, $name, $lastname)
    {
        User::firstOrCreate([
            'id' => $destination,
            'name' => $name,
            'last_name' => $lastname
        ]);

        $account = Account::firstOrCreate([
            'id' => $destination,
            'user_id' => $destination
        ]);
        $account->balance += $amount;
        $account->save();

        return response()->json([
            'destination' => [
                'id'=>$account->id,
                'name' => $account->user->name,
                'last_name' => $account->user->last_name,
                'balance' => $account->balance
            ]
        ], 201);
    }
}
