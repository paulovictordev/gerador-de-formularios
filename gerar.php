<?php

require __DIR__ .'/Components/Style.php';
require __DIR__ .'/Components/Tag.php';
require __DIR__ .'/Components/Form.php';

$dados = json_decode(file_get_contents("php://input"));

$style = Style::add('https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css');
$titulo = Tag::create('h1', $dados[0]->titulo);
$tagHr = Tag::single('hr');

$form = new Form();

$conteudo = '';
foreach ($dados as $dado) {
    switch ($dado->tipo) {
        case 'password':
            $conteudo .= $form->password($dado->id, $dado->nome, mb_strtolower($dado->nome), '', $dado->obrigatorio);
            break;
        default:
            $conteudo .= $form->input($dado->id, $dado->nome, mb_strtolower($dado->nome), $dado->tipo, '', $dado->obrigatorio);
            break;
    }
}

$formulario = $form->open() . $conteudo . $form->submit() . $form->close();

$template = <<<template
    {$style}
    {$titulo}
    {$tagHr}
    {$formulario}
template;

$arquivo = fopen(__DIR__ . '/forms/' . mb_strtolower($dados[0]->titulo) . '.php', "a+");

fwrite($arquivo, $template);

fclose($arquivo);

http_response_code(200);
echo json_encode(["mensagem" => "Ok."]);