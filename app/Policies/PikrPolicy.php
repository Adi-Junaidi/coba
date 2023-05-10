<?php

namespace App\Policies;

use App\Models\Pikr;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PikrPolicy
{
  use HandlesAuthorization;

  /**
   * Determine whether the user can view any models.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function viewAny(User $user)
  {
    return $user->isAdmin();
  }

  /**
   * Determine whether the user can view the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pikr  $pikr
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function view(User $user, Pikr $pikr)
  {
    //
  }

  /**
   * Determine whether the user can create models.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function create(User $user)
  {
    //
  }

  /**
   * Determine whether the user can update the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pikr  $pikr
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function update(User $user, Pikr $pikr)
  {
    //
  }

  /**
   * Determine whether the user can verify the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pikr  $pikr
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function verify(User $user, Pikr $pikr)
  {
    return $user->isPembina() && $user->pembina->desa->kecamatan->id === $pikr->desa->kecamatan->id;
  }

  public function verifyPikr(User $user, Pikr $pikr)
  {
    if ($pikr->pembina == null) {
      return false;
    }
    return $user->isPembina() && $user->pembina->id === $pikr->pembina->id;
  }

  /**
   * Determine whether the user can delete the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pikr  $pikr
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function delete(User $user, Pikr $pikr)
  {
    //
  }

  /**
   * Determine whether the user can restore the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pikr  $pikr
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function restore(User $user, Pikr $pikr)
  {
    //
  }

  /**
   * Determine whether the user can permanently delete the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pikr  $pikr
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function forceDelete(User $user, Pikr $pikr)
  {
    //
  }
}
