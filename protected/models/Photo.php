<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 4/16/12
 * Time: 3:29 PM
 * To change this template use File | Settings | File Templates.
 */
class Photo extends PhotoBase
{
    /**
     * @static
     * @param string $className
     * @return PhotoBase
     */
    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public static function getById($id)
    {
        return self::model()->findByPk($id);
    }

    public function saveThrowEx()
    {
        if (!$this->save()) {
            Throw new Exception('Imposibil de salvat: ' . var_export($this->getErrors(), true));
        }
    }

    public function deleteThrowEx()
    {
        if (!$this->delete())
        {
            Throw new Exception('Can not delete the photo: ' . var_export($this->getErrors(), 1));
        }
    }

    /**
     * @static
     * @param $productId
     * @return mixed
     */
    public static function getOnePhotoByType($productId)
    {
        return self::model()->find(array(
            'condition' => 'product_id=:product_id AND order_id =:order_id',
            'params' => array(
                ':product_id' => $productId,
                ':order_id' => PhotoOrder::PHOTO_ORDER_PRIMARY_ID
            ),
        ));
    }

    public static function getPrimaryPhotoPerProduct($productId)
    {
        return self::model()->find(
            'product_id =:product_id AND order_id =:order_id',
            array(
                ':product_id' => $productId,
                ':order_id' => PhotoOrder::PHOTO_ORDER_PRIMARY_ID
            )
        );
    }

    public static function getPhotoPerProduct($productId)
    {
        return self::model()->findAll(
            'product_id =:product_id',
            array(
                ':product_id' => $productId,
            )
        );
    }

    public function hasByType($type)
    {
        $source = PhotoSource::getByPhotoIdAndType($this->id,$type);
        if ($source instanceof PhotoSource)
        {
            return file_exists(Yii::app()->getBaseUrl(true) . '/' . $source->photo_source_path);
        }

        return false;

    }

    public function getSourceByType($type)
    {
        $source = PhotoSource::getByPhotoIdAndType($this->id,$type);

        if ($source instanceof PhotoSource)
        {
            return Yii::app()->getBaseUrl(true) . '/' . $source->photo_source_path;
        }

        return PhotoSource::getDefaultPhotoSource();

    }

    public function getBigOrNot()
    {
        $source = PhotoSource::getByPhotoIdAndType($this->id,PhotoType::PHOTO_TYPE_BIG_ID);

        if ($source instanceof PhotoSource)
        {
            return Yii::app()->getBaseUrl(true) . '/' . $source->photo_source_path;
        }

        return $this->getSourceByType(PhotoType::PHOTO_TYPE_MEDIUM_ID);
    }

    private function deletePhoto($photoTypeId)
    {
        $photoSource = PhotoSource::getByPhotoIdAndType($this->id, $photoTypeId);

        if ($photoSource instanceof PhotoSouce)
        {
            if (is_file($photoSource->photo_source_path))
            {
                unlink($photoSource->photo_source_path);
            }
        }

        PhotoSource::deleteByType($this->id, $photoTypeId);


    }

    public function deleteAllPhotoSource()
    {
        $transaction = Yii::app()->db->beginTransaction();
        try
        {

            $this->deletePhoto(PhotoType::PHOTO_TYPE_THUMB_ID);
            $this->deletePhoto(PhotoType::PHOTO_TYPE_GENERAL_DISPLAY_ID);
            $this->deletePhoto(PhotoType::PHOTO_TYPE_MEDIUM_ID);
            $this->deletePhoto(PhotoType::PHOTO_TYPE_BIG_ID);

        } catch (Exception $e)
        {
            $transaction->rollback();
            Yii::log('Can not delete a file: ' . var_export($e->getMessage(), 1));
        }

        $transaction->commit();

    }

    public static function normalizePhoto($photo)
    {
        if (file_exists($photo))
        {
            $photoAttributes = getimagesize($photo);

            if (is_array($photoAttributes))
            {
                $width = isset($photoAttributes[0]) ? $photoAttributes[0] : 0;
                $height = isset($photoAttributes[1]) ? $photoAttributes[1] : 0;

                $returnWidth = (($width > PhotoUpload::GENERAL_DISPLAY_WIDTH) || empty($width)) ? PhotoUpload::GENERAL_DISPLAY_WIDTH : $width;
                $returnHeight = (($height > PhotoUpload::GENERAL_DISPLAY_HEIGHT) || empty($height)) ? PhotoUpload::GENERAL_DISPLAY_HEIGHT : $height;

                return array('width' => $returnWidth, 'height' => $returnHeight);
            }
        }
    }

}
