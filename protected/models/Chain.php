<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 9/2/12
 * Time: 7:25 PM
 * To change this template use File | Settings | File Templates.
 */
class Chain extends ChainBase
{

    /**
     * @static
     * @param string $className
     * @return ChainBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getChains()
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
            Throw new Exception('Can not save chain: ' . var_export($this->getErrors(), 1));
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
        $chain = self::getByName($name);
        if (!$chain instanceof Chain)
        {
            $chain = new Chain();
            $chain->name = $name;
            $chain->valid = 1;
            $chain->saveThrowEx();
        }

        return $chain;
    }

    public static function getIdByName($name)
    {
        $chain = self::saveIfNotExists($name);
        return $chain->id;
    }
}
