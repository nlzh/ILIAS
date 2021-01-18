<?php
use ILIAS\GlobalScreen\Scope\Layout\Provider\AbstractModificationProvider;
use ILIAS\GlobalScreen\Scope\Layout\Provider\ModificationProvider;
use ILIAS\GlobalScreen\ScreenContext\Stack\ContextCollection;
use ILIAS\GlobalScreen\ScreenContext\Stack\CalledContexts;
use ILIAS\GlobalScreen\Scope\Layout\Factory\MainBarModification;
use ILIAS\UI\Component\MainControls\MainBar;
use ILIAS\GlobalScreen\Scope\Layout\Factory\MetaBarModification;
use ILIAS\UI\Component\MainControls\MetaBar;
use ILIAS\GlobalScreen\Scope\Layout\Factory\FooterModification;
use ILIAS\UI\Component\MainControls\Footer;
use ILIAS\GlobalScreen\Scope\Layout\Factory\BreadCrumbsModification;
use ILIAS\UI\Component\Breadcrumbs\Breadcrumbs;
use ILIAS\GlobalScreen\Scope\Layout\Factory\ContentModification;
use ILIAS\UI\Component\Legacy\Legacy;

use ILIAS\GlobalScreen\Scope\Layout\Provider\PagePart\PagePartProvider;
use ILIAS\GlobalScreen\Scope\Layout\Builder\StandardPageBuilder;
use ILIAS\GlobalScreen\Scope\Layout\Factory\PageBuilderModification;
use ILIAS\UI\Component\Layout\Page\Page;
use ILIAS\Data\URI;

/**
 * Class ilCourseEditModeProvider
 *
 * @author Nils Haagen <nils.haagen@concepts-and-training.de>
 */
class ilCourseEditModeProvider extends AbstractModificationProvider implements ModificationProvider
{
    const CRS_EDITMODE_BACKLINK = 'crs_pageeditor_backlink';
    const CRS_EDITMODE_BACKLINK_LABEL = 'crs_pageeditor_backlink_label';

    /**
     * @var Collection | null
     */
    protected $data_collection;

    /**
     * @inheritDoc
     */
    public function isInterestedInContexts() : ContextCollection
    {
        return $this->context_collection->main();
    }

    protected function getEditModeBacklink(CalledContexts $screen_context_stack) : ?URI
    {
        $this->data_collection = $screen_context_stack->current()->getAdditionalData();
        $lnk = $this->data_collection->get(self::CRS_EDITMODE_BACKLINK);
        if (!$lnk) {
            return null;
        }
        
        $uri = str_replace($_SERVER['REQUEST_URI'], $lnk, $_SERVER['HTTP_REFERER']);
        return new URI($uri);
    }

    protected function getEditModeBacklinkLabel() : string
    {
        $label = $this->data_collection->get(self::CRS_EDITMODE_BACKLINK_LABEL);
        if (!$label) {
            $label = 'close';
        }
        return $label;
    }

    public function getMainBarModification(CalledContexts $screen_context_stack) : ?MainBarModification
    {
        if (!$this->getEditModeBacklink($screen_context_stack)) {
            return null;
        }
        return $this->globalScreen()->layout()->factory()->mainbar()
            ->withModification(
                function (MainBar $mainbar) : ?MainBar {
                    $tools = $mainbar->getToolEntries();
                    $mainbar = $mainbar->withClearedEntries();
                    foreach ($tools as $key => $entry) {
                        $mainbar = $mainbar->withAdditionalEntry($key, $entry);
                    }
                    return $mainbar;
                }
            )
            ->withHighPriority();
    }

    public function getMetaBarModification(CalledContexts $screen_context_stack) : ?MetaBarModification
    {
        $lnk = $this->getEditModeBacklink($screen_context_stack);
        if (!$lnk) {
            return null;
        }

        $label = $this->getEditModeBacklinkLabel();

        return $this->globalScreen()->layout()->factory()->metabar()
            ->withModification(
                function (MetaBar $metabar) use ($label, $lnk) : ?Metabar {
                    $f = $this->dic['ui.factory'];
                    $exit = $f->button()->bulky(
                        $f->symbol()->glyph()->close(),
                        $label,
                        $lnk
                    );

                    $metabar = $metabar->withClearedEntries();
                    $metabar = $metabar->withAdditionalEntry('exit', $exit);
                    return $metabar;
                }
            )
            ->withHighPriority();
    }

    public function getBreadCrumbsModification(CalledContexts $screen_context_stack) : ?BreadCrumbsModification
    {
        if (!$this->getEditModeBacklink($screen_context_stack)) {
            return null;
        }

        return $this->globalScreen()->layout()->factory()->breadcrumbs()
            ->withModification(
                function (Breadcrumbs $current) : ?Breadcrumbs {
                    return null;
                }
            )
            ->withHighPriority();
    }

    public function getPageBuilderDecorator(CalledContexts $screen_context_stack) : ?PageBuilderModification
    {
        $lnk = $this->getEditModeBacklink($screen_context_stack);
        if (!$lnk) {
            return null;
        }

        $label = $this->getEditModeBacklinkLabel();

        return $this->factory->page()
            ->withModification(
                function (PagePartProvider $parts) use ($label, $lnk) : Page {
                    $p = new StandardPageBuilder();
                    $f = $this->dic['ui.factory'];
                    
                    $page = $p->build($parts);
                    $modeinfo = $f->mainControls()->modeInfo($label, $lnk);
                    return $page->withModeInfo($modeinfo);
                }
            )
            ->withHighPriority();
    }
}
