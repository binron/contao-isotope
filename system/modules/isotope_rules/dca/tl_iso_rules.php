<?php

/**
 * Isotope eCommerce for Contao Open Source CMS
 *
 * Copyright (C) 2009-2012 Isotope eCommerce Workgroup
 *
 * @package    Isotope
 * @link       http://www.isotopeecommerce.com
 * @license    http://opensource.org/licenses/lgpl-3.0.html LGPL
 *
 * @author     Andreas Schempp <andreas.schempp@terminal42.ch>
 * @author     Fred Bliss <fred.bliss@intelligentspark.com>
 * @author     Christian de la Haye <service@delahaye.de>
 */


/**
 * Table tl_iso_rules
 */
$GLOBALS['TL_DCA']['tl_iso_rules'] = array
(
    // Config
    'config' => array
    (
        'dataContainer'                     => 'Table',
        'ctable'                            => array('tl_iso_rule_restrictions'),
        'enableVersioning'                  => false,
        'onload_callback' => array
        (
            array('\Isotope\tl_iso_rules', 'loadAttributeValues'),
        ),
    ),

    // List
    'list' => array
    (
        'sorting' => array
        (
            'mode'                          => 1,
            'panelLayout'                   => 'filter;search,limit',
            'fields'                        => array('type', 'name'),
        ),
        'label'      => array
        (
            'fields'                        => array('name', 'code'),
            'label'                         => '%s <span style="color:#b3b3b3; padding-left:3px;">[%s]</span>',
        ),
        'global_operations' => array
        (
            'all' => array
            (
                'label'                     => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'                      => 'act=select',
                'class'                     => 'header_edit_all',
                'attributes'                => 'onclick="Backend.getScrollOffset();" accesskey="e"'
            )
        ),
        'operations' => array
        (
            'edit' => array
            (
                'label'                     => &$GLOBALS['TL_LANG']['tl_iso_rules']['edit'],
                'href'                      => 'act=edit',
                'icon'                      => 'edit.gif'
            ),
            'copy' => array
            (
                'label'                     => &$GLOBALS['TL_LANG']['tl_iso_rules']['copy'],
                'href'                      => 'act=copy',
                'icon'                      => 'copy.gif'
            ),
            'delete' => array
            (
                'label'                     => &$GLOBALS['TL_LANG']['tl_iso_rules']['delete'],
                'href'                      => 'act=delete',
                'icon'                      => 'delete.gif',
                'attributes'                => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
            ),
            'toggle' => array
            (
                'label'                     => &$GLOBALS['TL_LANG']['tl_iso_rules']['toggle'],
                'icon'                      => 'visible.gif',
                'attributes'                => 'onclick="Backend.getScrollOffset(); return AjaxRequest.toggleVisibility(this, %s);"',
                'button_callback'           => array('\Isotope\tl_iso_rules', 'toggleIcon'),
            ),
            'show' => array
            (
                'label'                     => &$GLOBALS['TL_LANG']['tl_iso_rules']['show'],
                'href'                      => 'act=show',
                'icon'                      => 'show.gif'
            )
        )
    ),

    // Palettes
    'palettes' => array
    (
        '__selector__'                      => array('type', 'applyTo', 'enableCode', 'configRestrictions', 'memberRestrictions', 'productRestrictions'),
        'default'                           => '{basic_legend},type',
        'product'                           => '{basic_legend},type,name,discount;{limit_legend:hide},limitPerMember,limitPerConfig,minItemQuantity,maxItemQuantity,quantityMode;{datim_legend:hide},startDate,endDate,startTime,endTime;{advanced_legend:hide},configRestrictions,memberRestrictions,productRestrictions;{enabled_legend},enabled',
        'cart'                              => '{basic_legend},type,applyTo,name,label,discount;{coupon_legend:hide},enableCode;{limit_legend:hide},limitPerMember,limitPerConfig,minSubtotal,maxSubtotal,minItemQuantity,maxItemQuantity,quantityMode;{datim_legend:hide},startDate,endDate,startTime,endTime;{advanced_legend:hide},configRestrictions,memberRestrictions,productRestrictions;{enabled_legend},enabled',
        'cartsubtotal'                      => '{basic_legend},type,applyTo,name,label,discount,tax_class;{coupon_legend:hide},enableCode;{limit_legend:hide},limitPerMember,limitPerConfig,minSubtotal,maxSubtotal,minItemQuantity,maxItemQuantity,quantityMode;{datim_legend:hide},startDate,endDate,startTime,endTime;{advanced_legend:hide},configRestrictions,memberRestrictions,productRestrictions;{enabled_legend},enabled',
    ),

    // Subpalettes
    'subpalettes' => array
    (
        'enableCode'                        => 'code',
        'configRestrictions'                => 'configs,configCondition',
        'memberRestrictions_guests'         => 'memberCondition',
        'memberRestrictions_groups'         => 'memberCondition,groups',
        'memberRestrictions_members'        => 'memberCondition,members',
        'productRestrictions_producttypes'  => 'productCondition,producttypes',
        'productRestrictions_pages'         => 'productCondition,pages',
        'productRestrictions_products'      => 'productCondition,products',
        'productRestrictions_variants'      => 'productCondition,variants',
        'productRestrictions_attribute'     => 'attributeName,attributeCondition,attributeValue',
    ),

    // Fields
    'fields' => array
    (
        'type' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['type'],
            'exclude'                       => true,
            'filter'                        => true,
            'default'                       => 'product',
            'inputType'                     => 'select',
            'options'                       => array('product', 'cart'),
            'reference'                     => &$GLOBALS['TL_LANG']['tl_iso_rules']['type'],
            'eval'                          => array('mandatory'=>true, 'submitOnChange'=>true, 'tl_class'=>'w50'),
        ),
        'name' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['name'],
            'exclude'                       => true,
            'search'                        => true,
            'inputType'                     => 'text',
            'eval'                          => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'clr w50')
        ),
        'label' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['label'],
            'exclude'                       => true,
            'search'                        => true,
            'inputType'                     => 'text',
            'eval'                          => array('maxlength'=>255, 'tl_class'=>'w50')
        ),
        'discount' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['discount'],
            'exclude'                       => true,
            'search'                        => true,
            'inputType'                     => 'text',
            'eval'                          => array('mandatory'=>true, 'maxlength'=>16, 'rgxp'=>'discount', 'tl_class'=>'clr w50')
        ),
        'tax_class' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['tax_class'],
            'exclude'                       => true,
            'filter'                        => true,
            'inputType'                     => 'select',
            'options_callback'              => array('\Isotope\Backend', 'getTaxClassesWithSplit'),
            'eval'                          => array('includeBlankOption'=>true, 'tl_class'=>'w50'),
        ),
        'applyTo' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['applyTo'],
            'exclude'                       => true,
            'default'                       => 'products',
            'inputType'                     => 'select',
            'options'                       => array('products', 'items', 'subtotal'),
            'reference'                     => &$GLOBALS['TL_LANG']['tl_iso_rules']['applyTo'],
            'eval'                          => array('mandatory'=>true, 'submitOnChange'=>true, 'tl_class'=>'w50')
        ),
        'enableCode' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['enableCode'],
            'exclude'                       => true,
            'filter'                        => true,
            'inputType'                     => 'checkbox',
            'eval'                          => array('submitOnChange'=>true)
        ),
        'code' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['code'],
            'exclude'                       => true,
            'search'                        => true,
            'inputType'                     => 'text',
            'eval'                          => array('mandatory'=>true, 'maxlength'=>255)
        ),
        'limitPerMember' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['limitPerMember'],
            'exclude'                       => true,
            'inputType'                     => 'text',
            'eval'                          => array('rgxp'=>'digit', 'maxlength'=>10, 'tl_class'=>'w50'),
        ),
        'limitPerConfig' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['limitPerConfig'],
            'exclude'                       => true,
            'inputType'                     => 'text',
            'eval'                          => array('rgxp'=>'digit', 'maxlength'=>10, 'tl_class'=>'w50'),
        ),
        'minSubtotal' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['minSubtotal'],
            'exclude'                       => true,
            'inputType'                     => 'text',
            'eval'                          => array('maxlength'=>10, 'rgxp'=>'digit', 'tl_class'=>'w50')
        ),
        'maxSubtotal' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['maxSubtotal'],
            'exclude'                       => true,
            'inputType'                     => 'text',
            'eval'                          => array('maxlength'=>10, 'rgxp'=>'digit', 'tl_class'=>'w50')
        ),
        'minItemQuantity' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['minItemQuantity'],
            'exclude'                       => true,
            'inputType'                     => 'text',
            'eval'                          => array('maxlength'=>10, 'rgxp'=>'digit', 'tl_class'=>'w50')
        ),
        'maxItemQuantity' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['maxItemQuantity'],
            'exclude'                       => true,
            'inputType'                     => 'text',
            'eval'                          => array('maxlength'=>10, 'rgxp'=>'digit', 'tl_class'=>'w50')
        ),
        'quantityMode' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['quantityMode'],
            'exclude'                       => true,
            'inputType'                     => 'select',
            'default'                       => 'product_quantity',
            'options'                       => array('product_quantity', 'cart_products', 'cart_items'),
            'reference'                     => &$GLOBALS['TL_LANG']['tl_iso_rules']['quantityMode'],
            'eval'                          => array('tl_class'=>'w50')
        ),
        'startDate' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['startDate'],
            'exclude'                       => true,
            'inputType'                     => 'text',
            'eval'                          => array('rgxp'=>'date', 'datepicker'=>(method_exists($this,'getDatePickerString') ? $this->getDatePickerString() : true), 'tl_class'=>'w50 wizard')
        ),
        'endDate' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['endDate'],
            'exclude'                       => true,
            'inputType'                     => 'text',
            'eval'                          => array('rgxp'=>'date', 'datepicker'=>(method_exists($this,'getDatePickerString') ? $this->getDatePickerString() : true), 'tl_class'=>'w50 wizard')
        ),
        'startTime' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['startTime'],
            'exclude'                       => true,
            'inputType'                     => 'text',
            'eval'                          => array('rgxp'=>'time', 'tl_class'=>'w50')
        ),
        'endTime' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['endTime'],
            'exclude'                       => true,
            'inputType'                     => 'text',
            'eval'                          => array('rgxp'=>'time', 'tl_class'=>'w50'),
        ),
        'configRestrictions' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['configRestrictions'],
            'inputType'                     => 'checkbox',
            'exclude'                       => true,
            'filter'                        => true,
            'eval'                          => array('submitOnChange'=>true, 'tl_class'=>'clr'),
        ),
        'configCondition' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['configCondition'],
            'exclude'                       => true,
            'inputType'                     => 'radio',
            'options'                       => array('' => $GLOBALS['TL_LANG']['tl_iso_rules']['condition_true'], '1' => $GLOBALS['TL_LANG']['tl_iso_rules']['condition_false']),
            'eval'                          => array('tl_class'=>'w50'),
        ),
        'configs' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['configs'],
            'exclude'                       => true,
            'inputType'                     => 'checkbox',
            'foreignKey'                    => 'tl_iso_config.name',
            'eval'                          => array('mandatory'=>true, 'multiple'=>true, 'doNotSaveEmpty'=>true, 'tl_class'=>'clr w50 w50h'),
            'load_callback' => array
            (
                array('\Isotope\tl_iso_rules', 'loadRestrictions'),
            ),
            'save_callback' => array
            (
                array('\Isotope\tl_iso_rules', 'saveRestrictions'),
            ),
        ),
        'memberRestrictions' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['memberRestrictions'],
            'inputType'                     => 'radio',
            'default'                       => 'none',
            'exclude'                       => true,
            'filter'                        => true,
            'options'                       => array('none', 'guests', 'groups', 'members'),
            'eval'                          => array('submitOnChange'=>true, 'tl_class'=>'clr w50 w50h'),
            'reference'                     => &$GLOBALS['TL_LANG']['tl_iso_rules']['memberRestrictions']
        ),
        'memberCondition' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['memberCondition'],
            'exclude'                       => true,
            'inputType'                     => 'radio',
            'options'                       => array('' => $GLOBALS['TL_LANG']['tl_iso_rules']['condition_true'], '1' => $GLOBALS['TL_LANG']['tl_iso_rules']['condition_false']),
            'eval'                          => array('tl_class'=>'w50'),
        ),
        'groups' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['groups'],
            'exclude'                       => true,
            'inputType'                     => 'checkbox',
            'foreignKey'                    => 'tl_member_group.name',
            'eval'                          => array('mandatory'=>true, 'multiple'=>true, 'doNotSaveEmpty'=>true, 'tl_class'=>'clr'),
            'load_callback' => array
            (
                array('\Isotope\tl_iso_rules', 'loadRestrictions'),
            ),
            'save_callback' => array
            (
                array('\Isotope\tl_iso_rules', 'saveRestrictions'),
            ),
        ),
        'members' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['members'],
            'exclude'                       => true,
            'inputType'                     => 'tableLookup',
            'eval' => array
            (
                'mandatory'                 => true,
                'doNotSaveEmpty'            => true,
                'tl_class'                  => 'clr',
                'foreignTable'              => 'tl_member',
                'fieldType'                 => 'checkbox',
                'listFields'                => array('firstname', 'lastname', 'username', 'email'),
                'searchFields'              => array('firstname', 'lastname', 'username', 'email'),
                'sqlWhere'                  => '',
                'searchLabel'               => 'Search members',
            ),
            'load_callback' => array
            (
                array('\Isotope\tl_iso_rules', 'loadRestrictions'),
            ),
            'save_callback' => array
            (
                array('\Isotope\tl_iso_rules', 'saveRestrictions'),
            ),
        ),
        'productRestrictions' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['productRestrictions'],
            'inputType'                     => 'radio',
            'default'                       => 'none',
            'exclude'                       => true,
            'filter'                        => true,
            'options'                       => array('none', 'producttypes', 'pages', 'products', 'variants', 'attribute'),
            'eval'                          => array('submitOnChange'=>true, 'tl_class'=>'clr w50 w50h'),
            'reference'                     => &$GLOBALS['TL_LANG']['tl_iso_rules']['productRestrictions']
        ),
        'productCondition' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['productCondition'],
            'exclude'                       => true,
            'inputType'                     => 'radio',
            'options'                       => array('' => $GLOBALS['TL_LANG']['tl_iso_rules']['condition_true'], '1' => $GLOBALS['TL_LANG']['tl_iso_rules']['condition_false']),
            'eval'                          => array('tl_class'=>'w50'),
        ),
        'producttypes' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['producttypes'],
            'exclude'                       => true,
            'inputType'                     => 'checkbox',
            'foreignKey'                    => 'tl_iso_producttypes.name',
            'eval'                          => array('mandatory'=>true, 'multiple'=>true, 'doNotSaveEmpty'=>true, 'tl_class'=>'clr'),
            'load_callback' => array
            (
                array('\Isotope\tl_iso_rules', 'loadRestrictions'),
            ),
            'save_callback' => array
            (
                array('\Isotope\tl_iso_rules', 'saveRestrictions'),
            ),
        ),
        'pages' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['pages'],
            'exclude'                       => true,
            'inputType'                     => 'pageTree',
            'foreignKey'                    => 'tl_page.title',
            'eval'                          => array('mandatory'=>true, 'multiple'=>true, 'fieldType'=>'checkbox', 'doNotSaveEmpty'=>true, 'tl_class'=>'clr'),
            'load_callback' => array
            (
                array('\Isotope\tl_iso_rules', 'loadRestrictions'),
            ),
            'save_callback' => array
            (
                array('\Isotope\tl_iso_rules', 'saveRestrictions'),
            ),
        ),
        'products'     => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['products'],
            'exclude'                       => true,
            'inputType'                     => 'tableLookup',
            'eval' => array
            (
                'mandatory'                 => true,
                'doNotSaveEmpty'            => true,
                'tl_class'                  => 'clr',
                'foreignTable'              => 'tl_iso_products',
                'fieldType'                 => 'checkbox',
                'listFields'                => array('type'=>'(SELECT name FROM tl_iso_producttypes WHERE tl_iso_products.type=tl_iso_producttypes.id)', 'name', 'sku'),
                'searchFields'              => array('name', 'alias', 'sku', 'description'),
                'sqlWhere'                  => 'pid=0',
                'searchLabel'               => 'Search products',
            ),
            'load_callback' => array
            (
                array('\Isotope\tl_iso_rules', 'loadRestrictions'),
            ),
            'save_callback' => array
            (
                array('\Isotope\tl_iso_rules', 'saveRestrictions'),
            ),
        ),
        'variants' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['variants'],
            'exclude'                       => true,
            'inputType'                     => 'productTree',
            'eval'                          => array('mandatory'=>true, 'fieldType'=>'checkbox', 'variants'=>true, 'doNotSaveEmpty'=>true, 'tl_class'=>'clr'),
            'load_callback' => array
            (
                array('\Isotope\tl_iso_rules', 'loadRestrictions'),
            ),
            'save_callback' => array
            (
                array('\Isotope\tl_iso_rules', 'saveRestrictions'),
            ),
        ),
        'attributeName' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['attributeName'],
            'exclude'                       => true,
            'inputType'                     => 'select',
            'options_callback'              => array('tl_iso_rules', 'getAttributeNames'),
            'eval'                          => array('mandatory'=>true, 'includeBlankOption'=>true, 'submitOnChange'=>true, 'tl_class'=>'clr w50'),
        ),
        'attributeCondition' => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['attributeCondition'],
            'exclude'                       => true,
            'inputType'                     => 'select',
            'options'                       => array('eq', 'neq', 'lt', 'gt', 'elt', 'egt', 'starts', 'ends', 'contains'),
            'reference'                     => &$GLOBALS['TL_LANG']['tl_iso_rules']['attributeCondition'],
            'eval'                          => array('mandatory'=>true, 'tl_class'=>'w50'),
        ),
        'attributeValue' => array
        (
            'exclude'                       => true,
            'eval'                          => array('decodeEntities'=>true, 'tl_class'=>'clr'),
        ),
        'enabled'    => array
        (
            'label'                         => &$GLOBALS['TL_LANG']['tl_iso_rules']['enabled'],
            'exclude'                       => true,
            'inputType'                     => 'checkbox',
            'exclude'                       => true,
            'filter'                        => true,
        )
    )
);
