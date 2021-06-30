<!-- 
    Orientação a objetos e design patterns
    Implementar um padrão iterator no modelo abaixo. Apresentar o diagrama de classes e pseudocódigo.

    Imagem: https://drive.google.com/file/d/1gEcqIDuMhw0-_IzzAiX9sCJKfVECv3aQ/view?usp=sharing
 -->

<?php

interface Component {
    public function getElements(): ArrayIterator;
}

class Element implements Component {

    public string $field;

    public function __construct(string $field)
    {
        $this->field = $field;   
    }

    public function getElements(): ArrayIterator
    {
        $iterator = (new ArrayObject())->getIterator(); 
        return $iterator;
    }

}

class Composite implements Component {

    public array $names;
    public ArrayObject $elements;

    public function __construct(array $names)
    {
        $this->names = $names;
        $this->elements = new ArrayObject();
    }

    public function getElements(): ArrayIterator
    {
        foreach ($this->names as $name) {
            $this->elements->append(new Element($name));
        }

        return new ArrayIterator($this->elements);
    }
}

echo 'Lista de nomes' . "\n\n";

echo 'Digite a quantidade de nomes da lista: ';
$qtdNames = trim(fgets(STDIN, 1024));

$names = [];

if (!is_numeric($qtdNames)) {
    die('São aceitos somente números');
}

foreach (range(1, $qtdNames) as $key => $qtd) {
    echo 'Digite o ' . $qtd . 'º nome: ';
    $names[$key] = trim(fgets(STDIN, 1024));
}

$namesTyped = new Composite($names);

echo "\n";

foreach ($namesTyped->getElements() as $key => $name) {
    echo 'Nome: ' . $name->field . "\n";
}

echo "\n";

//Diagrama de classes: https://drive.google.com/file/d/19briRu6RqgcLZOXnE9q8OtPMwks9lGSA/view?usp=sharing