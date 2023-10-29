<?php

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Utility\ExtensionUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Imaging\IconRegistry;
use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

defined('TYPO3') || die('Access denied.');

(function () {
    $iconRegistry = GeneralUtility::makeInstance(IconRegistry::class);
    $iconRegistry->registerIcon(
        'mimetypes-x-content-woe',SvgIconProvider::class,
        ['source' => 'EXT:woe/Resources/Public/Icons/mimetypes-x-content-woe.svg']
    );

    $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['tslib/class.tslib_fe.php']['contentPostProc-output'][] =
    ContentPostProcessor::class . '->render';

    ExtensionUtility::configurePlugin(
        'woe',
        'Woe',
        [
            'Woe' => 'woe'
        ]
    );
})();
