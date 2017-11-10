<?php
namespace ILIAS\UI\Component\MainControls\Menu;
/**
 * This is what a factory for prompts looks like.
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
	public function slate();
	/**
	 * ---
	 * description:
	 *   purpose: >
	 *     A Plank is something that goes on a Slate.
	 * ----
	 *
	 * @return  \ILIAS\UI\Component\MainControls\Menu\Plank
	 */
	public function plank();

}