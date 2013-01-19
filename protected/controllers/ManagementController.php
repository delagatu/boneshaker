<?php

class ManagementController extends BaseController
{
    public function beforeAction($action)
    {
        if (!$this->hasPermission(BaseController::ROLE_AUTHORITY)) {
            $this->leave();
        } else {
            return true;
        }
    }

	public function actionError()
	{
		$this->render('error');
	}

	public function actionIndex()
	{

		$this->render('index');
	}

	public function actionView()
	{
		$this->render('view');
	}

    public function actionAdaugaBicicleta()
    {
        $addProductForm = new AddProductForm();

        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddProductForm', null);
            $addProductForm->attributes = $postData;

            if ($addProductForm->validate())
            {
                $productId = $addProductForm->saveProduct();

                if (!empty($productId))
                {
                    Yii::app()->user->setFlash('notification', 'Produs salvat.');
                    $this->redirect($this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::PAGE_ADD_BICYCLE_DETAILS, array('id' => $productId)));
                }
            }
        }

        $params = array(
            'addProductForm' => $addProductForm
        );

        $this->render(ControllerPagePartial::PARTIAL_ADD_BICYCLE_MAKER, $params);

    }

    public function actionAdaugaDetaliiBicicleta()
    {
        $id = Yii::app()->request->getQuery('id', null);
        $product = Product::getProductById($id);

        if (is_null($id) || is_null($product))
        {
            Yii::app()->user->setFlash('notification', 'Editarea detaliilor imposibila. Incearca mai tarziu sau contacteaza webmasterul.');
            Yii::app()->controller->redirect(Yii::app()->request->urlReferrer);
        }

        $addBicicleForm = new AddBicycleForm();

        $photoUpload = new PhotoUpload();
        $params = array(
            'photoUpload' => $photoUpload,
            'addBicicleForm' => $addBicicleForm,
        );

        $this->render(ControllerPagePartial::PAGE_ADD_BICYCLE, $params);
    }

    public function actionAdaugaProducator()
    {
        $addMakerForm = new AddMakerForm();
        $itemType = new ItemType();

        if (!isset($_POST['AddMakerForm']))
        {
            $params = array(
                'addMakerForm' => $addMakerForm,
                'itemType' => $itemType
            );

            $this->render(ControllerPagePartial::PAGE_ADD_MAKER, $params);
        } else {

            $addMakerForm->attributes = $_POST['AddMakerForm'];
            if ($addMakerForm->validate())
            {
                $addMakerForm->saveMaker();
                Yii::app()->user->setFlash('success', 'Producator salvat.');
            } else {
                Yii::app()->user->setFlash('success', 'Eroare!');
            }

            $this->redirect($this->createUrl('/' . ControllerPagePartial::CONTROLLER_MANAGEMENT));
        }

    }

    public function actionListaProducatoriValizi()
    {
        $maker = new Maker();

        $params = array(
            'maker' => $maker
        );

        $this->render(ControllerPagePartial::PAGE_MAKER_LIST, $params);

    }

    public function getMakerListActions($data)
    {
        $htmlOptions = array(
            'class' => 'deleteMaker'
        );

        $edit = CHtml::link('Editeaza', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::PAGE_EDIT_MAKER), $htmlOptions);
        $delete = CHtml::link('Invalideaza', $this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::PAGE_DELETE_MAKER, array('id' => $data->id)), $htmlOptions);

        return $edit . ' | ' . $delete;
    }

    public function actionInvalideazaProducator()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : NULL;

        if (!is_null($id)) {
            $invalidated = Maker::deleteMaker($id);

            $message = ($invalidated == 1) ? 'Producator invalidat.' : 'Eroare de invalidare.';

            Yii::app()->user->setFlash('success', $message);
            $this->redirect($this->createUrl('/' . ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::PAGE_MAKER_LIST));

        }

    }


}