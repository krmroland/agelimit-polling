<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgeLimitPoll extends Model
{
    /**
     * the mass assignable fields.
     *
     * @var array
     */
    protected $fillable = ['choice', 'phoneNumber'];

    public function finalize()
    {
        $this->two_factor_user_id = app('phoneVerifier')->register($this->phoneNumber);

        $this->save();

        app('phoneVerifier')->sendToken($this->two_factor_user_id);

        session()->put('age-limit-poll', $this->id);
    }

    public function setChoiceAttribute($choice)
    {
        $this->attributes['choice'] = $choice == 'Agree' ? 1 : 0;
    }

    public static function verifyToken($token)
    {
        $poll = static::findOrFail(session('age-limit-poll'));

        app('phoneVerifier')->tokenIsValid($poll->two_factor_user_id, $token);

        $poll->verified_phone_number = true;
        $poll->save();
        $poll->dropUnverified($poll->phoneNumber);
        $poll->saveIpAddress();
        session()->forget('age-limit-poll');
        cache()->flush();

        return true;
    }

    protected function dropUnverified($phoneNumber)
    {
        return $this->where(compact('phoneNumber'))
                    ->where(['verified_phone_number' => 0])
                    ->delete();
    }

    protected function saveIpAddress()
    {
        $ipDeatils = app('phoneVerifier')->getIpInfo();

        if ($ipDeatils['status'] == 'success') {
            $this->ipDetails ?:
            $this->ipDetails()->create(array_except($ipDeatils, ['status']));
        }
    }

    public function ipDetails()
    {
        return $this->hasOne(PollResultIp::class, 'poll_result_id');
    }

    public static function simplePieChart()
    {
        return cache()->remember('age_limit_results.pie', 1440, function () {
            return static::where(['verified_phone_number' => 1])
                        ->selectRaw('count(*)  as vote_count,choice')
                        ->groupBy('choice')
                        ->get()
                        ->map(function ($result) {
                            $result->choice == 1 ? $name = 'Agree' : $name = 'Disagree';
                            $name == 'Agree' ?
                            $label = 'Bill should not be changed' :
                            $label = 'Bill should be changed';
                            $y = (int) $result->vote_count;

                            return compact('name', 'label', 'y');
                        });
        });
    }

    public static function lineChart()
    {
        return cache()->remember('age_limit_results.line', 1440, function () {
            $data = static::where(['verified_phone_number' => 1])
                        ->selectRaw('count(*)  as vote_count,created_at,choice as choice')
                        ->groupBy('created_at', 'choice')
                        ->get();

            $series = $data->groupBy('choice')->map(function ($results, $choice) {
                return [
                    'name' => $choice == 1 ? 'Agree' : 'Disagree',
                    'data' => $results->pluck('vote_count'),
                ];
            });

            return collect([
                'categories' => $data->pluck('created_at')->map(function ($tz) {
                    return $tz->format('d-M-Y');
                }),
                'series' => $series,
                'data' => $data,
                'yAxisLabel' => 'Number Of Votes',
            ]);
        });
    }

    public function setCreatedAt($created_at)
    {
        $this->attributes['created_at'] = $created_at->startOfDay();
    }

    public function groupedByVerification()
    {
        return cache()->remember('groupedByVerification', 1440, function () {
            return $this->latest('updated_at')
                        ->get()
                        ->groupBy('verified_phone_number');
        });
    }
}
