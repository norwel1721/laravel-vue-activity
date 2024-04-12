<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    

    public function verifyEmail($id)
    {
        try {

            DB::beginTransaction();

            $user = User::find($id);
            $user->email_verified_at = new \DateTime();
            $user->save();

            DB::commit();

            return view('mail-template.success');
    
        } catch (\Throwable $e) {
            DB::rollBack();

            return $e->getMessage();
        }
    }

}
