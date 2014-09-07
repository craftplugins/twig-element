# TwigElement

TwigElement is a [Twig](http://twig.sensiolabs.org/) extension to manipulate HTML as object abstractions.

### Usage

```php
{# element(tag, content, attributes) #}

{{ element('input') }}
{# Outputs: <input type="" name=""> #}

{{ element('img').src('image.jpg') }}
{# Outputs: <img src="image.jpg" alt=""> #}

{{ element('a', 'Example Link', { href: 'http://example.com/' }) }}
{# Outputs: <a href="http://example.com/">Example Link</a> #}
```

Refer to the [HtmlObject documentation](https://github.com/Anahkiasen/html-object/blob/e6e2145d4617c3beb01cb759c90ce60af9f92876/README.md) for methods of element instances.
