<?php
/**
 * Copyright (c) 2020. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

namespace common\validators;

use Yii;
use yii\validators\Validator;

/**
 * {@inheritdoc}
 */
class MainRoleValidator extends Validator {

    /**
     * {@inheritdoc}
     */
    public function validateAttribute($model, $attribute) {

        if ($model->user_id == Yii::$app->user->id) {
            $model->addError($attribute, 'Нельзя менять роли у самого себя');
        }
    }

}
