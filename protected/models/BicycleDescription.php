<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 7/30/12
 * Time: 5:15 PM
 * To change this template use File | Settings | File Templates.
 */
class BicycleDescription extends BicycleDescriptionBase
{

    /**
     * @static
     * @param string $className
     * @return BicycleDescriptionBase
     */

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @throws Exception
     */

    public function saveThrowEx()
    {

        if (!$this->save()) {
            Throw new Exception('Imposibil de salvat: ' . var_export($this->getErrors(), 1));
        }

    }

    /**
     * @param $id
     * @return mixed
     */
    public static function getByProductId($id)
    {
        return self::model()->find(
            'product_id =:product_id',
            array(
                ':product_id' => $id
            )
        );
    }

    public function hasFrame()
    {
        return !is_null($this->frame_id);
    }

    public function getFrameName($default = ' - ')
    {
        $frame = Frame::getById($this->frame_id);
        if ($frame instanceof Frame)
        {
            return $frame->getMakerAndProduct();
        }

        return $default;
    }

    public function hasSize()
    {
        return !is_null($this->size_id);
    }

    public function getSize($default = ' - ')
    {
        $bicycleSize = BicycleSize::getById($this->size_id);
        if ($bicycleSize instanceof BicycleSize)
        {
            return $bicycleSize->getName();
        }

        return $default;
    }

    public function hasSpeed()
    {
        return !is_null($this->speed_id);
    }

    public function getSpeed($default = ' - ')
    {
        $speed = Speed::getById($this->speed_id);
        if ($speed instanceof Speed)
        {
            return $speed->getName();
        }

        return $default;
    }

    public function hasColor()
    {
        return !is_null($this->color_id);
    }

    public function getColor($default = ' - ')
    {
        $color = Color::getById($this->color_id);
        if ($color instanceof Color)
        {
            return $color->getName();
        }

        return $default;
    }

    public function hasFork()
    {
        return !is_null($this->fork_id);
    }

    public function getFork($default = ' - ')
    {
        $fork = Fork::getById($this->fork_id);
        if ($fork instanceof Fork)
        {
            return $fork->getMakerAndProduct();
        }

        return $default;
    }

    public function hasFrontDerailleur()
    {
        return !is_null($this->derailleur_front_id);
    }

    public function getFrontDerailleur($default = ' - ')
    {
        $derailleur = Derailleur::getById($this->derailleur_front_id);
        if ($derailleur instanceof Derailleur)
        {
            return $derailleur->getMakerAndProduct();
        }

        return $default;
    }

    public function hasRearDerailleur()
    {
        return !is_null($this->derailleur_rear_id);
    }

    public function getRearDerailleur($default = ' - ')
    {
        $derailleur = Derailleur::getById($this->derailleur_rear_id);
        if ($derailleur instanceof Derailleur)
        {
            return $derailleur->getMakerAndProduct();
        }

        return $default;
    }

    public function hasBreakLever()
    {
        return !is_null($this->brake_lever_id);
    }

    public function getBreakLever($default = ' - ')
    {
        $breakLever = BrakeLever::getById($this->brake_lever_id);
        if ($breakLever instanceof BrakeLever)
        {
            return $breakLever->getMakerAndProduct();
        }

        return $default;
    }

    public function hasShifter()
    {
        return !is_null($this->shifter_id);
    }

    public function getShifter($default = ' - ')
    {
        $shifter = Shifter::getById($this->shifter_id);
        if ($shifter instanceof Shifter)
        {
            return $shifter->getMakerAndProduct();
        }

        return $default;
    }

    public function hasBrakeSystem()
    {
        return !is_null($this->brake_system_id);
    }

    public function getBrakeSystem($default = ' - ')
    {
        $brakeSystem = BrakeSystem::getById($this->brake_system_id);
        if ($brakeSystem instanceof BrakeSystem)
        {
            return $brakeSystem->getMakerAndProduct();
        }

        return $default;
    }

    public function hasChainWheel()
    {
        return !is_null($this->chain_wheel_id);
    }

    public function getChainWheel($default = ' - ')
    {
        $chainWheel = ChainWheel::getById($this->chain_wheel_id);
        if ($chainWheel instanceof ChainWheel)
        {
            return $chainWheel->getMakerAndProduct();
        }

        return $default;
    }

    public function hasBBSet()
    {
        return !is_null($this->bb_set_id);
    }

