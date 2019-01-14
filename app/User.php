<?php

namespace App;

use App\Notifications\ResetPassword;
use Cog\Laravel\Ban\Traits\Bannable;
use HighIdeas\UsersOnline\Traits\UsersOnlineTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;
use willvincent\Rateable\Rateable;

class User extends Authenticatable implements BannableContract
{
    use Notifiable, UsersOnlineTrait, Bannable, HasApiTokens, Rateable;

    /** @var array $fillable */
    protected $fillable = [
        'name', 'email', 'password', 'role_id', 'info'
    ];

    /** @var array $hidden */
    protected $hidden = [
        'password', 'remember_token', 'role_id', 'info',
        'stripe_id', 'trial_ends_at'
    ];

    /** @var array $casts */
    protected $casts = [
        'info' => 'collection'
    ];

    /** @var array $appends */
    protected $appends = [
        'profile_pic', 'country', 'uid'
    ];

    /**
     * @project VirtualClinic
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * @project VirtualClinic
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsToMany
     */
    public function specialities()
    {
        return $this->belongsToMany(Speciality::class);
    }

    /**
     * @project VirtualClinic - Jan/2019
     *
     * @return mixed
     */
    public function conversations()
    {
        return Conversation::where(function ($query) {
            $query->where('user_two', auth()->id())
                ->orWhere('user_one', auth()->id());
        })->get();
    }

    /**
     * @project VirtualClinic - Jan/2019
     *
     * @param $user
     * @return bool
     */
    public function conversationsWith($user)
    {
        if (is_numeric($user)) $user = User::find($user);

        $conversation = Conversation::where(function ($query) use ($user) {
            $query->where(
                function ($q) use ($user) {
                    $q->where('user_one', $user->getKey())
                        ->where('user_two', auth()->id());
                }
            )->orWhere(
                function ($q) use ($user) {
                    $q->where('user_one', auth()->id())
                        ->where('user_two', $user->getKey());
                }
            );
        })->first();

        if (! $conversation)
            $conversation = Conversation::create([
                'user_one' => auth()->id(),
                'user_two' => $user->getKey()
            ]);

        return $conversation;
    }

    /**
     * @project VirtualClinic - Oct/2018
     *
     * @param string $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * @project VirtualClinic
     *
     * @param $role
     * @return Boolean
     */
    public function hasRole($role)
    {
        if (!$role instanceof Role) {
            if (!is_numeric($role))
                $role = Role::where('name', $role)->first();
            else
                $role = Role::find($role);
        }

        return $this->role->is($role);
    }

    /**
     * @project VirtualClinic
     *
     * @param $roles
     * @return bool
     */
    public function hasRoles($roles)
    {
        foreach ($roles as $role) {
            if ($this->hasRole($role))
                return true;
        }

        return false;
    }

    /**
     * @project VirtualClinic - Oct/2018
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    /**
     * @project VirtualClinic - Oct/2018
     *
     * @return bool
     */
    public function isDoctor()
    {
        return $this->hasRole('doctor');
    }

    /**
     * @project VirtualClinic - Oct/2018
     *
     * @return bool
     */
    public function isMember()
    {
        return $this->hasRole('member');
    }

    /**
     * @return string
     */
    public function getUidAttribute()
    {
        return str_pad($this->id, 4, '0', STR_PAD_LEFT);
    }

    /**
     * @return string
     */
    public function getProfilePicAttribute()
    {
        $img = $this->info->get('profile_pic', 'assets/layout/img/avatar.png');
        return asset($img . '?' . filectime($img));
    }

    /**
     * @return string
     */
    public function getPhoneAttribute()
    {
        if ($this->info->has('phone')) {
            $arr = $this->info->get('phone', ['country' => '', 'number' => '']);

            return '+' . $arr['country'] . $arr['number'];
        }

        return false;
    }

    /**
     * @project VirtualClinic - Jan/2019
     *
     * @return bool|string
     */
    public function getCountryAttribute()
    {
        if ($this->info->has('country'))
            return asset('assets/global/img/flags/' . $this->info->get('country', 'EG') . '.png');

        return false;
    }

    /**
     * @project VirtualClinic - Nov/2018
     *
     * @param $key
     * @param $value
     * @return void
     */
    public function updateValue($key, $value)
    {
        $this->update([
            'info' => $this->info->put($key, $value)
        ]);
    }

    /**
     * @project VirtualClinic - Nov/2018
     *
     * @param $values
     * @return void
     */
    public function updateValues($values)
    {
        $this->update([
            'info' => $this->info->merge($values)
        ]);
    }
}
