<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos - Sistema de Inventarios</title>
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
            flex: 1;
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
        
        .btn-success {
            background-color: var(--primary-color);
        }
        
        .btn-danger {
            background-color: var(--accent-color);
        }
        
        .btn-danger:hover {
            background-color: #c0392b;
        }
        
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1.5rem;
            font-size: 1.2rem;
        }
        
        .data-table th, .data-table td {
            padding: 1.2rem;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        
        .data-table th {
            background-color: #f8f9fa;
            font-weight: 600;
            font-size: 1.3rem;
        }
        
        .data-table tr:hover {
            background-color: #f8f9fa;
        }
        
        .alert {
            padding: 1.2rem 1.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid transparent;
            border-radius: 6px;
            font-size: 1.2rem;
        }
        
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        
        footer {
            background-color: var(--dark-color);
            color: white;
            text-align: center;
            padding: 1.5rem 0;
            font-size: 1.2rem;
        }
        
        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .table-container {
            overflow-x: auto;
        }
        
        .actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-edit {
            background-color: #f39c12;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            text-decoration: none;
            font-size: 1.1rem;
        }
        
        .btn-edit:hover {
            background-color: #e67e22;
        }
        
        .btn-delete {
            background-color: var(--accent-color);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1.1rem;
        }
        
        .btn-delete:hover {
            background-color: #c0392b;
        }
        
        .btn-add {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem 2rem;
            border-radius: 6px;
            text-decoration: none;
            font-size: 1.3rem;
            display: inline-block;
            margin-bottom: 2rem;
        }
        
        .btn-add:hover {
            background-color: var(--secondary-color);
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
            
            .actions {
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
            <h2 class="section-title">Gestión de Productos</h2>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <a href="{{ route('productos.create') }}" class="btn-add">+ Agregar Nuevo Producto</a>
            
            <div class="card">
                <h3>Productos Registrados</h3>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Categoría</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($productos as $producto)
                            <tr>
                                <td>{{ $producto->id }}</td>
                                <td>{{ $producto->nombre }}</td>
                                <td>{{ $producto->categoria }}</td>
                                <td>${{ number_format($producto->precio, 2) }}</td>
                                <td>{{ $producto->stock }}</td>
                                <td class="actions">
                                    <a href="{{ route('productos.edit', $producto) }}" class="btn-edit">Editar</a>
                                    <form action="{{ route('productos.destroy', $producto) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-delete" onclick="return confirm('¿Estás seguro de eliminar este producto?')">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="text-align: center; font-size: 1.3rem;">No hay productos registrados</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    
    <footer>
        <div class="container">
            <p>Sistema de Inventarios &copy; 2025 - Gestión de Productos</p>
        </div>
    </footer>
</body>
</html>