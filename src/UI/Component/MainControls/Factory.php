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
	 *     Prompts are notifications from the system to the user.
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
	 *     Menu elements are wrappers for other components. They are used to
	 *     (sub-)structure navigational elements.
	 *     Their functionality is of a mere visual nature, i.e. displaying or
	 *     hiding underlying elements.
	 *
	 * ----
	 *
	 * @return  \ILIAS\UI\Component\MainControls\Menu\Factory
	 */
	public function menu();


}
