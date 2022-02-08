<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace DHSServices\TopMenuExtraLinks\Block\Html;

class CustomLink extends \Magento\Framework\View\Element\Html\Link\Current
{
    /**
     * Render block HTML
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (false != $this->getTemplate()) {
            return parent::_toHtml();
        }

        $highlight = '';

        if ($this->getIsHighlighted()) {
            $highlight = ' current';
        }

        //$html = '<li class="level0 level-top ui-menu-item' . $highlight . '"><a href="' . $this->escapeHtml($this->getHref()) . '"';
        // Add Top Menu Custom Links Homepage DHSServices
        // Checking if the current page is a home page
        if ($this->getPath() == '/') {
            $html = '<li class="level0 level-top ui-menu-item' . $highlight . '"><a href="' . $this->escapeHtml($this->getHref()) . '"';
        } else {
            //$html = '<li class="level0 level-top ui-menu-item' . $highlight . '"><a href="' . $this->escapeHtml(rtrim($this->getHref(), '/')) . '"';
            $html = '<li class="level0 level-top ui-menu-item' . $highlight . '"><a href="' . $this->getBaseUrl() . $this->escapeHtml(__($this->getPath())) . '"';
        }
        // Add Top Menu Custom Links Homepage DHSServices
        $html .= $this->getTitle()
            ? ' title="' . $this->escapeHtml(__($this->getTitle())) . '"'
            : '';
        $html .= $this->getAttributesHtml() . '>';

        $html .= '<span>' . $this->escapeHtml(__($this->getLabel())) . '</span>';

        $html .= '</a></li>';

        return $html;
    }

    /**
     * Generate attributes' HTML code
     *
     * @return string
     */
    private function getAttributesHtml()
    {
        $attributesHtml = '';
        $attributes = $this->getAttributes();
        if ($attributes) {
            foreach ($attributes as $attribute => $value) {
                $attributesHtml .= ' ' . $attribute . '="' . $this->escapeHtml($value) . '"';
            }
        }

        return $attributesHtml;
    }
}
