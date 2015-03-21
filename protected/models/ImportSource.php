<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 3/21/15
 * Time: 4:12 PM
 * To change this template use File | Settings | File Templates.
 */

class ImportSource extends ImportSourceBase
{

    const BikeFun = 'BikeFun';

    /**
     * @param string $className
     * @return ImportSourceBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function saveThrowEx()
    {
        if (!$this->save())
        {
            Throw new Exception('Can not save the import source:' . var_export($this->getErrors(), 1));
        }
    }

    public static function getByName($name)
    {
        return self::model()->find(array(
            'condition' => 'source_label =:source_label',
            'params' => array(
                ':source_label' => $name,
            ),
        ));
    }

    public static function saveIfNotExists($name)
    {
        $importSource = self::getByName($name);
        if (!$importSource instanceof ImportSource)
        {
            $importSource = new ImportSource();
            $importSource->source_label = $name;
            $importSource->saveThrowEx();
        }

        return $importSource;
    }

    public static function getIdByName($name)
    {
        $importSource = self::saveIfNotExists($name);
        return $importSource->id;
    }

}