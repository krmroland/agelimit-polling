<?php

namespace App;

use GuzzleHttp\Client;
use App\Admin\AuthyToken;

class VerifyPhoneNumber
{
    protected $token;

    public function sendToken($id, $type = null)
    {
        $type = $type ?: 'sms';

        static $tries = 0;
        try {
            $this->client()->get(
                $this->authyUrl("$type/$id").
                '&force=true&action_message=Uganda Online Age limit Poll'
            );
        } catch (\Exception $e) {
            if ((int) $e->getCode() == 429 && $tries < 3) {
                $tries += 1;
                $this->token = AuthyToken::nextToken($e->getMessage());

                return $this->sendToken($id, $type);
            }

            flash()->error(
                'something went wrong while sending you a code. Please Try again'
            );

            return redirect('/');
        }
    }

    protected function client()
    {
        return  new Client();
    }

    public function register($phoneNumber)
    {
        return json_decode($this->client()->post($this->authyUrl('users/new'), [
                        'form_params' => [
                            'user' => [
                                 'email' => 'info@lawma.ug',
                                 'cellphone' => substr($phoneNumber, 1),
                                 'country_code' => 256,
                            ],
                        ], ])->getBody(), true)['user']['id'];
    }

    protected function getToken()
    {
        return $this->token ?: AuthyToken::activeToken();
    }

    protected function authyUrl($appends)
    {
        $key = $this->getToken();

        return  "https://api.authy.com/protected/json/$appends?api_key=$key";
    }

    public function tokenIsValid($id, $token)
    {
        $response = $this->client()->get($this->authyUrl("verify/$token/$id"))->getBody();
        //$url = "https://api.authy.com/protected/json/verify/$token/$id?api_key=$key";

        return json_decode($response, true)['token'] == 'is valid';
    }

    public function getIpInfo()
    {
        $ip = request()->ip();

        return json_decode($this->client()->get("http://ip-api.com/json/$ip")->getBody(), true);
    }
}
