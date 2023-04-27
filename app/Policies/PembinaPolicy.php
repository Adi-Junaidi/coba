<?php

namespace App\Policies;

use App\Models\Pembina;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PembinaPolicy
{
  use HandlesAuthorization;

  /**
   * Determine whether the user can view all models.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function viewAll(User $user)
  {
    return $user->isAdmin();
  }

  /**
   * Determine whether the user can view any models.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function viewAny(User $user)
  {
    return $user->isPembina();
  }

  /**
   * Determine whether the user can view the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function view(User $user, Pembina $pembina)
  {
    // either the user is Admin or the user itself
    return $user->isAdmin() || $user === $pembina->user;
  }

  /**
   * Determine whether the user can create models.
   *
   * @param  \App\Models\User  $user
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function create(User $user)
  {
    return $user->isAdmin();
  }

  /**
   * Determine whether the user can update the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function update(User $user, Pembina $pembina)
  {
    // either the user is Admin or the user itself
    return $user->isAdmin() || $user === $pembina->user;
  }

  /**
   * Determine whether the user can delete the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function delete(User $user, Pembina $pembina)
  {
    return $user->isAdmin();
  }

  /**
   * Determine whether the user can restore the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function restore(User $user, Pembina $pembina)
  {
    return $user->isAdmin();
  }

  /**
   * Determine whether the user can permanently delete the model.
   *
   * @param  \App\Models\User  $user
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Auth\Access\Response|bool
   */
  public function forceDelete(User $user, Pembina $pembina)
  {
    //
  }
}
