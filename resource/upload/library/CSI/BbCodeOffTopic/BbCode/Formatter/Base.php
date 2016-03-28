<?php namespace CSI\BbCodeOffTopic\BbCode\Formatter;

/**
 * Class Base
 * @package CSI\BbCodeOffTopic\BbCode\Formatter
 */
class Base
{
  /**
   * @param array $tag
   * @param array $rendererStates
   * @param \XenForo_BbCode_Formatter_Base $formatter
   * @return mixed
   */
  public static function getBbCodeOffTopic(array $tag, array $rendererStates, \XenForo_BbCode_Formatter_Base $formatter)
  {
    $xenOptions = \XenForo_Application::get('options');
    $xenVisitor = \XenForo_Visitor::getInstance();
    $tagOption = array_map('trim', explode('|', $tag['option']));

    if (count($tagOption) > 1) {
      $optDefault = $tagOption[0];
    } else {
      $optDefault = $tag['option'];
    }

    $tagContent = $formatter->renderSubTree($tag['children'], $rendererStates);
    $view = $formatter->getView();

    if ($view) {
      $template = $view->createTemplateObject('csiXF_bbCode_EB2355B7_tag_off',
        array(
          'content' => $tagContent,
          'option' => $optDefault,
        ));

      $tagContent = $template->render();
      return trim($tagContent);
    }

    return $tagContent;
  }
}
