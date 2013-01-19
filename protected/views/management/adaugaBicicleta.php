<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 6/28/12
 * Time: 7:58 PM
 * To change this template use File | Settings | File Templates.
 */

$this->layout = '//layouts/management';

$form = $this->beginWidget('CActiveForm',
    array(
        'id' => 'addBicicleForm',
        'enableClientValidation'=>true,
        'focus' => array($addBicicleForm, 'frame_id'),
        'htmlOptions' => array(
            'enctype' => 'multipart/form-data'
        ),
    ));
?>

<div class="grid_9 form">

<h2 class="center_content">Editeaza detalii bicicleta</h2>

<div class = 'grid_9 boldText'>
    <?php
    if (Yii::app()->user->hasFlash('addBicycleOutCome'))
    {
        echo  Yii::app()->user->getFlash('addBicycleOutCome');
    }
    ?>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'frame_id'); ?>
    </div>
    <div class='grid_4'>
        <?php $frames = CHtml::listData(Frame::getFrames(), 'id', 'name');
        echo Chosen::activeDropDownList($addBicicleForm, 'frame_id', $frames, array('class' => 'addBicicleDropDown long-input', 'empty' => 'Selecteaza'));
        echo $form->error($addBicicleForm, 'frame_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'size_id'); ?>
    </div>
    <div class='grid_4'>
        <?php $sizes = CHtml::listData(BicycleSize::getSize(), 'id', 'size');
        echo Chosen::activeDropDownList($addBicicleForm, 'size_id', $sizes, array('class' => 'addBicicleDropDown long-input', 'empty' => 'Selecteaza'));
        echo $form->error($addBicicleForm, 'size_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'speed_id'); ?>
    </div>
    <div class='grid_4'>
        <?php $speeds = CHtml::listData(Speed::getSpeeds(), 'id', 'name');
        echo Chosen::activeDropDownList($addBicicleForm, 'speed_id', $speeds, array('class' => 'addBicicleDropDown long-input', 'empty' => 'Selecteaza'));
        echo $form->error($addBicicleForm, 'speed_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'color_id'); ?>
    </div>
    <div class='grid_4'>
        <?php $colors = CHtml::listData(Color::getColors(), 'id', 'name');
        echo Chosen::activeDropDownList($addBicicleForm, 'color_id', $colors, array('class' => 'addBicicleDropDown long-input', 'empty' => 'Selecteaza'));
        echo $form->error($addBicicleForm, 'color_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'fork_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  $forks = CHtml::listData(Fork::getForks(), 'id', 'makerAndProduct');
        echo Chosen::activeDropDownList($addBicicleForm, 'fork_id', $forks, array('class' => 'addBicicleDropDown long-input', 'empty' => 'Selecteaza'));
        echo $form->error($addBicicleForm, 'fork_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'derailleur_front_id'); ?>
    </div>
    <div class="grid_4">
        <?php  $derailleurs = CHtml::listData(Derailleur::getDerailleurs(), 'id', 'makerAndProduct');
        echo Chosen::activeDropDownList($addBicicleForm, 'derailleur_front_id', $derailleurs, array('class' => 'addBicicleDropDown long-input', 'empty' => 'Selecteaza'));
        echo $form->error($addBicicleForm, 'derailleur_front_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'derailleur_rear_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  $derailleurs = CHtml::listData(Derailleur::getDerailleurs(), 'id', 'makerAndProduct');
        echo Chosen::activeDropDownList($addBicicleForm, 'derailleur_rear_id', $derailleurs, array('class' => 'addBicicleDropDown long-input', 'empty' => 'Selecteaza'));
        echo $form->error($addBicicleForm, 'derailleur_rear_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'shifter_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  $shifters = CHtml::listData(Shifter::getShifters(), 'id', 'makerAndProduct');
        echo Chosen::activeDropDownList($addBicicleForm, 'shifter_id', $shifters, array('class' => 'addBicicleDropDown long-input', 'empty' => 'Selecteaza'));
        echo $form->error($addBicicleForm, 'shifter_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'brake_lever_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  $brake_levers = CHtml::listData(BrakeLever::getBrakeLevers(), 'id', 'makerAndProduct');
        echo Chosen::activeDropDownList($addBicicleForm, 'brake_lever_id', $brake_levers, array('class' => 'addBicicleDropDown long-input', 'empty' => 'Selecteaza'));
        echo $form->error($addBicicleForm, 'brake_lever_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'brake_system_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  $brake_systems = CHtml::listData(BrakeSystem::getBrakeSystems(), 'id', 'makerAndProduct');
        echo Chosen::activeDropDownList($addBicicleForm, 'brake_system_id', $brake_systems, array('class' => 'addBicicleDropDown long-input', 'empty' => 'Selecteaza'));
        echo $form->error($addBicicleForm, 'brake_system_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'chain_wheel_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  $chain_wheels = CHtml::listData(ChainWheel::getChainWheels(), 'id', 'makerAndProduct');
        echo Chosen::activeDropDownList($addBicicleForm, 'chain_wheel_id', $chain_wheels, array('class' => 'addBicicleDropDown long-input', 'empty' => 'Selecteaza'));
        echo $form->error($addBicicleForm, 'chain_wheel_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'bb_set_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  $bb_sets = CHtml::listData(BbSet::getBbSets(), 'id', 'makerAndProduct');
        echo Chosen::activeDropDownList($addBicicleForm, 'bb_set_id', $bb_sets, array('class' => 'addBicicleDropDown long-input', 'empty' => 'Selecteaza'));
        echo $form->error($addBicicleForm, 'bb_set_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'chain_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  $chains = CHtml::listData(Chain::getChains(), 'id', 'makerAndProduct');
        echo Chosen::activeDropDownList($addBicicleForm, 'chain_id', $chains, array('class' => 'addBicicleDropDown long-input', 'empty' => 'Selecteaza'));
        echo $form->error($addBicicleForm, 'chain_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'front_hub_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  $hubs = CHtml::listData(Hub::getHubs(), 'id', 'makerAndProduct');
        echo Chosen::activeDropDownList($addBicicleForm, 'front_hub_id', $hubs, array('class' => 'addBicicleDropDown long-input', 'empty' => 'Selecteaza'));
        echo $form->error($addBicicleForm, 'front_hub_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'rear_hub_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  $hubs = CHtml::listData(Hub::getHubs(), 'id', 'makerAndProduct');
        echo Chosen::activeDropDownList($addBicicleForm, 'rear_hub_id', $hubs, array('class' => 'addBicicleDropDown long-input', 'empty' => 'Selecteaza'));
        echo $form->error($addBicicleForm, 'rear_hub_id');
        ?>
    </div>
</div>


<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'front_rim_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  $rims = CHtml::listData(Rim::getRims(), 'id', 'makerAndProduct');
        echo Chosen::activeDropDownList($addBicicleForm, 'front_rim_id', $rims, array('class' => 'addBicicleDropDown long-input', 'empty' => 'Selecteaza'));
        echo $form->error($addBicicleForm, 'front_rim_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'rear_rim_id'); ?>
    </div>
    <div class="grid_4">
        <?php  $rims = CHtml::listData(Rim::getRims(), 'id', 'makerAndProduct');
        echo Chosen::activeDropDownList($addBicicleForm, 'rear_rim_id', $rims, array('class' => 'addBicicleDropDown long-input', 'empty' => 'Selecteaza'));
        echo $form->error($addBicicleForm, 'rear_rim_id');
        ?>
    </div>
</div>

<!--<div class='grid_9 padding-5'>-->
<!--    <div class="grid_2">-->
<!--        --><?php //echo CHtml::label('Poze (max 4)', 'addBicycle'); ?>
<!--    </div>-->
<!--    --><?php
//    $this->widget('CMultiFileUpload', array(
//        'model' => $photoUpload,
//        'name' => 'addBicycle',
//        'attribute' => 'files',
//        'accept' => 'jpg|gif',
//        'max' => 4,
//        'denied' => 'Format nesuportat.',
//        'duplicate' => 'Atentie! Duplicat.',
//        'remove' => 'X',
////      'options'=>array(
////          'onFileSelect'=>'function(e, v, m){ window.console.log(m) }',
////          'afterFileSelect'=>'function(e, v, m){ alert("afterFileSelect - "+v) }',
////          'onFileAppend'=>'function(e, v, m){ alert("onFileAppend - "+v) }',
////          'afterFileAppend'=>'function(e, v, m){ alert("afterFileAppend - "+v) }',
////          'onFileRemove'=>'function(e, v, m){ alert("onFileRemove - "+v) }',
////          'afterFileRemove'=>'function(e, v, m){ alert("afterFileRemove - "+v) }',
////      ),
//    ));
//    ?>
<!--</div>-->


<div class='grid_6 padding-5 center_content'>
    <?php echo CHtml::submitButton('Adauga', array('id' => 'addNewBicycle', 'class' => 'styled-button')); ?>
</div>

</div>

<?php $this->endWidget(); ?>