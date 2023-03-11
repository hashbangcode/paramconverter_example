# ParamConverter Example Module

This is an example module that shows how to create a custom ParamConverter service. This is useful if you want to translate parameters into entities without having to load them in the controller.

The module consists of a custom content entity called ContentEntityExample. This entity contains a slug that can be used to translate the parameter in the URL into an entity.

A hook_install() hook is used to generate an example entity so that you can see the module in action straight away. Just visit /content_entity_example/test-content-entity.

Feel free to adapt this example to your needs.
