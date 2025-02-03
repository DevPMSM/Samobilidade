<p align="center">
  <a href="LINK SAMOBILIDADE" target="_blank">
    <img src="https://github.com/antoniellybergami/Sistema-de-Os/blob/Sistema_Os_Branch_antonielly/public/assets/img/logo-pref.png?raw=true" width="100" alt="Logo">
  </a>
</p>



# Sobre o SAMOBILIDADE

## Objetivo
O Samobilidade tem como objetivo centralizar informações referentes à mobilidade urbana da cidade. Incluindo transporte público, trânsito, rodovias, etc. Assim, facilitando o planejamento dos cidadãos, promovendo uma locomoção mais eficiente e informada, além de contribuir para a melhoria da mobilidade urbana no município.


## Tecnologias Utilizadas

- <img src="https://upload.wikimedia.org/wikipedia/en/thumb/d/dd/MySQL_logo.svg/1280px-MySQL_logo.svg.png" width="75" align="center" alt="MySQL Logo"> 
- <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="100" align="center" alt="Laravel Logo"> 
- <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/d/d5/CSS3_logo_and_wordmark.svg/363px-CSS3_logo_and_wordmark.svg.png" width="40" align="center" alt="CSS Logo"> 
- <img src="https://static.vecteezy.com/system/resources/previews/027/127/463/non_2x/javascript-logo-javascript-icon-transparent-free-png.png" width="50" align="center" alt="JS Logo"> 


## Como Utilizar?
Basta acessar [o site](https://samobilidade.saomateus.es.gov.br/).




## Rodando o Sistema
1) Clone o repositório;
2) Atualize as dependências do Composer: `Composer Update`;
3) Gere a chave da aplicação: `php artisan key:generate`;
4) Crie o link para armazenamento: `php artisan storage:link`;
5) Copie o arquivo .env_example para um novo .env: `cp .env_example .env`;
6) Configure no .env os dados referentes ao banco de dados e host;
7) Execute as migrações e popule o banco de dados: `php artisan migrate:fresh --seed`;
8) Compile os assets do front: `npm run build`;
9) Inicie o ambiente de desenvolvimento do frontend: `npm run dev`;
10) Por fim, inicie o serivdor do Laravel: `php artisan serve.`

\
\
\
\
\
\
\
\
\
_Desenvolvido por: [Secretaria de Ciência, Tecnologia, Inovação, Educação Profissional e Trabalho](https://www.saomateus.es.gov.br/secretaria/ciencia-tecnologia-inovacao-educacao-profissional-e-trabalho)._
