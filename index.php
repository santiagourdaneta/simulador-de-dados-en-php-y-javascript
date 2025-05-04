    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Simulador de Dados</title>
        <meta name="description" content="Simula el lanzamiento de dados de forma interactiva y personalizable.">
        <link rel="canonical" href="https://tu-sitio.com/simulador-de-dados">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/14.0.0/material-components-web.min.css" integrity="sha512-MQSeeHVtBZ+FnVbcJbGKYk4Clc5A2e0bqWg+yiSMROJsnzyIfe9nivRWhmlOBAoh+NOqVOPPL7AaLUq/rSXL5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
            :root {
                --md-sys-font-family: "Inter", sans-serif;
            }
            body {
                font-family: var(--md-sys-font-family);
            }
            .mdc-button {
                font-family: var(--md-sys-font-family);
            }
            .mdc-headline-3, .mdc-headline-4, .mdc-headline-5, .mdc-headline-6,
            .mdc-display-large, .mdc-display-medium, .mdc-display-small,
            .mdc-body-large, .mdc-body-medium, .mdc-body-small,
            .mdc-label, .mdc-title-large, .mdc-title-medium, .mdc-title-small {
                font-family: var(--md-sys-font-family);
            }
        </style>
    </head>
    <body class="mdc-layout-grid">
        <div class="mdc-layout-grid__inner">
            <div class="mdc-layout-grid__cell--span-12">
                <h1 class="mdc-headline-3">Simulador de Dados</h1>
            </div>

            <div class="mdc-layout-grid__cell--span-12">
                <div id="resultados" class="mdc-card" style="padding: 16px; margin-bottom: 16px;">
                    <h2 class="mdc-headline-4">Resultados</h2>
                    <div id="resultados-dados" class="mdc-layout-grid__inner" style="display: flex; flex-wrap: wrap; gap: 16px;">
                        </div>
                    <p id="resultados-suma" class="mdc-body-large"></p>
                </div>
            </div>

            <div class="mdc-layout-grid__cell--span-6">
                <div class="mdc-form-field">
                    <label for="num-dados" class="mdc-label">Número de Dados:</label>
                    <input type="number" id="num-dados" value="1" min="1" max="3" class="mdc-text-field__input">
                    <div class="mdc-line-ripple"></div>
                </div>
            </div>

            <div class="mdc-layout-grid__cell--span-6" style="display: none;">
                <div class="mdc-form-field">
                    <label for="caras-dado" class="mdc-label">Caras por Dado:</label>
                    <input type="number" id="caras-dado" value="6" min="2" class="mdc-text-field__input">
                    <div class="mdc-line-ripple"></div>
                </div>
            </div>

            <div class="mdc-layout-grid__cell--span-12">
                <button id="lanzar-dados" class="mdc-button mdc-button--raised">
                    <span class="mdc-button__label">Lanzar Dados</span>
                </button>
            </div>
        </div>

        <script>
            const numDadosInput = document.getElementById('num-dados');
            const carasDadoInput = document.getElementById('caras-dado');
            const lanzarDadosButton = document.getElementById('lanzar-dados');
            const resultadosDadosDiv = document.getElementById('resultados-dados');
            const resultadosSumaParrafo = document.getElementById('resultados-suma');

            lanzarDadosButton.addEventListener('click', function() {
                const numDados = parseInt(numDadosInput.value);
                const carasDado = 6;

                if (isNaN(numDados) || numDados < 1 || numDados > 3) {
                    alert('Por favor, ingresa un número válido de dados (1 a 3).');
                    return;
                }



                resultadosDadosDiv.innerHTML = '';
                let suma = 0;
                for (let i = 0; i < numDados; i++) {
                    const resultado = Math.floor(Math.random() * carasDado) + 1;
                    suma += resultado;

                    const dadoDiv = document.createElement('div');
                    dadoDiv.classList.add('mdc-card');
                    dadoDiv.style.width = '80px';
                    dadoDiv.style.height = '80px';
                    dadoDiv.style.display = 'flex';
                    dadoDiv.style.alignItems = 'center';
                    dadoDiv.style.justifyContent = 'center';
                    dadoDiv.style.fontSize = '2em';
                    dadoDiv.textContent = resultado;
                    resultadosDadosDiv.appendChild(dadoDiv);
                }

                resultadosSumaParrafo.textContent = `Suma de los dados: ${suma}`;
            });
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/material-components-web/14.0.0/material-components-web.min.js" integrity="sha512-52x9jxRlpg4HFObOpmnst5aeTZxf3nqEAk0E0MRwP5mOQwWgIr9BydMAQyeIWhHiMZN/nvEpoStVS97oLrCg7A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    </body>
    </html>
