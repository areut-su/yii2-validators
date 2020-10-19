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
class ValidateOnlyEnglish extends \yii\validators\RegularExpressionValidator
{
  public $pattern = '/[A-z0-9.\-._ ]{1,14}/';
  public $message = 'Только Английсике символы';

  protected function validateValue($value)
  {
    return parent::validateValue($value);

  }

}
