 <?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 7/30/12
 * Time: 5:16 PM
 * To change this template use File | Settings | File Templates.
 */
class AddBicycleForm extends CFormModel
{
    public $product_id;
    public $speed_id;
    public $size_id;
    public $frame_id;
    public $color_id;
    public $fork_id;
    public $derailleur_front_id;
    public $derailleur_rear_id;
    public $shifter_id;
    public $brake_lever_id;
    public $brake_system_id;
    public $chain_wheel_id;
    public $bb_set_id;
    public $chain_id;
    public $front_hub_id;
    public $rear_hub_id;
    public $rear_rim_id;
    public $front_rim_id;
    public $freewheel; // todo
    public $spokes; // todo
    public $front_tire_id;
    public $rear_tire_id;
    public $handlebar; // todo
    public $stem; // todo
    public $headset; // todo
    public $seat_post; // todo
    public $saddle; // todo
    public $pedals; // todo
    public $front_rear_tire_id;
    public $front_rear_rim_id;
    public $rear_shock_id;
    public $wheel_size_id;

    public function rules()
    {
        return array(
            array('product_id', 'required', 'message' => 'Produsul editat nu s-a gasit.Contacteaza webmasterul.'),
            array('frame_id', 'safe', 'message' => 'Cadru?'),
            array('size_id', 'safe', 'message' => 'Marime?'),
            array('speed_id', 'safe', 'message' => 'Cate viteze are?'),
            array('color_id', 'safe', 'message' => 'Culoare?'),
            array('fork_id', 'safe', 'message' => 'Telescop / Furca?'),
            array('derailleur_front_id', 'safe', 'message' => 'Schimbator fata?'),
            array('derailleur_rear_id', 'safe', 'message' => 'Schimbator spate?'),
            array('shifter_id', 'safe', 'message' => 'Manete schimbator?'),
            array('brake_lever_id', 'safe', 'message' => 'Manete frana?'),
            array('brake_system_id', 'safe', 'message' => 'Frana?'),
            array('chain_wheel_id', 'safe', 'message' => 'Pedalier?'),
            array('bb_set_id', 'safe', 'message' => 'Butuc pedalier?'),
            array('chain_id', 'safe', 'message' => 'Lant?'),
            array('front_hub_id', 'safe', 'message' => 'Butuc fata?'),
            array('rear_hub_id', 'safe', 'message' => 'Butuc spate?'),
            array('rear_rim_id', 'safe', 'message' => 'Janta spate?'),
            array('front_rim_id', 'safe', 'message' => 'Janta fata?'),
            array('front_tire_id', 'safe', 'message' => 'Anvelopa fata?'),
            array('rear_tire_id', 'safe', 'message' => 'Anvelopa spate?'),
            array('front_rear_tire_id', 'safe', 'message' => 'Anvelopa F/S?'),
            array('front_rear_rim_id', 'safe', 'message' => 'Janta F/S?'),
            array('rear_shock_id', 'safe', 'message' => 'Suspensie spate?'),
            array('wheel_size_id', 'safe', 'message' => 'Marime Roata?'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'frame_id'=>'Cadru',
            'size_id' => 'Marimi',
            'speed_id' => 'Viteze',
            'color_id' =>'Culoare',
            'fork_id' =>'Telescop / Furca',
            'derailleur_front_id' => 'Schimbator Fata',
            'derailleur_rear_id' => 'Schimbator Spate',
            'shifter_id' => 'Manete schimbator',
            'brake_lever_id' => 'Manete frana',
            'brake_system_id' => 'Frana',
            'chain_wheel_id' =>'Pedalier',
            'bb_set_id' => 'Butuc pedalier',
            'chain_id' => 'Lant',
            'front_hub_id' => 'Butuc fata',
            'rear_hub_id' => 'Butuc spate',
            'rear_rim_id' => 'Janta spate',
            'front_rim_id' => 'Janta fata',
            'front_tire_id' => 'Anvelopa fata',
            'rear_tire_id' => 'Anvelopa spate',
            'front_rear_tire_id' => 'Anvelopa F/S',
            'front_rear_rim_id' => 'Janta F/S',
            'rear_shock_id' => 'Suspensie spate',
            'wheel_size_id' => 'Marime Roata',
        );
    }

    public function initBicycleDescription()
    {
        $bicycleDescription = BicycleDescription::getByProductId($this->product_id);
        if ($bicycleDescription instanceof BicycleDescription)
        {
            $this->frame_id = $bicycleDescription->frame_id;
            $this->size_id = $bicycleDescription->size_id;
            $this->speed_id = $bicycleDescription->speed_id;
            $this->color_id = $bicycleDescription->color_id;
            $this->fork_id = $bicycleDescription->fork_id;
            $this->derailleur_front_id = $bicycleDescription->derailleur_front_id;
            $this->derailleur_rear_id = $bicycleDescription->derailleur_rear_id;
            $this->shifter_id = $bicycleDescription->shifter_id;
            $this->brake_lever_id = $bicycleDescription->brake_lever_id;
            $this->brake_system_id = $bicycleDescription->brake_system_id;
            $this->chain_wheel_id = $bicycleDescription->chain_wheel_id;
            $this->bb_set_id = $bicycleDescription->bb_set_id;
            $this->chain_id = $bicycleDescription->chain_id;
            $this->front_hub_id = $bicycleDescription->front_hub_id;
            $this->rear_hub_id = $bicycleDescription->rear_hub_id;
            $this->rear_rim_id = $bicycleDescription->rear_rim_id;
            $this->front_rim_id = $bicycleDescription->front_rim_id;
            $this->front_tire_id = $bicycleDescription->front_tire_id;
            $this->rear_tire_id = $bicycleDescription->rear_tire_id;
            $this->front_rear_tire_id = $bicycleDescription->front_rear_tire_id;
            $this->front_rear_rim_id = $bicycleDescription->front_rear_rim_id;
            $this->rear_shock_id = $bicycleDescription->rear_shock_id;
            $this->wheel_size_id = $bicycleDescription->wheel_size_id;
        }
    }

    public function saveDetails()
    {

        $bicycleDescription = BicycleDescription::getByProductId($this->product_id);
        if (!$bicycleDescription instanceof BicycleDescription)
        {
            $bicycleDescription = new BicycleDescription();
        }

        $bicycleDescription->product_id = $this->product_id;
        $bicycleDescription->frame_id = $this->frame_id;
        $bicycleDescription->size_id = $this->size_id;
        $bicycleDescription->speed_id = $this->speed_id;
        $bicycleDescription->color_id = $this->color_id;
        $bicycleDescription->fork_id = $this->fork_id;
        $bicycleDescription->derailleur_front_id = $this->derailleur_front_id;
        $bicycleDescription->derailleur_rear_id = $this->derailleur_rear_id;
        $bicycleDescription->shifter_id = $this->shifter_id;
        $bicycleDescription->brake_lever_id = $this->brake_lever_id;
        $bicycleDescription->brake_system_id = $this->brake_system_id;
        $bicycleDescription->chain_wheel_id = $this->chain_wheel_id;
        $bicycleDescription->bb_set_id = $this->bb_set_id;
        $bicycleDescription->chain_id = $this->chain_id;
        $bicycleDescription->front_hub_id = $this->front_hub_id;
        $bicycleDescription->rear_hub_id = $this->rear_hub_id;
        $bicycleDescription->rear_rim_id = $this->rear_rim_id;
        $bicycleDescription->front_rim_id = $this->front_rim_id;
        $bicycleDescription->front_tire_id = $this->front_tire_id;
        $bicycleDescription->rear_tire_id = $this->rear_tire_id;
        $bicycleDescription->front_rear_tire_id = $this->front_rear_tire_id;
        $bicycleDescription->front_rear_rim_id = $this->front_rear_rim_id;
        $bicycleDescription->rear_shock_id = $this->rear_shock_id;
        $bicycleDescription->wheel_size_id = $this->wheel_size_id;
        $bicycleDescription->saveThrowEx();

        Product::setUpdateDate($this->product_id);
        ProductKeywords::addBicycleDetails($this->product_id);

        return true;
    }

    private function addOtherOption(Array $listData, $label = 'Altceva')
    {
        $listData['-1'] = $label;
        return $listData;
    }

    public function getFrames()
    {
        $frames = CHtml::listData(Frame::getFrames(), 'id', 'makerAndProduct');
        return $this->addOtherOption($frames);
    }

    public function getSizes()
    {
        $sizes = CHtml::listData(BicycleSize::getSize(), 'id', 'size');
        return $this->addOtherOption($sizes);
    }

    public function getSpeeds()
    {
        $speeds = CHtml::listData(Speed::getSpeeds(), 'id', 'name');
        return $this->addOtherOption($speeds);
    }

    public function getColors()
    {
        $colors = CHtml::listData(Color::getColors(), 'id', 'name');
        return $this->addOtherOption($colors);
    }

    public function getForks()
    {
        $forks = CHtml::listData(Fork::getForks(), 'id', 'makerAndProduct');
        return $this->addOtherOption($forks);
    }

    public function getDerailleurs()
    {
        $forks = CHtml::listData(Derailleur::getDerailleurs(), 'id', 'makerAndProduct');
        return $this->addOtherOption($forks);
    }

    public function getShifters()
    {
        $shifters = CHtml::listData(Shifter::getShifters(), 'id', 'makerAndProduct');
        return $this->addOtherOption($shifters);
    }

    public function getBrakeLever()
    {
        $brakeLever = CHtml::listData(BrakeLever::getBrakeLevers(), 'id', 'makerAndProduct');
        return $this->addOtherOption($brakeLever);
    }

    public function getBrakeSystems()
    {
        $brakeSystem = CHtml::listData(BrakeSystem::getBrakeSystems(), 'id', 'makerAndProduct');
        return $this->addOtherOption($brakeSystem);
    }

    public function getChainWheels()
    {
        $chainWheel = CHtml::listData(ChainWheel::getChainWheels(), 'id', 'makerAndProduct');
        return $this->addOtherOption($chainWheel);
    }

    public function getBBSets()
    {
        $bbSet = CHtml::listData(BbSet::getBbSets(), 'id', 'makerAndProduct');
        return $this->addOtherOption($bbSet);
    }

    public function getChains()
    {
        $chain = CHtml::listData(Chain::getChains(), 'id', 'makerAndProduct');
        return $this->addOtherOption($chain);
    }

    public function getHubs()
    {
        $hub = CHtml::listData(Hub::getHubs(), 'id', 'makerAndProduct');
        return $this->addOtherOption($hub);
    }

    public function getRims()
    {
        $rim = CHtml::listData(Rim::getRims(), 'id', 'makerAndProduct');
        return $this->addOtherOption($rim);
    }

    public function getTires()
    {
        $tire = CHtml::listData(Tire::getTires(), 'id', 'makerAndProduct');
        return $this->addOtherOption($tire);
    }

    public function getRearShocks()
    {
        $shock = CHtml::listData(RearShock::getRearShocks(), 'id', 'makerAndProduct');
        return $this->addOtherOption($shock);
    }

    public function getWheelSize()
    {
        $wheelSize = CHtml::listData(WheelSize::getWheelSizes(), 'id', 'name');
        return $this->addOtherOption($wheelSize);
    }
}
