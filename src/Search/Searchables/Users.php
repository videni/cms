<?php

namespace Statamic\Search\Searchables;

use Statamic\Contracts\Auth\User as UserContract;
use Statamic\Facades\User;
use Illuminate\Support\Enumerable;

class Users extends Provider
{
    public static function handle(): string
    {
        return 'users';
    }

    public static function referencePrefix(): string
    {
        return 'user';
    }

    public function provide(): Enumerable
    {
        return User::all()->filter($this->filter())->values();
    }

    public function contains($searchable): bool
    {
        if (! $searchable instanceof UserContract) {
            return false;
        }

        return $this->filter()($searchable);
    }

    public function find(array $ids): Enumerable
    {
        return User::query()->whereIn('id', $ids)->get();
    }
}
