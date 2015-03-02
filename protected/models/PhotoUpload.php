<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 11/6/12
 * Time: 8:25 PM
 * To change this template use File | Settings | File Templates.
 */
class PhotoUpload extends Photo
{

    const THUMB_HEIGHT = 63;
    const THUMB_WIDTH = 90;

//    const GENERAL_DISPLAY_WIDTH = 120;
//    const GENERAL_DISPLAY_HEIGHT = 75;

    const GENERAL_DISPLAY_WIDTH = 300;
    const GENERAL_DISPLAY_HEIGHT = 150;

    const MEDIUM_WIDTH =  300;
    const MEDIUM_HEIGHT =  200;

    const BIG_WIDTH =  800;
    const BIG_HEIGHT =  600;

    public $productId;
    public $photo;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function saveFiles($productId, $uploadDir, Array $files = array())
    {
        $this->productId = $productId;

        if (empty($files))
        {
            return;
        }

        $transaction = Yii::app()->db->beginTransaction();

        try {

        $order = PhotoOrder::PHOTO_ORDER_PRIMARY_ID;
        foreach ($files as $file)
        {
            if ($file instanceof CUploadedFile)
            {
                $this->saveFile($file, $uploadDir, $order);
                $order = PhotoOrder::PHOTO_ORDER_SECONDARY_ID;
            }
        }

        $transaction->commit();

        } catch (Exception $e)
        {
            Yii::log('Image resize error: ' . var_export($e->getMessage()));
            $transaction->rollback();
        }

    }

    public function saveMissingFile($file, $uploadDir, $width,$height, $type)
    {
        PhotoSource::deleteByType($this->photo->id, $type);
        if ($file instanceof CUploadedFile){

                $saveImage =  $uploadDir . '/' . $this->productId . time() . '.' . $file->getExtensionName();

                if ($file->saveAs($saveImage, true))
                {
                    $this->createBySize($saveImage, $uploadDir, $width,$height, $file->getExtensionName(), $type, $master = null);
                    unlink($saveImage);
                }
           }
    }

    private function saveFile(CUploadedFile $image, $uploadDir, $order = PhotoOrder::PHOTO_ORDER_SECONDARY_ID)
    {

        $saveImage =  $uploadDir . '/' . $this->productId . time() . '.' . $image->getExtensionName();
        if ($image->saveAs($saveImage, true))
        {
            $this->photo = $this->newPhoto($order);
            $this->createBySize($saveImage, $uploadDir, self::THUMB_WIDTH, self::THUMB_HEIGHT, $image->getExtensionName(), PhotoType::PHOTO_TYPE_THUMB_ID);
            $this->createBySize($saveImage, $uploadDir, self::GENERAL_DISPLAY_WIDTH, self::GENERAL_DISPLAY_HEIGHT, $image->getExtensionName(), PhotoType::PHOTO_TYPE_GENERAL_DISPLAY_ID, Image::HEIGHT);
            $this->createBySize($saveImage, $uploadDir, self::MEDIUM_WIDTH, self::MEDIUM_HEIGHT, $image->getExtensionName(), PhotoType::PHOTO_TYPE_MEDIUM_ID);
            $this->createBySize($saveImage, $uploadDir, self::BIG_WIDTH, self::BIG_HEIGHT, $image->getExtensionName(), PhotoType::PHOTO_TYPE_BIG_ID);
        }

        unlink($saveImage);

    }
//
    private function createBySize($image, $uploadDir, $width,$height, $ext, $type, $master = null)
    {
        $imageResize = Yii::app()->image->load($image);
        $imageResize->resize($width, $height, $master);
        $resize = $uploadDir . '/' . md5(microtime()) . '.' . $ext;
        if ($imageResize->save($resize))
        {
            $photoSource = new PhotoSource();
            $photoSource->photo_id = $this->photo->id;
            $photoSource->photo_source_path = $resize;
            $photoSource->photo_type_id = $type;
            $photoSource->saveThrowEx();
        }

    }

    /**
     * @param $photoType
     * @param int $order
     * @return Photo
     */
    private function newPhoto($order = PhotoOrder::PHOTO_ORDER_SECONDARY_ID)
    {
        $photo = new Photo();
        $photo->product_id = $this->productId;
        $photo->order_id = $order;
        $photo->saveThrowEx();
        return $photo;
    }
}
