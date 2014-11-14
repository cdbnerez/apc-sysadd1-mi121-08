<?php

/**
 * This is the model class for table "order_list".
 *
 * The followings are the available columns in table 'order_list':
 * @property integer $id
 * @property integer $item_qty
 * @property string $order_list_total_amount
 * @property string $item_order_total
 * @property integer $item_id
 * @property integer $order_id
 *
 * The followings are the available model relations:
 * @property Order $order
 * @property Item $item
 */
class OrderList extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order_list';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('item_qty, item_id, order_id', 'required'),
			array('item_qty, item_id, order_id', 'numerical', 'integerOnly'=>true),
			array('item_order_total', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, item_qty, item_order_total, item_id, order_id', 'safe', 'on'=>'search'),
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
			'item' => array(self::BELONGS_TO, 'Item', 'item_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'item_qty' => 'Item Quantity',
			'item_order_total' => 'Item Order Total',
			'item_id' => 'Item Description',
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
		$criteria->compare('item_qty',$this->item_qty);
		/*$criteria->compare('order_list_total_amount',$this->order_list_total_amount,true);*/
		$criteria->compare('item_order_total',$this->item_order_total,true);
		$criteria->compare('item_id',$this->item_id);
		$criteria->compare('order_id',$this->order_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getTotalAmount()
	{
	   //$this->item->item_price * $this->item_qty
	   return $this->item_qty ;
	   
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OrderList the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
