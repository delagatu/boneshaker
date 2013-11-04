<?php if ($bicycleDescription->hasFrame()): ?>
    <div class='grid_5'>
        <span class="boldText">Cadru:</span>
        <?php echo $bicycleDescription->getFrameName(); ?>
    </div>
<?php endif; ?>

<?php if ($bicycleDescription->hasSize()): ?>
<div class='grid_5'>
    <span class="boldText">Marimi:</span>
    <?php echo $bicycleDescription->getSize(); ?>
</div>
<?php endif; ?>

<?php if ($bicycleDescription->hasSpeed()): ?>
<div class='grid_5'>
    <span class="boldText">Viteze:</span>
    <?php echo $bicycleDescription->getSpeed(); ?>
</div>
<?php endif; ?>


<?php if ($bicycleDescription->hasColor()): ?>
<div class='grid_5'>
    <span class="boldText">Culoare:</span>
    <?php echo $bicycleDescription->getColor(); ?>
</div>
<?php endif; ?>


<?php if ($bicycleDescription->hasFork()): ?>
<div class='grid_5'>
    <span class="boldText">Furca:</span>
    <?php echo $bicycleDescription->getFork(); ?>
</div>
<?php endif; ?>

<?php if ($bicycleDescription->hasFrontDerailleur()): ?>
<div class='grid_5'>
    <span class="boldText">Schimbator fata:</span>
    <?php echo $bicycleDescription->getFrontDerailleur(); ?>
</div>
<?php endif; ?>

<?php if ($bicycleDescription->hasRearDerailleur()): ?>
<div class='grid_5'>
    <span class="boldText">Schimbator spate:</span>
    <?php echo $bicycleDescription->getRearDerailleur(); ?>
</div>
<?php endif; ?>

<?php if ($bicycleDescription->hasBreakLever()): ?>
<div class='grid_5'>
    <span class="boldText">Manete frana:</span>
    <?php echo $bicycleDescription->getBreakLever(); ?>
</div>
<?php endif; ?>

<?php if ($bicycleDescription->hasBrakeSystem()): ?>
<div class='grid_5'>
    <span class="boldText">Frana:</span>
    <?php echo $bicycleDescription->getBrakeSystem(); ?>
</div>
<?php endif; ?>

<?php if ($bicycleDescription->hasShifter()): ?>
<div class='grid_5'>
    <span class="boldText">Manete schimbator:</span>
    <?php echo $bicycleDescription->getShifter(); ?>
</div>
<?php endif; ?>

<?php if ($bicycleDescription->hasChainWheel()): ?>
<div class='grid_5'>
    <span class="boldText">Pedalier:</span>
    <?php echo $bicycleDescription->getChainWheel(); ?>
</div>
<?php endif; ?>


<?php if ($bicycleDescription->hasBBSet()): ?>
<div class='grid_5'>
    <span class="boldText">Butuc pedalier:</span>
    <?php echo $bicycleDescription->getBBSet(); ?>
</div>
<?php endif; ?>

<?php if ($bicycleDescription->hasChain()): ?>
<div class='grid_5'>
    <span class="boldText">Lant:</span>
    <?php echo $bicycleDescription->getChain(); ?>
</div>
<?php endif; ?>

<?php if ($bicycleDescription->hasFrontHub()): ?>
<div class='grid_5'>
    <span class="boldText">Butuc fata:</span>
    <?php echo $bicycleDescription->getFrontHub(); ?>
</div>
<?php endif; ?>

<?php if ($bicycleDescription->hasRearHub()): ?>
<div class='grid_5'>
    <span class="boldText">Butuc spate:</span>
    <?php echo $bicycleDescription->getRearHub(); ?>
</div>
<?php endif; ?>

<?php if ($bicycleDescription->hasFrontRim()): ?>
<div class='grid_5'>
    <span class="boldText">Janta fata:</span>
    <?php echo $bicycleDescription->getFrontRim(); ?>
</div>
<?php endif; ?>

<?php if ($bicycleDescription->hasRearRim()): ?>
<div class='grid_5'>
    <span class="boldText">Janta spate:</span>
    <?php echo $bicycleDescription->getRearRim(); ?>
</div>
<?php endif; ?>

<?php if ($bicycleDescription->hasFrontTire()): ?>
<div class='grid_5'>
    <span class="boldText">Anvelopa fata:</span>
    <?php echo $bicycleDescription->getFrontTire(); ?>
</div>
<?php endif; ?>

<?php if ($bicycleDescription->hasRearTire()): ?>
<div class='grid_5'>
    <span class="boldText">Anvelopa spate:</span>
    <?php echo $bicycleDescription->getRearTire(); ?>
</div>
<?php endif; ?>