<main>
  <section class="mt-4">

  </section>
  <div class="mt-3">
    <h2 >Excluir Vaga</h2>

    <form method="post">
      <div class="form-group">
        <p>Você deseja realmente excluir a vaga?
          <br/>
          <strong>
            <?= $obVaga->titulo ?>
          </strong>
        </p>
        <br/>
      </div>


      <div class="form-gorup">
        <a href="index.php">
          <button type="button" class="btn btn-secondary" name="button">Cancelar</button>
        </a>
        <button type="submit" name="excluir" class="btn btn-danger">excluir</button>
      </div>

    </form>

  </div>
</main>
