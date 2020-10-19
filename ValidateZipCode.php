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
class ValidateZipCode extends \yii\validators\RegularExpressionValidator
{
  public $pattern = '/^[0-9]{6}$/';
  public $message = 'Толькло цифры от 0-9. Кол-во 6';

  protected function validateValue($value)
  {
    return parent::validateValue($value);

  }


}
