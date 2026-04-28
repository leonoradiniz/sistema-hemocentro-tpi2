# Sistema de Cadastro para Doação — Hemocentro

Sistema web acadêmico desenvolvido para digitalizar o processo de cadastro e triagem de doadores de sangue e medula óssea, inspirado nos formulários utilizados pelo Hemominas de Uberlândia (MG). O projeto foi desenvolvido com HTML, CSS e PHP, com servidor local Apache via XAMPP.

---

## Estrutura do Projeto

```
hemocentro/
├── index.html
├── estilos-css/
│   ├── global.css
│   └── formularios.css
├── forms-html/
│   ├── info-doador.html
│   ├── triagem-saude.html
│   ├── triagem-comportamento.html
│   ├── cadastro-medula.html
│   └── agendamento.html
└── processamento-php/
    ├── processa_info_doador.php
    ├── processa_triagem_saude.php
    ├── processa_triagem_comportamento.php
    ├── processa_cadastro_medula.php
    └── processa_agendamento.php
```

---

## Tecnologias Utilizadas

- **HTML5** — estrutura semântica dos formulários
- **CSS3** — estilização com variáveis CSS e design responsivo
- **PHP** — validação e processamento das requisições POST no servidor
- **Apache (XAMPP)** — servidor local para execução do backend PHP
- **Git/GitHub** — versionamento com fluxo de branches por formulário

---
## Página Inicial

A `index.html` serve como ponto de entrada do sistema, apresentando os cinco formulários disponíveis em cards de navegação. Cada card redireciona para o formulário correspondente. O design utiliza uma paleta de tons vinho e rosado, referenciando a identidade visual de um hemocentro sem recorrer ao azul hospitalar convencional.

---

## Formulários e Lógica de Validação PHP

### Formulário 1 — Cadastro do Doador (`info-doador.html`)

Coleta os dados de identificação pessoal, saúde básica e contato do doador. Campos: nome completo, nome social, sexo biológico, RG, CPF, data de nascimento, tipo sanguíneo, peso, telefone, e-mail e endereço residencial.

**Lógica PHP (`processa_info_doador.php`):**

- Uma função auxiliar `msgCampoVazio($campoVazio)` centraliza a exibição de mensagens de erro, recebendo o nome legível do campo como parâmetro e evitando repetição de código.
- O campo **nome social** é opcional e recebe apenas `trim()`, sem validação de obrigatoriedade, respeitando o Decreto Federal 8.727/2016.
- O **CPF** é validado com `preg_match('/^[0-9]{11}$/')`, garantindo exatamente 11 dígitos numéricos independentemente da validação HTML, que pode ser burlada.
- A **data de nascimento** utiliza a classe `DateTime` do PHP para comparar a data preenchida com a data atual, impedindo datas futuras.
- O **sexo biológico** e o **tipo sanguíneo** são validados com `in_array()` contra arrays de valores permitidos, impedindo o envio de valores arbitrários por manipulação do HTML.
- O **peso** é validado numericamente, impedindo valores negativos.
- O **telefone** é validado com `preg_match('/^[0-9]{10,11}$/')`, aceitando números com 10 dígitos (fixo com DDD) ou 11 dígitos (celular com DDD).
- O **e-mail** é validado com `filter_var($email, FILTER_VALIDATE_EMAIL)`, função nativa do PHP para validação de formato de e-mail.
- O **endereço** recebe apenas validação de obrigatoriedade com `isset` e `empty`, por se tratar de campo de texto livre com alta variação de formato.

---

### Formulário 2 — Triagem de Saúde Geral (`triagem-saude.html`)

Investiga condições de saúde que podem impedir temporária ou permanentemente a doação. Campos: doenças crônicas (checkboxes), sintomas gripais recentes, situação em relação à COVID-19, eventos recentes com período de espera (checkboxes) e situação de gravidez/pós-parto.

**Lógica PHP (`processa_triagem_saude.php`):**

