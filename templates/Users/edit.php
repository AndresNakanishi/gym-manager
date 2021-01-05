<?php
    $this->assign('title', $title);
?>
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $title ?></h1>
    <hr>

    <div class="panel panel-default mb-5">
        <div class="panel-body">
            <div class="col-lg-6 col-sm-6">
                <?= $this->Form->create($user) ?>
                    <div class="form-group">
                        <?= $this->Form->control('name', [
                            'class' => 'form-control',
                            'label' => [
                                'class' => 'control-label',
                                'text' => 'Nombre: (Requerido)',
                            ],
                            'required',
                            'placeholder' => 'Escribe el nombre del cliente',
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('surname', [
                            'class' => 'form-control',
                            'label' => [
                                'class' => 'control-label',
                                'text' => 'Apellido: (Requerido)',
                            ],
                            'required',
                            'placeholder' => 'Escribe el apellido del cliente',
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('dni', [
                            'class' => 'form-control',
                            'label' => [
                                'class' => 'control-label',
                                'text' => 'DNI: (Requerido)',
                            ],
                            'required',
                            'placeholder' => 'Escribe el DNI del cliente',
                            'max' => 11
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('birthday', [
                            'class' => 'form-control',
                            'type' => 'date',
                            'label' => [
                                'class' => 'control-label',
                                'text' => 'Cumpleaños: (Requerido)',
                            ],
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('address', [
                            'class' => 'form-control',
                            'label' => [
                                'class' => 'control-label',
                                'text' => 'Dirección:',
                            ],
                            'placeholder' => 'Escribe la dirección del cliente',
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('mail', [
                            'class' => 'form-control',
                            'type' => 'email',
                            'label' => [
                                'class' => 'control-label',
                                'text' => 'E-mail:',
                            ],
                            'placeholder' => 'Escribe el mail del cliente',
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('cellphone', [
                            'class' => 'form-control',
                            'label' => [
                                'class' => 'control-label',
                                'text' => 'Celular:',
                            ],
                            'placeholder' => 'Escribe el celular del cliente',
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('contact', [
                            'class' => 'form-control',
                            'label' => [
                                'class' => 'control-label',
                                'text' => 'Teléfono de Contacto:',
                            ],
                            'placeholder' => 'Escribe un contacto del cliente',
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('nationality', [
                            'class' => 'form-control',
                            'label' => [
                                'class' => 'control-label',
                                'text' => 'Nacionalidad:',
                            ],
                            'placeholder' => 'Escribe la nacionalidad del cliente',
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('occupation', [
                            'class' => 'form-control',
                            'label' => [
                                'class' => 'control-label',
                                'text' => 'Trabajo:',
                            ],
                            'placeholder' => 'Escribe el trabajo del cliente',
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('profile_id', [
                            'options' => $profiles,
                            'class' => 'form-control',
                            'label' => [
                                'class' => 'control-label',
                                'text' => 'Tipo de membresía: (Requerido)',
                            ],
                            'required'
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('sex_id', [
                            'options' => $sex,
                            'empty' => true,
                            'class' => 'form-control',
                            'label' => [
                                'class' => 'control-label',
                                'text' => 'Sexo:',
                            ],
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('blood_type_id', [
                            'options' => $bloodType,
                            'empty' => true,
                            'class' => 'form-control',
                            'label' => [
                                'class' => 'control-label',
                                'text' => 'Tipo Sanguíneo:',
                            ],
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('civil_status_id', [
                            'options' => $civilStatus,
                            'empty' => true,
                            'class' => 'form-control',
                            'label' => [
                                'class' => 'control-label',
                                'text' => 'Estado Civil:',
                            ],
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <label>Fumador: </label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="smoker" id="smoker1" value="1" <?= $user->smoker == 1 ? 'checked' : '' ?>> Si
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="smoker" id="smoker2" value="0" <?= $user->smoker == 0 ? 'checked' : '' ?>> No
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('cigarretes_per_day', [
                            'class' => 'form-control',
                            'typé' => 'numbers',
                            'label' => [
                                'class' => 'control-label',
                                'text' => 'Cigarrillos por día:',
                            ],
                            'placeholder' => 'Cantidad de cigarrillos que fuma el cliente por día',
                            'max' => 99
                        ]) ?>
                    </div>
                    <div class="form-group">
                        <label>Diabético: </label>
                        <div class="radio">
                            <label>
                                <input type="radio" name="diabetic" id="diabetic1" value="1" <?= $user->diabetic == 1 ? 'checked' : '' ?>> Si
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="diabetic" id="diabetic2" value="0" <?= $user->diabetic == 0 ? 'checked' : '' ?>> No
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <?= $this->Form->control('note', [
                            'class' => 'form-control',
                            'label' => [
                                'class' => 'control-label',
                                'text' => 'Observaciones:',
                            ],
                            'placeholder' => 'Observaciones...',
                        ]) ?>
                    </div>
                    <div class="d-flex">
                        <?= $this->Html->link(__('Volver'), ['action' => 'index'], ['class' => "btn btn-default text-primary"]) ?>
                        <?= $this->Form->submit('Guardar', ['class' => "btn btn-primary"]) ?>
                    </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <!-- /.panel-body -->
    </div>