<?php
    $this->assign('title', $title);

    function isValid($valid_to){
        $today = strtotime('today');
        if($valid_to > $today){
            return "<span class='badge badge-success'>Activa</span>";
        } else {
            return "<span class='badge badge-danger'>Inactiva/Adeuda</span>";
        }
    }

?>
<?= $this->Html->link(__('Tipos de Membresías'), ['controller' => 'MembershipTypes', 'action' => 'index'], ['class' => 'button btn-primary btn-sm float-right']) ?>
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
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Valida Hasta</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($memberships as $membership): ?>
                <tr>
                    <td><?= $membership->user->name." ".$membership->user->surname ?></td>
                    <td><?= $membership->membership_type->name ?></td>
                    <td><?= date('d/m/Y',strtotime($membership->valid_to)) ?></td>
                    <td><?= isValid(strtotime($membership->valid_to)); ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $membership->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $membership->id], ['confirm' => __('Are you sure you want to delete # {0}?', $membership->id)]) ?>
                    </td>
                </tr>            
                <?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </div>
</div>