<?php
namespace ILIAS\UI\Component\MainControls\Menu;
/**
 * This is what a factory for menu-elements looks like.
 */
interface Factory {
	/**
	 * ---
     * description:
     *   purpose: >
     *     The slate is a page-area within the sidebar; it acts like an enhanced
     *     fly-out menu for sidebar-entries.
     *     The contents of a slate can vary heavily: A search form, the repository tree,
     *     contextual help, further navigation via buttons, etc.
     *     However, tools within the slate should not modify the systems data
     *     in any way - it is for navigation only.
     *
     *   composition: >
     *     The slate can hold a large variety of components. These can be (further)
     *     navigational entries, text and images or combinations of those.
     *
     *   effect: >
     *     When triggered, the slate opens on the right hand of the sidebar,
     *     between bar and content, thus "pushing" the content to the right.
     *     The slate's height equals that of the sidebar; also, its position
     *     will remain static when the page is scrolled.
     *
     *     The slate will allways have a "close"-button at its bottom.
     *
     *     When content-length exceeds the slate's height, the area above the
     *     close button will start scrolling vertically with a scrollbar on the right.
     *
     * rules:
     *   usage:
     *     1: There MUST be only one slate visible at the same time.
     *     2: Elements in the slate MUST NOT modify content.
     *
     *   accessibility:
     *     1: The slate MUST be closeable by only using the keyboard
     *     2: >
     *        Actions or navigational elements offered inside a slate
     *        MUST be accessible by only using the keyboard
     *
	 * ----
	 *
	 * @return  \ILIAS\UI\Component\MainControls\Menu\Slate
	 */
	public function slate(array $planks);

	/**
	 * ---
	 * description:
	 *   purpose: >
	 *     A Plank is used to further cluster elements of a slate.
	 *
	 *   composition: >
	 *     A plank is rendered as a expand/collpase glyph with a title.
	 *     Planks MAY contain other components as well as further planks.
	 *
	 *   effect: >
	 *     A plank can be expanded/collapsed by operating the glyph before the title.
	 *
	 *   rivals:
     *     Dropdown: >
     *       The dropdown renders above underlying content, while the plank will
     *       push down other elements when expanded.
     *       Planks can be cascaded.
     *
	 * ----
	 *
	 * @return  \ILIAS\UI\Component\MainControls\Menu\Plank
	 */
	public function plank();

}