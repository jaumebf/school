<?php $__env->startSection('content'); ?>
<ul class="nav justify-content-center"> 
    <li class="nav-item">
        <a class="nav-link active" href="<?php echo e(url("alumnes/llistat")); ?>">Llistar alumnes</a>
    </li>
</ul>

<div class="row justify-content-center">
    <div class="col-md-4">
        <br>
        <h1 align='center'>Afegir alumne</h1>
        <br>
    </div>

    <div class="col-md-10">
        <form method="POST" action="<?php echo e(url('alumnes/afegir')); ?>">
            <?php echo csrf_field(); ?>

            <div class="form-group <?php echo e($errors->has('nom') ? 'is-invalid' : ''); ?>" name="nom">
                <label for="nom" class="col-sm-2 col-form-label col-form-label-sm">Nom</label>               
                <input type="text" name="nom" value="<?php echo e(old('nom')); ?>" class="form-control">                 
                <?php if($errors->has('nom')): ?>                  
                <strong><?php echo e($errors->first('nom')); ?></strong>                  
                <?php endif; ?>    
            </div>

            <div class="form-group <?php echo e($errors->has('cognom') ? 'is-invalid' : ''); ?>" name="cognom">
                <label for="cognom" class="col-sm-2 col-form-label col-form-label-sm">Cognom</label>               
                <input type="text" name="cognom" value="<?php echo e(old('cognom')); ?>" class="form-control">                 
                <?php if($errors->has('cognom')): ?>                  
                <strong><?php echo e($errors->first('cognom')); ?></strong>                  
                <?php endif; ?>    
            </div>

            <div class="form-group <?php echo e($errors->has('dni') ? 'is-invalid' : ''); ?>" name="dni">
                <label for="dni" class="col-sm-2 col-form-label col-form-label-sm">DNI</label>               
                <input type="text" name="dni" value="<?php echo e(old('dni')); ?>" class="form-control">                 
                <?php if($errors->has('dni')): ?>                  
                <strong><?php echo e($errors->first('dni')); ?></strong>                  
                <?php endif; ?>    
            </div>

            <div class="form-group <?php echo e($errors->has('curs') ? 'is-invalid' : ''); ?>" name="curs">
                <label for="curs" class="col-sm-2 col-form-label col-form-label-sm">Curs</label>               
                <input type="number" name="curs" value="<?php echo e(old('curs')); ?>" class="form-control">                 
                <?php if($errors->has('curs')): ?>                  
                <strong><?php echo e($errors->first('curs')); ?></strong>                  
                <?php endif; ?>    
            </div>
            
            <?php
                $class = ["A","B"];
            ?>
            <div class="form-group" name="classe">
                <label for="classe" class="col-sm-2 col-form-label col-form-label-sm">Classe</label>
                <select class="form-control" name="classe">
                    <?php for($i=0; $i< sizeof($class); $i++): ?>
                      <option value='<?php echo e($class[$i]); ?>'><?php echo e($class[$i]); ?></option>
                    <?php endfor; ?>
                </select>
            </div>

            <div class="form-group <?php echo e($errors->has('dob') ? 'is-invalid' : ''); ?>" name="dob">
                <label for="dob" class="col-sm-2 col-form-label col-form-label-sm">Data de naixement</label>               
                <input type="date" name="dob" value="<?php echo e(old('dob')); ?>" class="form-control">                 
                <?php if($errors->has('dob')): ?>                  
                <strong><?php echo e($errors->first('dob')); ?></strong>                  
                <?php endif; ?>    
            </div>
            
            <br>
            <button type="submit" class="btn btn-primary">Afegir alumne</button>
            </fieldset>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>