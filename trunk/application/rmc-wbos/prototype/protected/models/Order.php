<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property integer $id
 * @property string $order_date
 * @property string $order_total
 * @property string $payment_total
 * @property string $order_status
 * @property integer $customer_id
 * @property integer $delivery_id
 * @property integer $payment_method_id
 *
 * The followings are the available model relations:
 * @property Customer $customer
 * @property Delivery $delivery
 * @property PaymentMethod $paymentMethod
 * @property OrderList[] $orderLists
 */
class Order extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_date, order_total, payment_total, order_status, customer_id, delivery_id, payment_method_id', 'required'),
			array('customer_id, delivery_id, payment_method_id', 'numerical', 'integerOnly'=>true),
			array('order_date, order_status', 'length', 'max'=>45),
			array('order_total, payment_total', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, order_date, order_total, payment_total, order_status, customer_id, delivery_id, payment_method_id', 'safe', 'on'=>'search'),
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
			'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
			'delivery' => array(self::BELONGS_TO, 'Delivery', 'delivery_id'),
			'paymentMethod' => array(self::BELONGS_TO, 'PaymentMethod', 'payment_method_id'),
			'orderLists' => array(self::HAS_MANY, 'OrderList', 'order_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_date' => 'Order Date',
			'order_total' => 'Order Total',
			'payment_total' => 'Payment Total',
			'order_status' => 'Order Status',
			'customer_id' => 'Customer Name',
			'delivery_id' => 'Delivery Address',
			'payment_method_id' => 'Payment Method ID',
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
		$criteria->compare('order_date',$this->order_date,true);
		$criteria->compare('order_total',$this->order_total,true);
		$criteria->compare('payment_total',$this->payment_total,true);
		$criteria->compare('order_status',$this->order_status,true);
		
		$criteria->with=array('customer', 'delivery', 'paymentMethod');
		
		$criteria->compare('t.id',$this->id);
    	$criteria->compare('customer.cus_lname',$this->customer_id, true);
		
		$criteria->compare('t.id',$this->id);
    	$criteria->compare('delivery.del_add',$this->delivery_id, true);
		
		$criteria->compare('v.id',$this->id);
    	$criteria->compare('paymentMethod.payment_method',$this->payment_method_id, true);
	
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
