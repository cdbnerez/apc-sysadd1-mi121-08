<?php

/**
 * This is the model class for table "payment_terms".
 *
 * The followings are the available columns in table 'payment_terms':
 * @property integer $id
 * @property integer $pay_terms
 * @property integer $pay_per_month
 * @property integer $pay_discount
 *
 * The followings are the available model relations:
 * @property PaymentMethod[] $paymentMethods
 */
class PaymentTerms extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payment_terms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pay_terms, pay_per_month, pay_discount', 'required'),
			array('pay_terms, pay_per_month, pay_discount', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pay_terms, pay_per_month, pay_discount', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'paymentMethods' => array(self::HAS_MANY, 'PaymentMethod', 'payment_terms_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'pay_terms' => 'Payment Terms',
			'pay_per_month' => 'Payment Per Month',
			'pay_discount' => 'Payment Discount',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('pay_terms',$this->pay_terms);
		$criteria->compare('pay_per_month',$this->pay_per_month);
		$criteria->compare('pay_discount',$this->pay_discount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PaymentTerms the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
