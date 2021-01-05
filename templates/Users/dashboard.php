<?php
    $this->assign('title', $title);
?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
<hr>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Clientes en el establecimiento</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Horario de Entrada</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($checkedInUsers as $checkedInUser): ?>
                <tr>
                    <td><?= $checkedInUser->name ." ". $checkedInUser->surname ?></td>
                    <td><?= $checkedInUser->dni ?></td>
                    <td><?= date('H:i', strtotime($checkedInUser->assistance[0]->checkin)) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Ver perfil'), ['action' => 'view', $checkedInUser->id], ['class' => 'badge badge-primary']) ?>
                        <?= $this->Html->link(__('Checkout'), ['action' => 'checkout', $checkedInUser->assistance[0]->id], ['class' => 'badge badge-warning']) ?>
                    </td>
                </tr>            
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Clientes</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Membresía</th>
                    <th>Perfil</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user->name ." ". $user->surname ?></td>
                    <td><?= $user->dni ?></td>
                    <td><span class="badge badge-primary"><?= $user->p['name'] ?></span></td>
                    <td class="actions">
                            <?= $this->Html->link(__('Ver perfil'), ['action' => 'view', $user->id], ['class' => 'badge badge-info']) ?>
                            <?= $this->Html->link(__('Checkin'), ['action' => 'checkin', $user->id], ['class' => 'badge badge-success']) ?>
                    </td>
                </tr>            
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>

<?= $this->Html->script('/js/dashboard.js', ['block' => 'scriptBottom']); ?>