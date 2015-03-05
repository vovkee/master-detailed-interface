<?php

use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var $this yii\web\View
 * @var app\models\Client[] $clients
 */
$this->registerJsFile('/js/client.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
$this->title = 'My Mdi';
?>
<div class="site-index">


            <p class="lead">Client list:</p>
            <table class="table table-hover">
                <thead>
                    <td>
                        Name
                    </td>
                </thead>
                <tbody>
                <?php foreach ($clients as $client): ?>
                    <tr class="client" data-id="<?php echo $client->id ?>">
                        <td><?php echo $client->name; ?></td>
                        <td><?php echo Html::a("edit", Url::toRoute(['client/create', 'id' => $client->id]), ['class' => 'btn btn-default']); ?></td>
                        <td><?php echo Html::a("delete", Url::toRoute(['client/delete', 'id' => $client->id]), ['class' => 'btn btn-danger']); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="container description" id="clientPayments"></div>

</div>
