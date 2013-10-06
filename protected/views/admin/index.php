<?php
/* @var $this AdminController */

$this->pageTitle=Yii::app()->name;
?>

<?php
/* @var $this AdminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	Yii::t('common','Admins'),
);

$this->menu= $this->getIndexMenu();
?>

<h1>欢迎使用<i><?php echo CHtml::encode(Yii::app()->name); ?></i>后台管理系统</h1>

<p></p>

<ul>
	<li>请点击右侧进行相应操作</li>
	<li>需要帮助请点击导航栏->‘联系我们’</li>
</ul>

<!--<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>

<p>For more details on how to further develop this application, please read
the <a href="http://www.yiiframework.com/doc/">documentation</a>.
Feel free to ask in the <a href="http://www.yiiframework.com/forum/">forum</a>,
should you have any questions.</p>-->

