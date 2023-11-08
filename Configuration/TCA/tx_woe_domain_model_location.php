<?php
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

ExtensionManagementUtility::addToInsertRecords('tx_woe_domain_model_location');

return [
    'ctrl' => [
        'label' => 'title',
        'label_alt' => 'checkmarine, checktide, timezone',
        'title' => 'WOE Location',
        'prependAtCopy' => true,
        'hideAtCopy' => true,
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'origUid' => 't3_origuid',
        'editlock' => 'editlock',
        'type' => '0',
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'default_sortby' => 'title ASC',
        'sortby' => '',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
            'fe_group' => 'fe_group',
        ],
        'iconfile' => 'EXT:woe/Resources/Public/Icons/mimetypes-x-content-woe.svg',
        'searchFields' => 'uid,title,summary,info','person','experience','year','experience',
        'security' => [
            'ignorePageTypeRestriction' => true,
        ],
    ],
    'types' => [
        '0' => [
            'showitem' => '
                --palette--;Location;woe,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,
                --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;paletteAccess,
                --div--;Language,
                --palette--;;paletteLanguage,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                selected_categories,
            '
        ]
    ],
    'palettes' => [
        'woe' => [
            'showitem' => '
                title,timezone,--linebreak--,
                county,country,--linebreak--,
                lat,lng,--linebreak--,
                checkmarine,checktide,--linebreak--,
                images,--linebreak--,
                youtube,vimeo,--linebreak--,
                summary,--linebreak--,
                info,--linebreak--,
                liveweatherlink,livetidelink,--linebreak--,
                person,year,--linebreak--,
                experience,--linebreak--,
                instagram,
            '
        ],
        'paletteAccess' => [
            'showitem' => '
                hidden,--linebreak--,starttime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel,
                endtime;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel,
                --linebreak--, fe_group;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:fe_group_formlabel,
                --linebreak--,fe_login_mode,editlock,
            ',
        ],
        'paletteLanguage' => [
            'showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource,',
        ],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ],
                ],
                'default' => 0,
            ]
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
                'default' => ''
            ]
        ],
        'hidden' => [
            'exclude' => 1,
            'label' => 'Location visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'cruser_id' => [
            'label' => 'cruser_id',
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'pid' => [
            'label' => 'pid',
            'config' => [
                'type' => 'passthrough'
            ]
        ],
        'crdate' => [
            'label' => 'crdate',
            'config' => [
                'type' => 'passthrough',
            ]
        ],
        'tstamp' => [
            'label' => 'tstamp',
            'config' => [
                'type' => 'passthrough',
            ]
        ],

        'starttime' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:starttime_formlabel',
            'config' => [
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => 0,
            ]
        ],
        'endtime' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:endtime_formlabel',
            'config' => [
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime',
                'default' => 0,
            ]
        ],
        'fe_group' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.fe_group',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'size' => 5,
                'maxitems' => 20,
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.hide_at_login',
                        -1,
                    ],
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.any_login',
                        -2,
                    ],
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.usergroups',
                        '--div--',
                    ],
                ],
                'exclusiveKeys' => '-1,-2',
                'foreign_table' => 'fe_groups',
                'foreign_table_where' => 'ORDER BY fe_groups.title',
            ],
        ],
        'editlock' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:editlock',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                    ]
                ],
            ]
        ],
        'selected_categories' => [
            'exclude' => 1,
            'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:selected_categories',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectTree',
                'foreign_table' => 'sys_category',
                'foreign_table_where' => 'AND sys_category.sys_language_uid IN (0,-1) ORDER BY sys_category.title ASC',
                'size' => 20,
                'treeConfig' => [
                    'parentField' => 'parent',
                        'appearance' => [
                        'expandAll' => true,
                        'showHeader' => true,
                    ],
                ],
                'MM' => 'sys_category_record_mm',
                'MM_match_fields' => [
                    'fieldname' => 'categories',
                    'tablenames' => 'tx_woe_domain_model_location',
                ],
                'MM_opposite_field' => 'items',
                'foreign_table' => 'sys_category',
                'foreign_table_where' => ' AND (sys_category.sys_language_uid = 0 OR sys_category.l10n_parent = 0) ORDER BY sys_category.sorting',
                'size' => 10,
                'minitems' => 0,
                'maxitems' => 99,
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],

        'title' => [
            'exclude' => 1,
            'label' => 'Title',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'county' => [
            'exclude' => 1,
            'label' => 'County',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'country' => [
            'exclude' => 1,
            'label' => 'Country',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'lat' => [
            'exclude' => 1,
            'label' => 'Latitude',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'lng' => [
            'exclude' => 1,
            'label' => 'Longitude',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'timezone' => [
            'exclude' => 1,
            'label' => 'Timezone',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'checkmarine' => [
            'exclude' => 1,
            'label' => 'Check waves',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
                'items' => [
                    [
                        0 => '',
                        1 => '',
                    ]
                ],
            ]
        ],
        'checktide' => [
            'exclude' => 1,
            'label' => 'Check tides',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
                'items' => [
                    [
                        0 => '',
                        1 => '',
                    ]
                ],
            ]
        ],
        'images' => [
            'exclude' => 1,
            'label' => 'Image',
            'config' => ExtensionManagementUtility::getFileFieldTCAConfig(
                'images',
                [
                    'behaviour' => [
                        'allowLanguageSynchronization' => true,
                    ],
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
                    ],
                    // custom configuration for displaying fields in the overlay/reference table
                    // to use the image overlay palette instead of the basic overlay palette
                    'overrideChildTca' => [
                        'types' => [
                            '0' => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                            \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                                'showitem' => '
                                --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                                --palette--;;filePalette'
                            ],
                        ],
                    ],
                ],
                $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
            ),
        ],
        'youtube' => [
            'exclude' => 1,
            'label' => 'YouTube',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'vimeo' => [
            'exclude' => 1,
            'label' => 'Vimeo',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'summary' => [
            'exclude' => 1,
            'l10n_mode' => 'prefixLangTitle',
            'label' => 'Summary',
            'config' => [
                'type' => 'text',
                'enableRichtext' => false,
                'rows' => 3
            ]
        ],
        'info' => [
            'exclude' => 1,
            'l10n_mode' => 'prefixLangTitle',
            'label' => 'Description',
            'config' => [
                'type' => 'text',
                'enableRichtext' => true,
                'rows' => 6
            ]
        ],
        'person' => [
            'exclude' => 1,
            'label' => 'Person',
            'config' => [
                'type' => 'input',
                'eval' => 'trim'
            ]
        ],
        'year' => [
            'exclude' => 1,
            'label' => 'Year written',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'trim'
            ]
        ],
        'experience' => [
            'exclude' => 1,
            'l10n_mode' => 'prefixLangTitle',
            'label' => 'Experience',
            'config' => [
                'type' => 'text',
                'enableRichtext' => false,
                'rows' => 3
            ]
        ],
        'liveweatherlink' => [
            'exclude' => 1,
            'label' => 'Live weather',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'livetidelink' => [
            'exclude' => 1,
            'label' => 'Live tides',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
        'instagram' => [
            'exclude' => 1,
            'label' => 'Instagram',
            'config' => [
                'type' => 'input',
                'eval' => 'trim',
                'behaviour' => [
                    'allowLanguageSynchronization' => true,
                ],
            ]
        ],
    ],
];
