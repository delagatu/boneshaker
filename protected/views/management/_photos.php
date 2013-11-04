<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/colorbox.css"/>
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->request->baseUrl . '/javascript/photos_management.js');
?>

<div class = 'grid_9 prepend-top-10'>
    <table>
        <tr>
            <th><?php $phototype = PhotoType::getByTypeId(PhotoType::PHOTO_TYPE_THUMB_ID); echo ($phototype instanceof PhotoType) ? $phototype->getWidthAndHeight() : ''; ?></th>
            <th><?php $phototype = PhotoType::getByTypeId(PhotoType::PHOTO_TYPE_GENERAL_DISPLAY_ID); echo ($phototype instanceof PhotoType) ? $phototype->getWidthAndHeight() : ''; ?></th>
            <th><?php $phototype = PhotoType::getByTypeId(PhotoType::PHOTO_TYPE_MEDIUM_ID); echo ($phototype instanceof PhotoType) ? $phototype->getWidthAndHeight() : ''; ?></th>
            <th><?php $phototype = PhotoType::getByTypeId(PhotoType::PHOTO_TYPE_BIG_ID); echo ($phototype instanceof PhotoType) ? $phototype->getWidthAndHeight() : ''; ?></th>
        </tr>
        <tr>
            <td>
                <?php
                $image = CHtml::image($photo->getSourceByType(PhotoType::PHOTO_TYPE_THUMB_ID), 'Marime lipsa');

                if ($photo->hasByType(PhotoType::PHOTO_TYPE_THUMB_ID))
                {
                    echo Chtml::link($image, $photo->getSourceByType(PhotoType::PHOTO_TYPE_THUMB_ID), array('class' => 'gallery_edit'));
                } else {
                    echo $image;
                }

                ?>
            </td>
            <td>
                <?php
                $image =  CHtml::image($photo->getSourceByType(PhotoType::PHOTO_TYPE_GENERAL_DISPLAY_ID), 'Marime lipsa' );

                if ($photo->hasByType(PhotoType::PHOTO_TYPE_GENERAL_DISPLAY_ID))
                {
                    echo Chtml::link($image, $photo->getSourceByType(PhotoType::PHOTO_TYPE_GENERAL_DISPLAY_ID), array('class' => 'gallery_edit'));
                } else
                {
                    echo $image;
                }
                ?>
            </td>
            <td>
                <?php
                $image =  CHtml::image($photo->getSourceByType(PhotoType::PHOTO_TYPE_MEDIUM_ID), 'Marime lipsa', array('width' => 120, 'height' => 75));

                if ($photo->hasByType(PhotoType::PHOTO_TYPE_MEDIUM_ID))
                {
                    echo Chtml::link($image, $photo->getSourceByType(PhotoType::PHOTO_TYPE_MEDIUM_ID), array('class' => 'gallery_edit'));
                } else
                {
                    echo $image;
                }
                ?>
            </td>
            <td>
                <?php
                $image = CHtml::image($photo->getSourceByType(PhotoType::PHOTO_TYPE_BIG_ID), 'Marime lipsa', array('width' => 120, 'height' => 75));

                if ($photo->hasByType(PhotoType::PHOTO_TYPE_BIG_ID))
                {
                    echo Chtml::link($image, $photo->getSourceByType(PhotoType::PHOTO_TYPE_BIG_ID), array('class' => 'gallery_edit'));
                } else {
                    echo $image;
                }
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                &nbsp;
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <?php
                    echo Chtml::link('Adauga marime lipsa', 'javascript:',
                        array(
                            'class' => 'add-missing-photo action-link',
                            'data-add-photo-url' => Yii::app()->controller->createUrl(ControllerPagePartial::PAGE_MANAGEMENT_ADD_MISSING_PHOTO, array('id' => $photo->id)),
                            'data-all-photo-url' => Yii::app()->controller->createUrl(ControllerPagePartial::PAGE_MANAEMENT_DISPLAY_ALL_PHOTO, array('id' => $photo->product_id)),
                        )
                    );
                ?>
            </td>
            <td colspan="2">
                <?php
                    echo Chtml::link('Sterge poza', 'javascript:',
                        array(
                            'class' => 'delete-photo action-link',
                            'data-delete-photo' => Yii::app()->controller->createUrl(ControllerPagePartial::PAGE_MANAEMENT_DELETE_ALL_PHOTO, array('id' => $photo->id))
                        )
                    );
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="4">
                <hr />
            </td>
        </tr>
    </table>

</div>
<div id = 'dialog' class="hidden"></div>
