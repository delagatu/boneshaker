<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 9/2/12
 * Time: 7:58 PM
 * To change this template use File | Settings | File Templates.
 */
class Rim extends RimBase
{

    /**
     * @static
     * @param string $className
     * @return RimBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getRims()
    {
        return self::model()->with('maker')->findAll(
            array(
                'condition' => 'valid =:valid',
                'params' => array(
                    ':valid' => 1
                ),
            )
        );
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            Throw new Exception('Can not save rim: ' . var_export($this->getErrors(), 1));
        }
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
        $rim = self::getByName($name);
        if (!$rim instanceof Rim)
        {
            $rim = new Rim();
            $rim->name = $name;
            $rim->valid = 1;
            $rim->saveThrowEx();
        }

        return $rim;
    }

    public static function getIdByName($name)
    {
        $rim = self::saveIfNotExists($name);
        return $rim->id;
    }
}
