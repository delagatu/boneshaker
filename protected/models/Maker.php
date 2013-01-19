<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 4/16/12
 * Time: 3:28 PM
 * To change this template use File | Settings | File Templates.
 */
class Maker extends MakerBase
{

    /**
     * @static
     * @param string $className
     * @return MakerBase
     */

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public static function getMakerByType($item_type_id)
    {

        return self::model()->findAll(array(
            'condition' => 'item_type_id=:item_type_id and available=:available',
            'params' => array(':item_type_id' => $item_type_id,
                'available' => 1,
            ),
        ));

    }

    public function searchMakerByType($itemTypeId)
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $name_sort = isset($_GET['Maker']['name_sort']) ? $_GET['Maker']['name_sort'] : NULL;

        $criteria = new CDbCriteria;
        $criteria->compare('item_type_id', $itemTypeId);
        $criteria->compare('available', 1);
        $criteria->addSearchCondition('name', $name_sort);

        $dataProvider = new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
            'sort' => array(
                'attributes' => array(
                    'defaultOrder' => 'name ASC',
                    'name_sort' => array(
                        'default' => 'name DESC',
                        'asc' => 'name ASC',
                        'desc' => 'name DESC'
                    ),
                ),
            ),
            'pagination' => array(
                'pageSize' => 5,
            ),
        ));

        return $dataProvider;
    }

    public static function deleteMaker($id)
    {
        return self::model()->updateByPk($id,
            array(
                'available' => 0
            )
        );
    }

}
