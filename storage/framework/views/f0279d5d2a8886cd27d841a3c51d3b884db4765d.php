<?php $__env->startSection('content'); ?>

<?php if(AUTH::user()->role != 1): ?>
<ul class="nav justify-content-center"> 
    <li class="nav-item">
        <a class="nav-link active" href="<?php echo e(url("alumnes/alta")); ?>">Afegir alumne</a>
    </li>
</ul>
<?php endif; ?>
<div class="row justify-content-center">
    <div class="col-md-9">
        <?php if(session('message')): ?>
        <div class="alert alert-success">
            <?php echo e(session('message')); ?>

        </div>
        <?php endif; ?>
    </div>
    
    <div class="col-md-9">
        <br>
        <form method="POST" action="<?php echo e(url('filtratge/')); ?>">
            <?php echo csrf_field(); ?>
            <br>
            <label for="course">Curs</label>
            <select name="course">
                <option value=""></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option></option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>          
            </select>       
            <br>   
            <label for="class">Classe</label>
            <select name="class">
                <option value=""></option>
                <option value="A">A</option>
                <option value="B">B</option>                  
            </select>       
            <br>   

            <label for="name">Nom</label>
            <input type="text" name="name" value="">       
            <br>

            <label for="surname">Cognom</label>
            <input type="text" name="surname" value="">       
            <br>

            <input type="submit" value="Tramet la consulta">
        </form>
    </div>

    <div class="col-md-10">
        <br>
        <h1 align='center'>Llista d'alumnes</h1>

        <table class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm">NOM</th>
                    <th class="th-sm">COGNOM</th>
                    <th class="th-sm">DNI</th>
                    <th class="th-sm">CURS</th>
                    <th class="th-sm">CLASSE</th>
                    <th class="th-sm">DATA DE NAIXEMENT</th>
                    <th class="th-sm" colspan="3">ACCIONS</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $alumnes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $alumne): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($alumne->name); ?></td>
                    <td><?php echo e($alumne->surname); ?></td>
                    <td><?php echo e($alumne->dni); ?></td>        
                    <td><?php echo e($alumne->course); ?></td>        
                    <td><?php echo e($alumne->class); ?></td>        
                    <td><?php echo e($alumne->dob); ?></td>
                    <?php if(AUTH::user()->role != 1): ?>
                    <td><a href="<?php echo e(url("alumnes/actualitzar",$alumne->id)); ?>">Actualitzar</a></td>
                    <td><a href="<?php echo e(url("alumnes/esborrar",$alumne->id)); ?>">Esborrar</a></td>
                    <?php endif; ?>
                    <td><a href="<?php echo e(url("alumnes/formulari",$alumne->id)); ?>">Notes</a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="row justify-content-center">
            <ul class="pagination">
                <?php echo e($alumnes->links()); ?>

            </ul>
        </div>
    </div>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>