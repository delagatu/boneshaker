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
    const PARTIAL_PRODUCT = '_product';

    const LAYOUTS = 'layouts';
    const PARTIAL_LAYOUT_MAIN_LEFT_MENU = '_mainLeftMenu';

    const CONTROLLER_BICYCLE = 'biciclete';
    const PAGE_BICYCLE_INDEX = 'index';
    const PAGE_BICYCLE_DETAIL = 'detalii';
    const PARTIAL_BICYCLE_DETAIL = '_detalii';
    const PARTIAL_BICYCLE = '_bicycle';

    const CONTROLLER_MANAGEMENT = 'management';

    // bicycle
    const PAGE_ADD_BICYCLE = 'adaugaBicicleta';
    const PAGE_ADD_BICYCLE_DETAILS = 'adaugaDetaliiBicicleta';
    const PARTIAL_ADD_BICYCLE_MAKER = 'adaugaProducatorBicicleta';
    const PARTIAL_ADD_BICYCLE = 'adaugaBicicleta';
    const VIEW_ALL_BICYCLE = 'listaBicicleta';

    // maker
    const ACTION_VALID_MAKER_LIST = 'listaProducatoriValizi';
    const PAGE_MAKER_LIST = 'listaProducatori';
    const PAGE_EDIT_MAKER = 'editareProducator';
    const PAGE_DELETE_MAKER = 'invalideazaProducator';
    const ACTION_ADD_MAKER = 'adaugaProducator';
    const PAGE_ADD_MAKER = 'adaugaProducator';

    // pieces & accessories
    const CONTOLLER_ACCESORY = 'accesorii';
    const ACTION_ADD = 'adaugaPieseAccesorii';
    const PAGE_ADD = 'adaugaPieseAccessorii';
    const ACTION_LIST_PA = 'listaPieseAccesorii';
    const PAGE_LIST_PA = 'listPieseAccesorii';
    const PAGE_ACCESSORY_VIEW = 'view';

    const CONTROLLER_EQUIPMENT = 'echipamente';
    const PAGE_EQUIPMENT_VIEW = 'view';

    const ADD_TO_CART = 'inCos';
}
