<?php include 'foo.php';?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="styles.css">
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-12">
        <button class="btn btn-success mt-2" data-bs-toggle="modal" data-bs-target="#create">Добавить запись</button>
        <table class="table table-striped table-hover mt-2">
          <thead class="thead-dark">
            <th>ID</th>
            <th>Имя</th>
            <th>Email</th>
            <th>Действие</th>
          </thead>
          <tbody>          
            <?php foreach ($result as $res): ?>
              <tr>
                <td><?php echo $res->id ?></td>
                <td><?php echo $res->name ?></td>
                <td><?php echo $res->email ?></td>
                <td><a href="?id=<?php echo $res->id; ?>" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit<?php echo $res->id; ?>">Изменить</a></td>
                <td><a href="?id=<?php echo $res->id; ?>" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete<?php echo $res->id; ?>">Удалить</a></td>
              </tr>

              <!-- Modal edit -->
              <div class="modal fade" id="edit<?php echo $res->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Изменить запись</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="?id=<?php echo $res->id; ?>" method="post">
                        <div class="form-group">
                          <small>Имя</small>
                          <input type="text" class="form-control" name="name" value="<?php echo $res->name ?>">
                        </div>
                        <div class="form-group">
                          <small>Email</small>
                          <input type="email" class="form-control" name="email" value="<?php echo $res->email ?>">
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                          <button type="submit" class="btn btn-primary" name="edits">Изменить</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- Modal edit -->

               <!-- Modal delete -->
              <div class="modal fade" id="delete<?php echo $res->id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Удалить запись N<?= $res->id; ?></h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-footer">
                      <form action="?id=<?php echo $res->id; ?>" method="post">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                          <button type="submit" class="btn btn-danger" name="delete">Удалить</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
               <!-- Modal delete -->
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal create -->
  <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Добавить запись</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="index.php" method="post">
            <div class="form-group">
              <small>Имя</small>
              <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group">
              <small>Email</small>
              <input type="email" class="form-control" name="email">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
              <button type="submit" class="btn btn-primary" name="add">Сохранить</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal create -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <script src="main.js"></script>
</body>

</html>