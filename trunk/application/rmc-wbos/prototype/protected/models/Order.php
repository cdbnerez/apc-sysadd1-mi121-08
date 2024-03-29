<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property integer $id
 * @property string $order_date
 * @property string $order_status
 * @property integer $customer_id
 *
 * The followings are the available model relations:
 * @property Delivery[] $deliveries
 * @property Customer $customer
 * @property OrderList[] $orderLists
 * @property PaymentMethod[] $paymentMethods
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
			array('order_date, order_status, customer_id', 'required'),
			array('customer_id', 'numerical', 'integerOnly'=>true),
			array('order_total', 'length', 'max'=>10),
			array('order_status', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, order_date, order_total, order_status, customer_id', 'safe', 'on'=>'search'),
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
			'deliveries' => array(self::HAS_MANY, 'Delivery', 'order_id'),
			'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),
			'orderLists' => array(self::HAS_MANY, 'OrderList', 'order_id'),
			'paymentMethods' => array(self::HAS_MANY, 'PaymentMethod', 'order_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Order ID#',
			'order_date' => 'Order Date',
			'order_status' => 'Order Status',
			'customer_id' => 'Customer Name',
			'order_total' => 'Order Total Amount',
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
		$criteria->compare('order_status',$this->order_status,true);
		//$criteria->compare('customer_id',$this->customer_id);
		
        $criteria->compare('t.id',$this->id);
        $criteria->compare('customer.cus_lname',$this->customer_id, true);
		
		$criteria->compare('t.id',$this->id);
        $criteria->compare('customer.cus_fname',$this->customer_id, true);
        
		$criteria->with=array('customer');
        
		$criteria->compare('order_total',$this->order_total,true);

		
		
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
