<?php
require_once(__DIR__. '/Calculadora.php');
use \PHPUnit\Framework\TestCase;
    Class CalculadoraTest extends TestCase {
        public function testsumar(){
            $calculadora = new Calculadora ();
            $resultado_esperado = $calculadora -> sumar (3,3);
            $this -> assertEquals(6, $calculadora -> sumar (3,3));
        }
    }
