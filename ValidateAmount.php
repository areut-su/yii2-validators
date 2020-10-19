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
class ValidateAmount extends \yii\validators\RegularExpressionValidator
{
  public $pattern_negativ = '/^-{0,1}[\d\s]*\.{0,1}[\d]{0,2}$/';
  public $pattern_positiv = '/^[\d\s]*\.{0,1}[\d]{0,2}$/';
  public $enableNegative = true;
  public $message = 'Шаблон для ввода "0000.00"';

  /**
   * @throws \yii\base\InvalidConfigException
   */
  public function init()
  {
    if ($this->enableNegative) {
      $this->pattern = $this->pattern_negativ;
    } else {
      $this->pattern = $this->pattern_positiv;
    }

    parent::init();


  }

  /**
   * @param \yii\base\Model $model
   * @param string $attribute
   * @throws \yii\base\NotSupportedException
   */
  public function validateAttribute($model, $attribute)
  {

    $model->$attribute = str_replace(' ', '', $model->$attribute);
    $val = $model->$attribute;
    $result = $this->validateValue($val);
    if (!empty($result)) {
      $this->addError($model, $attribute, $result[0], $result[1]);
    } else {
      // добавляем формат 00,00
      $model->$attribute = bcadd($val, 0, 2);
    }
  }

}
