<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'order_date'); ?>
		
		<?php echo CHtml::activeTextField($model,'order_date',array("id"=>"order_date")); ?>
		<?php $this->widget('application.extensions.calendar.SCalendar',
        array(
        'inputField'=>'order_date',
        'ifFormat'=>'%Y-%m-%d',
		));
		?>
		
		<?php echo $form->error($model,'order_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'order_status'); ?>
		
		<?php echo $form->dropDownList($model,'order_status',array("Approved"=>"Approved", "Denied"=>"Denied", "Pending"=>"Pending")
		,array('empty'=>'Select Order Status')); ?>
		
		<?php echo $form->error($model,'order_status'); ?>
	</div>

	<div class="row">
	
		<?php echo $form->labelEx($model,'customer_id'); ?>
		
		<?php echo $form->dropDownList($model, 'customer_id', CHtml::listData(
		Customer::model()->findAll(), 'id', 'FullName'),
		array('prompt' => 'Select a Customer Name')
		); ?>
		
		<?php echo $form->error($model,'customer_id'); ?>
	
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->