    public function getBBSet($default = ' - ')
    {
        $bbSet = BbSet::getById($this->bb_set_id);
        if ($bbSet instanceof BbSet)
        {
            return $bbSet->getMakerAndProduct();
        }

        return $default;
    }

    public function hasChain()
    {
        return !is_null($this->chain_id);
    }

    public function getChain($default = ' - ')
    {
        $chain = Chain::getById($this->chain_id);
        if ($chain instanceof Chain)
        {
            return $chain->getMakerAndProduct();
        }

        return $default;
    }

    public function hasFrontHub()
    {
        return !is_null($this->front_hub_id);
    }

    public function getFrontHub($default = ' - ')
    {
        $hub = Hub::getById($this->front_hub_id);
        if ($hub instanceof Hub)
        {
            return $hub->getMakerAndProduct();
        }

        return $default;
    }

    public function hasRearHub()
    {
        return !is_null($this->rear_hub_id);
    }

    public function getRearHub($default = ' - ')
    {
        $hub = Hub::getById($this->rear_hub_id);
        if ($hub instanceof Hub)
        {
            return $hub->getMakerAndProduct();
        }

        return $default;
    }

    public function hasFrontRim()
    {
        return !is_null($this->front_rim_id);
    }

    public function getFrontRim($default = ' - ')
    {
        $rim = Rim::getById($this->front_rim_id);
        if ($rim instanceof Rim)
        {
            return $rim->getMakerAndProduct();
        }

        return $default;
    }

    public function hasRearRim()
    {
        return !is_null($this->rear_rim_id);
    }

    public function getRearRim($default = ' - ')
    {
        $rim = Rim::getById($this->rear_rim_id);
        if ($rim instanceof Rim)
        {
            return $rim->getMakerAndProduct();
        }

        return $default;
    }

    public function hasFrontTire()
    {
        return !is_null($this->front_tire_id);
    }

    public function getFrontTire($default = ' - ')
    {
        $tire = Tire::getById($this->front_tire_id);
        if ($tire instanceof Tire)
        {
            return $tire->getMakerAndProduct();
        }

        return $default;
    }

    public function hasRearTire()
    {
        return !is_null($this->rear_tire_id);
    }

    public function getRearTire($default = ' - ')
    {
        $tire = Tire::getById($this->rear_tire_id);
        if ($tire instanceof Tire)
        {
            return $tire->getMakerAndProduct();
        }

        return $default;
    }

    public function hasRearFrontTire()
    {
        return ($this->frontRearTire instanceof Tire);
    }

    public function getRearFrontTire($default = '')
    {
        return ($this->frontRearTire instanceof Tire) ? $this->frontRearTire->getMakerAndProduct() : $default;
    }

    public function hasFrontRearRim()
    {
        return ($this->frontRearRim instanceof Rim);
    }

    public function getFrontRearRim($default = '')
    {
        return ($this->hasFrontRearRim()) ? $this->frontRearRim->getMakerAndProduct() : $default;
    }

    public function hasRearShock()
    {
        return ($this->rearShock instanceof RearShock);
    }

    public function getRearShock($default = '')
    {
        return ($this->hasRearShock()) ? $this->rearShock->getMakerAndProduct() : $default;
    }

    public function hasWheelSize()
    {
        return ($this->wheelSize instanceof WheelSize);
    }

    public function getWheelSize($default = '')
    {
        return ($this->hasWheelSize()) ? $this->wheelSize->getName() : $default;
    }

    public function getKeywords()
    {
        $frame = $this->getFrameName('');
        $size = $this->getSize('');
        $speed = $this->getSpeed('');
        $color = $this->getColor('');
        $fork = $this->getFork('');
        $frontDerailleur = $this->getFrontDerailleur('');
        $rearDerailleur = $this->getRearDerailleur('');
        $shifter = $this->getShifter('');
        $brakeLever = $this->getBreakLever('');
        $brakeSystem = $this->getBrakeSystem('');
        $chainWheel = $this->getChainWheel('');
        $bbSet = $this->getBBSet('');
        $chain = $this->getChain('');
        $frontHub = $this->getFrontHub('');
        $rearHub = $this->getRearHub('');
        $frontRim = $this->getFrontRim('');
        $rearRim = $this->getRearRim('');
        $frontTire = $this->getFrontTire('');
        $rearTire = $this->getRearTire('');
        $frontRearTire = $this->getRearFrontTire('');
        $frontRearRim = $this->getFrontRearRim('');
        $rearShock = $this->getRearShock('');
        $wheelSize = $this->getWheelSize('');

        return $frame . $size . $speed . $color . $fork . $frontDerailleur . $rearDerailleur . $shifter . $brakeLever
            . $brakeSystem . $chainWheel . $bbSet . $chain . $frontHub . $rearHub . $frontRim . $rearRim . $frontRearTire . $frontRearRim
        . $frontTire . $rearTire . $rearShock . $wheelSize;
            ;
    }

