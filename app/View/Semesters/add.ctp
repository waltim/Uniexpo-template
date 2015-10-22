<div class="content-wrapper">

    <section class="content-header">
        <h1>

        </h1>
    </section>


    <section class="content">
        <div class="row">

            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Novo semestre</h3>
                    </div>
                    <?php echo $this->Form->create('Semester', array('type' => 'file', 'inputDefaults' => array('label' => false), 'role' => 'form')); ?>
                    <div class="box-body">

                                <div class="form-group">
                                    <?php echo $this->Form->label('course_id', 'Curso'); ?>
                                    <?php echo $this->Form->input('course_id', array('options'=>$tipos,'class' => 'form-control')); ?>
                                </div>
                                <div class="form-group">
                                    <?php echo $this->Form->label('Descricao', 'Nome do semestre'); ?>
                                    <?php echo $this->Form->input('Descricao', array('class' => 'form-control')); ?>
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