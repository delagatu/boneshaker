<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 8/21/12
 * Time: 9:32 PM
 * To change this template use File | Settings | File Templates.
 */
class Frame extends FrameBase
{
    /**
     * @static
     * @param string $className
     * @return FrameBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            throw New Exception('Can not save frame: ' . var_export($this->getErros(), 1));
        }
    }

    public static function getFrames()
    {
        return self::model()->findAll(
            array(
                'condition' => 'valid =:valid',
                'params' => array(
                    ':valid' => 1
                ),
            )
        );

    }

    public function getMakerAndProduct()
    {
        if ($this->maker instanceof Maker)
        {
            return $this->maker->name . ' ' . $this->name;
        }

        return $this->name;
    }

    public static function getById($id)
    {
        return self::model()->findByPk($id);
    }

    public function getName()
    {
        return $this->name;
    }

    public static function getByName($name)
    {
        return self::model()->find(array(
            'condition' => 'name =:name',
            'params' => array(
                ':name' => $name,
            ),
        ));
    }

    public static function saveIfNotExists($name)
    {
        $frame = self::getByName($name);
        if (!$frame instanceof Frame)
        {
            $frame = new Frame();
            $frame->name = $name;
            $frame->valid = 1;
            $frame->saveThrowEx();
        }

        return $frame;
    }

    public static function getIdByName($name)
    {
        $frame = self::saveIfNotExists($name);
        return $frame->id;
    }

}
