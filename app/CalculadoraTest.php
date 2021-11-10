<?php
require_once(__DIR__. '/Calculadora.php');
use \PHPUnit\Framework\TestCase;
    Class CalculadoraTest extends TestCase {


        public function sumarProveedor()
        {
        return [
       'Caso 1' => [-1, -1, -2],
       'Caso 2' => [0, 0, 0],
       'Caso 3' => [0, -1, -1],
       'Caso 4' => [-1, 0, -1]
            ];
        }

        public function restarProveedor()
        {
        return [
       'Caso 1' => [-1, -1, 0],
       'Caso 2' => [0, 0, 0],
       'Caso 3' => [0, -1, 1],
       'Caso 4' => [-1, 0, -1]
            ];
        }

        public function multiplicarProveedor()
        {
        return [
       'Caso 1' => [-1, -1, 1],
       'Caso 2' => [0, 0, 0],
       'Caso 3' => [0, -1, 0],
       'Caso 4' => [-1, 0, 0]
            ];
        }

        public function dividirProveedor()
        {
        return [
       'Caso 1' => [-1, -1, 1,0],
       'Caso 2' => [0, 0, "Exception", ""],
       'Caso 3' => [0,-1, 0, 0],
       'Caso 4' => [-1, 0, "Exception", ""],
       'Caso 5' => [1, 3, 0.33, 0.01]
            ];
        }

         /**
        * @dataProvider sumarProveedor
        */
        public function testsumar($numero1, $numero2, $resultado_esperado){
            $calculadora = new Calculadora ();
            $this->assertEquals($resultado_esperado,$calculadora->sumar($numero1,$numero2));
        }

         /**
        * @dataProvider restarProveedor
        */
        public function testrestar($numero1, $numero2, $resultado_esperado){
            $calculadora = new Calculadora ();
            $this->assertEquals($resultado_esperado,$calculadora->restar($numero1,$numero2));
        }

         /**
        * @dataProvider multiplicarProveedor
        */
        public function testmulti($numero1, $numero2, $resultado_esperado){
            $calculadora = new Calculadora ();
            $this->assertEquals($resultado_esperado,$calculadora->multiplicar($numero1,$numero2));
        }

        /**
        * @dataProvider dividirProveedor
        */
        public function testdividir($numero1, $numero2, $resultado_esperado, $delta){
            $calculadora = new Calculadora ();
            if ($numero2 != 0){
                $this->assertEqualsWithDelta($resultado_esperado,$calculadora->dividir($numero1, $numero2), $delta);
            } else {
                $this -> expectException ("Exception");
                $calculadora -> dividir ($numero1, $numero2);
            }
        }

        public function testGenerarArreglo (){
            $calculadora = new Calculadora();
            //$this -> assertCount(5, $calculadora-> GenerarArreglo());
            //$this -> assertContains (5, $calculadora -> GenerarArreglo());
            $this -> assertNotEmpty ($calculadora-> GenerarArreglo());
          
        }

        
    public function testCapturarEntradasPermutacion(){
        // Se crea el doble de prueba para la clase Calculadora, método 'capturarEntradasPermutacion'
        $stub = $this->createMock('Calculadora');
        $stub->method('capturarEntradasPermutacion')
            ->willReturn(array(5, 3));

        $this->assertSame(array(5, 3), $stub->capturarEntradasPermutacion());
    }

    public function testCalcularPermutacion(){
         $mock = $this->getMockBuilder('Calculadora')
            ->onlyMethods(array('calcularFactorial'))
            ->getMock();
        $mock->expects($this->exactly(2))
            ->method('calcularFactorial')
            ->will($this->onConsecutiveCalls(120, 6));
        $this->assertSame(20, $mock->calcularPermutacion(5, 2));

    }

    public function testComprobarLlamada(){
        $mock = $this->getMockBuilder('Calculadora')
            ->onlyMethods(array('calcularFactorial'))
            ->getMock();
        //5
        /*$mock->expects($this->exactly(2))
            ->method('calcularFactorial')
            ->withConsecutive([5],[3]);
        $mock->calcularFactorial(5);
        $mock->calcularFactorial(3); */

        //6
         /*$mock->expects($this->once())
            ->method('calcularFactorial')
            ->with(5)
            ->will($this->returnValue(120));
        $resultado_calculado = $mock->calcularFactorial(5);
        $this->assertEquals(120, $resultado_calculado);
        //$mock->calcularFactorial(1);*/
        
        //7
        $mock->expects($this->exactly(2))
            ->method('calcularFactorial')
            ->withConsecutive([5],[3])
            ->will($this->onConsecutiveCalls(120, 6));
        $this->assertEquals(120, $mock->calcularFactorial(5));
        $this->assertEquals(6, $mock->calcularFactorial(3));

    }
    }


  
            