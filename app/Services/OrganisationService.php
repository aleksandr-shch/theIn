<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Filters\OrganisationFilter;
use App\Organisation;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrganisationService
 * @package App\Services
 */
class OrganisationService
{
    /**
     * Create organisation for owner
     * @param User $owner
     * @param array $attributes
     * @return Organisation|Model
     */
    public function createForOwner(User $owner, array $attributes): Organisation
    {
        return $owner->organisations()->create($attributes);
    }

    /**
     * Get all organisations
     * @param OrganisationFilter|null $filter
     * @return Organisation[]|Collection
     */
    public function all(?OrganisationFilter $filter): Collection
    {
        return Organisation::filter($filter)->get();
    }
}
