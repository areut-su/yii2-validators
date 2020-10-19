<?php
/**
 * Copyright (c) 2020. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

namespace common\validators;

use common\models\generated\models\AuthAssignment;
use common\models\generated\models\AuthData;
use common\models\generated\models\AuthRule;
use yii\validators\Validator;

class ChildParentRoleValidator extends Validator
{
  public function validateAttribute($model, $attribute)
  {
    $flagChildRole = false;
    $flagParentRole = false;
    /**
     * @var AuthData $model
     */
    $roles = $model->authAssignments;
//      thasMany(AuthAssignment::class, ['user_id' => $model->user_id]);
    foreach ($roles as $role) {
      if ($role->role_id == AuthRule::ROLE_PARENT) {
        $flagParentRole = true;
      }
      if ($role->role_id == AuthRule::ROLE_CHILD) {
        $flagChildRole = true;
      }
      if ($flagParentRole && $flagChildRole) {
        $model->addError('authAssignment', 'Пользователь не может иметь роли и child и parent');
        $role->addError('role_id', 'Пользователь не может иметь роли и child и parent');
      }
    }
  }
}