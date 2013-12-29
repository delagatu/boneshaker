<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Delegatu
 * Date: 9/29/12
 * Time: 12:55 PM
 * To change this template use File | Settings | File Templates.
 */
class ControllerPagePartial
{

    const CONTROLLER_SITE = 'site';
    const PAGE_SITE_INDEX = 'index';
    const PAGE_SITE_CONTACT = 'contact';
    const PAGE_SITE_VIEW = 'detaliiProdus';
    const PAGE_SITE_CAUTA = 'cauta';
    const PAGE_SITE_PARAMETRII_CAUTARE = 'parametriiCautare';
    const PAGE_SITE_CONFIRM_ACCOUNT = 'confirmaCont';
    const PAGE_SITE_CONFIRM_NEWSLETTER = 'confirmaNewsletter';
    const PAGE_SITE_WRONG_REGISTER = 'inscriereGresita';
    const PAGE_SITE_WRONG_NEWSLETTER = 'inscriereNewsLetterGresita';
    const PAGE_SITE_REGISTER_NEWSLETTER = 'inscriereNewsletter';
    const PAGE_SITE_TERMS_AND_CONDITIONS = 'termeniSiConditii';
    const PARTIAL_PRODUCT = '_product';
    const PARTIAL_FLASH_MESSAGES = '_flashMessages';
    const PARTIAL_OFFERS = '_offers';
    const PARTIAL_NEWSLETTER = '_newsletter';
    const PARTIAl_SITE_GENERAL_SEARCH_FORM = '_generalSearchForm';
    const PARTIAl_SITE_GENERAL_SEARCH = '_generalSearch';
    const PARTIAL_SITE_REGISTER = '_register';
    const PARTIAL_SITE_LOGIN = 'login';
    const PARTIAL_SITE_CONT_NOU = 'ContNou';
    const PARTIAL_SITE_TERMS_AND_CONDITIONS = '_termeniSiConditii';

    const LAYOUTS = 'layouts';
    const PARTIAL_LAYOUT_MAIN_LEFT_MENU = '_mainLeftMenu';

    const CONTROLLER_BICYCLE = 'biciclete';
    const PAGE_BICYCLE_INDEX = 'index';
    const PAGE_BICYCLE_DETAIL = 'detalii';
    const PAGE_ACCESSORY_DETAIL = 'detalii';
    const PARTIAL_BICYCLE_DETAIL = '_detalii';
    const PARTIAL_ACCESSORY_DETAIL = '_detalii';
    const PARTIAL_BICYCLE_DESCRIPTION = '_description';
    const PARTIAL_BICYCLE_LIMITED_DESCRIPTION = '_limitedDescription';
    const PARTIAL_BICYCLE_SUB_PRODUCT = '_categorii';
    const PARTIAL_BICYCLE_SUB_PRODUCT_NO_MAKER = '_categoriiNoMaker';

    const CONTROLLER_MANAGEMENT = 'management';

