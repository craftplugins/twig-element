<?php

namespace Twig\Extension\Element;

use \HtmlObject\Traits\Helpers;

class Element extends \Twig_Markup
{
	protected $htmlObject;

	public function __construct($element = null, $value = null, $attributes = null)
	{
		switch ($element)
		{
			case 'img':
				$src = Helpers::arrayGet($attributes, 'src', '');
				$alt = Helpers::arrayGet($attributes, 'alt', '');
				$this->htmlObject = new \HtmlObject\Image($src, $alt, $attributes);
				break;

			case 'input':
				$type = Helpers::arrayGet($attributes, 'type', '');
				$name = Helpers::arrayGet($attributes, 'name', '');
				$this->htmlObject = new \HtmlObject\Input($type, $name, $value, $attributes);
				break;

			case 'a':
				$href = Helpers::arrayGet($attributes, 'href', '');
				$this->htmlObject = new \HtmlObject\Link($href, $value, $attributes);
				break;
			
			default:
				$this->htmlObject = new \HtmlObject\Element($element, $value, $attributes);
				break;
		}
		
		$this->updateContent();
	}

	public function __call($name, $arguments)
	{
		if (is_callable(array($this->htmlObject, $name)))
		{
			$return = call_user_func_array(array($this->htmlObject, $name), $arguments);

			if (is_string($return))
			{
				return new \Twig_Markup($return, $this->charset);
			}
			
			$this->updateContent();

			return $this;
		}
	}

	protected function updateContent()
	{
		$this->content = (string) $this->htmlObject;
	}
}