- Os campos de **checkboxes** (`doencas_cronicas[]` e `eventos_recentes[]`) chegam ao PHP como arrays. A validação utiliza `foreach` para percorrer cada valor marcado e `in_array()` para verificar se pertence ao conjunto de valores válidos definidos no script, impedindo a injeção de valores arbitrários por manipulação do HTML. O preenchimento de ao menos uma opção é obrigatório — incluindo "Nenhuma das anteriores" — pois a ausência de qualquer marcação não envia a chave ao `$_POST`.
- Os campos de **select** (sintomas gripais, COVID-19 e gravidez) são validados com `isset` combinado com `in_array()` contra arrays de valores permitidos, seguindo o mesmo padrão do Formulário 1.

---

### Formulário 3 — Triagem de Comportamento e Viagens (`triagem-comportamento.html`)

Investiga comportamentos e exposições a riscos que podem impedir a doação. Campos: viagens para áreas de risco de doenças endêmicas, realização de tatuagem ou piercing recente, uso de drogas injetáveis, privação de liberdade recente e procedimentos com material perfurocortante não estéril.

**Lógica PHP (`processa_triagem_comportamento.php`):**

- Todos os cinco campos são do tipo select com opções fixas, validados com `isset` e `in_array()` contra arrays de valores permitidos.
- O campo de viagens oferece três opções com granularidade temporal ("menos de 3 meses", "entre 3 e 12 meses", "não viajei"), permitindo que o hemocentro avalie o risco com mais precisão do que uma simples resposta Sim/Não.
- Os demais campos utilizam validação binária Sim/Não, suficiente para os critérios investigados.

---

### Formulário 4 — Cadastro para Doação de Medula (`cadastro-medula.html`)

Registra o doador no REDOME (Registro Nacional de Doadores de Medula Óssea). Campos: etnia autodeclarada, altura, cadastro anterior no REDOME, histórico familiar de doenças que necessitam de transplante e disponibilidade para doação em qualquer estado do Brasil.

**Lógica PHP (`processa_cadastro_medula.php`):**

- A **etnia** é validada com `in_array()` contra as cinco categorias oficiais do IBGE (branca, preta, parda, amarela, indígena). A informação é clinicamente relevante pois a compatibilidade de medula óssea tem forte correlação com a etnia do doador e do receptor.
- A **altura** é validada com `is_numeric()` e verificação de intervalo (`>= 100` e `<= 250`), impedindo valores fora do razoável biologicamente.
- Os campos de **cadastro anterior**, **histórico familiar** e **disponibilidade nacional** são validados com `in_array()` contra seus respectivos conjuntos de valores permitidos.

---

### Formulário 5 — Agendamento de Doação (`agendamento.html`)

Permite ao doador escolher data, turno e unidade para realizar a doação. Campos: CPF (para vincular ao cadastro), data preferida, turno, unidade de atendimento e observações adicionais.

**Lógica PHP (`processa_agendamento.php`):**

- O **CPF** segue a mesma validação do Formulário 1, com `preg_match('/^[0-9]{11}$/')`.
- A **data de doação** utiliza a classe `DateTime` para garantir que a data escolhida não é anterior à data atual, impedindo agendamentos no passado — lógica inversa à do Formulário 1, onde datas futuras eram inválidas.
- O **turno** e a **unidade** são validados com `in_array()` contra seus respectivos valores permitidos.
- O campo de **observações** é opcional. Recebe `trim()` e, caso não seja preenchido, é atribuído como string vazia — garantindo que a variável sempre existe sem gerar erro de variável indefinida.

---

## Versionamento

O projeto foi versionado com Git seguindo um fluxo de branch por formulário:

- `main` — página inicial e arquivos CSS
- `form/info-doador` — Formulário 1 e seu processamento PHP
- `form/triagem-saude` — Formulário 2 e seu processamento PHP
- `form/triagem-comportamento` — Formulário 3 e seu processamento PHP
- `form/cadastro-medula` — Formulário 4 e seu processamento PHP
- `form/agendamento` — Formulário 5 e seu processamento PHP

Cada branch foi mergeada na `main` após conclusão, mantendo o histórico de desenvolvimento organizado por funcionalidade.

---

## Como Executar Localmente

1. Instale o [XAMPP](https://www.apachefriends.org/)
2. Clone o repositório dentro da pasta `htdocs`:
   ```bash
   git clone https://github.com/seu-usuario/hemocentro.git
   ```
3. Inicie o Apache pelo painel do XAMPP
4. Acesse no navegador: `http://localhost/hemocentro`
