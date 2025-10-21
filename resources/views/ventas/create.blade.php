<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Venta - Sistema de Inventarios</title>
    <style>
        :root {
            --primary-color: #2ecc71;
            --secondary-color: #27ae60;
            --accent-color: #e74c3c;
            --warning-color: #f39c12;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            background-color: #f5f7fa;
            color: var(--dark-color);
            line-height: 1.6;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .container {
            width: 100%;
            max-width: none;
            margin: 0;
            padding: 0 25px;
            flex: 1;
        }
        
        header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1.5rem 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 2.2rem;
            font-weight: bold;
        }
        
        .main-menu {
            display: flex;
            list-style: none;
        }
        
        .main-menu li {
            margin-left: 2rem;
        }
        
        .main-menu a {
            color: white;
            text-decoration: none;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            transition: background-color 0.3s;
            font-size: 1.2rem;
        }
        
        .main-menu a:hover, .main-menu a.active {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        main {
            padding: 2.5rem 0;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .section-title {
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 3px solid var(--primary-color);
            color: var(--dark-color);
            font-size: 2.5rem;
        }
        
        .card {
            background: white;
            border-radius: 12px;
            padding: 2.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 2.5rem;
        }
        
        .card h3 {
            margin-bottom: 1.5rem;
            color: var(--primary-color);
            font-size: 1.8rem;
        }
        
        .form-group {
            margin-bottom: 2rem;
        }
        
        label {
            display: block;
            margin-bottom: 0.75rem;
            font-weight: 600;
            font-size: 1.3rem;
        }
        
        input, select, textarea {
            width: 100%;
            padding: 1rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1.2rem;
        }
        
        button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 6px;
            cursor: pointer;
            font-size: 1.3rem;
            transition: background-color 0.3s;
        }
        
        button:hover {
            background-color: var(--secondary-color);
        }
        
        .btn-secondary {
            background-color: #6c757d;
            color: white;
            text-decoration: none;
            padding: 1rem 2rem;
            border-radius: 6px;
            font-size: 1.3rem;
            display: inline-block;
            margin-right: 1rem;
        }
        
        .btn-secondary:hover {
            background-color: #5a6268;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .form-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }
        
        .total-display {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
            margin-top: 1rem;
            border-left: 4px solid var(--warning-color);
        }
        
        .total-display h4 {
            margin-bottom: 0.5rem;
            color: var(--dark-color);
            font-size: 1.4rem;
        }
        
        .total-amount {
            font-size: 2rem;
            font-weight: bold;
            color: var(--warning-color);
        }
        
        footer {
            background-color: var(--dark-color);
            color: white;
            text-align: center;
            padding: 1.5rem 0;
            font-size: 1.2rem;
        }
        
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
            }
            
            .main-menu {
                margin-top: 1.5rem;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .main-menu li {
                margin: 0.75rem;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .card {
                padding: 1.5rem;
            }
            
            .logo {
                font-size: 1.8rem;
            }
            
            .main-menu a {
                font-size: 1rem;
                padding: 0.5rem 1rem;
            }
            
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .form-actions {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-content">
                <div class="logo">💰 SistemaInventarios</div>
                <ul class="main-menu">
                    <li><a href="{{ route('inicio') }}">Inicio</a></li>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('productos.index') }}">Productos</a></li>
                    <li><a href="{{ route('ventas.index') }}" class="active">Ventas</a></li>
                    <li><a href="{{ route('clientes.index') }}">Cliente</a></li>
                    <li><a href="{{ route('proveedores.index') }}">Proveedor</a></li>
                </ul>
            </div>
        </div>
    </header>
    
    <main>
        <div class="container">
            <h2 class="section-title">Registrar Nueva Venta</h2>
            
            <div class="card">
                <h3>Información de la Venta</h3>
                <form action="{{ route('ventas.store') }}" method="POST" id="venta-form">
                    @csrf
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cliente_id">Cliente</label>
                            <select id="cliente_id" name="cliente_id" required>
                                <option value="">Seleccione cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="producto_id">Producto</label>
                            <select id="producto_id" name="producto_id" required>
                                <option value="">Seleccione producto</option>
                                @foreach($productos as $producto)
                                    <option value="{{ $producto->id }}" data-precio="{{ $producto->precio }}">
                                        {{ $producto->nombre }} - ${{ number_format($producto->precio, 2) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="cantidad">Cantidad</label>
                            <input type="number" id="cantidad" name="cantidad" required min="1" placeholder="Cantidad vendida">
                        </div>
                        
                        <div class="form-group">
                            <label for="precio_unitario">Precio Unitario</label>
                            <input type="number" id="precio_unitario" name="precio_unitario" required min="0" step="0.01" placeholder="Precio unitario">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="fecha_venta">Fecha de Venta</label>
                        <input type="date" id="fecha_venta" name="fecha_venta" required value="{{ date('Y-m-d') }}">
                    </div>
                    
                    <div class="total-display">
                        <h4>Total de la Venta</h4>
                        <div class="total-amount" id="total-display">$0.00</div>
                    </div>
                    
                    <div class="form-actions">
                        <a href="{{ route('ventas.index') }}" class="btn-secondary">Cancelar</a>
                        <button type="submit" class="btn-success">Registrar Venta</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
    <footer>
        <div class="container">
            <p>Sistema de Inventarios &copy; 2025 - Registrar Venta</p>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cantidadInput = document.getElementById('cantidad');
            const precioInput = document.getElementById('precio_unitario');
            const productoSelect = document.getElementById('producto_id');
            const totalDisplay = document.getElementById('total-display');

            function calcularTotal() {
                const cantidad = parseInt(cantidadInput.value) || 0;
                const precio = parseFloat(precioInput.value) || 0;
                const total = cantidad * precio;
                totalDisplay.textContent = `$${total.toFixed(2)}`;
            }

            cantidadInput.addEventListener('input', calcularTotal);
            precioInput.addEventListener('input', calcularTotal);

            productoSelect.addEventListener('change', function() {
                const selectedOption = this.options[this.selectedIndex];
                if (selectedOption.value) {
                    const precio = selectedOption.getAttribute('data-precio');
                    precioInput.value = precio;
                    calcularTotal();
                }
            });
        });
    </script>
</body>
</html>