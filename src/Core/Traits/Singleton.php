<?php
namespace Core\Traits;

/**
 * Trait Singleton
 * @package Core\Traits
 */
trait Singleton{

    /**
     * @var array
     */
    private static $objects=[];

    /**
     * @var array
     */
    private $objectsData=[];

    /**
     * @param $key
     * @param mixed ...$arguments
     * @return $this
     */
    public static function instance($key='def',...$arguments){
        if (!isset(static::$objects['multi'][$key])) {
            $object= new static(...$arguments);
            static::$objects['multi'][$key] = $object;
            $object->setObjectData('multi',$key);
        }else $object=static::$objects['multi'][$key];
        return $object;

    }

    /**
     * @param $type
     * @param int $key
     */
    private function setObjectData($type,$key=0){
        $this->objectsData=[
            'type'=>$type,
            'key'=>$key
        ];
    }

    /**
     * Singleton constructor.
     * @param mixed ...$arguments
     */
    private function __construct(...$arguments)
    {
    }
}