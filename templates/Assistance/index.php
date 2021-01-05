<?php
    $this->assign('title', $title);
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
<hr>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th>DNI</th>
                    <th>Checkin</th>
                    <th>Checkout</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($assistance as $assist): ?>
                <tr>
                    <td><?= date('d-m-Y', strtotime($assist->day)) ?></td>
                    <td><?= $assist->user->name . ' ' . $assist->user->surname ?></td>
                    <td><?= $assist->user->address ?></td>
                    <td><?= $assist->user->dni ?></td>
                    <td><?= date('H:i', strtotime($assist->checkin)) ?></td>
                    <td><?= date('H:i', strtotime($assist->checkout)) ?></td>
                    <td>                    
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $assist->id],['class' => "btn btn-sm btn-primary"]) ?>
                        <?= $this->Form->postLink(__('Borrar'), ['action' => 'delete', $assist->id], ['confirm' => __('¿Seguro que queres borrar este checkin?', $assist->id), 'class' => "btn btn-sm btn-danger"]) ?>
                    </td>
                </tr>            
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>