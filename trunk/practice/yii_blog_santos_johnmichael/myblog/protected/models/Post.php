<?php

/**
 * This is the model class for table "{{post}}".
 *
 * The followings are the available columns in table '{{post}}':
 * @property integer $id
 * @property string $title
 * @property string $content
 * @property string $tags
 * @property integer $status
 * @property integer $create_time
 * @property integer $update_time
 * @property integer $author_id
 *
 * The followings are the available model relations:
 * @property Comment[] $comments
 * @property User $author
 */
class Post extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{post}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'content', 'status', 'required'),
			array('title', 'length', 'max'=>128),
			array('status', 'in', 'range'=>array(1,2,3)),
			array('tags', 'match','pattern'=>'/^[\w\s,]+$/',
			'message'=>'Tags can only contain word characters.'),
			array('tags', 'normalizeTags'),
			array('title', 'status', 'safe', 'on'=>'search'),
			);
	}

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.


	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
	return array(
	'author' => array(self::BELONGS TO, 'User', 'author_id'),
	'comments' => array(self::HAS MANY, 'Comment', 'post_id',
	'condition'=>'comments.status='.Comment::STATUS_APPROVED,
	'order'=>'comments.create time DESC'),
	'commentCount' => array(self::STAT, 'Comment', 'post_id',
	'condition'=>'status='.Comment::STATUS_APPROVED),
	);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'content' => 'Content',
			'tags' => 'Tags',
			'status' => 'Status',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
			'author_id' => 'Author',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('tags',$this->tags,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('update_time',$this->update_time);
		$criteria->compare('author_id',$this->author_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Post the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function normalizeTags($attribute,$params)
	{
	$this->tags=Tag::array2string(array unique(Tag::string2array($this->tags)));
	}
	//where array2string and string2array are new methods we need to deﬁne in the Tag model
	//class:
	public static function string2array($tags)
	{
	return preg split(’/\s*,\s*/’,trim($tags),-1,PREG SPLIT NO EMPTY);
	}
	public static function array2string($tags)
	{
	return implode(’, ’,$tags);
	}

}
