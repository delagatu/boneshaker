<div id = 'addDetailsDialog'></div>
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
    ));
?>

<div class="grid_9 form">

<h2 class="center_content">Detalii bicicleta</h2>

<div class = 'grid_9 boldText'>
    <?php
        $this->renderPartial('/' . ControllerPagePartial::CONTROLLER_SITE . '/' . ControllerPagePartial::PARTIAL_FLASH_MESSAGES);
    ?>
</div>


<div class='grid_9 padding-5'>
    <?php echo $form->errorSummary($addBicicleForm, 'Eroare: '); ?>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'frame_id'); ?>
    </div>
    <div class='grid_4'>
        <?php
        echo Chosen::activeDropDownList($addBicicleForm, 'frame_id', $addBicicleForm->getFrames(),
            array('class' => 'addBicicleDropDown long-input',
                'id' => 'addFrame',
                'empty' => 'Selecteaza',
                'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_FRAME),
                'data-dialog-id' => 'addFrameDialog',
                'data-title' =>'Cadru'
            )
        );
        echo $form->error($addBicicleForm, 'frame_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'size_id'); ?>
    </div>
    <div class='grid_4'>
        <?php
        echo Chosen::activeDropDownList($addBicicleForm, 'size_id', $addBicicleForm->getSizes(),
            array('class' => 'addBicicleDropDown long-input',
                'id' => 'addSize',
                'empty' => 'Selecteaza',
                'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_SIZE),
                'data-dialog-id' => 'addSizeDialog',
                'data-title' =>'Marime Cadru'
            )
        );

        echo $form->error($addBicicleForm, 'size_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'speed_id'); ?>
    </div>
    <div class='grid_4'>
        <?php
        echo Chosen::activeDropDownList($addBicicleForm, 'speed_id', $addBicicleForm->getSpeeds(),
            array('class' => 'addBicicleDropDown long-input',
                'id' => 'addSpeed',
                'empty' => 'Selecteaza',
                'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_SPEED),
                'data-dialog-id' => 'addSpeedDialog',
                'data-title' =>'Nr.Viteze'
            )
        );
        echo $form->error($addBicicleForm, 'speed_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'color_id'); ?>
    </div>
    <div class='grid_4'>
        <?php
        echo Chosen::activeDropDownList($addBicicleForm, 'color_id', $addBicicleForm->getColors(),
            array('class' => 'addBicicleDropDown long-input',
                'id' => 'addColor',
                'empty' => 'Selecteaza',
                'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_COLOR),
                'data-dialog-id' => 'addColorDialog',
                'data-title' =>'Culoare'
            )
        );
        echo $form->error($addBicicleForm, 'color_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'fork_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  echo Chosen::activeDropDownList($addBicicleForm, 'fork_id', $addBicicleForm->getForks(),
        array('class' => 'addBicicleDropDown long-input',
            'id' => 'addFork',
            'empty' => 'Selecteaza',
            'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_FORK),
            'data-dialog-id' => 'addForkDialog',
            'data-title' =>'Telescop / Furca'
        )
    );
       echo $form->error($addBicicleForm, 'fork_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'derailleur_front_id'); ?>
    </div>
    <div class="grid_4">
        <?php  echo Chosen::activeDropDownList($addBicicleForm, 'derailleur_front_id', $addBicicleForm->getDerailleurs(),
        array('class' => 'addBicicleDropDown long-input',
            'id' => 'addFrontDerailleur',
            'empty' => 'Selecteaza',
            'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_DERAILLEUR),
            'data-dialog-id' => 'addFrontDerailleurDialog',
            'data-title' =>'Schimbator fata'
        )
    );
        echo $form->error($addBicicleForm, 'derailleur_front_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'derailleur_rear_id'); ?>
    </div>
    <div class='grid_4'>
        <?php
        echo Chosen::activeDropDownList($addBicicleForm, 'derailleur_rear_id', $addBicicleForm->getDerailleurs(),
            array('class' => 'addBicicleDropDown long-input',
                'id' => 'addRearDerailleur',
                'empty' => 'Selecteaza',
                'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_DERAILLEUR),
                'data-dialog-id' => 'addRearDerailleurDialog',
                'data-title' =>'Schimbator fata'
            )
        );
        echo $form->error($addBicicleForm, 'derailleur_rear_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'shifter_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  echo Chosen::activeDropDownList($addBicicleForm, 'shifter_id', $addBicicleForm->getShifters(),
        array('class' => 'addBicicleDropDown long-input',
            'id' => 'addShifter',
            'empty' => 'Selecteaza',
            'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_SHIFTER),
            'data-dialog-id' => 'addShifterDialog',
            'data-title' =>'Maneta Schimbator'
        )
    );
       echo $form->error($addBicicleForm, 'shifter_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'brake_lever_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  echo Chosen::activeDropDownList($addBicicleForm, 'brake_lever_id', $addBicicleForm->getBrakeLever(),
        array('class' => 'addBicicleDropDown long-input',
            'id' => 'addBrakeLever',
            'empty' => 'Selecteaza',
            'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_BRAKE_LEVER),
            'data-dialog-id' => 'addBrakeLeverDialog',
            'data-title' =>'Maneta Frana'
        )
    );
       echo $form->error($addBicicleForm, 'brake_lever_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'brake_system_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  echo Chosen::activeDropDownList($addBicicleForm, 'brake_system_id', $addBicicleForm->getBrakeSystems(),
        array('class' => 'addBicicleDropDown long-input',
            'id' => 'addBrakeSystem',
            'empty' => 'Selecteaza',
            'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_BRAKE_SYSTEM),
            'data-dialog-id' => 'addBrakeSystemDialog',
            'data-title' =>'Frana'
        )
    );
       echo $form->error($addBicicleForm, 'brake_system_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'chain_wheel_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  echo Chosen::activeDropDownList($addBicicleForm, 'chain_wheel_id', $addBicicleForm->getChainWheels(),
        array('class' => 'addBicicleDropDown long-input',
            'id' => 'addChainWheel',
            'empty' => 'Selecteaza',
            'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_CHAIN_WHEEL),
            'data-dialog-id' => 'addChainWheelDialog',
            'data-title' =>'Pedalier'
        )
    );
       echo $form->error($addBicicleForm, 'chain_wheel_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'bb_set_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  echo Chosen::activeDropDownList($addBicicleForm, 'bb_set_id', $addBicicleForm->getBBSets(),
        array('class' => 'addBicicleDropDown long-input',
            'id' => 'addBBSet',
            'empty' => 'Selecteaza',
            'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_BB_SET),
            'data-dialog-id' => 'addBBSetDialog',
            'data-title' =>'Butuc Pedalier'
        )
    );
       echo $form->error($addBicicleForm, 'bb_set_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'chain_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  echo Chosen::activeDropDownList($addBicicleForm, 'chain_id', $addBicicleForm->getChains(),
        array('class' => 'addBicicleDropDown long-input',
            'id' => 'addChain',
            'empty' => 'Selecteaza',
            'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_CHAIN),
            'data-dialog-id' => 'addChainDialog',
            'data-title' =>'Lant'
        )
    );
       echo $form->error($addBicicleForm, 'chain_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'front_hub_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  echo Chosen::activeDropDownList($addBicicleForm, 'front_hub_id', $addBicicleForm->getHubs(),
        array('class' => 'addBicicleDropDown long-input',
            'id' => 'addFrontHub',
            'empty' => 'Selecteaza',
            'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_HUB),
            'data-dialog-id' => 'addFrontHubDialog',
            'data-title' =>'Butuc fata'
        )
    );
        echo $form->error($addBicicleForm, 'front_hub_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'rear_hub_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  echo Chosen::activeDropDownList($addBicicleForm, 'rear_hub_id', $addBicicleForm->getHubs(),
        array('class' => 'addBicicleDropDown long-input',
            'id' => 'addRearHub',
            'empty' => 'Selecteaza',
            'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_HUB),
            'data-dialog-id' => 'addRearHubDialog',
            'data-title' =>'Butuc spate'
        )
    );
        echo $form->error($addBicicleForm, 'rear_hub_id');
        ?>
    </div>
</div>


<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'front_rim_id'); ?>
    </div>
    <div class='grid_4'>
        <?php  echo Chosen::activeDropDownList($addBicicleForm, 'front_rim_id', $addBicicleForm->getRims(),
        array('class' => 'addBicicleDropDown long-input',
            'id' => 'addFrontRim',
            'empty' => 'Selecteaza',
            'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_RIM),
            'data-dialog-id' => 'addFrontRimDialog',
            'data-title' =>'Janta fata'
        )
    );
        echo $form->error($addBicicleForm, 'front_rim_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'rear_rim_id'); ?>
    </div>
    <div class="grid_4">
        <?php  echo Chosen::activeDropDownList($addBicicleForm, 'rear_rim_id', $addBicicleForm->getRims(),
        array('class' => 'addBicicleDropDown long-input',
            'id' => 'addRearRim',
            'empty' => 'Selecteaza',
            'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_RIM),
            'data-dialog-id' => 'addRearRimDialog',
            'data-title' =>'Janta spate'
        )
    );
       echo $form->error($addBicicleForm, 'rear_rim_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'front_tire_id'); ?>
    </div>
    <div class="grid_4">
        <?php  echo Chosen::activeDropDownList($addBicicleForm, 'front_tire_id', $addBicicleForm->getTires(),
        array('class' => 'addBicicleDropDown long-input',
            'id' => 'addFrontTire',
            'empty' => 'Selecteaza',
            'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_TIRE),
            'data-dialog-id' => 'addFrontDialog',
            'data-title' =>'Anvelopa'
        )
    );
        echo $form->error($addBicicleForm, 'front_tire_id');
        ?>
    </div>
</div>

<div class='grid_9 padding-5'>
    <div class="grid_2">
        <?php echo $form->labelEx($addBicicleForm, 'rear_tire_id'); ?>
    </div>
    <div class="grid_4">
        <?php  echo Chosen::activeDropDownList($addBicicleForm, 'rear_tire_id', $addBicicleForm->getTires(),
        array('class' => 'addBicicleDropDown long-input',
            'id' => 'addRearTire',
            'empty' => 'Selecteaza',
            'data-add-url' => $this->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_TIRE),
            'data-dialog-id' => 'addFrontDialog',
            'data-title' =>'Anvelopa'
        )
    );
        echo $form->error($addBicicleForm, 'rear_tire_id');
        ?>
    </div>
</div>


<div class='grid_6 padding-5 center_content'>
    <?php echo CHtml::submitButton('Adauga', array('id' => 'addNewBicycle', 'class' => 'styled-button')); ?>
</div>

</div>

<?php $this->endWidget(); ?>

<div class = 'grid_9'>
    <?php
    $url = Yii::app()->controller->createUrl(ControllerPagePartial::PAGE_ADD_BICYCLE, array('id' => $addBicicleForm->product_id));
    echo CHtml::link('Editeaza produs', $url, array('class' =>'action-link'));
    ?>
</div>