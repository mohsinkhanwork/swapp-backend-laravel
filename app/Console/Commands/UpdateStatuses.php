<?php

namespace App\Console\Commands;

use App\Enums\AdStatus;
use App\Enums\UserStatus;
use App\Models\Advertisement;
use App\Models\User;
use App\Notifications\AdStatusNotification;
use App\Notifications\UserAccountStatusNotification;
use Illuminate\Console\Command;

class UpdateStatuses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-statuses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update status of database tables which we scheduled for future date';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // make hold account user status to active
        $users=User::whereDate('banned_until','<',now()->format('y-m-d'))->whereStatus(UserStatus::HOLD)->get();
        foreach($users as $user){
            $user->status=UserStatus::ACTIVE;
            $user->save();
            $user->notify(new UserAccountStatusNotification('Account Restored','Your account is activated. please make sure to follow platform guidlines. Explore a world of endless learning possibilities.'));
        }


        // make status completed if advertisement reaches expiry
        $ads=Advertisement::whereDate('ends_on','<',now()->format('y-m-d'))->where('status','!=',AdStatus::COMPLETED)->get();
        foreach($ads as $ad){
            $ad->status=AdStatus::COMPLETED;
            $ad->save();
            $ad->advertiser->notify(new AdStatusNotification('Advertisement Expired','Your Advertisement is expired. Post new ad now to get more leads.'));
        }
    }
}
