<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        User::created(function ($user) {
            $profileId = DB::table('profiles')->insertGetId([
                'user_id' => $user->id,
                'profile_image' => 'default.png',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('users')->where('id', $user->id)->update(['profile_id' => $profileId]);
        });
    }
}
