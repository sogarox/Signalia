<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']); ?> -->
    <?= $this->Html->css(['add']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
<?php
    /** Quem é essa menina de vermelho, 
* passou de robô todo mundo quis ver.
*Ela que mexeu com o menorzão vilão.
*Folga de Camaro. Tem grife mais cara, robô nem se fala.
*Me apaixonou, uou, 
*mas calma aí não tô pra relação.
*Forte, Forte, pros parça bigode, 
*trote é o que ela quer dar.
*Chama a morena pro abate,
*ela é o destaque, pro baile todo reparar.
*Morena do cabelo liso, não sou envolvido.
*Só to aqui para me apresentar e depois te levar. 
*No pião de cavalo, chave, conversível, 
*sei que cê quer isso.
*Eu mesmo, que tô botando o “coro para torar”.
*Cavalo tá andando nas pista, olha todos vão se impressionar.
*Quando ver a mina pilotando, robô sufocando, “zé pova” vai se perguntar.
   
*Quem essa mina de vermelho, 
*passou de robô todo mundo quis ver.
*Ela que mexeu com o menorzão vilão.
*
*/ 
?>
</html>

