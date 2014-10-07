<?php

/**
 * This is the model class for table "payment_method".
 *
 * The followings are the available columns in table 'payment_method':
 * @property integer $id
 * @property string $payment_type
 * @property string $payment_desc
 * @property string $payment_method
 * @property integer $card_no
 * @property integer $cvc_no
 * @property string $card_type
 * @property string $bank_name
 * @property string $card_expire
 * @property integer $payment_terms_id
 *
 * The followings are the available model relations:
 * @property Order[] $orders
 * @property PaymentTerms $paymentTerms
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
			array('payment_type, payment_desc, bank_name, payment_terms_id', 'required'),
			array('payment_terms_id', 'numerical', 'integerOnly'=>true),
			array('payment_type', 'length', 'max'=>5),
			array('payment_desc, bank_name', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, payment_type, payment_desc, bank_name, payment_terms_id', 'safe', 'on'=>'search'),
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
			'orders' => array(self::HAS_MANY, 'Order', 'payment_method_id'),
			'customer' => array(self::BELONGS_TO, 'Customer', 'customer_id'),

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
			//'payment_method' => 'Payment Method',
			//'card_no' => 'Card No.',
			//'cvc_no' => 'Card Cvc Number',
			//'card_type' => 'Card Type',
			//'card_expire' => 'Card Expiration Date',
			'bank_name' => 'Issuing Bank',
			'payment_terms_id' => 'Payment Terms ID:',
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
		//$criteria->compare('payment_method',$this->payment_method,true);
		//$criteria->compare('card_no',$this->card_no);
		//$criteria->compare('cvc_no',$this->cvc_no);
		//$criteria->compare('card_type',$this->card_type,true);
		$criteria->compare('bank_name',$this->bank_name,true);
		//$criteria->compare('card_expire',$this->card_expire,true);
		$criteria->compare('payment_terms_id',$this->payment_terms_id);

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
	
		public function getPaymentType()
	{
	   return $this->payment_type;
	}
}
