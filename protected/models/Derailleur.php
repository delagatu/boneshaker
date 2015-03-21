<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 8/27/12
 * Time: 10:22 PM
 * To change this template use File | Settings | File Templates.
 */
class Derailleur extends DerailleurBase
{

    /**
     * @static
     * @param string $className
     * @return DerailleurBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getDerailleurs()
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
            Throw new Exception('Can not save derailleur: ' . var_export($this->getErrors(), 1));
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
        $derailleur = self::getByName($name);
        if (!$derailleur instanceof Derailleur)
        {
            $derailleur = new Derailleur();
            $derailleur->name = $name;
            $derailleur->valid = 1;
            $derailleur->saveThrowEx();
        }

        return $derailleur;
    }

    public static function getIdByName($name)
    {
        $derailleur = self::saveIfNotExists($name);
        return $derailleur->id;
    }
}
