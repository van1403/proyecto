<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Proveedor - Sistema de Inventarios</title>
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
        
        .contact-info {
            background: #f8f9fa;
            padding: 1.5rem;
            border-radius: 8px;
            margin-top: 1rem;
            border-left: 4px solid var(--primary-color);
        }
        
        .contact-info h4 {
            margin-bottom: 1rem;
            color: var(--dark-color);
            font-size: 1.4rem;
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
                <div class="logo">🏢 SistemaInventarios</div>
                <ul class="main-menu">
                    <li><a href="{{ route('inicio') }}">Inicio</a></li>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('productos.index') }}">Productos</a></li>
                    <li><a href="{{ route('ventas.index') }}">Ventas</a></li>
                    <li><a href="{{ route('clientes.index') }}">Cliente</a></li>
                    <li><a href="{{ route('proveedores.index') }}" class="active">Proveedor</a></li>
                </ul>
            </div>
        </div>
    </header>
    
    <main>
        <div class="container">
            <h2 class="section-title">Editar Proveedor</h2>
            
            <div class="card">
                <h3>Información del Proveedor</h3>
                <form action="{{ route('proveedores.update', $proveedor) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="nombre">Nombre de la Empresa</label>
                            <input type="text" id="nombre" name="nombre" value="{{ $proveedor->nombre }}" required placeholder="Nombre de la empresa proveedora">
                        </div>
                        
                        <div class="form-group">
                            <label for="contacto">Persona de Contacto</label>
                            <input type="text" id="contacto" name="contacto" value="{{ $proveedor->contacto }}" required placeholder="Nombre del contacto">
                        </div>
                    </div>
                    
                    <div class="form-row">
                        <div class="form-group">
                            <label for="telefono">Teléfono</label>
                            <input type="tel" id="telefono" name="telefono" value="{{ $proveedor->telefono }}" required placeholder="Número de teléfono">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" value="{{ $proveedor->email }}" required placeholder="Correo electrónico">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="producto">Producto/Servicio</label>
                        <input type="text" id="producto" name="producto" value="{{ $proveedor->producto }}" required placeholder="Producto o servicio que ofrece">
                    </div>
                    
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <textarea id="direccion" name="direccion" rows="4" placeholder="Dirección de la empresa">{{ $proveedor->direccion }}</textarea>
                    </div>
                    
                    <div class="contact-info">
                        <h4>Información de Contacto</h4>
                        <p style="font-size: 1.2rem; color: #666;">
                            La información de contacto será utilizada para comunicaciones importantes con el proveedor.
                        </p>
                    </div>
                    
                    <div class="form-actions">
                        <a href="{{ route('proveedores.index') }}" class="btn-secondary">Cancelar</a>
                        <button type="submit" class="btn-success">Actualizar Proveedor</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    
    <footer>
        <div class="container">
            <p>Sistema de Inventarios &copy; 2025 - Editar Proveedor</p>
        </div>
    </footer>
</body>
</html>