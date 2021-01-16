<?php

	namespace Presenters;

	/**
	 * About Presenter Class which contains the about us transfer information.
	 */
	class About extends BaseDTO
	{
		/* CONSTRUCTOR */

		public function __construct($poAbout)
		{
			$this->extend($poAbout);
		}
	}
