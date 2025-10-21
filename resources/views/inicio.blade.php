<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Inventarios - Inicio</title>
    <style>
        :root {
            --primary-color: #2ecc71;
            --secondary-color: #27ae60;
            --accent-color: #e74c3c;
            --light-color: #ecf0f1;
            --dark-color: #2c3e50;
            --warning-color: #f39c12;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', sans-serif;
        }
        
        body {
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.5;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        .container {
            width: 100%;
            height: 100%;
            margin: 0;
            background: white;
            border-radius: 0;
            box-shadow: none;
            padding: 20px;
            display: flex;
            flex-direction: column;
        }
        
        header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 35px 20px;
            border-radius: 0;
            margin: -20px -20px 20px -20px;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 2rem;
            font-weight: bold;
        }
        
        .main-menu {
            display: flex;
            list-style: none;
            gap: 15px;
        }
        
        .main-menu a {
            color: white;
            text-decoration: none;
            padding: 8px 18px;
            border-radius: 4px;
            transition: background-color 0.3s;
            font-size: 1.1rem;
        }
        
        .main-menu a:hover, .main-menu a.active {
            background-color: rgba(255, 255, 255, 0.2);
        }
        
        .welcome-section {
            text-align: center;
            padding: 30px 0;
            margin-bottom: 30px;
        }
        
        .welcome-section h1 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-size: 2.5rem;
        }
        
        .welcome-section p {
            color: #666;
            margin-bottom: 25px;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
            font-size: 1.3rem;
        }
        
        .cta-button {
            display: inline-block;
            background: var(--warning-color);
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 1.2rem;
            transition: background-color 0.3s;
        }
        
        .cta-button:hover {
            background: #e67e22;
        }
        
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-top: 30px;
            flex-grow: 1;
        }
        
        .menu-card {
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s;
            cursor: pointer;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .menu-card:hover {
            border-color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .menu-icon {
            font-size: 3.5rem;
            margin-bottom: 15px;
        }
        
        .menu-card h3 {
            color: var(--primary-color);
            margin-bottom: 15px;
            font-size: 1.5rem;
        }
        
        .menu-card p {
            color: #666;
            font-size: 1.1rem;
            margin-bottom: 20px;
            flex-grow: 1;
        }
        
        .menu-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: bold;
            font-size: 1.1rem;
        }
        
        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 20px;
            margin-top: 30px;
            padding: 25px;
            background: #f8f9fa;
            border-radius: 8px;
        }
        
        .stat-item {
            text-align: center;
            padding: 20px;
        }
        
        .stat-number {
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--primary-color);
            margin-bottom: 8px;
        }
        
        .stat-label {
            color: #666;
            font-size: 1.2rem;
        }
        
        footer {
            text-align: center;
            margin-top: 30px;
            padding: 25px;
            color: #666;
            border-top: 1px solid #e9ecef;
            font-size: 1.1rem;
        }
        
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                text-align: center;
                gap: 15px;
            }
            
            .main-menu {
                justify-content: center;
                flex-wrap: wrap;
            }
            
            .menu-grid {
                grid-template-columns: 1fr;
            }
            
            .welcome-section h1 {
                font-size: 2rem;
            }
            
            .welcome-section p {
                font-size: 1.1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="header-content">
                <div class="logo">📦 SistemaInventarios</div>
                <ul class="main-menu">
                    <li><a href="{{ route('inicio') }}" class="active">Inicio</a></li>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('productos.index') }}">Productos</a></li>
                    <li><a href="{{ route('ventas.index') }}">Ventas</a></li>
                    <li><a href="{{ route('clientes.index') }}">Clientes</a></li>
                    <li><a href="{{ route('proveedores.index') }}">Proveedores</a></li>
                </ul>
            </div>
        </header>
        
        <main>
            <section class="welcome-section">
                <h1>Bienvenido al Sistema de Inventarios</h1>
                <p>Gestiona productos, ventas, clientes y proveedores de manera eficiente con nuestra plataforma integral.</p>
                <a href="{{ route('dashboard') }}" class="cta-button">Comenzar Ahora</a>
            </section>
            
            <div class="menu-grid">
                <div class="menu-card" onclick="window.location.href='{{ route('productos.index') }}'">
                    <div class="menu-icon">📦</div>
                    <h3>Gestión de Productos</h3>
                    <p>Administra tu inventario de productos, precios y existencias.</p>
                    <a href="{{ route('productos.index') }}" class="menu-link">Acceder →</a>
                </div>
                
                <div class="menu-card" onclick="window.location.href='{{ route('ventas.index') }}'">
                    <div class="menu-icon">💰</div>
                    <h3>Control de Ventas</h3>
                    <p>Registra y gestiona todas tus ventas y transacciones.</p>
                    <a href="{{ route('ventas.index') }}" class="menu-link">Acceder →</a>
                </div>
                
                <div class="menu-card" onclick="window.location.href='{{ route('clientes.index') }}'">
                    <div class="menu-icon">👥</div>
                    <h3>Administración de Clientes</h3>
                    <p>Mantén un registro completo de todos tus clientes.</p>
                    <a href="{{ route('clientes.index') }}" class="menu-link">Acceder →</a>
                </div>
                
                <div class="menu-card" onclick="window.location.href='{{ route('proveedores.index') }}'">
                    <div class="menu-icon">🏢</div>
                    <h3>Gestión de Proveedores</h3>
                    <p>Administra la información de tus proveedores y compras.</p>
                    <a href="{{ route('proveedores.index') }}" class="menu-link">Acceder →</a>
                </div>
            </div>
            
            <div class="stats">
                <div class="stat-item">
                    <div class="stat-number">{{ $stats['total_productos'] }}</div>
                    <div class="stat-label">Productos</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number">{{ $stats['ventas_hoy'] }}</div>
                    <div class="stat-label">Ventas Hoy</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number">{{ $stats['total_clientes'] }}</div>
                    <div class="stat-label">Clientes</div>
                </div>
                
                <div class="stat-item">
                    <div class="stat-number">{{ $stats['total_proveedores'] }}</div>
                    <div class="stat-label">Proveedores</div>
                </div>
            </div>
        </main>
        
        <footer>
            <p>Sistema de Inventarios &copy; 2025 - Desarrollado por Vanesa Sabido</p>
        </footer>
    </div>
</body>
</html>