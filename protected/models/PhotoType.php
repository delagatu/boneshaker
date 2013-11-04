<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 11/5/12
 * Time: 8:54 PM
 * To change this template use File | Settings | File Templates.
 */
class PhotoType extends PhotoTypeBase
{
    const PHOTO_TYPE_BIG = 'BIG';
    const PHOTO_TYPE_MEDIUM = 'MEDIUM';
    const PHOTO_TYPE_THUMB = 'THUMB';
    CONST PHOTO_TYPE_GENERAL_DISPLAY = 'GENERAL_DISPLAY';

    const PHOTO_TYPE_BIG_ID = 1;
    const PHOTO_TYPE_MEDIUM_ID = 2;
    const PHOTO_TYPE_THUMB_ID = 3;
    const PHOTO_TYPE_GENERAL_DISPLAY_ID = 4;

    /**
     * @param string $className
     * @return PhotoTypeBase
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getByTypeId($typeId)
    {
        return self::model()->findByPk($typeId);
    }

    public static function getAll()
    {
        return self::model()->findAll();
    }

    public function getWidthAndHeight()
    {
        return $this->photo_width . 'x' . $this->photo_height;
    }

}
