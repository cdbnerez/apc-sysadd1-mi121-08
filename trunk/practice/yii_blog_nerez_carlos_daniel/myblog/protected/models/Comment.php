<?php

/**
 * This is the model class for table "{{comment}}".
 *
 * The followings are the available columns in table '{{comment}}':
 * @property integer $id
 * @property string $content
 * @property integer $status
 * @property integer $create_time
 * @property string $author
 * @property string $email
 * @property string $url
 * @property integer $post_id
 *
 * The followings are the available model relations:
 * @property Post $post
 */
class Comment extends CActiveRecord
	{

	
	
	public function tableName()
	{
		return '{{comment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		return array(
			array('content, author, email', 'required'),
			array('author, email, url', 'length', 'max'=>128),
			array('email','email'),
			array('url','url'),
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
			'post' => array(self::BELONGS_TO, 'Post', 'post_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'content' => 'Comment',
			'status' => 'Status',
			'create time' => 'Create Time',
			'author' => 'Name',
			'email' => 'Email',
			'url' => 'Website',
			'post id' => 'Post',
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
		$criteria->compare('content',$this->content,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('create_time',$this->create_time);
		$criteria->compare('author',$this->author,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('post_id',$this->post_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			$this->create_time=time();
			return true;
		}
		else
		return false;
	}
	
	protected function newComment($post)
	{
		$comment=new Comment;
		
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($comment);
			Yii::app()->end();
		}

		if(isset($_POST['Comment']))
		{
			$comment->attributes=$_POST['Comment'];
			
			if($post->addComment($comment))
			{
				if($comment->status==Comment::STATUS_PENDING)
					Yii::app()->user->setFlash('commentSubmitted','Thank you for your comment. Your comment will be posted');
					$this->refresh();
			}
		}
		return $comment;
	}
	
	const STATUS_PENDING=1;
	const STATUS_APPROVED=2;
	
	public function approve()
	{
		$this->status=Comment::STATUS_APPROVED;
		$this->update(array('status'));
	}
	
	public function findRecentComments($limit=10)
	{
		return $this->with('post')->findAll(array(
			'condition'=>'t.status='.self::STATUS_APPROVED,
			'order'=>'t.create_time DESC',
			'limit'=>$limit,
		));
	}
	
}
//new approve