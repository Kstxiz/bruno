@echo off
echo Criando estrutura do backend...

mkdir backend
mkdir backend\config
mkdir backend\auth
mkdir backend\usuarios
mkdir backend\dados
mkdir backend\utils

type nul > backend\config\db.php

type nul > backend\auth\login.php
type nul > backend\auth\logout.php
type nul > backend\auth\verifica_login.php

type nul > backend\usuarios\criar.php
type nul > backend\usuarios\listar.php

type nul > backend\dados\listar.php
type nul > backend\dados\criar.php
type nul > backend\dados\editar.php
type nul > backend\dados\excluir.php

type nul > backend\utils\verifica_admin.php

echo Estrutura criada com sucesso.
pause
