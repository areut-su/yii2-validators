<?php
/**
 * Copyright (c) 2020. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

namespace common\validators;


/**
 * {@inheritdoc}
 */
class ValidateBik extends \yii\validators\RegularExpressionValidator
{
  public $pattern = '/^04[0-9]{7}$/';
  public $message = 'Кол-во цифр должно быть 9. Шаблон: 04XXXXXXX';

  protected function validateValue($value)
  {
    if (strlen($value) === 9) {
      return parent::validateValue($value);
    }
    return [$this->message, []];
  }
}
