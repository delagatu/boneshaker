<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 11/6/12
 * Time: 8:21 PM
 * To change this template use File | Settings | File Templates.
 */
class PhotoSource extends PhotoSourceBase
{
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function getDefaultPhotoSource()
    {
        return 'Default';
    }

    /**
     * @throws Exception
     */
    public function saveThrowEx()
    {
        if (!$this->save()) {
            Throw new Exception('Imposibil de salvat: ' . var_dump($this->getErrors()));
        }
    }


    public static function getByPhotoAndType($photoId, $typeId)
    {
        $photoSource = self::model()->find(
            'photo_id =:photo_id AND photo_type_id =:type_id',
            array(
                ':photo_id' => $photoId,
                ':type_id' => $typeId
            )
        );

        return $photoSource;
    }

    public static function getByPhotoIdAndType($photoId, $type)
    {
        return self::model()->find(
            'photo_id = :photo_id AND photo_type_id = :photo_type_id',
            array(
                ':photo_id' => $photoId,
                ':photo_type_id' => $type,
            )
        );
    }

    public static function deleteByType($photoId, $typeId)
    {
        return self::model()->deleteAll(
            'photo_id =:photo_id AND photo_type_id =:photo_type_id',
            array(
                ':photo_id' => $photoId,
                ':photo_type_id' => $typeId
            )
        );
    }
}
