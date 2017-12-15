<?php
namespace ILIAS\UI\Component\Layout;
/**
 * This is what a factory for layouts looks like.
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
     * @return  \ILIAS\UI\Component\Layout\TopBar
     */
    public function topbar();

    /**
     * ---
     * description:
     *   purpose: >
     *     -remains visible
     *     -accessible at any time.
     *
     *   composition: >
     *
     *     Sidebar holds entries (Iconographic Buttons). The contents (entries) of the bar
     *     are never modified by changing context, but may vary according to
     *     e.g. the current user's roles.
     *
     *   effect: >
     *     The cockpit(-bar) is always visible and available (except in exam/kiosk mode).
     *
     *     In a desktop environment, a vertical bar is rendered on the left side
     *     of the screen covering the full height minus the header-area.
     *     Entries are aligned vertically.
     *
     *     Like the header, the bar is a static screen element unaffected by scrolling.
     *     Thus, entries will become inaccessible when the window is of smaller height
     *     than the height of all entries together.
     *
     *     The contents of the bar itself will not scroll.
     *
     *     Width of content- and footer-area is limited to a maximum of the
     *     overall available width minus that of the bar.
     *
     *     For mobile devices, the bar is rendered horizontally on the bottom
     *     of the screen with the entries aligned horizontally.
     *     Again, entries will become inacessible, if the window/screen is smaller
     *     than the width of all entries summed up.
     *
     *     -->TODO: what about the footer in mobile context?
     *
     *
     * rules:
     *   composition:
     *     1: The bar MUST NOT contain items other than entries.
     *     2: The bar MUST contain at least one entry.
     *     3: The bar SHOULD NOT contain more than five entries.
     *
     *   style:
     *     1: The bar MUST have a fixed witdth (desktop).
     *     2: The bar MUST have a fixed height (mobile).
     *
     * ----
     *
     * @return  \ILIAS\UI\Component\Layout\SideBar
     */
    public function sidebar();


	/**
	 * ---
	 * description:
	 *   purpose: >
	 *     A page-element describes a section or subsection of the ILIAS Application;
	 *     the page thus is the total view upon ILIAS.
	 *
	 *
	 * ----
	 *
	 * @return  \ILIAS\UI\Component\Layout\Page
	 */
	public function page($content);

}
