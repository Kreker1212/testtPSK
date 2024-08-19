<?php

class HTMLConverter
{
    public function convert(array $json): Element
    {
        $type = $json['type'];
        $payload = $json['payload'] ?? [];
        $parameters = $json['parameters'] ?? [];
        $childrenData = $json['children'] ?? [];

        $children = [];
        foreach ($childrenData as $childData) {
            $children[] = $this->convert($childData);
        }

        return $this->createElement($type, $payload, $parameters, $children);
    }

    private function createElement(string $type, array $payload, array $parameters, array $children): Element
    {
        switch ($type) {
            case 'container':
                return new Container($type, $payload, $parameters, $children);
            case 'block':
                return new Block($type, $payload, $parameters, $children);
            case 'text':
                return new Text($type, $payload, $parameters);
            case 'image':
                return new Image($type, $payload, $parameters);
            case 'button':
                return new Button($type, $payload, $parameters);
            default:
                throw new Exception("Unknown element type: $type");
        }
    }
}