    // bicycle
    const PAGE_ADD_BICYCLE = 'adaugaBicicleta';
    const PAGE_ADD_BICYCLE_DETAILS = 'adaugaDetaliiBicicleta';
    const PARTIAL_ADD_BICYCLE_MAKER = 'adaugaProducatorBicicleta';
    const PARTIAL_ADD_BICYCLE = 'adaugaBicicleta';
    const PARTIAL_MANAGEMENT_BICYCLE_LIST = '_listaBiciclete';
    const PARTIAL_MANAGEMENT_PA_LIST = '_listaPieseAccessorii';
    const PARTIAL_MANAGEMENT_COMPONENT_LIST = '_listaComponente';
    const PARTIAL_MANAGEMENT_EQUIPMENT_LIST = '_listaEchipamente';
    const VIEW_ALL_BICYCLE = 'listaBicicleta';
    const PAGE_MANAGEMENT_ADD_FRAME = 'addFrame';
    const PAGE_MANAGEMENT_SUB_PRODUCT = 'addSubProduct';
    const PAGE_MANAGEMENT_ACCESSORY_TYPE = 'addAcessoryType';
    const PAGE_MANAGEMENT_ACCESSORY_SUB_TYPE = 'addAcessorySubType';
    const PAGE_MANAGEMENT_COMPONENT_TYPE = 'addComponentType';
    const PAGE_MANAGEMENT_EQUIPMENT_TYPE = 'addEquipmentType';
    const PAGE_MANAGEMENT_ADD_FORK = 'addFork';
    const PAGE_MANAGEMENT_ADD_SHIFTER = 'addShifter';
    const PAGE_MANAGEMENT_ADD_DERAILLEUR = 'addDerailleur';
    const PAGE_MANAGEMENT_ADD_BRAKE_LEVER = 'addBrakeLever';
    const PAGE_MANAGEMENT_ADD_BRAKE_SYSTEM = 'addBrakeSystem';
    const PAGE_MANAGEMENT_ADD_CHAIN_WHEEL = 'addChainWheel';
    const PAGE_MANAGEMENT_ADD_BB_SET = 'addBBSet';
    const PAGE_MANAGEMENT_ADD_CHAIN = 'addChain';
    const PAGE_MANAGEMENT_ADD_HUB = 'addHub';
    const PAGE_MANAGEMENT_ADD_RIM = 'addRim';
    const PAGE_MANAGEMENT_ADD_TIRE = 'addTire';
    const PAGE_MANAGEMENT_ADD_REAR_SHOCK = 'addRearShock';
    const PAGE_MANAGEMENT_ADD_WHEEL_SIZE = 'addWheelSize';
    const PAGE_MANAGEMENT_ADD_SIZE = 'addSize';
    const PAGE_MANAGEMENT_ADD_SPEED = 'addSpeed';
    const PAGE_MANAGEMENT_ADD_COLOR = 'addColor';
    const PAGE_MANAGEMENT_EDIT_PRODUCT = 'editeazaProdus';
    const PAGE_MANAGEMENT_ADD_MISSING_PHOTO = 'adaugaMarimeLipsa';
    const PAGE_MANAEMENT_DISPLAY_ALL_PHOTO = 'displayAllPhoto';
    const PAGE_MANAEMENT_DELETE_ALL_PHOTO = 'deleteAllPhoto';
    const PAGE_MANAGEMENT_VIEW_SUB_PRODUCT = 'categoriiBiciclete';
    const PAGE_MANAGEMENT_VIEW_ACCESSORY_TYPE = 'categoriiAccesorii';
    const PAGE_MANAGEMENT_VIEW_ACCESSORY_SUB_TYPE = 'subCategoriiAccesorii';
    const PAGE_MANAGEMENT_VIEW_EQUIPMENT_TYPE = 'categoriiEchipamente';
    const PAGE_MANAGEMENT_VALIDATE_SUB_PRODUCT = 'validateSubProduct';
    const PAGE_MANAGEMENT_VALIDATE_ACCESSORY_SUB_TYPE = 'validateAccessorySubType';
    const PAGE_MANAGEMENT_VALIDATE_ACCESSORY_TYPE = 'validateAccessoryType';
    const PAGE_MANAGEMENT_VALIDATE_EQUIPMENT_TYPE = 'validateEquipmentType';
    const PAGE_MANAGEMENT_VALIDATE_COMPONENT_TYPE = 'validateComponentType';
    const PAGE_MANAGEMENT_HOME_PAGE_PRODUCTS = 'produsePrimaPagina';
    const PAGE_MANAGEMENT_COMPONENT_CATEGORY = 'categoriiComponente';
    const PARTIAL_ADD_FRAME = '_adaugaCadru';
    const PARTIAL_ADD_FORK = '_adaugaFurca';
    const PARTIAL_ADD_DERAILLEUR = '_adaugaSchimbator';
    const PARTIAL_ADD_BRAKE_LEVER = '_adaugaManetaFrana';
    const PARTIAL_ADD_BB_SET = '_adaugaButucPedalier';
    const PARTIAL_ADD_RIM = '_adaugaJanta';
    const PARTIAL_ADD_TIRE = '_adaugaAnvelopa';
    const PARTIAL_ADD_REAR_SHOCK = '_adaugaSuspensieSpate';
    const PARTIAL_ADD_HUB = '_adaugaButuc';
    const PARTIAL_ADD_CHAIN = '_adaugaLant';
    const PARTIAL_ADD_BRAKE_SYSTEM = '_adaugaFrana';
    const PARTIAL_ADD_CHAIN_WHEEL = '_adaugaPedalier';
    const PARTIAL_ADD_SHIFTER = '_adaugaManetaSchimbator';
    const PARTIAL_ADD_SIZE = '_addSize';
    const PARTIAL_ADD_SPEED = '_addSpeed';
    const PARTIAL_ADD_COLOR = '_addColor';
    const PARTIAL_ADD_WHEEL_SIZE = '_addWheelSize';
    const PARTIAL_ADD_SUB_PRODUCT = '_addSubProduct';
    const PARTIAL_ADD_ACCESSORY_TYPE = '_addAccessoryTpe';
    const PARTIAL_ADD_ACCESSORY_SUB_TYPE = '_addAccessorySubType';
    const PARTIAL_ADD_COMPONENT_TYPE = '_addComponentType';
    const PARTIAL_ADD_EQUIPMENT_TYPE = '_addEquipmentType';
    const PARTIAL_PHOTOS = '_photos';
    const PARTIAL_ADD_MISSING_PHOTO = '_addMissingPhoto';
    const PARTIAL_MANAGEMENT_VIEW_SUB_PRODUCT = '_categoriiBiciclete';
    const PARTIAL_MANAGEMENT_VIEW_ACCESSORY_TYPE = '_categoriiAccesorii';
    const PARTIAL_MANAGEMENT_VIEW_ACCESSORY_SUB_TYPE = '_subCategoriiAccesorii';
    const PARTIAL_MANAGEMENT_VIEW_COMPONENT_TYPE = '_categoriiComponente';
    const PARTIAL_MANAGEMENT_VIEW_EQUIPMENT_TYPE = '_categoriiEchipamente';
    const PARTIAL_MANAGEMENT_HOME_PAGE_PRODUCTS = '_produsePrimaPagina';

