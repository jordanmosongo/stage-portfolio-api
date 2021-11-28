<?php

namespace App\Helpers\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberValidator {
    static function validateSubscriber(Request $request) {
        return $validator = Validator::make($request->all(), [
            'subscriber.email' => 'required|unique:subscribers,email'
         ]);      
    }
}