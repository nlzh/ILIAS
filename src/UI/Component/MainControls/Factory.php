<?php
namespace ILIAS\UI\Component\MainControls;
/**
 * This is what a factory for main controls looks like.
 */
interface Factory {

	/**
	 * ---
	 * description:
	 *   purpose: >
	 *
	 *
	 * ----
	 *
	 * @return  \ILIAS\UI\Component\MainControls\Prompts\Factory
	 */
	public function prompts();

	/**
	 * ---
	 * description:
	 *   purpose: >
	 *
	 *
	 * ----
	 *
	 * @return  \ILIAS\UI\Component\MainControls\Menu\Factory
	 */
	public function menu();


}
