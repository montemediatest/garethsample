<?php

	namespace Presenters\Collections;

	use \Libraries\ORM as ORM;

	/* LOAD DEPENDECIES */
	require_once('models/project.class.php');

	/**
	 * Gallery Collection Class which contains the work information.
	 */
	class Gallery
	{
		private $iaGallery = array();

		/* CONSTRUCTOR */

		public function __construct()
		{
			$this->collect();
		}

		/* PUBLIC METHODS */

		public function all()
		{
			return $this->iaGallery;
		}

		public function sortByName()
		{
			usort($this->iaGallery, function($a, $b)
			{
				return $a->title > $b->title ? 1 : -1;
			});
		}

		/* PRIVATE METHODS */

		private function collect()
		{
			$laGallery = ORM::factory('gallery');

			foreach($laGallery as $loProject)
			{
				$loProject = new \Models\Project($loProject);

				$this->iaGallery[] = $loProject->get();
			}
		}
	}
