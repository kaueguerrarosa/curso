<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho de Compras</title>
    <style>
        /* Estilos */
        body {
            font-family: Arial, sans-serif;
        }

        #carrinho {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
        }

        #carrinho ul {
            list-style-type: none;
            padding: 0;
        }

        #carrinho li {
            margin-bottom: 5px;
        }

        .produto {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <h1>Carrinho de Compras</h1>

    <div id="carrinho">
        <h2>Seu Carrinho</h2>
        <ul id="lista-produtos">
            <!-- Aqui serão adicionados os itens do carrinho -->
        </ul>
        <p>Total: R$ <span id="total">0.00</span></p>
    </div>

    <h2>Produtos Disponíveis</h2>
    <div id="produtos">
        <button onclick="adicionarProduto('Camisa', 20.00)">Adicionar Camisa (R$ 20.00)</button>
        <button onclick="adicionarProduto('Calça', 30.00)">Adicionar Calça (R$ 30.00)</button>
        <button onclick="adicionarProduto('Sapato', 50.00)">Adicionar Sapato (R$ 50.00)</button>
    </div>

    <script>
        // Função para adicionar um produto ao carrinho
        function adicionarProduto(nome, preco) {
            const carrinho = document.getElementById('lista-produtos');
            const totalElement = document.getElementById('total');

            // Criar elemento de lista para o produto
            const produtoItem = document.createElement('li');
            produtoItem.classList.add('produto');
            produtoItem.innerHTML = `
                <span>${nome}</span>
                <span>R$ ${preco.toFixed(2)}</span>
            `;

            // Adicionar produto à lista
            carrinho.appendChild(produtoItem);

            // Atualizar total
            const totalAtual = parseFloat(totalElement.innerText);
            const novoTotal = totalAtual + preco;
            totalElement.innerText = novoTotal.toFixed(2);
        }
    </script>
</body>
</html>