<?php
/**
 * Copyright (c) 2020. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

namespace common\validators;

use backend\forms\ModelClientBase;
use yii\base\Model;
use yii\db\ActiveQuery;
use \yii\db\ActiveRecord;
use yii\validators\Validator;

/**
 * create payment_ids
 * {@inheritdoc}
 */
class FilterConvertToStr extends Validator
{
  /**
   * @var ActiveRecord
   */
  public $classNameFinder;
  public $fieldSearch = 'name';
  public $pk = 'id';
  public $setAttribute = 'payment_ids';

  /**
   * @param ModelClientBase|Model $model
   * @param string $attribute
   * @throws \yii\base\InvalidConfigException
   */
  public function validateAttribute($model, $attribute)
  {
    if (is_a($this->classNameFinder, ActiveRecord::class, true) && $model instanceof ModelClientBase) {
      $q = \Yii::createObject(ActiveQuery::class, [$this->classNameFinder]);
      $result = $q->andWhere(['like', $this->fieldSearch, $model->$attribute])->select($this->pk)->column();
      if (empty($result)) {
        // если не нашло то и отправлть запрос нет смысла
        if (method_exists($model, 'setEnableSendRequest')) {
          $model->setEnableSendRequest(false);
        }
      } else {
        $this->setAttribute = implode(',', $result);
      }
    }
  }
}
