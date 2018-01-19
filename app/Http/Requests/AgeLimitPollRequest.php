<?php

namespace App\Http\Requests;

use App\AgeLimitPoll;
use Illuminate\Foundation\Http\FormRequest;

class AgeLimitPollRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
        'phoneNumber' => 'bail|required|digits:10|regex:/07\d{8}/',
        ];
    }

    public function messages()
    {
        return[
            'phoneNumber.required' => 'We need your phone number to ensure only Ugandans vote',
            'phoneNumber.min:10' => 'Your phone number is incorrect',
        ];
    }

    protected function withValidator($validator)
    {
        $validator->after(function ($validator) {
            if ($this->numberHasAlreadyBeenVerified()) {
                $validator->errors()->add('phoneNumber', "$this->phoneNumber has already participated");
            }
        });
    }

    protected function numberHasAlreadyBeenVerified()
    {
        return AgeLimitPoll::where(['phoneNumber' => $this->phoneNumber])
                            ->where(['verified_phone_number' => 1])
                            ->exists();
    }
}