    public function getLimitedData($limit = 5)
    {
        $count = 0;
        $bikeData = '';

        if ($this->hasFrame() && ($count < $limit))
        {
            $params = array('header' => 'Cadru', 'data' => $this->getFrameName());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        if ($this->hasSize() && ($count < $limit))
        {
            $params = array('header' => 'Marimi', 'data' => $this->getSize());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        if ($this->hasSpeed() && ($count < $limit))
        {
            $params = array('header' => 'Viteze', 'data' => $this->getSpeed());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }


        if ($this->hasWheelSize() && ($count < $limit))
        {
            $params = array('header' => 'Marime Roata', 'data' => $this->getWheelSize());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        if ($this->hasColor() && ($count < $limit))
        {
            $params = array('header' => 'Culori', 'data' => $this->getColor());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        if ($this->hasFork() && ($count < $limit))
        {
            $params = array('header' => 'Telescop', 'data' => $this->getFork());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        if ($this->hasFrontDerailleur() && ($count < $limit))
        {
            $params = array('header' => 'Schimbator fata', 'data' => $this->getFrontDerailleur());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        if ($this->hasRearDerailleur() && ($count < $limit))
        {
            $params = array('header' => 'Schimbator spate', 'data' => $this->getRearDerailleur());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        if ($this->hasShifter() && ($count < $limit))
        {
            $params = array('header' => 'Manete schimbator', 'data' => $this->getShifter());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        if ($this->hasBreakLever() && ($count < $limit))
        {
            $params = array('header' => 'Manete frana', 'data' => $this->getBreakLever());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        if ($this->hasBrakeSystem() && ($count < $limit))
        {
            $params = array('header' => 'Frana', 'data' => $this->getBrakeSystem());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        if ($this->hasChainWheel() && ($count < $limit))
        {
            $params = array('header' => 'Pedalier', 'data' => $this->getChainWheel());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        if ($this->hasBBSet() && ($count < $limit))
        {
            $params = array('header' => 'Butuc pedalier', 'data' => $this->getBBSet());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        if ($this->hasChain() && ($count < $limit))
        {
            $params = array('header' => 'Lant', 'data' => $this->getChain());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        if ($this->hasFrontHub() && ($count < $limit))
        {
            $params = array('header' => 'Butuc fata', 'data' => $this->getFrontHub());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        if ($this->hasRearHub() && ($count < $limit))
        {
            $params = array('header' => 'Butuc spate', 'data' => $this->getRearHub());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        if ($this->hasFrontRim() && ($count < $limit))
        {
            $params = array('header' => 'Janta fata', 'data' => $this->getFrontRim());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        if ($this->hasRearRim() && ($count < $limit))
        {
            $params = array('header' => 'Janta spate', 'data' => $this->getRearRim());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        if ($this->hasFrontTire() && ($count < $limit))
        {
            $params = array('header' => 'Anvelopa fata', 'data' => $this->getFrontTire());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        if ($this->hasRearTire() && ($count < $limit))
       {
            $params = array('header' => 'Anvelopa spate', 'data' => $this->getRearTire());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

       if ($this->hasRearFrontTire() && ($count < $limit))
       {
            $params = array('header' => 'Anvelopa F/S', 'data' => $this->getRearFrontTire());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        if ($this->hasFrontRearRim() && ($count < $limit))
        {
            $params = array('header' => 'Janta F/S', 'data' => $this->getFrontRearRim());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        if ($this->hasRearShock() && ($count < $limit))
        {
            $params = array('header' => 'Suspensie spate', 'data' => $this->getRearShock());
            $bikeData .= Yii::app()->controller->renderPartial('/' . ControllerPagePartial::CONTROLLER_BICYCLE . '/' . ControllerPagePartial::PARTIAL_BICYCLE_LIMITED_DESCRIPTION, $params);
            $count++;
        }

        return $bikeData;
    }

}
