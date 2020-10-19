<?php
/**
 * Copyright (c) 2020. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

namespace common\validators;

use DateTime;
use Yii;
use yii\validators\Validator;

/**
 * {@inheritdoc}
 */
class ValidateDate extends Validator
{
  public $date_start = false;
  public $date_end = false;


  /**
   * {@inheritdoc}
   */
  public function validateAttribute($model, $attribute)
  {

    $atr = $model->$attribute;
    if ((string)intval($atr) == $atr && $atr < 2147483647) {
      $model->$attribute = intval($atr);
      return;
    }
    $format = 'd.m.Y';
    $date = DateTime::createFromFormat($format, $atr);
    if ($date && $date->format($format) == $atr) {
      if ($this->date_start) {
        $model->$attribute = DateTime::createFromFormat($format . ' H:i:s', $atr . ' 00:00:00')->getTimestamp();
        return;
      }
      if ($this->date_end) {
        $model->$attribute = DateTime::createFromFormat($format . ' H:i:s', $atr . ' 23:59:59')->getTimestamp();
        return;
      }
      $model->$attribute = $date->getTimestamp();
      return;

    }
    $model->addError($attribute, 'error data format support:' . $format . 'or Unix Time');
  }
}
