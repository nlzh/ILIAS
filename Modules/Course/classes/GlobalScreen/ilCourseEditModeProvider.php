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

/**
 * Class ilCourseEditModeProvider
 *
 * @author Nils Haagen <nils.haagen@concepts-and-training.de>
 */
class ilCourseEditModeProvider extends AbstractModificationProvider implements ModificationProvider
{

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

    /**
     * @param CalledContexts $calledContexts
     *
     * @return bool
     */
    protected function isEditModeEnabled(CalledContexts $screen_context_stack) : bool
    {
        $this->data_collection = $screen_context_stack->current()->getAdditionalData();
        return $this->data_collection->is('EDIT_MODE', true);
    }

    public function getMainBarModification(CalledContexts $screen_context_stack) : ?MainBarModification
    {
        if (!$this->isEditModeEnabled($screen_context_stack)) {
            return null;
        }
        return $this->globalScreen()->layout()->factory()->mainbar()
            ->withModification(
                function (MainBar $mainbar) : ?MainBar {
                    //$entries = $this->data_collection->get(\ilLSPlayer::GS_DATA_LS_MAINBARCONTROLS);
                    $entries = [];
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
        if (!$this->isEditModeEnabled($screen_context_stack)) {
            return null;
        }
        return $this->globalScreen()->layout()->factory()->metabar()
            ->withModification(
                function (MetaBar $metabar) : ?Metabar {
                    $lnk = $this->data_collection->get('EDIT_MODE_BACKLINK');
                    
                    $f = $this->dic['ui.factory'];
                    $exit = $f->button()->bulky(
                        $f->symbol()->glyph()->close(),
                        '',
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
        if (!$this->isEditModeEnabled($screen_context_stack)) {
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

    public function getPageBuilderDecorator(CalledContexts $screen_context_stack) : PageBuilderModification
    {
        if (!$this->isEditModeEnabled($screen_context_stack)) {
            return null;
        }

        return $this->factory->page()
            ->withModification(
                function (PagePartProvider $parts) : Page {
                    $p = new StandardPageBuilder();
                    $page = $p->build($parts);
                    return $page->withViewTitle('ddd');
                    /*
                    global $DIC;
                    $f = $this->dic['ui.factory'];
                    $lnk = $this->data_collection->get('EDIT_MODE_BACKLINK');
                    //$modeinfo = $f->mainControls()->modeInfo("close", new URI($_SERVER['HTTP_REFERER']));
                    //$modeinfo = $f->mainControls()->modeInfo("close", new URI($lnk));
                    //return $page->withModeInfo($modeinfo);
                    */
                }
            )
            ->withHighPriority();
    }
}
