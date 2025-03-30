<?php

// Interfaz del producto
interface Transporte {
    public function entregar(): string;
}

// Productos concretos
class Camion implements Transporte {
    public function entregar(): string {
        return "Entrega por tierra en camión";
    }
}

class Barco implements Transporte {
    public function entregar(): string {
        return "Entrega por mar en barco";
    }
}

class Avion implements Transporte {
    public function entregar(): string {
        return "Entrega por aire en avión";
    }
}

// Clase creadora abstracta
abstract class Logistica {
    // El Factory Method
    abstract public function crearTransporte(): Transporte;
    
    public function planificarEntrega(): string {
        // Llamamos al factory method para crear un objeto Transporte
        $transporte = $this->crearTransporte();
        
        // Usamos el producto
        return "Planificación logística: " . $transporte->entregar();
    }
}

// Creadores concretos
class LogisticaTerrestre extends Logistica {
    public function crearTransporte(): Transporte {
        return new Camion();
    }
}

class LogisticaMaritima extends Logistica {
    public function crearTransporte(): Transporte {
        return new Barco();
    }
}

class LogisticaAerea extends Logistica {
    public function crearTransporte(): Transporte {
        return new Avion();
    }
}

// Código cliente
function cliente(Logistica $logistica) {
    echo $logistica->planificarEntrega() . "\n";
}

// Prueba con diferentes tipos de logística
echo "App: Planificación con logística terrestre.\n";
cliente(new LogisticaTerrestre());
echo "\n";

echo "App: Planificación con logística marítima.\n";
cliente(new LogisticaMaritima());
echo "\n";

echo "App: Planificación con logística aérea.\n";
cliente(new LogisticaAerea());
