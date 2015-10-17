<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <li class="list-group-item"><?php echo $this->Html->link(__('Visualizar foto atual'), array('controller'=> 'Users','action' => 'perfil')); ?></li>
        </h1>
    </section>

    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Adicionar foto do perfil</h3>
                    </div>
                    <?php echo $this->Form->create('UserImage', array('type' => 'file', 'inputDefaults' => array('label' => false), 'role' => 'form')); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <?php echo $this->Form->label('filename', 'Selecione uma imagem do tipo(.jpg) e de tamanho maximo 2MB.'); ?>
                                <?php echo $this->Form->input('filename', array('class' => 'form-control', 'type' => 'file','accept'=>'image/jpeg')); ?>
                            </div>
                            <!-- .form-group -->

                            <div class="form-group">
                                <?php echo $this->Form->input('dir', array('class' => 'form-control', 'type' => 'hidden')); ?>
                            </div>
                            <!-- .form-group -->

                            <div class="form-group">
                                <?php echo $this->Form->input('filesize', array('class' => 'form-control', 'type' => 'hidden')); ?>
                            </div>
                            <!-- .form-group -->

                            <div class="form-group">
                                <?php echo $this->Form->input('mimetype', array('class' => 'form-control', 'type' => 'hidden')); ?>
                            </div>

                            <?php if ($this->Session->read('Auth.User.user_type_id') == 1) : ?>

                                <div class="input text required">
                                    <input name="data[UserImage][Aceito]" type="hidden" id="UserImageAceito" value="S"/>
                                </div>

                            <?php endif; ?>
                            <?php if ($this->Session->read('Auth.User.user_type_id') == 2) : ?>

                                <div class="input text required">
                                    <input name="data[UserImage][Aceito]" type="hidden" id="UserImageAceito" value="N"/>
                                </div>
                            <?php endif; ?>

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.box -->
    </section>
</div>