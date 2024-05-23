const express = require("express");
const bodyParser = require("body-parser");
const mongoose = require("mongoose");

const app = express();

// Configurações do MongoDB
mongoose.connect("mongodb://localhost:27017/minha_basedados", {
    useNewUrlParser: true,
    useUnifiedTopology: true
});
const db = mongoose.connection;
db.on("error", console.error.bind(console, "Erro de conexão com o banco de dados:"));
db.once("open", () => {
    console.log("Conexão com o banco de dados estabelecida.");
});

// Definição do modelo do usuário
const userSchema = new mongoose.Schema({
    username: String,
    password: String
});
const User = mongoose.model("User", userSchema);

app.use(bodyParser.json());

// Rota para lidar com o login
app.post("/login", async (req, res) => {
    const { username, password } = req.body;

    // Verificar se o usuário existe no banco de dados
    const user = await User.findOne({ username });

    if (!user || user.password !== password) {
        return res.status(401).json({ error: "Usuário ou senha incorretos." });
    }

    // Se o login for bem-sucedido, você pode retornar um token de autenticação
    return res.json({ message: "Login bem-sucedido!" });
});

const PORT = 3000;
app.listen(PORT, () => {
    console.log(`Servidor rodando na porta ${PORT}`);
});


function mostrarcarrinho(){
    const carrinho=document.getElementById("carrinhocaixa");
    carrinho.style.display="block";
}