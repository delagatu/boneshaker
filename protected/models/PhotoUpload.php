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
    const THUMB_WIDTH = 105;

    const GENERAL_DISPLAY_WIDTH = 250;
    const GENERAL_DISPLAY_HEIGHT = 150;

    const MEDIUM_WIDTH =  500;
    const MEDIUM_HEIGHT =  300;

    const BIG_WIDTH =  600;
    const BIG_HEIGHT =  800;

    public $productId;
    public $photo;

    public static function model($className = __CLASS__)
    {
        return parent::model($className);
    }

    public function saveFiles($productId, Array $files = array())
    {
        $this->productId = $productId;

        $order = PhotoOrder::PHOTO_ORDER_PRIMARY_ID;
        foreach ($files as $file)
        {
            if ($file instanceof CUploadedFile)
            {
                $this->saveFile($file, $order);
                $order = PhotoOrder::PHOTO_ORDER_SECONDARY_ID;
            }
        }
    }

    private function saveFile(CUploadedFile $image, $order = PhotoOrder::PHOTO_ORDER_SECONDARY_ID)
    {
        $saveImage = Yii::app()->params['biciclesDir'] . '/' . $this->productId . time() . '.' . $image->getExtensionName();
        if ($image->saveAs($saveImage, true))
        {
            $this->photo = $this->newPhoto($order);
            $this->createBySize($saveImage, self::THUMB_HEIGHT, self::THUMB_WIDTH, $image->getExtensionName(), PhotoType::PHOTO_TYPE_THUMB_ID);
            $this->createBySize($saveImage, self::GENERAL_DISPLAY_HEIGHT, self::GENERAL_DISPLAY_WIDTH, $image->getExtensionName(), PhotoType::PHOTO_TYPE_GENERAL_DISPLAY_ID);
            $this->createBySize($saveImage, self::MEDIUM_HEIGHT, self::MEDIUM_WIDTH, $image->getExtensionName(), PhotoType::PHOTO_TYPE_MEDIUM_ID);
        }
    }
//
    private function createBySize($image, $width,$height, $ext, $type)
    {
        $imageResize = Yii::app()->image->load($image);
        $imageResize->resize($width, $height, Image::AUTO);
        $resize = Yii::app()->params['biciclesDir'] . '/' . md5(microtime()) . '.' . $ext;
        if ($imageResize->save($resize)) // or $image->save('images/small.jpg');
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
        $this->product_id = $this->productId;
        $this->order_id = $order;
        $this->saveThrowEx();
        return $this;
    }
}
