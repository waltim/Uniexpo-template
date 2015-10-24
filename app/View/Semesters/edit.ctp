<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <li class="list-group-item"><?php echo $this->Form->postLink(__('Apagar'), array('action' => 'delete', $this->Form->value('Semester.id')), null, __('Tem certeza que deseja apagar este item? %s', $this->Form->value('Semester.id'))); ?></li>
            <li class="list-group-item"><?php echo $this->Html->link(__('Visualizar semestres'), array('action' => 'index')); ?></li>
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
                        <h3 class="box-title">Nova categoria</h3>
                    </div>
                    <?php echo $this->Form->create('Semester', array('type' => 'file', 'inputDefaults' => array('label' => false), 'role' => 'form')); ?>
                    <div class="box-body">

                        <div class="form-group">
                            <?php echo $this->Form->input('id', array('class' => 'form-control', 'type'=> 'hidden')); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $this->Form->label('course_id', 'Curso'); ?>
                            <?php echo $this->Form->input('course_id', array('options'=>$tipos,'class' => 'form-control','required')); ?>
                        </div>
                        <div class="form-group">
                            <?php echo $this->Form->label('Descricao', 'Nome do semestre'); ?>
                            <?php echo $this->Form->input('Descricao', array('class' => 'form-control','required')); ?>
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