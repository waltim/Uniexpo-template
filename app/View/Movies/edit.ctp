<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <li class="list-group-item"><?php echo $this->Html->link(__('Novo Projeto'), array('controller' => 'Projects', 'action' => 'add')); ?> </li>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Cadastrar vídeos do projeto</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php echo $this->Form->create('Movie', array('type' => 'file', 'inputDefaults' => array('label' => false), 'role' => 'form')); ?>
                    <div class="box-body">

                        <div class="form-group">
                            <?php echo $this->Form->input('id', array('class' => 'form-control','type'=>'hidden')); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $this->Form->label('Link', 'Cole aqui o link do vídeo no youtube(ex: https://www.youtube.com/watch?v=M8J8adOvzu0).'); ?>
                            <?php echo $this->Form->input('Link', array('class' => 'form-control','required')); ?>
                        </div>

                        <div class="input text required">
                            <input name="data[Movie][Aceito]" type="hidden" id="MovieAceito" value="N"/>
                        </div>
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