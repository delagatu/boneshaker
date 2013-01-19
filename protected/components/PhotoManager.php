<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 11/6/12
 * Time: 8:22 PM
 * To change this template use File | Settings | File Templates.
 */
class PhotoManager
{

    const THUMB_HEIGHT = 63;
    const THUMB_WIDTH = 105;

    const GENERAL_DISPLAY_WIDTH = 250;
    const GENERAL_DISPLAY_HEIGHT = 150;

    const MEDIUM_WIDTH =  500;
    const MEDIUM_HEIGHT =  300;

    const BIG_WIDTH =  600;
    const BIG_HEIGHT =  800;

    public function saveFiles($productId)
    {
        $images = CUploadedFile::getInstancesByName('addBicycle');

        foreach ($images as $image)
        {
            if ($image instanceof CUploadedFile)
            {
                $this->saveFile($image);
            }
        }
    }

    private function saveFile(CUploadedFile $image)
    {
        $image->saveAs(Yii::app()->params['biciclesDir'] . '/' . $image->getName(), true);
        $this->createBySize($image, self::BIG_HEIGHT, self::BIG_WIDTH);
    }

    private function createBySize($image, $width,$height,$type, $productId)
    {
        $imageResize = Yii::app()->image->load(Yii::app()->params['biciclesDir'] . '/' . $image->getName());
        $imageResize->resize($width, $height, Image::AUTO);
        $imageName = time() . '.' . $image->getExtensionName();
        $imageResize->save(Yii::app()->params['biciclesDir'] . '/' . $imageName); // or $image->save('images/small.jpg');
    }
}
