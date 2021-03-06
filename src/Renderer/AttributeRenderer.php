<?php
/**
 * Created by PhpStorm.
 * User: inventor
 * Date: 04.04.2016
 * Time: 18:58
 */

namespace NewInventor\Form\Renderer;


use NewInventor\Abstractions\Interfaces\ObjectInterface;
use NewInventor\ConfigTool\Config;
use NewInventor\Form\Abstraction\KeyValuePair;
use NewInventor\Template\Template;

class AttributeRenderer extends BaseRenderer
{
    public function render(ObjectInterface $attribute)
    {
        $template = null;
        /** @var KeyValuePair $attribute */
        if ($attribute->isCanBeShort()) {
            $template = new Template(Config::get(['renderer', 'templates', 'default', 'shortAttribute'], ''));
        } else {
            $template = new Template(Config::get(['renderer', 'templates', 'default', 'attribute'], ''));
        }
        if ($template === null) {
            return '';
        }
        
        return $template->getString($this, $attribute);
    }
    
    public function name(KeyValuePair $pair)
    {
        return $pair->getName();
    }
    
    public function value(KeyValuePair $pair)
    {
        return (string)$pair->getValue();
    }
}