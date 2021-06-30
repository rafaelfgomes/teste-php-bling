<?php

interface Component {
    public function getElements(): IteratorAggregate;
}

class Element implements Component {

    public string $field;

    public function __construct(string $field)
    {
        $this->field = $field;   
    }

    public function getElements(): ArrayObject
    {
        return new ArrayObject($this);
    }

}

class Composite implements Component {

    public array $names;

    public function __construct(array $names)
    {
        $this->names = $names;
    }

    public function getElements(): \ArrayObject
    {
        foreach ($this->names as $name) {
            $elements = new Element($name);
        }

        return $elements->getElements();
    }
}

$names = new Composite([ 'João', 'Maria', 'José' ]);

print_r($names->getElements());