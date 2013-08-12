<?php $this->beginContent(Rights::module()->appLayout); ?>

<div id="rights" class="container">

	<div id="content">

		<?php if( $this->id!=='install' ): ?>

			<!--<div id="menu">

				<?php //$this->renderPartial('/_menu'); ?>

			</div>-->

		<?php endif; ?>

		<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
			'title' => 'User Access',
			'headerIcon' => 'icon-user',
			// when displaying a table, if we include bootstra-widget-table class
			// the table will be 0-padding to the box
			'htmlOptions' => array('class'=>'inline'),
			'headerButtons' => array(
					array(
						'class' => 'bootstrap.widgets.TbButtonGroup',
						'buttons'=>array(
							array('label'=>'User Akses', 'icon'=>'user', 'url'=>array('/rights/assignment/view')),
							array('label'=>'Permissions', 'icon'=>'fire', 'url'=>array('/rights/authItem/permissions')),
							array('label'=>'Roles', 'icon'=>'exclamation-sign', 'url'=>array('/rights/authItem/roles')),
							array('label'=>'Tasks', 'icon'=>'random', 'url'=>array('/rights/authItem/tasks')),
							array('label'=>'Operations', 'icon'=>'plane', 'url'=>array('/rights/authItem/operations')),
							array('label'=>'Add', 'icon'=>'plus', 'url'=>array('/guru/create')),
						),
					),
				)
			));?>
			<?php $this->renderPartial('/_flash'); ?>
			<?php echo $content; ?>
		<?php $this->endWidget();?>
	</div><!-- content -->

</div>

<?php $this->endContent(); ?>