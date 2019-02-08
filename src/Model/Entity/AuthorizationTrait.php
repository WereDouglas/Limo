<?php
/**
 * Created by PhpStorm.
 * User: Douglas
 * Date: 1/15/2019
 * Time: 7:42 PM
 */

namespace App\Model\Entity;


trait AuthorizationTrait
{
    public function isViewableBy(User $user)
    {
        return $this->user_id === $user->id;
    }

    public function isCreatableBy(User $user)
    {

    }

    public function isEditableBy(User $user)
    {

    }

    public function isDeletableBy(User $user)
    {

    }
}
