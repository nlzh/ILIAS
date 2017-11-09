<?php
namespace ILIAS\UI\Component\Layout\Page;
/**
 * This is the factory for page-layout components
 */
interface Factory {

    /**
     * ---
     * description:
     *   purpose: >
     *
     *
     *   composition: >
     *
     *
     *   effect: >
     *
     *
     *   rivals:
     *     SideBar: >
     *
     *
     * rules:
     *   usage:
     *     1: There MUST be but one on the page.
     *
     * ----
     *
     * @return  \ILIAS\UI\Component\Layout\Page\TopBar
     */
    public function TopBar();

    /**
     * ---
     * description:
     *   purpose: >
     *
     *
     *   composition: >
     *
     *
     *   effect: >
     *
     *
     *   rivals:
     *     SideBar: >
     *
     *
     * rules:
     *   usage:
     *     1: There MUST be but one on the page.
     *
     * ----
     *
     * @return  \ILIAS\UI\Component\Layout\Page\SideBar
     */
    public function SideBar();


}
