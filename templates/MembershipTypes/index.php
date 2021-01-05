<?php
    $this->assign('title', $title);
?>
<?= $this->Html->link(__('Agregar Membresía'), ['action' => 'add'], ['class' => 'button btn-primary btn-sm float-right']) ?>
<?= $this->Html->link(__('Volver'), ['controller' => 'Memberships' ,'action' => 'index'], ['class' => 'mr-2 button btn-primary btn-sm float-right']) ?>
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
                    <th>Tipo</th>
                    <th>Valor</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($membershipTypes as $membershipType): ?>
                <tr>
                    <td><?= $membershipType->name ?></td>
                    <td><?= $this->Number->currency($membershipType->amount) ?></td>
                    <td>Cantidad</td>
                    <td class="actions">
                        <?= $this->Html->link(__('Editar'), ['action' => 'edit', $membershipType->id],  ['class' => 'btn btn-sm btn-primary']) ?>
                    </td>
                </tr>            
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>