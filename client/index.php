<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌿 API Lab19 | Зелёная лаборатория</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #0f3b1f 0%, #1a6b2f 50%, #0f3b1f 100%);
            min-height: 100vh;
            padding: 20px;
        }
        .container { max-width: 1400px; margin: 0 auto; }
        h1 {
            text-align: center;
            color: #e8f5e9;
            margin-bottom: 10px;
            font-size: 2.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        .subtitle {
            text-align: center;
            color: #a5d6a7;
            margin-bottom: 30px;
            font-style: italic;
        }
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(450px, 1fr));
            gap: 25px;
        }
        .card {
            background: rgba(255,255,255,0.95);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            transition: transform 0.3s, box-shadow 0.3s;
            border-left: 5px solid #4caf50;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 45px rgba(0,0,0,0.25);
        }
        .card h2 {
            color: #2e7d32;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 2px solid #c8e6c9;
            padding-bottom: 10px;
        }
        .btn-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }
        button {
            background: linear-gradient(135deg, #4caf50, #2e7d32);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 25px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: all 0.3s;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        button:hover {
            transform: scale(1.02);
            background: linear-gradient(135deg, #5cbb60, #3e8e43);
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
        }
        input, select {
            padding: 10px 15px;
            margin: 5px;
            border: 2px solid #c8e6c9;
            border-radius: 25px;
            font-size: 14px;
            outline: none;
            transition: border-color 0.3s;
        }
        input:focus, select:focus {
            border-color: #4caf50;
        }
        pre {
            background: #1e2a1e;
            color: #d4ffd4;
            padding: 15px;
            border-radius: 12px;
            overflow-x: auto;
            font-size: 12px;
            font-family: 'Courier New', monospace;
            margin-top: 15px;
            max-height: 300px;
            overflow-y: auto;
        }
        .result-label {
            font-weight: bold;
            color: #2e7d32;
            margin-top: 10px;
            margin-bottom: 5px;
        }
        .status-badge {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
        .status-success { background: #c8e6c9; color: #2e7d32; }
        .status-error { background: #ffcdd2; color: #c62828; }
        footer {
            text-align: center;
            margin-top: 30px;
            padding: 20px;
            color: #a5d6a7;
        }
        @media (max-width: 768px) {
            .grid { grid-template-columns: 1fr; }
            h1 { font-size: 1.8rem; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>🌿 API Лаборатория | Зелёный сервер</h1>
        <div class="subtitle">📡 Тестирование REST API | PostgreSQL | PHP 8.3</div>
        
        <div class="grid">
            <!-- Дата и время -->
            <div class="card">
                <h2>📅 Дата и время</h2>
                <div class="btn-group">
                    <button onclick="callAPI('/day.php')">📆 Текущий день</button>
                    <button onclick="callAPI('/month.php')">📊 Текущий месяц</button>
                    <button onclick="callAPI('/year.php')">📅 Текущий год</button>
                </div>
                <div class="btn-group">
                    <input type="date" id="dateInput" value="2024-12-31">
                    <button onclick="callWeekday()">📅 День недели</button>
                </div>
                <div class="btn-group">
                    <input type="date" id="date1" value="2024-01-01">
                    <input type="date" id="date2" value="2024-12-31">
                    <button onclick="callDiff()">⏱️ Разница дней</button>
                </div>
                <div id="result1"><pre>🌱 Нажмите на кнопку...</pre></div>
            </div>
            
            <!-- Страны и города -->
            <div class="card">
                <h2>🏙️ Страны и города</h2>
                <div class="btn-group">
                    <select id="countrySelect">
                        <option value="Россия">🇷🇺 Россия</option>
                        <option value="США">🇺🇸 США</option>
                        <option value="Германия">🇩🇪 Германия</option>
                        <option value="Франция">🇫🇷 Франция</option>
                        <option value="Италия">🇮🇹 Италия</option>
                        <option value="Япония">🇯🇵 Япония</option>
                        <option value="Китай">🇨🇳 Китай</option>
                        <option value="Великобритания">🇬🇧 Великобритания</option>
                        <option value="Бразилия">🇧🇷 Бразилия</option>
                    </select>
                    <button onclick="callCities()">🌍 Получить города</button>
                </div>
                <div id="result2"><pre>🏙️ Выберите страну...</pre></div>
            </div>
            
            <!-- CRUD операции -->
            <div class="card">
                <h2>🗄️ CRUD операции</h2>
                <div class="btn-group">
                    <button onclick="callCRUD('all')">📋 Все записи</button>
                    <button onclick="callCRUD('add')">✨ Добавить тестовую</button>
                </div>
                <div class="btn-group">
                    <input type="number" id="itemId" placeholder="ID" style="width:80px">
                    <button onclick="callCRUD('get')">🔍 Получить</button>
                    <button onclick="callCRUD('del')">🗑️ Удалить</button>
                </div>
                <div id="result3"><pre>📦 Нажмите кнопку...</pre></div>
            </div>
            
            <!-- Дополнительная информация -->
            <div class="card">
                <h2>ℹ️ О API</h2>
                <p><strong>🌿 Technology stack:</strong></p>
                <ul style="margin-left: 20px; margin-top: 10px;">
                    <li>PHP 8.3 + PostgreSQL</li>
                    <li>REST API архитектура</li>
                    <li>JSON формат ответов</li>
                    <li>CORS поддержка</li>
                </ul>
                <p style="margin-top: 15px;"><strong>📡 Доступные эндпоинты:</strong></p>
                <pre style="font-size: 11px; margin-top: 5px;">
GET /day.php
GET /month.php
GET /year.php
GET /weekday.php?date=YYYY-MM-DD
GET /diff.php?date1=...&date2=...
GET /cities.php?country=...
GET /index.php?action=all
GET /index.php?action=get&id=X
GET /index.php?action=del&id=X
POST /index.php?action=add
POST /index.php?action=edit&id=X
                </pre>
            </div>
        </div>
        <footer>
            <p>🌿 Лабораторная работа №19 | API с PostgreSQL | Зелёная тема 🌿</p>
        </footer>
    </div>
    
    <script>
        const API_BASE = '/api/';
        
        async function callAPI(endpoint) {
            const resultDiv = document.getElementById('result1');
            resultDiv.innerHTML = '<pre>🌀 Загрузка...</pre>';
            try {
                const res = await fetch(API_BASE + endpoint);
                const data = await res.json();
                resultDiv.innerHTML = `<pre>${JSON.stringify(data, null, 2)}</pre>`;
            } catch(e) {
                resultDiv.innerHTML = `<pre>❌ Ошибка: ${e.message}</pre>`;
            }
        }
        
        async function callWeekday() {
            const date = document.getElementById('dateInput').value;
            const resultDiv = document.getElementById('result1');
            resultDiv.innerHTML = '<pre>🌀 Загрузка...</pre>';
            try {
                const res = await fetch(`${API_BASE}weekday.php?date=${date}`);
                const data = await res.json();
                resultDiv.innerHTML = `<pre>${JSON.stringify(data, null, 2)}</pre>`;
            } catch(e) {
                resultDiv.innerHTML = `<pre>❌ Ошибка: ${e.message}</pre>`;
            }
        }
        
        async function callDiff() {
            const date1 = document.getElementById('date1').value;
            const date2 = document.getElementById('date2').value;
            const resultDiv = document.getElementById('result1');
            resultDiv.innerHTML = '<pre>🌀 Загрузка...</pre>';
            try {
                const res = await fetch(`${API_BASE}diff.php?date1=${date1}&date2=${date2}`);
                const data = await res.json();
                resultDiv.innerHTML = `<pre>${JSON.stringify(data, null, 2)}</pre>`;
            } catch(e) {
                resultDiv.innerHTML = `<pre>❌ Ошибка: ${e.message}</pre>`;
            }
        }
        
        async function callCities() {
            const country = document.getElementById('countrySelect').value;
            const resultDiv = document.getElementById('result2');
            resultDiv.innerHTML = '<pre>🌀 Загрузка...</pre>';
            try {
                const res = await fetch(`${API_BASE}cities.php?country=${encodeURIComponent(country)}`);
                const data = await res.json();
                resultDiv.innerHTML = `<pre>${JSON.stringify(data, null, 2)}</pre>`;
            } catch(e) {
                resultDiv.innerHTML = `<pre>❌ Ошибка: ${e.message}</pre>`;
            }
        }
        
        async function callCRUD(action) {
            const id = document.getElementById('itemId').value;
            const resultDiv = document.getElementById('result3');
            resultDiv.innerHTML = '<pre>🌀 Загрузка...</pre>';
            
            let url = `${API_BASE}index.php?action=${action}`;
            if (id && action !== 'all' && action !== 'add') url += `&id=${id}`;
            
            try {
                let options = { method: 'GET' };
                
                if (action === 'add') {
                    options = {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ 
                            title: '🌿 Новая запись', 
                            description: 'Создано через API Lab19', 
                            status: 'active' 
                        })
                    };
                    url = `${API_BASE}index.php?action=add`;
                }
                
                const res = await fetch(url, options);
                const data = await res.json();
                resultDiv.innerHTML = `<pre>${JSON.stringify(data, null, 2)}</pre>`;
            } catch(e) {
                resultDiv.innerHTML = `<pre>❌ Ошибка: ${e.message}</pre>`;
            }
        }
    </script>
</body>
</html>
