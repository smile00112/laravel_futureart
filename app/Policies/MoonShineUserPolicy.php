<?php

namespace App\Policies;

use MoonShine\Models\MoonShineUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class MoonShineUserPolicy
{
    use HandlesAuthorization;

    public function viewAny(MoonShineUser $user): bool
    {
        return $user->moonshine_user_role_id === 1;
    }

    public function view(MoonShineUser $user, MoonShineUser $moonShineUser): bool
    {
        return $user->moonshine_user_role_id === 1;
    }

    public function create(MoonShineUser $user): bool
    {
        return $user->moonshine_user_role_id === 1;
    }

    public function update(MoonShineUser $user, MoonShineUser $moonShineUser): bool
    {
        return $user->moonshine_user_role_id === 1;
    }

    public function delete(MoonShineUser $user, MoonShineUser $moonShineUser): bool
    {
        return $user->moonshine_user_role_id === 1;
    }

    public function restore(MoonShineUser $user, MoonShineUser $moonShineUser): bool
    {
        return $user->moonshine_user_role_id === 1;
    }

    public function forceDelete(MoonShineUser $user, MoonShineUser $moonShineUser): bool
    {
        return $user->moonshine_user_role_id === 1;
    }

    public function massDelete(MoonShineUser $user): bool
    {
        return $user->moonshine_user_role_id === 1;
    }
}
