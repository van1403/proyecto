<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto - Sistema de Inventarios</title>
    <style>
        :root {
            --primary-color: #2ecc71;
            --secondary-color: #27ae60;
            --accent-color: #e74c3c;
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
                <div class="logo">📦 SistemaInventarios</div>
                <ul class="main-menu">
                    <li><a href="{{ route('inicio') }}">Inicio</a></li>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('productos.index') }}" class="active">Productos</a></li>
                    <li><a href="{{ route('ventas.index') }}">Ventas</a></li>
                    <li><a href="{{ route('clientes.index') }}">Cliente</a></li>
                    <li><a href="{{ route('proveedores.index') }}">Proveedor</a></li>
                </ul>
            </div>
        </div>
    </header>
    
    <main>
        <div class="container">
            <h2 class="section-title">Editar Producto</h2>
            
            <div class="card">
                <h3>Información del Producto</h3>
                <form action="{{ route('productos.update', $producto) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nombre">Nombre del Producto</label>
                            <input type="text" id="nombre" name="nombre" value="{{ $producto->nombre }}" required placeholder="Nombre del producto">
                        </div>
                        
                        <div class="form-group">
                            <label for="categoria">Categoría</label>
                            <select id="categoria" name="categoria" required>
                                <option value="">Seleccione categoría</option>
                                <option value="electronica" {{ $producto->categoria == 'electronica' ? 'selected' : '' }}>Electrónica</option>
                                <option value="ropa" {{ $producto->categoria == 'ropa' ? 'selected' : '' }}>Ropa</option>
                                <option value="hogar" {{ $producto->categoria == 'hogar' ? 'selected' : '' }}>Hogar</option>
                                <option value="deportes" {{ $producto->categoria == 'deportes' ? 'selected' : '' }}>Deportes</option>
                                <option value="otros" {{ $producto->categoria == 'otros' ? 'selected' : '' }}>Otros</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <input type="number" id="precio" name="precio" value="{{ $producto->precio }}" required min="0" step="0.01" placeholder="Precio del producto">
                        </div>
                        
                        <div class="form-group">
                            <label for="stock">Stock</label>
                            <input type="number" id="stock" name="stock" value="{{ $producto->stock }}" required min="0" placeholder="Cantidad en stock">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <textarea id="descripcion" name="descripcion" rows="4" placeholder="Descripción del producto">{{ $producto->descripcion }}</textarea>
                    </div>
                    
                    <div class="form-actions">
                        <a href="{{ route('productos.index') }}" class="btn-secondary">Cancelar</a>
                        <button type="submit" class="btn-success">Actualizar Producto</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
    <footer>
        <div class="container">
            <p>Sistema de Inventarios &copy; 2025 - Editar Producto</p>
        </div>
    </footer>
</body>
</html>