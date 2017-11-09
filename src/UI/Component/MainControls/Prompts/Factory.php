<?php
namespace ILIAS\UI\Component\MainControls\Prompts;
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
	 * @return  \ILIAS\UI\Component\MainControls\Prompts\NotificationCenter
	 */
	public function notificationCenter();

	/**
	 * ---
	 * description:
	 *   purpose: >
	 *
	 * ----
	 *
	 * @return  \ILIAS\UI\Component\MainControls\Prompts\NotificationCenter
	 */
	public function awarenessTools();

}