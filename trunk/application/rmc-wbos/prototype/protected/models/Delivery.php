<?php

/**
 * This is the model class for table "delivery".
 *
 * The followings are the available columns in table 'delivery':
 * @property integer $id
 * @property string $del_add
 * @property string $del_city
 * @property string $del_country
 * @property string $del_zip
 * @property integer $customer_id
 *
 * The followings are the available model relations:
 * @property Customer $customer
 * @property Order[] $orders
 */
class Delivery extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'delivery';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('del_add, del_city, del_country, customer_id', 'required'),
			array('customer_id', 'numerical', 'integerOnly'=>true),
			array('del_add, del_city, del_country', 'length', 'max'=>45),
			array('del_zip', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, del_add, del_city, del_country, del_zip, customer_id', 'safe', 'on'=>'search'),
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
			'orders' => array(self::HAS_MANY, 'Order', 'delivery_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'del_add' => 'Delivery Address',
			'del_city' => 'Delivery City',
			'del_country' => 'Delivery Country',
			'del_zip' => 'Delivery Zip',
			'customer_id' => 'Customer',
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
		$criteria->compare('del_add',$this->del_add,true);
		$criteria->compare('del_city',$this->del_city,true);
		$criteria->compare('del_country',$this->del_country,true);
		$criteria->compare('del_zip',$this->del_zip,true);
		$criteria->compare('customer_id',$this->customer_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Delivery the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getFullAddress()
	{
	   return $this->del_add . ", " . $this->del_city . ", " . $this->del_country . ", " . $this->del_zip;
	}
}
