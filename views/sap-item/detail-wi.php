<?php
use yii\widgets\DetailView;
echo DetailView::widget([
		'model' => $model,
		'attributes' => [
				'doc_title',
				'speaker_model',
				'picName',
		],
]); 
?>