<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 8/26/12
 * Time: 11:26 AM
 * To change this template use File | Settings | File Templates.
 */
class Color extends ColorBase
{
    /**
     * @static
     * @param string $className
     * @return ColorBase
     */

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getColors()
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

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            Throw new Exception('Can not save the color: ' . var_export($this->getErrors(), 1));
        }
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
        $color = self::getByName($name);
        if (!$color instanceof Color)
        {
            $color = new Color();
            $color->name = $name;
            $color->valid = 1;
            $color->saveThrowEx();
        }

        return $color;
    }

    public static function getIdByName($name)
    {
        $color = self::saveIfNotExists($name);
        return $color->id;
    }
}
