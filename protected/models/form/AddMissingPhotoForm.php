<?php
/**
 * Created by JetBrains PhpStorm.
 * User: delegatu
 * Date: 2/25/13
 * Time: 9:23 PM
 * To change this template use File | Settings | File Templates.
 */
class AddMissingPhotoForm extends CFormModel
{

    public $photoId;
    public $photo;
    public $photos;
    public $photoUpload;
    public $photoTypeId;
    public $uploadedPhoto;

    public function rules()
    {
        return array(
            array('photoTypeId', 'required'),
            array('uploadedPhoto', 'file'),
            array('photoId', 'safe'),
        );
    }

    public function saveFiles()
    {
        $this->photoUpload = new PhotoUpload();

        $this->photo = Photo::getById($this->photoId);

        if ($this->photo instanceof Photo)
        {
            $this->photoUpload->photo = $this->photo;

            if (!$this->photo->hasByType($this->photoTypeId))
            {
                $photoType = PhotoType::getByTypeId($this->photoTypeId);

                if ($photoType instanceof PhotoType)
                {
                    $this->photoUpload->saveMissingFile($this->uploadedPhoto, $this->getUploadDir(), $photoType->photo_width, $photoType->photo_height, $this->photoTypeId);
                }
            }

        } else {
            Yii::log('Can not add the missing file: photo not found!', CLogger::LEVEL_ERROR);
        }

        unset($uploadedPhoto);
    }

    private function getUploadDir()
    {
        switch ($this->photo->product->getItemType())
        {
            case ItemType::ACCESORII:
                $dir =  Yii::app()->params['accessoryDir'];
                break;

            case ItemType::BICICLETE:
                $dir =  Yii::app()->params['biciclesDir'];
                break;

            case ItemType::ECHIPAMENTE:
                $dir =  Yii::app()->params['equipmentsDir'];
                break;

            default:
                $dir =  Yii::app()->params['defaultDir'];
        }

        return $dir;
    }

}
