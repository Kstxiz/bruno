@echo off
mkdir assets assets\css assets\js assets\img
mkdir pages pages\admin pages\user

type nul > index.html
type nul > pages\login.html
type nul > pages\admin\dashboard.html
type nul > pages\user\visualizacao.html

echo Estrutura criada com sucesso.
pause