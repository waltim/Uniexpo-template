<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cadastro de sociais
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
                        <h3 class="box-title">Novo social</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <?php echo $this->Form->create('Social', array('type' => 'file', 'inputDefaults' => array('label' => false), 'role' => 'form')); ?>
                    <div class="box-body">

                        <div class="form-group">
                            <?php echo $this->Form->input('id', array('class' => 'form-control','type'=>'hidden')); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $this->Form->label('social_type_id', 'Tipo da rede social'); ?>
                            <?php echo $this->Form->input('social_type_id',array('options'=> $novidades,'class' => 'form-control','required')); ?>
                        </div>

                        <div class="form-group">
                            <?php echo $this->Form->label('Link', 'Cole aqui o link do perfil da sua rede social!'); ?>
                            <?php echo $this->Form->input('Link', array('class' => 'form-control','placeholder'=>'ex:https://www.facebook.com/walter.lucas.12','required')); ?>
                        </div>

                        <div class="input text required">
                            <input name="data[Social][Aceito]" type="hidden" id="UserAceito" value="N"/>
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