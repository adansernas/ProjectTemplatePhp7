<?php

namespace clases\http;

/**
 * Description of HttpSession
 *
 * @author Adan Sernas
 */
class HttpSession {

    private $id;
    private $attrs;

    function __construct($attrs) {
        $this->attrs = $attrs;
    }

    function getId() {
        return $this->id;
    }

    function getAttrs() {
        return $this->attrs;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setAttrs($attrs) {
        $this->attrs = $attrs;
    }

    public function addAttr($name, $attr) {
        $this->attrs[$name] = $attr;
    }

    public function getAttr($name) {
        return $this->attrs[$name];
    }

    public function existsAttr($name) {
        return array_key_exists($name, $this->attrs);
    }

}