    // maker
    const ACTION_VALID_MAKER_LIST = 'listaProducatoriValizi';
    const PAGE_MAKER_LIST = 'listaProducatori';
    const PAGE_EDIT_MAKER = 'editareProducator';
    const PAGE_DELETE_MAKER = 'invalideazaProducator';
    const PAGE_VALIDATE_MAKER = 'valideazaProducator';
    const ACTION_ADD_MAKER = 'adaugaProducator';
    const PAGE_ADD_MAKER = 'adaugaProducator';

    // pieces & accessories
    const CONTOLLER_ACCESORY = 'accesorii';
    const ACTION_ADD = 'adaugaPieseAccesorii';
    const ACTION_ADD_COMPONENTS = 'adaugaComponente';
    const PAGE_ADD = 'adaugaPieseAccessorii';
    const ACTION_LIST_PA = 'listaPieseAccesorii';
    const PAGE_LIST_PA = 'listPieseAccesorii';
    const PAGE_ACCESSORY_VIEW = 'view';
    const PAGE_ACCESSORY_INDEX = 'index';
    const PAGE_EQUIPMENT_INDEX = 'index';
    const PARTIAL_ADD_ACCESSORY_PIECES = '_adaugaAccesoriiPiese';

    const CONTROLLER_COMPONENTE = 'componente';
    const PAGE_COMPONENTE_INDEX = 'index';
    const PAGE_COMPONENTE_DETAIL = 'detalii';
    const ACTION_LIST_COMPONENTS = 'listaComponente';
    const PARTIAL_ADD_COMPONENTS = '_adaugaComponente';

    const CONTROLLER_EQUIPMENT = 'echipamente';
    const PAGE_EQUIPMENT_VIEW = 'view';
    const PAGE_EQUIPMENT_DETAIL = 'detalii';
    const PAGE_EQUIPMENT_LIST = 'listaEchipamente';
    const PAGE_ACTION_ADD_EQUIPMENT = 'adaugaEchipament';
    const PARTIAL_ADD_EQUIPMENT = '_adaugaEchipament';
    const PARTIAL_EQUIPMENT_DETAIL = '_detalii';

    const ADD_TO_CART = 'inCos';

    //products
    const PAGE_DELETE_PRODUCT = 'deleteProduct';
    const PAGE_VALIDATE_PRODUCT = 'validateProduct';
    const PAGE_IS_FOR_HOME_PAGE = 'isForHomePage';

    const CONTROLLER_MAINTENANCE = 'maintenance';
    const PAGE_MAINTENANCE_INDEX = 'index';
    const PAGE_MAINTENANCE_GENERATE_KEYWORDS = 'generateKeywords';
    const PARTIAL_MAINTENANCE_INDEX = 'index';
    const PARTIAL_MAINTENANCE_GENERATE_KEYWORDS = 'generateKeywords';


    const MAIL_REGISTER_USER = 'registerUser';
    const MAIL_REGISTER_USER_NEWSLETTER = 'registerUserNewsletter';
    const MAIL_SITE_ERROR = 'siteError';
}
