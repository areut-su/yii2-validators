<?php
/**
 * Copyright (c) 2020. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

namespace common\validators;

use common\helpers\HFilter;
use Yii;
use yii\validators\Validator;

/**
 * {@inheritdoc}
 */
class ValidateAccountId extends Validator
{

  /**
   * {@inheritdoc}
   */
  public function validateAttribute($model, $attribute)
  {
    $model->$attribute = trim(ltrim($model->$attribute, '0'));
    if (!preg_match('/[0-9]{21,39}/m', $model->$attribute, $matches)) {
      $model->addError($attribute, 'count digits must be 21-39');
    }

  }
}
