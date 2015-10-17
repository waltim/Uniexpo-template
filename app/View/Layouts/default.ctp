<?php if ($this->params['controller'] === 'users'&& $this->params['action'] === 'login'): ?>
    <?php echo $this->Element('login'); ?>
<?php endif; ?>
<?php if ($this->params['controller'] === 'Users' && $this->params['action'] === 'add' || $this->params['controller'] === 'Users' && $this->params['action'] === 'edit'): ?>
    <?php echo $this->Element('login'); ?>
<?php endif; ?>
<?php if ($this->params['controller'] === 'Users' && $this->params['action'] === 'perfil' || $this->params['controller'] === 'Users' && $this->params['action'] === 'index'): ?>
    <?php echo $this->Element('navigation'); ?>
<?php endif; ?>
<?php if ($this->params['controller'] === 'Users' && $this->params['action'] === 'view'): ?>
    <?php echo $this->Element('navigation'); ?>
<?php endif; ?>
<?php if ($this->params['controller'] === 'Resumes' && $this->params['action'] === 'index'): ?>
    <?php echo $this->Element('navigation'); ?>
<?php endif; ?>
<?php if ($this->params['controller'] === 'Resumes' && $this->params['action'] === 'add'): ?>
    <?php echo $this->Element('navigation'); ?>
<?php endif; ?>
<?php if ($this->params['controller'] === 'Resumes' && $this->params['action'] === 'edit'): ?>
    <?php echo $this->Element('navigation'); ?>
<?php endif; ?>
<?php if ($this->params['controller'] === 'Projects' && $this->params['action'] === 'add' || $this->params['controller'] === 'Projects' && $this->params['action'] === 'index'
|| $this->params['controller'] === 'Projects' && $this->params['action'] === 'edit' || $this->params['controller'] === 'Projects' && $this->params['action'] === 'view'): ?>
<?php echo $this->Element('navigation'); ?>
<?php endif; ?>
    <div class="container">
<?php echo $this->Session->flash(); ?>

<?php echo $this->fetch('content'); ?>
    </div>
<?php if ($this->params['controller'] === 'Users' && $this->params['action'] === 'perfil' || $this->params['controller'] === 'Users' && $this->params['action'] === 'index'): ?>
    <?php echo $this->Element('footer'); ?>
<?php endif; ?>
<?php if ($this->params['controller'] === 'Users' && $this->params['action'] === 'view'): ?>
    <?php echo $this->Element('footer'); ?>
<?php endif; ?>
<?php if ($this->params['controller'] === 'Resumes' && $this->params['action'] === 'index'): ?>
    <?php echo $this->Element('footer'); ?>
<?php endif; ?>
<?php if ($this->params['controller'] === 'Resumes' && $this->params['action'] === 'add'): ?>
    <?php echo $this->Element('footer'); ?>
<?php endif; ?>
<?php if ($this->params['controller'] === 'Resumes' && $this->params['action'] === 'edit'): ?>
    <?php echo $this->Element('footer'); ?>
<?php endif; ?>

<?php if ($this->params['controller'] === 'users' && $this->params['action'] === 'login'): ?>
    <?php echo $this->Element('footer-login'); ?>
<?php endif; ?>
<?php if ($this->params['controller'] === 'Users' && $this->params['action'] === 'add' || $this->params['controller'] === 'Users' && $this->params['action'] === 'edit'): ?>
    <?php echo $this->Element('footer-login'); ?>
<?php endif; ?>
<?php if ($this->params['controller'] === 'Projects' && $this->params['action'] === 'add' || $this->params['controller'] === 'Projects' && $this->params['action'] === 'index'
    || $this->params['controller'] === 'Projects' && $this->params['action'] === 'edit' || $this->params['controller'] === 'Projects' && $this->params['action'] === 'view'): ?>
    <?php echo $this->Element('footer'); ?>
<?php endif; ?>
