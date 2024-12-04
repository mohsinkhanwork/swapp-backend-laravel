<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Paddle\Billable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password',
        'avatar',
        'phone',
        'profession_id',
        'bio',
        'status',
        'banned_until',
        'newsletter_subscribed',
        'email_verification_token',
        'email_verified_at',
        'plan_id',
        'two_fa_code',
        'enable_2fa',
        'facebook_link',
        'instagram_link',
        'linkedin_link',
        'timezone',
        'language',
        'country_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'banned_until'=>'date'
    ];

    public function getAvatarAttribute(){
        return $this->attributes['avatar']??asset('assets/images/user.png');
    }
    public function getNameAttribute(){
        return $this->first_name.' '.$this->last_name;
    }

    // relations
    public function skills(){
        return $this->belongsToMany(Skill::class)->withPivot('status')->withTimestamps();
    }
    public function quizTests(){
        return $this->hasMany(QuizTest::class);
    }
    public function swaps(){
        return $this->belongsToMany(Swap::class)->withPivot('skill_id','status','rating','review')->using(SwapUser::class);
    }
    public function swapDetails(){
        return $this->hasMany(SwapUser::class);
    }
    public function chats(){
        return $this->belongsToMany(Chat::class);
    }
    public function socialAccount(){
        return $this->hasOne(SocialAccount::class);
    }
    public function plan(){
        return $this->belongsTo(Plan::class);
    }
    public function forumQuestions(){
        return $this->hasMany(ForumQuestion::class);
    }
    public function supportTickets(){
        return $this->morphMany(SupportTicket::class, 'ticketable');
    }
    public function followers() {
        return $this->belongsToMany(User::class, 'followers','follower_id', 'following_id');
    }
    public function following() {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'following_id');
    }
    public function blockedUsers(){
        return $this->belongsToMany(User::class, 'block_users', 'user_id', 'blocked_user_id')->withTimestamps();
    }
    public function invoices(){
        return $this->morphMany(Invoice::class, 'invoiceable');
    }
    public function profession(){
        return $this->belongsTo(Profession::class);
    }
    public function feeds(){
        return $this->hasMany(Feed::class);
    }
    
    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_user', 'user_id', 'event_id');
    }
}
