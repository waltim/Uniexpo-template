<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Cadastro de curriculum
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-6">
                <!-- general form elements -->
                <div class="box box-primary">
                    <?php echo $this->Form->create('Resume', array('type' => 'file', 'inputDefaults' => array('label' => false), 'role' => 'form')); ?>
                    <div class="box-body">

                        <div class="form-group">
                            <?php echo $this->Form->input('id', array('class' => 'form-control')); ?>
                        </div>

                        <div class="form-group">
                            <label for="exampleInputFile">Selecionar curriculum</label>
                            <?php echo $this->Form->input('filename', array('class' => 'form-control', 'type' => 'file','accept'=>'application/pdf','required')); ?>
                            <p class="help-block">Selecione um arquivo de texto com extensão '.pdf'</p>
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
                                <input name="data[Resume][Aceito]" type="hidden" id="UserAceito" value="S"/>
                            </div>
                        <?php endif; ?>
                        <?php if ($this->Session->read('Auth.User.user_type_id') == 2) : ?>

                            <div class="input text required">
                                <input name="data[Resume][Aceito]" type="hidden" id="UserAceito" value="N"/>
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