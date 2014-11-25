<?php

/**
 * This is the model class for table "payment_method".
 *
 * The followings are the available columns in table 'payment_method':
 * @property integer $id
 * @property string $payment_type
 * @property string $payment_desc
 * @property string $bank_name
 * @property integer $payment_terms
 * @property integer $payment_per_month
 * @property integer $payment_discount
 * @property string $payment_total_amount
 * @property integer $order_id
 *
 * The followings are the available model relations:
 * @property Order $order
 */
class PaymentMethod extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'payment_method';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('payment_type, payment_desc, bank_name, payment_terms, payment_discount, order_id', 'required'),
			array('payment_terms, payment_per_month, payment_discount, order_id', 'numerical', 'integerOnly'=>true),
			array('payment_type', 'length', 'max'=>10),
			array('payment_desc, bank_name', 'length', 'max'=>45),
			array('payment_total_amount', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, payment_type, payment_desc, bank_name, payment_terms, payment_per_month, payment_discount, payment_total_amount, order_id', 'safe', 'on'=>'search'),
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
			'order' => array(self::BELONGS_TO, 'Order', 'order_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'payment_type' => 'Payment Type',
			'payment_desc' => 'Payment Description',
			'bank_name' => 'Bank Name',
			'payment_terms' => 'Payment Terms',
			'payment_per_month' => 'Payment Per Month',
			'payment_discount' => 'Payment Discount',
			'payment_total_amount' => 'Payment Total Amount',
			'order_id' => 'Order ID#',
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
		$criteria->compare('payment_type',$this->payment_type,true);
		$criteria->compare('payment_desc',$this->payment_desc,true);
		$criteria->compare('bank_name',$this->bank_name,true);
		$criteria->compare('payment_terms',$this->payment_terms);
		$criteria->compare('payment_per_month',$this->payment_per_month);
		$criteria->compare('payment_discount',$this->payment_discount);
		$criteria->compare('payment_total_amount',$this->payment_total_amount,true);
		$criteria->compare('order_id',$this->order_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PaymentMethod the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
