<?php

/**
 * Created by PhpStorm.
 * User: Dev
 * Date: 12/19/2016
 * Time: 4:13 PM
 */
class menuhelper
{
    public $items = [];
    public $currentUrl;

    protected $itemTemplate = "<li class='{class}'>
                <a href='{url}'>
                    <i class='glyphicon {icon}'></i> <span>{title}</span>
                </a>
                {items}
            </li>";
    protected $itemNolink = "<li class=\"header\">{title} {items}</li>";
    protected $listTemplate = "<ul class='sidebar-menu'>{items}</ul>";


    function __construct($items, $currentUrl)
    {
        $this->items = $items;
        $this->currentUrl = $currentUrl;
    }

    public function render()
    {
        return $this->renderItems($this->items);
    }
    protected function renderItems($item)
    {
        if (!isset($item['items'])) {
            return '';
        }

        $items = $item['items'];
        $result = "";
        foreach ($items as $item) {
            $result .= $this->renderItem($item);
        }
        $replace = ['{items}' => $result];
        if (isset($item['class'])) {
            $replace['{class}'] = $item['class'];
        }
        return strtr($this->listTemplate, $replace);
    }

    protected function renderItem($item)
    {
        $replace = [];
        if (!isset($item['url'])) {
            $replace = ['{title}' => $item['title']];
            $template = $this->itemNolink;
        } else {
            $replace = [
                '{title}' => $item['title'],
                '{icon}' => isset($item['icon'])?$item['icon']:'',
                '{class}' => isset($item['class'])?$item['class']:'',
                '{url}' => BASE_URL_ADMIN.$item['url'],
            ];
            if ($this->currentUrl == $item['url']) {
                $replace['{class}'] .= ' active';
            }
            $template = $this->itemTemplate;
        }


        if (isset($item['items'])) {
            $replace['{items}'] = $this->renderItems($item);
        } else {
            $replace['{items}'] = '';
        }

        return strtr($template, $replace);
    }


}