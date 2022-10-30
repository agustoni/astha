<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "item_a".
 *
 * @property int $id
 * @property string $name
 * @property string $phone
 * @property int $bid
 * @property string $created_at
 */
class ItemA extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'item_a';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'bid', 'created_at'], 'required'],
            [['bid'], 'integer'],
            [['created_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'phone' => 'Phone',
            'bid' => 'Bid',
            'created_at' => 'Created At',
        ];
    }
}
