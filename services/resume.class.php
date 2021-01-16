<?php

	namespace Services;

	/* LOAD DEPENDENCIES */
	require_once('models/about.class.php');
	require_once('presenters/collections/educations.class.php');
	require_once('presenters/collections/careers.class.php');
	require_once('presenters/collections/skills.class.php');
	require_once('presenters/collections/languages.class.php');
	require_once('presenters/collections/tools.class.php');
	require_once('presenters/collections/interests.class.php');
	require_once('presenters/collections/gallery.class.php');
	require_once('models/contact.class.php');

	/**
	 * The main resume service
	 */

	class Resume
	{
		private $ioViewController;

		/* CONSTRUCTOR */

		public function __construct($poViewController)
		{
			$this->ioViewController = $poViewController;
		}

		/* PUBLIC METHODS */

		public function buildResume()
		{
			$this->loadAboutInformation();
			$this->loadOurServices();
			$this->loadGallery();
			$this->loadInterests();
			$this->loadGallery();
			$this->loadContactInformation();
		}

		/* PRIVATE METHODS */

		private function loadAboutInformation()
		{
			$loAbout = new \Models\About();

			$this->ioViewController->assign('about', $loAbout->get()); // $loAbout->get() returns dto
		}

		private function loadOurServices()
		{
			$this->loadEducations();
			$this->loadCareers();
		}

		private function loadGallery()
		{
			$this->loadSkills();
			$this->loadLanguages();
			$this->loadTools();
		}

		private function loadEducations()
		{
			$loEducationsCollection = new \Presenters\Collections\Educations();

			$loEducationsCollection->sortByDate();

			$this->ioViewController->assign('educations', $loEducationsCollection->all());
		}

		private function loadCareers()
		{
			$loCareersCollection = new \Presenters\Collections\Careers();

			$loCareersCollection->sortByDate();

			$this->ioViewController->assign('careers', $loCareersCollection->all());
		}

		private function loadSkills()
		{
			$loSkillsCollection = new \Presenters\Collections\Skills();

			$loSkillsCollection->sortByLevel();

			$this->ioViewController->assign('skills', $loSkillsCollection->all());
		}

		private function loadLanguages()
		{
			$loLanguagesCollection = new \Presenters\Collections\Languages();

			$loLanguagesCollection->sortByLevel();

			$this->ioViewController->assign('languages', $loLanguagesCollection->all());
		}

		private function loadTools()
		{
			$loToolsCollection = new \Presenters\Collections\Tools();

			$loToolsCollection->sortByLevel();

			$this->ioViewController->assign('tools', $loToolsCollection->all());
		}

		private function loadInterests()
		{
			$loInterestCollection = new \Presenters\Collections\Interests();

			$loInterestCollection->sortByName();

			$this->ioViewController->assign('interests', $loInterestCollection->all());
		}

		private function loadGallery()
		{
			$loProjectCollection = new \Presenters\Collections\Gallery();

			//$loProjectCollection->sortByName();

			$this->ioViewController->assign('gallery', $loProjectCollection->all());
		}

		private function loadContactInformation()
		{
			$loContact = new \Models\Contact();

			$this->ioViewController->assign('contact', $loContact->get());
		}
	}
