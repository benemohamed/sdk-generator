<?php

namespace Appwrite\SDK\Language;

use Appwrite\SDK\Language;

class Elixir extends Language {


    protected $params = [
        'mixName' => 'packageName',
        'mixDescription' => 'packageDescription',
    ];

    /**
     * @param string $name
     * @return $this
     */
    public function setMixName($name)
    {
        $this->setParam('mixName', $name);

        return $this;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setMixDescription($name)
    {
        $this->setParam('mixDescription', $name);

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'Elixir';
    }

    /**
     * Get Language Keywords List
     *
     * @return array
     */
    public function getKeywords()
    {
        return [
            "abstract",
            "assert",
            "boolean",
            "break",
            "byte",
            "case",
            "catch",
            "char",
            "class",
            "continue",
            "const",
            "default",
            "do",
            "double",
            "else",
            "enum",
            "extends",
            "goto",
            "final",
            "finally",
            "float",
            "for",
            "if",
            "implements",
            "import",
            "instanceof",
            "interface",
            "int",
            "long",
            "new",
            "with",
            "package",
            "protected",
            "private",
            "public",
            "return",
            "short",
            "static",
            "strictfp",
            "super",
            "switch",
            "synchronized",
            "this",
            "throw",
            "throws",
            "transient",
            "try",
            "void",
            "volatile",
            "while"
        ];
    }

    /**
     * @param $type
     * @return string
     */
    public function getTypeName($type)
    {
        switch ($type) {
            case self::TYPE_INTEGER:
                return 'int';
            break;
            case self::TYPE_STRING:
                return 'String';
            break;
            case self::TYPE_FILE:
                return 'File';
            break;
            case self::TYPE_BOOLEAN:
                return 'boolean';
            break;
            case self::TYPE_ARRAY:
            	return 'List';
			case self::TYPE_OBJECT:
				return 'Object';
            break;
        }

        return $type;
    }

    /**
     * @param array $param
     * @return string
     */
    public function getParamDefault(array $param)
    {
        return '';
    }

    /**
     * @param array $param
     * @return string
     */
    public function getParamExample(array $param)
    {
        $type       = (isset($param['type'])) ? $param['type'] : '';
        $example    = (isset($param['example'])) ? $param['example'] : '';

        $output = '';

        if(empty($example) && $example !== 0 && $example !== false) {
            switch ($type) {
                case self::TYPE_FILE:
                    $output .= 'new File("./path-to-files/image.jpg")';
                    break;
                case self::TYPE_NUMBER:
                case self::TYPE_INTEGER:
                    $output .= '0';
                break;
                case self::TYPE_BOOLEAN:
                    $output .= 'false';
                    break;
                case self::TYPE_STRING:
                    $output .= "''";
                    break;
                case self::TYPE_OBJECT:
                    $output .= 'new Object()';
                    break;
                case self::TYPE_ARRAY:
                    $output .= '{}';
                    break;
            }
        }
        else {
            switch ($type) {
                case self::TYPE_OBJECT:
                case self::TYPE_FILE:
                case self::TYPE_NUMBER:
                case self::TYPE_INTEGER:
                case self::TYPE_ARRAY:
                    $output .= $example;
                    break;
                case self::TYPE_BOOLEAN:
                    $output .= ($example) ? 'true' : 'false';
                    break;
                case self::TYPE_STRING:
                    $output .= "'{$example}'";
                    break;
            }
        }

        return $output;
    }

    /**
     * @return array
     */
    public function getFiles()
    {
        return [
            [
                'scope'         => 'default',
                'destination'   => 'README.md',
                'template'      => '/elixir/README.md.twig',
                'minify'        => false,
                //'block'         => 'default',
            ],
            [
                'scope'         => 'default',
                'destination'   => 'CHANGELOG.md',
                'template'      => '/elixir/CHANGELOG.md.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => '.formatter.exs',
                'template'      => '/elixir/.formatter.exs.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => '.gitignore',
                'template'      => '/elixir/.gitignore.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => 'LICENSE',
                'template'      => '/elixir/LICENSE.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => 'mix.exs',
                'template'      => '/elixir/mix.exs.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'method',
                'destination'   => 'docs/examples/{{service.name | caseLower}}/{{method.name | caseDash}}.ex',
                'template'      => '/elixir/docs/example.ex.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => 'lib/{{ spec.title | caseUcfirst}}/Client.ex',
                'template'      => '/elixir/lib/Client.ex.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'default',
                'destination'   => '/lib/{{ spec.title | caseUcfirst}}/Service.ex',
                'template'      => '/elixir/lib/Service.ex.twig',
                'minify'        => false,
            ],
            [
                'scope'         => 'service',
                'destination'   => '/lib/{{ spec.title | caseUcfirst}}/Services/{{service.name | caseUcfirst}}.ex',
                'template'      => '/elixir/lib/Services/Service.ex.twig',
                'minify'        => false,
            ],
        ];
    }
}

