<?php

namespace Drupal\paramconverter_example\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\paramconverter_example\Entity\ContentEntityExampleInterface;

/**
 * An example controller class.
 */
class ExampleController extends ControllerBase {

  /**
   * Callback for the route paramconverter_example.view.
   *
   * @param \Drupal\paramconverter_example\Entity\ContentEntityExampleInterface $content_entity_example
   *   The Content Entity Example entity.
   *
   * @return array
   *   The render array.
   *
   * @throws \Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException
   * @throws \Drupal\Component\Plugin\Exception\PluginNotFoundException
   */
  public function viewContentEntityExample(ContentEntityExampleInterface $content_entity_example) {
    $output = [];

    $output['department'] = [
      '#markup' => '<h2>' . $content_entity_example->label() . '</h2>',
    ];

    return $output;
  }

}
