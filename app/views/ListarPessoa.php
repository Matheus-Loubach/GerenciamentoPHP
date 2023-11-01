<!DOCTYPE html>
<html lang="pt-BR">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" type="text/css" href="../../style.css" />


   <title>Lista</title>
</head>

<body>
   <?php include 'menu.php'; ?> <!-- menu -->

   <div class="container_list">
      <div>

         <h1>Lista de Clientes</h1>
         <table class="table">
            <thead>
               <tr>
                  <th>Id</th>
                  <th>Nome</th>
                  <th>Email</th>
                  <th>Telefone</th>
                  <th>Sexo</th>
                  <th>Cidade</th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($model->rows as $item) : ?>
                  <tr>
                     <td><?= $item->id ?></td>
                     <td><?= $item->name ?></td>
                     <td><?= $item->email ?></td>
                     <td><?= $item->phone ?></td>
                     <td><?= $item->sex ?></td>
                     <td><?= $item->city ?></td>
                     <td> <a class="edit" href="/form/update?id=<?= $item->id ?> ">EDIT</a></td>
                     <td> <a class="delete" href="/home/delete?id=<?= $item->id ?> ">X</a></td>
                  </tr>
               <?php endforeach; ?>
               <?php if (count($model->rows) ==  0) : ?>
                  <tr>
                     <td colspan="6">Nenhuma pessoa cadastrada</td>
                  </tr>
               <?php endif ?>
            </tbody>
         </table>
      </div>
   </div>
</body>

</html>