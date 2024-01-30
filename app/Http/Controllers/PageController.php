<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{
    function index()
    {
        DB::transaction(function () {
        });
        DB::beginTransaction();

        $user = User::create([
            'name' => 'Afa',
            'email' => 'afa@javas.web.id',
            'password' => Hash::make('secret123'),
        ]);

        try {
            self::insert_detail($user);
        } catch (\Throwable $th) {
            throw $th;
        }
        // if ($user->id === 1) {
        //     DB::rollback();
        // }

    }

    function insert_detail($user)
    {
        UserDetail::createx([
            'address' => 'Sidoluhur',
            'nick' => 'Afazoom',
            'user_id' => $user->id,
        ]);

        DB::commit();
    }
}
