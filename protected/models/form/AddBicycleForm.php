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
    public $freewheel;
    public $spokes;
    public $tires;
    public $handlebar;
    public $stem;
    public $headset;
    public $seat_post;
    public $saddle;
    public $pedals;
    public $pictures;

    public function rules()
    {
        return array(
            array('frame_id', 'required', 'message' => 'Cadru?'),
            array('size_id', 'required', 'message' => 'Marime?'),
            array('speed_id', 'required', 'message' => 'Cate viteze are?'),
            array('color_id', 'required', 'message' => 'Culoare?'),
            array('fork_id', 'required', 'message' => 'Telescop?'),
            array('derailleur_front_id', 'required', 'message' => 'Schimbator fata?'),
            array('derailleur_rear_id', 'required', 'message' => 'Schimbator spate?'),
            array('shifter_id', 'required', 'message' => 'Manete schimbator?'),
            array('brake_lever_id', 'required', 'message' => 'Manete frana?'),
            array('brake_system_id', 'required', 'message' => 'Frana?'),
            array('chain_wheel_id', 'required', 'message' => 'Pedalier?'),
            array('bb_set_id', 'required', 'message' => 'Butuc pedalier?'),
            array('chain_id', 'required', 'message' => 'Lant?'),
            array('front_hub_id', 'required', 'message' => 'Butuc fata?'),
            array('rear_hub_id', 'required', 'message' => 'Butuc spate?'),
            array('rear_rim_id', 'required', 'message' => 'Janta spate?'),
            array('front_rim_id', 'required', 'message' => 'Janta fata?'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'frame_id'=>'Cadru',
            'size_id' => 'Marimi',
            'speed_id' => 'Viteze',
            'color_id' =>'Culoare',
            'fork_id' =>'Telescop',
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
        );
    }

    public function addBicycle()
    {
        $product = new Product();
    }
}
