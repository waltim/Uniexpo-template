<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <li class="list-group-item"><?php echo $this->Html->link(__('Novo baner'), array('controller' => 'Baners', 'action' => 'add')); ?> </li>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6 center">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="col-md-12 center">
                        <div class="box-header">
                            <h3 class="box-title">Novo baner</h3>
                        </div>
                        <?php echo $this->Form->create('Baner', array('type' => 'file', 'inputDefaults' => array('label' => false), 'role' => 'form')); ?>
                        <div class="box-body">
                            <div class="form-group">
                                <?php echo $this->Form->label('filename', 'Clique aqui e escolha a imagem'); ?>
                                <?php echo $this->Form->input('filename', array('class' => 'form-control', 'type' => 'file', 'accept' => 'image/jpeg', 'required')); ?>
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

                            <div class="form-group">
                                <?php echo $this->Form->label('Link', 'Cole aqui do banner (ex: www.uniexposicao.com.br/Project/View/3).'); ?>
                                <?php echo $this->Form->input('Link', array('class' => 'form-control', 'required')); ?>
                            </div>

                        </div>
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box -->
    </section>
</div>