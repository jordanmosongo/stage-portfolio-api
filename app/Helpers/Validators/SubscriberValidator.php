<?php

namespace App\Helpers\Validators;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberValidator {
    static function validateMessage(Request $request) {
        return $validator = Validator::make($request->all(), [
            'message.name' => 'required|max:30',
            'message.email' => 'required',
            'message.phone' => 'required',
            'message.objet' => 'required|max:50',
            'message.message' => 'required|max:255'
         ]);      
    }
}