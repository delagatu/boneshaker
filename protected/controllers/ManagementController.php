<?php

class ManagementController extends BaseController
{
    public function beforeAction($action)
    {
        if (Yii::app()->request->getIsAjaxRequest() && !$this->hasPermission(BaseController::ROLE_AUTHORITY))
        {
            json::writeJSON('Nu esti autentificat!', false);
        }

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
        $addProductForm = new AddProductForm('addBicycle');
        $addProductForm->item_type_id = ItemType::BICICLETE;

        $id = Yii::app()->request->getQuery('id', null);

        if (!is_null($id))
        {
            $addProductForm->getDetails($id);
        }

        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddProductForm', null);
            $addProductForm->attributes = $postData;

            if ($addProductForm->validate())
            {
                $productId = $addProductForm->saveProduct();

                if (!empty($productId))
                {
                    Yii::app()->user->setFlash('success', 'Produs salvat.');
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
        $addBicicleForm->product_id = $id;
        $addBicicleForm->initBicycleDescription();

        if (Yii::app()->request->getIsPostRequest())
        {

            $addBicicleForm->attributes = Yii::app()->request->getPost('AddBicycleForm');

            if ($addBicicleForm->validate())
            {
                if ($addBicicleForm->saveDetails())
                {
                    Yii::app()->user->setFlash('success', 'Detalii salvate');
                }
            }
        }

        $params = array(
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
        $name = Yii::app()->request->getQuery('name');
        $itemType = Yii::app()->request->getQuery('id');

        $params = array('name' => $name, 'itemType' => $itemType);

        $this->render(ControllerPagePartial::PAGE_MAKER_LIST, $params);

    }

    public function actionInvalideazaProducator()
    {
        $id = isset($_GET['id']) ? $_GET['id'] : NULL;

        if (!is_null($id)) {
            $invalidated = Maker::deleteMaker($id);

            $message = ($invalidated == 1) ? 'Producator invalidat.' : 'Eroare de invalidare.';

            Yii::app()->user->setFlash('success', $message);
            $this->redirect($this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::ACTION_VALID_MAKER_LIST));

        }

    }

    public function actionListaBicicleta()
    {
        $product = new Product();
        $maker = Yii::app()->request->getQuery('maker_name_sort', null);
        $name = Yii::app()->request->getQuery('bicycle_name_sort', null);
        $price = Yii::app()->request->getQuery('price_sort', null);

        $params = array(
            'itemType' => ItemType::BICICLETE,
            'product' => $product,
            'maker' => $maker,
            'name' => $name,
            'price' => $price,
        );

        $this->render(ControllerPagePartial::PARTIAL_MANAGEMENT_BICYCLE_LIST, $params);
    }

    public function actionListaPieseAccesorii()
    {
        $product = new Product();
        $maker = Yii::app()->request->getQuery('maker_name_sort', null);
        $name = Yii::app()->request->getQuery('name_sort', null);
        $price = Yii::app()->request->getQuery('price_sort', null);

        $params = array(
            'itemType' => ItemType::ACCESORII,
            'product' => $product,
            'maker' => $maker,
            'name' => $name,
            'price' => $price,
        );

        $this->render(ControllerPagePartial::PARTIAL_MANAGEMENT_PA_LIST, $params);
    }

    public function actionListaComponente()
    {
        $product = new Product();
        $maker = Yii::app()->request->getQuery('maker_name_sort', null);
        $name = Yii::app()->request->getQuery('name_sort', null);
        $price = Yii::app()->request->getQuery('price_sort', null);

        $params = array(
            'itemType' => ItemType::COMPONENTE,
            'product' => $product,
            'maker' => $maker,
            'name' => $name,
            'price' => $price,
        );

        $this->render(ControllerPagePartial::PARTIAL_MANAGEMENT_COMPONENT_LIST, $params);
    }

    //

    public function actionListaEchipamente()
    {
        $product = new Product();
        $maker = Yii::app()->request->getQuery('maker_name_sort', null);
        $name = Yii::app()->request->getQuery('name_sort', null);
        $price = Yii::app()->request->getQuery('price_sort', null);

        $params = array(
            'itemType' => ItemType::ECHIPAMENTE,
            'product' => $product,
            'maker' => $maker,
            'name' => $name,
            'price' => $price,
        );

        $this->render(ControllerPagePartial::PARTIAL_MANAGEMENT_EQUIPMENT_LIST, $params);
    }


    public function actionDeleteProduct()
    {
        if (Yii::app()->request->getIsPostRequest())
        {
            $id = Yii::app()->request->getPost('id');

            $product = Product::getById($id);
            if (is_null($product))
            {
                json::writeJSON('Eroare: produs inexistent', false);
            }

            if (!$product->invalidate())
            {
                json::writeJSON('Eroare la stergere',false);
            }

            json::writeJSON(array('id' => $id), true);
        }
    }

    public function actionValidateProduct()
    {
        if (Yii::app()->request->getIsPostRequest())
        {
            $id = Yii::app()->request->getPost('id');
            $available = Yii::app()->request->getPost('available');

            $product = Product::getById($id);
            if (is_null($product))
            {
                json::writeJSON('Eroare: produs inexistent', false);
            }

            $product->available = $available;
            $product->saveThrowEx();
            Product::setUpdateDate($product->id);

            json::writeJSON(array('id' => $id,), true);
        }
    }

    public function actionAddFrame()
    {
        $addFrameForm = new AddFrameForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddFrameForm');
            $id = Yii::app()->request->getPost('id');

            $addFrameForm->attributes = $postData;
            if ($addFrameForm->validate())
            {
                $frame = $addFrameForm->saveFrame();
                $newValue = array('id' => $frame->id, 'name' => $frame->getMakerAndProduct());
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addFrame = $addFrameForm->generateForm();
        json::writeJSON($addFrame);
    }

    public function actionAddFork()
    {
        $addForkForm = new AddForkForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddForkForm');
            $id = Yii::app()->request->getPost('id');

            $addForkForm->attributes = $postData;
            if ($addForkForm->validate())
            {
                $fork = $addForkForm->saveFork();
                $newValue = array('id' => $fork->id, 'name' => $fork->getMakerAndProduct());
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addFork = $addForkForm->generateForm();
        json::writeJSON($addFork);
    }

    public function actionAddShifter()
    {
        $addShifterForm = new AddShifterForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddShifterForm');
            $id = Yii::app()->request->getPost('id');

            $addShifterForm->attributes = $postData;
            if ($addShifterForm->validate())
            {
                $shifter = $addShifterForm->saveShifter();
                $newValue = array('id' => $shifter->id, 'name' => $shifter->getMakerAndProduct());
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addShifer = $addShifterForm->generateForm();
        json::writeJSON($addShifer);
    }

    public function actionAddDerailleur()
    {
        $addDerailleurForm = new AddDerailleurForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddDerailleurForm');
            $id = Yii::app()->request->getPost('id');

            $addDerailleurForm->attributes = $postData;
            if ($addDerailleurForm->validate())
            {
                $derailleur = $addDerailleurForm->saveDerailleur();
                $newValue = array('id' => $derailleur->id, 'name' => $derailleur->getMakerAndProduct());
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addDerailleur = $addDerailleurForm->generateForm();
        json::writeJSON($addDerailleur);
    }

    public function actionAddBrakeLever()
    {
        $addBrakeLeverForm = new AddBrakeLeverForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddBrakeLeverForm');
            $id = Yii::app()->request->getPost('id');

            $addBrakeLeverForm->attributes = $postData;
            if ($addBrakeLeverForm->validate())
            {
                $brakeLever = $addBrakeLeverForm->saveBrakeLever();
                $newValue = array('id' => $brakeLever->id, 'name' => $brakeLever->getMakerAndProduct());
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addBrakeLever = $addBrakeLeverForm->generateForm();
        json::writeJSON($addBrakeLever);
    }

    public function actionAddBrakeSystem()
    {
        $addBrakeSystemForm = new AddBrakeSystemForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddBrakeSystemForm');
            $id = Yii::app()->request->getPost('id');

            $addBrakeSystemForm->attributes = $postData;
            if ($addBrakeSystemForm->validate())
            {
                $brakeSystem = $addBrakeSystemForm->saveBrakeSystem();
                $newValue = array('id' => $brakeSystem->id, 'name' => $brakeSystem->getMakerAndProduct());
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addBrakeSystem = $addBrakeSystemForm->generateForm();
        json::writeJSON($addBrakeSystem);
    }

    public function actionAddChainWheel()
    {
        $addChainWheelForm = new AddChainWheelForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddChainWheelForm');
            $id = Yii::app()->request->getPost('id');

            $addChainWheelForm->attributes = $postData;
            if ($addChainWheelForm->validate())
            {
                $chainWheel = $addChainWheelForm->saveChainWheel();
                $newValue = array('id' => $chainWheel->id, 'name' => $chainWheel->getMakerAndProduct());
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addChainWheel = $addChainWheelForm->generateForm();
        json::writeJSON($addChainWheel);
    }

    public function actionAddBBSet()
    {
        $addBBSetForm = new AddBBSetForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddBBSetForm');
            $id = Yii::app()->request->getPost('id');

            $addBBSetForm->attributes = $postData;
            if ($addBBSetForm->validate())
            {
                $bbSet = $addBBSetForm->saveBBSet();
                $newValue = array('id' => $bbSet->id, 'name' => $bbSet->getMakerAndProduct());
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addBBSet = $addBBSetForm->generateForm();
        json::writeJSON($addBBSet);
    }

    public function actionAddChain()
    {
        $addChainForm = new AddChainForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddChainForm');
            $id = Yii::app()->request->getPost('id');

            $addChainForm->attributes = $postData;
            if ($addChainForm->validate())
            {
                $chain = $addChainForm->saveChain();
                $newValue = array('id' => $chain->id, 'name' => $chain->getMakerAndProduct());
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addChain = $addChainForm->generateForm();
        json::writeJSON($addChain);
    }

    public function actionAddHub()
    {
        $addHubForm = new AddHubForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddHubForm');
            $id = Yii::app()->request->getPost('id');

            $addHubForm->attributes = $postData;
            if ($addHubForm->validate())
            {
                $hub = $addHubForm->saveHub();
                $newValue = array('id' => $hub->id, 'name' => $hub->getMakerAndProduct());
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addHub = $addHubForm->generateForm();
        json::writeJSON($addHub);
    }

    public function actionAddRim()
    {
        $addRimForm = new AddRimForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddRimForm');
            $id = Yii::app()->request->getPost('id');

            $addRimForm->attributes = $postData;
            if ($addRimForm->validate())
            {
                $rim = $addRimForm->saveRim();
                $newValue = array('id' => $rim->id, 'name' => $rim->getMakerAndProduct());
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addRim = $addRimForm->generateForm();
        json::writeJSON($addRim);
    }

    public function actionAddTire()
    {
        $addTireForm = new AddTireForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddTireForm');
            $id = Yii::app()->request->getPost('id');

            $addTireForm->attributes = $postData;
            if ($addTireForm->validate())
            {
                $tire = $addTireForm->saveTire();
                $newValue = array('id' => $tire->id, 'name' => $tire->getMakerAndProduct());
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addTire = $addTireForm->generateForm();
        json::writeJSON($addTire);
    }

    public function actionAddRearShock()
    {
        $addRearShockForm = new AddRearShockForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddRearShockForm');
            $id = Yii::app()->request->getPost('id');

            $addRearShockForm->attributes = $postData;
            if ($addRearShockForm->validate())
            {
                $rearShock = $addRearShockForm->saveRearShock();
                $newValue = array('id' => $rearShock->id, 'name' => $rearShock->getMakerAndProduct());
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addRearShock = $addRearShockForm->generateForm();
        json::writeJSON($addRearShock);

    }

    public function actionAddSize()
    {
        $addSizeForm = new AddSizeForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddSizeForm');
            $id = Yii::app()->request->getPost('id');

            $addSizeForm->attributes = $postData;
            if ($addSizeForm->validate())
            {
                $size = $addSizeForm->saveSize();
                $newValue = array('id' => $size->id, 'name' => $size->size);
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addSize = $addSizeForm->generateForm();
        json::writeJSON($addSize);
    }

    public function actionAddSpeed()
    {
        $addSpeedForm = new AddSpeedForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddSpeedForm');
            $id = Yii::app()->request->getPost('id');

            $addSpeedForm->attributes = $postData;
            if ($addSpeedForm->validate())
            {
                $speed = $addSpeedForm->saveSpeed();
                $newValue = array('id' => $speed->id, 'name' => $speed->name);
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addSize = $addSpeedForm->generateForm();
        json::writeJSON($addSize);
    }

    public function actionAddColor()
    {
        $addColorForm = new AddColorForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddColorForm');
            $id = Yii::app()->request->getPost('id');

            $addColorForm->attributes = $postData;
            if ($addColorForm->validate())
            {
                $color = $addColorForm->saveColor();
                $newValue = array('id' => $color->id, 'name' => $color->name);
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addSize = $addColorForm->generateForm();
        json::writeJSON($addSize);
    }

    public function actionAddWheelSize()
    {
        $addWheelSizeForm = new AddWheelSizeForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddWheelSizeForm');
            $id = Yii::app()->request->getPost('id');

            $addWheelSizeForm->attributes = $postData;
            if ($addWheelSizeForm->validate())
            {
                $wheelSize = $addWheelSizeForm->saveWheelSize();
                $newValue = array('id' => $wheelSize->id, 'name' => $wheelSize->name);
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addWheelSize = $addWheelSizeForm->generateForm();
        json::writeJSON($addWheelSize);
    }

    public function actionAddSubProduct()
    {
        $addSubProductForm = new AddSubProductForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddSubProductForm');
            $id = Yii::app()->request->getPost('id');

            $addSubProductForm->attributes = $postData;
            if ($addSubProductForm->validate())
            {
                $subProduct = $addSubProductForm->saveSubProduct();
                $newValue = array('id' => $subProduct->id, 'name' => $subProduct->name);
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addSubProduct = $addSubProductForm->generateForm();
        json::writeJSON($addSubProduct);
    }

    public function actionAddAcessoryType()
    {
        $addAccessoryTyepForm = new AddAccessoryTypeForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddAccessoryTypeForm');
            $id = Yii::app()->request->getPost('id');

            $addAccessoryTyepForm->attributes = $postData;
            if ($addAccessoryTyepForm->validate())
            {
                $accessoryType = $addAccessoryTyepForm->saveAccessoryType();
                $newValue = array('id' => $accessoryType->id, 'name' => $accessoryType->name);
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addAccessoryType = $addAccessoryTyepForm->generateForm();
        json::writeJSON($addAccessoryType);
    }

    public function actionAddComponentType()
    {
        $addComponentTypeForm = new AddComponentTypeForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddComponentTypeForm');
            $id = Yii::app()->request->getPost('id');

            $addComponentTypeForm->attributes = $postData;
            if ($addComponentTypeForm->validate())
            {
                $componentType = $addComponentTypeForm->saveComponentType();
                $newValue = array('id' => $componentType->id, 'name' => $componentType->name);
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addAccessoryType = $addComponentTypeForm->generateForm();
        json::writeJSON($addAccessoryType);
    }

    public function actionAddEquipmentType()
    {
        $addEquipmentTyepForm = new AddEquipmentTypeForm();
        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddEquipmentTypeForm');
            $id = Yii::app()->request->getPost('id');

            $addEquipmentTyepForm->attributes = $postData;
            if ($addEquipmentTyepForm->validate())
            {
                $equipmentType = $addEquipmentTyepForm->saveEquipmentType();
                $newValue = array('id' => $equipmentType->id, 'name' => $equipmentType->name);
                $response = array('productAdded' => 1, 'id'  => $id ,'newValue' => $newValue);
                json::writeJSON($response);
            }
        }

        $addEquipmentType = $addEquipmentTyepForm->generateForm();
        json::writeJSON($addEquipmentType);
    }

    public function actionValideazaProducator()
    {
        $id = Yii::app()->request->getPost('makerId');
        $validate = Yii::app()->request->getPost('valid');

        $maker = Maker::getById($id);
        if ($maker instanceof Maker)
        {
            $maker->available = $validate;
            $maker->saveThrowEx();
            json::writeJSON('OK');
        }

        json::writeJSON('Eroare interna: Producator invalid', false);
    }

    public function actionAdaugaPieseAccesorii()
    {
        $addProductForm = new AddProductForm('addAccessory');
        $addProductForm->item_type_id = ItemType::ACCESORII;

        $id = Yii::app()->request->getQuery('id', null);

        if (!is_null($id))
        {
            $addProductForm->getDetails($id);
        }

        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddProductForm', null);
            $addProductForm->attributes = $postData;

            if ($addProductForm->validate())
            {
                $productId = $addProductForm->saveProduct();

                if (!empty($productId))
                {
                    Yii::app()->controller->redirect($this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::ACTION_ADD, array('id' => $productId), true, 302));
                    Yii::app()->user->setFlash('success', 'Produs salvat.');
                }
            }
        }

        $params = array(
            'addProductForm' => $addProductForm
        );

        $this->render(ControllerPagePartial::PARTIAL_ADD_ACCESSORY_PIECES, $params);

    }

    public function actionAdaugaComponente()
    {
        $addProductForm = new AddProductForm('addComponent');
        $addProductForm->item_type_id = ItemType::COMPONENTE;

        $id = Yii::app()->request->getQuery('id', null);

        if (!is_null($id))
        {
            $addProductForm->getDetails($id);
        }

        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddProductForm', null);
            $addProductForm->attributes = $postData;

            if ($addProductForm->validate())
            {
                $productId = $addProductForm->saveProduct();

                if (!empty($productId))
                {
                    Yii::app()->user->setFlash('success', 'Produs salvat.');
                    Yii::app()->controller->redirect($this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::ACTION_ADD_COMPONENTS, array('id' => $productId), true, 302));
                }
            }
        }

        $params = array(
            'addProductForm' => $addProductForm
        );

        $this->render(ControllerPagePartial::PARTIAL_ADD_COMPONENTS, $params);

    }

    public function actionAdaugaEchipament()
    {
        $addProductForm = new AddProductForm('addEquipment');
        $addProductForm->item_type_id = ItemType::ECHIPAMENTE;

        $id = Yii::app()->request->getQuery('id', null);

        if (!is_null($id))
        {
            $addProductForm->getDetails($id);
        }

        if (Yii::app()->request->getIsPostRequest())
        {
            $postData = Yii::app()->request->getPost('AddProductForm', null);
            $addProductForm->attributes = $postData;

            if ($addProductForm->validate())
            {
                $productId = $addProductForm->saveProduct();

                if (!empty($productId))
                {
                    Yii::app()->controller->redirect($this->createUrl(ControllerPagePartial::CONTROLLER_MANAGEMENT . '/' . ControllerPagePartial::PAGE_ACTION_ADD_EQUIPMENT, array('id' => $productId)), true, 302);
                    Yii::app()->user->setFlash('success', 'Produs salvat.');
                }
            }
        }

        $params = array(
            'addProductForm' => $addProductForm
        );

        $this->render(ControllerPagePartial::PARTIAL_ADD_EQUIPMENT, $params);
    }

    public function actionAdaugaMarimeLipsa()
    {
        $photoId = Yii::app()->request->getQuery('id', null);
        $addMissingPhotoForm = new AddMissingPhotoForm();

        if (!is_null($photoId))
        {
            $addMissingPhotoForm->photoId = $photoId;
        }

        if (Yii::app()->request->getIsPostRequest())
        {
            $addMissingPhotoForm->attributes = Yii::app()->request->getPost('AddMissingPhotoForm');
            $addMissingPhotoForm->uploadedPhoto = CUploadedFile::getInstance($addMissingPhotoForm, 'uploadMissingFile');

            if ($addMissingPhotoForm->validate())
            {
                $addMissingPhotoForm->saveFiles();
                echo 'Poza adaugata!';
                return;
            }

        }

        $params = array(
            'addMissingPhotoForm' => $addMissingPhotoForm
        );

        $this->renderPartial(ControllerPagePartial::PARTIAL_ADD_MISSING_PHOTO, $params);

    }

    public function actionDisplayAllPhoto()
    {
        $id = Yii::app()->request->getQuery('id');
        $product = Product::getProductById($id);

        if ($product instanceof Product)
        {
            $photos =  Photo::getPhotoPerProduct($product->id);
        }

        if (!empty($photos))
        {
            foreach ($photos as $key => $photo) {
                $allPhoto[] = Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_PHOTOS, array('photo' => $photo), true, false);
            }
        }

        json::writeJSON($allPhoto);
    }

    public function actionDeleteAllPhoto()
    {
        $id = Yii::app()->request->getQuery('id', null);

        $photo = Photo::getById($id);

        if ($photo instanceof Photo)
        {

            $product = Product::getProductById($photo->product_id);

            $photo->deleteAllPhotoSource();
            $photo->deleteThrowEx();


            if ($product instanceof Product)
            {
                $photos =  Photo::getPhotoPerProduct($product->id);
            }


            if (!empty($photos))
            {
                $allPhoto = array();
                foreach ($photos as $key => $photo) {
                    $allPhoto[] = Yii::app()->controller->renderPartial(ControllerPagePartial::PARTIAL_PHOTOS, array('photo' => $photo), true, false);
                }

                json::writeJSON($allPhoto);
            }


        } else {
            Yii::log('Can not delete photo: no photo found', CLogger::LEVEL_INFO);
            json::writeJSON('Eroare interna', false);
        }

    }

    public function actionCategoriiBiciclete()
    {
        $name = Yii::app()->request->getQuery('name');

        if (Yii::app()->request->getIsPostRequest())
        {
            $addSubProductForm = new AddSubProductForm();
            $addSubProductForm->attributes = Yii::app()->request->getPost('AddSubProductForm');
            if ($addSubProductForm->validate())
            {
                $subProduct = $addSubProductForm->saveSubProduct();
                if ($subProduct instanceof SubProduct)
                {
                    Yii::app()->user->setFlash('success', 'Categorie adaugata.');
                } else {
                    Yii::log('ManagementController::addNewCategory: incorrect result.');
                    Yii::app()->user->setFlash('eroare', 'Eroare interna.');
                }

            }

        }

        $params = array(
            'name' => $name,
        );

        $this->render(ControllerPagePartial::PARTIAL_MANAGEMENT_VIEW_SUB_PRODUCT, $params);
    }

    public function actionCategoriiAccesorii()
    {
        $name = Yii::app()->request->getQuery('name');

        if (Yii::app()->request->getIsPostRequest())
        {
            $addAccessoryTypeForm = new AddAccessoryTypeForm();
            $addAccessoryTypeForm->attributes = Yii::app()->request->getPost('AddAccessoryTypeForm');
            if ($addAccessoryTypeForm->validate())
            {
                $accessoryType = $addAccessoryTypeForm->saveAccessoryType();
                if ($accessoryType instanceof AccessoryType)
                {
                    Yii::app()->user->setFlash('success', 'Categorie adaugata.');
                } else {
                    Yii::log('ManagementController::addNewCategory: incorrect result.');
                    Yii::app()->user->setFlash('eroare', 'Eroare interna.');
                }

            }

        }

        $params = array(
            'name' => $name,
        );

        $this->render(ControllerPagePartial::PARTIAL_MANAGEMENT_VIEW_ACCESSORY_TYPE, $params);
    }

    public function actionCategoriiComponente()
    {
        $name = Yii::app()->request->getQuery('name');

        if (Yii::app()->request->getIsPostRequest())
        {
            $addComponentTypeForm = new AddComponentTypeForm();
            $addComponentTypeForm->attributes = Yii::app()->request->getPost('AddComponentTypeForm');

            if ($addComponentTypeForm->validate())
            {
                $componentType = $addComponentTypeForm->saveComponentType();

                if ($componentType instanceof ComponentType)
                {
                    Yii::app()->user->setFlash('success', 'Categorie adaugata.');
                    Yii::app()->controller->redirect(Yii::app()->controller->createUrl('management/CategoriiComponente'));

                } else {
                    Yii::log('ManagementController::CategoriiComponent: incorrect result.', CLogger::LEVEL_ERROR);
                    Yii::app()->user->setFlash('eroare', 'Eroare interna.');
                }

            }

        }

        $params = array(
            'name' => $name,
        );

        $this->render(ControllerPagePartial::PARTIAL_MANAGEMENT_VIEW_COMPONENT_TYPE, $params);
    }

    public function actionCategoriiEchipamente()
    {
        $name = Yii::app()->request->getQuery('name');

        if (Yii::app()->request->getIsPostRequest())
        {
            $addEquipmentTypeForm = new AddEquipmentTypeForm();
            $addEquipmentTypeForm->attributes = Yii::app()->request->getPost('AddEquipmentTypeForm');
            if ($addEquipmentTypeForm->validate())
            {
                $addEquipmenType = $addEquipmentTypeForm->saveEquipmentType();
                if ($addEquipmenType instanceof EquipmentType)
                {
                    Yii::app()->user->setFlash('success', 'Categorie adaugata.');
                } else {
                    Yii::log('ManagementController::addNewCategory: incorrect result.');
                    Yii::app()->user->setFlash('eroare', 'Eroare interna.');
                }

            }

        }

        $params = array(
            'name' => $name,
        );

        $this->render(ControllerPagePartial::PARTIAL_MANAGEMENT_VIEW_EQUIPMENT_TYPE, $params);
    }

    public function actionValidateSubProduct()
    {
        if (Yii::app()->request->getIsPostRequest())
        {
            $id = Yii::app()->request->getPost('subProductId');
            $available = Yii::app()->request->getPost('available');

            $subProduct = SubProduct::getById($id);
            if (!$subProduct instanceof SubProduct)
            {
                json::writeJSON('Eroare interna. Incearca din nou.', false);
            }

            $subProduct->available = $available;
            $subProduct->saveThrowEx();

            json::writeJSON(array('id' => $id,), true);
        }
    }
    public function actionValidateAccessoryType()
    {
        if (Yii::app()->request->getIsPostRequest())
        {
            $id = Yii::app()->request->getPost('id');
            $available = Yii::app()->request->getPost('available');

            $accessoryType = AccessoryType::getById($id);
            if (!$accessoryType instanceof AccessoryType)
            {
                json::writeJSON('Eroare interna. Incearca din nou.', false);
            }

            $accessoryType->available = $available;
            $accessoryType->saveThrowEx();

            json::writeJSON(array('id' => $id,), true);
        }
    }

    public function actionValidateComponentType()
    {
        if (Yii::app()->request->getIsPostRequest())
        {
            $id = Yii::app()->request->getPost('id');
            $available = Yii::app()->request->getPost('available');

            $componentType = ComponentType::getById($id);
            if (!$componentType instanceof ComponentType)
            {
                json::writeJSON('Eroare interna. Incearca din nou.', false);
            }

            $componentType->available = $available;
            $componentType->saveThrowEx();

            json::writeJSON(array('id' => $id,), true);
        }
    }

    public function actionValidateEquipmentType()
    {
        if (Yii::app()->request->getIsPostRequest())
        {
            $id = Yii::app()->request->getPost('id');
            $available = Yii::app()->request->getPost('available');

            $equipmentType = EquipmentType::getById($id);
            if (!$equipmentType instanceof EquipmentType)
            {
                json::writeJSON('Eroare interna. Incearca din nou.', false);
            }

            $equipmentType->available = $available;
            $equipmentType->saveThrowEx();

            json::writeJSON(array('id' => $id,), true);
        }
    }

    public function actionProdusePrimaPagina()
    {
        $this->render(ControllerPagePartial::PARTIAL_MANAGEMENT_HOME_PAGE_PRODUCTS);
    }

    public function actionIsForHomePage()
    {
        if (Yii::app()->request->getIsPostRequest())
        {
            $id = Yii::app()->request->getPost('id');
            $available = Yii::app()->request->getPost('available');


            //todo: add / delete from HomePageProduct

            HomePageProduct::addDeleteProduct($id, $available);

            json::writeJSON(array('id' => $id,), true);
        }
    }


}