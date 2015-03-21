<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 8/21/12
 * Time: 10:08 PM
 * To change this template use File | Settings | File Templates.
 */
class BicycleSize extends BicycleSizeBase
{
    /**
     * @static
     * @param string $className
     * @return BicycleSizeBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            Throw new Exception('Can not save size: ' . var_export($this->getErrors(), 1));
        }
    }

    public static function getSize()
    {
        return self::model()->findAll(
            array(
                'condition' => 'valid =:valid',
                'params' => array(
                    ':valid' => 1,
                ),
            )
        );
    }

    public static function getById($id)
    {
        return self::model()->findByPk($id);
    }

    public function getName()
    {
        return $this->size;
    }

    public static function getByName($name)
    {
        return self::model()->find(array(
            'condition' => 'size =:size',
            'params' => array(
                ':size' => $name,
            ),
        ));
    }

    public static function saveIfNotExists($name)
    {
        $size = self::getByName($name);
        if (!$size instanceof BicycleSize)
        {
            $size = new BicycleSize();
            $size->size = $name;
            $size->valid = 1;
            $size->saveThrowEx();
        }

        return $size;
    }

    public static function getIdByName($name)
    {
        $size = self::saveIfNotExists($name);
        return $size->id;
    }
}
