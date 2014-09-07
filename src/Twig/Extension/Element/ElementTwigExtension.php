<?php

namespace Twig\Extension\Element;

class ElementTwigExtension extends \Twig_Extension
{
	public function getName()
	{
		return 'element';
	}

	public function getFunctions()
	{
		return array(
			'element' => new \Twig_Function_Method($this, 'element'),
		);
	}

	public function element($element = null, $value = null, $attributes = null)
	{
		return new Element($element, $value, $attributes);
	}
}
