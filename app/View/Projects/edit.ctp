<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Atualizar informações de projeto
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <?php echo $this->Form->create('Project', array('type' => 'file', 'inputDefaults' => array('label' => false), 'role' => 'form')); ?>

                    <div class="form-group">
                        <?php echo $this->Form->input('id', array('class' => 'form-control', 'type'=> 'hidden')); ?>
                    </div>


                    <div class="form-group">
                        <?php echo $this->Form->input('project_type_id', array('options' => $novidades, 'empty' => '-Selecione o tipo do projeto-','class'=>'form-control','label'=>'Tipo de projetos',
                            'id'=>'ProjectProjectTypeId','name'=>'data[Project][project_type_id]','required')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->input('theme_id', array('options' => $temas, 'empty' => '-Selecione o tema-','class'=>'form-control','label'=>'Temas',
                            'id'=>'ProjectThemeId','name'=>'data[Project][theme_id]','required')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->label('Titulo', 'Titulo do projeto'); ?>
                        <?php echo $this->Form->input('Titulo', array('class' => 'form-control','required')); ?>
                    </div>

                    <div class="form-group">
                        <?php echo $this->Form->label('Descricao', 'Descrição do Projeto'); ?>
                        <?php echo $this->Form->input('Descricao', array('class' => 'form-control','required')); ?>
                    </div>

                    <?php if ($this->Session->read('Auth.User.user_type_id') == 1) : ?>

                        <div class="input text required">
                            <input name="data[Project][Aceito]" type="hidden" id="ProjectAceito" value="S"/>
                        </div>

                    <?php endif; ?>
                    <?php if ($this->Session->read('Auth.User.user_type_id') == 2) : ?>

                        <div class="input text required">
                            <input name="data[Project][Aceito]" type="hidden" id="ProjectAceito" value="N"/>
                        </div>

                    <?php endif; ?>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.box -->
    </section>
</div>