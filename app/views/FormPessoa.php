<!DOCTYPE html>
<html lang="pt-BR">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="../../style.css" />

  
   <title>Cadastro</title>
</head>

<body>
   <?php include 'menu.php'; ?> <!-- menu -->
   <!-- Formulário para adicionar cliente -->
   <div class="container_form">
      <form method="post" action="/form/save">
         <h1>Cadastro de Clientes</h1>

         <input type="hidden" value="<?= $model->id ?>" name="id" />

         <label for="name">Nome</label>
         <input type="text" id="name" name="name" value="<?= $model->name ?>">

         <label for="email">Email</label>
         <input type="email" id="email" name="email" value="<?= $model->email ?>" required>

         <label for="phone">Telefone</label>
         <input type="text" id="phone" name="phone" value="<?= $model->phone ?>">

         <label for="sex">Sexo</label>

         <select id="sex" name="sex">
            <option value="Masculino" <?php if ($model->sex === "Masculino") echo "selected"; ?>>Masculino</option>
            <option value="Feminino" <?php if ($model->sex === "Feminino") echo "selected"; ?>>Feminino</option>
         </select>
         <label for="city">Cidade</label>

         <input type="text" id="city" name="city" value="<?= $model->city ?>">

         <button type="submit" id="ClientButton">Enviar</button>
      </form>
   </div>


</body>

</html>