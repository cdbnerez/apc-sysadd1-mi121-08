<?php

/**
 * This is the model class for table "customer".
 *
 * The followings are the available columns in table 'customer':
 * @property integer $id
 * @property string $cus_type
 * @property string $cus_company
 * @property string $cus_fname
 * @property string $cus_lname
 * @property string $cus_user_name
 * @property string $cus_user_passwd
 * @property string $cus_contact_num
 *
 * The followings are the available model relations:
 * @property Delivery[] $deliveries
 * @property Order[] $orders
 */
class Customer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customer';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cus_type, cus_fname, cus_lname, cus_user_name, cus_user_passwd, cus_contact_num', 'required'),
			array('cus_type, cus_company, cus_fname, cus_lname, cus_user_name, cus_user_passwd, cus_contact_num', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cus_type, cus_company, cus_fname, cus_lname, cus_user_name, cus_user_passwd, cus_contact_num', 'safe', 'on'=>'search'),
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
			'deliveries' => array(self::HAS_MANY, 'Delivery', 'customer_id'),
			'orders' => array(self::HAS_MANY, 'Order', 'customer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cus_type' => 'Cus Type',
			'cus_company' => 'Cus Company',
			'cus_fname' => 'Cus Fname',
			'cus_lname' => 'Cus Lname',
			'cus_user_name' => 'Cus User Name',
			'cus_user_passwd' => 'Cus User Passwd',
			'cus_contact_num' => 'Cus Contact Num',
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
		$criteria->compare('cus_type',$this->cus_type,true);
		$criteria->compare('cus_company',$this->cus_company,true);
		$criteria->compare('cus_fname',$this->cus_fname,true);
		$criteria->compare('cus_lname',$this->cus_lname,true);
		$criteria->compare('cus_user_name',$this->cus_user_name,true);
		$criteria->compare('cus_user_passwd',$this->cus_user_passwd,true);
		$criteria->compare('cus_contact_num',$this->cus_contact_num,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Customer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function getFullName()
	{
    
	   return $this->cus_lname . ", " . $this->cus_fname;
	
	}
}
