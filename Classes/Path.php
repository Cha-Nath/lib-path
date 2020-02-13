<?php

namespace nlib\Path\Classes;

use nlib\Path\Interfaces\PathInterface;

class Path implements PathInterface {

    private static $_i = null;

    private $_root = '';
    private $_public = '';
    private $_config = '';
    private $_var = '';
    private $_log = '';

    private function __construct() {}

    public static function i() : Path { 
        if(empty(self::$_i)) self::$_i = new Path;

        return self::$_i;
    }

    public function init(string $dir) : self {
        $this->setRoot($dir)
        ->setPublic()
        ->setConfig()
        ->setVar()
        ->setLog();

        return $this;
    }

    #region Getter

    public function getRoot() : string { return $this->_root; }
    public function getPublic() : string { return $this->_public; }
    public function getConfig() : string { return $this->_config; }
    public function getVar() : string { return $this->_var; }
    public function getLog() : string { return $this->_log; }

    #endregion

    #region Setter

    public function setRoot(string $root, bool $auto = true) : self { $this->_root = $auto ? $this->getRoot() . $root . DIRECTORY_SEPARATOR : $root; return $this; }
    public function setPublic(string $public = 'public', bool $auto = true) : self { $this->_public = $auto ? $this->getRoot() . $public . DIRECTORY_SEPARATOR : $public; return $this; }
    public function setConfig(string $config = 'config', bool $auto = true) : self { $this->_config = $auto ? $this->getRoot() . $config . DIRECTORY_SEPARATOR : $config; return $this; }
    public function setVar(string $var = 'var', bool $auto = true) : self { $this->_var = $auto ? $this->getRoot() . $var . DIRECTORY_SEPARATOR : $var; return $this; }
    public function setLog(string $log = 'log', bool $auto = true) : self { $this->_log = $auto ? $this->getVar() . $log . DIRECTORY_SEPARATOR : $log; return $this; }

    #endregion
}