<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

Auth::provider('custom', function ($app, array $config) {
    return new class($app['hash'], $config['model']) extends \Illuminate\Auth\EloquentUserProvider {
        public function retrieveByCredentials(array $credentials)
        {
            if (isset($credentials['nip'])) {
                return User::where('nip', $credentials['nip'])->first();
            }
            return parent::retrieveByCredentials($credentials);
        }
    };
});
