<?php

require_once 'classes/Element.php';
require_once 'classes/Container.php';
require_once 'classes/Block.php';
require_once 'classes/Text.php';
require_once 'classes/Image.php';
require_once 'classes/Button.php';
require_once 'classes/HTMLConverter.php';

$json = <<<JSON
{
    "type": "container",
    "payload": {},
    "children": [
        {
            "type": "text",
            "payload": {
                "text": "Header"
            },
            "parameters": {
                "fontSize": "large",
                "textAlign": "center"
            }
        },
        {
            "type": "block",
            "payload": {},
            "children": [
                {
                    "type": "container",
                    "payload": {},
                    "children": [
                        {
                            "type": "button",
                            "payload": {
                                "link": {
                                    "type": "url",
                                    "payload": "https://ya.ru/"
                                },
                                "text": "Button"
                            },
                            "parameters": {
                                "size": "medium",
                                "style": "custom",
                                "textColor": "#FFFFFF",
                                "backgroundColor": "#00F0F0"
                            }
                        },
                        {
                            "type": "image",
                            "payload": {
                                "image": {
                                    "url": "https://plans.72dom.online/plans/previews/medium/cf/86/cf8655d586df82194a90aeeed9d2039c.png"
                                }
                            },
                            "parameters": {}
                        }
                    ],
                    "parameters": {}
                }
            ],
            "parameters": {
                "textAlign": "right"
            }
        }
    ],
    "parameters": {}
}
JSON;

$converter = new HTMLConverter();
$data = json_decode($json, true);
$element = $converter->convert($data);

file_put_contents('result.html', $element->render());