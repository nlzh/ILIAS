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
	 *
	 * ----
	 *
	 * @return  \ILIAS\UI\Component\MainControls\Menu\Slate
	 */
	public function slate(\ILIAS\UI\Component\Button\Iconographic $button, array $planks);

	/**
	 * ---
	 * description:
	 *   purpose: >
	 *     A Plank is something that goes on a Slate.
	 * ----
	 *
	 * @return  \ILIAS\UI\Component\MainControls\Menu\Plank
	 */
	public function plank($content);

}